 <?php
				$args1 = array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( 'post-format-quote' ),
							'operator' => 'NOT IN'
						)
					)
				);
				$free_c_week = get_posts( $args1 );
				
				?>
                 	<div class="free-course-week">
                    <?php  if ( ! empty( $title ) ) {?>
                    <h2 class="head-border-default"><?php echo esc_html( $title ); ?></h2>
                     <?php }?>
                    	<?php
						 if( $free_c_week ):
						 foreach ( $free_c_week as $free_course ) {?>
                        <a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>" class="post-thumb">
						<?php
                        if ( is_sticky($free_course->ID) ) {?>
                        <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                        <?php }?>
                        <?php echo get_the_post_thumbnail( $free_course->ID, 'post-thumbnails' );?></a>
                        <h4><a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>"><?php echo esc_html(get_the_title( $free_course->ID)); ?></a></h4>
                        <p class="meta"><?php  esc_html_e( 'on:', 'edupress');?> <strong><?php echo esc_html( get_the_date( get_option( 'date_format' ),$free_course->ID) );?></strong> <?php  esc_html_e( '. in: ', 'edupress');?> <strong>
                         <?php $categories = get_the_category( $free_course->ID );
						$separator = ' ';
						$output = '';
						if ( ! empty( $categories ) ) {
						foreach( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						}
						echo trim( $output, $separator );
						}
						 ?>
                        </strong></p>
                        
                        <a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>" class="more"><?php esc_html_e('Read More','edupress'); ?> <i class="lnr lnr-arrow-right"></i></a>
					<?php  
						 }
					 endif;
					 ?>  
                    </div>
 