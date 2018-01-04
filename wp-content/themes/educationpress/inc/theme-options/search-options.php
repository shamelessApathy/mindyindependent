<?php
/*
 * Search Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Search', 'educationpress'),
    'id'    => 'courses-search-section',
	'icon'  => 'el el-search',
    'desc'  => esc_html__('This section contains options for course search.', 'educationpress'),
    'fields'=> array(

	array(
            'id'       => 'educationpress_coursesearch_number',
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
		'id'       => 'educationpress_coursesearch_instructor',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Instructor Name', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_coursesearch_cat',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Categories', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursesearch_enroll',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Number of Enroll', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_coursesearch_ratting',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Star Ratting', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursesearch_price',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Price', 'educationpress'),
		'default'  => true,
	),
	
	
	array(
		'id'       => 'educationpress_coursesearch_sale',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Sale Label', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_coursesearch_sorting',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Sorting Dropdown', 'educationpress'),
		'default'  => true,
	),
	
	array(
            'id'       => 'educationpress_coursesearch_default_sort',
            'type'     => 'select',
            'title'    => esc_html__( 'Default Order of Courses', 'educationpress' ),
			'desc'    => esc_html__('For ratings sorting you need to active Rich Reviews Plugin.', 'educationpress'),
            'options'  => array(
                'popular' => esc_html__('Popularity By Enrolled', 'educationpress'),
                'ratings' => esc_html__('Ratings', 'educationpress'),
				'new_first' => esc_html__('Newest', 'educationpress'),
				'old_first' => esc_html__('Oldest', 'educationpress'),
				'alphabet_az' => esc_html__('Name (A-Z)', 'educationpress'),
				'alphabet_za' => esc_html__('Name (Z-A)', 'educationpress'),
				'plow_high' => esc_html__('Price Low To High', 'educationpress'),
				'phigh_low' => esc_html__('Price High To Low', 'educationpress'),
            ),
            'default'  => 'new_first',
        ),
      

    ) ) );
	
	

