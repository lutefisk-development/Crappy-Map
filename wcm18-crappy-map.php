<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              pks-development.se
 * @since             1.0.0
 * @package           Wcm18_Crappy_Map
 *
 * @wordpress-plugin
 * Plugin Name:       WCM18 Crappy Map
 * Plugin URI:        localhost
 * Description:       Showing a map for a spesific location
 * Version:           1.0.0
 * Author:            Per Kristian Svanberg
 * Author URI:        pks-development.se
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcm18-crappy-map
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
define( 'WCM18_CRAPPY_MAP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wcm18-crappy-map-activator.php
 */
function activate_wcm18_crappy_map() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcm18-crappy-map-activator.php';
	Wcm18_Crappy_Map_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wcm18-crappy-map-deactivator.php
 */
function deactivate_wcm18_crappy_map() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcm18-crappy-map-deactivator.php';
	Wcm18_Crappy_Map_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcm18_crappy_map' );
register_deactivation_hook( __FILE__, 'deactivate_wcm18_crappy_map' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wcm18-crappy-map.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wcm18_crappy_map() {

	$plugin = new Wcm18_Crappy_Map();
	$plugin->run();

}
run_wcm18_crappy_map();
