<?php
/**
 * @var $title
 * @var $desc
 */
 if( is_array($features) && !empty($features))
 {
?>
<section class="notice">
    <div class="container">
        <div class="row">
        	<?php
			foreach( $features as $feature)
			{
			?>
        	<div class="col-xs-12 col-sm-6">
            	<div class="icon"><?php echo siteorigin_widget_get_icon($feature['icon'], array()); ?> </div>
                 <div class="notice-info">
                <h3><?php echo $feature['title'];?></h3>
                <p><?php echo wp_kses_post($feature['title']);?></p>
                </div>
            </div> <!-- col #end-->
             <?php
			}
			?>
        </div> <!-- row #end -->
    </div> <!-- container #end -->
</section>
<?php
 }
 ?>
