<?php
/**
 * Adds a submenu page under a custom post type parent.
 */

 if (! function_exists('octt_submenu_register')){
    function octt_submenu_register(){
        add_submenu_page(
            'options-general.php',
            __('On Click to Top', 'onclick-to-top'),
            __('On Click to Top', 'onclick-to-top'),
            'manage_options',
            'on-click-to-top',
            'octt_callback'
        );
    }
    add_action('admin_menu', 'octt_submenu_register');
 }

