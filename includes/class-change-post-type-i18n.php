<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       twinklesharma29
 * @since      1.0.0
 *
 * @package    Change_Post_Type
 * @subpackage Change_Post_Type/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Change_Post_Type
 * @subpackage Change_Post_Type/includes
 * @author     Twinkle Sharma <twinkle.sharma@daffodilsw.com>
 */
class Change_Post_Type_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'change-post-type',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
