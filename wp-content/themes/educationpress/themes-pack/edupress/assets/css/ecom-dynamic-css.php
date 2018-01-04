<?php
if ( !function_exists( 'edupress_ecommerce_generate_dynamic_css' ) ) {
    /**
     * Generate dynamic css
     */
    function edupress_ecommerce_generate_dynamic_css() {

        global $edupress_options,$coursepress,$wp;

        $dynamic_css = array();
		
		
		
		
		// Home Page Three Search Form BG  (header)
		//&& is_front_page()
		if ( ! empty( $edupress_options['edupress_home_three_searchform_bg'] )  ) {
		$edupress_home_searchform_bg = $edupress_options['edupress_home_three_searchform_bg'];
			if(count($edupress_home_searchform_bg)>0)
			{
				if(array_key_exists("url",$edupress_home_searchform_bg) && $edupress_home_searchform_bg['url']!='')
				{
					$dynamic_css[] = array(
						'elements'	=>	'.home-third-header',
						'property'	=>	'background',
						'value'		=> 	'url('.$edupress_home_searchform_bg['url'].')  no-repeat center bottom; background-size:cover',
						);
				}
			}
		
		}
		
		
		// Header top banner background and text color
		if ( isset($edupress_options[ 'edupress_header_top_banner' ]) ) {
		$top_banner_bg = $edupress_options['edupress_header_top_banner_bg'];
		$top_banner_text_color = $edupress_options['edupress_header_top_banner_text_color'];
			if($top_banner_bg && $top_banner_text_color)
			{
				 
				 $dynamic_css[] = array(
						'elements'	=>	'.breadcrumb-section',
						'property'	=>	'background',
						'value'		=> 	$top_banner_bg.';',
						);
						
				$dynamic_css[] = array(
						'elements'	=>	'.breadcrumb-section h1',
						'property'	=>	'color',
						'value'		=>   $top_banner_text_color,
						);
			}
			
		
		}
		
		if ( isset( $edupress_options[ 'edupress_header_top_banner' ] ) && $edupress_options[ 'edupress_header_top_banner' ] ) 
		{		
			if ( is_404() ) 
			{
				 $top_banner_404=edupress_get_top_banner_option('edupress_header_top_banner_404');
				 if(count($top_banner_404)>0)
				 {
					if(array_key_exists("url",$top_banner_404) && $top_banner_404['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_404['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
				
			}elseif ( is_search() ) 
			{
				if( !empty($_GET['post_type']) && $_GET['post_type']=='course')
				{
					$top_banner_search= edupress_get_top_banner_option('edupress_header_top_banner_coursesearch');
				}
				else
				{
					$top_banner_search=edupress_get_top_banner_option('edupress_header_top_banner_search');
				}
				
				if(count($top_banner_search)>0)
				 {
					if(array_key_exists("url",$top_banner_search) && $top_banner_search['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_search['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( is_author() ) 
			{
				 $top_banner_blogauthor=edupress_get_top_banner_option('edupress_header_top_banner_blogauthor');
				 if(count($top_banner_blogauthor)>0)
				 {
					if(array_key_exists("url",$top_banner_blogauthor) && $top_banner_blogauthor['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_blogauthor['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
						
			}elseif ( is_post_type_archive('product') ) 
			{
				$top_banner_courselisting= edupress_get_top_banner_option('edupress_header_top_banner_courselisting'); 
				if(count($top_banner_courselisting)>0)
				 {
					if(array_key_exists("url",$top_banner_courselisting) && $top_banner_courselisting['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_courselisting['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}
			elseif ( is_page_template('page-templates/tpl-events.php') ) 
			{
				 $top_banner_eventlisting= edupress_get_top_banner_option('edupress_header_top_banner_eventlisting'); 
				if(count($top_banner_eventlisting)>0)
				 {
					if(array_key_exists("url",$top_banner_eventlisting) && $top_banner_eventlisting['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_eventlisting['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}
			/* For Cart and Checkout */
			elseif( (function_exists('is_cart') && is_cart()) || ( function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ) 
			{
				 $top_banner_cart_checkout= edupress_get_top_banner_option('edupress_header_top_banner_cart_checkout'); 
				if(count($top_banner_cart_checkout)>0)
				 {
					if(array_key_exists("url",$top_banner_cart_checkout) && $top_banner_cart_checkout['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_cart_checkout['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}
			
			
			
			elseif ( is_archive() || is_home()) 
			{
				 if(!empty($edupress_options['edupress_header_top_banner_bloglisting']))
				 {
					 $top_banner_bloglisting=$edupress_options['edupress_header_top_banner_bloglisting'];
					if(count($top_banner_bloglisting)>0)
					 {
						if(array_key_exists("url",$top_banner_bloglisting) && $top_banner_bloglisting['url']!='')
						{
							 $dynamic_css[] = array(
										'elements'	=>	'.breadcrumb-section',
										'property'	=>	'background',
										'value'		=> 	'url('.$top_banner_bloglisting['url'].')  no-repeat center; background-size:cover',
										);
						}
					 }
				 }
			}
		
		
		
			if( ( function_exists( 'is_shop' ) && is_shop() ) ||  is_page() || is_single() || is_singular('event'))
			{
				if( function_exists( 'is_shop' ) && is_shop() )
				{
					$post_id  = get_queried_object_id();
				}
				else
				{
					global $post;
					$post_id = $post->ID ;
				}
				
				$page_banner_image = get_post_meta( $post_id, 'EDU_PRESS_page_banner_image', true );
					
								
				if(( ( function_exists( 'is_shop' ) && is_shop() ) || is_page($post_id) || is_single($post_id) || is_singular('event')) && $page_banner_image>0)
				{
					
					 $dynamic_css[] = array(
							'elements'	=>	'.breadcrumb-section',
							'property'	=>	'background',
							'value'		=> 	'url('.wp_get_attachment_url( $page_banner_image ).')  no-repeat center; background-size:cover',
							);
				}
			}
			
			
			if ( !empty( $edupress_options[ 'edupress_button_bg' ] ) )
			{
				$dynamic_css[] = array(
							'elements'	=>	'.btn-orange, a.btn-orange, .btn-orange:active, .btn-orange:focus, .btn-blue, .btn-blue:active, .btn-blue:focus, button, input[type="button"], 
input[type="submit"],.woocommerce button.button, .woocommerce input.button,.i-email-subscribe, 
.footer-widget .wpcf7-form .wpcf7-submit, .navbar li.pull-right a.woo-menu-cart span, #wp-submit',
							'property'	=>	'border-color',
							'value'		=> 	esc_html($edupress_options[ 'edupress_button_bg' ]),
							);
			}
			if ( !empty( $edupress_options[ 'edupress_button_bg_hover' ] ) )
			{
				$dynamic_css[] = array(
							'elements'	=>	'..btn-orange:hover,a.btn-orange:hover, .btn-blue:hover, .manage-course:hover, button:hover, input[type="button"]:hover, input[type="submit"]:hover,.woocommerce 
button.button:hover, .woocommerce input.button:hover, .footer-widget 
.wpcf7-form .wpcf7-submit:hover, #wp-submit:hover',
							'property'	=>	'border-color',
							'value'		=> 	esc_html($edupress_options[ 'edupress_button_bg_hover' ]),
							);
			}
		}
		

        // Start generating if related arrays are populated
        if ( count( $dynamic_css ) > 0  ) {
            echo "<style type='text/css' id='EduPress-dynamic-css'>\n\n";

            // Basic dynamic CSS
            if ( count( $dynamic_css ) > 0 ) {
                edupress_produce_dynamic_css ( $dynamic_css );
            }

           
            echo '</style>';
        }

    }

}
add_action( 'wp_head', 'edupress_ecommerce_generate_dynamic_css');