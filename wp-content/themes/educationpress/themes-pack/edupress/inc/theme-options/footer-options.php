<?php
/*
 * Header Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer', 'edupress'),
    'id'    => 'footer-section',
	'icon'  => 'el el-website-alt',
    'desc'  => esc_html__('This section contains options for footer.', 'edupress'),
    'fields'=> array(
				 
				 array(
					'id'           => 'edupress_copyright_html',
					'type'         => 'textarea',
					'title'        => esc_html__( 'Footer Copyright Text', 'edupress' ),
					'desc'         => esc_html__( 'Allowed html tags are a, br, em and strong.', 'edupress' ),
					'validate'     => 'html_custom',
					'default'      => esc_html__( '&copy; Copyright 2016 All rights reserved by EducationPress', 'edupress' ),
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
					'priority' => 40,
				),
				array(
					'id'           => 'edupress_developby_html',
					'type'         => 'textarea',
					'title'        => esc_html__( 'Footer Developed By Text', 'edupress' ),
					'desc'         => esc_html__( 'Allowed html tags are a, br, em and strong.', 'edupress' ),
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
					'priority' => 80,
				),
	) ) );

