<?php
/*
 * Course Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_university_add_courses_section', 30); 
function edupress_university_add_courses_section( $sections ){
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
				'id'       => 'edupress_courselisting_number',
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
	
		array(
			'id'       => 'edupress_courselisting_search_box',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Course Search Box', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_courselisting_search_box_with_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Course Search Box With Category', 'edupress'),
			'default'  => true,
			'required' => array('edupress_courselisting_search_box','equals','1')
		),
		
	
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
		
		//start for inquiry btn
		array(
			'id'       => 'edupress_classdetail_enroll_btn_disp',
			'type'     => 'switch', 
			'title'    => esc_html__('Inquiry Button Display', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_type',
			'type'     => 'button_set', 
			'title'    => esc_html__('Inquiry Button Type', 'edupress'),
			'options' => array(
				'contact_form' => 'Contact Form Popup', 
				'link' => 'Link Redirection', 
			 ), 
			'default' => 'contact_form',
			'required' => array( 'edupress_classdetail_enroll_btn_disp', '=', true ),
		),
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_contact_title',
			'type'     => 'text', 
			'title'    => esc_html__('Inquiry Contact Form Title', 'edupress'),
			'default'  => 'Inquiry Now',
			'required' => array( 'edupress_classdetail_enroll_btn_type', '=', 'contact_form' ),
		),	
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_contact_desc',
			'type'     => 'text', 
			'title'    => esc_html__('Inquiry Contact Form Description', 'edupress'),
			'default'  => esc_html('Please fill the inquiry details.'),
			'required' => array( 'edupress_classdetail_enroll_btn_type', '=', 'contact_form' ),
		),	
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_contact_form',
			'type'     => 'text', 
			'title'    => esc_html__('Inquiry Contact Form 7 ShortCode', 'edupress'),
			'default'  => '',
			'required' => array( 'edupress_classdetail_enroll_btn_type', '=', 'contact_form' ),
		),	
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_text',
			'type'     => 'text', 
			'title'    => esc_html__('Inquiry Button Text', 'edupress'),
			'default'  => 'Inquiry Now',
			'required' => array( 'edupress_classdetail_enroll_btn_type', '=', 'link' ),
		),	
		
		array(
			'id'       => 'edupress_classdetail_enroll_btn_link',
			'type'     => 'text', 
			'title'    => esc_html__('Inquiry Button Link', 'edupress'),
			'validate' => 'url', 
			'required' => array( 'edupress_classdetail_enroll_btn_type', '=', 'link' ),
		),	
		//end for inquiry btn
		
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
			'id'       => 'edupress_coursedetail_socialshare',
			'type'     => 'switch', 
			'title'    => esc_html__('Add Social Sharing Icon', 'edupress'),
			'default'  => true,
		),
		
		
		) ) );
		array_splice( $sections, 5, 0, $course_detail_section); //pos 6	
		
		
		/*
	 * Course Detaik sub section
	 */
	
	$course_inst_section = array( array(
		'title' => esc_html__( 'Instructor Detail', 'edupress'),
		'id'    => 'course-instructor-section',
		'desc'  => esc_html__('This section contains options related to course instructors', 'edupress' ),
		//'subsection' => true,
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
