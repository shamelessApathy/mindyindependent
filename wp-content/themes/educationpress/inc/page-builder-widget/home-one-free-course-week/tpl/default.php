 <?php
				// Weekly Free Course 
				$args1 = array(
				'post_type' => 'course',
				'posts_per_page' => 1,
				'date_query' => array(
					array(
						'year' => date( 'Y' ),
						'week' => date( 'W' ),
					),
				),
				'meta_query' => array(
				array(
					'key' => 'total_enroll',
					'value' => 0,
					'compare' => '>',
					),
				array(
					'key' => 'cp_payment_paid_course',
					'value' => 'on',
					'compare' => 'NOT LIKE',
					),
				),
				'meta_key'   => 'total_enroll',
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
                        <?php echo do_shortcode( '[course_media course_id="'.$free_course->ID.'" class="thumb"]' );?></a>
                        <h4><a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>"><?php echo esc_html(get_the_title( $free_course->ID)); ?></a></h4>
                        <p class="meta"><?php  esc_html_e( 'on:', 'educationpress');?> <strong><?php echo esc_html( get_the_date( get_option( 'date_format' ),$free_course->ID) );?></strong> <?php  esc_html_e( '. in: ', 'educationpress');?> <strong>
                         <?php echo get_the_term_list( $free_course->ID, 'course_category','', ', ' );?>
                        </strong></p>
                        
                        <a href="<?php echo esc_url(get_permalink($free_course->ID)); ?>" class="more"><?php esc_html_e('Read More','educationpress'); ?> <i class="lnr lnr-arrow-right"></i></a>
					<?php  
						 }
					 endif;
					 ?>  
                    </div>
 