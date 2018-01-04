<?php
/*
 * Layout Options
 */
global $opt_name;
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
		'id'       => 'edupress_searchcourse_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Search Course Page', 'edupress'), 
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
		'default' => '3',
		'priority' => 81,
		'section_id' => 'layout-section',
	)
);
	
Redux::setField(
	$opt_name, // This is your opt_name,	
	array(
		'id'       => 'edupress_courseinstructor_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Course Instructor Page', 'edupress'), 
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
		'default' => '3',
		'priority' => 82,
		'section_id' => 'layout-section',
	)
);
	
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
		'id'       => 'edupress_courselisting_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Course Listing Page', 'edupress'), 
		'desc'     => esc_html__( 'Courses grid mode 2 column will not work with full width layout.', 'edupress' ),
		'presets'    => true,
		'options'  => array(
			'1'      => array(
				'alt'   => '1 Column', 
				'img'   => ReduxFramework::$_url.'assets/img/1col.png',
				'presets' =>  array(
							'edupress_grid_item_count' => '3'
							)
			),
			'2'      => array(
				'alt'   => '2 Column Left', 
				'img'   => ReduxFramework::$_url.'assets/img/2cl.png',
				'presets' =>  array(
							'edupress_grid_item_count' => '3',
							'edupress_grid_item_count' => '2'
							)
			),
			'3'      => array(
				'alt'   => '2 Column Right', 
				'img'  => ReduxFramework::$_url.'assets/img/2cr.png',
				'presets' =>  array(
							'edupress_grid_item_count' => '3',
							'edupress_grid_item_count' => '2'
							)
			)
		),
		'default' => '3',
		'priority' => 83,
		'section_id' => 'layout-section',
	)
);
	
Redux::setField(
    $opt_name, // This is your opt_name,		
	array(
		'id'       => 'edupress_coursedetail_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Course Detail Page', 'edupress'), 
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
		'default' => '3',
		'priority' => 84,
		'section_id' => 'layout-section',
	)
);
	
Redux::setField(
    $opt_name, // This is your opt_name,		
	array(
		'id'       => 'edupress_instructorlisting_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Instructor Listing Page', 'edupress'), 
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
		'default' => '1',
		'priority' => 85,
		'section_id' => 'layout-section',	
	)
);


Redux::setField(
    $opt_name, // This is your opt_name,		
	array(
		'id'       => 'edupress_cart_checkout_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Cart, Checkout and My Account Page', 'edupress'), 
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
		'default' => '1',
		'priority' => 86,
		'section_id' => 'layout-section',	
	)
);
	
	
	
