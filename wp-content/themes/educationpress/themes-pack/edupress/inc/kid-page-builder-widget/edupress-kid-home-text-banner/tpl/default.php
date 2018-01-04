<?php

if( !empty($bgimage) ) {
	$bgimage = siteorigin_widgets_get_attachment_image_src(
				$bgimage,
				'full',
				 ''
	);
	$background_style = array();
	$background_style[] = 'background-image: url(' . esc_url($bgimage[0]) . ')';
	}
?>

<section class="call-to-action"  <?php if( !empty($background_style) ) echo 'style="' .esc_attr(implode(';', $background_style)) . '"' ?>>
	<div class="container">
    	<div class="row">
        <div class="col-xs-12">
        	<div class="col-xs-12 col-sm-8">
			<h3><?php echo esc_html( $title );?></h3>
                <p>
                <?php
                    echo edupress_escape_desc( $desc );
                ?>
                </p>
 			</div>
            <?php
			if( !empty($btn_url )) 
			{
				?>
             <a href="<?php echo esc_url($btn_url);?>" class="btn btn-medium btn-default pull-right" <?php if( isset($btn_newwindow) && !empty($btn_newwindow) ) { ?> target="_blank" <?php } ?>><?php echo esc_html($btn_text);?>  <i class="lnr lnr-arrow-right"></i></a>
             <?php
			}
			?>
            </div>
		 </div> <!--row #end  -->
    </div><!--container #end  -->
</section> <!-- call-to-action #end --> 
    