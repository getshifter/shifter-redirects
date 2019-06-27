<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://en.digitalcube.jp
 * @since      1.0.0
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/includes
 * @author     DigitalCube <hello@getshifter.io>
 */
class Shifter_Redirects_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'shifter-redirects',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
