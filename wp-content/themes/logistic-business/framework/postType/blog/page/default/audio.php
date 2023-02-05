<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.8
 * 
 * Blog Page Default Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = !is_home() ? explode(',', $cmsmasters_metadata) : array();


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || (is_home() && CMSMASTERS_CONTENT_COMPOSER)) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsmasters_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);

?>

<!--_________________________ Start Audio Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_default_type'); ?>>
	<?php 
		$date ? logistic_business_get_post_date('page', 'default') : '';
	?>
	<div class="cmsmasters_post_cont">
	<?php
		logistic_business_post_heading(get_the_ID(), 'h2');
		
		
		if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
			$attrs = array(
				'preload' => 'none'
			);
			
			
			foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
				$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
			}
			
			
			echo '<div class="cmsmasters_audio">' . 
				wp_audio_shortcode($attrs) . 
			'</div>';
		}
		
		
		logistic_business_default_post_exc_cont(); 
		
		
		if ($more) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				$more ? logistic_business_post_more(get_the_ID()) : '';
				
			echo '</footer>';
		}
		
		
		if ($author || $categories || $tags || $likes || $comments) {
			echo '<div class="cmsmasters_post_cont_info entry-meta' . ((!$more && theme_excerpt(20, false) == '') ? ' no_bdb' : '') . '">';
				
				if ($comments || $likes) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						$comments ? logistic_business_get_post_comments('page') : '';
						
						$likes ? logistic_business_get_post_likes('page') : '';
						
					echo '</div>';
				}
				
				
				$author ? logistic_business_get_post_author('page') : '';
				
				$categories ? logistic_business_get_post_category(get_the_ID(), 'category', 'page', 'default') : '';
				
				$tags ? logistic_business_get_post_tags('page') : '';
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Audio Article _________________________ -->

