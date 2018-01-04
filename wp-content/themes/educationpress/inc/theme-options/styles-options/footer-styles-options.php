<?php
/*
 * Footer Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Footer', 'educationpress'),
    'id'    => 'footer-styles',
    'desc'  => esc_html__('This sub section contains footer styles options.', 'educationpress' ),
    'subsection' => true,
    'fields'=> array (


        array(
            'id'        => 'educationpress_footer_bg',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.site-footer' ),
            'title'     => esc_html__( 'Footer Background Color', 'educationpress' ),
            'desc'      => 'default: #262c38',
            'default'   => '#262c38',
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_footer_heading',
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
            'title'     => esc_html__( 'Footer Headings Color', 'educationpress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#ffffff',
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_footer_text',
            'type'      => 'color',
            'output'    => array( '.site-footer, .site-footer p, .site-footer ul li' ),
            'title'     => esc_html__( 'Footer Text Color', 'educationpress' ),
            'desc'      => 'default: #657184',
            'default'   => '#657184',
            'transparent' => false,
        ),
        array(
            'id'        => 'educationpress_footer_link',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Footer Link Color', 'educationpress' ),
            'active'    => true,
            'output'    => array( '.site-footer a, .site-footer p a, .site-footer li a' ),
            'default'   => array(
                'regular' => '#657184',
                'hover'   => '#ffffff',
                'active'  => '#657184',
            ),
        ), 


    ) ) );