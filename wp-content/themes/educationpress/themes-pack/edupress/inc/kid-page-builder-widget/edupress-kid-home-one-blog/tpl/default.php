<?php
/**
 * @var $title
 */
?>			

<section class="our-blog">
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
        	<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
			<?php
				echo $desc;
			?>
            </div>
            
            <?php
				
			     $args1 =  array( 'post_type' => 'post','ignore_sticky_posts' => 1,'posts_per_page' => $blog_no,'post_status' => 'publish') ; 
				  if((int)$blog_cat>0)
				 {
					$tax_query_args = array(
						'relation' => 'AND',
						'tax_query' => array(
							'relation' => 'AND',
							array(
							'taxonomy' => 'category',
							'field' => 'term_id',
							'terms' => $blog_cat
							),
							 array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
									'post-format-aside',
									'post-format-audio',
									'post-format-chat',
									'post-format-gallery',
									'post-format-image',
									'post-format-link',
									'post-format-quote',
									'post-format-status',
									'post-format-video'
								),
								'operator' => 'NOT IN'
							)

					)
					); 
					
				 }
				 else
				 {
					 $tax_query_args = array(
						
						'tax_query' => array(
						
							 array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
									'post-format-aside',
									'post-format-audio',
									'post-format-chat',
									'post-format-gallery',
									'post-format-image',
									'post-format-link',
									'post-format-quote',
									'post-format-status',
									'post-format-video'
								),
								'operator' => 'NOT IN'
							)

					)
					); 
				 }
				 
				 
				 $args1=array_merge($args1,$tax_query_args );
				 
				 if($blog_orderby=='date' || $blog_orderby=='rand' || $blog_orderby=='title')
				 {
					 if($blog_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $blog_orderby, 'order' => 'DESC') ; 
					 }
					elseif($blog_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $blog_orderby, 'order' => 'ASC') ; 
					 }
					 else					 
					 	$orderby_query_args = array(
					 				'orderby' => $blog_orderby,
									) ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 
				 
			
				 
				$blog_query = new WP_Query( $args1 ); 
		
				
				 
				 
				 if( $blog_query->have_posts() ):
				?>
                	<?php 
					while ( $blog_query->have_posts() ) : 
					$blog_query->the_post(); ?>
            
                             <div class="col-xs-12 col-sm-6">
                                    <div class="blogs">
                                        <a href="<?php the_permalink();?>"><figure>
                                        
                                         <?php
										if( get_the_post_thumbnail() ):
											the_post_thumbnail( 'edupress-kid-home-one-blog', array( 'alt' => get_the_title(), 'title' => get_the_title(), ) );
										else:			
										?>
											<img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available-277-246.jpg" alt="<?php echo get_the_title();?>" title="<?php echo get_the_title();?>" />
										 <?php
										 endif;
										 ?>
                                        
                                        </figure></a>
                                        <div class="col-sm-6">
                                        <h3><a href="<?php the_permalink();?>"><?php edupress_the_title(25);?></a></h3>
                                        <p class="meta"><span class="date"><?php echo get_the_date('M d, Y', get_the_ID());?></span> <span>.</span> <?php esc_html_e('By', 'edupress');?> <a href="<?php the_author_link(); ?>"><?php the_author();?></a></p>
                                        <p><?php edupress_the_excerpt( 11 );?></p>
                                        <a href="<?php the_permalink();?>" class="know-more"><?php echo esc_html($btn_text);?> <i class="lnr lnr-arrow-right"></i></a>
                                        </div>
                                     </div>
                             </div>
						<?php endwhile; ?>
                    <!-- end of the loop -->

                    <?php wp_reset_postdata(); ?>
                <?php
                endif;
                ?>   
            
 		</div><!-- row #end -->
    </div> <!-- container #end -->
</section>  <!-- Our Blog #end -->   
				
