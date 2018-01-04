     <?php
/*
 * Header Meta
 */
global $educationpress_options,$signup_url;
?>
<div class="header_meta header_meta_two">
    <div class="container">
    	<div class="row"> 
      <?php  
	  if ( ! empty( $educationpress_options['educationpress_home_title'] ) ) {?>
          <p class="site-description col-xs-12 col-sm-6" >
           <?php echo esc_html( $educationpress_options['educationpress_home_title'] ); ?>
          </p>
     <?php }
	 ?>
     
      <nav class="meta-login">
        <ul>
        <?php 
		if( !empty($educationpress_options['educationpress_header_call_or_social']) && $educationpress_options['educationpress_header_call_or_social'] == 'social' )  :?>
        	<?php get_template_part( 'template-parts/social-share' );?>
        <?php else:
		?>
        <?php  if ( ! empty( $educationpress_options['educationpress_header_phone'] ) ) {?>
          <li class="call"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Call Us', 'educationpress' ); ?>  <?php echo esc_html( $educationpress_options['educationpress_header_phone'] ); ?></li>
          <?php }?> 
         <?php
		 endif;?>
          <?php
		 if( isset( $educationpress_options['educationpress_header_login'] ) && $educationpress_options['educationpress_header_login'] ) {
		 ?>
         <?php if (class_exists( 'CoursePress' )){
			 if ( is_user_logged_in() ) {?>
               <li><a href="<?php echo esc_url(wp_logout_url( site_url('/') ));?>"><?php esc_html_e( 'Log out', 'educationpress' ); ?></a></li>
             <?php } else {?>
             <li><a href="<?php echo esc_url($signup_url);?>"><?php esc_html_e( 'Signup', 'educationpress' ); ?></a></li>
             <li><a href="<?php echo esc_url(cp_student_login_address());?>"><?php esc_html_e( 'Login', 'educationpress' ); ?></a></li>
              <?php }?>
		 <?php }else{
			  if ( is_user_logged_in() ) {?>
               <li><a href="<?php echo esc_url(wp_logout_url( site_url('/') ));?>"><?php esc_html_e( 'Log out', 'educationpress' ); ?></a></li>
               <?php } else {?>
            <li><a href="<?php echo esc_url(site_url( 'wp-login.php?action=register' ));?>"><?php esc_html_e( 'Signup', 'educationpress' ); ?></a></li>
            <li><a href="<?php echo esc_url(wp_login_url());?>"><?php esc_html_e( 'Login', 'educationpress' ); ?></a></li>
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
