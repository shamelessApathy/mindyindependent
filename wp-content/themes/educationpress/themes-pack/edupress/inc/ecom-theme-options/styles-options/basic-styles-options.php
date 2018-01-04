<?php
global $opt_name;

Redux::setField(
	$opt_name, // This is your opt_name,
	array(
		'id'        => 'edupress_button_bg',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 181,
		'mode'      => 'background-color',
		'output'    => array( '.btn-orange, a.btn-orange, .btn-orange:active, 							.btn-orange:focus, .btn-blue, .btn-blue:active, .btn-blue:focus, button, input[type="button"], 
input[type="submit"], .woocommerce button.button, .woocommerce input.button,							.i-email-subscribe, .footer-widget .wpcf7-form .wpcf7-submit, 
.navbar li.pull-right a.woo-menu-cart span, #wp-submit' ),
		'title'     => esc_html__( 'Button Normal Background 

Color', 'edupress' ),
		'desc'      => apply_filters( 'edupress_button_bg_desc', 

'default: #ff5722'),
		'default'   => apply_filters( 

'edupress_button_bg_default', '#ff5722'),
		'transparent' => false,
	)
);
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_button_bg_hover',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 182,
		'mode'      => 'background-color',
		'output'    => array( '.btn-orange:hover,a.btn-orange:hover, .btn-blue:hover, .manage-course:hover, button:hover, input[type="button"]:hover, input[type="submit"]:hover,.woocommerce 
button.button:hover, .woocommerce input.button:hover, .footer-widget 
.wpcf7-form .wpcf7-submit:hover, #wp-submit:hover' ),
		'title'     => esc_html__( 'Button Hover Background Color', 'edupress' ),
		'desc'      => 'default: #0583e4',
		'default'   => '#0583e4',
		'transparent' => false,
	)
);		
		//start For pagination links*/
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_pagination_text_color',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 183,
		'output'    => array( '.pagination a.page-numbers' ),
		'title'     => esc_html__( 'Pagination Normal Text Color', 

'edupress' ),
		'desc'      => 'default: #99a6bb',
		'default'   => '#99a6bb',
		'transparent' => false,
		'required' => array( 'edupress_theme_mode','!=','uni' )
	)
);
Redux::setField(
	$opt_name, // This is your opt_name,
	array(
		'id'        => 'edupress_pagination_border_color',
		'type'      => 'border',
		'section_id' => 'basic-styles',
		'priority' => 184,
		'output'    => array( '.pagination a.page-numbers' ),
		'title'     => esc_html__( 'Pagination Normal Border ', 

'edupress' ),            
		'default'  => array(
			'border-color'  => '#e4e8ee', 
			'border-style'  => 'solid', 
			'border-width'	=> '1px',
		),
		'required' => array( 'edupress_theme_mode','!=','uni' ),
	)
);
Redux::setField(
	$opt_name, // This is your opt_name,
	array(
		'id'        => 'edupress_pagination_bg_color_prashannt',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 185,
		'mode'      => 'background-color',
		'output'    => array( '.pagination a.page-numbers' ),
		'title'     => esc_html__( 'Pagination Normal Background 

Color', 'edupress' ),            
		'transparent' => true,
		'required' => array( 'edupress_theme_mode','!=','uni' ),
	)
);
		
		
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_pagination_hover_text_color',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 186,
		'output'    => array( '.pagination a:hover.page-numbers' 

),
		'title'     => esc_html__( 'Pagination Hover Text Color', 

'edupress' ),
		'desc'      => 'default: #ffffff',
		'default'   => '#ffffff',
		'transparent' => false,
		'required' => array( 'edupress_theme_mode','!=','uni' ),
	)
);
Redux::setField(
	$opt_name, // This is your opt_name,
	array(
		'id'        => 'edupress_pagination_hover_border_color',
		'type'      => 'border',
		'section_id' => 'basic-styles',
		'priority' => 187,
		'output'    => array( '.pagination a:hover.page-numbers, 

.pagination span.current' ),
		'title'     => esc_html__( 'Pagination Hover Border ', 

'edupress' ),            
		'default'  => array(
			'border-color'  => '#ff5722', 
			'border-style'  => 'solid', 
			'border-width'	=> '1px',
		),
		'required' => array( 'edupress_theme_mode','!=','uni' ),
	)
);
Redux::setField(
	$opt_name, // This is your opt_name,
	array(
		'id'        => 'edupress_pagination_hover_bg_color',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'priority' => 188,
		'mode'      => 'background-color',
		'output'    => array( '.pagination a:hover.page-numbers, 

.pagination span.current' ),
		'title'     => esc_html__( 'Pagination Hover Background 

Color', 'edupress' ), 
		 'desc'      => 'default: #ff5722',           
		'default'   => '#ff5722',
		'transparent' => false,
		'required' => array( 'edupress_theme_mode','!=','uni' ),
	)
);
		
