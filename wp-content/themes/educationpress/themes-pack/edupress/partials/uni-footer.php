<?php
global $edupress_options;
?>
<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
  	<div class="row newsletter">
    	<div class="col-xs-12 col-sm-4">
        	<?php if ( !empty( $edupress_options['edupress_footer_logo'] ) && 
				!empty( $edupress_options['edupress_footer_logo']['url'] ) ) {?>
        	<img src="<?php echo esc_url( $edupress_options['edupress_footer_logo']['url'] );?>" alt="<?php echo get_bloginfo( 'name' );?>" />
           	<?php 
			}
			else 
			{
			?>
            	<img src="<?php echo get_template_directory_uri(); ?>/images/uni/footer_logo.png" alt="<?php echo get_bloginfo( 'name' );?>" />
            <?php
			}
			?>
        </div>
        <?php
		if( isset( $edupress_options['edupress_newsletter'] ) && $edupress_options['edupress_newsletter']) {
		?>
        <div class="col-xs-12 col-sm-6 pull-right">
            <h3>
				<?php if ( ! empty( $edupress_options['edupress_newsletter_title'] ) ) {?>
             		<?php echo esc_html( $edupress_options['edupress_newsletter_title'] ); ?></h3>
             	<?php  }?>
              </h3>
            <?php 
			if ( ! empty( $edupress_options['edupress_newsletter_shortcode'] ) ) {
				 echo do_shortcode($edupress_options['edupress_newsletter_shortcode']);
			 }
			 ?>
        </div>
        <?php
		}
		?>
    </div>
  	
     <div class="row">
     
     	<?php
		if( empty($edupress_options['edupress_footer_column']) ):
			$edupress_options['edupress_footer_column']  =  3 ;
		endif;
		$footer_column = intval($edupress_options['edupress_footer_column']);
		$single_footer_digit = intval( 12 / $footer_column );
		for( $i=1; $i<=$footer_column; $i++):
		?>
		<div class="col-xs-12 col-sm-<?php echo $single_footer_digit;?> footer-widget">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_'.$i) ) : ?>
			<?php endif; ?>
			<?php 
			if(  $i == 1 && isset( $edupress_options['edupress_footer_social_share'] ) &&  $edupress_options['edupress_footer_social_share']) {
				?>
			
			<aside class="widget socialmedia-widget">
				<?php
				get_template_part( 'uni-template-parts/social-share' );
				?>
			</aside>
			<?php
			}
			?>
		</div>
		<?php
		endfor;
     	?>
     
     </div>
  </div><!--container #end  -->
  
<div class="footer-bottom">  
  <div class="container">
  	<div class="row">
        <div class="copyright">
        	<?php if ( ! empty( $edupress_options['edupress_copyright_html'] ) ) {?>
            <p class="copy col-xs-12 col-sm-6">
            <?php echo edupress_escape_string($edupress_options['edupress_copyright_html']); ?>
            </p>
           <?php } ?>
           <?php if ( ! empty( $edupress_options['edupress_developby_html'] ) ) {?>
            <p class="develop col-xs-12 col-sm-4 text-right">
            <?php echo edupress_escape_string($edupress_options['edupress_developby_html']); ?>
            </p>
           <?php } ?>
        </div>
    </div>
  </div>
 </div> 
</footer>
<!-- #colophon -->
</div>
<!-- #page -->