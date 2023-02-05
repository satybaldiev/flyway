<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.1.1
 * 
 * Comments Template
 * Created by CMSMasters
 * 
 */


if (post_password_required()) { 
	echo '<p class="nocomments">' . esc_html__('This post is password protected. Enter the password to view comments.', 'logistic-business') . '</p>';
	
	
    return;
}


if (comments_open()) {
	if (have_comments()) {
		echo '<aside id="comments" class="post_comments">' . "\n" . 
			'<h6 class="post_comments_title">';
		
		
		comments_number(esc_attr__('No Comments', 'logistic-business'), esc_attr__('Comment', 'logistic-business') . ' (1)', esc_attr__('Comments', 'logistic-business') . ' (%)');
		
		
		echo '</h6>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">';
				
				if (get_previous_comments_link()) {
					echo '<span class="fl">';
						
						previous_comments_link('&larr; ' . esc_attr__('Older Comments', 'logistic-business'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="fr">';
						
						next_comments_link(esc_attr__('Newer Comments', 'logistic-business') . ' &rarr;');
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '<ol class="commentlist">' . "\n";
		
		
		wp_list_comments(array( 
			'type' => 'comment', 
			'callback' => 'mytheme_comment' 
		));
		
		
		echo '</ol>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi">';
				
				if (get_previous_comments_link()) {
					echo '<span class="fl">';
						
						previous_comments_link('&larr; ' . esc_attr__('Older Comments', 'logistic-business'));
						
					echo '</span>';
				}
				
				
				if (get_next_comments_link()) {
					echo '<span class="fr">';
						
						next_comments_link(esc_attr__('Newer Comments', 'logistic-business') . ' &rarr;');
						
					echo '</span>';
				}
				
			echo '</aside>';
		}
		
		
		echo '</aside>';
	}


	$form_fields =  array( 
		'author' => '<p class="comment-form-author">' . "\n" . 
			'<label for="author">' . esc_html__('Your name', 'logistic-business') . (($req) ? ' <span class="cmsmasters_req">*</span>' : '') . '</label>' . "\n" . 
			'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' />' . "\n" . 
		'</p>' . "\n", 
		'email' => '<p class="comment-form-email">' . "\n" . 
			'<label for="email">' . esc_html__('Email', 'logistic-business') . (($req) ? ' <span class="cmsmasters_req">*</span>' : '') . '</label>' . "\n" . 
			'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . ' />' . "\n" . 
		'</p>' . "\n" 
	);


	if (get_option('show_comments_cookies_opt_in') == '1') {
		$form_fields['cookies'] = '<p class="comment-form-cookies-consent">' . "\n" . 
			'<input type="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' />' . "\n" . 
			'<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'logistic-business') . '</label>' . "\n" . 
		'</p>' . "\n";
	}


	comment_form(array( 
		'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
		'comment_field' => 		'<p class="comment-form-comment">' . 
									'<label for="comment">' . esc_html__('Message', 'logistic-business') . '</label>' . 
									'<textarea name="comment" id="comment" cols="67" rows="2"></textarea>' . 
								'</p>', 
		'must_log_in' => 		'<p class="must-log-in">' . 
									esc_html__('You must be', 'logistic-business') . 
									' <a href="' . esc_url(wp_login_url(apply_filters('the_permalink', get_permalink()))) . '">' 
										. esc_html__('logged in', 'logistic-business') . 
									'</a> ' 
									. esc_html__('to post a comment', 'logistic-business') . 
								'.</p>' . "\n", 
		'logged_in_as' => 		'<p class="logged-in-as">' . 
									esc_html__('Logged in as', 'logistic-business') . 
									' <a href="' . esc_url(admin_url('profile.php')) . '">' . 
										$user_identity . 
									'</a>. ' . 
									'<a class="all" href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '" title="' . esc_attr__('Log out of this account', 'logistic-business') . '">' . 
										esc_html__('Log out?', 'logistic-business') . 
									'</a>' . 
								'</p>' . "\n", 
		'comment_notes_before' => 	'<p class="comment-notes">' . 
										esc_html__('Your email address will not be published.', 'logistic-business') . 
									'</p>' . "\n", 
		'comment_notes_after' => 	'', 
		'id_form' => 				'commentform', 
		'id_submit' => 				'submit', 
		'title_reply' => 			esc_html__('Leave a Reply', 'logistic-business'), 
		'title_reply_to' => 		esc_html__('Leave your comment to', 'logistic-business'), 
		'cancel_reply_link' => 		esc_html__('Cancel Reply', 'logistic-business'), 
		'label_submit' => 			esc_html__('Add Comment', 'logistic-business') 
	));
}

