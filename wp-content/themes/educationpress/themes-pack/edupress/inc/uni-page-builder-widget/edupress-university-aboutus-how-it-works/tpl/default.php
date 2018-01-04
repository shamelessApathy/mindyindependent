<?php
/**
 * @var $title
 * @var $desc
 * @var $features
 * @var $buttontext
 * @var $buttonurl
 * @var $text
 */
?>
<section class="howitworks">
            <div class="container">
                 <div class="row">  
                  <?php if ( ! empty( $title ) ) {?>
                   	<h2 class="text-center head-border-default"><?php echo esc_html( $title ); ?></h2>
                    <?php }?>
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                     <?php if ( ! empty( $desc ) ) {?>
                    <p class="text-center"><?php echo  $desc; ?></p>
                     <?php }?>
            		</div>
              
                    
                <div class="work-steps">  
                		<?php foreach( $features as $feature ) :
						$background_style = array();
						if( !empty($feature['bgcolor']) ) $background_style[] = 'background-color: ' . esc_attr($feature['bgcolor']).';';

						?>
                         <div class="col-xs-12 col-sm-4">
                        	<div class="steps" <?php if( !empty($background_style) ) echo 'style="' . implode(';', $background_style) . '"' ?>>
                            <?php if ( ! empty( $feature['title'] ) ) {?>
                            <h3><?php echo esc_html( $feature['title']); ?></h3>
                             <?php }?>
                            <?php if ( ! empty( $feature['desc']  ) ) {?>
                            <p><?php echo  $feature['desc']; ?></p>
                            <?php }?>
                            <?php if ( ! empty( $feature['icon'] ) ) {
                         	 echo siteorigin_widget_get_icon($feature['icon'], array());
                              }?>
                            </div>
                        </div> 
                        <?php 
						endforeach; ?>
                        
                 </div> <!-- work-steps #end -->    
                    
                  <div class="work-steps"> 
                    <div class="action text-center ">
                    	 <?php if ( ! empty( $text ) ) {?>
                    	<span><?php echo esc_html(  $text ); ?></span> 
                         <?php }?>
                         <?php if ( ! empty( $buttonurl ) ) {?>
                        <a href="<?php echo esc_url( $buttonurl ); ?>" class="btn btn-orange btn-large"><?php echo esc_html( $buttontext ); ?><i class="lnr lnr-arrow-right"></i></a>
                         <?php }?>
                    </div>
                  </div>   <!-- work-steps #end -->
                  
            	 </div> <!--row #end  -->
	        </div><!-- container #end -->
 </section>