<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package educationpress
 */
global $educationpress_options,$wp;

$default_layout='';
$sidebar_enable=true;
$default_sidebar='sidebar-1';

if ( is_search() )
{
	if(!empty($_GET['post-type']) && $_GET['post-type']=='course')
	{
		$default_sidebar='search-course-listing';
		if ($educationpress_options['educationpress_searchcourse_layout'] == '1') {
			$sidebar_enable=false;
		} elseif($educationpress_options['educationpress_searchcourse_layout'] == '2') {
			$sidebar_enable=true;
			if( $educationpress_options['educationpress_grid_item_count']==3 )
				$default_layout=" pull-left col-sm-3";
			else
				$default_layout=" pull-left";
		} elseif($educationpress_options['educationpress_searchcourse_layout'] == '3') {
			$sidebar_enable=true;
			if( $educationpress_options['educationpress_grid_item_count']==3 )
				$default_layout=" pull-right col-sm-3";
			else
				$default_layout=" pull-right";
		}
	
	}
	else
	{
		$default_sidebar='search-listing';
		if ($educationpress_options['educationpress_search_layout'] == '1') {
			$sidebar_enable=false;
		} elseif($educationpress_options['educationpress_search_layout'] == '2') {
			$sidebar_enable=true;
			$default_layout=" pull-left";
		} elseif($educationpress_options['educationpress_search_layout'] == '3') {
			$sidebar_enable=true;
			$default_layout=" pull-right";
		}
	}
	
	
}elseif(is_author())
{
	$default_sidebar='blog-author';
	if ($educationpress_options['educationpress_blogauthor_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_blogauthor_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_blogauthor_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif( is_page_template( 'page-templates/tpl-our-techers.php' ))
{
	$default_sidebar='instructor-listing';
	if ($educationpress_options['educationpress_instructorlisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_instructorlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_instructorlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
	
}
elseif( is_post_type_archive('course') || is_page_template( 'page-templates/tpl-courses.php' ) ||  is_page_template( 'page-templates/tpl-courses-list.php') || is_page_template( 'page-templates/tpl-courses-grid-3-col.php' ) || is_page_template( 'page-templates/tpl-courses-grid-2-col.php') )
{
	$default_sidebar='course-listing';
	if(is_post_type_archive('course') || is_page_template( 'page-templates/tpl-courses.php' ) ) {
		if ($educationpress_options['educationpress_courselisting_layout'] == '1') {
			$sidebar_enable=false;
		} elseif($educationpress_options['educationpress_courselisting_layout'] == '2') {
			$sidebar_enable=true;
			if( $educationpress_options['educationpress_grid_item_count']==3 )
				$default_layout=" pull-left col-sm-3";
			else
				$default_layout=" pull-left";
		} elseif($educationpress_options['educationpress_courselisting_layout'] == '3') {
			$sidebar_enable=true;
			if( $educationpress_options['educationpress_grid_item_count']==3 )
				$default_layout=" pull-right col-sm-3";
			else
				$default_layout=" pull-right";
		}
	} elseif( is_page_template( 'page-templates/tpl-courses-grid-3-col.php' ) ) {
		$default_layout=" pull-right col-sm-3";
	}
	else {
		$default_layout=" pull-right";
	}
	
}
elseif(is_array($wp->query_vars) && array_key_exists( 'course_completion', $wp->query_vars ))
{
	$sidebar_enable=false;
}
elseif(get_query_var('instructor'))
{
	$default_sidebar='course-instructor';
	if ($educationpress_options['educationpress_courseinstructor_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_courseinstructor_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_courseinstructor_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif(is_singular('event'))
{
	$default_sidebar='event-detail';
	if ($educationpress_options['educationpress_eventdetail_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_eventdetail_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_eventdetail_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}elseif(is_post_type_archive('event') || is_page_template( 'page-templates/tpl-events.php' ))
{
	$default_sidebar='event-listing';
	if ($educationpress_options['educationpress_eventlisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_eventlisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_eventlisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}

elseif( is_singular( 'post' ) )
{

	$default_sidebar='blog-detail';
	if ($educationpress_options['educationpress_blogdetail_layout'] == '1') {
		$sidebar_enable=false;
    } elseif($educationpress_options['educationpress_blogdetail_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif($educationpress_options['educationpress_blogdetail_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
	
}

elseif( (is_archive() && is_post_type_archive( 'post' ) ) || is_home())
{
	$default_sidebar='blog-listing';
	if ( !empty( $educationpress_options['educationpress_bloglisting_layout'] ) && $educationpress_options['educationpress_bloglisting_layout'] == '1') {
		$sidebar_enable=false;
    } elseif(!empty( $educationpress_options['educationpress_bloglisting_layout'] ) &&  $educationpress_options['educationpress_bloglisting_layout'] == '2') {
        $sidebar_enable=true;
		$default_layout=" pull-left";
    } elseif( !empty( $educationpress_options['educationpress_bloglisting_layout'] ) &&  $educationpress_options['educationpress_bloglisting_layout'] == '3') {
        $sidebar_enable=true;
		$default_layout=" pull-right";
    }
}
elseif( (is_array($wp->query_vars) &&  isset($wp->query_vars['page_id']) && $wp->query_vars['page_id'] == -1)
			||
		( is_page_template( array( 'student-login.php', 'student-signup.php', 'student-login.php' ) ) )

 )
{
	$sidebar_enable=false;
	
}


if ( ! is_active_sidebar( $default_sidebar ) || ! $sidebar_enable) {
	return;
}
?>

<div id="secondary" class="widget-area col-xs-12 col-sm-4<?php echo esc_attr($default_layout);?>" role="complementary">
	<?php dynamic_sidebar( $default_sidebar ); ?>
</div><!-- #secondary -->
