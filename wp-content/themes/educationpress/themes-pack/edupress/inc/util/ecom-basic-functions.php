<?php
/*
 * Dynamic CSS
 */
require_once( get_template_directory() . '/inc/util/ecom-functions.php' );



$edupress_is_tmpl_dynamic_css = true;
if( is_child_theme() )
{
	$edupress_child_dynamic_file = get_stylesheet_directory() . '/assets/css/ecom-dynamic-css.php'; 
	if( file_exists( $edupress_child_dynamic_file ) )
	{
		require_once ( $edupress_child_dynamic_file );
		$edupress_is_tmpl_dynamic_css = false;	
	}
}
if( $edupress_is_tmpl_dynamic_css )
{
	require_once( get_template_directory() . '/assets/css/ecom-dynamic-css.php' );
}

if( !function_exists('edupress_page_layout') ) {
	function edupress_page_layout($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && edupress_ecommerce_is_product_archive_template() ) {
			if( edupress_ecommerce_is_product_page_template( 'ecom-page-templates/tpl-course-grid-3-col.php' ) )
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
/*
if( !function_exists('edupress_column_class') ) {
	function edupress_column_class($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if ($edupress_options[$layout_key] == '1') {
			$default_layout="col-sm-4";
		} elseif($edupress_options[$layout_key] == '2') {
			$default_layout="col-sm-6";
		} elseif($edupress_options[$layout_key] == '3') {			
			$default_layout="col-sm-6";
		}
		
		if( $layout_key == 'edupress_classlisting_layout' ||  $layout_key == 'edupress_searchclass_layout' &&  !edupress_ecommerce_is_product_archive_template())
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
*/
if( !function_exists('edupress_column_class') ) {
	function edupress_column_class($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchclass_layout' ) && edupress_ecommerce_is_product_archive_template() ) {
			if( edupress_ecommerce_is_product_page_template( 'ecom-page-templates/tpl-courses-grid-3-col.php' ) )
				$default_layout="col-sm-4 with-sidebar three-column";
			else
				$default_layout="col-sm-6 with-sidebar two-column";
		}
		elseif ($edupress_options[$layout_key] == '1') {
			if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && $edupress_options['edupress_grid_item_count']==2 )
			{
				$default_layout="col-sm-6 ";
			}		
			else
			{	
				
				$default_layout="col-sm-4";
			}
			
		} elseif($edupress_options[$layout_key] == '2') {
			if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout="col-sm-4";
			else
				$default_layout="col-sm-6";
		} elseif($edupress_options[$layout_key] == '3') {
			if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && $edupress_options['edupress_grid_item_count']==3 )
				$default_layout="col-sm-4";
			else
				$default_layout="col-sm-6";
		}
		
		if( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' &&  !edupress_ecommerce_is_product_archive_template())
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


function edupress_ecommerce_get_author_link() {
	global $edupress_options;
	$author_display_name = get_the_author();
	
	$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	return '<a href="'.home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
}

// returns a love count for a post
function edupress_ecommerce_li_get_love_count($post_id) {
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		return $love_count;
	return 0;
}
// adds the loved ID to the users meta so they can't love it again
function edupress_ecommerce_li_store_unloved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) 
	{
		$key=array_search($post_id,$loved);
		unset($loved[$key]);
		update_user_option($user_id, 'li_user_loves', $loved);

	}
}

// adds the loved ID to the users meta so they can't love it again
function edupress_ecommerce_li_store_loved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved)) {
		$loved[] = $post_id;
	} else {
		$loved = array($post_id);
	}
	update_user_option($user_id, 'li_user_loves', $loved);
}

// increments a love count
function edupress_ecommerce_li_mark_post_as_loved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count + 1;
	else
		$love_count = 1;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		edupress_ecommerce_li_store_loved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}


// increments a love count
function edupress_ecommerce_li_mark_post_as_unloved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count - 1;
	else
		$love_count = 0;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		edupress_ecommerce_li_store_unloved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}



// processes the ajax request
function edupress_ecommerce_li_process_love() {
	
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce($_POST['love_it_nonce'], 'love-it-nonce') ) {
		
		if($_POST['liketype']=='like')
		{
			if(edupress_ecommerce_li_mark_post_as_loved($_POST['item_id'], $_POST['user_id'])) {
			
				echo esc_html('loved');
			} else {
				echo esc_html('failed');
			}
		}else if($_POST['liketype']=='unlike'){
			if(edupress_ecommerce_li_mark_post_as_unloved($_POST['item_id'], $_POST['user_id'])) {
				echo esc_html('unloved');
			} else {
				echo esc_html('failed');
			}
		}
	}
	die();
}
add_action('wp_ajax_edupress_ecommerce_love_it', 'edupress_ecommerce_li_process_love');
// outputs the love it link
function edupress_ecommerce_li_love_link($love_text = null, $loved_text = null) {

	global $user_ID, $post;

	// only show the link when user is logged in and on a singular page
	if( is_user_logged_in() ) {

	
		// retrieve the total love count for this item
		$love_count = edupress_ecommerce_li_get_love_count( $post->ID );
		
		
			$love_text = is_null( $love_text ) ? esc_html__( 'Wishlist', 'edupress' ) : $love_text;
			
			// only show the Love It link if the user has NOT previously loved this item
			if( ! edupress_ecommerce_li_user_has_loved_post( $user_ID, get_the_ID() ) ) {
				//href="#" 
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" class="love-it fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart-o"></i> <span>' . esc_html($love_count) . '</span></a>';
			} else {
				// show a message to users who have already loved this item
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" href="#" class="loved fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart"></i> <span>' . esc_html($love_count) . '</span></a>';
			}
		
	}
}


// check whether a user has loved an item
function edupress_ecommerce_li_user_has_loved_post($user_id, $post_id) {

	// get all item IDs the user has loved
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) {
		return true; // user has loved post
	}
	return false; // user has not loved post
}



// check whether a user has loved an item
function edupress_ecommerce_get_author_id_of_product() {
	global $wpdb;
	$sql =  
	$author_ids = $wpdb->get_col(  $wpdb->prepare(
  "SELECT post_author FROM $wpdb->posts WHERE post_type=%s AND post_status=%s",
  'product', // an unescaped string 
  'publish' ) );
	return $author_ids;
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





