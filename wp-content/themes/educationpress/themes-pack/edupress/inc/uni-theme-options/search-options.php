<?php
/*
 * Search Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_university_add_search_courses_section', 40); 
function edupress_university_add_search_courses_section( $sections ){		
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
					'10' => esc_html__('10', 'edupress'),
					'25' => esc_html__('25', 'edupress'),
					'50' => esc_html__('50', 'edupress'),
					'100' => esc_html__('100', 'edupress'),
				),
				'default'  => '10',
			),
	
	
		
	
		) ) );
		array_splice( $sections, 7, 0, $courses_search_section); //pos 9
		
			
		
		return $sections;
}
	

