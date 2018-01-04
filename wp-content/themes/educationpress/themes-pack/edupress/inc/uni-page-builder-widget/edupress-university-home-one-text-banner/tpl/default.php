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

<section class="remaining" <?php if( !empty($background_style) ) echo 'style="' .esc_attr(implode(';', $background_style)) . '"' ?>>
	<div class="container">
		<div class="row text-center">
        	<!--
        	
            -->
            <?php 
			if( empty( $icon ) ):
			?>
            	<i class="lnr lnr-graduation-hat"></i>
            <?php
			else:
			?> <!--
            	<i class="lnr <?php echo $icon;?>"></i>
                -->
            <?php
				//echo $icon;
				echo siteorigin_widget_get_icon($icon, array()); 
			endif;
			?>
            
    		<p>
			<?php
				echo edupress_escape_desc( $desc );
            ?>
			</p>
    	</div>
    </div>
</section>