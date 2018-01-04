<section class="partners">
	<div class="container">
    	<div class="row widget">
        		
                 <header><h3><?php echo esc_html( $title );?></h3></header>
            	
        		
        		<div id="owl-partners" class="owl-carousel">
              	<?php
				foreach( $partners as $partner ) :
				
		
			
				$partner_image = siteorigin_widgets_get_attachment_image_src(
						$partner['partner_image'],
						'full',
						!empty( $frame['partner_image_fallback'] ) ? $frame['slider_image_fallback'] : ''
					 );
					 
					 
					
				?>
                    <div class="col-xs-12 zoom">
                        <a href="<?php echo esc_url($partner['partner_link']);?>"
                        <?php if( isset($partner['partner_newwindow']) && $partner['partner_newwindow']) {?>target="_blank"<?php }?> class="img-thumb"><figure><img src="<?php echo esc_url($partner_image[0]);?>" alt="<?php echo esc_attr($partner['partner_title']);?>" title="<?php echo esc_attr($partner['partner_title']);?>"  /></figure></a>
                    </div> <!-- col 1 #end -->
				<?php
				endforeach;
				?>                
        	</div> <!-- owl-Campus #end  -->
            
        </div> <!--row #end  -->
     </div>
</section> <!-- partners #end -->
