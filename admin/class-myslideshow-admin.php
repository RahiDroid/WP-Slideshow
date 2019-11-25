<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       rahicodes.wordpress.com
 * @since      1.0.0
 *
 * @package    Myslideshow
 * @subpackage Myslideshow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Myslideshow
 * @subpackage Myslideshow/admin
 * @author     Rahi Prajapati <rahi.prajapati1811@gmail.com>
 */
class Myslideshow_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {

		
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Myslideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Myslideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/myslideshow-admin.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Myslideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Myslideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/myslideshow-admin.js', array('jquery'), $this->version, false);

	}

	/********* CUSTOM FUNCTIONS START HERE ***********/
		/**
		 * Function for our settings page
		 * 
		 * @since    1.0.1
		 */
	public function mss_settings_page() {

		/**
		 * for adding the settings page under "Settings" menu
		 * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		 */

		/**
		 * for adding the page under root menu
		 * add_menu_page( string $page_title, string $menu_title, string $capability,
		 *  string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
		 */

		//'book_render_settings_page' function in : .../admin/partials/rahi_wpbook-admin-display.php   
		add_menu_page( __( 'My Slide Show Settings', 'myslideshow' ), __( 'Slideshow Settings', 'myslideshow' ), 'manage_options', 'slideshow-settings', 'mss_render_settings_page',
			'dashicons-chart-pie', '59' );
	}
	
	/**
	 * Function for registering settings
	 * 
	 * @since    1.0.1
	 */
	function mss_register_settings() {
		register_setting( 'mss-settings-group', 'mss_settings' );
	}

	/**
	 * Function for adding short code
	 * 
	 * @since    1.0.2
	 */
	public function mss_add_shortcode(  ) {

		// function in : .../admin/partials/myslideshow-admin-display.php        
		return render_mss_shortcode(  );

	}

	function mss_register_shortcodes() {
		add_shortcode( 'slideshow', array( $this, 'mss_add_shortcode' ) );
	}

}
