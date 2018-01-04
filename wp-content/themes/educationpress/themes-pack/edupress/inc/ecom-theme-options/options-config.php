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
	$opt_name = "edupress_options";
	

/*
 * Basic Styles Options
 */
require_once ( get_template_directory() .'/inc/ecom-theme-options/styles-options/basic-styles-options.php' );  
/*
 * Header options
 */
require_once ( get_template_directory() . '/inc/ecom-theme-options/header-options.php' );

/*
 * Footer options
 */
require_once ( get_template_directory() . '/inc/ecom-theme-options/footer-options.php' );


/*
 * layout options
 */
 require_once ( get_template_directory() . '/inc/ecom-theme-options/layout-options.php' );


/*
 * Courses options
 */
require_once ( get_template_directory() . '/inc/ecom-theme-options/course-options.php' );

/*
 * Social Share options
 */
require_once ( get_template_directory() . '/inc/ecom-theme-options/social-share-options.php' );


/*
 * Search options
 */
require_once ( get_template_directory() . '/inc/ecom-theme-options/search-options.php' );
	




	