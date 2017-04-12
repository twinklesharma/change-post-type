<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              twinklesharma29
 * @since             1.0.0
 * @package           Change_Post_Type
 *
 * @wordpress-plugin
 * Plugin Name:       Change Post Type
 * Plugin URI:        change-post-type
 * Description:       You have to create a post and from there you will be able to select the type of that custom type of post, so that it will be saved in that type of custom post.
 * Version:           1.0.0
 * Author:            Twinkle Sharma
 * Author URI:        twinklesharma29
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       change-post-type
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-change-post-type-activator.php
 */
function activate_change_post_type() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-change-post-type-activator.php';
	Change_Post_Type_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-change-post-type-deactivator.php
 */
function deactivate_change_post_type() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-change-post-type-deactivator.php';
	Change_Post_Type_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_change_post_type' );
register_deactivation_hook( __FILE__, 'deactivate_change_post_type' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-change-post-type.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_change_post_type() {

	$plugin = new Change_Post_Type();
	$plugin->run();

}
run_change_post_type();
