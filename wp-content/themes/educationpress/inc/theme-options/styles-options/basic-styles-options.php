<?php
/*
 * Basic Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Basic', 'educationpress'),
    'id'    => 'basic-styles',
    'desc'  => esc_html__('This sub section contains basic styles options.', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(

        array(
            'id'        => 'educationpress_body_background',
            'type'      => 'background',
            'output'    => array( 'body', '.site-pages' ),
            'title'     => esc_html__( 'Main Background', 'educationpress' ),
            'subtitle'  => esc_html__( 'Configure body background of your choice. ( default:#ffffff )', 'educationpress' ),
            'default'   => '#ffffff'
        ),
        array(
            'id'        => 'educationpress_change_font',
            'type'      => 'switch',
            'title'     => esc_html__( 'Do you want to change fonts?', 'educationpress' ),
            'default'   => '0',
            'on'    => esc_html__( 'Yes', 'educationpress' ),
            'off'   => esc_html__( 'No', 'educationpress' )
        ),
        array(
            'id'        => 'educationpress_headings_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Headings Font', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the font for headings.', 'educationpress' ),
            'desc'      => esc_html__( 'Montserrat is default font.', 'educationpress' ),
            'required'  => array( 'educationpress_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => true,
            'font-weight'   => false,
			'subsets' => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( 'h1','h2','h3','h4','h5','h6', '.h1','.h2','.h3','.h4','.h5','.h6' ),
            'default'       => array(
                'font-family' => 'Montserrat',
				'font-style'  => '700',
                'google'      => true
            )
        ),
        array(
            'id'        => 'educationpress_body_font',
            'type'      => 'typography',
            'title'     => esc_html__( 'Text Font', 'educationpress' ),
            'subtitle'  => esc_html__( 'Select the font for body text.', 'educationpress' ),
            'desc'      => esc_html__( 'Open Sans is default font.', 'educationpress' ),
            'required'  => array( 'educationpress_change_font', '=', '1' ),
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
            )
        ),
        array(
            'id'        => 'educationpress_headings_color',
            'type'      => 'color',
            'output'    => array( 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .signup-newsletter h3' ),
            'title'     => esc_html__( 'Headings Color', 'educationpress' ),
            'default'   => '#262c38',
            'validate'  => 'color',
            'transparent' => false,
            'desc'  => 'default: #262c38',
        ),
        array(
            'id'        => 'educationpress_text_color',
            'type'      => 'color',
            'transparent' => false,
            'output'    => array( 'body' ),
            'title'     => esc_html__( 'Text Color', 'educationpress' ),
            'desc'  => 'default: #657184',
            'default'   => '#657184',
            'validate'  => 'color'
        ),
        array(
            'id'        => 'educationpress_blockquote_color',
            'type'      => 'color',
            'output'    => array( 'blockquote', 'blockquote p' ),
            'title'     => esc_html__('Quote Text Color', 'educationpress'),
            'default'   => '#657184',
            'validate'  => 'color',
            'transparent' => false,
            'desc'  => 'default: #657184',
        ),
        array(
            'id'        => 'educationpress_link_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Link Color', 'educationpress' ),
            //'active'    => true,
            'output'    => array( 'a', 'p a'  ),
            'default'   => array(
                'regular' => '#263238',
                'hover'   => '#ff5722',
                'active'  => '#263238',
            )
        ),
       array(
            'id'        => 'edupress_content_listing_link_color',
            'type'      => 'link_color',
            'title'     => esc_html__( 'Link Color in All Listing Contents', 'educationpress' ),
            //'active'    => true,
            'output'    => array( '.course .meta a', '.course a', 'h2 a', 'h4 a', 'a.more', '.entry-meta a', '#secondary .widget a' ),
            'default'   => array(
              'regular' => '#263238',
                'hover'   => '#ff5722',
                'active'  => '#263238',
            )
        ),
       
	   
	   
	   array(
            'id'        => 'educationpress_button_bg',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.btn-orange, a.btn-orange, .btn-orange:active, .btn-orange:focus, .btn-blue, button, input[type="button"], input[type="submit"], .woocommerce button.button, .woocommerce input.button, .footer-widget .wpcf7-form .wpcf7-submit, .navbar li.pull-right a.woo-menu-cart span, #wp-submit, .cp .button, .discussion-new .button, a.mp_button, .mp_orders_invoice a.button, button.mp_button, .apply-button, .new_question input[type="submit"].button_submit, .discussion-controls input[type="submit"].button_submit, .discussion-controls .button_submit, .i-email-subscribe, main .course_list_box_item .coursepress-course-link, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .single_add_to_cart_button.disabled' ),
            'title'     => esc_html__( 'Button Normal Background Color', 'educationpress' ),
            'desc'      => 'default: #ff5722',
            'default'   => '#ff5722',
            'transparent' => false,
        ),
		
		array(
            'id'        => 'educationpress_button_bg_hover',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.btn-orange:hover,a.btn-orange:hover, .btn-blue:hover, .manage-course:hover, button:hover, input[type="button"]:hover, input[type="submit"]:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .footer-widget .wpcf7-form .wpcf7-submit:hover, #wp-submit:hover, .cp .button:hover, .discussion-new .button:hover, a.mp_button, .mp_orders_invoice a.button:hover, button.mp_button:hover, .apply-button:hover, .new_question input[type="submit"].button_submit:hover, .discussion-controls input[type="submit"].button_submit, .discussion-controls .button_submit:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, main .course_list_box_item .coursepress-course-link:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover'),
            'title'     => esc_html__( 'Button Hover Background Color', 'educationpress' ),
            'desc'      => 'default: #0583e4',
            'default'   => '#0583e4',
            'transparent' => false,
        ),
		
		
		
		//start For pagination links*/
		array(
            'id'        => 'educationpress_pagination_text_color',
            'type'      => 'color',
            'output'    => array( ".pagination a.page-numbers, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, .pagination .current, .pagination span.dots, .pagination a.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li a" ),
            'title'     => esc_html__( 'Pagination Normal Text Color', 'educationpress' ),
            'desc'      => 'default: #99a6bb',
            'default'   => '#99a6bb',
            'transparent' => false,
        ),
		array(
            'id'        => 'educationpress_pagination_border_color',
            'type'      => 'border',
            'output'    => array( '.pagination a.page-numbers, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, .pagination .current, .pagination span.dots, .pagination a.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li a' ),
            'title'     => esc_html__( 'Pagination Normal Border ', 'educationpress' ),            
            'default'  => array(
				'border-color'  => '#e4e8ee', 
				'border-style'  => 'solid', 
				'border-width'	=> '1px',
			)
        ),
		array(
            'id'        => 'educationpress_pagination_bg_color',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( ".pagination a.page-numbers, .pagination a.page-numbers,  #navigation-pagination.navigation li.disabled, .pagination .page-numbers.dots, #navigation-pagination.navigation li a, .woocommerce nav.woocommerce-pagination ul li a" ),
            'title'     => esc_html__( 'Pagination Normal Background Color', 'educationpress' ),            
            'transparent' => true,
        ),
		
		
		
		array(
            'id'        => 'educationpress_pagination_hover_text_color',
            'type'      => 'color',
            'output'    => array( '.pagination a:hover.page-numbers, .pagination .page-numbers:hover, .pagination span.current, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, .pagination .current, .pagination span.dots, .pagination a.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover' ),
            'title'     => esc_html__( 'Pagination Hover Text Color', 'educationpress' ),
            'desc'      => 'default: #ffffff',
            'default'   => '#ffffff',
            'transparent' => false,
        ),
		array(
            'id'        => 'educationpress_pagination_hover_border_color',
            'type'      => 'border',
            'output'    => array( '.pagination a:hover.page-numbers, .pagination span.current, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover' ),
            'title'     => esc_html__( 'Pagination Hover Border ', 'educationpress' ),            
            'default'  => array(
				'border-color'  => '#ff5722', 
				'border-style'  => 'solid', 
				'border-width'	=> '1px',
			)
        ),
		array(
            'id'        => 'educationpress_pagination_hover_bg_color',
            'type'      => 'color',
            'mode'      => 'background-color',
            'output'    => array( '.pagination a:hover.page-numbers, .pagination span.current, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, #navigation-pagination.navigation li a:hover, #navigation-pagination.navigation li.active a, .pagination .current, .pagination span.dots, .pagination a.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover' ),
            'title'     => esc_html__( 'Pagination Hover Background Color', 'educationpress' ), 
			 'desc'      => 'default: #ff5722',           
			'default'   => '#ff5722',
            'transparent' => false,
        ),
		
		//end For pagination links*/
	   
        array(
            'id'        => 'educationpress_quick_css',
            'type'      => 'ace_editor',
            'title'     => esc_html__( 'Quick CSS', 'educationpress' ),
            'desc'      => esc_html__( 'You can use this box for some quick css changes. For big changes, Use the custom.css file in assets/css folder. In case of child theme please use style.css file in child theme.', 'educationpress' ),
            'mode'      => 'css',
            'theme'     => 'monokai'
        )

    ) ) );