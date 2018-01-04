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
                    'img' => get_template_directory_uri() . '/inc/kid-theme-options/images/header1.jpg',
                ),
                '2' => array(
                    'title' => esc_html__('2nd Header', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/kid-theme-options/images/header2.jpg',
                ),
            ),
			'priority' => 41,
            'default'   => '1',
			
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
			'priority' => 42,		
    )
);
Redux::setField(
    $opt_name, // This is your opt_name,	
        array(
            'id'        => 'edupress_header_time',
            'type'      => 'text',
            'title'     => esc_html__( 'Time', 'edupress' ),
            'default'   => 'Mon - Fri : 8:00 - 12:00',
			'section_id' => 'header-section',
			'priority' => 43,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
        array(
            'id'        => 'edupress_header_phone',
            'type'      => 'text',
            'title'     => esc_html__( 'Phone Number', 'edupress' ),
            'default'   => '+731 234 5678',
			'section_id' => 'header-section',
			'priority' => 44,
        )
);
Redux::setField(
    $opt_name, // This is your opt_name,	
        array(
            'id'        => 'edupress_header_social_share',
            'type'      => 'switch',
            'title'     => esc_html__( 'Social Share Icons in Header', 'edupress' ),
			'default'  => true,
			'section_id' => 'header-section',
			'priority' => 45,
			'on'        => esc_html__('Enable','edupress'),
            'off'       => esc_html__('Disable','edupress'),
			'required' => array( 'edupress_header_variation', '=',1 ),
        )
);

	
/*
 * Header Top Banner sub section
 */
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_kid_add_header_sub_section', 20); 
function edupress_kid_add_header_sub_section( $sections ){
	
	
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
		'desc'   => edupress_escape_string( 'You can upload banner image for specific page from add/edit page screen and below theme option page. Banner image should have minimum width of 1970px and minimum height of 810px.' ),
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
            'id'       => 'edupress_header_top_banner_classsearch',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Search Course Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
		
	array(
            'id'       => 'edupress_header_top_banner_classinstructor',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Instructor Page', 'edupress' ),
			'required' => array( 'edupress_header_top_banner', '=',1 ),
        ),
	
	array(
            'id'       => 'edupress_header_top_banner_classlisting',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Course Listing Page', 'edupress' ),
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
	array_splice( $sections, 2, 0, $header_top_banner); //pos 2
	//$sections= array_combine(range(1, count($sections)), array_values($sections)); 

	
	
	return $sections;
	
}

