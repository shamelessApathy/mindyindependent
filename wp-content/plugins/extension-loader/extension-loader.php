<?php
/**
 *
 * @link              http://themeforest.net/user/ThemeCycle
 * @since             1.2
 * @package          EducationPress
 *
 * @wordpress-plugin
 * Plugin Name:       Redux Extensions Loader
 * Plugin URI:        http://ThemeCycle.com/
 * Description:       Redux Extensions loader plugin for import demo data
 * Version:           1.2
 * Author:            Ahmed
 * Author URI:        http://themeforest.net/user/ThemeCycle
 * Text Domain:       edupress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

ini_set('max_execution_time', 1800);
ini_set('memory_limit', '256M');

require_once( plugin_dir_path( __FILE__).'init.php' );

add_action( 'plugins_loaded', 'exten_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 *
 */
function exten_load_textdomain() {
  load_plugin_textdomain( 'exten-load', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}



