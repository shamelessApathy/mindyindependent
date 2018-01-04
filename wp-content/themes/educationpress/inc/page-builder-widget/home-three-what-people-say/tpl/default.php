<?php
/*
 * Testimonials For Home Page Three
 */
global $educationpress_options;
$number_of_testim = intval( $testi_no );
$recent_testim_args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => $number_of_testim,
    'ignore_sticky_posts' => 1,
);


// The Query
//$recent_testim_query = new WP_Query( $recent_testim_args );
$recent_testim_query = new WP_Query( $recent_testim_args );

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
 <div id="testimonials"  data-speed="<?php echo intval($speed);?>"  class="carousel slide home-two-testimonials home-third-testimonials" <?php if( !empty($background_style) ) echo 'style="' . esc_attr(implode(';', $background_style)) . '"' ?>>
 	<?php  if ( ! empty( $title) ) {?>
    <div class="container text-center">
    	<div class="row">
        <h2 class="head-border-orange"><?php echo esc_html( $title ); ?></h2>
        </div>  <!--row #end--> 
    </div><!--container #end--> 
     <?php }?>
		 
		<!-- Wrapper for slides -->
 
 <div class="container">
    	<div class="row">
         <?php if ( $recent_testim_query->have_posts()) :?>
		<div class="carousel-inner" role="listbox">
		
			<!-- First slide -->
			<?php
            $recp=0;
            while ( $recent_testim_query->have_posts() ) {
            $recp++;
            $recent_testim_query->the_post();?>
			<div class="item  <?php if($recp==1){?>active<?php }?>">
            	 
 				<div class="col-xs-12 text-center">
                	<blockquote class="testimonial">
                    	
                        
                         <div class="text-center col-xs-12">
                         		<span class="quote quote_l col-xs-12 col-xs-4"></span>
                                
                                <div class="col-xs-12 col-xs-4">
                                <a href="<?php echo  esc_html(get_post_meta( $popular_course->ID, 'EDU_PRESS_testimonials_url', true )) ;?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail(array(70,70)); ?>
                                </a>
                            <p class="meta"><strong><?php the_title(); ?></strong>
                            <cite><?php echo  esc_html(get_post_meta( $popular_course->ID, 'EDU_PRESS_testi_job_title', true ));?></cite></p>
                            	</div>
                            
                           <span class="quote quote_r col-xs-12 col-xs-4"></span>
                        </div>
                         
                        <div class="text-center col-xs-12 col-md-10 col-sm-push-1">
                    	<?php the_content();?>
						</div>
                       
                    </blockquote>
                </div> <!-- col 1 #end -->
 			</div> <!-- First slide -->
            <?php }?>
            
            
  		
		</div><!-- /.carousel-inner -->
		 <?php endif;?>
         
		 <!-- Indicators -->
		<ol class="carousel-indicators">
        <?php for($i = 0; $i <  $recp; $i++) {?>
			<li data-target="#testimonials" data-slide-to="<?php echo  esc_attr($i);?>" <?php if($i==0){?>class="active"<?php }?>></li>
        <?php }?>
 		</ol>
	
     </div>  <!--row #end--> 
    </div><!--container #end--> 
   </div>
