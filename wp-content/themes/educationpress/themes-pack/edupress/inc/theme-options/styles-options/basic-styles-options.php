<?php
/*
 * Basic Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Basic', 'edupress'),
    'id'    => 'basic-styles',
    'desc'  => esc_html__('This sub section contains basic styles options.', 'edupress' ),
    'subsection' => true,
    'fields'=> apply_filters( 'edupress_basic_style_fields', array(

        array(
            'id'        => 'edupress_body_background',
            'type'      => 'background',
            'output'    => array( 'body', '.site-pages' ),
            'title'     => esc_html__( 'Main Background', 'edupress' ),
            'subtitle'  => esc_html__( 'Configure body background of your choice. ( default:#ffffff )', 'edupress' ),
            'default'   => '#ffffff',
			'priority' => 20,
        ),
        array(
            'id'        => 'edupress_change_font',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change fonts?', 'edupress' ),
            'default'   => '0',
            'on'    => esc_html__( 'Yes', 'edupress' ),
            'off'   => esc_html__( 'No', 'edupress' ),
			'priority' => 40,
        ),
        array(
            'id'        => 'edupress_headings_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Headings Font', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the font for headings.', 'edupress' ),
            'desc'      => esc_html__( 'Montserrat is default font.', 'edupress' ),
            'required'  => array( 'edupress_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => false,
			'subsets' => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( 'h1','h2','h3','h4','h5','h6', '.h1','.h2','.h3','.h4','.h5','.h6','.kindergarten .slides > li h2','.aboutus h3','.our-features h3','.fun-gallery h3','.school-classes h3','.school-events h3','.our-blog h3','.our-teachers h3','.call-to-action h3','.site-footer .widget h3','.kindergarten-second .slides > li h2','.kindergarten-second .slides > li h3','.notice h3','.about-info h3','.our-classes-two h3','.classes-v-two .classes-v-two-info h3','.facilities-with-teachers h3','.muti-options-vtwo h3','.contact-home-vtwo h3','.our-features .feature h3',
			 ),
            'default'       => array(
                'font-family' => 'Montserrat',
				'font-style'  => '700',
                'google'      => true
            ),
			'priority' => 60,
        ),
        array(
            'id'        => 'edupress_body_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Text Font', 'edupress' ),
            'subtitle'  => esc_html__( 'Select the font for body text.', 'edupress' ),
            'desc'      => esc_html__( 'Open Sans is default font.', 'edupress' ),
            'required'  => array( 'edupress_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => false,
            'font-size'     => false,
			'subsets' => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( 'body' ),
            'default'       => array(
                'font-family' => 'Open Sans',
                'google'      => true
            ),
			'priority' => 80,
        ),
        array(
            'id'        => 'edupress_headings_color',
            'type'      => 'color',
            'output'    => array( 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6','.aboutus h3','.our-features h3','.fun-gallery h3','.school-events h3','.our-blog h3','.our-teachers h3','.site-footer .widget h3','.notice h3','.about-info h3','.our-classes-two h3','.classes-v-two .classes-v-two-info h3','.facilities-with-teachers h3','.muti-options-vtwo h3','.contact-home-vtwo h3','.our-features .feature h3', '.about-info h4, .signup-newsletter h3',
			),
            'title'     => esc_html__( 'Headings Color', 'edupress' ),
            'default'   => '#262c38',
            'validate'  => 'color',
            'transparent' => false,
            'desc'  => 'default: #262c38',
			'priority' => 100,
        ),
        array(
            'id'        => 'edupress_text_color',
            'type'      => 'color',
            'transparent' => false,
            'output'    => array( 'body' ),
            'title'     => esc_html__( 'Text Color', 'edupress' ),
            'desc'  => 'default: #657184',
            'default'   => '#657184',
            'validate'  => 'color',
			'priority' => 120,
        ),
        array(
            'id'        => 'edupress_blockquote_color',
            'type'      => 'color',
            'output'    => array( 'blockquote', 'blockquote p' ),
            'title'     => esc_html__('Quote Text Color', 'edupress'),
            'default'   => '#657184',
            'validate'  => 'color',
            'transparent' => false,
            'desc'  => 'default: #657184',
			'priority' => 140,
        ),
        array(
            'id'        => 'edupress_link_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Link Color', 'edupress' ),
            'active'    => true,
            'output'    => array( 'a', 'p a' ),
            'default'   => array(
                'regular' => '#263238',
                'hover'   => '#ff5722',
                'active'  => '#263238',
            ),
			'priority' => 160,
        ),
        array(
            'id'        => 'edupress_content_listing_link_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Link Color in All Listing Contents', 'edupress' ),
            'active'    => true,
            'output'    => array( '.course .meta a', '.course a', 'h2 a', 'h4 a, a.more', '.entry-meta a', '#secondary .widget a', 'table.dataTable tr td:nth-child(1) a', '.event-widget ul li p.title a',
			'.announcements-widget ul li p.title a', '.campus-slider .campus h3 a', '.news-widget-two ul li p.title a', '.classes a', '.school-events .events a', '.school-events .events a.know-more' ),
            'default'   => array(
              'regular' => '#263238',
                'hover'   => '#ff5722',
                'active'  => '#263238',
            ),
			'priority' => 180,
        ),
		
		
		//end For pagination links*/
        array(
            'id'        => 'edupress_quick_css',
            'type'      => 'ace_editor',
            'title'     => esc_html__( 'Quick CSS', 'edupress' ),
            'desc'      => esc_html__( 'You can use this box for some quick css changes. For big changes, Use the custom.css file in assets/css folder. In case of child theme please use style.css file in child theme.', 'edupress' ),
            'mode'      => 'css',
            'theme'     => 'monokai',
			'priority' => 240,
        )

    ) 
	)
	) );