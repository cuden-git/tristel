<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       denis.cummins@greenduck.co.uk
 * @since      1.0.0
 *
 * @package    Tristel_Cpt
 * @subpackage Tristel_Cpt/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tristel_Cpt
 * @subpackage Tristel_Cpt/includes
 * @author     Green Duck <denis.cummins@greenduck.co.uk>
 */
class Tristel_Cpt_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tristel-cpt',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
