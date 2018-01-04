<?php
/**
 * @var $title
 * @var $desc
 */
?>
<section class="our-features">
    <div class="container">
        <div class="row">
        
        <div class="col-xs-12">
        	<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
            
            <?php
				echo $desc;
			?>
            
            <?php
			foreach( $features as $feature)
			{
			?>
            <div class="col-xs-12 col-sm-4 feature wow bounceInLeft animated" style="visibility: visible; animation-name: bounceInLeft;">
            	<?php echo siteorigin_widget_get_icon($feature['icon'], array()); ?>
            	<h3><?php echo $feature['title'];?></h3>
                <p><?php echo  $feature['desc'];?></p>
            </div>
            <?php
			}
			?>
         
            
            <?php
			if( !empty($btn_url )) 
			{
				?>
            <div class="text-center col-xs-12">
            	<a href="<?php echo esc_url($btn_url);?>" data-animation="animated zoomInUp" class="btn btn-medium btn-default" <?php if( isset($btn_newwindow) && !empty($btn_newwindow) ) { ?> target="_blank" <?php } ?>><?php echo esc_html($btn_text);?> <i class="lnr lnr-arrow-right"></i></a>
        	</div>
            <?php
			}
			?>
            
        	</div> <!-- col-xs-12 #end -->
        </div><!-- row #end -->
    </div> <!-- container #end -->
</section>
<!--col-xs-12 end-->

