<?php
/*
 * Header Meta One 
 */
global $edupress_options;
?>
<p class="contact-info col-xs-12 col-sm-6">
    <span><i class="fa fa-mobile"></i><?php echo $edupress_options['edupress_header_phone'];?></span>  <span><i class="fa fa-envelope-o"></i><?php echo $edupress_options['edupress_header_email'];?></span>   
</p>
<?php
if( isset( $edupress_options['edupress_header_social_share'] ) && $edupress_options['edupress_header_social_share'] ):
	 get_template_part( 'uni-template-parts/social-share' );
endif;
?>