<?php 
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.9
 * 
 * Default Main Page Template
 * Created by CMSMasters
 * 
 */


get_header();


list($cmsmasters_layout) = logistic_business_theme_page_layout_scheme();


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}

	echo '<div class="blog">' . "\n";
	
	if (have_posts()) :
		while (have_posts()) : the_post();
			if (get_post_format() != '') {
				get_template_part('framework/postType/blog/page/default/' . get_post_format());
			} else {
				get_template_part('framework/postType/blog/page/default/standard');
			}
		endwhile;
		
		echo cmsmasters_pagination();
	endif;
		
	echo '</div>' . "\n" . 
'</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar fl" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
}


get_footer();

