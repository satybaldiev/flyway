<?php 
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.1.1
 * 
 * Template Functions for Blog & Post
 * Created by CMSMasters
 * 
 */


/* Get Posts Heading Function */
function logistic_business_post_heading($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<header class="cmsmasters_post_header entry-header">' . 
		'<' . esc_html($tag) . ' class="cmsmasters_post_title entry-title">' . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Heading Without Link Function */
function logistic_business_post_title_nolink($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<' . esc_html($tag) . ' class="cmsmasters_post_title entry-title">' . 
		esc_html(strip_tags(get_the_title($cmsmasters_id) ? get_the_title($cmsmasters_id) : $cmsmasters_id)) . 
	'</' . esc_html($tag) . '>';
	
	
	if ($show) {
		echo  wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Date Function */
function logistic_business_get_post_date($template_type = 'page', $layout_type = 'default', $show = true) {
	if ($template_type == 'page') {
		if ($layout_type == 'default' || $layout_type == 'timeline') {
			$out = '<span class="cmsmasters_post_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					'<span class="cmsmasters_day">' . esc_html(get_the_date('j')) . '</span>' . 
					'<span class="cmsmasters_mon">' . esc_html(get_the_date('M')) . '</span>' .
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					esc_html(get_the_modified_date()) . 
				'</abbr>' . 
			'</span>';
		} elseif ($layout_type == 'masonry' || $layout_type == 'puzzle') {
			$out = '<span class="cmsmasters_post_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					esc_html(get_the_date()) . 
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					esc_html(get_the_modified_date()) . 
				'</abbr>' . 
			'</span>';
		} elseif ($layout_type == 'related') {
			$out = '<span class="cmsmasters_single_slider_item_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					esc_html(get_the_date()) . 
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					esc_html(get_the_modified_date()) . 
				'</abbr>' . 
			'</span>';
		}
	} elseif ($template_type == 'post') {
		$cmsmasters_option = logistic_business_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_date']) {
			$out = '<span class="cmsmasters_post_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					'<span class="cmsmasters_day">' . esc_html(get_the_date('j')) . '</span>' . 
					'<span class="cmsmasters_mon">' . esc_html(get_the_date('M')) . '</span>' .
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					esc_html(get_the_modified_date()) . 
				'</abbr>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Author Function */
function logistic_business_get_post_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_post_user_name">' . 
			esc_html__('by', 'logistic-business') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'logistic-business') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author">' . 
			'<span class="fn">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
			'</a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = logistic_business_get_global_options();
		$out = '';
		
		if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_author']) {
			$out .= '<span class="cmsmasters_post_user_name">' . 
				esc_html__('by', 'logistic-business') . ' ' . 
				'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'logistic-business') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author">' . 
				'<span class="fn">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
				'</a>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Category Function */
function logistic_business_get_post_category($cmsmasters_id, $taxonomy, $template_type = 'page', $layout_type = 'default', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			if ($layout_type == 'default') {
				$out .= '<span class="cmsmasters_post_category">' . 
					esc_html__('in', 'logistic-business') . ' ' . 
					logistic_business_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
				'</span>';
			} elseif ($layout_type == 'masonry') {
				$out .= '<span class="cmsmasters_post_category">' . 
					logistic_business_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
				'</span>';
			}
		} elseif ($template_type == 'post') {
			$cmsmasters_option = logistic_business_get_global_options();
			
			
			if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_cat']) {
				$out .= '<span class="cmsmasters_post_category">' . 
					esc_html__('in', 'logistic-business') . ' ' . 
					logistic_business_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
				'</span>';
			}
		} elseif ($template_type == 'related') {
			$out .= '<span class="related_posts_item_cat">' . 
				logistic_business_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Posts Tags Function */
function logistic_business_get_post_tags($template_type = 'page', $show = true) {
	if (get_the_tags()) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_post_tags">' . 
				get_the_tag_list(esc_html__('tags', 'logistic-business') . ' ', ', ', '') . 
			'</span>';
		} else if ($template_type == 'post') {
			$cmsmasters_option = logistic_business_get_global_options();
			$out = '';
			
			if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_tag']) {
				$out .= '<span class="cmsmasters_post_tags">' . 
					get_the_tag_list(esc_html__('tags', 'logistic-business') . ' ', ', ', '') . 
				'</span>';
			}
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Posts Content/Excerpt Function */
function logistic_business_post_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_post_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(20, false)) . 
	'</div>' . "\n");
	
	
	if (theme_excerpt(20, false) != '') {
		if ($show) {
			logistic_business_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Posts Content/Excerpt Function */
function logistic_business_default_post_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_post_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(50, false)) . 
	'</div>' . "\n");
	
	
	if (theme_excerpt(50, false) != '') {
		if ($show) {
			echo logistic_business_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Posts Like Function */
function logistic_business_get_post_likes($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = cmsmastersLike(false);
	} elseif ($template_type == 'post') {
		$cmsmasters_option = logistic_business_get_global_options();
		$out = '';
		
		if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_like']) {
			$out = cmsmastersLike(false);
		}
	}
	
	
	if ($show) {
		echo logistic_business_return_content($out);
	} else {
		return $out;
	}
}



/* Get Posts Comments Function */
function logistic_business_get_post_comments($template_type = 'page', $show = true) {
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'logistic-business') . ' ' . esc_attr(get_the_title()) . '">' . 
				'<span>' . esc_html(get_comments_number()) . '</span>' . 
			'</a>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = logistic_business_get_global_options();
			$out = '';
			
			if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_comment']) {
				$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'logistic-business') . ' ' . esc_attr(get_the_title()) . '">' . 
					'<span>' . esc_html(get_comments_number()) . '</span>' . 
				'</a>';
			}
		}
		
		
		if ($show) {
			echo logistic_business_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Posts More Button/Link Function */
function logistic_business_post_more($cmsmasters_id, $show = true) {
	$cmsmasters_post_read_more = get_post_meta($cmsmasters_id, 'cmsmasters_post_read_more', true);
	
	
	if ($cmsmasters_post_read_more == '') {
		$cmsmasters_post_read_more = esc_attr__('Continue reading', 'logistic-business');
	}
	
	
	$out = '<a class="cmsmasters_post_read_more" href="' . esc_url(get_permalink($cmsmasters_id)) . '">' . esc_html($cmsmasters_post_read_more) . '</a>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Post Format Icon Placeholder Function */
function logistic_business_post_format_icon_placeholder($cmsmasters_id, $format = 'std', $show = true) {
	$out = '<figure class="cmsmasters_img_wrap">' . 
		'<a href="' . esc_url(get_permalink()) . '" title="' . cmsmasters_title($cmsmasters_id, false) . '" class="preloader cmsmasters_theme_icon_' . esc_attr($format) . '"></a>' . 
	'</figure>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}

