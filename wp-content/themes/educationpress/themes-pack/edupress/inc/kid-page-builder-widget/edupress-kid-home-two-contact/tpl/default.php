<?php
?>
<div class="contact-home-vtwo">
	<div class="container">
    	<div class="row">
        
        			<h3><?php echo esc_html( $title );?></h3>
                    <p class="sub-line"><?php echo wp_kses_post( $desc );?></p>
                    
                    <div class="col-xs-12 col-sm-4"> 
                         <div class="contact-address cinfo">
                            <h3><i class="lnr lnr-map-marker"></i> <?php echo esc_html( $adr_title );?></h3>
                            <?php echo wp_kses_post( $adr_desc );?>
                        </div>
                    </div> <!-- col 1 #end -->
                    
                    <div class="col-xs-12 col-sm-4"> 
                         <div class="contact-phone cinfo">
                            <h3><i class="lnr lnr-smartphone"></i>  <?php echo esc_html( $phone_email_title );?></h3>
                            <?php echo wp_kses_post( $phone_email_desc );?>
                        </div>
                    </div> <!-- col 1 #end -->
                    
                    <div class="col-xs-12 col-sm-4"> 
                         <div class="contact-hours cinfo">
                            <h3><i class="lnr lnr-clock"></i>  <?php echo esc_html( $office_hours_title );?></h3>
                           <?php echo wp_kses_post( $office_hours_email_desc );?>
                        </div>
                    </div> <!-- col 1 #end -->
                  	
             
             <?php
			 if( !empty($contact_short_code) ):?>
             <div class="col-xs-12 contact-form-vtwo"> 
             	<?php echo do_shortcode( $contact_short_code ); ?>
             </div> <!--contact-form-vtwo  -->
             <?php endif;?>

   		</div> <!--row #end  -->
    </div><!--container #end  -->
</div> <!-- contact-home-vtwo #end -->  

    