<?php
/**
 * The units archive / grades template file
 *
 * @package CoursePress
 */
global $coursepress;
$course_id = do_shortcode('[get_parent_course_id]');

// Redirect to the parent course page if not enrolled.
cp_can_access_course( $course_id );
$progress = do_shortcode( '[course_progress course_id="' . $course_id . '"]' );

get_header();
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
             <h1 class="entry-title"><?php echo esc_html(get_the_title( $course_id )); ?>
             <span class="instructors-name"><?php echo strip_tags(do_shortcode( '[course_instructors style="list-flat" link="true" course_id="' . $course_id . '"]' ) ,'<a>');?></span>
             </h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="course-learn-spacer clearfix">
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main" >
                
<div class="breadcrumb-detail-page breadcrumb-in">
	<div class="container">
    	<div class="row">
             <p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
			<?php esc_html_e( 'Grades', 'educationpress' ); ?>
            </p>
        </div> <!--row #end  -->
    </div>
</div> <!-- breadcrumb #end  -->

       
        <?php
        echo do_shortcode('[course_unit_archive_submenu]');
        ?>

        <div class="clearfix"></div>

        <ul class="units-archive-list">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
				<div class="workbook_units">
					<div class="unit_title">
						<h3><?php esc_html_e( 'Course Grades', 'educationpress' ); ?></h3>
					</div>
					<div class="accordion-inner">
						<?php echo do_shortcode( '[student_grades_table]' ); ?>
					</div>
				<div class="total_grade"><?php
					$shortcode = sprintf( '[course_progress course_id="%d"]', $course_id );
				echo apply_filters(
					'coursepress_grade_caption',
					__( 'TOTAL:', 'cp' )
				) . ' ';
				echo do_shortcode( $shortcode );
				echo '%';
				?>
				</div>
				</div>
				<?php
			}
			wp_reset_query();
		} else {
			?>
			<div class="zero-courses"><?php esc_html_e( '0 Units in the course', 'educationpress' ); ?></div>
			<?php
		}
		?>
		</ul>
     </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->  
 </div> <!-- course-learn-spacer #end -->  
<?php get_footer(); ?>