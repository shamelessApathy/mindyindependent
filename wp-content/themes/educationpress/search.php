<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Educationpress
 */

get_header();?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           <h1 class="entry-title"> <?php esc_html_e("Search",'educationpress'); ?></h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main col-xs-12<?php if( !empty($_GET['post_type']) && $_GET['post_type']=='course'){ echo esc_attr(educationpress_page_layout('educationpress_searchcourse_layout')); }else{ echo esc_attr(educationpress_page_layout('educationpress_search_layout'));}?>" >
                
		<?php if ( have_posts() ) : ?>
        
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'educationpress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
            
        <div class="well well-sm row">
         		
                <div class="col-xs-12 col-sm-5 sorting">
                	<?php  
					if($educationpress_options['educationpress_coursesearch_sorting'] && !empty($_GET['post_type']) && $_GET['post_type']=='course'){
					add_search_course_soring_dropdown();
					}?>
                </div>
         
                 
            </div>

            <?php
			if( !empty($_GET['post_type']) && $_GET['post_type']=='course')
			{ ?>
            <div id="products" class="list-group"> 
     		<div class="row"> 
            <?php
			}?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				if( !empty($_GET['post-type']) && $_GET['post-type']=='course')
				{ 
					
					get_template_part( 'template-parts/content', 'search' );
				}
				else
				{
                    get_template_part( 'template-parts/content', get_post_format() );
				}
			?>

			<?php endwhile; ?>
            <?php
			if(!empty($_GET['post_type']) && $_GET['post_type']=='course')
			{ ?>
             </div> <!-- row #end -->
    			 </div> <!-- product list form #end --> 
            <?php
			}?>

			<?php if(function_exists('educationpress_numeric_posts_nav')){
				educationpress_numeric_posts_nav( 'navigation-pagination' );
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