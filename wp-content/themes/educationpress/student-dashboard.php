<?php
/**
 * Template Name:  Course Dashboard
 *
 * @package EducationPress\Page Template
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
get_header(); 
global $coursepress,$course_slug;
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
              <h1 class="entry-title"><?php esc_html_e( 'Dashboard Courses', 'educationpress'); ?> </h1>  
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>


<div class="course-learn-spacer clearfix">
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main" >  
					<?php
						$content = CoursePress_View_Front_Dashboard::render_dashboard_page();
						$content =  trim( $content, ' ' );
						
						$temp_content = strip_tags( $content );
						$temp_content = str_replace(array(' ','\r','\n'), '', $temp_content);
						
						if( ctype_space($temp_content) || empty( $temp_content ))
						{
							?>
                            <div class="alert alert-warning">
                              <?php _e('There are not any course in your dashboard now.', 'educationpress')?>
                            </div>
							
						<?php	
						}
						else
						{
							echo $content;
							
						}
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/content', 'page' ); 
                    endwhile; // End of the loop. ?>
                </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- course-learn-spacer #end -->
<?php get_footer(); ?>