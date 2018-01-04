<?php
/*
 * Coming Soon Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Coming Soon', 'edupress' ),
    'id'    => 'coming-soon-section',
	'icon'  => 'el el-home-alt',
    'desc'  => esc_html__( 'This section contains options for Coming Soon.', 'edupress' ),
    'fields'=> array(
	
	 array(	 
		'id'       => 'edupress_coming_soon',
		'type'     => 'switch',
		'title'    => esc_html__( 'Coming Soon', 'edupress' ),
		'desc'     => esc_html__('You can enable or disable coming soon page.', 'edupress'),
		'default'  => 1,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
            ),
			
	array(
            'id'       => 'edupress_coming_soon_bg',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Background Image', 'edupress' ),
			'desc'   => esc_html__( 'Banner image should have minimum width of 1970px and minimum height of 1166px.', 'edupress' ),
			'required' => array( 'edupress_coming_soon', '=',1 ),
        ),		
			
	 
	array(
		'id'        => 'edupress_coming_soon_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Title', 'edupress' ),
		'default'   =>  esc_html__( 'Coming Soon', 'edupress' ),
		'required' => array( 'edupress_coming_soon', '=', 1 ),
        	),

	
	array(
    'id'               => 'edupress_coming_soon_desc',
    'type'             => 'editor',
    'title'            => esc_html__('Description', 'edupress'), 
    'subtitle'         => esc_html__('Add description', 'edupress'),
    'default'          => '<h4>We are current working on website. We hope to be back online shortly.</h4>',
    'args'   => array(
        'teeny'            => false,
        'textarea_rows'    => 5
    ),
	'required' => array( 'edupress_coming_soon', '=', 1 ),
	),
	
	array(	 
		'id'       => 'edupress_coming_soon_countdown',
		'type'     => 'switch',
		'title'    => esc_html__( 'Countdown', 'edupress' ),
		'desc'     => esc_html__('You can enable or disable countdown on coming soon page.', 'edupress'),
		'default'  => 1,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
		'required' => array( 'edupress_coming_soon', '=', 1 ),
      ),
	  
	array(
	'id'          => 'edupress_coming_soon_countdowndate',
	'type'        => 'date',
	'title'       => esc_html__('Site Live Date', 'edupress'), 
	'required' => array( 'edupress_coming_soon_countdown', '=', 1 ),
	'placeholder' =>  esc_html__('Click to enter a date', 'edupress')
	),
	
	  array(
            'id'        => 'edupress_coming_soon_headings_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Headings Font', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the font for headings.', 'edupress' ),
            'desc'      => esc_html__( 'Montserrat is default font.', 'edupress' ),
            'required'  => array( 'edupress_coming_soon', '=', '1' ),
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
            'id'        => 'edupress_coming_soon_body_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Text Font', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the font for body text.', 'edupress' ),
            'desc'      => esc_html__( 'Open Sans is default font.', 'edupress' ),
            'required'  => array( 'edupress_coming_soon', '=', '1' ),
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