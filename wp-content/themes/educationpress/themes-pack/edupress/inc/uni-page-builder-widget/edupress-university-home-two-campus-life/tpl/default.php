<section id="campus" class="campus-slider campus-slider-two">
    <div class="container">
        <div class="row widget">
        
        <header><h3><?php echo  esc_html( $title );?></h3></header>
        
        <div class="row">  
                <?php
				$args1 =  array( 'post_type' => 'campus','posts_per_page' => intval($campus_no),'post_status' => 'publish') ; 
			
				 if($campus_orderby=='date' || $campus_orderby=='rand' || $campus_orderby=='title')
				 {
					 if($campus_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $campus_orderby, 'order' => 'DESC') ; 
					 }
					 elseif($campus_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $campus_orderby, 'order' => 'ASC') ; 
					 }
					 else
					 	$orderby_query_args = array('orderby' => $campus_orderby) ; 
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 
				 // $popularcourses = get_posts( $args1 );
				$campus_query = new WP_Query( $args1 ); 
				 
				 
				 if( $campus_query->have_posts() ):
				?>
                
                <?php while ( $campus_query->have_posts() ) : 
						$campus_query->the_post(); 
				?>
                <div class="col-xs-12  col-sm-4 zoom campus">
                    <a href="<?php the_permalink();?>" class="img-thumb">
                    <figure>
                    <?php
					if(has_post_thumbnail()) :
                    	the_post_thumbnail('edupress-university-home-thumb', array( 'title' => get_the_title(),'alt' => get_the_title()));
					else:
					?>
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/img-not-available-360-203.jpg"  width="360" height="203" alt="<?php the_title();?>" title="<?php the_title();?>" />
                    <?php
					endif;
					?></figure>
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <?php
						the_excerpt();
					?>
                    <a href="<?php the_permalink();?>" class="btn btn-medium btn-blue">View Campus</a>
                </div> <!-- col 1 #end -->
                <?php endwhile; ?>
					<!-- end of the loop -->

					<?php wp_reset_postdata(); ?>
                <?php
				endif;
				?>
                
            
                
                
    
             
             </div> <!--row widget #end  -->
                     
             </div> <!--row #end  -->
             
    </div><!--container #end  -->

</section>