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
/*
echo '<pre>';
print_r($testimp);
echo '</pre>';
die;
*/

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
<div id="testimonials"  data-speed="<?php echo intval($speed);?>"  class="<?php if($style == '2') {?>testimonials-home-two<?php } else{ ?>testimonials-kindergarten <?php }?> carousel slide" <?php if( !empty($background_style) ) echo 'style="' .esc_attr(implode(';', $background_style)) . '"' ?>>
	<div class="container">
    	<div class="row widget">
        
         <?php
		if ( $testimp) :?>	
             <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <?php
             for($i = 0; $i < $num_testi; $i++) {?>
                
                <!-- First slide -->
                <div class="item <?php if($i==0){?>active<?php }?>">
                    <div class="col-xs-12 col-md-12">
                        <blockquote>
                            <p><?php echo $testimp[$i]->post_content;?></p>
                            <footer>
                            <?php echo get_the_post_thumbnail( $testimp[$i]->ID, array(70,70) ); ?>
                            <span><?php echo esc_html(get_the_title( $testimp[$i]->ID )); ?></span>
                            <cite><?php echo  esc_html(get_post_meta( $testimp[$i]->ID, 'EDU_PRESS_testi_job_title', true ));?></cite>
                        </footer>
                        </blockquote>
                    </div>
                </div>
             <?php
             }
             ?>
            </div><!-- /.carousel-inner -->
                
                 <!-- Indicators -->
            <ol class="carousel-indicators">
			   <?php $tm=0;
               for($i = 0; $i < $num_testi; $i++) {?>
                <li data-target="#testimonials" data-slide-to="<?php echo esc_attr($i);?>" <?php if($i==0){?>class="active"<?php }?>></li>
                <?php }?>
            </ol>
          <?php
		 endif;
		  ?>	
                
        </div> <!--row #end  -->
    </div><!--container #end  -->
</div> <!-- testimonials #end --> 
    
 