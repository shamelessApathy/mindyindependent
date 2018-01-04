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
    $opt_name = "educationpress_options";
	
    
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'educationpress' ),
        'page_title'           => esc_html__( 'Theme Options', 'educationpress' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-settings',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose a priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'forced_dev_mode_off' => true,
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_educationpress_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
		'output_location'           => array( 'frontend', 'login' ),
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE
        
        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    /*$args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'educationpress' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'educationpress' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'educationpress' ),
    );*/

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    /*$args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );*/

    // Panel Intro text -> before the form
    /*if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'educationpress' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'educationpress' );
    }*/

    // Add content after the form.
    // $args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'educationpress' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

/*
 * ---> START HELP TABS
 */

/*$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'educationpress' ),
        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'educationpress' )
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'educationpress' ),
        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'educationpress' )
    )
);
Redux::setHelpTab( $opt_name, $tabs );*/

// Set the help sidebar
/* $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'educationpress' );
Redux::setHelpSidebar( $opt_name, $content );*/


/*
 * <--- END HELP TABS
 */
    
    
/*
 *
 * ---> START SECTIONS
 *
 */

/*
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

/*
 * Header options
 */
require_once ( get_template_directory() . '/inc/theme-options/header-options.php' );

/*
 * Social Share options
 */
require_once ( get_template_directory() .'/inc/theme-options/social-share-options.php' );
/*
 * layout options
 */
require_once ( get_template_directory() . '/inc/theme-options/layout-options.php' );


/*
 * Courses options
 */
require_once ( get_template_directory() . '/inc/theme-options/course-options.php' );


/*
 * Event options
 */
require_once ( get_template_directory() . '/inc/theme-options/event-options.php' );



/*
 * Blog options
 */
require_once ( get_template_directory() . '/inc/theme-options/blog-options.php' );


/*
 * Search options
 */
require_once ( get_template_directory() . '/inc/theme-options/search-options.php' );



/*
 * Coming Soon options
 */
require_once ( get_template_directory() . '/inc/theme-options/coming-soon-options.php' );


/*
 * Newsletter options
 */
require_once ( get_template_directory() . '/inc/theme-options/newsletter-options.php' );



/*
 * Footer options
 */
require_once ( get_template_directory() . '/inc/theme-options/footer-options.php' );

/*
 * Styles options
 */
require_once ( get_template_directory() . '/inc/theme-options/styles-options.php' );

/*
 * Google Map Options
 */
require_once ( get_template_directory() . '/inc/theme-options/google-map-options.php' );

/*
 * <--- END SECTIONS
 */
 
/*
 * For Customization in option
 */
//add_filter('redux/options/'.$opt_name.'/field/educationpress_courselisting_layout', 'educationpress_set_course_layout_options');
function educationpress_set_course_layout_options( $args ) {
	global $educationpress_options;
	
	if( $educationpress_options['educationpress_grid_item_count'] == 2 ) {
		unset( $args['options'][1] );
	}
	return $args;
}

//add_filter('redux/options/'.$opt_name.'/field/educationpress_grid_item_count', 'educationpress_set_grid_item_count_options');
function educationpress_set_grid_item_count_options( $args ) {
	global $educationpress_options;
	
	if( $educationpress_options['educationpress_courselisting_layout'] == 1 ) {		
		
		unset( $args[ 'options' ][ 2 ] );
		$args[ 'defaults' ] = 3;	
		$args[ 'desc' ] .= " For 2 Column layout please select course listing layout with right sidebar or left sidebar. Course Lsiting Grid 2 Column layout is not allowed in full width course listing layout.";
	}
	return $args;
}

/*
 * For changing preset confirm message
 */
add_filter( "redux/".$opt_name."/localize/preset", 'educationpress_preset_msg');
function educationpress_preset_msg( $msg )
{
	return esc_html__( 'This option will affects other options. This action effects on Course Listing/Courses Grid Mode and Layouts/Course Listing Page.  Would you like to proceed?' , 'educationpress' );	
}
