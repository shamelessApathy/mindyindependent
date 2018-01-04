<?php
/*
 * Header Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer', 'educationpress'),
    'id'    => 'footer-section',
	'icon'  => 'el el-website-alt',
    'desc'  => esc_html__('This section contains options for footer.', 'educationpress'),
    'fields'=> array(
				 array(
						'id'       => 'educationpress_footer_column',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Footer Column', 'educationpress' ),
						'desc' => esc_html__( 'Choose the Footer Column layout.', 'educationpress' ),
						'options'  => array(
							'1' => esc_html__('Column 1', 'educationpress'),
							'2' => esc_html__('Column 2', 'educationpress'),
							'3' => esc_html__('Column 3', 'educationpress'),
							'4' => esc_html__('Column 4', 'educationpress'),
						),
						'default'  => '4',
					),
				 array(
					'id'           => 'educationpress_copyright_html',
					'type'         => 'textarea',
					'title'        => esc_html__( 'Footer Copyright Text', 'educationpress' ),
					'desc'         => esc_html__( 'Allowed html tags are a, br, em and strong.', 'educationpress' ),
					'validate'     => 'html_custom',
					'default'      => esc_html__( '&copy; Copyright 2016 All rights reserved by EducationPress', 'educationpress' ),
					'allowed_html' => array(
						'a'      => array(
							'href'  => array(),
							'title' => array(),
							'target' => array(),
						),
						'br'     => array(),
						'em'     => array(),
						'strong' => array()
					), //see http://codex.wordpress.org/Function_Reference/wp_kses
				),
				array(
					'id'           => 'educationpress_developby_html',
					'type'         => 'textarea',
					'title'        => esc_html__( 'Footer Developed By Text', 'educationpress' ),
					'desc'         => esc_html__( 'Allowed html tags are a, br, em and strong.', 'educationpress' ),
					'validate'     => 'html_custom',
					'default'      => sprintf( 'Developed by <a href="%1$s" target="_blank">ThemeCycle</a>', esc_url( 'http://themecycle.com' ) ),
					'allowed_html' => array(
						'a'      => array(
							'href'  => array(),
							'title' => array(),
							'target' => array(),
						),
						'br'     => array(),
						'em'     => array(),
						'strong' => array()
					), //see http://codex.wordpress.org/Function_Reference/wp_kses
				),
	) ) );

