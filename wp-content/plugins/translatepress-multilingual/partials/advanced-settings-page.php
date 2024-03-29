
<div id="trp-advanced-settings" class="wrap">
    <form method="post" action="options.php">
        <?php settings_fields( 'trp_advanced_settings' ); ?>
        <h1> <?php esc_html_e( 'TranslatePress Advanced Settings', 'translatepress-multilingual' );?></h1>
        <?php do_action ( 'trp_settings_navigation_tabs' ); ?>

        <table id="trp-options" class="form-table">
            <?php do_action('trp_output_advanced_settings_options' ); ?>
        </table>
	    <?php submit_button( __( 'Save Changes', 'translatepress-multilingual' ) ); ?>
    </form>
</div>
