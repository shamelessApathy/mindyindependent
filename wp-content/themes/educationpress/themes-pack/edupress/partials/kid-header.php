<!-- header_meta #start -->
<?php
global $edupress_options;
if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation'] == '2'){
?>
<div class="header_meta <?php 
		if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1') {?>
        					header_meta_one
	<?php } elseif( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='2') {?> 
    header_meta_two
    <?php
	}
	?>">
  <div class="container">
    <div class="row">
      <?php 
            get_template_part( 'partials/kid-header/header-meta-one' );
       ?>
    </div>
    <!--row #end--> 
  </div>
  <!--container #end--> 
</div>
<?php
}
?>
<!-- header_meta #end --> 

<header id="masthead" class="site-header <?php if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1') {?>home-one <?php } else { ?>home-two<?php }?>
<?php if( edupress_is_sticky_header() ):?>header-stick<?php endif;?>
" role="banner">
    <div class="container">
      <div class="row"> 
        <!-- #site-branding #start -->
        <?php get_template_part( 'partials/kid-header/logo' );?>
        <!-- #site-branding #end --> 
        
        <!-- #site-navigation #start -->
        <?php 
		 get_template_part( 'partials/header/nav-menu-one' );
		?>
        <!-- #site-navigation  #end--> 
        
      </div>
      <!--row #end--> 
    </div>
    <!--container #end--> 
    

  <!-- inner page --> 
</header>
<!-- header #masthead -->