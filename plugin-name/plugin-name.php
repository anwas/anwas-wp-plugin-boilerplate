<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com/
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

namespace Plugin_Name;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( ! defined( '\Plugin_Name\PLUGIN_NAME_VERSION' ) ) {
	define( 'Plugin_Name\PLUGIN_NAME_VERSION', '1.0.0' );
}

/**
 * The unique prefix of this plugin.
 * Rename this for your own.
 */
if ( ! defined( '\Plugin_Name\PLUGIN_NAME_PREFIX' ) ) {
	define( 'Plugin_Name\PLUGIN_NAME_PREFIX', 'plugin_name' );
}

/**
 * The DIR PATH of this plugin with trailing slash.
 */
if ( ! defined( '\Plugin_Name\PLUGIN_NAME_DIR' ) ) {
    define( 'Plugin_Name\PLUGIN_NAME_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * The URL of this plugin with trailing slash.
 */
if ( ! defined( '\Plugin_Name\PLUGIN_NAME_URI' ) ) {
    define( 'Plugin_Name\PLUGIN_NAME_URI', plugin_dir_url( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/plugin-name-activator.php
 */
function plugin_name_activate() {
	require_once \Plugin_Name\PLUGIN_NAME_DIR . 'includes/plugin-name-activator.php';
	\Plugin_Name\Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/plugin-name-deactivator.php
 */
function plugin_name_deactivate() {
	require_once \Plugin_Name\PLUGIN_NAME_DIR. 'includes/plugin-name-deactivator.php';
	\Plugin_Name\Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, '\Plugin_Name\plugin_name_activate' );
register_deactivation_hook( __FILE__, '\Plugin_Name\plugin_name_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require \Plugin_Name\PLUGIN_NAME_DIR . 'includes/plugin-name.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function plugin_name_run() {

	$plugin = new \Plugin_Name\Plugin_Name();
	$plugin->run();

}
plugin_name_run();
