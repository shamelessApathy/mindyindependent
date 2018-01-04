<?php
/*
 * Header Meta One 
 */
global $edupress_options;
?>

<?php
if( isset( $edupress_options['edupress_header_social_share'] ) && $edupress_options['edupress_header_social_share'] ):
	 get_template_part( 'uni-template-parts/social-share' );
endif;

?>
<nav class="meta-login">
    <ul>
      <li class="clock"><i class="lnr lnr-clock"></i><?php echo !empty( $edupress_options['edupress_header_time']) ? $edupress_options['edupress_header_time'] : '' ;?></li>
      <li class="call"><i class="lnr lnr-smartphone"></i>Call Us  <?php echo !empty( $edupress_options['edupress_header_phone']) ? $edupress_options['edupress_header_phone'] : '' ;?></li>
    </ul>
</nav>