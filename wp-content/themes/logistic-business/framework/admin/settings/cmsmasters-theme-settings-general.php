<?php 
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version 	1.0.9
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function logistic_business_options_general_tabs() {
	$cmsmasters_option = logistic_business_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'logistic-business');
	
	if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'logistic-business');
	}
	
	$tabs['header'] = esc_attr__('Header', 'logistic-business');
	$tabs['content'] = esc_attr__('Content', 'logistic-business');
	$tabs['footer'] = esc_attr__('Footer', 'logistic-business');
	
	return $tabs;
}


function logistic_business_options_general_sections() {
	$tab = logistic_business_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'logistic-business');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'logistic-business');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'logistic-business');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'logistic-business');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'logistic-business');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function logistic_business_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = logistic_business_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'boxed', 
			'choices' => array( 
				esc_html__('Liquid', 'logistic-business') . '|liquid', 
				esc_html__('Boxed', 'logistic-business') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_type', 
			'title' => esc_html__('Logo Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'logistic-business') . '|image', 
				esc_html__('Text', 'logistic-business') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url', 
			'title' => esc_html__('Logo Image', 'logistic-business'), 
			'desc' => esc_html__('Choose your website logo image.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'logistic-business'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title', 
			'title' => esc_html__('Logo Title', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : CMSMASTERS_FULLNAME), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'logistic-business'), 
			'desc' => esc_html__('enable', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_col', 
			'title' => esc_html__('Background Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#f0f0f0' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img', 
			'title' => esc_html__('Background Image', 'logistic-business'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'logistic-business') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'logistic-business') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'logistic-business') . '|repeat-y', 
				esc_html__('Repeat', 'logistic-business') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_pos', 
			'title' => esc_html__('Background Position', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'logistic-business') . '|top left', 
				esc_html__('Top Center', 'logistic-business') . '|top center', 
				esc_html__('Top Right', 'logistic-business') . '|top right', 
				esc_html__('Center Left', 'logistic-business') . '|center left', 
				esc_html__('Center Center', 'logistic-business') . '|center center', 
				esc_html__('Center Right', 'logistic-business') . '|center right', 
				esc_html__('Bottom Left', 'logistic-business') . '|bottom left', 
				esc_html__('Bottom Center', 'logistic-business') . '|bottom center', 
				esc_html__('Bottom Right', 'logistic-business') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'logistic-business') . '|scroll', 
				esc_html__('Fixed', 'logistic-business') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_size', 
			'title' => esc_html__('Background Size', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'logistic-business') . '|auto', 
				esc_html__('Cover', 'logistic-business') . '|cover', 
				esc_html__('Contain', 'logistic-business') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'logistic-business'), 
			'desc' => esc_html__('enable', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'logistic-business'), 
			'desc' => esc_html__('enable', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line', 
			'title' => esc_html__('Top Line', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_height', 
			'title' => esc_html__('Top Height', 'logistic-business'), 
			'desc' => esc_html__('pixels', 'logistic-business'), 
			'type' => 'number', 
			'std' => '36', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'logistic-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'logistic-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'logistic-business') . '|none', 
				esc_html__('Top Line Social Icons', 'logistic-business') . '|social', 
				esc_html__('Top Line Navigation', 'logistic-business') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_styles', 
			'title' => esc_html__('Header Styles', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'l_nav', 
			'choices' => array( 
				esc_html__('Default Style', 'logistic-business') . '|default', 
				esc_html__('Compact Style Left Navigation', 'logistic-business') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'logistic-business') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'logistic-business') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'logistic-business'), 
			'desc' => esc_html__('pixels', 'logistic-business'), 
			'type' => 'number', 
			'std' => '132', 
			'min' => '100' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_mid_search', 
			'title' => esc_html__('Header Middle Search', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'logistic-business'), 
			'desc' => esc_html__('pixels', 'logistic-business'), 
			'type' => 'number', 
			'std' => '68', 
			'min' => '50' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_bot_search', 
			'title' => esc_html__('Header Bottom Search', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_button_check', 
			'title' => esc_html__('Header Button', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_button_text', 
			'title' => esc_html__('Header Button Title', 'logistic-business'), 
			'desc' => esc_html__('Enter title for header button', 'logistic-business'), 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_button_link', 
			'title' => esc_html__('Header Button Link', 'logistic-business'), 
			'desc' => esc_html__('Enter link for header button', 'logistic-business'), 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'none', 
			'choices' => array( 
				esc_html__('None', 'logistic-business') . '|none', 
				esc_html__('Header Social Icons', 'logistic-business') . '|social', 
				esc_html__('Header Custom HTML', 'logistic-business') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'logistic-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'logistic-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'logistic-business'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				esc_html__('Left', 'logistic-business') . '|left', 
				esc_html__('Right', 'logistic-business') . '|right', 
				esc_html__('Center', 'logistic-business') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'logistic-business'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'logistic-business') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'logistic-business') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'logistic-business') . '|repeat-y', 
				esc_html__('Repeat', 'logistic-business') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'logistic-business') . '|scroll', 
				esc_html__('Fixed', 'logistic-business') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'logistic-business') . '|auto', 
				esc_html__('Cover', 'logistic-business') . '|cover', 
				esc_html__('Contain', 'logistic-business') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'logistic-business'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '#fcfcfc' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'logistic-business'), 
			'desc' => esc_html__('pixels', 'logistic-business'), 
			'type' => 'number', 
			'std' => '90', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'bottom', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_type', 
			'title' => esc_html__('Footer Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'logistic-business') . '|default', 
				esc_html__('Small', 'logistic-business') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'logistic-business') . '|none', 
				esc_html__('Footer Navigation', 'logistic-business') . '|nav', 
				esc_html__('Social Icons', 'logistic-business') . '|social', 
				esc_html__('Custom HTML', 'logistic-business') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'logistic-business'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'logistic-business'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'logistic-business'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'logistic-business') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '&copy; ' . date('Y') . ' ' . CMSMASTERS_FULLNAME, 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

