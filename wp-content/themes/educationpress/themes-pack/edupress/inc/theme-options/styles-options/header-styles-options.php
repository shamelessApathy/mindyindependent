<?php
/*
 * Header Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Header', 'edupress'),
    'id'    => 'header-styles',
    'desc'  => esc_html__('This sub section contains header styles options.', 'edupress' ),
    'subsection' => true,
    'fields'=> array (

        /*
         * Main menu
         */
         array(
            'id'        => 'edupress_main_menu_style_change',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change menu style?', 'edupress' ),
            'default'   => '0',
            'on'    => esc_html__( 'Yes', 'edupress' ),
            'off'   => esc_html__( 'No', 'edupress' )
        ),
        array(
            'id'        => 'edupress_main_menu_text',
            'type'      => 'color',
            'output'    => array( '.navbar-default .navbar-nav > li > a, .home-univ-two .navbar-default .navbar-nav > li > a, .home-one .navbar-default .navbar-nav > li > a' ),
            'title'     => esc_html__( 'Main Menu Text Color', 'edupress' ),
            'desc'      => 'default: #777777',
            'default'   => '#777777',
            'validate'  => 'color',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'edupress_main_menu_text_hover',
            'type'      => 'color',
            'output'    => array( '.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .home-univ-two .navbar-default .navbar-nav > li > a:hover,  .home-univ-two .navbar-default .navbar-nav > li > a:focus, 
.home-univ-two .navbar-default .navbar-nav > .active > a, 
.home-univ-two .navbar-default .navbar-nav > .active > a:hover, 
.home-univ-two .navbar-default .navbar-nav > .active > a:focus, .home-one .navbar-default .navbar-nav > li > a:hover,.home-univ-two .navbar-default .navbar-nav > .active > a:focus, .home-one .navbar-default .navbar-nav > li > a:focus, .home-one .navbar-default .navbar-nav > .active > a, 
.home-one .navbar-default .navbar-nav > .active > a:hover, 
.home-one .navbar-default .navbar-nav > .active > a:focus' ),
            'title'     => esc_html__( 'Main Menu Text Color on Hover', 'edupress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#fffff',
            'validate'  => 'color',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
		array(
            'id'        => 'edupress_main_menu_text_bghover',
            'type'      => 'color',
			'mode'      => 'background-color',
            'output'    => array( '.navbar-default .navbar-nav > li > a:hover,.navbar-default .navbar-nav > li > a:focus, .home-two-nav .navbar-nav > li:hover > a, .navbar-default .navbar-nav > li:hover > a, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .home-univ-two .navbar-default .navbar-nav > li > a:hover,  .home-univ-two .navbar-default .navbar-nav > li > a:focus, 
.home-univ-two .navbar-default .navbar-nav > li:hover > a, 
.home-univ-two .navbar-default .navbar-nav > .active > a, 
.home-univ-two .navbar-default .navbar-nav > .active > a:hover, 
.home-univ-two .navbar-default .navbar-nav > .active > a:focus, 
.home-one .navbar-default .navbar-nav > li > a:hover, .home-one .navbar-default .navbar-nav > li > a:focus,
.home-one .navbar-default .navbar-nav > li:hover > a, 
.home-one .navbar-default .navbar-nav > .active > a, 
.home-one .navbar-default .navbar-nav > .active > a:hover, 
.home-one .navbar-default .navbar-nav > .active > a:focus
' ),
            'title'     => esc_html__( 'Main Menu Background Color on Hover', 'edupress' ),
            'desc'      => 'default: #ff5722',
            'default'   => '#ff5722',
            'validate'  => 'color',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'edupress_main_menu_bg_hover',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.site-header .navbar-nav .dropdown-menu, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .navbar-nav > li > .dropdown-menu, .dropdown-menu .dropdown-menu, .dropdown-menu > li > a:hover, .home-two-nav .dropdown-menu .dropdown-menu, .home-two-nav .dropdown-menu > .active > a, .home-two-nav .dropdown-menu > .active > a:focus, .home-two-nav .dropdown-menu > .active > a:hover, .home-two-nav .navbar-nav > li > .dropdown-menu, .home-two-nav .dropdown-menu > li > a, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, .dropdown-menu > li > a, 
.home-univ-two .navbar-nav .dropdown-menu, .home-univ-two .navbar-nav > li > .dropdown-menu,
.home-univ-two .dropdown-menu > .active > a, 
.home-univ-two .dropdown-menu > .active > a:focus, 
.home-univ-two .dropdown-menu > .active > a:hover, 
.home-univ-two .navbar-nav > li > .dropdown-menu, 
.home-univ-two .dropdown-menu > li > a,
.home-one .navbar-nav .dropdown-menu,
.home-one .navbar-nav > li > .dropdown-menu, 
.home-one .dropdown-menu > .active > a, 
.home-one .dropdown-menu > .active > a:focus, 
.home-one .dropdown-menu > .active > a:hover, 
.home-one .navbar-nav > li > .dropdown-menu, 
.home-one .dropdown-menu > li > a
' ),
            'title'     => esc_html__( 'Dropdown Background Color', 'edupress' ),
            'desc'      => 'default: #ff5722',
            'default'   => '#ff5722',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'edupress_main_menu_dropdown_text',
            'type'      => 'color',
            'output'    => array( '.dropdown-menu > li > a, .home-two-nav .dropdown-menu > li > a, .home-univ-two .dropdown-menu > li > a, .home-one .dropdown-menu > li > a' ),
            'title'     => esc_html__( 'Main Menu Dropdown Text Color', 'edupress' ),
            'desc'      => 'default: #ffd0c1',
            'default'   => '#ffd0c1',
            'validate'  => 'color',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'edupress_main_menu_dropdown_text_hover',
            'type'      => 'color',
            'output'    => array( '.dropdown-menu > li:hover > a, .navbar-nav > li:hover > a, .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover, .dropdown-menu > li > a:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, .home-two-nav .dropdown-menu > li > a:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover,
			.home-univ-two .dropdown-menu > li > a:hover, .home-univ-two .dropdown-menu > li:hover a,
			.home-one .dropdown-menu > li > a:hover, .home-one .dropdown-menu > li:hover a' ),
            'title'     => esc_html__( 'Main Menu Dropdown Text Color on Hover', 'edupress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#ffffff',
            'validate'  => 'color',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
		 array(
            'id'        => 'edupress_main_menu_dropdown_bg_hover',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .home-two-nav .dropdown-menu > li > a:hover, .home-univ-two .dropdown-menu > li > a:hover, .home-one .dropdown-menu > li > a:hover, .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover' ),
            'title'     => esc_html__( 'Dropdown Text Hover Background Color', 'edupress' ),
            'desc'      => 'default: #ff5722',
			'required'  => array( 'edupress_main_menu_style_change', '=', '1' ),
            'default'   => '#ff5722',
            'transparent' => false,
        ),
       
        array(
            'id'   =>'edupress_main_menu_divider',
            'type' => 'divide',
        ),


        /*
         * Logo area
         */
       
        array(
            'id'        => 'edupress_header_logo_text_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Logo Text Color', 'edupress' ),
            'active'    => true,
         ),
        array(
            'id'        => 'edupress_header_tagline_text_color',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Tagline Text Color', 'edupress' ),
            'desc'      => 'default: #ffffff',
             'validate'  => 'color',
            'transparent' => false,
        ),
		
        array(
            'id'   =>'edupress_logo_divider',
            'type' => 'divide',
        ),

        /*
         * Header
         */
        array(
            'id'        => 'edupress_header_top_background',
            'type'      => 'color',
            'mode'      => 'background-color',
             'title'     => esc_html__( 'Header Top Bar Background Color', 'edupress' ),
            'desc'      => 'default: #ffffff',
			 'validate'  => 'color',
             'transparent' => false,
        ),
		  array(
            'id'        => 'edupress_header_top_text',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Top Bar Text Color', 'edupress' ),
            'desc'      => 'default: #ffffff',
             'validate'  => 'color',			
            'transparent' => false,
        ),
		
		 array(
            'id'        => 'edupress_headertop_text_border',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Top Bar Bottom Border Color', 'edupress' ),
            'desc'      => 'default: #e9ecef',
             'validate'  => 'color',
            'transparent' => false,
        ),
        array(
            'id'        => 'edupress_header_top_user_nav_link',
            'type'      => 'link_color',
            'title'     => esc_html__( 'User Navigation Link Color', 'edupress' ),
			'required' => array( 'edupress_theme_mode' , '=', '1'), 
            'active'    => true,
         ),
       
      
       
        array(
            'id'   =>'edupress_top_divider',
            'type' => 'divide',
        ),


    ) ) );