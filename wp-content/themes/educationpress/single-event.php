<?php
/**
 * The template for displaying all single events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EducationPress
 */

get_header(); 
global $educationpress_options;
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

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_eventdetail_layout'));?>" >
            
                    <?php while ( have_posts() ) : the_post(); ?>
            
                        <?php get_template_part( 'template-parts/content', 'event' ); ?>
            
                        
            
                    <?php endwhile; // End of the loop. ?>
            
                   </main><!-- #main -->
                    
                    <?php get_sidebar(); ?>

                    
	 		</div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- #page-spacer -->

<?php get_footer(); ?>
