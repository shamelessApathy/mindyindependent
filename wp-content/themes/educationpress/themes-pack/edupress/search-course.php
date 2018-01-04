<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Edupress
 */
get_header();?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           <h1 class="entry-title"> <?php esc_html_e("Search",'edupress'); ?></h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main col-xs-12 <?php echo esc_attr(edupress_page_layout('edupress_search_layout'));?>" >
                
		<?php if ( have_posts() ) : ?>        
        	

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'edupress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
            

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); 
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				
					get_template_part( 'template-parts/content', get_post_format() );
				

			endwhile;
			?>

			<?php if(function_exists('edupress_numeric_posts_nav')){
				edupress_numeric_posts_nav( 'navigation-pagination' );
				} ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>
            
                

		<?php endif; ?>
        
     

 </main><!-- #main -->
                
                
                 <?php get_sidebar(); ?>
                
                
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 
<?php get_footer(); ?>