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
<div id="testimonials"   data-speed="<?php echo intval($speed);?>"  class="testimonials-univ carousel slide" <?php if( !empty($background_style) ) echo 'style="' .esc_attr(implode(';', $background_style)) . '"' ?>>
     
		 
		<!-- Wrapper for slides -->
        <?php
		if ( $testimp) :?>
          <div class="container">
    			<div class="row widget">
					<div class="carousel-inner" role="listbox">
			   			<?php
               for($i = 0; $i < $num_testi; $i++) {?>
                    <div class="item <?php if($i==0){?>active<?php }?>">
                        <div class="col-xs-12 col-md-12">
                        <blockquote>
                            <p><?php echo $testimp[$i]->post_content;?></p>
                            <footer>
                             <a href="<?php echo  esc_url(get_post_meta( $testimp[$tm]->ID, 'EDU_PRESS_testimonials_url', true ));?>">
                      		      <?php echo get_the_post_thumbnail( $testimp[$i]->ID, array(70,70) ); ?>
                            </a>
                            <span><?php echo esc_html(get_the_title( $testimp[$i]->ID )); ?></span>
                             <cite><?php echo  esc_html(get_post_meta( $testimp[$i]->ID, 'EDU_PRESS_testi_job_title', true )); ?></cite>
                        </footer>
                        </blockquote>
                    </div>
                    </div> <!-- col 1 #end -->
                <?php
                }
                ?>	
                	
					</div><!-- /.carousel-inner -->
		<?php endif;?>

		 <!-- Indicators -->
         
			<ol class="carousel-indicators">
           <?php 
		   	for($i = 0; $i < $num_testi; $i++) {?>
				<li data-target="#testimonials" data-slide-to="<?php echo esc_attr($i);?>" <?php if($i==0){?>class="active"<?php }?>></li>
            <?php }?>
		</ol>
        </div> <!--row #end  -->
    </div><!--container #end  -->
</div><!-- testimonials life #end -->
    
 