<?php
global $edupress_options;
?>
<header id="masthead" class="site-header <?php if( edupress_is_sticky_header()
):?>header-stick<?php endif;?>" role="banner" > 
  
  <!-- header_meta #start -->
  <?php 
  if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1' || $edupress_options['edupress_header_variation']=='3')
  {
   		get_template_part( 'partials/ecom-header/header-meta-one' );
  }else{
	  	get_template_part( 'partials/ecom-header/header-meta-two' );
  }
  ?>
  <!-- header_meta #end -->
  
  <div class="container">
    <div class="row"> 
      <!-- #site-branding #start -->
      <?php get_template_part( 'partials/ecom-header/logo' );?>
      <!-- #site-branding #end --> 
      
      <!-- #site-navigation #start -->
      <?php 
	 if( empty( $edupress_options[ 'edupress_menu_variation' ] ) || (!empty( $edupress_options[ 'edupress_menu_variation' ] ) && $edupress_options[ 'edupress_menu_variation' ] == '1'))
	 {
		 get_template_part( 'partials/header/nav-menu-one' );
	 }?>
      <!-- #site-navigation  #end--> 
      
    </div>
    <!--row #end--> 
  </div>
  <!--container #end--> 
</header>
<!-- header #masthead --> 

<!-- #site-navigation #start -->
<?php 
	 if(!empty( $edupress_options[ 'edupress_menu_variation' ] ) && $edupress_options[ 'edupress_menu_variation' ] == '2')
	 {?>
<div class="menu-full">
  <div class="container">
    <div class="row nav-menu-one">
      <?php get_template_part( 'partials/header/nav-menu-one' );?>
    </div>
    <!--row #end--> 
  </div>
  <!--container #end--> 
</div>
<!-- menu-full #end -->
<?php
	 }?>
<!-- #site-navigation  #end--> 
