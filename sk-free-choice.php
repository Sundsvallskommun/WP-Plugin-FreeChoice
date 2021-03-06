<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://cybercom.com
 * @since             1.0.0
 * @package           Sk_Free_Choice
 *
 * @wordpress-plugin
 * Plugin Name:       Sundsvalls Kommun - Fritt Val
 * Plugin URI:        http://github
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Patrik Jansson / Daniel Pihlström
 * Author URI:        http://cybercom.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sk-free-choice
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('SK_FREE_DOMAIN', "sk-free-choice-domain");
define('SK_FREE_CHOICE_URL', plugin_basename(__FILE__) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sk-free-choice-activator.php
 */
function activate_sk_free_choice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sk-free-choice-activator.php';
	Sk_Free_Choice_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sk-free-choice-deactivator.php
 */
function deactivate_sk_free_choice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sk-free-choice-deactivator.php';
	Sk_Free_Choice_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sk_free_choice' );
register_deactivation_hook( __FILE__, 'deactivate_sk_free_choice' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sk-free-choice.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sk_free_choice() {
	
	$plugin = new Sk_Free_Choice();
	$plugin->run();

}
run_sk_free_choice();
