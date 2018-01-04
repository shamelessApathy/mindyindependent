<?php
/*
 * Course Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_university_add_campuses_section', 30); 
function edupress_university_add_campuses_section( $sections ){
	$campuses_section =  array(array(
		'title' => esc_html__('Campus', 'edupress'),
		'id'    => 'campus-section',
		'icon'  => 'el el-group',
		'desc'  => esc_html__('This section contains options for campus.', 'edupress'),
		'fields'=> array(
				array(
						'id'       => 'edupress_campuslisting_number',
						'type'     => 'select',
						'title'    => esc_html__( 'Number of Campuses Per Page', 'edupress' ),
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
					'id'       => 'edupress_campuslisting_short_desc',
					'type'     => 'switch', 
					'title'    => esc_html__('Display Short Description in Campus Listing', 'edupress'),
					'default'  => true,
				),
				array(
					'id'       => 'edupress_campuslisting_view_btn',
					'type'     => 'switch', 
					'title'    => esc_html__('View Campus button in Campus Listing', 'edupress'),
					'default'  => true,
				),
		
		) )) ;    
	array_splice( $sections, 7, 0, $campuses_section); //pos 4	
	
	return  $sections;
	
	
		
}
