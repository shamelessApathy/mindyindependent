<?php
/**
 * The template for displaying events archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edupress
 */

get_header();
global $edupress_options; ?>
<?php if ( have_posts() ) : 
	global $edupress_options;
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{	
?>
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
<?php
}
?>

<div class="page-spacer clearfix">
  <div id="primary">
        <div class="container">
        	<div class="row">
               <main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_eventlisting_layout'));?>" >
            <?php
            if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
			{
				?>
				   	<header class="entry-header">
						<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); 
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </header><!-- .entry-header -->
				  <?php } ?>
                      
             <?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
              <div class="col-xs-12 col-sm-4">
                	<article class="events">
                         <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>" class="img-thumb"> <figure><?php the_post_thumbnail( 'edupress-events' );?> </figure></a>
                        <h4><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                        <p class="meta">
                        <?php if($edupress_options['edupress_eventlisting_time']){?>
						<?php esc_html_e('on:','edupress'); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong> <?php esc_html_e('.','edupress'); ?>
						<?php }?>
						<?php if($edupress_options['edupress_eventlisting_loc']){?>
						<?php esc_html_e(' at:','edupress'); ?> <strong><?php echo  esc_html(get_post_meta( $post->ID, 'EDU_PRESS_event_location', true ));?></strong>
                        <?php }?>
                        </p>
                        
                        <a href="<?php the_permalink()?>" class="more"><?php esc_html_e('Read More','edupress'); ?><i class="lnr lnr-arrow-right"></i></a>
                    </article>
                 </div> <!-- event #end -->
             <?php endwhile; ?>

			<?php 
			if(function_exists('edupress_numeric_posts_nav')){
			edupress_numeric_posts_nav( 'navigation-pagination' ); 
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
