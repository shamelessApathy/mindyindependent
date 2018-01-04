<?php
if ( !function_exists( 'edupress_produce_dynamic_css' ) ) {
    /**
     * Produce css based on given array
     * @param $dynamic_css_array
     */
    function edupress_produce_dynamic_css ( $dynamic_css_array )
    {
        foreach ( $dynamic_css_array as $css_unit ) {
            if ( ! empty( $css_unit[ 'value' ] ) ) {
                echo $css_unit[ 'elements' ] . "{\n";
                echo $css_unit[ 'property' ] . ":" . $css_unit[ 'value' ] . ";\n";
                echo "}\n\n";
            }
        }
    }
}

if ( !function_exists( 'edupress_generate_dynamic_css' ) ) {
    /**
     * Generate dynamic css
     */
    function edupress_generate_dynamic_css() {

        global $edupress_options,$coursepress,$wp;

        $dynamic_css = array();
		
		
		// Header Text logo and tag line color
		if(!empty($edupress_options['edupress_header_logo_text_color']))
		{
			$header_logo_text_color=$edupress_options['edupress_header_logo_text_color'];
			if(!empty($header_logo_text_color['regular']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.site-header .site-title a',
						'property'	=> 'color',
						'value'		=> $header_logo_text_color['regular'],
						);
			}
			if(!empty($header_logo_text_color['hover']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.site-header .site-title a:hover',
						'property'	=> 'color',
						'value'		=> $header_logo_text_color['hover'],
						);
			}
			if(!empty($header_logo_text_color['active']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.site-header .site-title a:active',
						'property'	=> 'color',
						'value'		=> $header_logo_text_color['active'],
						);
			}
		}
		
		if( !empty($edupress_options['edupress_header_tagline_text_color']))
		{
			$header_logo_tag_color=$edupress_options['edupress_header_tagline_text_color'];
			if(!empty($header_logo_tag_color))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.site-header .tag-line',
						'property'	=> 'color',
						'value'		=> $header_logo_tag_color,
						);
			}
		}
		
		
		
		
		if( !empty($edupress_options['edupress_header_top_background']))
		{
			$header_top_background = $edupress_options['edupress_header_top_background'];
			if(!empty($header_top_background))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.header_meta',
						'property'	=> 'background',
						'value'		=> $header_top_background,
						);
			}
		}
		
		if( !empty($edupress_options['edupress_header_top_text']))
		{
			$header_top_text_color = $edupress_options['edupress_header_top_text'];
			if(!empty($header_top_text_color))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.header_meta, nav.meta-login ul li, 
						.header_meta_two nav.meta-login ul li:first-child, 
						.header_meta .contact-info span, .header_meta .contact-info span i, .header_meta_one nav.meta-login ul li',
						'property'	=> 'color',
						'value'		=> $header_top_text_color,
						);
			}
		}
		
		if( !empty($edupress_options['edupress_headertop_text_border']))
		{
			$header_top_text_border = $edupress_options['edupress_headertop_text_border'];
			if(!empty($header_top_text_border))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.header_meta',
						'property'	=> 'border-bottom',
						'value'		=> '1px solid '.$header_top_text_border,
						);
				$dynamic_css[] = array(
						'elements'	=> 'nav.meta-login ul li',
						'property'	=> 'border-left',
						'value'		=> '1px solid '.$header_top_text_border,
						);
			}
		}
		
		if( !empty($edupress_options['edupress_header_top_user_nav_link']))
		{
			$header_top_user_nav = $edupress_options['edupress_header_top_user_nav_link'];
			if(!empty($header_top_user_nav['regular']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> 'nav.meta-login ul li a, .header_meta_two .meta-login ul li a',
						'property'	=> 'color',
						'value'		=> $header_top_user_nav['regular'],
						);
			}
			if(!empty($header_top_user_nav['hover']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> 'nav.meta-login ul li a:hover, .header_meta_two .meta-login ul li a:hover',
						'property'	=> 'color',
						'value'		=> $header_top_user_nav['hover'],
						);
			}
			if(!empty($header_top_user_nav['active']))
			{
				
				$dynamic_css[] = array(
						'elements'	=> 'nav.meta-login ul li a:active, .header_meta_two .meta-login ul li a:active',
						'property'	=> 'color',
						'value'		=> $header_top_user_nav['active'],
						);
			}
		}		
	

        // Start generating if related arrays are populated
        if ( count( $dynamic_css ) > 0  ) {
            echo "<style type='text/css' id='edupress-dynamic-css'>\n\n";

            // Basic dynamic CSS
            if ( count( $dynamic_css ) > 0 ) {
                edupress_produce_dynamic_css ( $dynamic_css );
            }

           
            echo '</style>';
        }

    }


}
add_action( 'wp_head', 'edupress_generate_dynamic_css');