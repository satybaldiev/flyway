/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.0
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 

/* 
// For Change Fields in Shortcodes

var sc_name_new_fields = {};


for (var id in cmsmastersShortcodes.sc_name.fields) {
	if (id === 'field_name') { // Delete Field
		delete cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Delete Field Attribute
		delete cmsmastersShortcodes.sc_name.fields[id]['field_attribute'];  
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add/Change Field Attribute
		cmsmastersShortcodes.sc_name.fields[id]['field_attribute'] = 'value';
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add Field (before the field as found, add new field)
		sc_name_new_fields['field_name'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.sc_name_field_custom_bg_color, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		};
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else { // Allways add this in the bottom
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	}
}


cmsmastersShortcodes.sc_name.fields = sc_name_new_fields; 
*/


/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = composer_shortcodes_extend.blog_field_layout_mode_puzzle;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;


// Posts Slider
var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'amount') { // Delete Field
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') { // Delete Field Attribute
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];  
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;


/**
 * Quotes Extend
 */

var quotes_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_quotes.fields) {
	if (id === 'mode') {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
		
		
		quotes_new_fields['type'] = { 
			type : 		'radio', 
			title : 	composer_shortcodes_extend.quotes_field_slider_type_title, 
			descr : 	composer_shortcodes_extend.quotes_field_slider_type_descr, 
			def : 		'box', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'box' : 	composer_shortcodes_extend.quotes_field_type_choice_box, 
						'center' : 	composer_shortcodes_extend.quotes_field_type_choice_center 
			}, 
			depend : 	'mode:slider' 
		};
	} else {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_quotes.fields = quotes_new_fields;


/**
 * Featured Block Extend
 */

var featured_block_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_featured_block.fields) {
	if (id === 'bottom_padding') {
		featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
		
		
		featured_block_new_fields['border_width'] = { 
			type : 		'range', 
			title : 	composer_shortcodes_extend.featured_block_field_border_title, 
			descr : 	composer_shortcodes_extend.featured_block_field_border_descr, 
			def : 		'0', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			max : 		'20' 
		};
	} else {
		featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_featured_block.fields = featured_block_new_fields;


/**
 * Featured Block Extend
 */

var featured_block_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_featured_block.fields) {
	if (id === 'border_width') {
		featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
		
		
		featured_block_new_fields['border_color'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.featured_block_field_border_color_title, 
			descr : 	composer_shortcodes_extend.featured_block_field_border_color_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		};
	} else {
		featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_featured_block.fields = featured_block_new_fields;


/**
 * Quote Item Extend
 */

var quote_new_fields = {};


for (var id in cmsmastersMultipleShortcodes.cmsmasters_quote.fields) {
	if (id === 'subtitle') {
		quote_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_quote.fields[id];
		
		
		quote_new_fields['color'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.quotes_field_item_color_title, 
			descr : 	composer_shortcodes_extend.quotes_field_item_color_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half'
		};
	} else {
		quote_new_fields[id] = cmsmastersMultipleShortcodes.cmsmasters_quote.fields[id];
	}
}


cmsmastersMultipleShortcodes.cmsmasters_quote.fields = quote_new_fields;

