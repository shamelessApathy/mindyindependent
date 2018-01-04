<?php
/*
 * Header Meta
 */
global $edupress_options;
?>
<div class="header_meta header_meta_two">
    <div class="container">
    	<div class="row"> 
      <?php  if ( ! empty( $edupress_options['edupress_home_title'] ) ) {?>
      <p class="site-description col-xs-12 col-sm-6" >
       <?php echo esc_html( $edupress_options['edupress_home_title'] ); ?>
      </p>
     <?php }?>
      <nav role="navigation" class="meta-login">
        <ul>
        <?php 
		if( !empty($edupress_options['edupress_header_call_or_social']) && $edupress_options['edupress_header_call_or_social'] == 'social' )  :?>
        	<?php get_template_part( 'ecom-template-parts/social-share' );?>
        <?php else:
		?>
        <?php  if ( ! empty( $edupress_options['edupress_header_phone'] ) ) {?>
          <li class="call"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Call Us', 'edupress' ); ?>  <?php echo esc_html( $edupress_options['edupress_header_phone'] ); ?></li>
          <?php }?>
         <?php endif; ?> 
          <?php
		 if( (isset( $edupress_options['edupress_header_login'] ) && $edupress_options['edupress_header_login']) || !isset( $edupress_options['edupress_header_login'] )) {
		 ?>
			 <?php 
             if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                    
                 if ( is_user_logged_in() ) {?>
                   <li><a href="<?php echo esc_url(wp_logout_url( site_url('/') ));?>"><?php esc_html_e( 'Log out', 'edupress' ); ?></a></li>
                 <?php } else {?>
                 <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e( 'Signup', 'edupress' ); ?></a></li>
                 <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e( 'Login', 'edupress' ); ?></a></li>
                  <?php }?>
             <?php }else{
                  if ( is_user_logged_in() ) {?>
                   <li><a href="<?php echo esc_url(wp_logout_url( site_url('/') ));?>"><?php esc_html_e( 'Log out', 'edupress' ); ?></a></li>
                   <?php } else {?>
                <li><a href="<?php echo esc_url(site_url( 'wp-login.php?action=register' ));?>"><?php esc_html_e( 'Signup', 'edupress' ); ?></a></li>
                <li><a href="<?php echo esc_url(wp_login_url());?>"><?php esc_html_e( 'Login', 'edupress' ); ?></a></li>
              <?php }
             }?>
        <?php
		 }
		 ?>
        </ul>
      </nav>
      </div> <!-- row #end -->
    </div> <!--container #end--> 
  </div>
