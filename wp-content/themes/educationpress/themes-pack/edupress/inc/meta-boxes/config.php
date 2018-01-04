<?php
/**
 * Meta box configuration file.
 */

if( !function_exists( 'edupress_register_meta_boxes' ) ) {
    /**
     * Register meta boxes for this theme
     *
     * @param $meta_boxes
     * @return array
     * @since 1.0.0
     */
    function edupress_register_meta_boxes ( $meta_boxes ) {

        $prefix = 'EDU_PRESS_';
        $admin_email = get_option('admin_email');
		global $signup_url,$edupress_options;


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
            'title'     => esc_html__( 'Video Embed Code', 'edupress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'video' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Video Embed Code', 'edupress' ),
                    'desc'  => esc_html__( 'If you are not using self hosted videos then please provide the video embed code and remove the width and height attributes.', 'edupress' ),
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
            'title'     => esc_html__( 'Audio Embed Code', 'edupress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'audio' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Audio Embed Code', 'edupress' ),
                    'desc'  => esc_html__( 'If you are not using self hosted audios then please provide the audio embed code (soundcloud.com) and remove the width and height attributes.', 'edupress' ),
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
            'title'     => esc_html__( 'Quote', 'edupress' ),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'quote' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Quote Text', 'edupress' ),
                    'desc'  => esc_html__( 'Please add quote', 'edupress' ),
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
            'title'     => esc_html__( 'Gallery Images', 'edupress'),
            'pages'     => array( 'post' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'show'   => array(
                'post_format' => array( 'gallery' ), // List of post formats. Array. Case insensitive. Optional.
            ),
            'fields'    => array(
                array(
                    'name'  => esc_html__( 'Upload Gallery Images', 'edupress' ),
                    'id'    => "{$prefix}gallery",
                    'desc'  => esc_html__( 'Images should have minimum width of 750px and minimum height of 330px (900X420), Bigger size images will be cropped automatically.', 'edupress' ),
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
            'title'     => esc_html__( 'Contact Page Information', 'edupress'),
            'pages'     => array( 'page' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'tabs'      => array(
                'google-map'  => array(
                    'label' => esc_html__( 'Google Map', 'edupress' ),
                    'icon'  => 'dashicons-location',
                ),
                'contact-details'  => array(
                    'label' => esc_html__( 'Contact Details', 'edupress' ),
                    'icon'  => 'dashicons-phone',
                ),
                'customer-support' => array(
                    'label' => esc_html__( 'Customer Support', 'edupress' ),
                    'icon'  => 'dashicons-admin-users',
                ),
				 'customer-question' => array(
                    'label' => esc_html__( 'Questoins', 'edupress' ),
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
                    'id'    => "edupress_map_address",
                    'name'  => esc_html__( 'Office Address', 'edupress' ),
                    'desc'  => esc_html__( 'Leaving it empty will hide the google map.', 'edupress'),
                    'type'  => 'text',
                    'std'   => '121 King St, Melbourne VIC 3000, Australia',
                    'tab'   => 'google-map',
                    'size'  => 50,
                ),
                array(
                    'id'    => "edupress_map_location",
                    'name'  => esc_html__( 'Office Location', 'edupress' ),
                    'desc'  => wp_kses_post( 'Drag the marker to point your office location. You can also use the address field above to search for your address. <br/>For smooth work of map, please enter google map api key on <strong>Appearance>Theme Options>Google Map</strong> in Google Map API Key field.' ),
                    'type'  => 'map',
                    'std'   => '-37.817314,144.955431',         // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "edupress_map_address",
                    'tab'   => 'google-map',
                ),
                array(
                    'id'   => 'edupress_map_zoom',
                    'type' => 'slider',
                    'name' => esc_html__( 'Map Zoom Level', 'edupress' ),
                    'desc' => esc_html__( 'Zoom level for resulted map on contact page.', 'edupress'),
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
                    'id'    => "edupress_detail_title",
                    'name'  => esc_html__( 'Title', 'edupress' ),
                    'type'  => 'text',
					'std'   => 'Office Address',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => 'edupress_address',
                    'name'  => esc_html__( 'Office Address to Display', 'edupress' ),
                    'desc'  => esc_html__( 'Given address will be displayed on contact page.', 'edupress' ),
                    'type'  => 'textarea',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "edupress_display_email",
                    'name'  => esc_html__( 'Email to Display', 'edupress' ),
                    'desc'  => esc_html__( 'Given email address will be displayed on contact page.', 'edupress' ),
                    'type'  => 'text',
                    'std'   => $admin_email,
                    'tab'   => 'contact-details',
                ),				
				 array(
                    'id'    => "edupress_facebook_url",
                    'name'  => esc_html__( 'Facebook URL', 'edupress' ),
                    'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "edupress_google_url",
                    'name'  => esc_html__( 'Google Plus URL', 'edupress' ),
                    'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "edupress_twitter_url",
                    'name'  => esc_html__( 'Twitter URL', 'edupress' ),
                   'type' => 'url',
                    'tab'   => 'contact-details',
                ),
                array(
                    'id'    => "edupress_linkedin_url",
                    'name'  => esc_html__( 'LinkedIn URL', 'edupress' ),
                   	'type' => 'url',
                    'tab'   => 'contact-details',
                ),
				array(
                    'id'    => "edupress_cus_title",
                    'name'  => esc_html__( 'Title', 'edupress' ),
                    'type'  => 'text',
					'std'   => 'Customer Support',
                    'tab'   => 'customer-support',
                ),
                array(
                    'id'    => "edupress_cus_phone",
                    'name'  => esc_html__( 'Support Phone No.', 'edupress' ),
                    'type'  => 'text',
                    'tab'   => 'customer-support',
                ),
                array(
                    'id'    => "edupress_cus_email",
                    'name'  => esc_html__( 'Support Email ID', 'edupress' ),
                    'desc'  => esc_html__( 'Given email address will be displayed for customer support on contact page.', 'edupress' ),
                    'type'  => 'text',
                    'tab'   => 'customer-support',
                ),
				array(
                    'id'    => "edupress_ques_title",
                    'name'  => esc_html__( 'Title', 'edupress' ),
                    'type'  => 'text',
					'std'   => 'Have Any Question?',
                    'tab'   => 'customer-question',
                ),
                array(
                    'id'    => 'edupress_ques_desc',
                    'name'  => esc_html__( 'Description', 'edupress' ),
                    'type'  => 'textarea',
					'std'   => 'Various versions years, sometimes by accident, sometimes on purpose (injected humour and the like).',
                    'tab'   => 'customer-question',
                ),
                array(
                    'id'    => "edupress_ques_button_text",
                    'name'  => esc_html__( 'Button Text', 'edupress' ),
                    'type'  => 'text',
                    'std'   => 'Ask a Question',
                    'tab'   => 'customer-question',
                ),
				 array(
                    'id'    => "edupress_ques_button_url",
                    'name'  => esc_html__( 'Button URL', 'edupress' ),
                    'type' => 'url',
                    'tab'   => 'customer-question',
                ),
               
            )
        );
		
		

        
		
		
		 		
        /*
         * Gallery meta box for gallery post type
         */
        $meta_boxes[] = array(
            'id'        => 'gallery-post-type-meta-box',
            'title'     => esc_html__( 'Gallery Images', 'edupress' ),
            'pages'     => array( 'gallery' ),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields' => array(
                array(
                    'name'  => esc_html__( 'Gallery Images', 'edupress' ),
                    'id'    => "{$prefix}gallery",
                    'desc'  => esc_html__( 'Gallery image should have minimum width of 1024px and minimum height of 768px OR (800X600 pix).  Bigger size images will be cropped automatically.', 'edupress' ),
                    'type'  => 'image_advanced',
                    'max_file_uploads' => 10,
					
                ),
                
            )
        );
		
		
	
		 // Testimonials Meta Box
        $meta_boxes[] = array(
            'id' => 'testimonials-meta-box',
            'title' => esc_html__('Testimonials Information', 'edupress'),
            'pages' => array( 'testimonials' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Website URL', 'edupress'),
                    'id' => "{$prefix}testimonials_url",
                    'desc' => esc_html__('Provide website URL', 'edupress'),
                    'type' => 'url',
                ),
				 array(
                    'id'    => "{$prefix}testi_job_title",
                    'name'  => esc_html__( 'Job Designation', 'edupress' ),
                    'desc'  => esc_html__( 'Provide designation for testimonial', 'edupress' ),
                    'type'  => 'text',
                    'std'   => '',
                    'size'  => 50,
                )

            )
        );
		
		
		 // Event Meta Box
        $meta_boxes[] = array(
            'id' => 'events-meta-box',
            'title' => esc_html__('Events Information', 'edupress'),
            'pages' => array( 'event' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
				array(
					'name'       => esc_html__( 'Event Start Date And Time', 'edupress' ),
					'id'         => $prefix . 'event_start_datetime',
					'type'       => 'datetime',
					'desc'  => esc_html__( 'Provide event start date and time', 'edupress' ),
					'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,)

           	   ),
			   
				array(
					'name'       => esc_html__( 'Event End Date And Time', 'edupress' ),
					'id'         => $prefix . 'event_end_datetime',
					'type'       => 'datetime',
					'desc'  => esc_html__( 'Provide event end date and time', 'edupress' ),
					'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,)

           	   ),
			   array(
                    'name' => esc_html__('Join Now URL', 'edupress'),
                    'id' => "{$prefix}event_url",
                    'desc' => esc_html__('Provide Join Now URL', 'edupress'),
                    'type' => 'url',
                ),
				 array(
                   	'id'    => "{$prefix}event_location",
                    'name'  => esc_html__( 'Event Location', 'edupress' ),
                    'desc'  => esc_html__( 'Provide Event Location', 'edupress' ),
                    'type'  => 'text',
                    'std'   => '121 King St, Melbourne VIC 3000, Australia',
                    'size'  => 50,
                ),
                array(
                    'id'    => "{$prefix}eventmap_location",
                    'name'  => esc_html__( 'Location Map', 'edupress' ),
                    'desc'  => wp_kses_post( 'Drag the marker to point your location. You can also use the address field above to search for your location. <br/>For smooth work of map, please enter google map api key on <strong>Appearance>Theme Options>Google Map</strong> in Google Map API Key field.' ),
                    'type'  => 'map',
                    'std'   => '-37.817314,144.955431',         // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$prefix}event_location",
                    'tab'   => 'google-map',
                ),
				array(
                    'name' => esc_html__('Facebook URL', 'edupress'),
                    'id' => "{$prefix}event_fb_url",
                    'desc' => esc_html__('Provide Facebook URL', 'edupress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Twitter URL', 'edupress'),
                    'id' => "{$prefix}event_twit_url",
                    'desc' => esc_html__('Provide Twitter URL', 'edupress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Linkedin URL', 'edupress'),
                    'id' => "{$prefix}event_linked_url",
                    'desc' => esc_html__('Provide Linkedin URL', 'edupress'),
                    'type' => 'url',
                ),
				array(
                    'name' => esc_html__('Google Plus URL', 'edupress'),
                    'id' => "{$prefix}event_googleplus_url",
                    'desc' => esc_html__('Provide Google Plus URL', 'edupress'),
                    'type' => 'url',
                ),

            )
        );

       
        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'edupress_theme_meta', $meta_boxes );
        return $meta_boxes;
    }
    add_filter( 'rwmb_meta_boxes', 'edupress_register_meta_boxes' );
}

if( edupress_is_a( 'ecom' ) ) {
	require_once( get_template_directory() . '/inc/meta-boxes/ecom-config.php' );
}
elseif( edupress_is_a( 'uni' ) ) {
	require_once( get_template_directory() . '/inc/meta-boxes/uni-config.php' );
}
elseif( edupress_is_a( 'kid' ) ) {
	require_once( get_template_directory() . '/inc/meta-boxes/kid-config.php' );	
}


//add_action( 'rwmb_gallery-post-type-meta-box_after_save_post' , //'edupress_save_gallery_type_gallery');
add_action( 'rwmb_gallery-meta-box_after_save_post' , 'edupress_save_gallery_type_gallery');
function edupress_save_gallery_type_gallery() {
	
	
	if( !empty( $_POST['EDU_PRESS_gallery'] ))
		
		update_post_meta( intval($_POST['post_ID']), 'EDU_PRESS_gallery', implode(',', $_POST['EDU_PRESS_gallery']));
	else
		delete_post_meta( intval($_POST['post_ID']), 'EDU_PRESS_gallery');
	
}


