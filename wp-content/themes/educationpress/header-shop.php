<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EducationPress
 */
global $educationpress_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<base href="<?php echo esc_url( home_url( '/' )); ?>">
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
    if (  !empty( $educationpress_options[ 'educationpress_page_loader' ] ) && $educationpress_options[ 'educationpress_page_loader' ] == '1' ) {
        $page_loader_gif = get_template_directory_uri() . '/images/page-loader-img.gif';
        if ( !empty( $educationpress_options['educationpress_page_loader_gif']['url'] ) ) {
            $page_loader_gif = $educationpress_options['educationpress_page_loader_gif']['url'];
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
<?php esc_html_e( 'Skip to content', 'educationpress' ); ?>
</a>

<header id="masthead" class="site-header <?php if(  function_exists( 
'educationpress_is_sticky_header' ) &&  educationpress_is_sticky_header()  ):?>header-stick<?php endif;?>">
  
   <!-- header_meta #start -->
  <?php 
  if( !empty( $educationpress_options['educationpress_header_variation'] ) && $educationpress_options['educationpress_header_variation']=='1' || $educationpress_options['educationpress_header_variation']=='3')
  {
   		get_template_part( 'partials/header/header-meta-one' );
  }else{
	  	get_template_part( 'partials/header/header-meta-two' );
  }
	  ?>
  <!-- header_meta #end -->
  
  <div class="container">
     <div class="row">
     <!-- #site-branding #start -->
     <?php get_template_part( 'partials/header/logo' );?>
     <!-- #site-branding #end -->
    
    
     <!-- #site-navigation #start --> 
     <?php 
	 if( empty($educationpress_options)  || (!empty( $educationpress_options[ 'educationpress_menu_variation' ] ) && $educationpress_options[ 'educationpress_menu_variation' ] == '1') )
	 {
		 get_template_part( 'partials/header/nav-menu-one' );
	 }?>
    <!-- #site-navigation  #end--> 
    
    </div>   <!--row #end--> 
  </div>  <!--container #end--> 
</header> <!-- header #masthead -->


<!-- #site-navigation #start --> 
     <?php 
	 if(!empty( $educationpress_options[ 'educationpress_menu_variation' ] ) && $educationpress_options[ 'educationpress_menu_variation' ] == '2' )
	 {?>
 <div class="menu-full">
    <div class="container">
    	<div class="row nav-menu-one">
   		 <?php get_template_part( 'partials/header/nav-menu-one' );?>
    	</div> <!--row #end--> 
    </div> <!--container #end-->
  </div> <!-- menu-full #end --> 
    <?php
	 }?>
    <!-- #site-navigation  #end--> 

<div id="content" class="site-content" >
	<div class="page-spacer-woo clearfix">
        <div id="primary" class="content-area">
            <div class="container">
                <div class="row">
                    <main id="main" class="site-main col-xs-12 <?php if(!is_product_category()):?>col-sm-8<?php endif;?>">