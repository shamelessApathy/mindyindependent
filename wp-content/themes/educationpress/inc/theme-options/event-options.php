<?php
/*
 * Event Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Events', 'educationpress'),
    'id'    => 'events-section',
	'icon'  => 'el el-calendar-sign',
    'desc'  => esc_html__('This section contains options for events.', 'educationpress'),
    'fields'=> array() ) );
	
/*
 * Event Listing sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Event Listing', 'educationpress'),
    'id'    => 'event-listing-section',
    'desc'  => esc_html__('This section contains options related to Event Listing', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	

	array(
            'id'       => 'educationpress_eventlisting_number',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Events Per Page', 'educationpress' ),
            'options'  => array(
                '1' => esc_html__('1', 'educationpress'),
                '2' => esc_html__('2', 'educationpress'),
				'3' => esc_html__('3', 'educationpress'),
				'4' => esc_html__('4', 'educationpress'),
				'5' => esc_html__('5', 'educationpress'),
				'6' => esc_html__('6', 'educationpress'),
				'7' => esc_html__('7', 'educationpress'),
				'8' => esc_html__('8', 'educationpress'),
				'9' => esc_html__('9', 'educationpress'),
				'10' => esc_html__('10', 'educationpress'),
				'11' => esc_html__('11', 'educationpress'),
				'12' => esc_html__('12', 'educationpress'),
            ),
            'default'  => '10',
        ),

	array(
		'id'       => 'educationpress_eventlisting_time',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Event Time', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_eventlisting_loc',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Event Location', 'educationpress'),
		'default'  => true,
	),
	

    ) ) );
	
	
	
/*
 * Event Detail sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Event Detail', 'educationpress'),
    'id'    => 'event-detail-section',
    'desc'  => esc_html__('This section contains options related to Event Detail', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	
	array(
		'id'       => 'educationpress_eventdetail_countdown',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Countdown', 'educationpress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'educationpress_eventdetail_map',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Location Map', 'educationpress'),
		'default'  => true,
	),
	
      

    ) ) );
