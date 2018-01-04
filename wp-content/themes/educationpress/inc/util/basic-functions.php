<?php
/*
 * This file contains basic utility functions used throughout the theme
 */

if ( ! function_exists( 'educationpress_theme_comment' ) ) {
    /**
     * Theme Custom Comment Template
     */
    function educationpress_theme_comment( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="pingback">
                    <p><?php esc_html_e('Pingback:', 'educationpress'); ?> <?php comment_author_link(); ?><?php edit_comment_link(esc_html__('(Edit)', 'educationpress'), ' '); ?></p>
                </li>
                <?php
                break;

            default :
                ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment-body">

                    <div class="author-photo">
                        <a class="avatar" href="<?php comment_author_url(); ?>">
                            <?php echo get_avatar( $comment, 68 ); ?>
                        </a>
                    </div>

                    <div class="comment-wrapper">
                        <div class="comment-meta">
                            <div class="comment-author vcard">
                                <h5 class="fn"><?php echo get_comment_author_link(); ?></h5>
                            </div>
                            
                        </div>

                        <div class="comment-content">
                            <?php comment_text(); ?>
                        </div>
                        
                        <div class="comment-metadata">
                                <time datetime="<?php comment_time('c'); ?>"><?php printf( esc_html__( '%1$s', 'educationpress' ), get_comment_date() ); ?> 
                                <small>.</small>
								<?php printf( _x( '%s ago', '%s = human-readable time difference', 'educationpress' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
                        </div>

                        <div class="reply">
                        	
                            <?php comment_reply_link( array_merge( array( 'before' => '' ), array( 'depth' => $depth , 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div>
                    </div>

                </article>
                <!-- end of comment -->
                <?php
                break;

        endswitch;
    }
}


/**
 * header menu (should you choose to use one)
 */
function educationpress_header_menu() {
  // display the WordPress Custom Menu if available
  if ( is_user_logged_in() ) {
	  if ( has_nav_menu( 'primary' ) ) 
	  {
		  wp_nav_menu(array(
			'theme_location'    => 'primary',
			//'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		  ));
	  }
  }else{
	  if ( has_nav_menu( 'visiter' ) ) 
	  {
		   wp_nav_menu(array(
			'theme_location'    => 'visiter',
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		  ));
	  }
  }
} /* end header menu */
 


/**
 * Numeric pagination
 */
function educationpress_numeric_posts_nav( $navigation_id = '' ) {

		if ( is_singular() ) {
			return;
		}

		global $wp_query, $paged;
		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;


		$max = intval( $wp_query->max_num_pages );

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

function educationpress_instructor_numeric_posts_nav( $navigation_id = '',$total_page=0 ) {

	
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


function educationpress_add_profile_fields( $user_contact_methods ) {

        $user_contact_methods[ 'job_title' ]        = esc_html__( 'Job Title', 'educationpress' );
		$user_contact_methods[ 'mob_num' ]        = esc_html__( 'Mobile', 'educationpress' );
        $user_contact_methods[ 'facebook_url' ]     = esc_html__( 'Facebook URL', 'educationpress' );
        $user_contact_methods[ 'twitter_url' ]      = esc_html__( 'Twitter URL', 'educationpress' );
        $user_contact_methods[ 'google_plus_url' ]  = esc_html__( 'Google Plus URL', 'educationpress' );
        $user_contact_methods[ 'linkedin_url' ]     = esc_html__( 'LinkedIn URL', 'educationpress' );
		$user_contact_methods[ 'pinterest_url' ]    = esc_html__( 'Pinterest URL', 'educationpress' );
        $user_contact_methods[ 'instagram_url' ]    = esc_html__( 'Instagram URL', 'educationpress' );
		$user_contact_methods[ 'youtube_url' ]    = esc_html__( 'Youtube URL', 'educationpress' );

        return $user_contact_methods;
}
add_filter( 'user_contactmethods', 'educationpress_add_profile_fields' );

function educationpress_course_enrollment_button($sanitized, $class, $fallback)
{
	
	
		
	return $class;
}

add_filter( 'sanitize_html_class', 'educationpress_course_enrollment_button',10,3 );

function educationpress_page_layout($layout_key)
{
	 
	global $educationpress_options;
	
	$default_layout="";
	if ($educationpress_options[$layout_key] == '1') {
	$default_layout="";
    } elseif($educationpress_options[$layout_key] == '2' ) {
		if( ( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout' ) && $educationpress_options['educationpress_grid_item_count']==3 )
			$default_layout=" col-sm-9  pull-right three-column";
		else
			$default_layout=" col-sm-8 pull-right";
    } elseif($educationpress_options[$layout_key] == '3') {
		if( ( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout' ) && $educationpress_options['educationpress_grid_item_count']==3 )
			$default_layout=" col-sm-9 pull-left three-column";
		else
			$default_layout=" col-sm-8 pull-left";
    }
	
	return $default_layout;
}

function educationpress_column_class($layout_key)
{
	global $educationpress_options;
	$default_layout="";	
	

	
	if ($educationpress_options[$layout_key] == '1') {
		if( ( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout' ) && $educationpress_options['educationpress_grid_item_count']==2 )
		{
			$default_layout="col-sm-6";
		}		
		else
		{	
			
			$default_layout="col-sm-4";
		}
		
    } elseif($educationpress_options[$layout_key] == '2') {
		if( ( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout' ) && $educationpress_options['educationpress_grid_item_count']==3 )
			$default_layout="col-sm-4";
		else
			$default_layout="col-sm-6";
    } elseif($educationpress_options[$layout_key] == '3') {
		if( ( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout' ) && $educationpress_options['educationpress_grid_item_count']==3 )
			$default_layout="col-sm-4";
		else
			$default_layout="col-sm-6";
    }
	
	if( $layout_key == 'educationpress_courselisting_layout' ||  $layout_key == 'educationpress_searchcourse_layout')
	{
		if($educationpress_options[$layout_key] == '2' || $educationpress_options[$layout_key] == '3')
			$default_layout .= " with-sidebar";
		else
			$default_layout .= " without-sidebar";
			
		if($educationpress_options['educationpress_grid_item_count']==2)
			$default_layout .= " two-column";
		else
			$default_layout .= " three-column";
	}	
	
	
	return $default_layout;
}

function add_search_course_soring_dropdown()
{ 
	global $educationpress_options;
	$default_sort =  $educationpress_options[ 'educationpress_coursesearch_default_sort' ] ;?>
	<form name="ads_sort_form" method="get" action="<?php echo home_url();?>" >
	<label><?php esc_html_e('Sort by:', 'educationpress');?></label>
	<?php
	$allquerystring=$_GET;
	foreach( $allquerystring as $key => $value){
	if($key!='c_sort'){
	?>
	<?php 
	if(is_array($value)){
	for ($i=0; $i<count($value); $i++){?>
	<input name="<?php echo esc_attr($key);?>[]" type="hidden"  value="<?php echo esc_attr($value[$i]);?>"  />
	<?php }
	}else{?>
	<input name="<?php echo esc_attr($key);?>" type="hidden"  value="<?php echo esc_attr($value);?>"  />
	<?php } ?>
	<?php
	}}
	educationpress_sort_dropdown( $default_sort ); 
	?>	
	</form>
	<?php
}
function add_course_soring_dropdown()
{ 

global $educationpress_options;
$page_link = "";


if( is_tax( 'course_category' ) ) {
	$term_id = get_queried_object_id();
	$page_link = get_term_link( $term_id, 'course_category' );
} elseif( is_post_type_archive( 'course' ) ) {
	$page_link = home_url('/'.get_option( 'coursepress_course_slug', 'courses' ));		
} 
else {
	global $post;
	$page_link = get_permalink($post->ID);
}

$default_sort =  $educationpress_options[ 'educationpress_courselisting_default_sort' ] ;?>
<form name="ads_sort_form" method="get" action="<?php echo $page_link;?>" >
<label><?php esc_html_e('Sort by:', 'educationpress');?></label>
<?php
$allquerystring=$_GET;
foreach( $allquerystring as $key => $value){
if($key!='c_sort'){
?>
<?php 
if(is_array($value)){
for ($i=0; $i<count($value); $i++){?>
<input name="<?php echo esc_attr($key);?>[]" type="hidden"  value="<?php echo esc_attr($value[$i]);?>"  />
<?php }
}else{?>
<input name="<?php echo esc_attr($key);?>" type="hidden"  value="<?php echo esc_attr($value);?>"  />
<?php } ?>
<?php
}}?>
<?php educationpress_sort_dropdown( $default_sort ); ?>

</form>
<?php
}

function educationpress_sort_dropdown( $default_sort = '' ){
	if( isset( $_GET['c_sort'] ) && !empty( $_GET['c_sort'] ) ) {
		$selected_sort = $_GET['c_sort'];
	}
	else {
		$selected_sort = $default_sort;
	}
	
	?>
    <select name="c_sort" id="c_sort" onchange="submit_sort_form();">
            <option value="popular" <?php if( $selected_sort=="popular"  ){?> selected="selected" <?php }?>><?php esc_html_e('Popularity', 'educationpress');?></option>
            <?php if ( class_exists('RichReviews')) {?>
            <option value="ratings" <?php if( $selected_sort=="ratings"  ){?> selected="selected" <?php }?>><?php esc_html_e('Ratings', 'educationpress');?></option>
            <?php }?>
            <option value="new_first" <?php if( $selected_sort=="new_first"  ){?> selected="selected" <?php }?>><?php esc_html_e('Newest', 'educationpress');?></option>
            <option value="old_first" <?php if( $selected_sort=="old_first"  ){?> selected="selected" <?php }?>><?php esc_html_e('Oldest', 'educationpress');?></option>
            <option value="alphabet_az" <?php if( $selected_sort=="alphabet_az"  ){?> selected="selected" <?php }?>><?php esc_html_e('Name (A-Z)', 'educationpress');?></option>
            <option value="alphabet_za" <?php if( $selected_sort=="alphabet_za"  ){?> selected="selected" <?php }?>><?php esc_html_e('Name (Z-A)', 'educationpress');?></option>
            <option value="plow_high" <?php if( $selected_sort=="plow_high"  ){?> selected="selected" <?php }?>><?php esc_html_e('Price Low To High', 'educationpress');?></option>
            <option value="phigh_low" <?php if( $selected_sort=="phigh_low"  ){?> selected="selected" <?php }?>><?php esc_html_e('Price High To Low', 'educationpress');?></option>
	</select> 
    <?php
}
function educationpress_get_course_average_rating($category,$post_ID) {
		global $wpdb,$richReviews;
		if (!class_exists('RichReviews')) {
			return;
		}
		if ($category == 'none') {
			$whereStatement = "WHERE review_status=\"1\" and (review_category=\"none\" or review_category=\"\")";
		} else if(($category == 'post') || ($category == 'page')) {
			$whereStatement = "WHERE (review_status=\"1\" and post_id=\"$post_ID\")";
		} else if ($category != 'all') {
			$whereStatement = "WHERE (review_status=\"1\" and review_category=\"$category\")";
		} else {
			$whereStatement = "WHERE review_status=\"1\"";
		}
		

		$approvedReviewsCount = educationpress_get_course_approvedReviews($category,$post_ID);
		$averageRating = 0;
		if ($approvedReviewsCount != 0) {
			if ( false === ( $averageRating = get_transient( '_course_avereview_'.$post_ID ) ) ) {
			$averageRating = $wpdb->get_var("SELECT AVG(review_rating) FROM $richReviews->sqltable " . $whereStatement);
			$averageRating = floor(10*floatval($averageRating))/10;
			set_transient( '_course_avereview_'.$post_ID, $averageRating, 60 * 60 * 12);
			}
		}



		return $averageRating;
}

function educationpress_get_course_approvedReviews($category,$post_ID) {
		global $wpdb,$richReviews;
		global $post;
		if (!class_exists('RichReviews')) {
			return;
		}
		if ($category == 'none') {
			$whereStatement = "WHERE review_status=\"1\" and (review_category=\"none\" or review_category=\"\")";
		} else if(($category == 'post') || ($category == 'page')) {
			$whereStatement = "WHERE (review_status=\"1\" and post_id=\"$post_ID\")";
		} else if ($category != 'all') {
			$whereStatement = "WHERE (review_status=\"1\" and review_category=\"$category\")";
		} else {
			$whereStatement = "WHERE review_status=\"1\"";
		}
		
		
		if ( false === ( $approvedReviewsCount = get_transient( '_course_appreview_'.$post_ID ) ) ) {
			$approvedReviewsCount = $wpdb->get_var("SELECT COUNT(*) FROM $richReviews->sqltable " . $whereStatement);
			set_transient( '_course_appreview_'.$post_ID, $approvedReviewsCount, 60 * 60 * 12);
		}

		return $approvedReviewsCount;
}

function educationpress_get_course_star($post_ID,$stars) {
		global $wpdb,$richReviews;
		if (!class_exists('RichReviews')) {
			return;
		}
		$whereStatement = "WHERE (review_status=\"1\" and post_id=\"$post_ID\" and review_rating=\"$stars\")";
		if ( false === ( $approvedReviewsCount = get_transient(  '_course_star_'.$post_ID.'_'.$stars ) ) ) {
		$approvedReviewsCount = $wpdb->get_var("SELECT COUNT(*) FROM $richReviews->sqltable " . $whereStatement);
		set_transient( '_course_star_'.$post_ID.'_'.$stars, $approvedReviewsCount, 60 * 60 * 12);
		}

		return $approvedReviewsCount;
}
if ( !function_exists( 'educationpress_standard_thumbnail' ) ) :
    /**
     * Generate standard thumbnail for this theme
     *
     * @since 1.0.0
     * @param   string  $size
     */
    function educationpress_standard_thumbnail( $size = 'post-thumbnail' ) {

        global $post;

        if ( has_post_thumbnail( $post->ID ) ) :

            if ( is_single() ) :
                $featured_image_id = get_post_thumbnail_id();
                $original_image_url = wp_get_attachment_url( $featured_image_id );
                ?>
               
                    <a  class="fancybox-effects-a" href="<?php echo esc_url( $original_image_url ); ?>" title="<?php the_title(); ?>">
                     <figure>
                        <?php the_post_thumbnail( $size); ?>
						<?php
                        if ( is_sticky() ) {?>
                        <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                        <?php }?>
                      </figure>
                    </a>
               
                <?php
            else :
                ?>
                <figure>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                        <?php the_post_thumbnail( $size); ?>
                    </a>
                </figure>
                <?php
            endif;

        endif;
    }

endif;



if( ! function_exists( 'educationpress_standard_gallery' ) ) :
    /**
     * Get list of gallery images
     *
     * @since 1.0.0
     * @param string $size
     */
    function educationpress_standard_gallery( $size = 'post-thumbnail' ) {

        global $post;

        $gallery_images = educationpress_get_post_meta( 'EDU_PRESS_gallery', array( 'type' => 'image_advanced', 'size' => $size ), $post->ID );

        if( ! empty( $gallery_images ) ) {

            echo '<div id="post-slider" class="carousel slide">';
			if ( is_sticky() ) {
			echo'<div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>';
			}
                echo '<div class="carousel-inner" role="listbox">';
				$ig=0;
                foreach( $gallery_images as $gallery_image ) {
					$ig++;
                    $caption = ( !empty( $gallery_image['caption'] ) ) ? $gallery_image['caption'] : $gallery_image['alt'];
					if($ig==1){
					echo '<div class="item active">';
					}else{
                    echo '<div class="item">';
					}
					echo '<a class="fancybox-effects-a" rel="next" href="' . esc_url( $gallery_image['full_url'] ) . '" title="' . esc_attr($caption) . '" >';
                    echo '<img src="' . esc_url( $gallery_image['url'] ) .'" alt="' . esc_attr($gallery_image['title']) . '" />';
                    echo '</a></div>';
					
                }

                echo '</div>';
		 echo '<a class="left carousel-control" href="#post-slider" role="button" data-slide="prev">';
			 echo '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
			 echo '<span class="sr-only">Previous</span>';
		 echo '</a>';
		 echo '<a class="right carousel-control" href="#post-slider" role="button" data-slide="next">';
			 echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
			 echo '<span class="sr-only">Next</span>';
		 echo '</a>';
            echo '</div>';

        } else if ( has_post_thumbnail( $post->ID ) ) {

            educationpress_standard_thumbnail( $size );

        }

    }

endif;



if( ! function_exists( 'educationpress_get_post_meta' ) ) :
    /**
     * Get post meta
     *
     * @since 1.0.0
     * @param string   $key     Meta key. Required.
     * @param int|null $post_id Post ID. null for current post. Optional
     * @param array    $args    Array of arguments. Optional.
     *
     * @return mixed
     */
    function educationpress_get_post_meta( $key, $args = array(), $post_id = null ) {

        $post_id = empty( $post_id ) ? get_the_ID() : $post_id;
        $args = wp_parse_args( $args, array( 'type' => 'text', 'multiple' => false, ) );

        // Always set 'multiple' true for following field types
        if ( in_array( $args['type'], array('checkbox_list', 'file', 'file_advanced', 'image', 'image_advanced', 'plupload_image', 'thickbox_image') ) ) {
            $args['multiple'] = true;
        }

        $meta = get_post_meta( $post_id, $key, !$args['multiple'] );

        // Get uploaded files info
        if (in_array($args['type'], array('file', 'file_advanced'))) {

            if ( is_array( $meta ) && !empty( $meta ) ) {
                $files = array();
                foreach ($meta as $id) {
                    // Get only info of existing attachments
                    if (get_attached_file($id)) {
                        $files[$id] = educationpress_get_file_info($id);
                    }
                }
                $meta = $files;
            }

        // Get uploaded images info
        } elseif (in_array($args['type'], array('image', 'plupload_image', 'thickbox_image', 'image_advanced'))) {

            if (is_array($meta) && !empty($meta)) {
                $images = array();
                foreach ($meta as $id) {
                    // Get only info of existing attachments
                    if (get_attached_file($id)) {
                        $images[$id] = educationpress_get_file_info($id, $args);
                    }
                }
                $meta = $images;
            }

        // Get terms
        } elseif ('taxonomy_advanced' == $args['type']) {

            if (!empty($args['taxonomy'])) {
                $term_ids = array_map('intval', array_filter(explode(',', $meta . ',')));
                // Allow to pass more arguments to "get_terms"
                $func_args = wp_parse_args(array(
                    'include' => $term_ids,
                    'hide_empty' => false,
                ), $args);
                unset($func_args['type'], $func_args['taxonomy'], $func_args['multiple']);
                $meta = get_terms($args['taxonomy'], $func_args);
            } else {
                $meta = array();
            }

        // Get post terms
        } elseif ( 'taxonomy' == $args['type'] ) {

            $meta = empty( $args['taxonomy'] ) ? array() : wp_get_post_terms( $post_id, $args['taxonomy'] );

        }

        return $meta;
    }

endif;



if( ! function_exists( 'educationpress_get_file_info' ) ) :
    /**
     * Get uploaded file information
     *
     * @since 1.0.0
     * @param int   $file_id Attachment image ID (post ID). Required.
     * @param array $args    Array of arguments (for size).
     *
     * @return array|bool False if file not found. Array of image info on success
     */
    function educationpress_get_file_info( $file_id, $args = array() ) {

        $args = wp_parse_args( $args, array(
            'size' => 'thumbnail',
        ) );

        $img_src = wp_get_attachment_image_src( $file_id, $args['size'] );
        if ( ! $img_src ) {
            return false;
        }

        $attachment = get_post( $file_id );
        $path       = get_attached_file( $file_id );
        return array(
            'ID'          => $file_id,
            'name'        => basename( $path ),
            'path'        => $path,
            'url'         => $img_src[0],
            'width'       => $img_src[1],
            'height'      => $img_src[2],
            'full_url'    => wp_get_attachment_url( $file_id ),
            'title'       => $attachment->post_title,
            'caption'     => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'alt'         => get_post_meta( $file_id, '_wp_attachment_image_alt', true ),
        );
    }

endif;



if ( ! function_exists( 'educationpress_pagination' ) ) :
    /**
     * Output pagination
     *
     * @param $query
     */
    function educationpress_pagination( $query ) {

        echo "<div class='pagination'>";

        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url ( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>',
            'current' => max( 1, get_query_var ( 'paged' ) ),
            'total' => $query->max_num_pages,
        ) );

        echo "</div>";

    }

endif;



if( !function_exists( 'educationpress_excerpt' ) ) {
    /**
     * Output excerpt for given number of words
     * @param int $len
     * @param string $trim
     */
    function educationpress_excerpt( $len=15, $trim = "&hellip;" ) {
        echo get_educationpress_excerpt( $len, $trim );
    }
}



if( !function_exists( 'get_educationpress_excerpt' ) ) {
    /**
     * Return excerpt for given number of words.
     * @param int $len
     * @param string $trim
     * @return string
     */
    function get_educationpress_excerpt( $len=15, $trim = "&hellip;" ) {
        $limit = $len+1;
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        $num_words = count( $excerpt );
        if ( $num_words >= $len ) {
            $last_item = array_pop( $excerpt );
        } else {
            $trim="";
        }
        $excerpt = implode( " ", $excerpt ) . $trim ;
        return $excerpt;
    }
}



if( !function_exists( 'get_educationpress_custom_excerpt' ) ) {
    /**
     * Return excerpt for given number of words from custom contents
     * @param string $contents
     * @param int $len
     * @param string $trim
     * @return array|string
     */
    function get_educationpress_custom_excerpt( $contents, $len = 15, $trim = "&hellip;" ){
        $limit = $len+1;
        $excerpt = explode( ' ', $contents, $limit );
        $num_words = count( $excerpt );
        if( $num_words >= $len ){
            $last_item = array_pop( $excerpt );
        } else {
            $trim = "";
        }
        $excerpt = implode( " ", $excerpt ) . $trim;
        return $excerpt;
    }
}




// check whether a user has loved an item
function educationpress_li_user_has_loved_post($user_id, $post_id) {

	// get all item IDs the user has loved
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) {
		return true; // user has loved post
	}
	return false; // user has not loved post
}


// adds the loved ID to the users meta so they can't love it again
function educationpress_li_store_unloved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) 
	{
		$key=array_search($post_id,$loved);
		unset($loved[$key]);
		update_user_option($user_id, 'li_user_loves', $loved);

	}
}

// adds the loved ID to the users meta so they can't love it again
function educationpress_li_store_loved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved)) {
		$loved[] = $post_id;
	} else {
		$loved = array($post_id);
	}
	update_user_option($user_id, 'li_user_loves', $loved);
}

// increments a love count
function educationpress_li_mark_post_as_loved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count + 1;
	else
		$love_count = 1;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		educationpress_li_store_loved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}


// increments a love count
function educationpress_li_mark_post_as_unloved($post_id, $user_id) {

	// retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count - 1;
	else
		$love_count = 0;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		// store this post as loved for $user_id	
		educationpress_li_store_unloved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}

// returns a love count for a post
function educationpress_li_get_love_count($post_id) {
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		return $love_count;
	return 0;
}

// processes the ajax request
function educationpress_li_process_love() {
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce($_POST['love_it_nonce'], 'love-it-nonce') ) {
		
		if($_POST['liketype']=='like')
		{
			if(educationpress_li_mark_post_as_loved($_POST['item_id'], $_POST['user_id'])) {
				echo esc_html('loved');
			} else {
				echo esc_html('failed');
			}
		}else if($_POST['liketype']=='unlike'){
			if(educationpress_li_mark_post_as_unloved($_POST['item_id'], $_POST['user_id'])) {
				echo esc_html('unloved');
			} else {
				echo esc_html('failed');
			}
		}
	}
	die();
}
add_action('wp_ajax_educationpress_love_it', 'educationpress_li_process_love');

// outputs the love it link
function educationpress_li_love_link($love_text = null, $loved_text = null,$passcode_class) {

	global $user_ID, $post;

	// only show the link when user is logged in and on a singular page
	if( is_user_logged_in() ) {

	
		// retrieve the total love count for this item
		$love_count = educationpress_li_get_love_count( $post->ID );
		
		
			$love_text = is_null( $love_text ) ? esc_html__( 'Wishlist', 'educationpress' ) : $love_text;
			
			// only show the Love It link if the user has NOT previously loved this item
			if( ! educationpress_li_user_has_loved_post( $user_ID, get_the_ID() ) ) {
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" href="#" class="love-it '.esc_attr($passcode_class).' fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart-o"></i> <span>' . esc_html($love_count) . '</span></a>';
			} else {
				// show a message to users who have already loved this item
				echo '<a id="fav-id" title="'.esc_attr($love_text).'" href="#" class="loved '.esc_attr($passcode_class).' fav" data-post-id="' . esc_attr( get_the_ID() ) . '" data-user-id="' .  esc_attr( $user_ID ) . '"><i class="fa fa-heart"></i> <span>' . esc_html($love_count) . '</span></a>';
			}
		
	}
}
function educationpress_get_top_banner_option($option)
{
	 global $educationpress_options;
	 if( !empty($educationpress_options[$option]))
	 {
			$option_value=$educationpress_options[$option];
	 }
	 else
	 {
		 	$option_value=array();
	 }
	 
	 return $option_value;
}
function educationpress_format_currency( $price ) {
	if ( class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' )
	&&  in_array( 
    'woocommerce/woocommerce.php', 
    apply_filters( 'active_plugins', get_option( 'active_plugins' ) )  )  ) {
		return strip_tags( wc_price( $price ) );
	}
	elseif( function_exists('mp_format_currency') ) {
		return mp_format_currency('',  $price);
	}
	else {
		return $price;	
	}
}
function educationpress_escape_string($string){
	return wp_kses($string, array( 'a' => array(
                                    'href' => array(),
                                    'title' => array(),
                                    'target' => array(),
                                ),
                                'em' => array(),
                                'strong' => array(), ) ); 
}
function educationpress_escape_desc($string) {
	return wp_kses_post( $string );
}

function educationpress_is_sticky_header()
{ 
	global $educationpress_options;
	return
		(
			(isset($educationpress_options['educationpress_header_sticky']) && $educationpress_options['educationpress_header_sticky'])
			|| 
			(isset( $_GET['sticky-header'] ) && $_GET['sticky-header']=='yes' )
		 ) &&  !($educationpress_options['educationpress_header_variation']=='3' && is_front_page() );
	
} 


function educationpress_get_price_text( $course_id )
{
	$is_paid = cp_is_true(CoursePress_Data_Course::get_setting($course_id,'payment_paid_course',false));
	$is_sale_course =false;
	/*
	if ( !$is_paid && (CoursePress_Data_Course::get_setting($course_id,'cp_mp_product_price','')=="" || CoursePress_Data_Course::get_setting($course_id,'cp_mp_product_price',
	0)>0)) {
		update_post_meta( $course_id, 'cp_mp_product_price', 0 );
	}
	*/
	if ( $is_paid ) {
		$is_sale_course = cp_is_true(CoursePress_Data_Course::get_setting($course_id,'mp_sale_price_enabled',false));
		
		
		if ( $is_sale_course ) {
		$course_price =  educationpress_format_currency(CoursePress_Data_Course::get_setting($course_id,'mp_product_sale_price',0));
		}else{
		$course_price =  educationpress_format_currency(CoursePress_Data_Course::get_setting($course_id,'mp_product_price',0));
		}
		}else{
			$course_price =esc_html__( 'Free', 'educationpress');
	}
	return $course_price;
}
function educationpress_is_sale_course($course_id)
{
	return  
	cp_is_true(CoursePress_Data_Course::get_setting($course_id,'mp_sale_price_enabled',false))
	&&
	cp_is_true(CoursePress_Data_Course::get_setting($course_id,'payment_paid_course',false));
}
function educationpress_is_paid_course($course_id)
{
	return  cp_is_true(CoursePress_Data_Course::get_setting($course_id,'payment_paid_course',false));
}
function education_course_orig_price( $course_id )
{
	return  educationpress_format_currency(CoursePress_Data_Course::get_setting($course_id,'mp_product_price',0));
}