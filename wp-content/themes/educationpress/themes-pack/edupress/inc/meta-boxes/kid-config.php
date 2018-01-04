<?php
/**
 * Meta box configuration file.
 */

if( !function_exists( 'edupress_university_register_meta_boxes' ) ) 
{
    /**
     * Register meta boxes for this theme
     *
     * @param $meta_boxes
     * @return array
     * @since 1.0.0
     */
	 
	 
    function edupress_university_register_meta_boxes ( $meta_boxes ) {

        $prefix = 'EDU_PRESS_';
        $admin_email = get_option('admin_email');
		global $signup_url,$edupress_options;
		
		if(!empty($edupress_options))
		{
		if (!empty($edupress_options[ 'edupress_header_top_banner' ]) && $edupress_options[ 'edupress_header_top_banner' ] ) { 
        $meta_boxes[] = array(
            'id'        => 'banner-meta-box',
            'title'     => esc_html__( 'Banner Settings', 'edupress' ),
            'pages'     => array( 'page','post', 'event' ),
            'context'   => 'normal',
            'priority'  => 'low',
            'hide'   => array(
                'template'    => array( 'page-templates/home.php','page-templates/tpl-under-construction.php'),
            ),
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Banner Image', 'edupress' ),
                    'id'    => "{$prefix}page_banner_image",
                   // 'desc'  => esc_html__( 'Banner image should have minimum width of 1970px and minimum height of 810px.', 'edupress' ),
					'desc'  => sprintf( edupress_escape_string( 'Banner image should have minimum width of 1970px and minimum height of 810px. You can enable/disable this feature from theme option header top banner <a href="%1$s">Click Here</a>.' ),'themes.php?page=_edupress_options' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 1
                ),
                
            )
        );
		}
		}
		
		 $meta_boxes[] = array(
            'id'        => 'instructor-meta-box',
            'title'     => esc_html__( 'Instructors Settings', 'edupress' ),
            'pages'     => array( 'page'),
            'context'   => 'normal',
            'priority'  => 'low',
            'show'   => array(
                'template'    => array( 'kid-page-templates/tpl-our-techers.php'),
            ),
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Instructors Per Page', 'edupress' ),
                    'id'    => "{$prefix}instructors_perpage",
                    'desc'  => esc_html__( 'Number of instructors you want to display on per page', 'edupress' ),
                    'type'  => 'number',
					'std'   => '9',
                ),
				array(
					'id'    => "{$prefix}instructors_orderby",
					'type'     => 'select',
					'name'    => esc_html__( 'Order Instructors By', 'edupress' ),
					'options'  => array(
						'display_name' => esc_html__('Order by Instructors display name', 'edupress'),
						'registered' => esc_html__('Order by Instructors registered date', 'edupress'),
					),
					'std'  => 'registered',
					'placeholder' => esc_html__( 'Select Instructors Order By', 'edupress' ),
				),
			array(
				'id'    => "{$prefix}instructors_order",
				'type'     => 'select',
				'name'    => esc_html__( 'Order', 'edupress' ),
				'options'  => array(
					'ASC' => esc_html__('Ascending', 'edupress'),
					'DESC' => esc_html__('Descending', 'edupress'),
				),
				'std'  => 'DESC',
				'placeholder' => esc_html__( 'Select Instructors Order', 'edupress' ),
			),
			array(
				'id'    => "{$prefix}instructors_is_phone",
				'type'     => 'select',
				'name'    => esc_html__( 'Display Phone', 'edupress' ),
				'options'  => array(
					'Yes' => esc_html__('Yes', 'edupress'),
					'No' => esc_html__('No', 'edupress'),
				),
				'std'  => 'Yes',
			),
			array(
				'id'    => "{$prefix}instructors_is_email",
				'type'     => 'select',
				'name'    => esc_html__( 'Display Email', 'edupress' ),
				'options'  => array(
					'Yes' => esc_html__('Yes', 'edupress'),
					'No' => esc_html__('No', 'edupress'),
				),
				'std'  => 'Yes',
			),
                
            )
        );
		
		/*
		 * For Campus Post Type
		 */
		/*
         * Gallery meta box for gallery post type
         */
        $meta_boxes[] = array(
            'id'        => 'campus-post-type-meta-box',
            'title'     => esc_html__( 'Campus Images', 'edupress' ),
            'pages'     => array( 'campus' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Campus Images', 'edupress' ),
                    'id'    => "{$prefix}gallery",
                    'desc'  => esc_html__( 'Gallery image should have minimum width of 1024px and minimum height of 768px OR (800X600 pix).  Bigger size images will be cropped automatically.', 'edupress' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 20
                ),
                
            )
        );
		
		
		
		/*
		 * For Course Post Type
		 */
		/*
         * Course meta box for course post type
         */
		 /*
		$meta_boxes[] = array(
            'id'        => 'course-post-type-meta-box',
            'title'     => esc_html__( 'Start Date', 'edupress' ),
            'pages'     => array( 'course' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Start Date', 'edupress' ),
					'type' => 'date',
                    'id'    => "{$prefix}start_date",
                ),
                
            )
        );
		*/
		

       
        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'edupress_university_theme_meta', $meta_boxes );

        return $meta_boxes;

    }

    add_filter( 'rwmb_meta_boxes', 'edupress_university_register_meta_boxes' );

}

	



