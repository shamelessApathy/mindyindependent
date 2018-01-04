<?php
/**
 * The template for displaying all single course.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EducationPress
 */
get_header(); 
global $educationpress_options,$course_slug;
?>

  <?php while ( have_posts() ) : the_post(); ?>
<div class="breadcrumb-detail-page">
	<div class="container">
    	<div class="row">
            <p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <?php if(get_the_term_list( get_the_ID(), 'course_category','', '<i class="fa fa-angle-right"></i>' )):
			
			?>
            <?php echo get_the_term_list( get_the_ID(), 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
			<?php 
			endif;
			
			?>
			
			<?php the_title(); ?>
            </p>
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer co-detail-page clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
           
			<?php get_template_part( 'template-parts/content-course-overview', 'single' ); ?>
                
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 	 
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
