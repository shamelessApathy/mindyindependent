<?php

if ( !function_exists( 'edupress_university_generate_dynamic_css' ) ) {
    /**
     * Generate dynamic css
     */
    function edupress_university_generate_dynamic_css() {

        global $edupress_options,$coursepress,$wp;

        $dynamic_css = array();
		
				
		// Header top banner background and text color
		$top_banner_bg = $edupress_options['edupress_header_top_banner_bg'];
		$top_banner_text_color = $edupress_options['edupress_header_top_banner_text_color'];
		if($top_banner_bg)
		{
			 $dynamic_css[] = array(
					'elements'	=>	'.breadcrumb-section',
					'property'	=>	'background',
					'value'		=> 	$top_banner_bg.';',
					);
		}
		if($top_banner_text_color )			
		{
			$dynamic_css[] = array(
					'elements'	=>	'.breadcrumb-section h1,#primary .entry-header h1.entry-title',
					'property'	=>	'color',
					'value'		=>   $top_banner_text_color,
					);
		}
	

		if( $edupress_options['edupress_header_variation'] == 1 
		&& !is_front_page() && !empty( $edupress_options[ 'edupress_top_header_bg_image' ] ) ) {
			 $top_most_banner= edupress_get_top_banner_option('edupress_top_header_bg_image');
			 if(count($top_most_banner)>0)
			 {
				if(array_key_exists("url",$top_most_banner) && $top_most_banner['url']!='')
				{
					 $dynamic_css[] = array(
								'elements'	=>	'.inner-pages',
								'property'	=>	'background',
								'value'		=> 	'url('.$top_most_banner['url'].')  no-repeat center; background-size:cover',
								);
				}
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
						
			}elseif (  is_page_template( 'uni-page-templates/tpl-courses' ) || is_post_type_archive('course') ) 
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
			elseif ( is_page_template('uni-page-templates/tpl-campus.php') || is_singular( 'campus' ) ) 
			{
				 $top_banner_campuslisting= edupress_get_top_banner_option('edupress_header_top_banner_campuslisting'); 
				if(count($top_banner_campuslisting)>0)
				 {
					if(array_key_exists("url",$top_banner_campuslisting) && $top_banner_campuslisting['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_campuslisting['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}
			elseif ( is_page_template('page-templates/tpl-events.php') || is_singular( 'event' ) ) 
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
			
			}elseif ( is_archive() || is_home()) 
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
			
			if(is_page() || is_single() || is_singular('event') || is_singular('campus'))
			{
				global $post;
				$page_banner_image=get_post_meta( $post->ID, 'EDU_PRESS_page_banner_image', true );
				
				if((is_page($post->ID) || is_single($post->ID) || is_singular('event')) && $page_banner_image>0)
				{
					 
					 $dynamic_css[] = array(
							'elements'	=>	'.breadcrumb-section',
							'property'	=>	'background',
							'value'		=> 	'url('.wp_get_attachment_url( $page_banner_image ).')  no-repeat center; background-size:cover',
							);
				}
				
				
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
add_action( 'wp_head', 'edupress_university_generate_dynamic_css');