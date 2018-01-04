<section class="school-events">
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
            <?php echo $desc;?>            
            </div> 
            
            <?php
				
			     $args1 =  array( 'post_type' => 'event','posts_per_page' => $event_no,'post_status' => 'publish') ; 
				 
				 if($event_orderby=='date' || $event_orderby=='rand' || $event_orderby=='title')
				 {
					 if($event_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $event_orderby, 'order' => 'DESC') ; 
					 }
					elseif($event_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $event_orderby, 'order' => 'ASC') ; 
					 }
					 else					 
					 	$orderby_query_args = array(
					 				'orderby' => $event_orderby,
									
									) ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 
				$event_query = new WP_Query( $args1 ); 
		
				
				 
				 
				 if( $event_query->have_posts() ):
				?>
                	<?php 
					while ( $event_query->have_posts() ) : 
					$event_query->the_post(); ?>
                        <div class="col-xs-12 col-sm-4 zoom">
                                <div class="events">
                                <a href="<?php the_permalink();?>" class="img-thumb"><br />
								<figure>
                                <?php
								if( has_post_thumbnail() ):
									the_post_thumbnail( 'edupress-kid-class-thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), ) );
								else:			
								?>
									<img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt="<?php echo get_the_title();?>" width="360" height="270" title="<?php echo get_the_title();?>" />
								 <?php
								 endif;
								 ?>
                                </figure>
                                </a>
                                    <div class="events-info">
                                        <h3><a href="<?php the_permalink();?>"><?php edupress_the_title();?></a></h3>
                                        <p class="location"><i class="lnr lnr-map-marker"></i> <?php echo  esc_html(get_post_meta( get_the_ID(), 'EDU_PRESS_event_location', true ));?></p>
                                        <p><?php edupress_the_excerpt(13);?></p>
                                        <?php
										if( get_post_meta( get_the_ID(), 'EDU_PRESS_event_start_datetime', true )) :
										?>
                                        <ul class="events-time">
                                        <li>
                                        	<span>
											<?php 
											echo esc_html(
											date('M j,Y',
strtotime(get_post_meta( get_the_ID(), 'EDU_PRESS_event_start_datetime', true ) )
												)
											) ;?> 
                                            
                                            </span>
                                        Date 
                                        </li>
                                        
                                        <li><span>
                                        <?php
                                        echo esc_html(
											date('h:i A',
strtotime(get_post_meta( get_the_ID(), 'EDU_PRESS_event_start_datetime', true ) )
												)
											) ;?> </span>
                                        Time</li>
                                        
                                        </ul>
                                    	<?php endif;
										?>
                                    <a href="<?php the_permalink();?>" class="know-more"><?php echo esc_html( $btn_text );?><i class="lnr lnr-arrow-right"></i></a>
                                    </div>
                                 </div>
                             </div> <!-- col 1 #end -->
                                
							<?php endwhile; ?>
                        <!-- end of the loop -->
    
                        <?php wp_reset_postdata(); ?>
                    <?php
                    endif;
                    ?>   
                 
            
            
		</div><!-- row #end -->
    </div> <!-- container #end -->
</section>  <!-- events #end -->   

			