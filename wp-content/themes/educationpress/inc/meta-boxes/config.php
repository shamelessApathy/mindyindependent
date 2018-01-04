<?php
/**
 * Meta box configuration file.
 */

if( !function_exists( 'educationpress_register_meta_boxes' ) ) {
    /**
     * Register meta boxes for this theme
     *
     * @param $meta_boxes
     * @return array
     * @since 1.0.0
     */
    function educationpress_register_meta_boxes ( $meta_boxes ) {

        $prefix = 'EDU_PRESS_';
        $admin_email = get_option('admin_email');
		global $signup_url,$educationpress_options;


        /*
         * INDEX
         * 1. Video Gallery
         * 2. Post Gallery
         * 3. Contact Page
         * 4. Pages Banner
         * 5. Homepage Banner
         */


        /*
         * Video embed code meta box for video post format
         */
        $meta_boxes[] = array(
            'id'        => 'video-meta-box',
            'title'     => esc_html__( 'Video Embed Code', 'educationpress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'video' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Video Embed Code', 'educationpress' ),
                    'desc'  => esc_html__( 'If you are not using self hosted videos then please provide the video embed code and remove the width and height attributes.', 'educationpress' ),
                    'id'    => "{$prefix}embed_code",
                    'type'  => 'textarea',
                    'cols'  => '20',
                    'rows'  => '3'
                )
            )
        );
		
		 /*
         * Audio embed code meta box for audio post format
         */
        $meta_boxes[] = array(
            'id'        => 'audio-meta-box',
            'title'     => esc_html__( 'Audio Embed Code', 'educationpress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'audio' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Audio Embed Code', 'educationpress' ),
                    'desc'  => esc_html__( 'If you are not using self hosted audios then please provide the audio embed code (soundcloud.com) and remove the width and height attributes.', 'educationpress' ),
                    'id'    => "{$prefix}audio_embed_code",
                    'type'  => 'textarea',
                    'cols'  => '20',
                    'rows'  => '3'
                )
            )
        );



 		/*
         * Quote meta box for quote post format
         */
        $meta_boxes[] = array(
            'id'        => 'quote-meta-box',
            'title'     => esc_html__( 'Quote', 'educationpress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'quote' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Quote Text', 'educationpress' ),
                    'desc'  => esc_html__( 'Please add quote', 'educationpress' ),
                    'id'    => "{$prefix}quote_text",
                    'type'  => 'textarea',
                    'cols'  => '20',
                    'rows'  => '3'
                )
            )
        );

        /*
         * Gallery Meta Box
         */
        $meta_boxes[] = array(
            'id'        => 'gallery-meta-box',
            'title'     => esc_html__( 'Gallery Images', 'educationpress'),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'gallery' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Upload Gallery Images', 'educationpress' ),
                    'id'    => "{$prefix}gallery",
                    'desc'  => esc_html__( 'Images should have minimum width of 750px and minimum height of 330px (900X420), Bigger size images will be cropped automatically.', 'educationpress' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 7
                )
            )
        );

        /*
         * Contact Meta Box
         */
        $meta_boxes[] = array(
            'id'        => 'contact-meta-box',
            'title'     => esc_html__( 'Contact Page Information', 'educationpress'),
            'pages'     => array( 'page' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'tabs'      => array(
                'google-map'  => array(
                    'label' => esc_html__( 'Google Map', 'educationpress' ),
                    'icon'  => 'dashicons-location',
                ),
                'contact-details'  => array(
                    'label' => esc_html__( 'Contact Details', 'educationpress' ),
                    'icon'  => 'dashicons-phone',
                ),
                'customer-support' => array(
                    'label' => esc_html__( 'Customer Support', 'educationpress' ),
                    'icon'  => 'dashicons-admin-users',
                ),
				 'customer-question' => array(
                    'label' => esc_html__( 'Questoins', 'educationpress' ),
                    'icon'  => 'dashicons-testimonial',
                ),
            ),
            // Tab style: 'default', 'box' or 'left'. Optional
            'tab_style' => 'left',
            'show'   => array(
                // List of page templates (used for page only). Array. Optional.
                'template'    => array( 'page-templates/tpl-contact.php' ),
            ),
            'fields'    => array(
                array(
                    'id'    => "educationpress_map_address",
                    'name'  => esc_html__( 'Office Address', 'educationpress' ),
                    'desc'  => esc_html__( 'Leaving it empty will hide the google map.', 'educationpress'),
                    'type'  => 'text',
                    'std'   => '121 King St, Melbourne VIC 3000, Australia',
                    'tab'   => 'google-map',
                    'size'  => 50,
                ),
                array(
                    'id'    => "educationpress_map_location",
                    'name'  => esc_html__( 'Office Location', 'educationpress' ),
                    'desc'  => wp_kses_post( 'Drag the marker to point your office location. You can also use the address field above to search for your address. <br/>For smooth work of map, please enter google map api key on <strong>Appearance>Theme Options>Google Map</strong> in Google Map API Key field.' ),
                    'type'  => 'map',
                    'std'   => '-37.817314,144.955431',         // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "educationpress_map_address",
                    'tab'   => 'google-map',
                ),
                array(
                    'id'   => 'educationpress_map_zoom',
                    'type' => 'slider',
                    'name' => esc_html__( 'Map Zoom Level', 'educationpress' ),
                    'desc' => esc_html__( 'Zoom level for resulted map on contact page.', 'educationpress'),
                    // jQuery UI slider options. See here http://api.jqueryui.com/slider/
                    'js_options' => array(
                        'min'   => 6,
                        'max'   => 18,
                        'step'  => 1,
                    ),
                    'std'   => 14,
                    'tab'   => 'google-map',
                ),
				array(
                    'id'    => "educationpress_detail_title",
                    'name'  => esc_html__( 'Title', 'educationpress' ),
                    'type'  => 'text',
					'std'   => 'Office Address',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => 'educationpress_address',
                    'name'  => esc_html__( 'Office Address to Display', 'educationpress' ),
                    'desc'  => esc_html__( 'Given address will be displayed on contact page.', 'educationpress' ),
                    'type'  => 'textarea',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "educationpress_display_email",
                    'name'  => esc_html__( 'Email to Display', 'educationpress' ),
                    'desc'  => esc_html__( 'Given email address will be displayed on contact page.', 'educationpress' ),
                    'type'  => 'text',
                    'std'   => $admin_email,
                    'tab'   => 'contact-details',
                ),
				 array(
                    'id'    => "educationpress_facebook_url",
                    'name'  => esc_html__( 'Facebook URL', 'educationpress' ),
                    'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "educationpress_google_url",
                    'name'  => esc_html__( 'Google Plus URL', 'educationpress' ),
                    'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "educationpress_twitter_url",
                    'name'  => esc_html__( 'Twitter URL', 'educationpress' ),
                   'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "educationpress_linkedin_url",
                    'name'  => esc_html__( 'LinkedIn URL', 'educationpress' ),
                   	'type' => 'url',
                    'tab'   => 'contact-details',
                ),
				array(
                    'id'    => "educationpress_cus_title",
                    'name'  => esc_html__( 'Title', 'educationpress' ),
                    'type'  => 'text',
					'std'   => 'Customer Support',
                    'tab'   => 'customer-support',
                ),
                array(
                    'id'    => "educationpress_cus_phone",
                    'name'  => esc_html__( 'Support Phone No.', 'educationpress' ),
                    'type'  => 'text',
                    'tab'   => 'customer-support',
                ),
                array(
                    'id'    => "educationpress_cus_email",
                    'name'  => esc_html__( 'Support Email ID', 'educationpress' ),
                    'desc'  => esc_html__( 'Given email address will be displayed for customer support on contact page.', 'educationpress' ),
                    'type'  => 'text',
                    'tab'   => 'customer-support',
                ),
				array(
                    'id'    => "educationpress_ques_title",
                    'name'  => esc_html__( 'Title', 'educationpress' ),
                    'type'  => 'text',
					'std'   => 'Have Any Question?',
                    'tab'   => 'customer-question',
                ),
                array(
                    'id'    => 'educationpress_ques_desc',
                    'name'  => esc_html__( 'Description', 'educationpress' ),
                    'type'  => 'textarea',
					'std'   => 'Various versions years, sometimes by accident, sometimes on purpose (injected humour and the like).',
                    'tab'   => 'customer-question',
                ),
                array(
                    'id'    => "educationpress_ques_button_text",
                    'name'  => esc_html__( 'Button Text', 'educationpress' ),
                    'type'  => 'text',
                    'std'   => 'Ask a Question',
                    'tab'   => 'customer-question',
                ),
				 array(
                    'id'    => "educationpress_ques_button_url",
                    'name'  => esc_html__( 'Button URL', 'educationpress' ),
                    'type' => 'url',
                    'tab'   => 'customer-question',
                ),
               
            )
        );
		
		

        /*
         * Banner meta box
         */
		 if(!empty($educationpress_options))
		{
		if ($educationpress_options[ 'educationpress_header_top_banner' ] ) { 
        $meta_boxes[] = array(
            'id'        => 'banner-meta-box',
            'title'     => esc_html__( 'Banner Settings', 'educationpress' ),
            'pages'     => array( 'page','post', 'event' ),
            'context'   => 'normal',
            'priority'  => 'low',
            'hide'   => array(
                'template'    => array( 'page-templates/home.php','page-templates/home-one.php','page-templates/home-two.php','page-templates/home-three.php' ,'page-templates/tpl-under-construction.php'),
            ),
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Banner Image', 'educationpress' ),
                    'id'    => "{$prefix}page_banner_image",
                   // 'desc'  => esc_html__( 'Banner image should have minimum width of 1970px and minimum height of 810px.', 'educationpress' ),
					'desc'  => sprintf( educationpress_escape_desc( 'Banner image should have minimum width of 1970px and minimum height of 810px. You can enable/disable this feature from theme option header top banner <a href="%1$s">Click Here</a>.', 'educationpress' ),'themes.php?page=_educationpress_options' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 1
                ),
                
            )
        );
		}
		}
		
		
		 		
        /*
         * Gallery meta box for gallery post type
         */
        $meta_boxes[] = array(
            'id'        => 'gallery-post-type-meta-box',
            'title'     => esc_html__( 'Gallery Images', 'educationpress' ),
            'pages'     => array( 'gallery' ),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Gallery Images', 'educationpress' ),
                    'id'    => "{$prefix}gallery",
                    'desc'  => esc_html__( 'Gallery image should have minimum width of 1024px and minimum height of 768px OR (800X600 pix).  Bigger size images will be cropped automatically.', 'educationpress' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 10
                ),
                
            )
        );
		
		
		 $meta_boxes[] = array(
            'id'        => 'instructor-meta-box',
            'title'     => esc_html__( 'Instructors Settings', 'educationpress' ),
            'pages'     => array( 'page'),
            'context'   => 'normal',
            'priority'  => 'low',
            'show'   => array(
                'template'    => array( 'page-templates/tpl-our-techers.php'),
            ),
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Instructors Per Page', 'educationpress' ),
                    'id'    => "{$prefix}instructors_perpage",
                    'desc'  => esc_html__( 'Number of instructors you want to display on per page', 'educationpress' ),
                    'type'  => 'number',
					'std'   => '9',
                ),
				array(
					'id'    => "{$prefix}instructors_orderby",
					'type'     => 'select',
					'name'    => esc_html__( 'Order Instructors By', 'educationpress' ),
					'options'  => array(
						'display_name' => esc_html__('Order by Instructors display name', 'educationpress'),
						'registered' => esc_html__('Order by Instructors registered date', 'educationpress'),
					),
					'std'  => 'registered',
					'placeholder' => esc_html__( 'Select Instructors Order By', 'educationpress' ),
				),
			array(
				'id'    => "{$prefix}instructors_order",
				'type'     => 'select',
				'name'    => esc_html__( 'Order', 'educationpress' ),
				'options'  => array(
					'ASC' => esc_html__('Ascending', 'educationpress'),
					'DESC' => esc_html__('Descending', 'educationpress'),
				),
				'std'  => 'DESC',
				'placeholder' => esc_html__( 'Select Instructors Order', 'educationpress' ),
			),
			array(
				'id'    => "{$prefix}instructors_is_phone",
				'type'     => 'select',
				'name'    => esc_html__( 'Display Phone', 'educationpress' ),
				'options'  => array(
					'Yes' => esc_html__('Yes', 'educationpress'),
					'No' => esc_html__('No', 'educationpress'),
				),
				'std'  => 'Yes',
			),
			array(
				'id'    => "{$prefix}instructors_is_email",
				'type'     => 'select',
				'name'    => esc_html__( 'Display Email', 'educationpress' ),
				'options'  => array(
					'Yes' => esc_html__('Yes', 'educationpress'),
					'No' => esc_html__('No', 'educationpress'),
				),
				'std'  => 'Yes',
			),
                
            )
        );
		
		 // Testimonials Meta Box
        $meta_boxes[] = array(
            'id' => 'testimonials-meta-box',
            'title' => esc_html__('Testimonials Information', 'educationpress'),
            'pages' => array( 'testimonials' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Website URL', 'educationpress'),
                    'id' => "{$prefix}testimonials_url",
                    'desc' => esc_html__('Provide website URL', 'educationpress'),
                    'type' => 'url',
                ),
				 array(
                    'id'    => "{$prefix}testi_job_title",
                    'name'  => esc_html__( 'Job Designation', 'educationpress' ),
                    'desc'  => esc_html__( 'Provide designation for testimonial', 'educationpress' ),
                    'type'  => 'text',
                    'std'   => '',
                    'size'  => 50,
                )

            )
        );
		
		
		 // Event Meta Box
        $meta_boxes[] = array(
            'id' => 'events-meta-box',
            'title' => esc_html__('Events Information', 'educationpress'),
            'pages' => array( 'event' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
				array(
					'name'       => esc_html__( 'Event Start Date And Time', 'educationpress' ),
					'id'         => $prefix . 'event_start_datetime',
					'type'       => 'datetime',
					'desc'  => esc_html__( 'Provide event start date and time', 'educationpress' ),
					'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,)

           	   ),
			   
				array(
					'name'       => esc_html__( 'Event End Date And Time', 'educationpress' ),
					'id'         => $prefix . 'event_end_datetime',
					'type'       => 'datetime',
					'desc'  => esc_html__( 'Provide event end date and time', 'educationpress' ),
					'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,)

           	   ),
			   array(
                    'name' => esc_html__('Join Now URL', 'educationpress'),
                    'id' => "{$prefix}event_url",
                    'desc' => esc_html__('Provide Join Now URL', 'educationpress'),
                    'type' => 'url',
                ),
				 array(
                   	'id'    => "{$prefix}event_location",
                    'name'  => esc_html__( 'Event Location', 'educationpress' ),
                    'desc'  => esc_html__( 'Provide Event Location', 'educationpress' ),
                    'type'  => 'text',
                    'std'   => '121 King St, Melbourne VIC 3000, Australia',
                    'size'  => 50,
                ),
                array(
                    'id'    => "{$prefix}eventmap_location",
                    'name'  => esc_html__( 'Location Map', 'educationpress' ),
                    'desc'  => wp_kses_post( 'Drag the marker to point your location. You can also use the address field above to search for your location. <br/>For smooth work of map, please enter google map api key on <strong>Appearance>Theme Options>Google Map</strong> in Google Map API Key field.' ),
                    'type'  => 'map',
                    'std'   => '-37.817314,144.955431',         // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$prefix}event_location",
                    'tab'   => 'google-map',
                ),
				array(
                    'name' => esc_html__('Facebook URL', 'educationpress'),
                    'id' => "{$prefix}event_fb_url",
                    'desc' => esc_html__('Provide Facebook URL', 'educationpress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Twitter URL', 'educationpress'),
                    'id' => "{$prefix}event_twit_url",
                    'desc' => esc_html__('Provide Twitter URL', 'educationpress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Linkedin URL', 'educationpress'),
                    'id' => "{$prefix}event_linked_url",
                    'desc' => esc_html__('Provide Linkedin URL', 'educationpress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Google Plus URL', 'educationpress'),
                    'id' => "{$prefix}event_googleplus_url",
                    'desc' => esc_html__('Provide Google Plus URL', 'educationpress'),
                    'type' => 'url',
                ),

            )
        );

       
        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'educationpress_theme_meta', $meta_boxes );

        return $meta_boxes;

    }
    add_filter( 'rwmb_meta_boxes', 'educationpress_register_meta_boxes' );
}

