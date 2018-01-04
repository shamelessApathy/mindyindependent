<?php
/*
 * Layout Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Layouts', 'educationpress'),
    'id'    => 'layout-section',
	'icon'  => 'el el-screen-alt',
    'desc'  => esc_html__('This section contains options for page layouts. Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'educationpress'),
    'fields'=> array(
	
	
	array(
    'id'       => 'educationpress_blogauthor_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Author Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	array(
    'id'       => 'educationpress_bloglisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Listing Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_blogdetail_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Detail Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_search_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Search Blog Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_searchcourse_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Search Course Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_courseinstructor_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Course Instructor Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_courselisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Course Listing Page', 'educationpress'), 
	'desc'     => esc_html__( 'Courses grid mode 2 column will not work with full width layout.', 'educationpress' ),
	'presets'    => true,
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png',
			'presets' =>  array(
							'educationpress_grid_item_count' => '3'
							)
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png',
			
			'presets' =>  array(
							'educationpress_grid_item_count' => '3',
							'educationpress_grid_item_count' => '2'
							)
			
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png',
			
			'presets' =>  array(
							'educationpress_grid_item_count' => '3',
							'educationpress_grid_item_count' => '2'
							)
			
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_coursedetail_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Course Detail Page', 'educationpress'), 
    'options'  => array(
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	
	array(
    'id'       => 'educationpress_instructorlisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Instructor Listing Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '1'
	),
	
	
	
	
	array(
    'id'       => 'educationpress_eventlisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Event Listing Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '1'
	),
	
	
	array(
    'id'       => 'educationpress_eventdetail_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Event Detail Page', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => '1 Column', 
            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
        ),
        '2'      => array(
            'alt'   => '2 Column Left', 
            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
        ),
        '3'      => array(
            'alt'   => '2 Column Right', 
            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
        )
    ),
    'default' => '3'
	),
	
	) ) );
	
