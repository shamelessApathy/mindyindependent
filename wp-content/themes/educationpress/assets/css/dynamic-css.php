<?php
if ( !function_exists( 'educationpress_produce_dynamic_css' ) ) {
    /**
     * Produce css based on given array
     * @param $dynamic_css_array
     */
    function educationpress_produce_dynamic_css ( $dynamic_css_array )
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


if ( !function_exists( 'educationpress_generate_dynamic_css' ) ) {
    /**
     * Generate dynamic css
     */
    function educationpress_generate_dynamic_css() {

        global $educationpress_options,$coursepress,$wp;
		$dynamic_css = array();
		
		// Home Page Three Search Form BG  (header)
		if ( ! empty( $educationpress_options['educationpress_home_three_searchform_bg'] )  && is_front_page()) {
		$educationpress_home_searchform_bg = $educationpress_options['educationpress_home_three_searchform_bg'];
			if(count($educationpress_home_searchform_bg)>0)
			{
				if(array_key_exists("url",$educationpress_home_searchform_bg) && $educationpress_home_searchform_bg['url']!='')
				{
					$dynamic_css[] = array(
						'elements'	=>	'.home-third-header',
						'property'	=>	'background',
						'value'		=> 	'url('.$educationpress_home_searchform_bg['url'].')  no-repeat center bottom; background-size:cover',
						);
				}
			}
		
		}
		
		
		// Header top banner background and text color
		if ( isset($educationpress_options[ 'educationpress_header_top_banner' ]) ) {
		$top_banner_bg= $educationpress_options['educationpress_header_top_banner_bg'];
		$top_banner_text_color= $educationpress_options['educationpress_header_top_banner_text_color'];
		
		
		
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
		
		if ( isset($educationpress_options[ 'educationpress_header_top_banner' ]) && $educationpress_options[ 'educationpress_header_top_banner' ]   ) 
		{
				$units_archive_page         = false;
				$units_archive_grades_page  = false;
				$notifications_archive_page = false;
				$units_workbook_page        = false;

				if (is_array($wp->query_vars) && array_key_exists( 'coursename', $wp->query_vars ) && ! array_key_exists( 'unitname', $wp->query_vars ) ) 
				{
										
					$url = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
					
					if ( preg_match( '/' . CoursePress_Core::get_slug('unit') . '/', $url ) ) {
					$units_archive_page = true;
					}
					
					if ( preg_match( '/' . CoursePress_Core::get_slug('grade') . '/', $url ) ) {
					$units_archive_grades_page = true;
					}
					
					if ( preg_match( '/' . CoursePress_Core::get_slug('workbook'). '/', $url ) ) {
					$units_workbook_page = true;
					}
					
					if ( preg_match( '/' . CoursePress_Core::get_slug('notification') . '/', $url ) ) {
					$notifications_archive_page = true;
					}
				}
			if ( is_404() ) 
			{
				 $top_banner_404=educationpress_get_top_banner_option('educationpress_header_top_banner_404');
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
				if( !empty($_GET['post-type']) && $_GET['post-type']=='course')
				{
					$top_banner_search= educationpress_get_top_banner_option('educationpress_header_top_banner_coursesearch');
				}
				else
				{
					$top_banner_search=educationpress_get_top_banner_option('educationpress_header_top_banner_search');
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
				 $top_banner_blogauthor=educationpress_get_top_banner_option('educationpress_header_top_banner_blogauthor');
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
						
			}elseif ( is_post_type_archive('course') ||
			 is_page_template( array('page-templates/tpl-courses.php',  'page-templates/tpl-courses-grid-2-col.php', 'page-templates/tpl-courses-grid-3-col.php', 'page-templates/tpl-courses-list.php') ) ) 
			{
				$top_banner_courselisting= educationpress_get_top_banner_option('educationpress_header_top_banner_courselisting'); 
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
			
			}elseif ( is_array($wp->query_vars) && array_key_exists( 'instructor_username', $wp->query_vars ) ) 
			{
				 $top_banner_courseinstructor=educationpress_get_top_banner_option('educationpress_header_top_banner_courseinstructor');  
				 if(count($top_banner_courseinstructor)>0)
				 {
					if( array_key_exists("url",$top_banner_courseinstructor) && $top_banner_courseinstructor['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_courseinstructor['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( $units_archive_page ) 
			{
				 $top_banner_unitlisting= educationpress_get_top_banner_option('educationpress_header_top_banner_unitlisting'); 
				 if(count($top_banner_unitlisting)>0)
				 {
					if(array_key_exists("url",$top_banner_unitlisting) && $top_banner_unitlisting['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_unitlisting['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( $units_archive_grades_page ) 
			{
				 $top_banner_unitgrade= educationpress_get_top_banner_option('educationpress_header_top_banner_unitgrade'); 
				 if(count($top_banner_unitgrade)>0)
				 {
					if(array_key_exists("url",$top_banner_unitgrade) && $top_banner_unitgrade['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_unitgrade['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( is_array($wp->query_vars) && array_key_exists( 'coursename', $wp->query_vars ) && array_key_exists( 'unitname', $wp->query_vars )  ) 
			{
				 $top_banner_unitdetail= educationpress_get_top_banner_option('educationpress_header_top_banner_unitdetail'); 
				 if(count($top_banner_unitdetail)>0)
				 {
					if(array_key_exists("url",$top_banner_unitdetail) && $top_banner_unitdetail['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_unitdetail['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( $notifications_archive_page ) 
			{
				 $top_banner_notification= educationpress_get_top_banner_option('educationpress_header_top_banner_notification'); 
				if(count($top_banner_notification)>0)
				 {
					if(array_key_exists("url",$top_banner_notification) && $top_banner_notification['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_notification['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( is_array($wp->query_vars) && array_key_exists( 'discussion_archive', $wp->query_vars ) ) 
			{
				 $top_banner_discussions= educationpress_get_top_banner_option('educationpress_header_top_banner_discussions'); 
				 if(count($top_banner_discussions)>0)
				 {
					if(array_key_exists("url",$top_banner_discussions) && $top_banner_discussions['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_discussions['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( $units_workbook_page ) 
			{
				 $top_banner_workbook= educationpress_get_top_banner_option('educationpress_header_top_banner_workbook');  
				 if(count($top_banner_workbook)>0)
				 {
					if(array_key_exists("url",$top_banner_workbook) && $top_banner_workbook['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_workbook['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( is_singular('discussions') ) 
			{
				 $top_banner_discussionsdetail= educationpress_get_top_banner_option('educationpress_header_top_banner_discussionsdetail');  
				 if(count($top_banner_discussionsdetail)>0)
				 {
					if(array_key_exists("url",$top_banner_discussionsdetail) && $top_banner_discussionsdetail['url']!='')
					{
						 $dynamic_css[] = array(
									'elements'	=>	'.breadcrumb-section',
									'property'	=>	'background',
									'value'		=> 	'url('.$top_banner_discussionsdetail['url'].')  no-repeat center; background-size:cover',
									);
					}
				 }
			
			}elseif ( is_post_type_archive('event') ) 
			{
				
				 $top_banner_eventlisting= educationpress_get_top_banner_option('educationpress_header_top_banner_eventlisting'); 
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
				 if(!empty($educationpress_options['educationpress_header_top_banner_bloglisting']))
				 {
					 $top_banner_bloglisting=$educationpress_options['educationpress_header_top_banner_bloglisting'];
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
			
			if(is_page() || is_single() || is_singular('event'))
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
		
		

		
		
		
		// Header Text logo and tag line color
		if(!empty($educationpress_options['educationpress_header_logo_text_color']))
		{
			$header_logo_text_color=$educationpress_options['educationpress_header_logo_text_color'];
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
		
		if( !empty($educationpress_options['educationpress_header_tagline_text_color']))
		{
			$header_logo_tag_color=$educationpress_options['educationpress_header_tagline_text_color'];
			if(!empty($header_logo_tag_color))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.site-header .tag-line',
						'property'	=> 'color',
						'value'		=> $header_logo_tag_color,
						);
			}
		}
		
		
		
		
		if( !empty($educationpress_options['educationpress_header_top_background']))
		{
			$header_top_background = $educationpress_options['educationpress_header_top_background'];
			if(!empty($header_top_background))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.header_meta',
						'property'	=> 'background',
						'value'		=> $header_top_background,
						);
			}
		}
		
		if( !empty($educationpress_options['educationpress_header_top_text']))
		{
			$header_top_text_color = $educationpress_options['educationpress_header_top_text'];
			if(!empty($header_top_text_color))
			{
				
				$dynamic_css[] = array(
						'elements'	=> '.header_meta, nav.meta-login ul li',
						'property'	=> 'color',
						'value'		=> $header_top_text_color,
						);
			}
		}
		
		if( !empty($educationpress_options['educationpress_headertop_text_border']))
		{
			$header_top_text_border = $educationpress_options['educationpress_headertop_text_border'];
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
		
		
		if( !empty($educationpress_options['educationpress_header_top_user_nav_link']))
		{
			$header_top_user_nav = $educationpress_options['educationpress_header_top_user_nav_link'];
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
            echo "<style type='text/css' id='educationpress-dynamic-css'>\n\n";

            // Basic dynamic CSS
            if ( count( $dynamic_css ) > 0 ) {
                educationpress_produce_dynamic_css ( $dynamic_css );
            }
           
            echo '</style>';
        }

    }


}
add_action( 'wp_head', 'educationpress_generate_dynamic_css');