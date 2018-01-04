<?php
/**
 * @var $slider_two
 */
?>
<style>.home-two-slider .btn-orange {color:<?php echo $button_color?> !important; background:<?php echo $button_bgcolor?>; border-color:<?php echo $button_bgcolor?>; } .home-two-slider .btn-orange:hover {			color:<?php echo $button_hover_color?> !important; background:<?php echo $button_hover_bgcolor?>;		border-color:<?php echo $button_hover_bgcolor?>;}
<?php 
if( $text_in_slide == 'no'  )
{
?>
	@media (max-width: 768px) {
		.flexslider .slides li {min-height: 150px; background-size:100%; }
	}
<?php
}
?>                   
</style>
<div class="flexslider home-two-slider"
		 data-slider_order="<?php echo $slider_order == 'random'?'true':'false';?>"            data-slider_animation="<?php echo $slider_animation;?>" data-slider_direction="<?php echo $slider_direction;?>" data-slider_show_speed="<?php echo intval( $slider_show_speed );?>"  data-slider_animation_speed="<?php echo intval( $slider_animation_speed );?>" data-slider_slide_show="<?php echo intval( $slider_slide_show );?>">
          <ul class="slides">
 		  <?php $x = 0;
		  foreach( $slider_two as $slider ) :
			$x++;
		  	$slider_image = siteorigin_widgets_get_attachment_image_src(
			$slider['slider_image'],
			'full',
			!empty( $frame['slider_image_fallback'] ) ? $frame['slider_image_fallback'] : ''
		);
		   ?>
			<!-- #item start -->
			<li <?php if (!empty( $slider_image )){?>style="background:<?php echo esc_url($slider_bg_color);?>  url(<?php echo esc_url($slider_image[0]);?>) no-repeat center; 
                	background-size:cover; 
				"<?php }?>>
            	<?php 
				 if( $text_in_slide == 'yes'  ):				 
				 ?>
             	 	<div class="container">
                 		<div class="row">
                    		<div class="slide-caption align-center">
								<?php if ($slider['slider_title']){?>
                                <h2 data-animation="animated bounceInLeft head-border-orange"  style="color:<?php echo $title_color?>;">
                                    <?php echo esc_html($slider['slider_title']);?>
                                </h2>
                                 <?php }?>
                                 <?php if ($slider['slider_desc']){?>
                                <p data-animation="animated bounceInUp" style="color:<?php echo $desc_color;?>;"><?php echo $slider['slider_desc'];?>
                                </p>
                                 <?php }?>
                                  <?php if ($slider['slider_buttonurl']){?>
                                 <a class="btn btn-orange btn-medium"
                                            
                                 
                                  data-animation="animated zoomInUp" <?php if( ! empty( $slider['slider_newwindow'] ) ) {?> target="_blank" <?php } ?> href="<?php echo esc_url($slider['slider_buttonurl']);?>"><?php echo  esc_html($slider['slider_buttontext']);?> <i class="lnr lnr-arrow-right"></i></a>
                                  <?php }?>
                      
                          </div>
                      </div>
                   </div>  
                   <?php 
				   endif;
				   ?>
			</li> <!-- #item end -->
           <?php endforeach; ?>
            </ul>
		
		</div><!-- /.flexslider -->	 
