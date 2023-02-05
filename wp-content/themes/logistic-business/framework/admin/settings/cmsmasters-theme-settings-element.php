<?php 
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version 	1.0.2
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function logistic_business_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'logistic-business');
	$tabs['icon'] = esc_attr__('Social Icons', 'logistic-business');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'logistic-business');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'logistic-business');
	$tabs['error'] = esc_attr__('404', 'logistic-business');
	$tabs['code'] = esc_attr__('Custom Codes', 'logistic-business');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'logistic-business');
	}
	
	return $tabs;
}


function logistic_business_options_element_sections() {
	$tab = logistic_business_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'logistic-business');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'logistic-business');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'logistic-business');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'logistic-business');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'logistic-business');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'logistic-business');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'logistic-business');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function logistic_business_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = logistic_business_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'logistic-business'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => CMSMASTERS_SHORTNAME . '_social_icons', 
			'title' => esc_html__('Social Icons', 'logistic-business'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-linkedin|#|' . esc_html__('Linkedin', 'logistic-business') . '|true||', 
				'cmsmasters-icon-facebook|#|' . esc_html__('Facebook', 'logistic-business') . '|true||', 
				'cmsmasters-icon-gplus|#|' . esc_html__('Google', 'logistic-business') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'logistic-business') . '|true||', 
				'cmsmasters-icon-skype|#|' . esc_html__('Skype', 'logistic-business') . '|true||' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'logistic-business') . '|dark', 
				esc_html__('Light', 'logistic-business') . '|light', 
				esc_html__('Mac', 'logistic-business') . '|mac', 
				esc_html__('Metro Black', 'logistic-business') . '|metro-black', 
				esc_html__('Metro White', 'logistic-business') . '|metro-white', 
				esc_html__('Parade', 'logistic-business') . '|parade', 
				esc_html__('Smooth', 'logistic-business') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_path', 
			'title' => esc_html__('Path', 'logistic-business'), 
			'desc' => esc_html__('Sets path for switching windows', 'logistic-business'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'logistic-business') . '|vertical', 
				esc_html__('Horizontal', 'logistic-business') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'logistic-business'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'logistic-business'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'logistic-business'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'logistic-business'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'logistic-business'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'logistic-business'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'logistic-business'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'logistic-business'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'logistic-business'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'logistic-business'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'logistic-business'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'logistic-business'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'logistic-business') . '|center', 
				esc_html__('Fit', 'logistic-business') . '|fit', 
				esc_html__('Fill', 'logistic-business') . '|fill', 
				esc_html__('Stretch', 'logistic-business') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets buttons be available or not', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'logistic-business'), 
			'desc' => esc_html__('Enable the arrow buttons', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets the fullscreen button', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'logistic-business'), 
			'desc' => esc_html__('Sets the swipe navigation', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'logistic-business'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_color', 
			'title' => esc_html__('Text Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'logistic-business'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'logistic-business'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_search', 
			'title' => esc_html__('Search Line', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'logistic-business'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'logistic-business'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_key', 
			'title' => esc_html__('Twitter API key', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'logistic-business'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

