<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.9
 * 
 * Single Profile Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = logistic_business_get_global_options();


$cmsmasters_profile_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_profile_sharing_box', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="profiles opened-article">' . "\n";
	
	
	get_template_part('framework/postType/profile/post/standard');

	
	if ($cmsmasters_profile_sharing_box == 'true') {
		logistic_business_sharing_box(esc_html__('Share this profile?', 'logistic-business'), 'h3');
	}
	
	
	if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_profile_post_nav_box']) {
		logistic_business_prev_next_posts();
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

