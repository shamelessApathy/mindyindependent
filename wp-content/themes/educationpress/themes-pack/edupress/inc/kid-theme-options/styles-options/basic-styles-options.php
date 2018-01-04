<?php
global $opt_name;
$output = array( '.btn-orange, a.btn-orange, .btn-orange:active, 	.btn-orange:focus, .btn-blue, .btn-blue:active, .btn-blue:focus, button, input[type="button"], 
	input[type="submit"],
	.woocommerce button.button, .woocommerce input.button,
									.i-email-subscribe, 
	.footer-widget .wpcf7-form .wpcf7-submit, 
	.navbar li.pull-right a.woo-menu-cart span, #wp-submit, .btn-default ' );
	
$output_hover  =  array( '.btn-orange:hover,a.btn-orange:hover, .btn-blue:hover, .manage-course:hover, button:hover,input[type="button"]:hover, input[type="submit"]:hover,.woocommerce button.button:hover, .woocommerce input.button:hover, .footer-widget .wpcf7-form .wpcf7-submit:hover, #wp-submit:hover, .btn-default:hover' );
	
	
	
Redux::setField(
	$opt_name, // This is your opt_name,
	array(
				'id'        => 'edupress_button_bg',
				'type'      => 'color',
				'mode'      => 'background-color',
				'section_id' => 'basic-styles',
				'output'    => $output,
				'title'     => esc_html__( 'Button Normal Background Color', 'edupress' ),
				'desc'      => 'default: transparent',
				'default'   => 'transparent',
				'transparent' => true,
				'priority' => 181,
			)
	);
	
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_button_bg_hover',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'mode'      => 'background-color',
		'output'    => $output_hover,
		'title'     => esc_html__( 'Button Hover Background Color', 'edupress' ),
		'desc'      => 'default: transparent',
		'default'   => 'transparent',
		'transparent' => true,
		'priority' => 182,
	)
);



Redux::setField(
	$opt_name, // This is your opt_name,
	array(
				'id'        => 'edupress_button_color',
				'type'      => 'color',
				'section_id' => 'basic-styles',
				'output'    => $output,
				'title'     => esc_html__( 'Button Normal Text Color', 'edupress' ),
				'desc'      => 'default: #03a9f4',
				'default'   => '#03a9f4',
				'transparent' => false,
				'priority' => 183,
			)
	);
	
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_button_color_hover',
		'type'      => 'color',
		'section_id' => 'basic-styles',
		'output'    => $output_hover,
		'title'     => esc_html__( 'Button Hover Text Color', 'edupress' ),
		'desc'      => 'default: #ff5722',
		'default'   => '#ff5722',
		'transparent' => false,
		'priority' => 184,
	)
);


Redux::setField(
	$opt_name, // This is your opt_name,
	array(
				'id'        => 'edupress_button_border',
				'type'      => 'border',
				'section_id' => 'basic-styles',
				'output'    => $output,
				'title'     => esc_html__( 'Button Normal Border', 'edupress' ),
				'default'   => array( 
									'border-color'  => '#03a9f4', 
							        'border-style'  => 'solid', 
									'border-width' => '1px',
								),
				'all' => true,
				'priority' => 185,
			)
	);
	
Redux::setField(
	$opt_name, // This is your opt_name,		
	array(
		'id'        => 'edupress_button_border_hover',
		'type'      => 'border',
		'section_id' => 'basic-styles',
		'output'    => $output_hover,
		'title'     => esc_html__( 'Button Hover Border', 'edupress' ),
		//'desc'      => 'default: #ff5722',
		'default'   => array( 
									'border-color'  => '#ff5722', 
							        'border-style'  => 'solid', 
									'border-width' => '1px',
								),
		'all' => true, 
		'priority' => 186,
	)
);


