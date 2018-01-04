<?php
/**
 * Template Name: All Campuses
 *
 * @package EduPress\Page-Templates
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
 
get_header();
global $edupress_options;
$number_of_campuses = intval( $edupress_options[ 'edupress_campuslisting_number' ] );
?>
<?php if ( have_posts() ) : ?>
<?php
global $edupress_options;
function edupress_campus_title() {
	?>
	<header class="entry-header">
    	<?php
    	if( is_page_template('') ):
		?>
	    	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php
		else:
		?>
			<h1 class="entry-title">
            	<?php esc_html_e( 'All Campuses', 'edupress');?>
            </h1>
		<?php
		endif;
		?>
    </header><!-- .entry-header -->
<?php
}
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
?>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <?php
				edupress_campus_title();
				?>
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
            <?php
            if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
			{
				?>
                     <?php
				edupress_campus_title();
				?>
           	<?php
			}
			?>
               <main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_campuslisting_layout'));?>" >
                      
             <?php /* Start the Loop */
			 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			 query_posts( array( 
			 			'post_type' => 'campus',
						'ignore_sticky_posts' => 1, 
						'paged' => $paged,
						'posts_per_page' => $number_of_campuses ) );
						
			 ?>
			<?php while ( have_posts() ) : the_post(); ?>
             <div class="col-xs-12  col-sm-4 zoom campus">
                    <a href="<?php the_permalink();?>" class="img-thumb">
                    <figure>
                    <?php
					if(has_post_thumbnail()) :
                    	the_post_thumbnail('edupress-university-home-thumb', array( 'title' => get_the_title(),'alt' => get_the_title()));
					else:
					?>
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/img-not-available-360-203.jpg"  width="360" height="203" alt="<?php the_title();?>" title="<?php the_title();?>" />
                    <?php
					endif;
					?></figure>
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <?php
					if( isset( $edupress_options['edupress_campuslisting_short_desc'] ) && $edupress_options['edupress_campuslisting_short_desc']) 
					{
						?>
                        <p>
                        <?php
						edupress_the_excerpt();
						?>
                        </p>
                        <?php
					}
					if( isset( $edupress_options['edupress_campuslisting_view_btn'] ) && $edupress_options['edupress_campuslisting_view_btn']) 
					{
					?>
                    <a href="<?php the_permalink();?>" class="btn btn-medium btn-blue">View Campus</a>
                    <?php
					}
					?>
                </div> <!-- col 1 #end --> 
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
