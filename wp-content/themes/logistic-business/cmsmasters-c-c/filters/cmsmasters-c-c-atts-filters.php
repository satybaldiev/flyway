<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version 	1.0.6
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */


/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	$cmsmasters_option = logistic_business_get_global_options();
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'blog_field_layout_mode_puzzle' => 				esc_attr__('Puzzle', 'logistic-business'), 
			'quotes_field_slider_type_title' => 			esc_attr__('Slider Type', 'logistic-business'), 
			'quotes_field_slider_type_descr' => 			esc_attr__('Choose your quotes slider style type', 'logistic-business'), 
			'quotes_field_type_choice_box' => 				esc_attr__('Boxed', 'logistic-business'), 
			'quotes_field_type_choice_center' => 			esc_attr__('Centered', 'logistic-business'),
			'quotes_field_item_color_title' => 				esc_attr__('Color', 'logistic-business'),
			'quotes_field_item_color_descr' => 				esc_attr__('Enter this quote custom color', 'logistic-business'),
			'featured_block_field_border_title' =>			esc_attr__('Border Width', 'logistic-business'),
			'featured_block_field_border_descr' =>			esc_attr__('Enter featured block border width', 'logistic-business'),
			'featured_block_field_border_color_title' =>	esc_attr__('Border Color', 'logistic-business'),
			'featured_block_field_border_color_descr' =>	esc_attr__('Enter featured block border color', 'logistic-business') 
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');


// Pricing Table Item Shortcode Attributes Filter
add_filter('cmsmasters_pricing_table_item_atts_filter', 'cmsmasters_pricing_table_item_atts');

function cmsmasters_pricing_table_item_atts() {
	return array( 
		'price' => 					'100', 
		'coins' => 					'', 
		'currency' => 				'$', 
		'period' => 				'', 
		'features' => 				'', 
		'best' => 					'', 
		'best_bg_color' => 			'', 
		'best_text_color' => 		'', 
		'button_show' => 			'', 
		'button_title' => 			'', 
		'button_link' => 			'#', 
		'button_target' => 			'', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'bold', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}


// Quotes Shortcode Attributes Filter
add_filter('cmsmasters_quotes_atts_filter', 'cmsmasters_quotes_atts');

function cmsmasters_quotes_atts() {
	return array( 
		'mode' => 				'grid', 
		'type' => 				'boxed', 
		'columns' => 			'3', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Quote Item Shortcode Attributes Filter
add_filter('cmsmasters_quote_atts_filter', 'cmsmasters_quote_atts');

function cmsmasters_quote_atts() {
	return array( 
		'image' => 		'', 
		'name' => 		'', 
		'subtitle' => 	'', 
		'color' => 		'', 
		'link' => 		'', 
		'website' => 	'', 
		'classes' => 	'' 
	);
}


// Featured Block Item Shortcode Attributes Filter
add_filter('cmsmasters_featured_block_atts_filter', 'cmsmasters_featured_block_atts');

function cmsmasters_featured_block_atts() {
	return array( 
		'text_width' => 		'100', 
		'text_position' => 		'center', 
		'text_padding' => 		'', 
		'text_align' => 		'left', 
		'color_overlay' => 		'', 
		'fb_bg_color' => 		'', 
		'bg_img' => 			'', 
		'bg_position' => 		'', 
		'bg_repeat' => 			'', 
		'bg_attachment' => 		'', 
		'bg_size' => 			'', 
		'top_padding' => 		'', 
		'bottom_padding' => 	'', 
		'border_width' => 		'0', 
		'border_color' => 		'', 
		'border_radius' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}
