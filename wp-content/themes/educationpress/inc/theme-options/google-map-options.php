<?php
/*
 * Search Options
 */
 
 
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Google Map', 'educationpress'),
    'id'    => 'google-map-section',
	'icon'  => 'el el-map-marker',
    'desc'  => esc_html__('This section contains options for google map.', 'educationpress'),
    'fields'=> array(

	array(
            'id'       => 'educationpress_google_api_key',
            'type'     => 'text',
            'title'    => esc_html__( 'Google Map API Key', 'educationpress' ),
            'default'  => '',
			'desc' => wp_kses_post('For getting google map api key, go to <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank"> https://developers.google.com/maps/documentation/javascript/get-api-key</a> and click on <strong>GET A KEY</strong> button'),


    		),
	 ),
	
) );
	
	

