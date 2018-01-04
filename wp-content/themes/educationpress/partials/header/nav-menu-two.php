<?php
/*
 * Menu navigation for header
 */
global $educationpress_options;
if( !wp_is_mobile() && $educationpress_options[ 'educationpress_menu_variation' ] == 1 ){ ?>
<div class="col-xs-12  col-sm-9">
<?php } ?>
<nav id="site-navigation" class="main-navigation navbar navbar-default home-two-nav">
    	<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
		</div>
                  
      <?php educationpress_header_menu(); ?>
    </nav>
<?php
if(  !wp_is_mobile() &&  $educationpress_options[ 'educationpress_menu_variation' ] == 1 ){ ?>
</div>
<?php } ?>