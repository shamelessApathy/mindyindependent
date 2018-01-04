<?php
/*
 * Course Options
 */
global $opt_name;
add_filter('redux/options/'. $opt_name .'/sections', 'edupress_university_add_social_share_section', 30); 
function edupress_university_add_social_share_section( $sections ){
	$courses_section =  array(array(
		'title' => esc_html__('Social Share Links', 'edupress'),
		'id'    => 'social-share-section',
		'icon'  => 'el el-share-alt',
		'desc'  => esc_html__('This section contains options for socila sharing links.', 'edupress'),
		'fields'=> array(
			array(
				'id'       => 'edupress_twitter_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'http://twitter.com',
				
				
			),
			array(
				'id'       => 'edupress_facebook_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Facebook URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'http://facebook.com',
			),
			array(
				'id'       => 'edupress_google_plus_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Plus URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'https://plus.google.com',
			),
			array(
				'id'       => 'edupress_linkedin_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Linkedin URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'http://linkedin.com',
			),
			array(
				'id'       => 'edupress_pinterest_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Pinterest URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'https://www.pinterest.com/',
			),
			array(
				'id'       => 'edupress_instagram_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Instagram URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'https://www.instagram.com/',
			),
			array(
				'id'       => 'edupress_youtube_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube URL', 'edupress' ),
				'validate' => 'url', 
				'default' => 'https://www.youtube.com',
			),
			
		)
		
		)) ;    
		array_splice( $sections, 6, 0, $courses_section); //pos 4	
	


	
		return $sections;
		
}
