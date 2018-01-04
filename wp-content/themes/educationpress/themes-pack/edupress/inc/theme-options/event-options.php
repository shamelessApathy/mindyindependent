<?php
/*
 * Event Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Events', 'edupress'),
    'id'    => 'events-section',
	'icon'  => 'el el-calendar-sign',
    'desc'  => esc_html__('This section contains options for events.', 'edupress'),
    'fields'=> array() ) );
	
/*
 * Event Listing sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Event Listing', 'edupress'),
    'id'    => 'event-listing-section',
    'desc'  => esc_html__('This section contains options related to Event Listing', 'edupress' ),
    'subsection' => true,
    'fields'=> array(
	

	array(
            'id'       => 'edupress_eventlisting_number',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Events Per Page', 'edupress' ),
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
		'id'       => 'edupress_eventlisting_time',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Event Time', 'edupress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'edupress_eventlisting_loc',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Event Location', 'edupress'),
		'default'  => true,
	),
	

    ) ) );
	
	
	
/*
 * Event Detail sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Event Detail', 'edupress'),
    'id'    => 'event-detail-section',
    'desc'  => esc_html__('This section contains options related to Event Detail', 'edupress' ),
    'subsection' => true,
    'fields'=> array(
	
	array(
		'id'       => 'edupress_eventdetail_countdown',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Countdown', 'edupress'),
		'default'  => true,
	),
	
	array(
		'id'       => 'edupress_eventdetail_map',
		'type'     => 'switch', 
		'title'    => esc_html__('Display Location Map', 'edupress'),
		'default'  => true,
	),
	
      

    ) ) );
