<?php
/**
 * @package 	WordPress
 * @subpackage 	Logistic Business
 * @version		1.0.9
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = logistic_business_get_global_options();
?>


		</div>
	</div>
</div>
<!-- _________________________ Finish Middle _________________________ -->
<?php 

get_sidebar('bottom');

?>
<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>
</div>
<!-- _________________________ Finish Main _________________________ -->

<!-- _________________________ Start Footer _________________________ -->
<footer id="footer" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_scheme'] . ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small'); ?>">
	<div class="footer_border">
		<div class="footer_inner">
		<?php 
			logistic_business_footer_logo($cmsmasters_option);
			
			
			logistic_business_get_footer_custom_html($cmsmasters_option);
			
			
			logistic_business_get_footer_nav($cmsmasters_option);
			
			
			logistic_business_get_footer_social_icons($cmsmasters_option);
		?>
			<span class="footer_copyright copyright">
			<?php 
			if (function_exists('the_privacy_policy_link')) {
				the_privacy_policy_link('', ' / ');
			}
			
			echo esc_html(stripslashes($cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_copyright']));
			?>
			</span>
		</div>
	</div>
</footer>
<!-- _________________________ Finish Footer _________________________ -->

</div>
<span class="cmsmasters_responsive_width"></span>
<!-- _________________________ Finish Page _________________________ -->

<?php wp_footer(); ?>
</body>
</html>
