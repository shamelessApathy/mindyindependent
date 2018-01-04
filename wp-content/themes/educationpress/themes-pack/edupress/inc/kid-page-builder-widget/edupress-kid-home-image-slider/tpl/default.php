<?php
/**
 * @var $image_slider
 * @var $style
 */
?>
<div class="col-xs-12">

	<!-- flexslider start -->
    <div class="<?php if( $style == '1' ) {?>flexslider  about-slide<?php } else {?>slider<?php } ?>">
      <?php if( $style == '2' ) {?>
      <div id="slider" class="flexslider2 about-slider">
      <?php
	  }
	  ?>
      <ul class="slides">
      	 <?php 
			$x = 0;
			
			foreach( $image_slider as $slider ) :
				 $x++;
				  $slider_image = siteorigin_widgets_get_attachment_image_src(
					$slider['slider_image'],
					'full',
					!empty( $image['slider_image_fallback'] ) ? $image['slider_image_fallback'] : ''
				 );
				 if (!empty( $slider_image )){
					?>
					
		         	<li data-thumb="slide3-thumb.jpg">
                    	<?php 
						if ( !empty( $slider['slider_url']) )
						{
							?>
                    	<a href="<?php echo $slider['slider_url'];?>" 
                        		<?php if( isset( $slider['slider__newwindow'] ) && $slider['slider__newwindow']  ) { ?> target="_blank" <?php } ?>>
                        <?php
						}
						?>
                        	<img src="<?php echo esc_url($slider_image[0]);?>" 
                            		alt="<?php echo $slider['slider_title'];?>" 
                                    title="<?php echo $slider['slider_title'];?>" 
                            />
                        <?php 
						if ( !empty( $slider['slider_url']) )
						{
							?>
                    		</a>
                        <?php
						}
						?>
                   </li>
         	<?php
					 }
			endforeach;
			?>
         <!--<li><a href="#"><img src="images/use_img/about-g2.jpg" alt="" ></a></li>-->
       </ul>
     <?php if( $style == '2' ) {?>
      </div>
      <?php
	  }
	  ?>
    
    <?php
	if( $style == '2' )
	{ ?>
	
    <div id="carousel" class="flexslider2 about-carousel">
          <ul class="slides">
                <?php
				$x = 0;
                foreach( $image_slider as $slider ) :
                 $x++;
                  $slider_image = siteorigin_widgets_get_attachment_image_src(
                    $slider['slider_image'],
                    'full',
                    !empty( $image['slider_image_fallback'] ) ? $image['slider_image_fallback'] : ''
                 );
                     if (!empty( $slider_image )){
                         ?>
                            <li>
                                 <img src="<?php echo esc_url($slider_image[0]);?>" alt="" />
                            </li>
                        <?php
                         }
                        endforeach;
                        ?>
           </ul>
      </div>
	 <?php
    }
    ?>
    
</div>
<!-- flexslider #end -->

</div>
<!--col-xs-12 end-->

