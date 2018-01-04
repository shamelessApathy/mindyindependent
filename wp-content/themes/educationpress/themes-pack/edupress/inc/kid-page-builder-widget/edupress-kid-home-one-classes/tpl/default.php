<?php
/**
 * @var $title
 */
?>
<section class="school-classes">
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
        	<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
            <?php
				echo $desc;
			?>
          <div id="owl-classes" class="owl-carousel">
              	
                
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
				?>
                	<?php 
					while ( $pop_class_query->have_posts() ) : 
					$pop_class_query->the_post(); 
						get_template_part('kid-template-parts/list-single', 'class');
					endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>
            <?php
            endif;
                    ?>   
                             
                              
                
             
             </div> <!-- owl-classes #end  -->
 			</div> <!-- col-xs-12 #end -->
 		</div><!-- row #end -->
    </div> <!-- container #end -->
</section>  <!-- School classes #end -->   
				
				
