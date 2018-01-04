<?php
/**
 * @var $title
 */
?>
<section class="our-classes-two">
    <div class="container">
        <div class="row">
        	<h3><?php echo esc_html($title);?></h3>
            <p class="sub-line"><?php echo esc_html( $desc );?></p>
            
            <?php
				 $popular_class_no=$class_no;
				 $popular_class_orderby=$class_orderby;
				 $popular_class_cat=$class_cat;
			     $args1 =  array( 'post_type' => 'class','posts_per_page' => $popular_class_no,'post_status' => 'publish') ; 
				 if((int)$popular_class_cat>0)
				 {
					$tax_query_args = array(
					'tax_query' => array(
					array(
					'taxonomy' => 'class-category',
					'field' => 'term_id',
					'terms' => $popular_class_cat
					)
					)
					); 
					$args1=array_merge($args1,$tax_query_args );
				 }
				 if($popular_class_orderby=='date' || $popular_class_orderby=='rand' || $popular_class_orderby=='title')
				 {
					 if($popular_class_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $popular_class_orderby, 'order' => 'DESC') ; 
					 }
					elseif($popular_class_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $popular_class_orderby, 'order' => 'ASC') ; 
					 }
					 else					 
					 	$orderby_query_args = array(
					 				'orderby' => $popular_class_orderby,
									
									) ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 
				$pop_class_query = new WP_Query( $args1 ); 
		
				
				 
				 
				 if( $pop_class_query->have_posts() ):
				 	global $single_class_class;
					$single_class_class = "col-sm-4";
				?>
                	<?php 
					while ( $pop_class_query->have_posts() ) : 
					$pop_class_query->the_post(); ?>
                    	<!--single class start-->
                        <div class="col-xs-12 col-sm-6" >
                            <div class="classes-v-two">
                                <div class="thumb">
                                	<?php
										if( has_post_thumbnail() ):
                                            the_post_thumbnail( 'edupress-kid-home-class-thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), ) );
                                        else:			
                                        ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt="<?php echo get_the_title();?>" width="262" height="197" title="<?php echo get_the_title();?>" />
                                         <?php
										 endif;
										 ?>
                                    <a href="<?php the_permalink();?>" class="more"><?php esc_html_e('Read More', 'edupress');?></a>
                                </div>
                                
                                <div class="classes-v-two-info col-sm-6">
                                <h3><a href="<?php the_permalink();?>"><?php 
									$title = ( mb_strlen( get_the_title( get_the_ID()) ) >= 65 ) ? mb_substr( get_the_title( get_the_ID()), 0, 35 ) . '...' : get_the_title( get_the_ID());
									echo esc_html($title);
									?></a></h3>
                                <p><?php edupress_the_excerpt( 7 );?></p>
                                
                                <ul class="classes-time">
                                   <?php if( get_field('year_old') ): ?>
                                    <li>
                                        <span><?php the_field('year_old');?></span>
                                        Year old 
                                    </li>
                                    <?php endif; ?>
                                    <?php if( get_field('class_size') ): ?>
                                    <li>
                                        <span><?php the_field('class_size');?></span>
                                        Class Size
                                    </li>
                                    <?php endif; ?>
                                 </ul>
                                 </div> 
                            </div>
                        </div> 
                        <!--single class end -->
            
          			    
						<?php endwhile; ?>
                        <!-- end of the loop -->
    
                        <?php wp_reset_postdata(); ?>
                    <?php
                    endif;
                    ?>   
		</div> <!-- row #end -->
    </div> <!-- container #end -->
</section> <!-- classes #end -->   

				