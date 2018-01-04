<?php
/*
 * This file contains basic utility functions used throughout the theme
 */
if( edupress_is_a( 'ecom' ) ) {
	include_once( get_template_directory() . '/inc/util/ecom-basic-functions.php' );
}
elseif( edupress_is_a( 'uni' ) ) {
	include_once( get_template_directory() . '/inc/util/uni-basic-functions.php' );
}
elseif( edupress_is_a( 'kid' ) ) {
	include_once( get_template_directory() . '/inc/util/kid-basic-functions.php' );
}


if( !function_exists('edupress_page_layout') ) {
	function edupress_page_layout($layout_key)
	{
		global $edupress_options;
		$default_layout="";
		if ($edupress_options[$layout_key] == '1') {
			$default_layout="";
		} 
		elseif($edupress_options[$layout_key] == '2') {
			$default_layout=" col-sm-8 pull-right";
		} 
		elseif($edupress_options[$layout_key] == '3') {
			$default_layout=" col-sm-8 pull-left";
		}
		
		return $default_layout;
	}
}




if ( ! function_exists( 'edupress_theme_comment' ) ) {
    /**
     * Theme Custom Comment Template
     */
    function edupress_theme_comment( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="pingback">
                    <p><?php esc_html_e('Pingback:', 'edupress'); ?> <?php comment_author_link(); ?><?php edit_comment_link(esc_html__('(Edit)', 'edupress'), ' '); ?></p>
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
                                <time datetime="<?php comment_time('c'); ?>"><?php printf( esc_html__( '%1$s', 'edupress' ), get_comment_date() ); ?> 
                                <small>.</small>
								<?php printf( _x( '%s ago', '%s = human-readable time difference', 'edupress' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
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
function edupress_header_menu() {
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
function edupress_numeric_posts_nav( $navigation_id = '' ) {

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


function edupress_add_profile_fields( $user_contact_methods ) {

        $user_contact_methods[ 'job_title' ]        = esc_html__( 'Job Title', 'edupress' );
		$user_contact_methods[ 'mob_num' ]        = esc_html__( 'Mobile', 'edupress' );
        $user_contact_methods[ 'facebook_url' ]     = esc_html__( 'Facebook URL', 'edupress' );
        $user_contact_methods[ 'twitter_url' ]      = esc_html__( 'Twitter URL', 'edupress' );
        $user_contact_methods[ 'google_plus_url' ]  = esc_html__( 'Google Plus URL', 'edupress' );
        $user_contact_methods[ 'linkedin_url' ]     = esc_html__( 'LinkedIn URL', 'edupress' );
		$user_contact_methods[ 'pinterest_url' ]    = esc_html__( 'Pinterest URL', 'edupress' );
        $user_contact_methods[ 'instagram_url' ]    = esc_html__( 'Instagram URL', 'edupress' );
		$user_contact_methods[ 'youtube_url' ]    = esc_html__( 'Youtube URL', 'edupress' );

        return $user_contact_methods;
}
add_filter( 'user_contactmethods', 'edupress_add_profile_fields' );
if ( !function_exists( 'edupress_standard_thumbnail' ) ) :
    /**
     * Generate standard thumbnail for this theme
     *
     * @since 1.0.0
     * @param   string  $size
     */
    function edupress_standard_thumbnail( $size = 'post-thumbnail' ) {

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



if( ! function_exists( 'edupress_standard_gallery' ) ) :
    /**
     * Get list of gallery images
     *
     * @since 1.0.0
     * @param string $size
     */
    function edupress_standard_gallery( $size = 'post-thumbnail' ) {

        global $post;

        $gallery_images = edupress_get_post_meta( 'EDU_PRESS_gallery', array( 'type' => 'image_advanced', 'size' => $size ), $post->ID );

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

            edupress_standard_thumbnail( $size );

        }

    }

endif;



if( ! function_exists( 'edupress_get_post_meta' ) ) :
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
    function edupress_get_post_meta( $key, $args = array(), $post_id = null ) {

        $post_id = empty( $post_id ) ? get_the_ID() : $post_id;
        $args = wp_parse_args( $args, array( 'type' => 'text', 'multiple' => false, ) );

        // Always set 'multiple' true for following field types
        if ( in_array( $args['type'], array('checkbox_list', 'file', 'file_advanced', 'image', 'image_advanced', 'plupload_image', 'thickbox_image') ) ) {
            $args['multiple'] = true;
		    /*
			$meta = get_post_meta( $post_id, $key, !$args['multiple'] );
			if( count( $meta ) == 1 && stripos($meta[0], ',') !== false )
				$meta = explode( ',', $meta[0] );			
			*/	
        }
		
	    $meta = get_post_meta( $post_id, $key, !$args['multiple'] );
		
		
	
		

        // Get uploaded files info
        if (in_array($args['type'], array('file', 'file_advanced'))) {

            if ( is_array( $meta ) && !empty( $meta ) ) {
                $files = array();
                foreach ($meta as $id) {
                    // Get only info of existing attachments
                    if (get_attached_file($id)) {
                        $files[$id] = edupress_get_file_info($id);
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
                        $images[$id] = edupress_get_file_info($id, $args);
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



if( ! function_exists( 'edupress_get_file_info' ) ) :
    /**
     * Get uploaded file information
     *
     * @since 1.0.0
     * @param int   $file_id Attachment image ID (post ID). Required.
     * @param array $args    Array of arguments (for size).
     *
     * @return array|bool False if file not found. Array of image info on success
     */
    function edupress_get_file_info( $file_id, $args = array() ) {

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



if ( ! function_exists( 'edupress_pagination' ) ) :
    /**
     * Output pagination
     *
     * @param $query
     */
    function edupress_pagination( $query ) {

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



if( !function_exists( 'edupress_excerpt' ) ) {
    /**
     * Output excerpt for given number of words
     * @param int $len
     * @param string $trim
     */
    function edupress_excerpt( $len=15, $trim = "&hellip;" ) {
        echo get_edupress_excerpt( $len, $trim );
    }
}



if( !function_exists( 'get_edupress_excerpt' ) ) {
    /**
     * Return excerpt for given number of words.
     * @param int $len
     * @param string $trim
     * @return string
     */
    function get_edupress_excerpt( $len=15, $trim = "&hellip;" ) {
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



if( !function_exists( 'get_edupress_custom_excerpt' ) ) {
    /**
     * Return excerpt for given number of words from custom contents
     * @param string $contents
     * @param int $len
     * @param string $trim
     * @return array|string
     */
    function get_edupress_custom_excerpt( $contents, $len = 15, $trim = "&hellip;" ){
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




function edupress_get_top_banner_option($option)
{
	 global $edupress_options;
	 if( !empty($edupress_options[$option]))
	 {
			$option_value=$edupress_options[$option];
	 }
	 else
	 {
		 	$option_value=array();
	 }
	 
	 return $option_value;
}

function edupress_escape_desc($string) {
	return wp_kses_post( $string );
}

//for ACF 
if( !
function_exists( 'edupress_render_acf_field' ) ) {
	function edupress_render_acf_field( $field ) {
				switch( $field['type'] ) {
				
					case 'post_object':
						?>
						<a href="<?php echo get_the_permalink( $field['value']->ID ); ?>"><?php echo $field['value']->post_title; ?></a>
						<?php
						break;
					case 'date_picker':
						echo date( 
								get_option( 'date_format' ) , 
								strtotime( $field['value'] )
							 );
						break;
					
					case 'file':
						$file = $field['value'];
						
						if( is_array( $file ) )
						{
							$url = $file['url'];
							$title = $file['title'];
							$caption = $file['caption'];
							
							
						
							if( $caption ): ?>
						
								<div class="wp-caption">
						
							<?php endif; ?>
						
							<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
								<span><?php echo $title; ?></span>
							</a>
						
							<?php if( $caption ): ?>
						
									<p class="wp-caption-text"><?php echo $caption; ?></p>
						
								</div>
							<?php endif; 
						}
						elseif( is_numeric($file) ) {
							?>
							<a href="<?php echo wp_get_attachment_url( intval( $file ) );?>">
							<?php echo wp_get_attachment_url( intval( $file ) );?>
                            </a>	
							<?php
						}
						else
						{
							?>
							<a href="<?php echo $file;?>">
                            	<?php echo $file;?>
                            </a>	
                            <?php
						}
						break;
					
					case 'image':
						//echo $field['value']['sizes']['thumbnail']
						$image = $field['value'];
						if( is_array( $image ) )
						{
							?>
							<a class="fancybox" rel="group" href="<?php echo $image['url'];?>"><img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />			
							<?php
						}
						elseif( is_numeric($image) ) {
							echo wp_get_attachment_image( intval( $image ), 'thumbnail' );
						}
						else {
							?>
							<a class="fancybox" rel="group" href="<?php echo $image;?>"><img src="<?php echo $image;?>" />		
						<?php
						}
						break;
						
					case 'wysiwyg':
						echo wp_kses_post( $field['value'] );
						break;	
					case 'true_false':
						if( $field['value'] ) {
							esc_html_e( 'Yes', 'edupress' );
						}
						else {
							esc_html_e( 'No', 'edupress' );
						}	
						break;
					case 'relationship':
						$output_array = array();
						foreach(  $field['value'] as $sub_field ) {
							if( is_object( $sub_field ) && is_a( $sub_field, 'WP_Post' ) ) {
							
								$output_array[] = '<a href="'.get_the_permalink( $sub_field->ID ).'">'.$sub_field->post_title.'</a>'; 
							}
							?>
                       
                        <?php
						}
						echo implode( ', ',  $output_array);						
						break;
					case 'taxonomy':
						$output_array = array();
							if( is_array( $field['value'] ) ) {
								foreach( $field['value'] as $sub_field ) {
									if( is_numeric( $sub_field ) ) {
										
										$sub_field = get_term_by( 'id', intval($sub_field), $field['taxonomy'], OBJECT );
									}
									
									if( is_object( $sub_field ) ) {
										$output_array[] =  '<a href="'.get_term_link($sub_field->term_id).'">'.$sub_field->name.'</a>';
									}
									
	 
								}
							}
							elseif( is_object( $field['value'] ) ) {
								$sub_field = $field['value'];
								$output_array[] =  '<a href="'.get_term_link($sub_field->term_id).'">'.$sub_field->name.'</a>';
							}
							elseif( is_numeric( $field['value'] ) ) {
								
								$sub_field  = get_term_by( 'id', intval( $field['value']), $field['taxonomy'], OBJECT );
								$output_array[] =  '<a href="'.get_term_link($sub_field->term_id).'">'.$sub_field->name.'</a>';
								
							}
							
						echo implode( ', ', $output_array );
						break;
						
					case 'user':
						if( $field['field_type'] == 'select' )
						{
						?>
                        	<br/>
                            <a href="<?php echo get_author_posts_url( $field['value']['ID'], $field['value']['user_nicename'] );?>" title="<?php echo $field['value']['user_nicename'];?>" alt="<?php echo $field['value']['user_nicename'];?>"><?php echo $field['value']['user_avatar'];?></a>
                            
                            
                            <a href="<?php echo get_author_posts_url( $field['value']['ID'], $field['value']['user_nicename'] );?>" title="<?php echo $field['value']['user_nicename'];?>" alt="<?php echo $field['value']['user_nicename'];?>">   
                            <?php echo $field['value']['display_name'];?>
	                       	</a>
						<?php
						}
						else
						{	
							$output_array = array();
							foreach( $field['value'] as $sub_field ) {
								$output_array[] = '<a href="'.get_author_posts_url( $sub_field['ID'], $sub_field['user_nicename'] ).'" title="'.$sub_field['user_nicename'].'" alt="'.$sub_field['user_nicename'].'">'.$sub_field['user_avatar'].'</a><br/>
								<a href="'.get_author_posts_url( $sub_field['ID'], $sub_field['user_nicename'] ).'" title="'.$sub_field['user_nicename'].'" alt="'.$sub_field['user_nicename'].'">'.$sub_field['display_name'].'
	                       		</a>';
							}
							echo '<br/>'.implode( '<br/><br/>', $output_array );
						}
						
						break;
					case 'color_picker':
						?>
						<span style="width:25px; background-color:<?php echo $field['value'];?>"><?php echo 
							str_repeat('&nbsp;',12);?></span>
                        <?php
						break;
				    default:
						//select multiple
						if( is_array( $field['value'] ) ) {
							$field_val = $field['value'];
							array_filter( $field_val );
							$field_val = array_map( 'trim', $field_val);
							$field_val = array_map( 'esc_html', $field_val);
							echo implode(', ', $field_val);
						}
						else {
							echo esc_html( $field['value'] );
						}
				}
	}
}



function edupress_the_excerpt($limit = 13) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  echo esc_html($excerpt);
}
function edupress_the_title($limit = 65) {
	$title = ( mb_strlen( get_the_title( get_the_ID()) ) >= $limit ) ? mb_substr( get_the_title( get_the_ID()), 0, $limit ) . '...' : get_the_title( get_the_ID());
	echo esc_html($title);
}
function edupress_blog_page_link() {
    if ( 'page' == get_option( 'show_on_front' ) ) {
        if ( get_option( 'page_for_posts' ) ) {
            echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) );
        } else {
            echo esc_url( home_url( '/?post_type=post' ) );
        }
    } else {
        echo esc_url( home_url( '/' ) );
    }
}
function edupress_is_sticky_header()
{ 
	global $edupress_options;
	if( edupress_is_a( 'ecom' ) ) {
		return
		(
			(isset($edupress_options['edupress_header_sticky']) && $edupress_options['edupress_header_sticky'])
			|| 
			(isset( $_GET['sticky-header'] ) && $_GET['sticky-header']=='yes' )
		 ) &&  !($edupress_options['edupress_header_variation']=='3' && is_front_page() );
	}
	else
	{
		return 
		( isset($edupress_options['edupress_header_sticky']) && $edupress_options['edupress_header_sticky'] ) 
		|| 
		( isset( $_GET['sticky-header'] ) && $_GET['sticky-header']=='yes' );
	}
} 