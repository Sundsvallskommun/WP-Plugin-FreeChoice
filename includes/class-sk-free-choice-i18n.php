<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sk_Free_Choice
 * @subpackage Sk_Free_Choice/includes
 * @author     Daniel Pihlström <daniel.pihlstrom@cybercom.com>
 */
class Sk_Free_Choice_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sk-free-choice',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
