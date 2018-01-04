<?php
/**
 * The discussion archive template file
 *
 * @package CoursePress
 */
global $coursepress, $wp;
$course_id = do_shortcode('[get_parent_course_id]');
// Redirect to the parent course page if not enrolled.
cp_can_access_course( $course_id );

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
                <!-- breadcrumb start-->
                <div class="breadcrumb-detail-page breadcrumb-in">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html( get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                            <?php esc_html_e( 'Discussions', 'educationpress' ); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
        
      
        <?php
        echo do_shortcode('[course_unit_archive_submenu]');
        ?>

        <div class="discussion-controls">
			<a class="button_submit" href="<?php echo get_permalink( $course_id ); ?><?php echo CoursePress_Core::get_slug( 'discussion' ) . '/' . CoursePress_Core::get_slug( 'discussion_new' ); ?>/">
				<?php _e( 'Ask a Question', 'educationpress' ); ?>
			</a>
        </div>

        <div class="clearfix"></div>

        <ul class="discussion-archive-list">
            <?php
            //do_shortcode( '[course_discussion_loop]' ); //required to get good results

            $page = ( isset($wp->query_vars['paged']) ) ? $wp->query_vars['paged'] : 1;
            $query_args = array(
                'order' => 'DESC',
                'post_type' => 'discussions',
                'post_status' => 'publish',
                'meta_key' => 'course_id',
                'meta_value' => $course_id,
                'paged' => $page,
            );

            query_posts($query_args);

            if ( have_posts() ) {
                ?>
                <?php
                while ( have_posts() ) : the_post();
                    $discussion = new Discussion(get_the_ID());
                    ?>
                    <li>
                        <div class="discussion-archive-single-meta">
                            <div class="<?php if ( get_comments_number() > 0 ) {?>discussion-answer-circle<?php } else {?>discussion-comments-circle<?php }?>"><span class="comments-count"><?php echo esc_html( get_comments_number()); ?></span></div>
                        </div>
                        <div class="discussion-archive-single">
                            <h1 class="discussion-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="discussion-meta">
                                <?php
                                if ( $discussion->details->unit_id == '' ) {
                                    $discussion_unit = $discussion->get_unit_name();
                                } else {
                                    $discussion_unit = '<a href="' . Unit::get_permalink( $discussion->details->unit_id ) . '">' . $discussion->get_unit_name() . '</a>';
                                }
                                ?>
                                <span><?php echo esc_html( get_the_date()); ?></span> | <span><?php the_author(); ?></span> | <span><?php echo $discussion_unit; ?></span> | <span><?php echo esc_html( get_comments_number()); ?> <?php esc_html_e('Comments', 'educationpress'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                    <?php
                endwhile;
            } else {
                ?>
                <h1 class="zero-course-units"><?php esc_html_e("0 discussions. Start one, ask a question.", 'educationpress'); ?></h1>
                <?php
            }
            ?>
        </ul>
        <br clear="all" />
        <?php cp_numeric_posts_nav('navigation-pagination'); ?>
          
                </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->  
</div> <!-- course-learn-spacer #end -->
<?php get_footer(); ?>