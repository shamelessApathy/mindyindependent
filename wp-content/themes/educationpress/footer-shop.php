<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EducationPress
 */
global $educationpress_options, $post;
?>
				</main><!-- #main -->
            <?php 
			if( is_shop() || is_product() )  {
				
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			}
			?>
            </div>  <!-- #row -->
        </div><!-- #container -->
    </div> <!-- primary #end -->
</div>

</div>
<!-- #content -->
 <?php if ( !empty( $educationpress_options[ 'educationpress_newsletter' ] ) && $educationpress_options[ 'educationpress_newsletter' ] ) {
	 
	 ?>
<div class="signup-newsletter 
<?php if(($educationpress_options['educationpress_header_variation']=='2' || $educationpress_options['educationpress_header_variation']=='3') || ( !is_front_page() && is_page_template( 'page-templates/home.php' ) && isset($post) && !empty( $post ) 
 && (    $post->post_name=='home-page-2' || $post->post_name=='home-page-3' ) )){
	?>
    home-two-newsletter
	<?php }?>">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12 col-sm-6">
             <span class="i-email-subscribe">
				<i class="icon-envelope-letter icons"></i>
			</span>
             <?php if ( ! empty( $educationpress_options['educationpress_newsletter_title'] ) ) {?>
             <h3><?php echo esc_html( $educationpress_options['educationpress_newsletter_title'] ); ?></h3>
             <?php  }?>
             <?php if ( ! empty( $educationpress_options['educationpress_newsletter_desc'] ) ) {?>
             <p><?php echo esc_html( $educationpress_options['educationpress_newsletter_desc'] ); ?></p>
              <?php  }?>
             </div>
             
			<?php if ( ! empty( $educationpress_options['educationpress_newsletter_shortcode'] ) ) {?>
            <div class="col-xs-12 col-sm-6">
            <?php  echo do_shortcode($educationpress_options['educationpress_newsletter_shortcode']);?>
            </div>
            <?php  }?>
            
        </div> 
    </div>
</div> <!-- #signup_newsletter End -->
<?php  }?>

<footer id="colophon" class="site-footer">
  <div class="container">
     <div class="row">
     	<?php
		if( !empty($educationpress_options['educationpress_footer_column']) ):
			$footer_column = intval($educationpress_options['educationpress_footer_column']);
			$single_footer_digit = intval( 12 / $footer_column );
			for( $i=1; $i<=$footer_column; $i++):
			?>
			<div class="col-xs-12 col-sm-<?php echo $single_footer_digit;?> footer-widget">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_'.$i) ) : ?>
				<?php endif; ?>
			</div>
			<?php
			endfor;
		endif;
		?>
        
    </div>
  </div><!--container #end  -->
  
  
  <div class="container">
  	<div class="row">
        <div class="copyright">
        <?php if ( ! empty( $educationpress_options['educationpress_copyright_html'] ) ) {?>
        <p class="copy col-xs-12 col-sm-6">
        <?php echo educationpress_escape_string($educationpress_options['educationpress_copyright_html']); ?>
        </p>
       <?php } ?>
       <?php if ( ! empty( $educationpress_options['educationpress_developby_html'] ) ) {?>
        <p class="develop col-xs-12 col-sm-4 text-right">
        <?php echo educationpress_escape_string($educationpress_options['educationpress_developby_html']); ?>
        </p>
       <?php } ?>
        </div>
    </div>
  </div>
  
</footer>
<!-- #colophon -->
</div>
<!-- #page -->
<?php wp_footer(); ?>
</body></html>