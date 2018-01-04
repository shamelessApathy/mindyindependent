<?php
global $edupress_options;
?>
<!-- header_meta #start -->
	<div class="header_meta <?php if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='2') {?>header_meta_two<?php }?>">
        <div class="container">
        	<div class="row">
			  <?php 
              if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
              {
               	get_template_part( 'partials/uni-header/header-meta-one' );
              }else{
				  
              	get_template_part( 'partials/uni-header/header-meta-two' );
              }
              ?>
    	</div> <!--row #end--> 
    </div><!--container #end--> 
   </div><!-- header_meta #end --> 
  


<?php 
if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
{
	
	
	?>
    <header id="masthead" class="site-header home-one <?php if ( !is_front_page() || !is_page_template('page-templates/home.php') ) { ?>inner-pages<?php }?> <?php if( edupress_is_sticky_header() 
):?>header-stick<?php endif;?>" >
    		<!-- is_inner_page -->
	<?php if ( !is_front_page() ) {?><div class="header-inner"><?php }?>
<?php
}
else
{
	?>
     <header id="masthead" class="site-header home-univ-two <?php if( edupress_is_sticky_header()  
):?>header-stick<?php endif;?>" >
    <?php if ( is_front_page() ) {?><div class="header-inner"><?php }?>
<?php
}
?>
  <div class="container">
     <div class="row">
     <!-- #site-branding #start -->
     <?php get_template_part( 'partials/uni-header/logo' );?>
     <!-- #site-branding #end -->
    
    
     <!-- #site-navigation #start --> 
     <?php 
	 
		 get_template_part( 'partials/header/nav-menu-one' );
	?>
    <!-- #site-navigation  #end--> 
    
    
    </div>   <!--row #end--> 
  </div>  <!--container #end--> 
 
 	<?php if ( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1' &&   !is_front_page()) {?> </div> <!-- inner page --><?php }?>
    
</header> <!-- header #masthead -->
