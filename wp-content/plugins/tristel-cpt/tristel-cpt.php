<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              denis.cummins@greenduck.co.uk
 * @since             1.0.0
 * @package           Tristel_Cpt
 *
 * @wordpress-plugin
 * Plugin Name:       tristel custom post types
 * Plugin URI:        https://greenduck.co.uk/
 * Description:       Custom post types for Tristel.
 * Version:           1.0.0
 * Author:            Green Duck
 * Author URI:        denis.cummins@greenduck.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tristel-cpt
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
define( 'TRISTEL_CPT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tristel-cpt-activator.php
 */
function activate_tristel_cpt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tristel-cpt-activator.php';
	Tristel_Cpt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tristel-cpt-deactivator.php
 */
function deactivate_tristel_cpt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tristel-cpt-deactivator.php';
	Tristel_Cpt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tristel_cpt' );
register_deactivation_hook( __FILE__, 'deactivate_tristel_cpt' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tristel-cpt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tristel_cpt() {

	$plugin = new Tristel_Cpt();
	$plugin->run();

}
run_tristel_cpt();
