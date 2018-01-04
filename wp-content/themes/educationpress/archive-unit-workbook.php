<?php
/**
 * The units archive / grades template file
 *
 * @package CoursePress
 */
$course_id = do_shortcode('[get_parent_course_id]');
$course_id = (int) $course_id;
$progress = do_shortcode('[course_progress course_id="' . $course_id . '"]');
//redirect to the parent course page if not enrolled
cp_can_access_course( $course_id );

get_header();

add_thickbox();
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <h1 class="entry-title">
			<?php echo do_shortcode('[course_title course_id="' . $course_id . '" title_tag=""]'); ?>
			<?php if ( 100 > (int) $progress ) { ?>
				<span class="workbook-course-progress"><?php echo esc_html( $progress ); ?>% <?php esc_html_e('completed', 'educationpress'); ?></span>
			<?php } ?>
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
                <!-- breadcrumb start-->
<div class="breadcrumb-detail-page breadcrumb-in">
	<div class="container">
    	<div class="row">
            <p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
            <?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
			<?php esc_html_e( 'Workbook', 'educationpress' ); ?>
            </p>
        </div> <!--row #end  -->
    </div>
</div>
		
     

        <?php
        echo do_shortcode('[course_unit_archive_submenu]');
        ?>
		<?php
			if( 100 == (int) $progress) {
				echo sprintf( '<div class="unit-archive-course-complete">%s %s</div>', '<i class="fa fa-check-circle"></i>', esc_html__( 'Course Complete', 'educationpress' ) );
			}
		?>

        <div class="clearfix"></div>

        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <div class="workbook_units ">
                    <div class="unit_title">
                        <h3><?php the_title(); ?>
							<span>
<?php
				$unit_id = get_the_ID();
				$shortcode = '';
				if ( empty( $unit_id ) ) {
					$shortcode = sprintf( '[course_progress course_id="%d"]', $course_id );
				} else {
					$shortcode = sprintf( '[course_unit_progress course_id="%d" unit_id="%d"]', $course_id, $unit_id );
				}
				echo do_shortcode( $shortcode );
?>%
							<?php esc_html_e( 'completed', 'educationpress' ); ?>
							</span>
                        </h3>
                    </div>
                    <div class="accordion-inner">  
                    	<div id="no-more-tables">               
                        <?php echo do_shortcode('[student_workbook_table]'); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="zero-courses"><?php esc_html_e('0 Units in the course', 'educationpress'); ?></div>
            <?php
        }
        ?>
      </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->     
</div> <!-- course-learn-spacer #end -->
<?php get_footer(); ?>
