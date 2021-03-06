<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPress
 */
global $edupress_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<base href="<?php echo esc_url(home_url( '/' )); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
    /*
     * Page loader
     */
    if ( $edupress_options[ 'edupress_page_loader' ] == '1' ) {
        $page_loader_gif = get_template_directory_uri() . '/images/page-loader-img.gif';
        if ( !empty( $edupress_options['edupress_page_loader_gif']['url'] ) ) {
            $page_loader_gif = $edupress_options['edupress_page_loader_gif']['url'];
        }
        ?>
        <div class="page-loader">
            <img class="page-loader-img" src="<?php echo esc_url( $page_loader_gif ); ?>" alt="<?php esc_attr( 'Loading...'); ?>"/>
        </div>
        <?php
    }
    ?>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'edupress' ); ?>
</a>
<header id="masthead" class="site-header home-third-header" >
  <div class="container">
     <div class="row">
     <!-- #site-branding #start -->
     <?php get_template_part( 'partials/ecom-header/logo-three' );?>
     <!-- #site-branding #end -->
     </div><!--row #end-->
  </div><!--container #end--> 
  
    <div class="navbar-header">
      <a class="left-navbar-toggle" href="#menu-left"> <i class="fa fa-bars fa-2x"></i> </a>
    </div>
    
  
  <!-- #search-form #start  -->
   <?php get_template_part( 'partials/ecom-header/search-form-three' );?>
  <!-- #search-form #end  -->
  
</header>
<!-- #masthead -->

 <!-- #site-navigation #start --> 
     <?php get_template_part( 'partials/ecom-header/nav-menu-three' );?>
    <!-- #site-navigation  #end--> 

<div id="content" class="site-content" >