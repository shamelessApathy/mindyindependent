<?php
/*
 * Layout Options
 */
global $opt_name;
Redux::setField(
    $opt_name, // This is your opt_name,	
	array(
		'id'       => 'edupress_searchclass_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Search Class Page', 'edupress'), 
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
		'id'       => 'edupress_classinstructor_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Class Instructor Page', 'edupress'), 
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
		'id'       => 'edupress_classlisting_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Class Listing Page', 'edupress'), 
		'desc'     => esc_html__( 'Classes grid mode 2 column will not work with full width layout.', 'edupress' ),
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
							//'edupress_grid_item_count' => '3',
							'edupress_grid_item_count' => '2'
							)
			),
			'3'      => array(
				'alt'   => '2 Column Right', 
				'img'  => ReduxFramework::$_url.'assets/img/2cr.png',
				'presets' =>  array(
							//'edupress_grid_item_count' => '3',
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
		'id'       => 'edupress_classdetail_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Class Detail Page', 'edupress'), 
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
		'id'       => 'edupress_campuslisting_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Campus Listing Page', 'edupress'), 
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


Redux::setField(
    $opt_name, // This is your opt_name,		
	array(
		'id'       => 'edupress_campusdetail_layout',
		'type'     => 'image_select',
		'title'    => esc_html__('Campus Detail Page', 'edupress'), 
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
		'priority' => 87,
		'section_id' => 'layout-section',	
	)
);
	
	
	
