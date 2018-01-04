<?php
/**
 * The template for displaying events archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Educationpress
 */

get_header();
global $educationpress_options; ?>
<?php if ( have_posts() ) : ?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); 
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix">
  <div id="primary">
        <div class="container">
        	<div class="row">
               <main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_eventlisting_layout'));?>" >
                      
             <?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
              <div class="col-xs-12 col-sm-4">
                	<article class="events">
                         <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>" class="img-thumb">
						 <figure><?php the_post_thumbnail( 'medium' );?></figure>
                         </a>
                        <h4><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                        <p class="meta">
                        <?php if($educationpress_options['educationpress_eventlisting_time']){?>
						<?php esc_html_e('on:','educationpress'); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong> <?php esc_html_e('.','educationpress'); ?>
						<?php }?>
						<?php if($educationpress_options['educationpress_eventlisting_loc']){?>
						<?php esc_html_e(' at:','educationpress'); ?> <strong><?php echo  esc_html(get_post_meta( $post->ID, 'EDU_PRESS_event_location', true ));?></strong>
                        <?php }?>
                        </p>
                        
                        <a href="<?php the_permalink()?>" class="more"><?php esc_html_e('Read More','educationpress'); ?><i class="lnr lnr-arrow-right"></i></a>
                    </article>
                 </div> <!-- event #end -->
             <?php endwhile; ?>

			<?php 
			if(function_exists('educationpress_numeric_posts_nav')){
			educationpress_numeric_posts_nav( 'navigation-pagination' ); 
			}?>

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
