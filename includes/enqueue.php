<?php
if (!defined('ABSPATH')) exit;
/**
 * Frontend Assets
 */

function octt_assets() {
    if (is_admin()) {
        wp_enqueue_script('jquery-ui-draggable', false, array('jquery', 'jquery-ui-core'), OCTT_VERSION, false);
        wp_enqueue_style('octt-admin', OCTT_ASSETS . "/css/admin.css", array('wp-color-picker'), OCTT_VERSION, 'all');
        wp_enqueue_script('octt-admin', OCTT_ASSETS . "/js/admin.js", array('jquery', 'wp-color-picker'), OCTT_VERSION, true);

        wp_enqueue_media();

        // Localize script for admin
        wp_localize_script('octt-admin', 'octt_data', get_octt_localized_data());
    }

    if ( 1 == get_option('octt_icon_enable_button', true)) {
        wp_enqueue_script('jquery-ui-draggable', false, array('jquery', 'jquery-ui-core'), OCTT_VERSION, false);
        wp_enqueue_style('octt-main', OCTT_ASSETS . "/css/frontend.css", array(), OCTT_VERSION);
        wp_enqueue_script('octt-main', OCTT_ASSETS . "/js/frontend.js", array('jquery'), OCTT_VERSION, true);

        // Localize script for frontend
        wp_localize_script('octt-main', 'octt_data', get_octt_localized_data());
    }
}
add_action('wp_enqueue_scripts', 'octt_assets');
add_action('admin_enqueue_scripts', 'octt_assets');

/**
 * Get Localize data
 * @return array
 */
function get_octt_localized_data() {
    return array(
        'offset' => !empty(get_option('octt_icon_button_offset')) ? get_option('octt_icon_button_offset') : '100',
        'duration' => !empty(get_option('octt_icon_scroll_duration')) ? get_option('octt_icon_scroll_duration') : 500,
        'isDraggable' => get_option('octt_icon_enable_button_draggable', 0),
    );
}

/**
* Admin Assets
*/
function octt_admin_assets($hook_suffix) {
    wp_enqueue_script('jquery-ui-draggable', false, array('jquery', 'jquery-ui-core'), OCTT_VERSION, false);
    wp_enqueue_style('octt-admin', OCTT_ASSETS . "/css/admin.css", array('wp-color-picker'), OCTT_VERSION, 'all');
    wp_enqueue_script('octt-admin', OCTT_ASSETS . "/js/admin.js", array('jquery', 'wp-color-picker'), OCTT_VERSION, true);

    wp_localize_script('octt-admin', 'octt_data', array(
        'isDraggable'   =>  get_option('octt_icon_enable_button_draggable', 1),
    ));

    wp_enqueue_media();
};
// add_action('admin_enqueue_scripts', 'octt_admin_assets');
