<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.1.1
 * 
 * Blog Post Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = logistic_business_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);


list($cmsmasters_layout) = logistic_business_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'cmsmasters-masonry-thumb';
}

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		logistic_business_get_post_date('post');
	?>
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				logistic_business_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), false, false, false, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				logistic_business_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), false, false, false, true, false);
			}
		}
		
		
		if ($cmsmasters_post_title == 'true') {
			echo '<header class="cmsmasters_post_header entry-header">' . 
				logistic_business_post_title_nolink(get_the_ID(), 'h2', false) . 
			'</header>';
		}
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_post_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'logistic-business') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => '<span>', 
					'link_after' => '</span>' 
				));
				
			echo '<div class="cl"></div>' . 
			'</div>';
		}
		
		
		if (  
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_author'] || 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_cat'] || 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_tag'] || 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_like'] || 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_comment'] 
		) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
				if ( 
					$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_like'] || 
					$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_comment'] 
				) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						logistic_business_get_post_likes('post');
						
						logistic_business_get_post_comments('post');
						
					echo '</div>';
				}
				
				
				logistic_business_get_post_author('post');
				
				logistic_business_get_post_category(get_the_ID(), 'category', 'post');
				
				logistic_business_get_post_tags('post');
				
			echo '</div>';
		}
		
		
		if ($cmsmasters_post_sharing_box == 'true') {
			logistic_business_sharing_box(esc_html__('Share It', 'logistic-business'), 'h6');
		}
	?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

