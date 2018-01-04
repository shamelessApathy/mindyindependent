<?php
/**
 * The Template for displaying single unit posts with modules
 *
 * @package CoursePress
 */

global $wp, $wp_query;

$course_id = do_shortcode( '[get_parent_course_id]' );

add_thickbox();

$paged = ! empty( $wp->query_vars['paged'] ) ? absint( $wp->query_vars['paged'] ) : 1;



if ( ! function_exists( 'educationpress_cp_can_access_course' ) ) {
	/**
	 * Check user access to course.
	 *
	 * @since 2.0.0
	 *
	 * @param integer $course_id Course ID
	 * @return boolean User can or can not.
	 */
	function educationpress_cp_can_access_course( $course_id, $unit_id ) {
		global $is_free_unit;	
		$free_units = get_post_meta( $course_id, 'cp_structure_preview_units', true );
		
		if ( empty( $course_id ) ) {
			$course_id = CoursePress_Helper_Utility::the_course( true );

			if ( empty( $course_id ) ) {
				return; // Simply return to avoid fatal error
			}
		}

		if ( ! is_user_logged_in() ) {
			
			
			if( isset( $free_units[$unit_id] ) && $free_units[$unit_id])
			{
				$is_free_unit = true;
				return true;
			}
			else
			{
				wp_safe_redirect( get_permalink( $course_id ) );
				exit;
			}
		}

		if ( current_user_can( 'manage_options' ) ) {
			$is_free_unit = false;
			return true;
		}

		/**
		 * check student
		 */
		if ( CoursePress_Data_Student::is_enrolled_in_course( get_current_user_id(), $course_id ) ) {
			$is_free_unit = false;
			return true;
		}

		/**
		 * check instructor
		 */
		if ( CoursePress_Data_Instructor::is_assigned_to_course( get_current_user_id(), $course_id ) ) {
			$is_free_unit = false;
			return true;
		}


		if( isset( $free_units[$unit_id] ) && $free_units[$unit_id])
		{
			$is_free_unit = true;
			return true;
		}
		else
		{
			wp_safe_redirect( get_permalink( $course_id ) );
			exit;
		}

	}
}


// Redirect to the parent course page if not enrolled or not preview unit/page.
while ( have_posts() ) :
	the_post();
	educationpress_cp_can_access_course( $course_id, get_the_ID() );
	//cp_can_access_course( $course_id, get_the_ID() );
endwhile;

get_header();

?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
                <h1 class="entry-title">
                    <?php
					echo strip_tags(do_shortcode( '[course_title course_id="' . get_the_ID() . '"]' ));
                    //echo strip_tags(do_shortcode( '[course_title course_id="' . $course_id . '"]' ));
                    ?>
                </h1>
            </header>
        </div>
    </div>
</div>                                    
<div class="course-learn-spacer clearfix">
  <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main" >
                	
                
					<?php while ( have_posts() ) : the_post(); ?>
                    	<div class="breadcrumb-detail-page breadcrumb-in">
                            <div class="container">
                                <div class="row">
                                	<?php 
									global $wp_query;									
									
									?>
                                	
                                    <p>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                                    <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                                    <?php
									if(get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' )):
									?>
									<?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
                                    <?php
									endif;
									?>
                                    <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                                     <a href="<?php echo esc_url(get_permalink($course_id)). 
                                     trailingslashit( CoursePress_Core::get_slug('unit') ); ?>"><?php esc_html_e( 'Units', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                                     <?php echo get_the_title($wp_query->post->ID);?>
                                    </p>
                                </div> <!--row #end  -->
                            </div>
                        </div>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
  
                                
 
                                
                                <?php
                                $is_focus = CoursePress_Data_Course::get_setting( $course_id, 'course_view', 'normal' );
                                if ( 'focus' == $is_focus ) :
                                    echo do_shortcode( '[course_unit_archive_submenu course_id="' . $course_id . '"]' );
                                endif;
                                ?>
                            </header><!-- .entry-header -->
                            <div class="instructors-content"></div>
            
                            <div class="clearfix"></div>
            
                            
							
                            <header class="entry-header">
                   				 <h3 class="entry-title course-title">
                                 	<?php
										echo strip_tags(do_shortcode( '[course_title course_id="' . $course_id . '"]' ));
										?>
                                 </h3>
                             </header>
                             <?php
                             echo CoursePress_Template_Unit::unit_with_modules();
                            ?>
                        </article>
                    <?php endwhile; // end of the loop. ?>
				 </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary --> 
</div> <!-- course-learn-spacer #end --> 

<?php
get_footer();