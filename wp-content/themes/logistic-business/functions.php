<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.1.1
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('logistic_business_system_fonts_list')) {
	function logistic_business_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('logistic_business_get_google_fonts_list')) {
	function logistic_business_get_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'logistic-business'), 
			'Hind:300,400,500,600,700' => 'Hind', 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'Poppins:300,400,500,600,700' => 'Poppins', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('logistic_business_text_transform_list')) {
	function logistic_business_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'logistic-business'), 
			'uppercase' => esc_html__('uppercase', 'logistic-business'), 
			'lowercase' => esc_html__('lowercase', 'logistic-business'), 
			'capitalize' => esc_html__('capitalize', 'logistic-business'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('logistic_business_text_decoration_list')) {
	function logistic_business_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'logistic-business'), 
			'underline' => esc_html__('underline', 'logistic-business'), 
			'overline' => esc_html__('overline', 'logistic-business'), 
			'line-through' => esc_html__('line-through', 'logistic-business'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('logistic_business_custom_color_schemes_list')) {
	function logistic_business_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'logistic-business'), 
			'second' => esc_html__('Custom 2', 'logistic-business'), 
			'third' => esc_html__('Custom 3', 'logistic-business'), 
			'fourth' => esc_html__('Custom 4', 'logistic-business') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (!defined('CMSMASTERS_WOOCOMMERCE') && class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', false);
} elseif (!defined('CMSMASTERS_WOOCOMMERCE')) {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (!defined('CMSMASTERS_EVENTS_CALENDAR') && class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
} elseif (!defined('CMSMASTERS_EVENTS_CALENDAR')) {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (!defined('CMSMASTERS_PAYPALDONATIONS') && class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} elseif (!defined('CMSMASTERS_PAYPALDONATIONS')) {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (!defined('CMSMASTERS_DONATIONS') && class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} elseif (!defined('CMSMASTERS_DONATIONS')) {
	define('CMSMASTERS_DONATIONS', false);
}

if (!defined('CMSMASTERS_TIMETABLE') && function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', false);
} elseif (!defined('CMSMASTERS_TIMETABLE')) {
	define('CMSMASTERS_TIMETABLE', false);
}

if (!defined('CMSMASTERS_LEARNPRESS') && class_exists('LearnPress')) {
	define('CMSMASTERS_LEARNPRESS', false);
} elseif (!defined('CMSMASTERS_LEARNPRESS')) {
	define('CMSMASTERS_LEARNPRESS', false);
}


// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// Theme Colored Categories Constant
if (!defined('CMSMASTERS_COLORED_CATEGORIES')) {
	define('CMSMASTERS_COLORED_CATEGORIES', false);
}

// Theme Projects Compatible
if (!defined('CMSMASTERS_PROJECT_COMPATIBLE')) {
	define('CMSMASTERS_PROJECT_COMPATIBLE', true);
}

// Theme Profiles Compatible
if (!defined('CMSMASTERS_PROFILE_COMPATIBLE')) {
	define('CMSMASTERS_PROFILE_COMPATIBLE', true);
}

// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}


// Theme Image Thumbnails Size
if (!function_exists('logistic_business_get_image_thumbnail_list')) {
	function logistic_business_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		60, 
				'height' => 	60, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'logistic-business') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	350, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'logistic-business') 
			), 
			'cmsmasters-project-thumb' => array( 
				'width' => 		580, 
				'height' => 	580, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'logistic-business') 
			), 
			'cmsmasters-project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'logistic-business') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	500, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'logistic-business') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'logistic-business') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	650, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'logistic-business') 
			), 
			'cmsmasters-project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	750, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'logistic-business') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'logistic-business') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	420, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'logistic-business') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('logistic_business_all_color_schemes_list')) {
	function logistic_business_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'logistic-business'), 
			'header' => 		esc_html__('Header', 'logistic-business'), 
			'navigation' => 	esc_html__('Navigation', 'logistic-business'), 
			'header_top' => 	esc_html__('Header Top', 'logistic-business'), 
			'footer' => 		esc_html__('Footer', 'logistic-business') 
		);
		
		
		$out = array_merge($list, logistic_business_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('logistic_business_color_schemes_defaults')) {
	function logistic_business_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#454545', 
				'link' => 		'#f02830', 
				'hover' => 		'#bababa', 
				'heading' => 	'#2c2c2c', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#fcfcfc', 
				'border' => 	'#e0e0e0', 
				'secondary' => 	'#f02830'
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#454545', 
				'mid_link' => 		'#2c2c2c', 
				'mid_hover' => 		'#f02830', 
				'mid_bg' => 		'#ffffff', 
				'mid_bg_scroll' => 	'#ffffff', 
				'mid_border' => 	'#e0e0e0', 
				'bot_color' => 		'#454545', 
				'bot_link' => 		'#2c2c2c', 
				'bot_hover' => 		'#f02830', 
				'bot_bg' => 		'#ffffff', 
				'bot_bg_scroll' => 	'#ffffff', 
				'bot_border' => 	'#e4e4e4' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#2c2c2c', 
				'title_link_hover' => 		'#f02830', 
				'title_link_current' => 	'#f02830', 
				'title_link_subtitle' => 	'#454545', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'#e4e4e4', 
				'dropdown_text' => 			'#454545', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#2c2c2c', 
				'dropdown_link_hover' => 	'#f02830', 
				'dropdown_link_subtitle' => '#454545', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'#e0e0e0' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#454545', 
				'link' => 					'#2c2c2c', 
				'hover' => 					'#f02830', 
				'bg' => 					'#ffffff', 
				'border' => 				'#e0e0e0', 
				'title_link' => 			'#2c2c2c', 
				'title_link_hover' => 		'#f02830', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#ffffff', 
				'dropdown_border' => 		'#e0e0e0', 
				'dropdown_link' => 			'#2c2c2c', 
				'dropdown_link_hover' => 	'#f02830', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'#666666', 
				'link' => 		'#666666', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#2c2c2c', 
				'alternate' => 	'#303030', 
				'border' => 	'#3b3b3b', 
				'secondary' => 	'#f02830' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'#ffffff', 
				'link' => 		'rgba(255,255,255,0.8)', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#01a2a6', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#fe5969' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#17aaae', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#fe5969' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'#909195', 
				'link' => 		'#01a2a6', 
				'hover' => 		'#bcbec1', 
				'heading' => 	'#3d3d47', 
				'bg' => 		'#fcfcfc', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e0e0e0', 
				'secondary' => 	'#fe5969' 
			), 
			'fourth' => array( // custom color scheme 4
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#ffffff', 
				'heading' => 	'rgba(255,255,255,0.4)', 
				'bg' => 		'#f9b639', 
				'alternate' => 	'rgba(255,255,255,0.1)', 
				'border' => 	'rgba(255,255,255,0.25)', 
				'secondary' => 	'#ffffff' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');
define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_ADMIN_INC . '/demo-content-importer.php');
}

locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-module-functions.php');
}



// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
	
	locate_template(CMSMASTERS_COMPOSER . '/shortcodes/theme-shortcodes.php', true);
}



// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	locate_template('tribe-events/cmsmasters-events-functions.php', true);
}



// Load Theme Local File
if (!function_exists('logistic_business_load_theme_textdomain')) {
	function logistic_business_load_theme_textdomain() {
		load_theme_textdomain('logistic-business', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'logistic_business_load_theme_textdomain')) {
	add_action('after_setup_theme', 'logistic_business_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('logistic_business_theme_activation')) {
	function logistic_business_theme_activation() {
		if (get_option('cmsmasters_active_theme') != CMSMASTERS_SHORTNAME) {
			add_option('cmsmasters_active_theme', CMSMASTERS_SHORTNAME, '', 'yes');
			
			
			logistic_business_add_global_options();
			
			
			logistic_business_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'logistic_business_theme_activation');



// Framework Deactivation
if (!function_exists('logistic_business_theme_deactivation')) {
	function logistic_business_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'logistic_business_theme_deactivation')) {
	add_action('switch_theme', 'logistic_business_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('logistic_business_plugin_activation')) {
	function logistic_business_plugin_activation($plugin, $network_activation) {
		update_option('cmsmasters_plugin_activation', 'true');
		
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'logistic_business_plugin_activation', 10, 2);


if (!function_exists('logistic_business_plugin_activation_regenerate')) {
	function logistic_business_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			logistic_business_regenerate_styles();

			logistic_business_add_global_options();
			
			logistic_business_add_global_icons();

			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'logistic_business_plugin_activation_regenerate');


function logistic_business_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}
	
	
	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'logistic_business_run_reinit_import_options', 10, 3);
