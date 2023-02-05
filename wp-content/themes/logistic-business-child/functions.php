<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business Child
 * @version		1.0.0
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function logistic_business_child_enqueue_styles() {
    wp_enqueue_style('logistic-business-child-style', get_stylesheet_uri(), array('theme-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'logistic_business_child_enqueue_styles', 11);
?>