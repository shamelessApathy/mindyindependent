<?php
/*
 * Search Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_university_add_search_classes_section', 40); 
function edupress_university_add_search_classes_section( $sections ){		
	$courses_search_section = array( array(
		'title' => esc_html__('Search', 'edupress'),
		'id'    => 'courses-search-section',
		'icon'  => 'el el-search',
		'desc'  => esc_html__('This section contains options for course search.', 'edupress'),
		'fields'=> array(
	
		array(
				'id'       => 'edupress_classsearch_number',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Classes Per Page', 'edupress' ),
				'options'  => edupress_get_num_array(),
				'default'  => '10',
			),
			
			
		array(
			'id'       => 'edupress_classsearch_price',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Price', 'edupress'),
			'subtitle'    => esc_html__('If Price acf field is exist for class custom post type, then this option will work.', 'edupress'),
			'default'  => true,
			
		),
		
		array(
			'id'       => 'edupress_classsearch_year_old',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Age (Year old range)', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_classsearch_class_size',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Size', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_classsearch_class_duration',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Duration', 'edupress'),
			'default'  => true,
		),
	
		) ) );
		array_splice( $sections, 7, 0, $courses_search_section); //pos 9
		
			
		
		return $sections;
}
	

