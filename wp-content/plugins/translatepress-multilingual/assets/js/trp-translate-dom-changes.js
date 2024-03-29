
/**
 * Script to replace dynamically added strings with their translation.
 */
function TRP_Translator(){

    this.is_editor = false;
    var _this = this;
    var observer = null;
    var observerConfig = {
        attributes: true,
        childList: true,
        characterData: false,//this could be CDATA so I set it to false in v 1.4.5
        subtree: true
    };
    var custom_ajax_url = trp_data.trp_custom_ajax_url;
    var wp_ajax_url = trp_data.trp_wp_ajax_url;
    var language_to_query;
    var except_characters = " \t\n\r  �.,/`~!@#$€£%^&*():;-_=+[]{}\\|?/<>1234567890'";
    var trim_characters = " \t\n\r  �\x0A\x0B" + "\302" + "\240";
    var already_detected = [];
    var duplicate_detections_allowed = parseInt( trp_data.duplicate_detections_allowed )

    /**
     * Ajax request to get translations for strings
     */
    this.ajax_get_translation = function( nodesInfo, string_originals, url, skip_machine_translation ) {
        jQuery.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                action                   : 'trp_get_translations_regular',
                all_languages            : 'false',
                security                 : trp_data['gettranslationsnonceregular'],
                language                 : language_to_query,
                original_language        : original_language, // used for trp custom ajax
                originals                : JSON.stringify( string_originals ),
                skip_machine_translation : JSON.stringify( skip_machine_translation ),
                dynamic_strings          : 'true'
            },
            success: function( response ) {
                if ( response === 'error' ) {
                    _this.ajax_get_translation( nodesInfo, string_originals, wp_ajax_url, skip_machine_translation );
                    console.log( 'Notice: TranslatePress trp-ajax request uses fall back to admin ajax.' );
                }else{
                    _this.update_strings( response, nodesInfo );
                }
            },
            error: function( errorThrown ){
                if ( url == custom_ajax_url ){
                    _this.ajax_get_translation( nodesInfo, string_originals, wp_ajax_url, skip_machine_translation );
                    console.log( 'Notice: TranslatePress trp-ajax request uses fall back to admin ajax.' );
                }else{
                    _this.update_strings( null, nodesInfo );
                    console.log( 'TranslatePress AJAX Request Error' );
                }
            }
        });
    };

    /**
     * Return given text converted to html.
     *
     * Useful for decoding special characters into displayable form.
     *
     * @param html
     * @returns {*}
     */
    this.decode_html = function( html ) {
        var txt = document.createElement( "textarea" );
        txt.innerHTML = html;
        return txt.value;
    };

    /**
     * Replace original strings with translations if found.
     */
    this.update_strings = function( response, nodesInfo ) {
        _this.pause_observer();
        if ( response != null && response.length > 0 ){
            var newEntries = [];
            for (var j = 0 ; j < nodesInfo.length; j++){
                var nodeInfo = nodesInfo[j];
                var translation_found = false;
                var initial_value = nodeInfo.original;
                for( var i in response ) {
                    var response_string = response[i].translationsArray[language_to_query];
                    if (response[i].original.trim() == nodeInfo.original.trim()) {
                        // The nodeInfo can contain duplicates and response cannot. We need duplicates to refer to different jQuery objects where the same string appears in different places on the page.
                        var entry = response[i]
                        entry.selector = 'data-trp-translate-id'
                        entry.attribute = ''
                        newEntries.push( entry )
                        if ( _this.is_editor ) {
                            var jquery_object;
                            var trp_translate_id = 'data-trp-translate-id'
                            var trp_node_group = 'data-trp-node-group'
                            if ( nodeInfo.attribute ) {
                                jquery_object = jQuery(nodeInfo.node)
                                trp_translate_id = trp_translate_id + '-' + nodeInfo.attribute
                                trp_node_group = trp_node_group + '-' + nodeInfo.attribute
                            }else{
                                jquery_object = jQuery(nodeInfo.node).parent('translate-press');
                            }
                            jquery_object.attr( trp_translate_id, response[i].dbID );
                            jquery_object.attr( trp_node_group, response[i].group );
                        }

                        if (response_string.translated != '' && language_to_query == current_language ) {
                            var text_to_set = _this.decode_html( initial_value.replace(initial_value.trim(), response_string.translated));
                            if ( nodeInfo.attribute ){
                                nodeInfo.node.setAttribute( nodeInfo.attribute, text_to_set )
                                if ( nodeInfo.attribute == 'src' ){
                                    nodeInfo.node.setAttribute( 'srcset', '' )
                                    nodeInfo.node.setAttribute( 'data-src', text_to_set )
                                }
                            }else {
                                nodeInfo.node.textContent = text_to_set;
                            }
                            translation_found = true;
                        }
                        break;
                    }
                }

                already_detected[ initial_value ] = (initial_value in already_detected ) ? already_detected[ initial_value ] + 1 : 0
                if ( ! translation_found ){
                    if ( nodeInfo.attribute ){
                        if ( nodeInfo.attribute != 'src' ) {
                            nodeInfo.node.setAttribute(nodeInfo.attribute, initial_value)
                        }
                    }else {
                        nodeInfo.node.textContent = initial_value;
                    }
                }

            }
            // this should always be outside the for loop
            if ( _this.is_editor ) {
                window.parent.dispatchEvent( new Event( 'trp_iframe_page_updated' ) );
                window.dispatchEvent( new Event( 'trp_iframe_page_updated' ) );
            }

        }else{
            for (var j = 0 ; j < nodesInfo.length; j++){
                if ( nodesInfo[j].attribute ){
                    if ( nodesInfo[j].attribute != 'src' ) {
                        nodesInfo[j].node.setAttribute(nodesInfo[j].attribute, nodesInfo[j].original)
                    }
                }else {
                    nodesInfo[j].node.textContent = nodesInfo[j].original;
                }
                already_detected[ nodesInfo[j].original ] = (nodesInfo[j].original in already_detected ) ? already_detected[ nodesInfo[j].original ] + 1 : 0
            }
        }
        _this.resume_observer();
    };

    /*
     * Separated from the detect_new_strings function to allow disconnecting observer.
     */
    this.detect_new_strings_callback = function( mutations ){
        // calling disconnect directly instead of calling pause_observer because we don't need to takeRecords() (called from pause_observer) because we would duplicate mutations
        observer.disconnect()
        _this.detect_new_strings( mutations );
        _this.resume_observer();
    }

    /**
     * Detect and remember added strings.
     */
    this.detect_new_strings = function( mutations ){
        var string_originals = [];
        var nodesInfo = [];
        var skip_machine_translation = [];
        var translateable;
        mutations.forEach( function (mutation) {
            for (var i = 0; i < mutation.addedNodes.length; i++) {
                var node = mutation.addedNodes[i]
                /* if it is an anchor add the trp-edit-translation=preview parameter to it */
                if ( _this.is_editor ) {
                    jQuery(node).find('a').context.href = _this.update_query_string('trp-edit-translation', 'preview', jQuery(node).find('a').context.href);
                }

                if ( _this.skip_string(node) ){
                    continue;
                }

                // Search for innertext modifications or newly added nodes with innertext
                translateable = _this.get_translateable_textcontent( node )
                string_originals = string_originals.concat( translateable.string_originals );
                nodesInfo = nodesInfo.concat( translateable.nodesInfo );

                // Search for text inside attributes of newly added nodes
                translateable = _this.get_translateable_attributes( node )
                string_originals = string_originals.concat( translateable.string_originals );
                nodesInfo = nodesInfo.concat( translateable.nodesInfo );
                skip_machine_translation = skip_machine_translation.concat( translateable.skip_machine_translation );
            }

            if ( mutation.attributeName ){
                if ( ! _this.in_array( mutation.attributeName, trp_data.trp_attributes_accessors ) ){
                    return
                }
                if ( _this.skip_string_attribute( mutation.target, mutation.attributeName ) || _this.skip_string(mutation.target) ){
                    return
                }

                // Search for modified text inside attributes of existing nodes
                translateable = _this.get_translateable_attributes( mutation.target )
                string_originals = string_originals.concat( translateable.string_originals );
                nodesInfo = nodesInfo.concat( translateable.nodesInfo );
                skip_machine_translation = skip_machine_translation.concat( translateable.skip_machine_translation );
            }
        });
        if ( nodesInfo.length > 0 ) {
            var ajax_url_to_call = (_this.is_editor) ? wp_ajax_url : custom_ajax_url;
            _this.ajax_get_translation( nodesInfo, string_originals, ajax_url_to_call, skip_machine_translation );
        }
    };

    this.skip_string = function(node){
        // skip nodes containing these attributes
        var selectors = trp_data.trp_skip_selectors;
        for (var i = 0; i < selectors.length ; i++ ){
            if ( jQuery(node).closest( selectors[ i ] ).length > 0 ){
                return true;
            }
        }
        return false;
    };

    /*
     * Skip string based on original string text
     */
    this.skip_string_original = function ( string ){
        return ( ( already_detected[string] > duplicate_detections_allowed ) || _this.in_array( string, trp_data.skip_strings_from_dynamic_translation ) )
    }

    this.skip_string_attribute = function(node, attribute){
        // skip nodes containing these attributes
        var selectors = trp_data.trp_base_selectors;
        for (var i = 0; i < selectors.length ; i++ ){
            if ( typeof jQuery(node).attr( selectors[ i ] + '-' + attribute ) !== 'undefined' ){
                return true;
            }
        }
        return false;
    };

    this.in_array = function (needle, array ) {
        var i
        var length = array.length
        for( i = length - 1; i >= 0; i-- ){
            if ( array[i] === needle ){
                return true
            }
        }
        return false
    }

    this.get_translateable_textcontent = function( node ){
        var string_originals = [];
        var nodesInfo = [];
        if ( node.textContent && _this.trim( node.textContent.trim(), except_characters ) != '' ) {

            var direct_string = get_string_from_node( node );
            if ( direct_string ) {
                // a text without HTML was added
                if ( _this.trim( direct_string.textContent, except_characters ) != '' ) {
                    var extracted_original = _this.trim(direct_string.textContent, trim_characters);
                    if ( ! _this.skip_string_original( extracted_original )) {
                        nodesInfo.push({node: node, original: extracted_original, attribute: ''});
                        string_originals.push(extracted_original)

                        direct_string.textContent = '';
                        if (_this.is_editor) {
                            jQuery(node).wrap('<translate-press></translate-press>');
                        }
                    }
                }
            }else{
                // node contains HTML
                var all_nodes = jQuery( node ).find( '*').addBack();
                var all_strings = all_nodes.contents().filter(function(){
                    if( this.nodeType === 3 && /\S/.test(this.nodeValue) ){
                        if ( ! _this.skip_string(this) ){
                            return this;
                        }
                    }});
                if ( _this.is_editor ) {
                    all_strings.wrap('<translate-press></translate-press>');
                }
                var all_strings_length = all_strings.length;
                for (var j = 0; j < all_strings_length; j++ ) {
                    if ( _this.trim( all_strings[j].textContent, except_characters ) != '' ) {
                        if ( ! _this.skip_string_original( all_strings[j].textContent )) {
                            nodesInfo.push({node: all_strings[j], original: all_strings[j].textContent, attribute: ''});
                            string_originals.push(all_strings[j].textContent)
                            if (trp_data ['showdynamiccontentbeforetranslation'] == false) {
                                all_strings[j].textContent = '';
                            }
                        }
                    }
                }
            }
        }
        return { 'string_originals': string_originals, 'nodesInfo': nodesInfo };
    }

    this.get_translateable_attributes = function ( node ) {
        var nodesInfo = []
        var string_originals = []
        var skip_attr_machine_translation = [ 'href', 'src' ]
        var skip_machine_translation = []
        for (var trp_attribute_key in trp_data.trp_attributes_selectors) {
            if (trp_data.trp_attributes_selectors.hasOwnProperty(trp_attribute_key)) {
                var attribute_selector_item = trp_data.trp_attributes_selectors[trp_attribute_key]
                if ( typeof attribute_selector_item['selector'] !== 'undefined' ){
                    var all_nodes = jQuery( node ).find( attribute_selector_item.selector ).addBack( attribute_selector_item.selector )

                    var all_nodes_length = all_nodes.length
                    for (var j = 0; j < all_nodes_length; j++ ) {
                        if ( _this.skip_string( all_nodes[j] ) || _this.skip_string_attribute( all_nodes[j], attribute_selector_item.accessor ) ){
                            continue;
                        }

                        var attribute_content = all_nodes[j].getAttribute( attribute_selector_item.accessor )
                        if ( _this.skip_string_original( attribute_content )){
                            continue;
                        }
                        if ( attribute_content && _this.trim( attribute_content.trim(), except_characters ) != '' ) {
                            nodesInfo.push({node: all_nodes[j], original: attribute_content, attribute: attribute_selector_item.accessor });
                            string_originals.push( attribute_content )
                            if ( trp_data ['showdynamiccontentbeforetranslation'] == false && ( attribute_selector_item.accessor != 'src' ) ) {
                                all_nodes[j].setAttribute( attribute_selector_item.accessor, '' );
                            }
                            for ( var s = 0; s < skip_attr_machine_translation.length; s++ ){
                                if ( attribute_selector_item.accessor === skip_attr_machine_translation[s] ){
                                    skip_machine_translation.push( attribute_content )
                                    break
                                }
                            }
                        }
                    }
                }
            }
        }
        return { 'string_originals': string_originals, 'nodesInfo': nodesInfo, 'skip_machine_translation': skip_machine_translation };
    }

    function get_string_from_node( node ){
        if( node.nodeType === 3 && /\S/.test(node.nodeValue) ){
            if ( ! _this.skip_string(node) ){
                return node;
            }
        }
    }

    // cleans the gettext wrappers
    this.cleanup_gettext_wrapper = function(){
        jQuery('trp-gettext').contents().unwrap();
    };

    /**
     * Update url with query string.
     *
     */
    this.update_query_string = function(key, value, url) {
        if (!url) return url;
        if ( url.startsWith('#') ){
            return url;
        }
        var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
            hash;

        if (re.test(url)) {
            if (typeof value !== 'undefined' && value !== null)
                return url.replace(re, '$1' + key + "=" + value + '$2$3');
            else {
                hash = url.split('#');
                url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
                if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                    url += '#' + hash[1];
                return url;
            }
        }
        else {
            if (typeof value !== 'undefined' && value !== null ) {
                var separator = url.indexOf('?') !== -1 ? '&' : '?';
                hash = url.split('#');
                url = hash[0] + separator + key + '=' + value;
                if (typeof hash[1] !== 'undefined' && hash[1] !== null)
                    url += '#' + hash[1];
                return url;
            }
            else
                return url;
        }
    };

    /**
     * Initialize and configure observer.
     */
    this.initialize = function() {
        this.is_editor = (typeof window.parent.tpEditorApp !== 'undefined' )
        if ( this.is_editor ) {
            trp_data['gettranslationsnonceregular'] = window.parent.trp_dynamic_nonce;
        }

        current_language = trp_data.trp_current_language;
        original_language = trp_data.trp_original_language;
        language_to_query = trp_data.trp_language_to_query;

        // create an observer instance
        observer = new MutationObserver( _this.detect_new_strings_callback );

        _this.resume_observer();

        jQuery( document ).ajaxComplete(function( event, request, settings ) {
            if( typeof window.parent.jQuery !== "undefined" && window.parent.jQuery('#trp-preview-iframe').length != 0 ) {
                var settingsdata = "" + settings.data;
                if( typeof settings.data == 'undefined' || jQuery.isEmptyObject( settings.data ) || settingsdata.indexOf('action=trp_') === -1 ) {
                    window.parent.dispatchEvent( new Event( 'trp_iframe_page_updated' ) );
                }
            }
        });

        //try a final attempt at cleaning the gettext wrappers
        _this.cleanup_gettext_wrapper();
    };

    /**
     * Resume observing new strings added.
     */
    this.resume_observer = function(){
        if ( language_to_query === '' ) {
            // No translation languages are set other than default language
            return;
        }
        observer.observe(document.body, observerConfig);
    };

    /**
     * Pause observing new strings added.
     */
    this.pause_observer = function(){
        /*
        Disconnect will delete the existing mutations detected prior to being passed to callback function.
        So we are calling takeRecords to save them first, disconnect, then detect the strings
        Disconnect happens before detect_new_strings to avoid detecting mutations from within detect new strings functions
         */
        if ( language_to_query === '' ) {
            // No translation languages are set other than default language
            return;
        }
        var mutations = observer.takeRecords()
        observer.disconnect()
        if ( mutations.length > 0 ) {
            _this.detect_new_strings(mutations)
        }

    };

    this.trim = function (str, charlist) {
        //  discuss at: http://locutus.io/php/trim/
        // original by: Kevin van Zonneveld (http://kvz.io)
        // improved by: mdsjack (http://www.mdsjack.bo.it)
        // improved by: Alexander Ermolaev (http://snippets.dzone.com/user/AlexanderErmolaev)
        // improved by: Kevin van Zonneveld (http://kvz.io)
        // improved by: Steven Levithan (http://blog.stevenlevithan.com)
        // improved by: Jack
        //    input by: Erkekjetter
        //    input by: DxGx
        // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
        //   example 1: trim('    Kevin van Zonneveld    ')
        //   returns 1: 'Kevin van Zonneveld'
        //   example 2: trim('Hello World', 'Hdle')
        //   returns 2: 'o Wor'
        //   example 3: trim(16, 1)
        //   returns 3: '6'
        var whitespace = [
            ' ',
            '\n',
            '\r',
            '\t',
            '\f',
            '\x0b',
            '\xa0',
            '\u2000',
            '\u2001',
            '\u2002',
            '\u2003',
            '\u2004',
            '\u2005',
            '\u2006',
            '\u2007',
            '\u2008',
            '\u2009',
            '\u200a',
            '\u200b',
            '\u2028',
            '\u2029',
            '\u3000'
        ].join('');
        var l = 0;
        var i = 0;
        str += '';
        if (charlist) {
            whitespace += (charlist + '').replace(/([[\]().?/*{}+$^:])/g, '$1');
        }
        l = str.length;
        for (i = 0; i < l; i++) {
            if (whitespace.indexOf(str.charAt(i)) === -1) {
                str = str.substring(i);
                break;
            }
        }
        l = str.length;
        for (i = l - 1; i >= 0; i--) {
            if (whitespace.indexOf(str.charAt(i)) === -1) {
                str = str.substring(0, i + 1);
                break;
            }
        }
        return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
    };

    _this.initialize();
}

var trpTranslator;
var current_language;
var original_language;

function trp_get_IE_version() {
    var sAgent = window.navigator.userAgent;
    var Idx = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (Idx > 0)
        return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;
    else
        return 0; //It is not IE
}

function trp_allow_detect_dom_changes_to_run(){
    var IE_version = trp_get_IE_version();
    if ( IE_version != 0 && IE_version <= 11 ){
        return false;
    }
    return true;
}


// Initialize the Translate Press Editor when the script loads
if ( trp_allow_detect_dom_changes_to_run() ) {
    trpTranslator = new TRP_Translator();
}
