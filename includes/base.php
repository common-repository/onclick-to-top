<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
class OCTT_Top{
    /**
	 * Constructor.
	 *
	 * @since 1.0.1
	 */

    public function __construct(){
        add_action('plugins_loaded', array($this, 'octt_bootstrp'));
        add_filter('plugin_action_links', array($this, 'octt_settings_link'), 10, 2);

        $this->includes();

		register_activation_hook( OCTT_FILE, array( $this, 'activate' ) );

		// do_action( 'OCTT_loaded' );
    }
    public function octt_bootstrp(){
        load_plugin_textdomain('onclick-to-top', false, OCTT_PATH . "/languages");
    }

    public function octt_settings_link($plugin_actions, $plugin_file){
        $new_actions = array();

        if (plugin_basename(OCTT_FILE) === $plugin_file) {
            $new_actions['octt_settings'] = sprintf('<a href="%s">%s</a>',  esc_url(admin_url('options-general.php?page=on-click-to-top')), __('Settings', 'onclick-to-top'));
        }

        return array_merge($new_actions, $plugin_actions);
    }



	public function activate() {
		include_once OCTT_INCLUDES . '/class-install.php';

		OCTT_Install::activate();
	}
    
	public function includes() {
		include_once OCTT_INCLUDES . '/menu.php';
		include_once OCTT_INCLUDES . '/enqueue.php';
		include_once OCTT_INCLUDES . '/render.php';
		include_once OCTT_INCLUDES . '/settings.php';
	}
}

new OCTT_Top();


// re direct function
add_action('activated_plugin',function($plugin){
    if(plugin_basename( OCTT_FILE )==$plugin){
        wp_redirect(admin_url('options-general.php?page=on-click-to-top'));
        die();
    }
});

function octt_save_custom_icon() {
    if (isset($_FILES['octt_custom_icon']) && !empty($_FILES['octt_custom_icon']['tmp_name'])) {
        $file = $_FILES['octt_custom_icon'];

        // Check if the file type is allowed
        $allowed_types = array('image/png', 'image/jpeg', 'image/jpg', 'image/svg');
        if (in_array($file['type'], $allowed_types)) {
            // Handle the file upload
            $uploaded_file = wp_handle_upload($file, array('test_form' => false));

            // Check for errors during upload
            if (isset($uploaded_file['error'])) {
                add_settings_error('octt_custom_icon', 'upload_error', 'Error uploading file: ' . $uploaded_file['error'], 'error');
            } elseif (isset($uploaded_file['url'])) {
                update_option('octt_custom_icon', $uploaded_file['url']);
            }
        } else {
            // Handle the error if the file type is not allowed
            add_settings_error('octt_custom_icon', 'file_type_error', 'File type not allowed. Only PNG and JPEG are allowed.', 'error');
        }
    }
}
add_action('admin_init', 'octt_save_custom_icon');



function octt_remove_custom_icon() {
    delete_option('octt_custom_icon');
    wp_die();
}
add_action('wp_ajax_remove_custom_icon', 'octt_remove_custom_icon');


