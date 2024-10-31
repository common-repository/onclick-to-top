<?php

/**
 * Plugin Name: Onclick to Top
 * Description: Onclick to Top allow users return to the top of any page or post, eliminating the need for tedious scrolling. Customize the button's appearance to match your website's design is also applicable
 * Version: 1.0.1
 * Author: Md Akash Ahmed
 * Author URI: https://profiles.wordpress.org/mdakashahmed/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: onclick-to-top
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) exit;


/** define constants */
define( 'OCTT_VERSION', '1.0.1' );
define( 'OCTT_FILE', __FILE__ );
define( 'OCTT_PATH', dirname( OCTT_FILE ) );
define( 'OCTT_INCLUDES', OCTT_PATH . '/includes' );
define( 'OCTT_URL', plugins_url( '', OCTT_FILE ) );
define( 'OCTT_ASSETS', OCTT_URL . '/assets' );

function octt_activation_hook(){

}
register_activation_hook(__FILE__, "octt_activation_hook");

function octt_deactivation_hook(){
}

register_deactivation_hook(__FILE__, "octt_deactivation_hook");


/**
 * includes files
 */
require_once OCTT_INCLUDES .  '/enqueue.php';
require_once OCTT_INCLUDES .  '/menu.php';
require_once OCTT_INCLUDES .  '/settings.php';
require_once OCTT_INCLUDES .  '/render.php';

require_once OCTT_INCLUDES .  '/base.php';