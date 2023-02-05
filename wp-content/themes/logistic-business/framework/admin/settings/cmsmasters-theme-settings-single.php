<?php 
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile Settings
 * Created by CMSMasters
 * 
 */


function logistic_business_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'logistic-business');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'logistic-business');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'logistic-business');
	}
	
	if (CMSMASTERS_TIMETABLE) {
		$tabs['tt_event'] = esc_attr__('Timetable Event', 'logistic-business');
	}
	
	if (CMSMASTERS_TIMETABLE) {
		$tabs['lpr_course'] = esc_attr__('Course', 'logistic-business');
	}
	
	return $tabs;
}


function logistic_business_options_single_sections() {
	$tab = logistic_business_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'logistic-business');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'logistic-business');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'logistic-business');
		
		
		break;
	case 'tt_event':
		$sections = array();
		
		$sections['tt_event_section'] = esc_attr__('Timetable Event Options', 'logistic-business');
		
		
		break;
	case 'lpr_course':
		$sections = array();
		
		$sections['lpr_course_section'] = esc_attr__('LearnPress Course Options', 'logistic-business');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function logistic_business_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = logistic_business_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'logistic-business'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'logistic-business') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'logistic-business') . '|related', 
				esc_html__('Show Popular Posts', 'logistic-business') . '|popular', 
				esc_html__('Show Recent Posts', 'logistic-business') . '|recent', 
				esc_html__('Hide More Posts Box', 'logistic-business') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'logistic-business'), 
			'desc' => esc_html__('posts', 'logistic-business'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'logistic-business'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'logistic-business'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'logistic-business'), 
			'desc' => esc_html__('Enter a project details block title', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'logistic-business'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'logistic-business') . '|related', 
				esc_html__('Show Popular Projects', 'logistic-business') . '|popular', 
				esc_html__('Show Recent Projects', 'logistic-business') . '|recent', 
				esc_html__('Hide More Projects Box', 'logistic-business') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'logistic-business'), 
			'desc' => esc_html__('projects', 'logistic-business'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'logistic-business'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'logistic-business'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'logistic-business'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'logistic-business'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'logistic-business'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_color', 
			'title' => esc_html__('Profile Color', 'logistic-business'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#01a2a6' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'logistic-business'), 
			'desc' => esc_html__('Enter a profile details block title', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'logistic-business'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'logistic-business'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'tt_event':
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => CMSMASTERS_SHORTNAME . '_tt_event_hours', 
			'title' => esc_html__('Event Hours', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => CMSMASTERS_SHORTNAME . '_tt_event_hours_title', 
			'title' => esc_html__('Event Hours Title', 'logistic-business'), 
			'desc' => esc_html__('Enter a event hours block title', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'Event Hours', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => CMSMASTERS_SHORTNAME . '_tt_event_details_title', 
			'title' => esc_html__('Event Details Title', 'logistic-business'), 
			'desc' => esc_html__('Enter a event details block title', 'logistic-business'), 
			'type' => 'text', 
			'std' => 'Event Details', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => CMSMASTERS_SHORTNAME . '_tt_event_cat', 
			'title' => esc_html__('Event Categories', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		
		break;
	case 'lpr_course':
		$options[] = array( 
			'section' => 'lpr_course_section', 
			'id' => CMSMASTERS_SHORTNAME . '_lpr_course_title', 
			'title' => esc_html__('Course Title', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'),  
			'type' => 'checkbox', 
			'std' => 1
		);
		
		$options[] = array( 
			'section' => 'lpr_course_section', 
			'id' => CMSMASTERS_SHORTNAME . '_lpr_course_image', 
			'title' => esc_html__('Course Featured Image', 'logistic-business'), 
			'desc' => esc_html__('show', 'logistic-business'),  
			'type' => 'checkbox', 
			'std' => 1
		);
		
		
		break;
	}
	
	
	return $options;
}

