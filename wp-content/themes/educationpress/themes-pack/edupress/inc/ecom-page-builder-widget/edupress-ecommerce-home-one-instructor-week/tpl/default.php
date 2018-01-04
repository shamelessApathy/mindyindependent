 <?php
				// Weekly instructor 
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
				),
				'meta_key'   => 'total_sales',
				'orderby' => 'meta_value_num',
				'order'     => 'DESC',
				);
				
			
				
				//$ins_week = new WP_Query( $args );
				$ins_week = get_posts( $args1 );
				global $edupress_options;
				$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
					
				
				?>
                 	<div class="col-xs-12 instructor-week">
                     <?php  if ( ! empty( $title) ) {?>
                    	<h2 class="head-border-default"><?php echo esc_html( $title ); ?></h2>
                        <?php }?>
                        <?php
						 if( $ins_week ):
						 foreach ( $ins_week as $week_tea ) {
							$ins_ID=$week_tea->post_author;
							$job_title = get_the_author_meta( 'job_title',$ins_ID);
							$mob_num = get_the_author_meta( 'mob_num',$ins_ID);
							$user_info = get_userdata($ins_ID );
							$autho_description = strip_tags( $user_info->description);
							$author_display_name = $user_info->data->display_name
						?>
                        <div class="col-xs-12 col-sm-6 remove_space">
                        	<a href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$instructor->display_name)); ?>">
                            <?php echo get_avatar( $ins_ID, 150);?>
                            </a>
                        </div>
                        
                         <div class="col-xs-12 col-sm-6 remove_space">
                         	<p class="author-name"><strong><a href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$instructor->display_name)); ?>"><?php echo esc_html($user_info->display_name);?></a></strong><br />
                            <span><?php echo esc_html($job_title) ;?></span></p>
                            <?php if ( $mob_num && $mob_num != '' ) {?>
                            <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','edupress' ); ?>  <strong><?php echo esc_html($mob_num);?></strong></p>
                             <?php }else{?>
                              <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','edupress' ); ?>  <strong><?php esc_html_e( '- Nill -','edupress' ); ?></strong></p>
                             <?php }?>
                            <p class="email"><?php esc_html_e( 'Email me at','edupress' ); ?> <a href="mailto:<?php echo antispambot( $user_info->user_email);?>"><?php echo esc_attr($user_info->user_email);?></a></p>
                            
                         </div>
                        <?php
						$inst_desc = ( mb_strlen( $autho_description ) >= 270 ) ? mb_substr( $autho_description, 0, 270 ) . '...' : $autho_description;?>
                        
                        <p><?php echo $inst_desc ;?></p>
						<?php 
						global $edupress_options;
						$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						?>
                         <a href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$author_display_name)); ?>" class="more"><?php esc_html_e('Read More','edupress'); ?> <i class="lnr lnr-arrow-right"></i></a>
                     <?php  
						 }
					 endif;
					 ?>   
                    </div>
 