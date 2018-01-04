<?php
/*
 * Menu navigation for header
 */
global $edupress_options;
if(  !wp_is_mobile() &&  !empty($edupress_options[ 'edupress_menu_variation' ]) && $edupress_options[ 'edupress_menu_variation' ] == 1 ){ ?>
<div class="col-xs-12  col-sm-9">
<?php } ?>
<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
    	<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
		</div>
      <?php edupress_header_menu(); ?>
    </nav>
<?php
if(  !wp_is_mobile() &&  !empty($edupress_options[ 'edupress_menu_variation' ]) && $edupress_options[ 'edupress_menu_variation' ] == 1 ){ ?>
</div>
<?php }?>