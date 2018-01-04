<?php
/**
 * @var $title
 * @var $partners
 */
?>
<section class="col-xs-12 partnering-with-us">
    	<div class="container">
        	<div class="row">
        <?php  if ( ! empty( $title ) ) {?>
    	<h2 class="text-center head-border-default"><?php echo esc_html( $title ); ?></h2>
        <?php }?>
        <?php foreach( $partners as $partner ) :?>
        	<div class="col-sm-7 col-md-4">
            	<?php  if ( ! empty( $partner['title'] ) ) {?>
            	<h4><?php echo esc_html( $partner['title']  ); ?></h4>
                <?php }?>
                <?php if ( ! empty( $partner['desc']  ) ) {?>
                <p><?php echo $partner['desc'] ; ?></p>
                <?php }?>
            </div>
           <?php endforeach; ?>

            
            </div> <!--row #end  -->
        </div><!-- container #end -->
    </section>