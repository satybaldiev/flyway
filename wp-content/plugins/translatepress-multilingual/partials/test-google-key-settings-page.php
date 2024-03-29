<?php

$trp = TRP_Translate_Press::get_trp_instance();
$machine_translator = $trp->get_component( 'machine_translator' );
$response = $machine_translator->send_request( 'en', 'es', array( 'about' ) );

?>
<div id="trp-addons-page" class="wrap">

    <h1> <?php esc_html_e( 'TranslatePress Settings', 'translatepress-multilingual' );?></h1>
    <?php do_action ( 'trp_settings_navigation_tabs' ); ?>

    <div class="grid feat-header">
        <div class="grid-cell">
            <h2><?php esc_html_e('Google API Key from settings page:', 'translatepress-multilingual');?> <span style="font-family:monospace"><?php echo esc_html( $this->settings['g-translate-key'] ); ?></span></h2>

            <h2><?php esc_html_e('HTTP Referrer:', 'translatepress-multilingual');?> <span style="font-family:monospace"><?php echo esc_url( $machine_translator->get_referer() ); ?></span></h2>
            <p><?php esc_html_e('Use this HTTP Referrer if you want to restrict usage of the API from Google Dashboard.', 'translatepress-multilingual'); ?></p>

            <h3><?php esc_html_e('Response:', 'translatepress-multilingual');?></h3>
            <pre>
                <?php print_r( esc_html( $response["response"] ) ); ?>
            </pre>
            <h3><?php esc_html_e('Response Body:', 'translatepress-multilingual');?></h3>
            <pre>
                <?php print_r( esc_html( $response["body"] ) ); ?>
            </pre>

            <h3><?php esc_html_e('Entire Response From wp_remote_get():', 'translatepress-multilingual');?></h3>
            <pre>
                <?php print_r( esc_html( $response ) ); ?>
            </pre>
        </div>
    </div>


</div>