<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version 	1.1.1
 * 
 * Content Composer Quote Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


if ($content == null || $content == "<br />\n") {
	$this->quotes_atts['quote_content'] = esc_html__('Enter quote text here', 'logistic-business');
} else {
	$this->quotes_atts['quote_content'] = $content;
}

$this->quotes_atts['quote_image'] = 	$image;
$this->quotes_atts['quote_name'] = 		$name;
$this->quotes_atts['quote_subtitle'] = 	$subtitle;
$this->quotes_atts['quote_color'] = 	$color;
$this->quotes_atts['quote_link'] = 		$link;
$this->quotes_atts['quote_website'] = 	$website;


$quote_out = '';


if ($this->quotes_atts['quote_mode'] == 'grid' && ($this->quotes_atts['quote_counter'] == $this->quotes_atts['column_count'])) {
	$quote_out .= '</div><div class="quotes_list">';
	
	$this->quotes_atts['quote_counter'] = 0;
}

$this->quotes_atts['quote_counter']++;


$quote_out .= '<div class="cmsmasters_quote' . 
	(($classes != '') ? ' ' . $classes : '') . 
'">' . "\n" . 

	cmsmasters_composer_ob_load_template('framework/postType/quote/' . $this->quotes_atts['quote_mode'] . (($this->quotes_atts['quote_mode'] != 'grid') ? '-' . $this->quotes_atts['quote_type'] : '') . '.php', $this->quotes_atts) . 
	
'</div>' . "\n";


echo logistic_business_return_content($quote_out);