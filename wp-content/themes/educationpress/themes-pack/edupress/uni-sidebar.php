<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edupress
 */
global $edupress_options,$wp;

$default_layout='';
$sidebar_enable=true;
$default_sidebar='sidebar-1';
if ( is_search() )
{
	if(!empty($_GET['post_type']) && $_GET['post_type']=='course')
	{
		$default_sidebar='search-course-listing';
		if ($edupress_options['edupress_searchcourse_layout'] == '1') {
			$sidebar_enable=false;
		} elseif($edupress_options['edupress_searchcourse_layout'] == '2') {
			$sidebar_enable=true;
			$default_layout=" pull-left";
		} elseif($edupress_options['edupress_searchcourse_layout'] == '3') {
			$sidebar_enable=true;
			$default_layout=" pull-right";
		}
	}
	else
	{
		$default_sidebar='search-listing';
		if ($edupress_options['edupress_search_layout'] == '1') {
			$sidebar_enable=false;
		} elseif($edupress_options['edupress_search_layout'] == '2') {
			$sidebar_enable=true;
			$default_layout=" pull-left";
		} elseif($edupress_options['edupress_search_layout'] == '3') {
			$sidebar_enable=true;
			$default_layout=" pull-right";
		}
	}
	

}
elseif(is_author())
{
	$default_sidebar='blog-author';
	if ($edupress_options['edupress_blogauthor_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_blogauthor_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_blogauthor_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif( get_query_var('instructor') )
{
	$default_sidebar='instructor-listing';
	if ($edupress_options['edupress_instructorlisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_instructorlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_instructorlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
	
}
elseif( is_page_template( 'uni-page-templates/tpl-our-techers.php' ))
{
	$default_sidebar='instructor-listing';
	if ($edupress_options['edupress_instructorlisting_layout'] == '1') {
		$sidebar_enable=false;
    } 
	elseif($edupress_options['edupress_instructorlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    }
	elseif($edupress_options['edupress_instructorlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}
elseif( is_page_template( 'uni-page-templates/tpl-courses.php' ) || is_post_type_archive('course') )
{
	$default_sidebar='course-listing';
	if ($edupress_options['edupress_courselisting_layout'] == '1') {
		$sidebar_enable=false;
	} elseif($edupress_options['edupress_courselisting_layout'] == '2') {
		$sidebar_enable=true;
		$default_layout=" pull-left";
	} elseif($edupress_options['edupress_courselisting_layout'] == '3') {
		$sidebar_enable=true;
		$default_layout=" pull-right";
	}
	
	
}elseif(is_array($wp->query_vars) && array_key_exists( 'instructor_username', $wp->query_vars ))
{
	$default_sidebar='course-instructor';
	if ($edupress_options['edupress_courseinstructor_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_courseinstructor_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_courseinstructor_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif(is_singular('event'))
{
	$default_sidebar='event-detail';
	if ($edupress_options['edupress_eventdetail_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_eventdetail_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_eventdetail_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif(is_post_type_archive('event') || is_page_template( 'page-templates/tpl-events.php' ))
{
	$default_sidebar='event-listing';
	if ($edupress_options['edupress_eventlisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_eventlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_eventlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}
elseif(is_post_type_archive('campus') || is_page_template( 'uni-page-templates/tpl-campus.php' ))
{
	$default_sidebar='campus-listing';
	if ($edupress_options['edupress_eventlisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_eventlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_eventlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}
elseif( is_singular( 'campus' ) )
{
	$default_sidebar='campus-detail';
	if ($edupress_options['edupress_campusdetail_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_campusdetail_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_campusdetail_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}
elseif( is_singular( 'post' ) )
{
	$default_sidebar='blog-detail';
	if ($edupress_options['edupress_blogdetail_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($edupress_options['edupress_blogdetail_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($edupress_options['edupress_blogdetail_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}
elseif( (is_archive() && is_post_type_archive( 'post' ) ) || is_home())
{
	$default_sidebar='blog-listing';
	if ( !empty( $edupress_options['edupress_bloglisting_layout'] ) && $edupress_options['edupress_bloglisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif(!empty( $edupress_options['edupress_bloglisting_layout'] ) &&  $edupress_options['edupress_bloglisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif( !empty( $edupress_options['edupress_bloglisting_layout'] ) &&  $edupress_options['edupress_bloglisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}
elseif ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout())  || (function_exists('is_account_page') && is_account_page())  )
	$sidebar_enable=false;
}

if ( ! is_active_sidebar( $default_sidebar ) || ! $sidebar_enable) {
	return;
}
?>

<div id="secondary" class="widget-area col-xs-12 col-sm-4<?php echo esc_attr($default_layout);?>" role="complementary">
	<?php dynamic_sidebar( $default_sidebar ); ?>
</div><!-- #secondary -->
