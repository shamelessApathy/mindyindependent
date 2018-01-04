<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package edupress
 */

get_header(); 

global $edupress_options;
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
?>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
            </div> <!--row #end  -->
        </div>
    </div>
<?php
}
?>
  
<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
  		<div class="container">
        	<div class="row">
            <?php
            if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
			{
				?>
                    <header class="entry-header">
                  	  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
           	<?php
			}
			?>
            
        <?php
			$main_class = "col-sm-8";
			
			if( edupress_is_a('ecom') )
			{
				
				if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout()) || (function_exists('is_account_page') && is_account_page()) ) {
						$main_class = edupress_page_layout('edupress_cart_checkout_layout'); 
					 } 	
			}
			elseif( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout())  || (function_exists('is_account_page') && is_account_page())  )
						$main_class = "";
			?>
            
            
		<main id="main" class="site-main col-xs-12 <?php echo esc_attr( $main_class );?>"  >

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
        
        <?php get_sidebar(); ?>
        </div>  <!-- #row -->
	</div><!-- #container -->
</div> <!-- primary #end -->
</div>

<?php get_footer(); ?>
