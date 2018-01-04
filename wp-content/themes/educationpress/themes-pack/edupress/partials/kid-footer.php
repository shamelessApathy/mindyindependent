<?php
	global $edupress_options, $post;
	
	
//Start for remaining section in footer
if( isset( $edupress_options['edupress_footer_is_footer_top_banner'] ) &&  $edupress_options['edupress_footer_is_footer_top_banner'] && !(is_page_template( 'page-templates/home.php' ) && $post->post_name=='home-page-2' && !is_front_page()) )
{
	$title = $edupress_options['edupress_footer_footer_top_banner_title'];
	$desc = $edupress_options['edupress_footer_footer_top_banner_desc'];
	
	$btn_text 	  = $edupress_options['edupress_footer_footer_top_banner_btn_text'];
	$btn_url 	   = $edupress_options['edupress_footer_footer_top_banner_btn_link'];
	$btn_newwindow = $edupress_options['edupress_footer_footer_top_banner_btn_newwindow'];
	
	
	?>
	<section class="call-to-action">
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
				if( !empty( $btn_url )) 
				{
					?>
				 <a href="<?php echo esc_url($btn_url);?>" class="btn btn-medium btn-default pull-right" <?php if( isset($btn_newwindow) &&  $btn_newwindow ) { ?> target="_blank" <?php } ?>><?php echo esc_html($btn_text);?>  <i class="lnr lnr-arrow-right"></i></a>
				 <?php
				}
				?>
				</div>
			 </div> <!--row #end  -->
		</div><!--container #end  -->
	</section> <!-- call-to-action #end --> 
    <?php	
}
//end for remaining section in footer
	


?>
<footer class="site-footer <?php if(is_page_template( 'page-templates/home.php' ) && $post->post_name=='home-page-2' && !is_front_page()) {?>site-footer-two<?php }?>">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
      	<!--<img src="images/flogo3.png" alt="" />-->
        <?php
       
		$edupress_site_name  = get_bloginfo( 'name' );
		$edupress_tag_line   = get_bloginfo ( 'description' );

        if ( !empty( $edupress_options['edupress_logo'] ) && !empty( $edupress_options['edupress_logo']['url'] ) ) {?>
        	<img src="<?php if(is_page_template( 'page-templates/home.php' )){ if($post->post_name=='home-page-2' && !is_front_page()) { echo get_template_directory_uri()."/images/kid/f_logo2.png"; }elseif($post->post_name=='home-page-1' && !is_front_page() ){ echo get_template_directory_uri()."/images/kid/logo.png";}else{ echo esc_url( $edupress_options['edupress_logo']['url'] );}}else{ echo esc_url( $edupress_options['edupress_logo']['url'] ); } ?>" class="brand" alt="<?php echo esc_attr( $edupress_site_name ); ?>" />
        
			<?php }else{?>
          <?php if ( is_front_page() && is_home() ) : ?>
           <h1 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php echo esc_html( $edupress_site_name ); ?></a></h1>
           <?php else : ?>
           <h2 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home"><?php echo esc_html( $edupress_site_name ); ?></a></h2>
           <?php endif; ?>
           <?php
           if( ! empty( $edupress_tag_line ) ) {
                ?><small class="tag-line"><?php echo esc_html( $edupress_tag_line ); ?></small><?php
            }
         }
         ?>
       </div>
    </div>
    <div class="row">
            
      <?php
		if( empty($edupress_options['edupress_footer_column']) ):
			$edupress_options['edupress_footer_column'] = 3; 
		endif;
		
		$footer_column = intval($edupress_options['edupress_footer_column']);
		$single_footer_digit = intval( 12 / $footer_column );
		for( $i=1; $i<=$footer_column; $i++):
		?>
		<?php
		  if( $i == 3 &&  isset( $edupress_options['edupress_newsletter'] ) && $edupress_options['edupress_newsletter']) {
			?>
		  <div class="col-xs-12 col-sm-4 footer-widget">
			<aside id="signupform" class="widget newsletter-widget">
				<?php if ( ! empty( $edupress_options['edupress_newsletter_title'] ) ) {?>
				 <h3><?php echo esc_html( $edupress_options['edupress_newsletter_title'] ); ?></h3>
				 <?php
				}
				?>
				 <?php if ( ! empty( $edupress_options['edupress_newsletter_desc'] ) ) {?>
				 <p><?php echo esc_html( $edupress_options['edupress_newsletter_desc'] ); ?></p>
				  <?php  }?>
				 <?php 
				if ( ! empty( $edupress_options['edupress_newsletter_shortcode'] ) ) {
					 echo do_shortcode($edupress_options['edupress_newsletter_shortcode']);
				 }
				 ?>
			 </aside>
		  </div>
			<?php
			}
			else
			{
			?>
			
			<div class="col-xs-12 col-sm-<?php echo $single_footer_digit;?> footer-widget">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_'.$i) ) : ?>
				<?php endif; ?>
				 <?php 
				if( $i == 1 && isset( $edupress_options['edupress_footer_social_share'] ) &&  $edupress_options['edupress_footer_social_share']) {
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
			}
			?>
		<?php
		endfor;
		?>      
            
    	
    
      
      
    </div> <!-- row #end -->
  </div>
  <!--container #end  -->
  
  <div class="footer-bottom <?php if(is_page_template( 'page-templates/home.php' ) && $post->post_name=='home-page-2' && !is_front_page()) {?>footer-bottom-two <?php } ?>">
    <div class="container">
      <div class="row">
        <div class="copyright">
          <p class="copy col-xs-12 col-sm-6"> 
          	 <?php if ( ! empty( $edupress_options['edupress_copyright_html'] ) ) {?>
             	<?php echo edupress_escape_string($edupress_options['edupress_copyright_html']); ?>
			 <?php } ?>

          </p>
          <p class="develop col-xs-12 col-sm-4 text-right">  
          	 <?php if ( ! empty( $edupress_options['edupress_developby_html'] ) ) {?>
              <?php echo edupress_escape_string($edupress_options['edupress_developby_html']); ?>
              <?php } ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>