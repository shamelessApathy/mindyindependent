<?php
/*
 * Coming Soon Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Coming Soon', 'educationpress' ),
    'id'    => 'coming-soon-section',
	'icon'  => 'el el-home-alt',
    'desc'  => esc_html__( 'This section contains options for Coming Soon.', 'educationpress' ),
    'fields'=> array(
	
	 array(	 
		'id'       => 'educationpress_coming_soon',
		'type'     => 'switch',
		'title'    => esc_html__( 'Coming Soon', 'educationpress' ),
		'desc'     => esc_html__('You can enable or disable coming soon page.', 'educationpress'),
		'default'  => 1,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
            ),
			
	array(
            'id'       => 'educationpress_coming_soon_bg',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Background Image', 'educationpress' ),
			'desc'   => esc_html__( 'Banner image should have minimum width of 1970px and minimum height of 1166px.', 'educationpress' ),
			'required' => array( 'educationpress_coming_soon', '=',1 ),
        ),		
			
	 
	array(
		'id'        => 'educationpress_coming_soon_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Title', 'educationpress' ),
		'default'   =>  esc_html__( 'Coming Soon', 'educationpress' ),
		'required' => array( 'educationpress_coming_soon', '=', 1 ),
        	),

	
	array(
    'id'               => 'educationpress_coming_soon_desc',
    'type'             => 'editor',
    'title'            => esc_html__('Description', 'educationpress'), 
    'subtitle'         => esc_html__('Add description', 'educationpress'),
    'default'          => '<h4>We are current working on website. We hope to be back online shortly.</h4>',
    'args'   => array(
        'teeny'            => false,
        'textarea_rows'    => 5
    ),
	'required' => array( 'educationpress_coming_soon', '=', 1 ),
	),
	
	array(	 
		'id'       => 'educationpress_coming_soon_countdown',
		'type'     => 'switch',
		'title'    => esc_html__( 'Countdown', 'educationpress' ),
		'desc'     => esc_html__('You can enable or disable countdown on coming soon page.', 'educationpress'),
		'default'  => 1,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
		'required' => array( 'educationpress_coming_soon', '=', 1 ),
      ),
	  
	array(
	'id'          => 'educationpress_coming_soon_countdowndate',
	'type'        => 'date',
	'title'       => esc_html__('Site Live Date', 'educationpress'), 
	'required' => array( 'educationpress_coming_soon_countdown', '=', 1 ),
	'placeholder' =>  esc_html__('Click to enter a date', 'educationpress'),
	
	),
	
	  array(
            'id'        => 'educationpress_coming_soon_headings_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Headings Font', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the font for headings.', 'educationpress' ),
            'desc'      => esc_html__( 'Montserrat is default font.', 'educationpress' ),
            'required'  => array( 'educationpress_coming_soon', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => false,
			'subsets' => false,
            'font-size'     => true,
            'line-height'   => false,
            'color'         => true,
            'text-align'    => false,
            'default'       => array(
                'font-family' => 'Montserrat',
				'color'       => '#ffffff', 
				'font-weight'  => '700',
				'font-size'   => '70px', 
                'google'      => true
            )
        ),
        array(
            'id'        => 'educationpress_coming_soon_body_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Text Font', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the font for body text.', 'educationpress' ),
            'desc'      => esc_html__( 'Open Sans is default font.', 'educationpress' ),
            'required'  => array( 'educationpress_coming_soon', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => false,
            'font-size'     => true,
			'subsets' => false,
            'line-height'   => false,
            'color'         => true,
            'text-align'    => false,
            'default'       => array(
                'font-family' => 'Open Sans',
				'font-size'   => '14px', 
				'color'       => '#ffffff', 
                'google'      => true
            )
        ),
       
	
	
    ) ) );