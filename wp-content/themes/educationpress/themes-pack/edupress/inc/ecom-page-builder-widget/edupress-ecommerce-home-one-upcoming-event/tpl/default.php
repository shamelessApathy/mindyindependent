
                	<div class="col-xs-12 upcoming-event">
                     <?php  if ( ! empty( $title ) ) {?>
                    <h2 class="head-border-default"><?php echo esc_html( $title); ?></h2>
                    <?php }?>
                    	<?php 
						$upcoming_event_args = array(
						'post_type' => 'event',
						'posts_per_page' => 1,
						'ignore_sticky_posts' => 1,
						);
						$upcoming_events=get_posts($upcoming_event_args); 
						if(count($upcoming_events)){
						?>
                        <a class="event-thumbnail" href="<?php echo esc_url(get_permalink($upcoming_events[0]->ID));?>"><?php echo get_the_post_thumbnail( $upcoming_events[0]->ID, 'shop_catalog' ); ?></a>
                        <h4><a href="<?php echo esc_url(get_permalink($upcoming_events[0]->ID));?>"> <?php echo esc_html(get_the_title($upcoming_events[0]->ID )); ?> </a></h4>
                        <p class="meta"><?php esc_html_e( 'on:','edupress' ); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $upcoming_events[0]->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong><?php esc_html_e( '. at: ','edupress' ); ?><strong><?php echo  esc_html(get_post_meta( $upcoming_events[0]->ID, 'EDU_PRESS_event_location', true ));?></strong></p>
                        
                        <a href="<?php echo esc_url(get_permalink($upcoming_events[0]->ID));?>" class="more"><?php esc_html_e('Read More','edupress'); ?> <i class="lnr lnr-arrow-right"></i></a>
						<?php }?>
                    </div>
