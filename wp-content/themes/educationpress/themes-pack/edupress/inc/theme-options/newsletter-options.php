<?php
/*
 * Newsletter Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Newsletter', 'edupress' ),
    'id'    => 'newsletter-section',
	'icon'  => 'el el-envelope-alt',
    'desc'  => esc_html__( 'This section contains options for Newsletter.', 'edupress' ),
    'fields'=> apply_filters( 'edupress_newsletter_fileds' , array(
	
	 array(	 
		'id'       => 'edupress_newsletter',
		'type'     => 'switch',
		'title'    => esc_html__( 'Newsletter', 'edupress' ),
		'subtitle' => esc_html__( 'Add newsletter sign up form before footer.', 'edupress' ),
		'desc'     => esc_html__('You can enable or disable newsletter form.', 'edupress'),
		'default'  => 0,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
            ),
	 
	array(
		'id'        => 'edupress_newsletter_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Title', 'edupress' ),
		'default'   =>  esc_html__( 'Signup for Newsletter', 'edupress' ),
		'required' => array( 'edupress_newsletter', '=', 1 ),
        	),
			
	array(
		'id'       => 'edupress_newsletter_desc',
		'type'     => 'textarea',
		'title'    => esc_html__( 'Description', 'edupress' ),
		'subtitle' => esc_html__( 'Add description', 'edupress' ),
		'default'  => 'Lorem Ipsum is simply dummy text of the printing content and typesetting industry.',
		'required' => array(
							array( 'edupress_theme_mode', 'not', 'uni'),
							array( 'edupress_newsletter', 'equals', 1 ),
				 ) ,
		//'required' => array(
		//				array( 'edupress_theme_mode', '=', array('1','3') ),
						//array( 'edupress_theme_mode', '=', 3),
		//			), 
	),
	
	array(
		'id'        => 'edupress_newsletter_shortcode',
		'type'      => 'text',
		 'desc'  => sprintf( __( 'MailChimp for WP Plugin must be <a href="%1$s" target="_blank">activated and setuped</a> then you can get shortcode <a href="%2$s" target="_blank">Click Here</a> to get shortcode.', 'edupress' ),'#','admin.php?page=mailchimp-for-wp-forms' ),
		'title'     => esc_html__( 'MailChimp Plugin Shortcode ', 'edupress' ),
		'required' => array( 'edupress_newsletter', '=', 1 ),
        	),
			
	array(
		'id'       => 'edupress_is_newsletter_color_scheme',
		'type'     => 'switch',
		'title'    => esc_html__( 'Change Color Scheme?', 'edupress' ),
		'default'  => 0,
		'on'       => 'Yes',
		'off'      => 'No',
		'required' => array( 'edupress_newsletter', '=', 1 ),
	),
	array(
		'id'       => 'edupress_newsletter_bg',
		'type'     => 'color',		
		'validate' => 'color',
		'mode'      => 'background-color',
		'transparent' => true,
		'output'    => array( '.signup-newsletter, .home-two-newsletter' ),
		'title'    => esc_html__( 'Background Color', 'edupress' ),
		'default'  => '#e4e8ee',
		'desc'  => 'default: #e4e8ee',
		'required' => array( 
				array( 'edupress_is_newsletter_color_scheme', '=', 1),
				array( 'edupress_theme_mode', '=', 'ecom'),
		 ),
	),
	array(
		'id'       => 'edupress_newsletter_heading_color',
		'type'     => 'color',		
		'validate' => 'color',
		//'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.signup-newsletter h3,
								 .home-two-newsletter h3,
								 .newsletter h3,
								 .site-footer .newsletter-widget.widget h3' ),
		'title'    => esc_html__( 'Title Color', 'edupress' ),
		'default'  => '#262c38',
		'desc'  => 'default: #262c38',
		'required' => array( 'edupress_is_newsletter_color_scheme', '=', 1 ),
	),
	array(
		'id'       => 'edupress_newsletter_text_color',
		'type'     => 'color',		
		'validate' => 'color',
		'transparent' => false,
		'output'    => array( '.signup-newsletter, .home-two-newsletter, .footer-widget .widget.newsletter-widget p' ),
		'title'    => esc_html__( 'Text Color', 'edupress' ),
		'default'  => '#657184',
		'desc'  => 'default: #657184',
		'required' => array(
							array( 'edupress_is_newsletter_color_scheme', '=', 1 ),
							array( 'edupress_theme_mode', '!=', 'uni'),
						),
	),
	array(
		'id'       => 'edupress_newsletter_icon_bg',
		'type'     => 'color',		
		'validate' => 'color',
		'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.i-email-subscribe, .home-two-newsletter .i-email-subscribe' ),
		'title'    => esc_html__( 'Icon Background Color', 'edupress' ),
		'default'  => '#657184',
		'desc'  => 'default: #657184',
		'required' => array( 
				array( 'edupress_is_newsletter_color_scheme', '=', 1),
				array( 'edupress_theme_mode', '=', 'ecom'),
		 ),
	),
	array(
		'id'       => 'edupress_newsletter_icon_color',
		'type'     => 'color',		
		'validate' => 'color',
		//'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.i-email-subscribe i' ),
		'title'    => esc_html__( 'Icon Color', 'edupress' ),
		'default'  => '#ffffff',
		'desc'  => 'default: #ffffff',
		'required' => array( 
				array( 'edupress_is_newsletter_color_scheme', '=', 1),
				array( 'edupress_theme_mode', '=', 'ecom'),
		 ),
	),
			

    ) ) ) );