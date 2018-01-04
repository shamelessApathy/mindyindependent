<?php
/*
 * Header Logo
 */
global $edupress_options,$post;
$edupress_site_name  = get_bloginfo( 'name' );
$edupress_tag_line   = get_bloginfo ( 'description' );
?>
<div class="site-branding col-xs-12 text-center">
     <?php if ( !empty( $edupress_options['edupress_logo'] ) && !empty( $edupress_options['edupress_logo']['url'] ) ) {?>
     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php if(is_page_template( 'page-templates/home.php' )){ if($post->post_name=='home-page-2' && !is_front_page()) { echo get_template_directory_uri()."/images/ecom/logo_2.png"; }elseif($post->post_name=='home-page-3' && !is_front_page()){ echo get_template_directory_uri()."/images/ecom/logo_3.png";}else{ echo esc_url( !empty($edupress_options['edupress_home_three_logo']) && !empty($edupress_options['edupress_home_three_logo']['url']) ? $edupress_options['edupress_home_three_logo']['url'] :$edupress_options['edupress_logo']['url'] );} }else{ echo esc_url( $edupress_options['edupress_logo']['url'] ); } ?>" class="brand" alt="<?php echo esc_attr( $edupress_site_name ); ?>" /> </a>
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
	 }?>

    </div>
