<?php 
get_header();

global $edupress_options;
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           		  <h1 class="entry-title"><?php 
				  if(get_option( 'page_for_posts' )>0){
				  echo esc_html(get_the_title( get_option( 'page_for_posts' ) ));
				  }else{
					  esc_html_e('Home','edupress');
				  }
				   ?></h1>
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
                          <h1 class="entry-title"><?php 
                          if(get_option( 'page_for_posts' )>0){
                          echo esc_html(get_the_title( get_option( 'page_for_posts' ) ));
                          }else{
                              esc_html_e('Home','edupress');
                          }
                           ?></h1>
                    </header><!-- .entry-header -->
           	<?php
			}
			?>
            

		<main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_bloglisting_layout'));?>"  >
        
       
			  
        
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

			<?php if(function_exists('edupress_numeric_posts_nav')){
				edupress_numeric_posts_nav( 'navigation-pagination' );
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
