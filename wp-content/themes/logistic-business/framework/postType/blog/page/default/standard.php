<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.8
 * 
 * Blog Page Default Standard Post Format Template
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

?>

<!--_________________________ Start Standard Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_default_type'); ?>>
	<?php 
		$date ? logistic_business_get_post_date('page', 'default') : '';
	?>
	<div class="cmsmasters_post_cont">
	<?php
		if (!post_password_required() && has_post_thumbnail()) {
			logistic_business_thumb(get_the_ID(), 'post-thumbnail', true, false, false, false, false, true, false);
		}
		
		
		logistic_business_post_heading(get_the_ID(), 'h2');
		
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
<!--_________________________ Finish Standard Article _________________________ -->

