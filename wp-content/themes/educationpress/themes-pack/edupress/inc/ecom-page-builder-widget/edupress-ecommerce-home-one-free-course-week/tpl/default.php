 <?php
				// Weekly Free Course 
				$args1 = array(
				'post_type' => 'product',
				'posts_per_page' => 1,
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'week' => date( 'W' ),
					),
				),
				'meta_query' => array(
				array(
					'key' => 'total_sales',
					'value' => 0,
					'compare' => '>',
					),
			
				array(
					'key' => '_price',
					'value' => '',
					'compare' => 'LIKE',
					),
				),
				
				
				
				'meta_key'   => 'total_sales',
				'orderby' => 'meta_value_num',
				'order'     => 'DESC',
				);
				//$free_c_week = new WP_Query( $args );
				$free_c_week = get_posts( $args1 );
				
				?>
                 	<div class="col-xs-12 free-course-week">
                    <?php  if ( ! empty( $title ) ) {?>
                    <h2 class="head-border-default"><?php echo esc_html( $title ); ?></h2>
                     <?php }?>
                    	<?php
						 if( $free_c_week ):
						 foreach ( $free_c_week as $free_course ) {?>
                        <a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>">
                        	<div class="course-thumbnail course-featured-media course-featured-media-569 thumb">
							<?php
                            if ( has_post_thumbnail( $free_course->ID ) ) {
								$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
								echo get_the_post_thumbnail( $free_course->ID, 'shop_catlog', array(
									'title'	 => esc_html( $props['title'] ),
									'alt'    => esc_html( $props['alt'] )
								) );
							} elseif ( wc_placeholder_img_src() ) {
								echo wc_placeholder_img( $image_size );
							}
							?>
                            </div>
						</a>
                        <h4><a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>"><?php echo esc_html(get_the_title( $free_course->ID)); ?></a></h4>
                        <p class="meta"><?php  esc_html_e( 'on:', 'edupress');?> <strong><?php echo esc_html( get_the_date( get_option( 'date_format' ),$free_course->ID) );?></strong> <?php  esc_html_e( '. in: ', 'edupress');?> <strong>
                         <?php echo get_the_term_list( $free_course->ID, 'product_cat','', ', ' );?>
                        </strong></p>
                        
                        <a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>" class="more"><?php esc_html_e('Read More','edupress'); ?> <i class="lnr lnr-arrow-right"></i></a>
					<?php  
						 }
					 endif;
					 ?>  
                    </div>
 