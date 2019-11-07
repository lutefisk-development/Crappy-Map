<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       pks-development.se
 * @since      1.0.0
 *
 * @package    Wcm18_Crappy_Map
 * @subpackage Wcm18_Crappy_Map/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wcm18_Crappy_Map
 * @subpackage Wcm18_Crappy_Map/includes
 * @author     Per Kristian Svanberg <kristiansvanberg@gmail.com>
 */
class Wcm18_Crappy_Map_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wcm18-crappy-map',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
