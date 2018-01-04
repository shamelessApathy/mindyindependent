<?php
/*
 * Plugin Name: EducationPress Theme Pack
 * Plugin URI:        http://ThemeCycle.com/
 * Description:       EducationPress Theme Pack plugin provides edupress theme which are used for colleges, universities, acadamies, education centers and Kindergarten. 
 * Version:           1.0
 * Author:            Ahmed
 * Author URI:        http://themeforest.net/user/ThemeCycle
 * Text Domain:       educationpress-theme-pack
 * Domain Path:       /languages
 */

//add_action( 'init', function() {
//var_dump(get_theme_root().'/educationpress/themes' );
//die;
//});

register_theme_directory(get_theme_root().'/educationpress/themes-pack' ) ;
