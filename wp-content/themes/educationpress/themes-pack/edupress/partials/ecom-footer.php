<?php
global $edupress_options, $post;
 if ( !empty( $edupress_options[ 'edupress_newsletter' ] ) && $edupress_options[ 'edupress_newsletter' ] ) {?>
<div class="signup-newsletter <?php if(($edupress_options['edupress_header_variation']=='2' || $edupress_options['edupress_header_variation']=='3') || ( !is_front_page() && is_page_template( 'page-templates/home.php' ) && isset($post) && !empty( $post ) 
 && (    $post->post_name=='home-page-2' || $post->post_name=='home-page-3' ) )){
	?>home-two-newsletter<?php }?>">
	<div class="container">
    	<div class="row">
            <div class="col-xs-12 col-sm-6">
             <span class="i-email-subscribe">
             	<i class="icon-envelope-letter icons"></i>
             </span>
             <?php if ( ! empty( $edupress_options['edupress_newsletter_title'] ) ) {?>
             <h3><?php echo esc_html( $edupress_options['edupress_newsletter_title'] ); ?></h3>
             <?php  }?>
             <?php if ( ! empty( $edupress_options['edupress_newsletter_desc'] ) ) {?>
             <p><?php echo esc_html( $edupress_options['edupress_newsletter_desc'] ); ?></p>
              <?php  }?>
             </div>
             
			<?php if ( ! empty( $edupress_options['edupress_newsletter_shortcode'] ) ) {?>
            <div class="col-xs-12 col-sm-6">
            <?php  echo do_shortcode($edupress_options['edupress_newsletter_shortcode']);?>
            </div>
            <?php  }?>
            
        </div> 
    </div>
</div> <!-- #signup_newsletter End -->
<?php  }?>

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
     <div class="row">
     	<?php
		if( empty($edupress_options['edupress_footer_column']) ):
			$edupress_options['edupress_footer_column'] = 4;
		endif;
		$footer_column = intval($edupress_options['edupress_footer_column']);
		$single_footer_digit = intval( 12 / $footer_column );
		for( $i=1; $i<=$footer_column; $i++):
		?>
		<div class="col-xs-12 col-sm-<?php echo $single_footer_digit;?> footer-widget">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_'.$i) ) : ?>
			<?php endif; ?>
		</div>
		<?php
		endfor;
		
		?>
    </div>
  </div><!--container #end  -->
  
  
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
  
</footer>
<!-- #colophon -->
</div>
<!-- #page -->