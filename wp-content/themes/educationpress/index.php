<?php 
get_header();?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           		  <h1 class="entry-title"><?php 
				  if(get_option( 'page_for_posts' )>0){
				  echo esc_html(get_the_title( get_option( 'page_for_posts' ) ));
				  }else{
					  esc_html_e('Home','educationpress');
				  }
				   ?></h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>


<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
       <div class="container">
        	<div class="row">

		<main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_bloglisting_layout'));?>"  >
        
		<?php if ( have_posts() ) : ?>

 			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if(function_exists('educationpress_numeric_posts_nav')){
				educationpress_numeric_posts_nav( 'navigation-pagination' );
				} ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
        
        </main>   <!-- main -->

 <?php get_sidebar(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(); ?>
