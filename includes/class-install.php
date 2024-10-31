<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Install
 */
class OCTT_Install {

	/**
	 * Plugin activation stuffs
	 *
	 * @since 1.0.1
	 */
	public static function activate() {
		self::create_default_data();
	}


	public static function deactivate() {
	}


	/**
	 * Create plugin settings default data
	 *
	 * @since 1.0.1
	 */
	private static function create_default_data() {

		$version      = get_option( 'octt_version', '0' );
		$install_time = get_option( 'octt_install_time', '' );
        $active_octt = get_option('octt_icon_enable_button');
        $active_octt_width = get_option('octt_icon_width');
        $active_octt_icon_size = get_option('octt_icon_font_size');
        $active_octt_border_radius = get_option('octt_icon_border_radius');
        $active_octt_icon_color = get_option('octt_icon_color');
        $active_octt_background_color = get_option('octt_icon_background_color');
        $active_octt_icon_hover_color = get_option('octt_icon_hover_color');
        $active_octt_icon_hide_on_mobile = get_option('octt_hide_on_mobile');
        $active_octt_icon_hide_on_tablet = get_option('octt_hide_on_tablet');
        $active_octt_icon_hide_on_desktop = get_option('octt_hide_on_desktop');
        $active_octt_icon_progress_width = get_option('octt_icon_progress_width');
        $active_octt_icon_icon_progress_color = get_option('octt_icon_progress_color');
        $active_octt_icon_icon_enable_progressbar = get_option('octt_icon_enable_progressbar');

		if ( empty( $version ) ) {
			update_option( 'octt_version', OCTT_VERSION );
		}

		if ( empty( $install_time ) ) {
			update_option( 'octt_install_time', time() );
		}

        if( empty( $active_octt )){
            update_option('octt_icon_enable_button', true);
        }

        if( empty( $active_octt_width )){
            update_option('octt_icon_width', '30');
        }
        if( empty( $active_octt_icon_size )){
            update_option('octt_icon_font_size', '16');
        }
        if( empty( $active_octt_border_radius )){
            update_option('octt_icon_border_radius', '50');
        }
        if( empty( $active_octt_icon_color)){
            update_option('octt_icon_color', '#fff');
        }
        if( empty( $active_octt_background_color)){
            update_option('octt_icon_background_color', '#ed5839');
        }
        if( empty( $active_octt_icon_hover_color)){
            update_option('octt_icon_hover_color', '#000');
        }
        if( empty( $active_octt_icon_icon_progress_color)){
            update_option('octt_icon_progress_color', '#fff');
        }
        if( empty( $active_octt_icon_progress_width)){
            update_option('octt_icon_progress_width', '2');
        }
        if( empty( $active_octt_icon_hide_on_mobile)){
            update_option('octt_hide_on_mobile', 1 );
        }
        if( empty( $active_octt_icon_hide_on_tablet)){
            update_option('octt_hide_on_tablet', 1 );
        }
        if( empty( $active_octt_icon_hide_on_desktop)){
            update_option('octt_hide_on_desktop', 1 );
        }
        if( empty( $active_octt_icon_icon_enable_progressbar)){
            update_option('octt_icon_enable_progressbar', true );
        }
        


	}

}