<?php
/*
 * Course Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
		'title' => esc_html__('Social Share Links', 'educationpress'),
		'id'    => 'social-share-section',
		'icon'  => 'el el-share-alt',
		'desc'  => esc_html__('This section contains options for socila sharing links.', 'educationpress'),
		'fields'=> array(
			array(
				'id'       => 'educationpress_twitter_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'http://twitter.com',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_facebook_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Facebook URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'http://facebook.com',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_google_plus_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Plus URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'https://plus.google.com',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_linkedin_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Linkedin URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'http://linkedin.com',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_pinterest_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Pinterest URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'https://www.pinterest.com/',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_instagram_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Instagram URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'https://www.instagram.com/',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
			array(
				'id'       => 'educationpress_youtube_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube URL', 'educationpress' ),
				'validate' => 'url', 
				'default' => 'https://www.youtube.com',
				//'required' => array('educationpress_header_call_or_social','=', 'social' ),
			),
		)
		
	)
) ;    
	
