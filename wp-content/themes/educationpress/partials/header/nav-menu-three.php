<?php
/*
 * Menu navigation for header
 */
global $educationpress_options;
?>
<nav id="menu-left">
<?php
if ( is_user_logged_in() ) {
 wp_nav_menu( array( 'theme_location'  => 'primary', 'menu' => 'primary', 'container' => false ));
   }else{
wp_nav_menu( array( 'theme_location'  => 'visiter', 'menu' => 'visiter', 'container' => false ));
   }
  ?>
</nav>  