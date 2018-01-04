<?php
/*
 * Layout Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Layouts', 'edupress'),
    'id'    => 'layout-section',
	'icon'  => 'el el-screen-alt',
    'desc'  => esc_html__('This section contains options for page layouts. Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'edupress'),
    'fields'=> array(
	
	
	array(
    'id'       => 'edupress_blogauthor_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Author Page', 'edupress'), 
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
	'priority' => 20,
	),
	
	array(
    'id'       => 'edupress_bloglisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Listing Page', 'edupress'), 
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
	'priority' => 40,
	),
	
	
	array(
    'id'       => 'edupress_blogdetail_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Blog Detail Page', 'edupress'), 
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
	'priority' => 60,
	),
	
	array(
    'id'       => 'edupress_search_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Search Blog Page', 'edupress'), 
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
	'priority' => 70,
	),
	
	array(
    'id'       => 'edupress_eventlisting_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Event Listing Page', 'edupress'), 
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
	'priority' => 80,
	),
	
	
	array(
    'id'       => 'edupress_eventdetail_layout',
    'type'     => 'image_select',
    'title'    => esc_html__('Event Detail Page', 'edupress'), 
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
	'priority' => 100,
	),
	
	) ) );
	
