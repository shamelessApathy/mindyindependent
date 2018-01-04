<?php
require_once( get_template_directory() . '/inc/util/kid-functions.php' );
/*
 * Dynamic CSS
 */
$edupress_is_tmpl_dynamic_css = true;
if( is_child_theme() )
{
	$edupress_child_dynamic_file = get_stylesheet_directory() . '/assets/css/kid-dynamic-css.php'; 
	if( file_exists( $edupress_child_dynamic_file ) )
	{
		require_once ( $edupress_child_dynamic_file );
		$edupress_is_tmpl_dynamic_css = false;	
	}
}
if( $edupress_is_tmpl_dynamic_css )
{
	require_once( get_template_directory() . '/assets/css/kid-dynamic-css.php' );
}


if( !function_exists('edupress_page_layout') ) {
	function edupress_page_layout($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && edupress_kid_is_product_archive_template() ) {
			if( edupress_kid_is_product_page_template( 'kid-page-templates/tpl-classes-grid-3-col.php' ) )
				$default_layout=" col-sm-9  pull-left three-column";
			else
				$default_layout=" col-sm-8 pull-left";
		}
		elseif ($edupress_options[$layout_key] == '1') {
			$default_layout="";
		} 
		elseif($edupress_options[$layout_key] == '2') {
			if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout=" col-sm-9  pull-right three-column";
			else
				$default_layout=" col-sm-8 pull-right";
		} 
		elseif($edupress_options[$layout_key] == '3') {
			if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout=" col-sm-9 pull-left three-column";
			else
				$default_layout=" col-sm-8 pull-left";
		}
		
		return $default_layout;
	}
}


function edupress_kid_is_product_archive_template() {
	return function_exists( 'edupress_kid_is_product_page_template') && is_post_type_archive( 'product' ) && edupress_kid_is_product_page_template( array('kid-page-templates/tpl-classes-grid-2-col.php','kid-page-templates/tpl-classes-grid-3-col.php','kid-page-templates/tpl-classes-list.php' ) );	
}

function edupress_kid_is_product_page_template( $template = '' ) {
	$id = get_queried_object_id();
    $page_template = get_post_meta( $id, '_wp_page_template', true );
	
	//$base_template_name =  get_page_template_slug( $page_id ) ;
 
    if ( empty( $template ) )
        return (bool) $page_template;
 
    if ( $template == $page_template )
        return true;
 
    if ( is_array( $template ) ) {
        if ( ( in_array( 'default', $template, true ) && ! $page_template )
            || in_array( $page_template, $template, true )
        ) {
            return true;
        }
    }
 
    return ( 'default' === $template && ! $page_template );
}

if( !function_exists('edupress_column_class') ) {
	function edupress_column_class($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if( ( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' ) && edupress_kid_is_product_archive_template() ) {
			if( edupress_kid_is_class_page_template( 'kid-page-templates/tpl-classes-grid-3-col.php' ) )
				$default_layout="col-sm-4 with-sidebar three-column";
			else
				$default_layout="col-sm-6 with-sidebar two-column";
		}
		elseif ($edupress_options[$layout_key] == '1') {
			if( ( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' ) && $edupress_options['edupress_grid_item_count']==2 )
			{
				$default_layout="col-sm-6 ";
			}		
			else
			{	
				
				$default_layout="col-sm-4";
			}
			
		} elseif($edupress_options[$layout_key] == '2') {
			if( ( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout="col-sm-4";
			else
				$default_layout="col-sm-6";
		} elseif($edupress_options[$layout_key] == '3') {
			if( ( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout="col-sm-4";
			else
				$default_layout="col-sm-6";
		}
		
		if( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' &&  ! isset( $GLOBALS['wp_query']->queried_object->ID ))
		{
			if($edupress_options[$layout_key] == '2' || $edupress_options[$layout_key] == '3')
				$default_layout .= " with-sidebar";
			else
				$default_layout .= " without-sidebar";
				
			if($edupress_options['edupress_grid_item_count']==2)
				$default_layout .= " two-column";
			else
				$default_layout .= " three-column";
		}	
		return $default_layout;
	}
}


function edupress_kid_format_currency( $price ) {
	global $edupress_options;
	
	switch( $edupress_options['edupress_class_currency_position'] ){
		case 'left':	
			$price_with_currency = $edupress_options['edupress_class_currency_symbol'].$price;			
			break;
		case 'right':	
			$price_with_currency = $price.$edupress_options['edupress_class_currency_symbol'];						
			break;
		case 'left_with_space':	
			$price_with_currency = $edupress_options['edupress_class_currency_symbol'].' '.$price;			
			break;
		case 'right_with_space':	
			$price_with_currency = $price.' '.$edupress_options['edupress_class_currency_symbol'];						
			break;
		default:
			$price_with_currency = $edupress_options['edupress_class_currency_symbol'].$price;			
	}
	return $price_with_currency;
}



function edupress_kid_get_author_link() {
	global $edupress_options;
	$author_display_name = get_the_author();
	
	$edupress_kid_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	return '<a href="'.home_url('/'.$edupress_kid_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
}



function edupress_kid_get_instructor_link( $author_display_name ) {
	global $edupress_options;
	
	$edupress_kid_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	return '<a href="'.home_url('/'.$edupress_kid_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
}


// check whether a user has loved an item
function edupress_kid_get_instructors_id_of_class() {
	global $wpdb;
	
	$author_ids = $wpdb->get_var(  $wpdb->prepare(
  "SELECT GROUP_CONCAT(meta_value) FROM $wpdb->postmeta WHERE meta_key=%s AND post_id IN (SELECT ID FROM $wpdb->posts WHERE post_type=%s AND post_status=%s)",
  'edupress_kid_course_instructors',
  'course', // an unescaped string 
  'publish' ) );
 
  
    $author_ids_array = (array) explode(',', $author_ids);
	
	$author_ids_array = array_filter($author_ids_array);
	array_map( 'absint', $author_ids_array);
  
	return $author_ids_array;
}

/*
 * For getting instructors
 */
function edupress_kid_get_class_instructors( $post_id = '') {
	if( $post_id == '') {
		global $post;
		$post_id = $post->ID;
	}
	$post_id = intval( $post_id );
	$instructors_id = get_post_meta( $post_id, 'edupress_kid_class_instructors', true );
	$instructors_id_array = (array) explode(',', $instructors_id);
	$instructors_id_array = array_filter( $instructors_id_array );
	array_map( 'absint', $instructors_id_array );
	
	$ret_instructos_array = array();
	foreach( $instructors_id_array as $instructor_id) {
		$temp_user = get_user_by( 'ID',  intval($instructor_id) );
		$ret_instructos_array[]  = $temp_user->data;
	}
	
	
	return $ret_instructos_array;
}

/*
 * For getting instructors name with link
 */
function edupress_kid_get_instructors_name_with_link( $post_id = '') {
	if( $post_id == '') {
		global $post;
		$post_id = $post->ID;
	}
	$post_id = intval( $post_id );
	$instructors_id = get_post_meta( $post_id, 'edupress_kid_class_instructors', true );
	$instructors_id_array = (array) explode(',', $instructors_id);
	$instructors_id_array = array_filter( $instructors_id_array );
	array_map( 'absint', $instructors_id_array );
	
	$edupress_kid_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	$instructos_name_array = array();
	foreach( $instructors_id_array as $instructor_id) {
		$user  = get_user_by( 'ID',  intval($instructor_id) );
		$author_display_name = $user->data->display_name;
		if( !empty( $author_display_name ) ) {
			$instructos_name_array[] =  '<a href="'.home_url('/'.$edupress_kid_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
		}
	}
	
	$instructor_str = implode( ', ', $instructos_name_array );
	return $instructor_str;
}


if ( ! function_exists( 'edupress_kid_page_title' ) ) {

	/**
	 * woocommerce_page_title function.
	 *
	 * @param  bool $echo
	 * @return string
	 */
	function edupress_kid_page_title( $echo = true ) {

		if ( is_search() ) {
			$page_title = sprintf( __( 'Search Results: &ldquo;%s&rdquo;', 'edupress' ), get_search_query() );

			if ( get_query_var( 'paged' ) )
				$page_title .= sprintf( __( '&nbsp;&ndash; Page %s', 'edupress' ), get_query_var( 'paged' ) );

		} elseif ( is_tax() ) {

			$page_title = single_term_title( "", false );

		} else {

			$shop_page_id = wc_get_page_id( 'shop' );
			$page_title   = get_the_title( $shop_page_id );
		}

		$page_title = apply_filters( 'woocommerce_page_title', $page_title );

		if ( $echo )
			echo $page_title;
		else
			return $page_title;
	}
}

function edupress_instructor_numeric_posts_nav( $navigation_id = '',$total_page=0 ) {
		global $wp_query, $paged;
		/** Stop execution if there's only 1 page */
		if ( $total_page <= 1 ) {
			return;
		}

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		$max = $total_page;

		/**    Add current page to the array */
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}

		/**    Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		if ( $navigation_id != '' ) {
			$id = 'id="' . $navigation_id . '"';
		} else {
			$id = '';
		}

		echo '<div class="navigation" ' . $id . '><ul>' . "\n";

		/**    Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<span class="meta-nav">&larr;</span>' ) );
		}

		/**    Link to first page, plus ellipses if necessary */
		if ( !in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( !in_array( 2, $links ) ) {
				echo '<li>&hellip;</li>';
			}
		}

		/**    Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/**    Link to last page, plus ellipses if necessary */
		if ( !in_array( $max, $links ) ) {
			if ( !in_array( $max - 1, $links ) ) {
				echo '<li>&hellip;</li>' . "\n";
			}

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/**    Next Post Link */
		if ( get_next_posts_link() ) {
			printf( '<li>%s</li>' . "\n", get_next_posts_link( '<span class="meta-nav">&rarr;</span>' ) );
		}

		echo '</ul></div>' . "\n";
}
