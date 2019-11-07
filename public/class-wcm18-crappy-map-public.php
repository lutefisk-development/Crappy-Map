<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       pks-development.se
 * @since      1.0.0
 *
 * @package    Wcm18_Crappy_Map
 * @subpackage Wcm18_Crappy_Map/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wcm18_Crappy_Map
 * @subpackage Wcm18_Crappy_Map/public
 * @author     Per Kristian Svanberg <kristiansvanberg@gmail.com>
 */
class Wcm18_Crappy_Map_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->define_shortcodes();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcm18_Crappy_Map_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcm18_Crappy_Map_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wcm18-crappy-map-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wcm18-crappy-map-public.js', ['jquery'], $this->version, true );

		wp_enqueue_script('crappy-map', 'https://maps.googleapis.com/maps/api/js?key='. WCM18_CRAPPY_MAP_GOOGLE_MAPS_API_KEY .'&callback=initMap', [], false, true);
	}

	/**
	 * Register shortcodes for crappy map plugin.
	 */
	public function define_shortcodes() {
		add_shortcode('cm', [$this, 'do_shortcode_cm']);
	}

	/**
	 * 
	 */
	public function do_shortcode_cm($user_atts) {
		$default_atts = [
			'address' => false,
		];

		$atts = shortcode_atts($default_atts, $user_atts, 'cm');

		// Verification.
		if($atts['address'] == false) {
			return '<div id="wcm18-crappy-map"><div class="error">You didnt add a address as a parameter</div></div>';
		}

		// Displays the map.
		return sprintf(
			'<div id="wcm18-crappy-map" data-address="%s"><div id="crappy-map"></div></div>', 
			$atts['address']
		);
	}

}
