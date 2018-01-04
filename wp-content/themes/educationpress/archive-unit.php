<?php
/**
 * The units archive template file
 *
 * @package CoursePress
 */
 
global $coursepress,$course_slug;

$course_id = get_the_ID();
if ( empty( $course_id ) ) {
    global $post;
    $course_id = preg_replace( '/[^\d]/', '', $post->post_name );
}
if ( ! empty( $course_id ) ) {
    $post = get_post( $course_id );
    setup_postdata( $post );
}

// Redirect to the parent course page if not enrolled.
cp_can_access_course( $course_id );

get_header();

$progress = (int) do_shortcode( '[course_progress course_id="' . $course_id . '"]' );
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
                	 <!-- breadcrumb start-->
                <div class="breadcrumb-detail-page breadcrumb-in">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php
							if( get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ) ):
?>							<?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
							<?php
							endif;
							?>
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                            
                            <?php esc_html_e( 'Units', 'educationpress' ); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
                    <?php
						echo do_shortcode( '[course_unit_submenu]' );
						if( !empty(  $GLOBALS['educationpress_options']['educationpress_button_bg'] ) )
						{
							echo  do_shortcode( '[educationpress_unit_archive_list description="false" knob_fg_color="'.$GLOBALS['educationpress_options']['educationpress_button_bg'].'" knob_bg_color="'.$GLOBALS['educationpress_options']['educationpress_button_bg'].'"]' );
						}
						else
						{
							echo  do_shortcode( '[educationpress_unit_archive_list description="false"]' );
						}
					?>
 				 </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->  
</div> <!-- course-learn-spacer #end -->
<?php get_footer(); ?>
