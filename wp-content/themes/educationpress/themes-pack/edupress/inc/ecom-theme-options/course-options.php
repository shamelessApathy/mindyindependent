<?php
/*
 * Course Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_ecommerce_add_courses_section', 30); 
function edupress_ecommerce_add_courses_section( $sections ){
	$courses_section =  array(array(
		'title' => esc_html__('Courses', 'edupress'),
		'id'    => 'courses-section',
		'icon'  => 'el el-book',
		'desc'  => esc_html__('This section contains options for courses.', 'edupress'),
		'fields'=> array() )) ;    
	array_splice( $sections, 3, 0, $courses_section); //pos 4	
	

	/*
	 * Course Listing sub section
	 */
	 
	$course_listing_section  =  array( array(
		'title' => esc_html__( 'Course Listing', 'edupress'),
		'id'    => 'course-listing-section',
		'desc'  => esc_html__('This section contains options related to Course Listing', 'edupress' ),
		'subsection' => true,
		'fields'=> array(
		
		array(
		'id'       => 'edupress_courselisting_mode',
		'type'     => 'image_select',
		'title'    => esc_html__('Default Grid/List Mode', 'edupress'), 
		'options'  => array(
			'1'      => array(
				'alt'   => esc_html__('Grid View', 'edupress'),
				'img'   => get_template_directory_uri().'/inc/ecom-theme-options/images/i_gridview.png'
			),
			'2'      => array(
				'alt'   => esc_html__('List View', 'edupress'), 
				'img'   => get_template_directory_uri().'/inc/ecom-theme-options/images/i_listview.png'
			),
		   
		),
		'default' => '1'
		),
		
		
	array(
            'id'        => 'edupress_grid_item_count',
            'type'      => 'image_select',
            'title'    => esc_html__( 'Courses Grid Mode', 'edupress' ),
			'presets'    => true,
            'desc' => esc_html__( 'Columns of courses display in grid row. Course listing full width layout will not work with 2 columns.', 'edupress' ),
            'options'   => array(
                '2' => array(
                    'title' => esc_html__('2 Columns', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/2col.jpg',
					'presets' =>  array(
							'edupress_courselisting_layout' => '2',
							'edupress_courselisting_layout' => '3',
							)
					
                ),
                '3' => array(
                    'title' => esc_html__('3 Columns', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/ecom-theme-options/images/3col.jpg',
					
					'presets' =>  array(
							'edupress_courselisting_layout' => '1',
							'edupress_courselisting_layout' => '2',
							'edupress_courselisting_layout' => '3'
							)
					
                ),
            ),
            'default'   => '2',			
        ),
	
	
	
		array(
				'id'       => 'edupress_courselisting_number',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Courses Per Page', 'edupress' ),
				'options'  => array(
					'1' => esc_html__('1', 'edupress'),
					'2' => esc_html__('2', 'edupress'),
					'3' => esc_html__('3', 'edupress'),
					'4' => esc_html__('4', 'edupress'),
					'5' => esc_html__('5', 'edupress'),
					'6' => esc_html__('6', 'edupress'),
					'7' => esc_html__('7', 'edupress'),
					'8' => esc_html__('8', 'edupress'),
					'9' => esc_html__('9', 'edupress'),
					'10' => esc_html__('10', 'edupress'),
					'11' => esc_html__('11', 'edupress'),
					'12' => esc_html__('12', 'edupress'),
				),
				'default'  => '10',
			),
	
		array(
			'id'       => 'edupress_courselisting_instructor',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Instructor Name', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_courselisting_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Categories', 'edupress'),
			'default'  => true,
		),
		
		
		
		
		array(
			'id'       => 'edupress_courselisting_enroll',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Number of Enroll', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_courselisting_ratting',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Star Ratting', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_courselisting_price',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Price', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_courselisting_sale',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Sale Label', 'edupress'),
			'default'  => true,
		),
		
		/*
		array(
			'id'       => 'edupress_courselisting_sorting',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Sorting Dropdown', 'edupress'),
			'default'  => true,
		),
		
		
		array(
				'id'       => 'edupress_courselisting_default_sort',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Order of Courses', 'edupress' ),
				'desc'    => esc_html__('For ratings sorting you need to active Rich Reviews Plugin.', 'edupress'),
				'options'  => array(
					'popular' => esc_html__('Popularity By Enrolled', 'edupress'),
					'ratings' => esc_html__('Ratings', 'edupress'),
					'new_first' => esc_html__('Newest', 'edupress'),
					'old_first' => esc_html__('Oldest', 'edupress'),
					'alphabet_az' => esc_html__('Name (A-Z)', 'edupress'),
					'alphabet_za' => esc_html__('Name (Z-A)', 'edupress'),
					'plow_high' => esc_html__('Price Low To High', 'edupress'),
					'phigh_low' => esc_html__('Price High To Low', 'edupress'),
				),
				'default'  => 'new_first',
			),
		  */
	
		) ));
		
		array_splice( $sections, 4, 0, $course_listing_section); //pos 5	
	
		
	/*
	 * Course Detaik sub section
	 */
	$course_detail_section = array( array(
		'title' => esc_html__( 'Course Detail', 'edupress'),
		'id'    => 'course-detail-section',
		'desc'  => esc_html__('This section contains options related to Course Detail', 'edupress' ),
		'subsection' => true,
		'fields'=> array(
		
		array(
			'id'       => 'edupress_coursedetail_instructor',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Instructor Name', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_coursedetail_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Categories', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_coursedetail_tag',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Tags', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursedetail_ratting',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Star Ratting', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursedetail_wishlist',
			'type'     => 'switch', 
			'title'    => esc_html__('Allow Wishlist Course', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursedetail_socialshare',
			'type'     => 'switch', 
			'title'    => esc_html__('Add Social Sharing Icon', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursedetail_reviewratings',
			'type'     => 'switch', 
			'title'    => esc_html__('Allow Review and Rating', 'edupress'),
			'desc'    => esc_html__('User can submit review and ratting on course but you need to active Rich Reviews Plugin.', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_coursedetail_with_tab',
			'type'     => 'switch', 
			'title'    => esc_html__('Allow Details With Tab', 'edupress'),
			'desc'    => esc_html__('User will see all course details in tabbed format', 'edupress'),
			'default'  => true,
		),
		
		 array(
		'id'       => 'edupress_coursedetail_tabs',
		'type'     => 'sorter',
		'title'    => 'Tab Order',
		'desc'     => 'Organize how you want the tabs to appear on the course detail page',
		'compiler' => 'true',
		'options'  => array(
			'disabled' => array(
				
			),
			'enabled'  => array(
				'desc' =>  esc_html__( 'Description', 'edupress'),
				'like' => esc_html__( 'Like Courses', 'edupress'),
				'related' => esc_html__( 'Related Courses', 'edupress'),
				'inst' =>  esc_html__( 'About Instructor', 'edupress'),
				'reviews' => esc_html__( 'Reviews', 'edupress'),
			),
		),
		'required' => array( 'edupress_coursedetail_with_tab', '=', true ),
	),
	array(
		'id'        => 'edupress_coursedetail_desc_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Description Title', 'edupress' ),
		'default'   =>  esc_html__( 'Course Description', 'edupress' ),
     ),
	 array(
		'id'        => 'edupress_coursedetail_related_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Related Courses Title', 'edupress' ),
		'default'   =>  esc_html__( 'Related Courses', 'edupress' ),
     ),
	 array(
		'id'        => 'edupress_coursedetail_inst_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Instructor Title', 'edupress' ),
		'default'   =>  esc_html__( 'About Instructor', 'edupress' ),
     ),
	 /*
	 array(
		'id'        => 'edupress_coursedetail_reviews_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Reviews Title', 'edupress' ),
		'default'   =>  esc_html__( 'Reviews', 'edupress' ),
     ),
	 */
		
		
		
		
		) ) );
		array_splice( $sections, 5, 0, $course_detail_section); //pos 6	
		
		
		/*
	 * Course Detaik sub section
	 */
	
	$course_inst_section = array( array(
		'title' => esc_html__( 'Instructor Detail', 'edupress'),
		'id'    => 'course-instructor-section',
		'desc'  => esc_html__('This section contains options related to Course Provider', 'edupress' ),
		'subsection' => true,
		'fields'=> array(
		
		
		array(
			'id'       => 'edupress_instructor_title',
			'type'      => 'text',
			'title'    => esc_html__('Instructor Title', 'edupress'),
			'default'  => 'Instructor',
			'validate' => 'not_empty',
		),
		
		array(
			'id'       => 'edupress_instructor_slug',
			'type'      => 'text',
			'title'    => esc_html__('Instructor Slug', 'edupress'),
			'subtitle' => esc_html__( 'Please enter instructor slug.', 'edupress' ),
			'default'  => 'instructor',
			'validate' =>  'not_empty',
		),
		
		
		) ) );
		
		array_splice( $sections, 6, 0, $course_inst_section); //pos 6	
		
		return $sections;
		
}
