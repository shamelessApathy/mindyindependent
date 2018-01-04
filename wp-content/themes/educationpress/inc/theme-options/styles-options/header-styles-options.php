<?php
/*
 * Header Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Header', 'educationpress'),
    'id'    => 'header-styles',
    'desc'  => esc_html__('This sub section contains header styles options.', 'educationpress' ),
    'subsection' => true,
    'fields'=> array (

        /*
         * Main menu
         */
         array(
            'id'        => 'educationpress_main_menu_style_change',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change menu style?', 'educationpress' ),
            'default'   => '0',
            'on'    => esc_html__( 'Yes', 'educationpress' ),
            'off'   => esc_html__( 'No', 'educationpress' )
        ),
        array(
            'id'        => 'educationpress_main_menu_text',
            'type'      => 'color',
            'output'    => array( '.navbar-default .navbar-nav > li > a' ),
            'title'     => esc_html__( 'Main Menu Text Color', 'educationpress' ),
            'desc'      => 'default: #777777',
            'default'   => '#777777',
            'validate'  => 'color',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_main_menu_text_hover',
            'type'      => 'color',
            'output'    => array( '.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus' ),
            'title'     => esc_html__( 'Main Menu Text Color on Hover', 'educationpress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#fffff',
            'validate'  => 'color',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
		array(
            'id'        => 'educationpress_main_menu_text_bghover',
            'type'      => 'color',
			'mode'      => 'background-color',
            'output'    => array( '.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .home-two-nav .navbar-nav > li:hover > a, .navbar-default .navbar-nav > li:hover > a, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus' ),
            'title'     => esc_html__( 'Main Menu Background Color on Hover', 'educationpress' ),
            'desc'      => 'default: #ff5722',
            'default'   => '#ff5722',
            'validate'  => 'color',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_main_menu_bg_hover',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array( '.site-header .navbar-nav .dropdown-menu, .dropdown-menu
			 > li > a:hover, .dropdown-menu > li > a:focus, .navbar-nav > li > .dropdown-menu, .dropdown-menu .dropdown-menu, .dropdown-menu > li > a:hover, .home-two-nav .dropdown-menu .dropdown-menu, .home-two-nav .dropdown-menu > .active > a, .home-two-nav .dropdown-menu > .active > a:focus, .home-two-nav .dropdown-menu > .active > a:hover, .home-two-nav .navbar-nav > li > .dropdown-menu, .home-two-nav .dropdown-menu > li > a, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, .dropdown-menu > li > a' ),
            'title'     => esc_html__( 'Dropdown Background Color', 'educationpress' ),
            'desc'      => 'default: #ff5722',
            'default'   => '#ff5722',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_main_menu_dropdown_text',
            'type'      => 'color',
            'output'    => array( '.dropdown-menu > li > a, .home-two-nav .dropdown-menu > li > a' ),
            'title'     => esc_html__( 'Main Menu Dropdown Text Color', 'educationpress' ),
            'desc'      => 'default: #ffd0c1',
            'default'   => '#ffd0c1',
            'validate'  => 'color',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_main_menu_dropdown_text_hover',
            'type'      => 'color',
            'output'    => array( '.dropdown-menu > li:hover > a, .navbar-nav > li:hover > a, .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover, .dropdown-menu > li > a:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover, .home-two-nav .dropdown-menu > li > a:hover, #menu-left .mm-listview > li > a:hover, #menu-left .mm-listview > li:hover ' ),
            'title'     => esc_html__( 'Main Menu Dropdown Text Color on Hover', 'educationpress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#ffffff',
            'validate'  => 'color',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'transparent' => false,
        ),
		 array(
            'id'        => 'educationpress_main_menu_dropdown_bg_hover',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.dropdown-menu > li > a:hover, .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover' ),
            'title'     => esc_html__( 'Dropdown Text Hover Background Color', 'educationpress' ),
            'desc'      => 'default: #ff5722',
			'required'  => array( 'educationpress_main_menu_style_change', '=', '1' ),
            'default'   => '#ff5722',
            'transparent' => false,
        ),
       
        array(
            'id'   =>'educationpress_main_menu_divider',
            'type' => 'divide',
        ),


        /*
         * Logo area
         */
       
        array(
            'id'        => 'educationpress_header_logo_text_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Logo Text Color', 'educationpress' ),
            'active'    => true,
         ),
        array(
            'id'        => 'educationpress_header_tagline_text_color',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Tagline Text Color', 'educationpress' ),
            'desc'      => 'default: #ffffff',
             'validate'  => 'color',
            'transparent' => false,
        ),
		
        array(
            'id'   =>'educationpress_logo_divider',
            'type' => 'divide',
        ),

        /*
         * Header
         */
        array(
            'id'        => 'educationpress_header_top_background',
            'type'      => 'color',
            'mode'      => 'background-color',
             'title'     => esc_html__( 'Header Top Bar Background Color', 'educationpress' ),
            'desc'      => 'default: #ffffff',
			 'validate'  => 'color',
             'transparent' => false,
        ),
		  array(
            'id'        => 'educationpress_header_top_text',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Top Bar Text Color', 'educationpress' ),
            'desc'      => 'default: #ffffff',
             'validate'  => 'color',
            'transparent' => false,
        ),
		
		 array(
            'id'        => 'educationpress_headertop_text_border',
            'type'      => 'color',
             'title'     => esc_html__( 'Header Top Bar Bottom Border Color', 'educationpress' ),
            'desc'      => 'default: #e9ecef',
             'validate'  => 'color',
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_header_top_user_nav_link',
            'type'      => 'link_color',
            'title'     => esc_html__( 'User Navigation Link Color', 'educationpress' ),
            'active'    => true,
         ),
       
      
       
        array(
            'id'   =>'educationpress_top_divider',
            'type' => 'divide',
        ),


    ) ) );