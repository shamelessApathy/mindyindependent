<?php
/**
 * @var $title
 * @var $bgimage
 * @var $services
 * @var $buttontext1
 * @var $buttonurl1
 * @var $buttontext2
 * @var $buttonurl2
 */
?>
<?php 
$bgimage = siteorigin_widgets_get_attachment_image_src(
			$bgimage,
			'full',
			 ''
);
$background_style = array();
if( !empty($bgimage) ) {
$background_style[] = 'background-image: url(' . esc_url($bgimage[0]) . ');';
}
?>
<section class="home-third-why text-center parallax" <?php if( !empty($background_style) ) echo 'style="' . esc_attr(implode(';', $background_style)) . '"' ?>>
        			<div class="container">
                	<div class="row">
                    		
                        <?php if ( ! empty( $title ) ) {?>
                    	<h2 class="text-center head-border-orange"><?php echo esc_html( $title ); ?></h2> 
                         <?php }?>
                         
							<?php $x = 0;
                            foreach( $services as $service ) :
                            $x++; ?>
                         <div class="col-xs-12 col-sm-4 wow <?php if($x==1){?>bounceInLeft<?php }elseif($x==2){?> bounceInUp <?php }elseif($x==3){?> bounceInRight<?php }?>">
                         <div class="box">
                              	<?php if ( ! empty( $service['icon'] ) ) {
                         	 echo siteorigin_widget_get_icon($service['icon'], array());
                              }?>
                             
                             <?php if ( ! empty( $service['title'] ) ) {?>
                         	<h3><?php echo esc_html( $service['title']  ); ?></h3>
                              <?php }?>
                             <?php if ( ! empty( $service['desc']  ) ) {?>
                            <p><?php echo  $service['desc'] ; ?></p>
                             <?php }?>
                          </div>
                         </div>
                          <?php 
						  	if($x==3)
							{
								 $x = 0;
							}
						  	endforeach; ?>
                        
                        
                        
				 
	
                    </div>  <!-- row #end  -->
                </div> <!-- container #end  -->
        </section>