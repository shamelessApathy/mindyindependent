<?php
/*
 * Header Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Header', 'educationpress'),
    'id'    => 'header-section',
	'icon'  => 'el el-website-alt',
    'desc'  => esc_html__('This section contains options for header.', 'educationpress'),
    'fields'=> array(
	
		 array(
            'id'       => 'educationpress_favicon',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Favicon', 'educationpress' ),
            'subtitle' => esc_html__( 'Upload your website favicon.', 'educationpress' ),
        ),
        array(
            'id'       => 'educationpress_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Logo', 'educationpress' ),
            'subtitle' => esc_html__( 'Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'educationpress' ),
        ),
	
		array(
            'id'        => 'educationpress_header_variation',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Header Variation', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the header that you want to use for site.', 'educationpress' ),
            'options'   => array(
                '1' => array(
                    'title' => esc_html__('1st Header', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/header1.jpg',
                ),
                '2' => array(
                    'title' => esc_html__('2nd Header', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/header2.jpg',
                ),
				'3' => array(
                    'title' => esc_html__('3rd Header', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/header3.jpg',
                ),
            ),
            'default'   => '1',			
        ),
		array(
            'id'        => 'educationpress_header_login',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Meta Login Links', 'educationpress' ),
            'subtitle'  => esc_html__( 'Please on/off header meta login links', 'educationpress' ),
			'on'       => 'Enabled',
            'off'      => 'Disabled',
			'default'   => true,
			'required' => array('educationpress_header_variation','=',array('1','2')),						
        ),
		
		array(
            'id'        => 'educationpress_header_sticky',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Sticky', 'educationpress' ),
            'subtitle'  => esc_html__( 'Please on/off header sticky', 'educationpress' ),
			'on'       => 'Enabled',
            'off'      => 'Disabled',
			'default'   => false,						
        ),

        array(
            'id'        => 'educationpress_menu_variation',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Main Menu Variation', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the menu variation that you want to use for site main menu.', 'educationpress' ),
			'desc'	 => esc_html__( 'If you have selected header variation 3, Header Sticky will be applicable to inner pages.', 'educationpress' ),
            'options'   => array(
                '1' => array(
                    'title' => esc_html__('1st Variation', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/menu-variation-1.png',
                ),
                '2' => array(
                    'title' => esc_html__('2nd Variation', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/menu-variation-2.png',
                ),
            ),
            'default'   => '1',
			'required' => array('educationpress_header_variation','=',array('1','2')),
        ),
       
	   
	   array(
            'id'        => 'educationpress_header_call_or_social',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Call Us or Social Media Icons', 'educationpress' ),
			'desc' => esc_html__( 'Choose the information to display in header.', 'educationpress' ),
			'options'  => array(
                'call_us' => esc_html__('Call Us', 'educationpress'),
                'social' => esc_html__('Social Media Icons', 'educationpress'),
            ),
			
            'default'   => 'call_us',
			'required' => array('educationpress_header_variation','=',array('1','2')),
        ),
        array(
            'id'        => 'educationpress_header_phone',
            'type'      => 'text',
            'title'     => esc_html__( 'Phone Number', 'educationpress' ),
            'default'   => '+731 234 5678',
			'required' => array('educationpress_header_call_or_social','=', 'call_us' ),
        ),
		
        array(
            'id'       => 'educationpress_home_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Header Title Slug', 'educationpress' ),
            'default'  => 'The Most Complete Education Solution',
			'required' => array('educationpress_header_variation','=',array('1','2')),
        ),
		 array(
            'id'       => 'educationpress_home_three_searchform_bg',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Header Background Image', 'educationpress' ),
            'subtitle' => esc_html__( 'Upload background image 1970x1070 px', 'educationpress' ),
			'required' => array( 'educationpress_header_variation', '=', 3 ),
        ),
		array(
            'id'       => 'educationpress_home_three_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Logo For 3rd Header Variation', 'educationpress' ),
            'desc' => esc_html__( 'Upload logo image for your 3rd header variation. It will display only on home page', 'educationpress' ),
			'required' => array( 'educationpress_header_variation', '=', 3 ),
        ),
		array(
                'id'       => 'educationpress_home_three_searchform',
                'type'     => 'switch',
                'title'    => esc_html__( 'Search Form', 'educationpress' ),
				'subtitle' => esc_html__( 'Add the search form.', 'educationpress' ),
                'desc'     => esc_html__('You can enable or disable the search form.', 'educationpress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
				'required' => array('educationpress_header_variation','=',array('3')),
            ),
	 array(
            'id'        => 'educationpress_home_three_searchform_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Title', 'educationpress' ),
            'default'   =>  esc_html__( 'Make your future by Learning new Skills', 'educationpress' ),
			'required' => array( 'educationpress_home_three_searchform', '=', 1 ),
        ),
		
		 array(
                'id'       => 'educationpress_home_three_searchform_icons',
                'type'     => 'switch',
                'title'    => esc_html__( 'Icons', 'educationpress' ),
				'subtitle' => esc_html__( 'Add icons below the search form.', 'educationpress' ),
                'desc'     => esc_html__('You can enable or disable icons below the search form.', 'educationpress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
				'required' => array('educationpress_header_variation','=',array('3')),
            ),
			
		array(
                'id'       => 'educationpress_home_three_searchform_icon1',
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'title'    => esc_html__( '1st Icon', 'educationpress' ),
				'default'  => 'lnr lnr-graduation-hat',
				'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'educationpress' ),
				'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
            ),
			
			 array(
            'id'        => 'educationpress_home_three_searchform_icontext1',
            'type'      => 'text',
            'title'     => esc_html__( '1st Icon Text', 'educationpress' ),
            'default'   =>  esc_html__( 'Over 5 Million Students Enrolled', 'educationpress' ),
			'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
        	),
			
			
			array(
                'id'       => 'educationpress_home_three_searchform_icon2',
                'type'     => 'select',
                'data'     => 'elusive-icons',
				'default'  => 'lnr lnr-book',
                'title'    => esc_html__( '2nd Icon', 'educationpress' ),
				'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'educationpress' ),
				'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
            ),
			
			 array(
            'id'        => 'educationpress_home_three_searchform_icontext2',
            'type'      => 'text',
            'title'     => esc_html__( '2nd Icon Text', 'educationpress' ),
            'default'   =>  esc_html__( 'More than 25,000 Online Available Courses', 'educationpress' ),
			'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
        	),
			
			array(
                'id'       => 'educationpress_home_three_searchform_icon3',
                'type'     => 'select',
                'data'     => 'elusive-icons',
				'default'  => 'lnr lnr-laptop-phone',
                'title'    => esc_html__( '3rd Icon', 'educationpress' ),
				'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'educationpress' ),
				'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
            ),
			
			array(
            'id'        => 'educationpress_home_three_searchform_icontext3',
            'type'      => 'text',
            'title'     => esc_html__( '3rd Icon Text', 'educationpress' ),
            'default'   =>  esc_html__( 'Learn skills on any Devices anytime', 'educationpress' ),
			'required' => array( 'educationpress_home_three_searchform_icons', '=', 1 ),
        	),
			
        array(
            'id'        => 'educationpress_page_loader',
            'type'      => 'switch',
            'title'     => esc_html__('Page Loader', 'educationpress'),
            'desc'     => esc_html__('You can enable or disable page loader.', 'educationpress'),
            'default'   => 1,
            'on'        => esc_html__('Enable','educationpress'),
            'off'       => esc_html__('Disable','educationpress'),
        ),
        array(
            'id'       => 'educationpress_page_loader_gif',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Page Loader Gif', 'educationpress' ),
            'desc'     => esc_html__( 'You can upload your page loader gif here or default one will be displayed.', 'educationpress' ),
            'required' => array( 'educationpress_page_loader', '=', 1 ),
        ),
		array(
            'id'        => 'educationpress_scroll_top_btn',
            'type'      => 'switch',
            'title'     => esc_html__('Scroll Top Button', 'educationpress'),
            'desc'     => esc_html__('You can enable or disable scroll top button.', 'educationpress'),
            'default'   => false,
            'on'        => esc_html__('Enable','educationpress'),
            'off'       => esc_html__('Disable','educationpress'),
        ),
        array(
            'id'        => 'educationpress_quick_js',
            'type'      => 'ace_editor',
            'title'     => esc_html__('Quick JavaScript', 'educationpress'),
            'desc'  => esc_html__('You can paste your JavaScript code here without script tag just only code.', 'educationpress'),
            'mode'      => 'javascript',
            'theme'     => 'chrome',
        ),
		

    ) ) );
	
/*
 * Header Top Banner sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Header Top Banner', 'educationpress'),
    'id'    => 'header-top-banner-section',
    'desc'  => esc_html__('This section contains options related to Header Top Banner', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	 array(
                'id'       => 'educationpress_header_top_banner',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Banner', 'educationpress' ),
				'subtitle' => esc_html__( 'Display top banner image in header', 'educationpress' ),
                'desc'     => esc_html__('You can enable or disable top banner.', 'educationpress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			
	array(
		'id'       => 'educationpress_header_top_banner_bg',
		'type'     => 'color',
		'desc'     => esc_html__('Banner image will replaced with this color.', 'educationpress'),
		'validate' => 'color',
		'default'  => '#e4e8ee',
		'transparent' => false,
		'title'    => esc_html__( 'Background Color', 'educationpress' ),
		'validate' => 'color',
		//'required' => array( 'educationpress_header_top_banner', '!=', 1 ),
	),
	
	array(
		'id'       => 'educationpress_header_top_banner_text_color',
		'type'     => 'color',
		'validate' => 'color',
		'default'  => '#262c38',
		'transparent' => false,
		'title'    => esc_html__( 'Text Color', 'educationpress' ),
		'validate' => 'color',
		//'required' => array( 'educationpress_header_top_banner', '!=', 1 ),
	),
	
	array(
		'id'     => 'educationpress_header_top_banner_info1',
		'type'   => 'info',
		'notice' => false,
		'style'  => 'warning',
		'title'  => esc_html__( 'Top Banner Enabled.', 'educationpress' ),
		'desc'   => __( 'You can upload banner image for specific page from add/edit page screen and below theme option page. Banner image should have <strong>minimum width of 1970px and minimum height of 810px.</strong>', 'educationpress' ),
		'required' => array( 'educationpress_header_top_banner', '=',1 ),
	),
	
	array(
		'id'     => 'educationpress_header_top_banner_info2',
		'type'   => 'info',
		'notice' => false,
		'style'  => 'warning',
		'title'  => esc_html__( 'Top Banner Disabled.', 'educationpress' ),
		'desc'   => esc_html__( 'It will replace banner image with above background color for all pages.', 'educationpress' ),
		'required' => array( 'educationpress_header_top_banner', '!=', 1),
	),
	array(
            'id'       => 'educationpress_header_top_banner_404',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( '404 Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'educationpress_header_top_banner_blogauthor',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Blog Author Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'educationpress_header_top_banner_bloglisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Blog Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'educationpress_header_top_banner_search',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Search Blog Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
		
	array(
            'id'       => 'educationpress_header_top_banner_coursesearch',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Search Course Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_courseinstructor',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Instructor Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'educationpress_header_top_banner_courselisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_unitlisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Unit Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_unitgrade',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Unit Grade Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_unitdetail',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Unit Detail Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	
	array(
            'id'       => 'educationpress_header_top_banner_notification',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Notifications Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	array(
            'id'       => 'educationpress_header_top_banner_discussions',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Discussions Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
	array(
            'id'       => 'educationpress_header_top_banner_discussionsdetail',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Discussions Detail Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_workbook',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Workbook Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'educationpress_header_top_banner_eventlisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Event Listing Page', 'educationpress' ),
			'required' => array( 'educationpress_header_top_banner', '=',1 ),
        ),
		
      

    ) ) );
