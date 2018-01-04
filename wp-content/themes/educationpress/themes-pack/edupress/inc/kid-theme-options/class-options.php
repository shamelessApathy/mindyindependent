<?php
/*
 * Class Options
 */
global $opt_name;


add_filter('redux/options/'. $opt_name .'/sections', 'edupress_kid_add_classs_section', 30); 
function edupress_kid_add_classs_section( $sections ){
	$classs_section =  array(array(
		'title' => esc_html__('Classes', 'edupress'),
		'id'    => 'classs-section',
		'icon'  => 'el el-book',
		'desc'  => esc_html__('This section contains options for classs.', 'edupress'),
		'fields'=> array(
		
		
		array(
			'id'       => 'edupress_class_currency_symbol',
			'type'     => 'text', 
			'title'    => esc_html__('Class Price Currency Symbol', 'edupress'),
			'default'  => '$',
		),
		
		
		array(
			'id'       => 'edupress_class_currency_position',
			'type'     => 'select', 
			'title'    => esc_html__('Class Price Currency Position', 'edupress'),
			'options'  => array(
				'left' => esc_html__('Left', 'edupress'),
				'right' => esc_html__('Right', 'edupress'),
				'left_with_space' => esc_html__('Left With Space', 'edupress'),
				'right_with_space' => esc_html__('Right With Space', 'edupress'),				
			),
			'default'  => 'left',
			
		),	
		
		) )) ;    
	array_splice( $sections, 3, 0, $classs_section); //pos 4	
	

	/*
	 * Class Listing sub section
	 */
	 
	$class_listing_section  =  array( array(
		'title' => esc_html__( 'Class Listing', 'edupress'),
		'id'    => 'class-listing-section',
		'desc'  => esc_html__('This section contains options related to Class Listing', 'edupress' ),
		'subsection' => true,
		'fields'=> array(
		
	
	
		array(
				'id'       => 'edupress_classlisting_number',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Classes Per Page', 'edupress' ),
				'options'  => edupress_get_num_array(),
				'default'  => '10',
			),
				
		
		array(
			'id'       => 'edupress_classlisting_instructor',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Teacher Name', 'edupress'),
			'default'  => false,
		),
		
		array(
			'id'       => 'edupress_classlisting_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Categories', 'edupress'),
			'default'  => false,
		),
		array(
            'id'        => 'edupress_grid_item_count',
            'type'      => 'image_select',
            'title'    => esc_html__( 'Classes Per Row', 'edupress' ),
			'presets'    => true,
            'desc' => esc_html__( 'Columns of classes display in single row. Class listing full width layout will not work with 2 columns.', 'edupress' ),
            'options'   => array(
                '2' => array(
                    'title' => esc_html__('2 Columns', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/kid-theme-options/images/2col.jpg',
					'presets' =>  array(
							'edupress_classlisting_layout' => '2',
							'edupress_classlisting_layout' => '3',
							)
					
                ),
                '3' => array(
                    'title' => esc_html__('3 Columns', 'edupress'),
                    'img' => get_template_directory_uri() . '/inc/kid-theme-options/images/3col.jpg',
					
					'presets' =>  array(
							'edupress_classlisting_layout' => '1',
							//'edupress_classlisting_layout' => '2',
							//'edupress_classlisting_layout' => '3'
							)
					
                ),
            ),
            'default'   => '2',			
        ),
	
		array(
			'id'       => 'edupress_classlisting_price',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Price', 'edupress'),
			'subtitle'    => esc_html__('If Price acf field is exist for class custom post type, then this option will work.', 'edupress'),
			'default'  => false,
			
		),
		
		array(
			'id'       => 'edupress_classlisting_year_old',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Age (Year old range)', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_classlisting_class_size',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Size', 'edupress'),
			'default'  => true,
		),
		array(
			'id'       => 'edupress_classlisting_class_duration',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Class Duration', 'edupress'),
			'default'  => true,
		),
		
		
	
		) ));
		
		array_splice( $sections, 4, 0, $class_listing_section); //pos 5	
	
		
	/*
	 * Class Detaik sub section
	 */
	$class_detail_section = array( array(
		'title' => esc_html__( 'Class Detail', 'edupress'),
		'id'    => 'class-detail-section',
		'desc'  => esc_html__('This section contains options related to Class Detail', 'edupress' ),
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
			'id'       => 'edupress_classdetail_instructor',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Instructor Name', 'edupress'),
			'default'  => true,
		),
		
		
		array(
			'id'       => 'edupress_classdetail_cat',
			'type'     => 'switch', 
			'title'    => esc_html__('Display Categories', 'edupress'),
			'default'  => true,
		),
		
		
		
		array(
			'id'       => 'edupress_classdetail_socialshare',
			'type'     => 'switch', 
			'title'    => esc_html__('Add Social Sharing Icon', 'edupress'),
			'default'  => true,
		),
		
		array(
			'id'       => 'edupress_classdetail_price',
			'type'     => 'switch', 
			'title'    => esc_html__('Dosplay Price', 'edupress'),
			'default'  => true,
		),
		
		
		) ) );
		array_splice( $sections, 5, 0, $class_detail_section); //pos 6	
		
		
		/*
	 * Class Detaik sub section
	 */
	
	$class_inst_section = array( array(
		'title' => esc_html__( 'Instructor Detail', 'edupress'),
		'id'    => 'class-instructor-section',
		'desc'  => esc_html__('This section contains options related to class teachers', 'edupress' ),
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
		
		array_splice( $sections, 6, 0, $class_inst_section); //pos 6	
		
		return $sections;
		
}
