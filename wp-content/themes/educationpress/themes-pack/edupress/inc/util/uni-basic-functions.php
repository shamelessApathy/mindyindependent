<?php
require_once( get_template_directory() . '/inc/util/uni-functions.php' );
/*
 * Dynamic CSS
 */
require_once( get_template_directory() . '/assets/css/uni-dynamic-css.php' );
if( !function_exists('edupress_page_layout') ) {
	function edupress_page_layout($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if($edupress_options[$layout_key] == '2') {
			$default_layout=" col-sm-8 pull-right";
		} 
		elseif($edupress_options[$layout_key] == '3') {
			$default_layout=" col-sm-8 pull-left";
		}
		
		return $default_layout;
	}
}
if( !function_exists('edupress_column_class') ) {
	function edupress_column_class($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		
		if( ( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' ) && edupress_university_is_product_archive_template() ) {
			if( edupress_university_is_product_page_template( 'page-templates/tpl-courses-grid-3-col.php' ) )
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
		
		if( $layout_key == 'edupress_courselisting_layout' ||  $layout_key == 'edupress_searchcourse_layout' &&  !edupress_university_is_product_archive_template())
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


function edupress_university_get_author_link() {
	global $edupress_options;
	$author_display_name = get_the_author();
	
	$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	return '<a href="'.home_url('/'.$edupress_university_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
}


function edupress_university_get_instructor_link( $author_display_name ) {
	global $edupress_options;
	
	$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	return '<a href="'.home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
}
/*
 * For getting instructors
 */
function edupress_university_get_course_instructors( $post_id = '') {
	if( $post_id == '') {
		global $post;
		$post_id = $post->ID;
	}
	$post_id = intval( $post_id );
	$instructors_id = get_post_meta( $post_id, 'edupress_university_course_instructors', true );
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


// returns a love count for a post
function edupress_university_li_get_love_count($post_id) {
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		return $love_count;
	return 0;
}
// adds the loved ID to the users meta so they can't love it again
function edupress_university_li_store_unloved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) 
	{
		$key=array_search($post_id,$loved);
		unset($loved[$key]);
		update_user_option($user_id, 'li_user_loves', $loved);

	}
}
// adds the loved ID to the users meta so they can't love it again
function edupress_university_li_store_loved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved)) {
		$loved[] = $post_id;
	} else {
		$loved = array($post_id);
	}
	update_user_option($user_id, 'li_user_loves', $loved);
}

// increments a love count
function edupress_university_li_mark_post_as_loved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count + 1;
	else
		$love_count = 1;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		edupress_university_li_store_loved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}


// increments a love count
function edupress_university_li_mark_post_as_unloved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count - 1;
	else
		$love_count = 0;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		edupress_university_li_store_unloved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}


// processes the ajax request
function edupress_university_li_process_love() {
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce($_POST['love_it_nonce'], 'love-it-nonce') ) {
		
		if($_POST['liketype']=='like')
		{
			if(edupress_university_li_mark_post_as_loved($_POST['item_id'], $_POST['user_id'])) {
				echo esc_html('loved');
			} else {
				echo esc_html('failed');
			}
		}else if($_POST['liketype']=='unlike'){
			if(edupress_university_li_mark_post_as_unloved($_POST['item_id'], $_POST['user_id'])) {
				echo esc_html('unloved');
			} else {
				echo esc_html('failed');
			}
		}
	}
	die();
}
add_action('wp_ajax_edupress_university_love_it', 'edupress_university_li_process_love');
// outputs the love it link
function edupress_university_li_love_link($love_text = null, $loved_text = null) {

	global $user_ID, $post;

	// only show the link when user is logged in and on a singular page
	if( is_user_logged_in() ) {

	
		// retrieve the total love count for this item
		$love_count = edupress_university_li_get_love_count( $post->ID );
		
		
			$love_text = is_null( $love_text ) ? esc_html__( 'Wishlist', 'edupress' ) : $love_text;
			
			// only show the Love It link if the user has NOT previously loved this item
			if( ! edupress_university_li_user_has_loved_post( $user_ID, get_the_ID() ) ) {
				//href="#" 
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" class="love-it fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart-o"></i> <span>' . esc_html($love_count) . '</span></a>';
			} else {
				// show a message to users who have already loved this item
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" href="#" class="loved fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart"></i> <span>' . esc_html($love_count) . '</span></a>';
			}
		
	}
}


// check whether a user has loved an item
function edupress_university_li_user_has_loved_post($user_id, $post_id) {

	// get all item IDs the user has loved
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) {
		return true; // user has loved post
	}
	return false; // user has not loved post
}



// check whether a user has loved an item
function edupress_university_get_instructors_id_of_course() {
	global $wpdb;
	
	$author_ids = $wpdb->get_var(  $wpdb->prepare(
  "SELECT GROUP_CONCAT(meta_value) FROM $wpdb->postmeta WHERE meta_key=%s AND post_id IN (SELECT ID FROM $wpdb->posts WHERE post_type=%s AND post_status=%s)",
  'edupress_university_course_instructors',
  'course', // an unescaped string 
  'publish' ) );
 
  
    $author_ids_array = (array) explode(',', $author_ids);
	
	$author_ids_array = array_filter($author_ids_array);
	array_map( 'absint', $author_ids_array);
  
	return $author_ids_array;
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


function edupress_university_course_search_form($title, $desc, $placeholder, $cat_selection, $button_text, $def_search_text = '', $def_cat = '') 
{?>
    <section class="search-univ"> 
        <div class="container">
            <div class="row widget">
                <header><h3><?php echo esc_html($title);?></h3></header>
                <p><?php echo esc_html($desc);?></p>
                
                <form id="search" class="form-inline" action="<?php echo home_url();?>" method="get">
                    <input name="s"  id="s" type="text" class="form-control" placeholder="<?php echo esc_attr($placeholder);?>" value="<?php echo $def_search_text;?>">
                    <?php
                    if( !empty($cat_selection) && $cat_selection == 'yes') :
                    $terms = get_terms( 'course-category', array(
                        'hide_empty' => false,
                    ) );
                    ?>
                    <select name="course-category" class="selectpicker">
                          <option value="">Select Course</option>
                          <?php 
                          foreach($terms as $term):
                          ?>
                          <option value="<?php echo esc_attr( $term->term_id );?>" <?php selected( $term->term_id,  $def_cat, true); ?>><?php echo esc_html( $term->name );?></option>
                          <?php 
                          endforeach;
                          ?>
                    </select>
                  <?php
                  endif;
                  ?>
                  
                   <input type="hidden" name="post_type" value="course" />
                        
                   <button class="btn btn-medium btn-blue" type="submit"><i class="fa fa-search"></i><?php echo esc_html($button_text);?></button>
    
                </form>
             </div> <!--row #end  -->
           </div><!--container #end  -->
    </section> 	
<?php
}
/*
 * For getting instructors name with link
 */

function edupress_university_get_instructors_name_with_link( $post_id = '') {
	if( $post_id == '') {
		global $post;
		$post_id = $post->ID;
	}
	$post_id = intval( $post_id );
	$instructors_id = get_post_meta( $post_id, 'edupress_university_course_instructors', true );
	$instructors_id_array = (array) explode(',', $instructors_id);
	$instructors_id_array = array_filter( $instructors_id_array );
	array_map( 'absint', $instructors_id_array );
	
	$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						
	$instructos_name_array = array();
	foreach( $instructors_id_array as $instructor_id) {
		$user  = get_user_by( 'ID',  intval($instructor_id) );
		$author_display_name = $user->data->display_name;
		if( !empty( $author_display_name ) ) {
			$instructos_name_array[] =  '<a href="'.home_url('/'.$edupress_university_instructor_slug.'/'.$author_display_name).'">'. $author_display_name.'</a>';
		}
	}
	
	$instructor_str = implode( ', ', $instructos_name_array );
	return $instructor_str;
}
