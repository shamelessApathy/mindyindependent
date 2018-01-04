<?php
/*
 * Course Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Courses', 'educationpress'),
    'id'    => 'courses-section',
	'icon'  => 'el el-book',
    'desc'  => esc_html__('This section contains options for courses.', 'educationpress'),
    'fields'=> array() ) );
	
/*
 * Course Listing sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Course Listing', 'educationpress'),
    'id'    => 'course-listing-section',
    'desc'  => esc_html__('This section contains options related to Course Listing', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	
	array(
    'id'       => 'educationpress_courselisting_mode',
    'type'     => 'image_select',
    'title'    => esc_html__('Default Grid/List Mode', 'educationpress'), 
    'options'  => array(
        '1'      => array(
            'alt'   => esc_html__('Grid View', 'educationpress'),
            'img'   => get_template_directory_uri().'/images/i_gridview.png'
        ),
        '2'      => array(
            'alt'   => esc_html__('List View', 'educationpress'), 
            'img'   => get_template_directory_uri().'/images/i_listview.png'
        ),
       
    ),
    'default' => '1'
	),

		
		
	array(
            'id'        => 'educationpress_grid_item_count',
            'type'      => 'image_select',
            'title'    => esc_html__( 'Courses Grid Mode', 'educationpress' ),
			'presets'    => true,
            'desc' => esc_html__( 'Columns of courses display in grid row. Course listing full width layout will not work with 2 columns.', 'educationpress' ),
            'options'   => array(
                '2' => array(
                    'title' => esc_html__('2 Columns', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/2col.jpg',
					'presets' =>  array(
							'educationpress_courselisting_layout' => '2',
							'educationpress_courselisting_layout' => '3',
							)
					
                ),
                '3' => array(
                    'title' => esc_html__('3 Columns', 'educationpress'),
                    'img' => get_template_directory_uri() . '/inc/theme-options/images/3col.jpg',
					
					'presets' =>  array(
							'educationpress_courselisting_layout' => '1',
							'educationpress_courselisting_layout' => '2',
							'educationpress_courselisting_layout' => '3'
							)
					
                ),
            ),
            'default'   => '2',			
        ),


	array(
            'id'       => 'educationpress_courselisting_number',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Courses Per Page', 'educationpress' ),
            'options'  => array(
                '1' => esc_html__('1', 'educationpress'),
                '2' => esc_html__('2', 'educationpress'),
				'3' => esc_html__('3', 'educationpress'),
				'4' => esc_html__('4', 'educationpress'),
				'5' => esc_html__('5', 'educationpress'),
				'6' => esc_html__('6', 'educationpress'),
				'7' => esc_html__('7', 'educationpress'),
				'8' => esc_html__('8', 'educationpress'),
				'9' => esc_html__('9', 'educationpress'),
				'10' => esc_html__('10', 'educationpress'),
				'11' => esc_html__('11', 'educationpress'),
				'12' => esc_html__('12', 'educationpress'),
            ),
            'default'  => '10',
        ),

	array(
		'id'       => 'educationpress_courselisting_instructor',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Instructor Name', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_courselisting_cat',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Categories', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_courselisting_enroll',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Number of Enroll', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_courselisting_ratting',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Star Ratting', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_courselisting_price',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Price', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_courselisting_sale',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Sale Label', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_courselisting_sorting',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Sorting Dropdown', 'educationpress'),
		'default'  => true,
	),
	
	array(
            'id'       => 'educationpress_courselisting_default_sort',
            'type'     => 'select',
            'title'    => esc_html__( 'Default Order of Courses', 'educationpress' ),
			'desc'    => esc_html__('For ratings sorting you need to active Rich Reviews Plugin.', 'educationpress'),
            'options'  => apply_filters( 'educationpress_courslisting_options',
					array(
						'popular' => esc_html__('Popularity By Enrolled', 'educationpress'),
						'ratings' => esc_html__('Ratings', 'educationpress'),
						'new_first' => esc_html__('Newest', 'educationpress'),
						'old_first' => esc_html__('Oldest', 'educationpress'),
						'alphabet_az' => esc_html__('Name (A-Z)', 'educationpress'),
						'alphabet_za' => esc_html__('Name (Z-A)', 'educationpress'),
						'plow_high' => esc_html__('Price Low To High', 'educationpress'),
						'phigh_low' => esc_html__('Price High To Low', 'educationpress'),
				)
			),
            'default'  => 'new_first',
        ),
      

    ) ) );
	
	
	
/*
 * Course Detaik sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Course Detail', 'educationpress'),
    'id'    => 'course-detail-section',
    'desc'  => esc_html__('This section contains options related to Course Detail', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	
	array(
		'id'       => 'educationpress_coursedetail_instructor',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Instructor Name', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_coursedetail_cat',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Categories', 'educationpress'),
		'default'  => true,
	),
	
	
	
	
	array(
		'id'       => 'educationpress_coursedetail_ratting',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Star Ratting', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursedetail_wishlist',
		'type'     => 'switch', 
		'title'    => esc_html__('Allow Wishlist Course', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursedetail_socialshare',
		'type'     => 'switch', 
		'title'    => esc_html__('Add Social Sharing Icon', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursedetail_reviewratings',
		'type'     => 'switch', 
		'title'    => esc_html__('Allow Review and Rating', 'educationpress'),
		'desc'    => esc_html__('User can submit review and ratting on course but you need to active Rich Reviews Plugin.', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_coursedetail_with_tab',
		'type'     => 'switch', 
		'title'    => esc_html__('Allow Details With Tab', 'educationpress'),
		'desc'    => esc_html__('User will see all course details in tabbed format', 'educationpress'),
		'default'  => false,
	),
	
	
	 array(
		'id'       => 'educationpress_coursedetail_tabs',
		'type'     => 'sorter',
		'title'    => 'Tab Order',
		'desc'     => 'Organize how you want the tabs to appear on the course detail page',
		'compiler' => 'true',
		'options'  => array(
			'disabled' => array(
				
			),
			'enabled'  => array(
				'desc' =>  esc_html__( 'Description', 'educationpress'),
				'structure' => esc_html__( 'Curriculum', 'educationpress'),
				'inst' =>  esc_html__( 'About Instructor', 'educationpress'),
				'reviews' => esc_html__( 'Reviews', 'educationpress'),
			),
		),
		'required' => array( 'educationpress_coursedetail_with_tab', '=', true ),
	),
	array(
		'id'        => 'educationpress_coursedetail_desc_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Description Title', 'educationpress' ),
		'default'   =>  esc_html__( 'Course Description', 'educationpress' ),
     ),
	 array(
		'id'        => 'educationpress_coursedetail_structure_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Curriculum Title', 'educationpress' ),
		'default'   =>  esc_html__( 'Curriculum', 'educationpress' ),
     ),
	 array(
		'id'        => 'educationpress_coursedetail_inst_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Instructor Title', 'educationpress' ),
		'default'   =>  esc_html__( 'About Instructor', 'educationpress' ),
     ),
	 array(
		'id'        => 'educationpress_coursedetail_reviews_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Reviews Title', 'educationpress' ),
		'default'   =>  esc_html__( 'Reviews', 'educationpress' ),
     ),
      

    ) ) );


