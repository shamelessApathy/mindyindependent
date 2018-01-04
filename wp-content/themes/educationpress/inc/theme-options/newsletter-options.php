<?php
/*
 * Newsletter Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Newsletter', 'educationpress' ),
    'id'    => 'newsletter-section',
	'icon'  => 'el el-envelope-alt',
    'desc'  => esc_html__( 'This section contains options for Newsletter.', 'educationpress' ),
    'fields'=> array(
	
	 array(	 
		'id'       => 'educationpress_newsletter',
		'type'     => 'switch',
		'title'    => esc_html__( 'Newsletter', 'educationpress' ),
		'subtitle' => esc_html__( 'Add newsletter sign up form before footer.', 'educationpress' ),
		'desc'     => esc_html__('You can enable or disable newsletter form.', 'educationpress'),
		'default'  => 0,
		'on'       => 'Enabled',
		'off'      => 'Disabled',
            ),
	 
	array(
		'id'        => 'educationpress_newsletter_title',
		'type'      => 'text',
		'title'     => esc_html__( 'Title', 'educationpress' ),
		'default'   =>  esc_html__( 'Signup for Newsletter', 'educationpress' ),
		'required' => array( 'educationpress_newsletter', '=', 1 ),
        	),
			
	array(
		'id'       => 'educationpress_newsletter_desc',
		'type'     => 'textarea',
		'title'    => esc_html__( 'Description', 'educationpress' ),
		'subtitle' => esc_html__( 'Add description', 'educationpress' ),
		'default'  => 'Lorem Ipsum is simply dummy text of the printing content and typesetting industry.',
		'required' => array( 'educationpress_newsletter', '=', 1 ),
	),
	
	
	
	
	
	array(
		'id'        => 'educationpress_newsletter_shortcode',
		'type'      => 'text',
		 'desc'  => sprintf( __( 'MailChimp for WP Plugin must be <a href="%1$s" target="_blank">activated and setuped</a> then you can get shortcode <a href="%2$s" target="_blank">Click Here</a> to get shortcode.', 'educationpress' ),'#','admin.php?page=mailchimp-for-wp-forms' ),
		 
		'title'     => esc_html__( 'MailChimp Plugin Shortcode ', 'educationpress' ),
		'required' => array( 'educationpress_newsletter', '=', 1 ),
        	),
	array(
		'id'       => 'educationpress_is_newsletter_color_scheme',
		'type'     => 'switch',
		'title'    => esc_html__( 'Change Color Scheme?', 'educationpress' ),
		'default'  => 0,
		'on'       => 'Yes',
		'off'      => 'No',
		'required' => array( 'educationpress_newsletter', '=', 1 ),
	),
	array(
		'id'       => 'educationpress_newsletter_bg',
		'type'     => 'color',		
		'validate' => 'color',
		'mode'      => 'background-color',
		'transparent' => true,
		'output'    => array( '.signup-newsletter, .home-two-newsletter' ),
		'title'    => esc_html__( 'Background Color', 'educationpress' ),
		'default'  => '#e4e8ee',
		'desc'  => 'default: #e4e8ee',
		'required' => array( 'educationpress_is_newsletter_color_scheme', '=', 1 ),
	),
	array(
		'id'       => 'educationpress_newsletter_heading_color',
		'type'     => 'color',		
		'validate' => 'color',
		//'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.signup-newsletter h3, .home-two-newsletter h3' ),
		'title'    => esc_html__( 'Title Color', 'educationpress' ),
		'default'  => '#262c38',
		'desc'  => 'default: #262c38',
		'required' => array( 'educationpress_is_newsletter_color_scheme', '=', 1 ),
	),
	array(
		'id'       => 'educationpress_newsletter_text_color',
		'type'     => 'color',		
		'validate' => 'color',
		'transparent' => false,
		'output'    => array( '.signup-newsletter, .home-two-newsletter' ),
		'title'    => esc_html__( 'Text Color', 'educationpress' ),
		'default'  => '#657184',
		'desc'  => 'default: #657184',
		'required' => array( 'educationpress_is_newsletter_color_scheme', '=', 1 ),
	),
	array(
		'id'       => 'educationpress_newsletter_icon_bg',
		'type'     => 'color',		
		'validate' => 'color',
		'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.i-email-subscribe, .home-two-newsletter .i-email-subscribe' ),
		'title'    => esc_html__( 'Icon Background Color', 'educationpress' ),
		'default'  => '#657184',
		'desc'  => 'default: #657184',
		'required' => array( 'educationpress_is_newsletter_color_scheme', '=', 1 ),
	),
	array(
		'id'       => 'educationpress_newsletter_icon_color',
		'type'     => 'color',		
		'validate' => 'color',
		//'mode'      => 'background-color',
		'transparent' => false,
		'output'    => array( '.i-email-subscribe i' ),
		'title'    => esc_html__( 'Icon Color', 'educationpress' ),
		'default'  => '#ffffff',
		'desc'  => 'default: #ffffff',
		'required' => array( 'educationpress_is_newsletter_color_scheme', '=', 1 ),
	),
	
	
    ),
	
	
	
	
	 )



 );