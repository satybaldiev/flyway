<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.0
 * 
 * Blog Page Puzzle Standard Post Format Template
 * Created by CMSMasters
 * 
 */



$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsmasters_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Standard Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_puzzle_type'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
	<?php
		if (!post_password_required() && has_post_thumbnail()) {
			logistic_business_thumb(get_the_ID(), 'cmsmasters-project-thumb', true, false, true, false, true, true, false);
		} else {
			logistic_business_post_format_icon_placeholder(get_the_ID(), 'std');
		}
		
		
		echo '<div class="puzzle_post_content_wrapper">' . 
			'<div class="puzzle_post_content_wrap">';
			
			$date ? logistic_business_get_post_date('page', 'puzzle') : '';
			
			logistic_business_post_heading(get_the_ID(), 'h6');
			
			logistic_business_post_exc_cont();
			
			$more ? logistic_business_post_more(get_the_ID()) : '';
			
			
			if ($author || $categories || $tags || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">' . 
					'<div class="cmsmasters_post_footer_info">';
						
						$comments ? logistic_business_get_post_comments('page') : '';
						
						$likes ? logistic_business_get_post_likes('page') : '';
						
					echo '</div>';
					
					
					$author ? logistic_business_get_post_author('page') : '';
					
					$categories ? logistic_business_get_post_category(get_the_ID(), 'category', 'page') : '';
					
					$tags ? logistic_business_get_post_tags('page') : '';
					
				echo '</footer>';
			}
			
			
		echo '</div>' . 
		'</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->

