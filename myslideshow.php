<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin
 *
 * @link              rahicodes.wordpress.com
 * @since             1.0.1
 * @package           Myslideshow
 *
 * @wordpress-plugin
 * Plugin Name:       MySlideShow
 * Plugin URI:        rahicodes.wordpress.com
 * Description:       This plugin allows you to display a fully functional and responsive slideshow anywhere in your site by just using a shortcode!
 * Version:           1.0.3
 * Author:            Rahi Prajapati
 * Author URI:        rahicodes.wordpress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       myslideshow
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MYSLIDESHOW_VERSION', '1.0.3' );

/**
 * Global options
 */
$defaults = array(
    'image_urls' => '',
    'images_number' => '0',
);
$slides_options = get_option( 'mss_settings', $defaults );

if ( $slides_options == '' ) {
    update_option( 'mss_settings', $defaults );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-myslideshow-activator.php
 */
function activate_myslideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-myslideshow-activator.php';
	Myslideshow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-myslideshow-deactivator.php
 */
function deactivate_myslideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-myslideshow-deactivator.php';
	Myslideshow_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_myslideshow' );
register_deactivation_hook( __FILE__, 'deactivate_myslideshow' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-myslideshow.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_myslideshow() {

	$plugin = new Myslideshow();
	$plugin->run();

}
run_myslideshow();
