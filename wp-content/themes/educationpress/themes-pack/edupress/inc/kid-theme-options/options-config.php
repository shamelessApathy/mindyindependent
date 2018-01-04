<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
	

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	

// This is your option name where all the Redux data is stored.
global $opt_name;

 
 
 
/*
 * Header options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/header-options.php' );
/*
 * Footer options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/footer-options.php' );


/*
 * layout options
 */
 require_once ( get_template_directory() . '/inc/kid-theme-options/layout-options.php' );


/*
 * Classes options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/class-options.php' );


/*
 * Social Share options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/social-share-options.php' );



/*
 * Search options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/search-options.php' );
	
/*
 * Basic Styles Options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/styles-options/basic-styles-options.php' );  
 
/*
 * Footer Styles Options
 */
require_once ( get_template_directory() . '/inc/kid-theme-options/styles-options/footer-styles-options.php' );  
 
 
/*
 * For changing preset confirm message
 */
add_filter( "redux/".$opt_name."/localize/preset", 'edupress_preset_msg');
function edupress_preset_msg( $msg )
{
	return esc_html__( 'This option will affects other options. This action effects on Course Listing/Courses Grid Mode and Layouts/Course Listing Page.  Would you like to proceed?' , 'edupress' );	
}
