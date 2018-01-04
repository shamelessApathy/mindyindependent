<?php
/*
 * Header Options
 */
global $opt_name;

Redux::setField(
    $opt_name, // This is your opt_name,	
		 array(
            'id'        => 'edupress_header_variation',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Header Variation', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the header that you want to use for site.', 'edupress' ),
			'section_id' => 'header-section',
            'options'   => array(
                '1' => array(
                    'title' => esc_html__('1st Header', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/header1.jpg',
                ),
                '2' => array(
                    'title' => esc_html__('2nd Header', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/header2.jpg',
                ),
				'3' => array(
                    'title' => esc_html__('3rd Header', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/header3.jpg',
                ),
            ),
			'priority' => 41,
            'default'   => '1',
			
        )
	);
	
	
	
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
            'id'        => 'edupress_header_login',
            'type'      => 'switch',
			'section_id' => 'header-section',
            'title'     => esc_html__( 'Header Meta Login Links', 'edupress' ),
            'subtitle'  => esc_html__( 'Please on/off header meta login links', 'edupress' ),
			'on'       => 'Enabled',
            'off'      => 'Disabled',
			'default'   => true,
			'required' => array('edupress_header_variation','=',array('1','2')),						
			'priority' => 42,		
        )
);
		
	
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
            'id'        => 'edupress_header_sticky',
            'type'      => 'switch',
			'section_id' => 'header-section',
            'title'     => esc_html__( 'Header Sticky', 'edupress' ),
            'subtitle'  => esc_html__( 'Please on/off header sticky', 'edupress' ),
			'on'       => 'Enabled',
            'off'      => 'Disabled',
			'default'   => false,	
			'desc'	 => esc_html__( 'If you have selected header variation 3, Header Sticky will be applicable to inner pages.', 'edupress' ),
			'priority' => 43,		
    )
);
	
	
	
Redux::setField(
    $opt_name, // This is your opt_name,	
        array(
            'id'        => 'edupress_menu_variation',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Main Menu Variation', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the menu variation that you want to use for site main menu.', 'edupress' ),			
            'options'   => array(
                '1' => array(
                    'title' => esc_html__('1st Variation', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/menu-variation-1.png',
                ),
                '2' => array(
                    'title' => esc_html__('2nd Variation', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/menu-variation-2.png',
                ),
            ),
            'default'   => '1',
			'required' => array('edupress_header_variation','=',array('1','2')),
			'section_id' => 'header-section',
			'priority' => 44,
        )
);
	
	
Redux::setField(
    $opt_name, // This is your opt_name,	
		 array(
            'id'        => 'edupress_header_call_or_social',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Call Us or Social Media Icons', 'edupress' ),
			'desc' => esc_html__( 'Choose the information to display in header.', 'edupress' ),
			'options'  => array(
                'call_us' => esc_html__('Call Us', 'edupress'),
                'social' => esc_html__('Social Media Icons', 'edupress'),
            ),
			
            'default'   => 'call_us',
			'section_id' => 'header-section',
			'required' => array('edupress_header_variation','=',array('1','2')),
			'priority' => 45,
        )
);
	

Redux::setField(
    $opt_name, // This is your opt_name,	
        array(
            'id'        => 'edupress_header_phone',
            'type'      => 'text',
            'title'     => esc_html__( 'Phone Number', 'edupress' ),
            'default'   => '+731 234 5678',
			'required' => array('edupress_header_variation','=',array('1','2')),
			'section_id' => 'header-section',
			'required' => array('educationpress_header_call_or_social','=', 'call_us' ),
			'priority' => 46,
        )
);
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
		'id'       => 'edupress_home_title',
		'type'     => 'text',
		'title'    => esc_html__( 'Header Title Slug', 'edupress' ),
		'default'  => 'The Most Complete Education Solution',
		'required' => array('edupress_header_variation','=',array('1','2')),
		'section_id' => 'header-section',
		'priority' => 47,
	)
);
Redux::setField(
    $opt_name, // This is your opt_name,	
	 array(
		'id'       => 'edupress_home_three_searchform_bg',
		'type'     => 'media',
		'url'      => false,
		'title'    => esc_html__( 'Header Background Image', 'edupress' ),
		'subtitle' => esc_html__( 'Upload background image 1970x1070 px', 'edupress' ),
		'required' => array( 'edupress_header_variation', '=', 3 ),
		'section_id' => 'header-section',
		'priority' => 48,
	)
);
Redux::setField(
    $opt_name, // This is your opt_name,	
array(
            'id'       => 'edupress_home_three_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Logo For 3rd Header Variation', 'edupress' ),
            'desc' => esc_html__( 'Upload logo image for your 3rd header variation. It will display only on home page', 'edupress' ),
			'required' => array( 'edupress_header_variation', '=', 3 ),
			'section_id' => 'header-section',
			'priority' => 49,
        )
	);

Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
			'id'       => 'edupress_home_three_searchform',
			'type'     => 'switch',
			'title'    => esc_html__( 'Search Form', 'edupress' ),
			'subtitle' => esc_html__( 'Add the search form.', 'edupress' ),
			'desc'     => esc_html__('You can enable or disable the search form.', 'edupress'),
			'default'  => 1,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
			'required' => array('edupress_header_variation','=',array('3')),
			'section_id' => 'header-section',
			'priority' => 50,
	)
);
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
            'id'        => 'edupress_home_three_searchform_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Title', 'edupress' ),
            'default'   =>  esc_html__( 'Make your future by Learning new Skills', 'edupress' ),
			'required' => array( 'edupress_home_three_searchform', '=', 1 ),
			'section_id' => 'header-section',
			
			'priority' => 51,
	)
);
Redux::setField(
    $opt_name, // This is your opt_name,		
	 array(
			'id'       => 'edupress_home_three_searchform_icons',
			'type'     => 'switch',
			'title'    => esc_html__( 'Icons', 'edupress' ),
			'subtitle' => esc_html__( 'Add icons below the search form.', 'edupress' ),
			'desc'     => esc_html__('You can enable or disable icons below the search form.', 'edupress'),
			'default'  => 1,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
			'required' => array('edupress_header_variation','=',array('3')),
			'section_id' => 'header-section',
			'priority' => 52,
		)
);
Redux::setField(
    $opt_name, // This is your opt_name,				
	array(
			'id'       => 'edupress_home_three_searchform_icon1',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'title'    => esc_html__( '1st Icon', 'edupress' ),
			'default'  => 'lnr lnr-graduation-hat',
			'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'edupress' ),
			'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
			'section_id' => 'header-section',
			'priority' => 53,
		)
);
		
Redux::setField(
    $opt_name, // This is your opt_name,			
	 array(
		'id'        => 'edupress_home_three_searchform_icontext1',
		'type'      => 'text',
		'title'     => esc_html__( '1st Icon Text', 'edupress' ),
		'default'   =>  esc_html__( 'Over 5 Million Students Enrolled', 'edupress' ),
		'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
		'section_id' => 'header-section',
		'priority' => 54,
	)
);			
Redux::setField(
    $opt_name, // This is your opt_name,		
	array(
		'id'       => 'edupress_home_three_searchform_icon2',
		'type'     => 'select',
		'data'     => 'elusive-icons',
		'default'  => 'lnr lnr-book',
		'title'    => esc_html__( '2nd Icon', 'edupress' ),
		'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'edupress' ),
		'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
		'section_id' => 'header-section',
		'priority' => 55,
	)
);
Redux::setField(
    $opt_name, // This is your opt_name,				
	 array(
		'id'        => 'edupress_home_three_searchform_icontext2',
		'type'      => 'text',
		'title'     => esc_html__( '2nd Icon Text', 'edupress' ),
		'default'   =>  esc_html__( 'More than 25,000 Online Available Courses', 'edupress' ),
		'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
		'section_id' => 'header-section',
		'priority' => 56,
	)
);			
Redux::setField(
    $opt_name, // This is your opt_name,				
	array(
		'id'       => 'edupress_home_three_searchform_icon3',
		'type'     => 'select',
		'data'     => 'elusive-icons',
		'default'  => 'lnr lnr-laptop-phone',
		'title'    => esc_html__( '3rd Icon', 'edupress' ),
		'desc'     => esc_html__( 'Here\'s a list of all the Font Awesome &  Linear Icons by name and icon.', 'edupress' ),
		'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
		'section_id' => 'header-section',
		'priority' => 57,
	)
);	
Redux::setField(
    $opt_name, // This is your opt_name,				
	array(
		'id'        => 'edupress_home_three_searchform_icontext3',
		'type'      => 'text',
		'title'     => esc_html__( '3rd Icon Text', 'edupress' ),
		'default'   =>  esc_html__( 'Learn skills on any Devices anytime', 'edupress' ),
		'required' => array( 'edupress_home_three_searchform_icons', '=', 1 ),
		'section_id' => 'header-section',
		'priority' => 58,
	)
); 
	
	
/*
 * Header Top Banner sub section
 */
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_child_add_header_sub_section', 20); 
function edupress_child_add_header_sub_section( $sections ){
	
	
	//$sections[1]['fields']= array_combine(range(1, count($sections[1]['fields'])), array_values($sections[1]['fields']));
	
	$header_top_banner=array(
	array(
    'title' => esc_html__( 'Header Top Banner', 'edupress'),
    'id'    => 'header-top-banner-section',
    'desc'  => esc_html__('This section contains options related to Header Top Banner', 'edupress' ),
    'subsection' => true,
    'fields'=> array(
	 array(
                'id'       => 'edupress_header_top_banner',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Banner', 'edupress' ),
				'subtitle' => esc_html__( 'Display top banner image in header', 'edupress' ),
                'desc'     => esc_html__('You can enable or disable top banner.', 'edupress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
			
	array(
		'id'       => 'edupress_header_top_banner_bg',
		'type'     => 'color',
		'desc'     => esc_html__('Banner image will replaced with this color.', 'edupress'),
		'validate' => 'color',
		'default'  => '#e4e8ee',
		'transparent' => false,
		'title'    => esc_html__( 'Background Color', 'edupress' ),		
	),
	
	array(
		'id'       => 'edupress_header_top_banner_text_color',
		'type'     => 'color',
		'validate' => 'color',
		'default'  => '#262c38',
		'transparent' => false,
		'title'    => esc_html__( 'Text Color', 'edupress' ),
	),
	
	array(
		'id'     => 'edupress_header_top_banner_info1',
		'type'   => 'info',
		'notice' => false,
		'style'  => 'warning',
		'title'  => esc_html__( 'Top Banner Enabled.', 'edupress' ),
		'desc'   => esc_html__( 'You can upload banner image for specific page from add/edit page screen and below theme option page. Banner image should have minimum width of 1970px and minimum height of 810px.', 'edupress' ),
		'required' => array( 'edupress_header_top_banner', '=',1 ),
	),
	
	array(
		'id'     => 'edupress_header_top_banner_info2',
		'type'   => 'info',
		'notice' => false,
		'style'  => 'warning',
		'title'  => esc_html__( 'Top Banner Disabled.', 'edupress' ),
		'desc'   => esc_html__( 'It will replace banner image with above background color for all pages.', 'edupress' ),
		'required' => array( 'edupress_header_top_banner', '!=', 1),
	),
	array(
            'id'       => 'edupress_header_top_banner_404',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( '404 Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'edupress_header_top_banner_blogauthor',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Blog Author Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'edupress_header_top_banner_bloglisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Blog Listing Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'edupress_header_top_banner_search',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Search Blog Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		
		
	array(
            'id'       => 'edupress_header_top_banner_coursesearch',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Search Course Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'edupress_header_top_banner_courseinstructor',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Instructor Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'edupress_header_top_banner_courselisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Listing Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'edupress_header_top_banner_cart_checkout',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Cart, Checkout and My Account Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		

		
	array(
            'id'       => 'edupress_header_top_banner_eventlisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Event Listing Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		
    ) )) ;
	array_splice( $sections, 2, 0, $header_top_banner); //pos 3
	//$sections= array_combine(range(1, count($sections)), array_values($sections)); 
	
	
	return $sections;
	
}

