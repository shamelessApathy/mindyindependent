<?php
/*
 * Testimonials For Home Page One
 */
global $edupress_options;

$number_of_testim = intval( $testi_no );
$recent_testim_args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => $number_of_testim,
    'ignore_sticky_posts' => 1,
);


// The Query
//$recent_testim_query = new WP_Query( $recent_testim_args );
$testimp=get_posts($recent_testim_args);

$num_testi= count($testimp);
if( !empty($bgimage) ) {
$bgimage = siteorigin_widgets_get_attachment_image_src(
			$bgimage,
			'full',
			 ''
);
$background_style = array();

$background_style[] = 'background-image: url(' . esc_url($bgimage[0]) . ');';
}
?>
<div id="testimonials"  data-speed="<?php echo intval($speed);?>"  class="carousel slide testimonials_outer home-two-testimonials" <?php if( !empty($background_style) ) echo 'style="' .esc_attr(implode(';', $background_style)) . '"' ?>>
 
 	 <?php  if ( ! empty( $title ) ) {?>
    <div class="container text-center">
    	<div class="row">
	        <h2 class="head-border-orange"><?php echo esc_html( $title); ?></h2>
        </div>
    </div>
    <?php }?>
		 
		<!-- Wrapper for slides -->
        
        <div class="container">
            <div class="row">
        <?php if ( count($testimp)) :?>
		<div class="carousel-inner" role="listbox">
		
			<!-- First slide -->
           <?php $tm=0;
		   for($i = 0; $i < $num_testi; $i++) {?>
			<div class="item <?php if($i==0){?>active<?php }?>">
            	
 				<div class="col-xs-12 text-center">
                	<blockquote class="testimonial">
                    	
                        
                         <div class="text-center col-xs-12">
                         		<span class="quote quote_l col-xs-12 col-xs-4"></span>
                                
                                <div class="col-xs-12 col-xs-4">
                                  <a href="<?php echo  esc_url(get_post_meta( $testimp[$tm]->ID, 'EDU_PRESS_testimonials_url', true ));?>">
                        	<?php echo get_the_post_thumbnail( $testimp[$i]->ID, array(70,70) ); ?>
                            </a>
                            <p class="meta"><strong><?php echo esc_html(get_the_title( $testimp[$i]->ID )); ?></strong>
                            <cite><?php echo  esc_html(get_post_meta( $testimp[$i]->ID, 'EDU_PRESS_testi_job_title', true ));?></cite></p>
                            	</div>
                            
                           <span class="quote quote_r col-xs-12 col-xs-4"></span>
                        </div>
                         
                        <div class="text-center col-xs-12 col-md-10 col-sm-push-1">
                    	<p><?php echo $testimp[$i]->post_content;?></p>
						</div>
                       
                    </blockquote>
                </div> <!-- col 1 #end -->
 			</div> <!-- First slide -->
            <?php }?>
            
            
          
 		</div><!-- /.carousel-inner -->
        <?php endif;?>

		 <!-- Indicators -->
		<ol class="carousel-indicators">
         <?php $tm=0;
		   for($i = 0; $i < $num_testi; $i++) {?>
			<li data-target="#testimonials" data-slide-to="<?php echo esc_attr($i);?>" <?php if($i==0){?>class="active"<?php }?>></li>
             <?php }?>
 		</ol>
        
          </div>	<!-- row #end -->
	    </div> <!-- container #end -->
	</div>
 