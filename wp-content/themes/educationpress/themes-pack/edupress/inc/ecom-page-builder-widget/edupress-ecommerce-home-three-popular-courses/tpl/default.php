<?php
/*
 * Popular Online Courses For Home Page Three
 */
 global $edupress_options;
?>
<section class="popular-courses home-third-pop-courses woocommerce">
       		<div class="container">
            	<div class="row">
            	<div class="course_list">
                 <?php  if ( ! empty(  $title ) ) {?>
            	<h2 class="text-center head-border-orange"><?php echo esc_html(  $title ); ?></h2>
                <?php }?>
                
                <!-- course start-->
                <?php				
				
				$popular_course_no= $course_no;
				 $popular_course_orderby= $course_orderby ;
				 $popular_course_cat= $course_cat ;
			     $args1 =  array( 'post_type' => 'product','posts_per_page' => $popular_course_no,'post_status' => 'publish') ; 
				 if((int)$popular_course_cat>0)
				 {
					$tax_query_args = array(
					'tax_query' => array(
					array(
					'taxonomy' => 'product_cat',
					'field' => 'term_id',
					'terms' => $popular_course_cat
					)
					)
					); 
					$args1=array_merge($args1,$tax_query_args );
				 }
				  if($popular_course_orderby=='date' || $popular_course_orderby=='rand' || $popular_course_orderby=='title')
				 {
					 if($popular_course_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $popular_course_orderby, 'order' => 'DESC') ; 
					 }
					 elseif($popular_course_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $popular_course_orderby, 'order' => 'ASC') ; 
					 }
					 else
					 	$orderby_query_args = array('orderby' => $popular_course_orderby) ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 if($popular_course_orderby=='popular')
				 {
					 $orderby_query_args = array('meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'order' => 'DESC') ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 if($popular_course_orderby=='ratings' && get_option( 'woocommerce_enable_review_rating' ) === 'yes')
				 {
					 $orderby_query_args = array('meta_key' => '_wc_rating_count', 'orderby' => 'meta_value_num', 'order' => 'DESC') ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 //$popularcourses = get_posts( $args1 );
				$pop_product_query = new WP_Query( $args1 ); 
				 
				 
				 if( $pop_product_query->have_posts() ):
				 	global $single_product_class;
					$single_product_class = "col-sm-4";
				?>
                	<?php while ( $pop_product_query->have_posts() ) : 
					$pop_product_query->the_post(); ?>
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                                    
		            <?php endwhile; ?>
					<!-- end of the loop -->

					<?php wp_reset_postdata(); ?>
                <?php
				endif;
				?>
                
                 <?php  if ( ! empty($button_url ) ) {?>
                <div class="btn-group text-center col-xs-12">
                <a href="<?php echo esc_url( $button_url); ?>" class="btn btn-orange btn-medium"><?php echo esc_html( $button_text); ?> <i class="lnr lnr-arrow-right"></i></a>
                </div>
                <?php }?>
                
               </div>   <!-- #course_list #end  -->
               </div>  <!--row #end--> 
            </div><!-- #container #end  -->
       </section>