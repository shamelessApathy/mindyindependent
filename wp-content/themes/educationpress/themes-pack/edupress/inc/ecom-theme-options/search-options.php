<?php
/*
 * Search Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_ecommerce_add_search_courses_section', 40); 
function edupress_ecommerce_add_search_courses_section( $sections ){		
	$courses_search_section = array( array(
		'title' => esc_html__('Search', 'edupress'),
		'id'    => 'courses-search-section',
		'icon'  => 'el el-search',
		'desc'  => esc_html__('This section contains options for course search.', 'edupress'),
		'fields'=> array(
	
		array(
				'id'       => 'edupress_coursesearch_number',
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
			'id'       => 'edupress_coursesearch_instructor',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Instructor Name', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_coursesearch_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Categories', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursesearch_enroll',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Number of Enroll', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_coursesearch_ratting',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Star Ratting', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursesearch_price',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Price', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_coursesearch_sale',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Sale Label', 'edupress'),
			'default'  => true,
		),
		/*
		array(
			'id'       => 'edupress_coursesearch_sorting',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Sorting Dropdown', 'edupress'),
			'default'  => true,
		),
			
		array(
				'id'       => 'edupress_coursesearch_default_sort',
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
	
		) ) );
		array_splice( $sections, 7, 0, $courses_search_section); //pos 9
		
			
		
		return $sections;
}
	

