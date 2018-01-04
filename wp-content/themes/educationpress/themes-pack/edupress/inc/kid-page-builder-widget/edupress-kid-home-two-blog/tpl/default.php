<?php
/**
 * @var $title
 */
?>			
<div class="col-xs-12"> 
    <h3><?php echo esc_html($title);?></h3>
    <div class="blog-vtwo">
        <ul class="news">
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
                        <li>
                            <a href="<?php the_permalink();?>">
                             <?php
										if( get_the_post_thumbnail() ):
											the_post_thumbnail( 'edupress-kid-home-two-blog', array( 'alt' => get_the_title(), 'title' => get_the_title(), ) );
										else:			
										?>
											<img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available-small.jpg" alt="<?php echo get_the_title();?>" width="80" height="60" title="<?php echo get_the_title();?>" />
										 <?php
										 endif;
										 ?>
                            </a>
                            <h3><a href="<?php the_permalink();?>"><?php edupress_the_title(30);?></a></h3> 
                            <p class="meta"><?php echo get_the_date('M D, Y', get_the_ID());?> <?php esc_html_e(' by', 'edupress');?> <a href="<?php the_author_link(); ?>"><?php the_author();?></a></p>
                            <p><?php edupress_the_excerpt( 13 );?></p>
                        </li>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <?php wp_reset_postdata(); ?>
                <?php
                endif;
                ?>   
          
        </ul>
        <?php 
		if( !empty($btn_text) ) {
		?>
        <a href="<?php edupress_blog_page_link();?>" class="b_viewall"><?php echo esc_html($btn_text);?></a>
        <?php
        }
		?>
    </div>
</div><!-- col 3 #end -->