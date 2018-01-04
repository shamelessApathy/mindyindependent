<?php
/*
 * Footer Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Footer', 'edupress'),
    'id'    => 'footer-styles',
    'desc'  => esc_html__('This sub section contains footer styles options.', 'edupress' ),
    'subsection' => true,
    'fields'=> apply_filters( 'edupress_the_options_footer_style_fileds_filter', 
	array (
		 array(
            'id'        => 'edupress_change_footer',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change Footer Color Scheme?', 'edupress' ),
            'default'   => 0,
            'on'    => esc_html__( 'Yes', 'edupress' ),
            'off'   => esc_html__( 'No', 'edupress' ),
			'priority' => 16,
        ),
        array(
            'id'        => 'edupress_footer_bg',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.site-footer' ),
            'title'     => esc_html__( 'Footer Background Color', 'edupress' ),
            'desc'      => 'default: #262c38',
            'default'   => '#262c38',
            'transparent' => false,
			'required'	=> array('edupress_change_footer','=',1),    
			'priority' => 20,
        ),
	
        array(
            'id'        => 'edupress_footer_heading',
            'type'      => 'color',
            'output'    => array(
                '.site-footer h1',
                '.site-footer h2',
                '.site-footer h3',
                '.site-footer h4',
                '.site-footer h5',
                '.site-footer h6',
                '.site-footer .h1',
                '.site-footer .h2',
                '.site-footer .h3',
                '.site-footer .h4',
                '.site-footer .h5',
                '.site-footer .h6',
            ),
            'title'     => esc_html__( 'Footer Headings Color', 'edupress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#ffffff',
            'transparent' => false,
			'required'	=> array('edupress_change_footer','=',1),  
			'priority' => 40,
        ),
        array(
            'id'        => 'edupress_footer_text',
            'type'      => 'color',
            'output'    => array( '.site-footer, .site-footer p, .site-footer p span,  .site-footer ul li, footer .textwidget' ),
            'title'     => esc_html__( 'Footer Text Color', 'edupress' ),
            'desc'      => 'default: #657184',
            'default'   => '#657184',
            'transparent' => false,
			'required'	=> array('edupress_change_footer','=',1),  
			'priority' => 60,
        ),
        array(
            'id'        => 'edupress_footer_link',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Footer Link Color', 'edupress' ),
            'active'    => true,
            'output'    => array( '.site-footer a, .site-footer p a, .site-footer li a, .site-footer ul li a, .footer-widget .menu li a' ),
            'default'   => array(
                'regular' => '#657184',
                'hover'   => '#ffffff',
                'active'  => '#657184',
            ),
			'required'	=> array('edupress_change_footer','=',1),  
			'priority' => 80,
        ),
		
		
		array(
            'id'        => 'edupress_footer_copyright_is_bg',
            'type'      => 'switch',
            'output'    => array( '.footer-bottom' ),
            'title'     => esc_html__( 'Do you like to change Footer Copyright Background Color?', 'edupress' ),
			'on' => __( 'Yes', 'edupress' ),
			'off' => __( 'No', 'edupress' ),
            'default'   => false,
      		'priority' => 99,
			 'required' => array( 'edupress_theme_mode','!=','ecom' )
        ),
		 array(
            'id'        => 'edupress_footer_copyright_bg',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.footer-bottom' ),
            'title'     => esc_html__( 'Footer Copyright Background Color', 'edupress' ),
            'desc'      => 'default: #262c38',
            'default'   => '#262c38',
			'required' =>
				array('edupress_footer_copyright_is_bg','equals',1), 
			
            'transparent' => false,
			'priority' => 100,
        ),




    ) ) ) );