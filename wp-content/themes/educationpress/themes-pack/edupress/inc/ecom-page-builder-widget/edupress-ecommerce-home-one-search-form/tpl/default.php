<?php
/**
 * @var $title
 * @var $form
 * @var $auto_on
 * @var $icon_on
 * @var $icon1
 * @var $icontext1
 * @var $icon2
 * @var $icontext2
 * @var $icon3
 * @var $icontext3
 * @var $icon4
 * @var $icontext4
 */
?>
<section class="search-form">
   		<div class="container">
        	<div class="row">
             <?php if ($form=='1' ) {
              if ( ! empty($title ) ) {?>
        	<h2 class="text-center"> <?php echo esc_html( $title ); ?></h2>
             <?php }?>
            <form action="<?php echo esc_url(home_url( '/' )); ?>" method="get" class="form-inline">
                <fieldset>
                    <div class="input-group">
                        <input type="text" name="s" autocomplete="off" <?php if($auto_on=='1'){?>id="s"<?php }?> placeholder="<?php esc_html_e("What do you want to learn today?",'edupress'); ?>" value="<?php the_search_query(); ?>" class="form-control" />
                        <input type="hidden" value="product" name="post_type" id="post_type" />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-orange btn-medium"><i class="lnr lnr-magnifier"></i><?php esc_html_e("Search",'edupress'); ?></button>
                        </span>
                    </div>
                </fieldset>
            </form><!-- #search-form #end  -->
            <?php }?>
            <?php if ( $icon_on=='1' ) {?>
            <div class="courses-count">
            
            	<?php 
				 if ( ! empty( $icontext1 ) ) {?>
            	<div class="col-sm-7 col-md-3 wow bounceInLeft">
                <h3>
               <?php echo siteorigin_widget_get_icon($icon1, array()); ?>
				<?php echo esc_html( $icontext1 ); ?>
                </h3> 
                </div>
                <?php } ?>
                
                <?php 
				 if ( ! empty( $icontext2 ) ) {?>
				<div class="col-sm-7 col-md-3 wow bounceInDown">
                <h3>
                <?php echo siteorigin_widget_get_icon($icon2, array()); ?>
				<?php echo esc_html( $icontext2 ); ?>
                </h3>
                </div>
                <?php } ?>
                
                <?php 
				 if ( ! empty( $icontext3 ) ) {?>
				<div class="col-sm-7 col-md-3 wow bounceInUp">
                <h3>
                <?php echo siteorigin_widget_get_icon($icon3, array()); ?>
				<?php echo esc_html( $icontext3 ); ?>
                </h3>
                </div>
                <?php } ?>
                
                <?php 
				 if ( ! empty( $icontext4 ) ) {?>
				<div class="col-sm-7 col-md-3 wow bounceInRight">
                <h3>
               <?php echo siteorigin_widget_get_icon($icon4, array()); ?>
				<?php echo esc_html( $icontext4 ); ?>
                </h3>
                </div>
                <?php } ?>
                
            </div>
			  <?php }?>
            </div> <!-- row #end -->
 		</div><!-- #container #end -->
       </section>
