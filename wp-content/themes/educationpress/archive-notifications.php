<?php
/**
 * The notifications archive template file
 *
 * @package CoursePress
 */
global $coursepress, $wp;
$course_id = do_shortcode('[get_parent_course_id]');

//redirect to the parent course page if not enrolled
$coursepress->check_access($course_id);

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
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                            <?php esc_html_e( 'Notification', 'educationpress' ); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
        
        
        <?php
        echo do_shortcode('[course_unit_archive_submenu]');
        ?>

        <div class="clearfix"></div>

        <ul class="notification-archive-list">
            <?php
            $page = ( isset($wp->query_vars['paged']) ) ? $wp->query_vars['paged'] : 1;

            $query_args = array(
                'category' => '',
                'order' => 'DESC',
                'post_type' => 'notifications',
                'post_mime_type' => '',
                'post_parent' => '',
                'post_status' => 'publish',
                'orderby' => 'meta_value_num',
                'paged' => $page,
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'course_id',
                        'value' => $course_id
                    ),
                    array(
                        'key' => 'course_id',
                        'value' => ''
                    ),
                )
            );

            query_posts($query_args);
            ?>
            <?php if ( have_posts() ) { ?>
                <?php
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <li>
                        <div class="notification-archive-single-meta">
                            <div class="notification-date"><span class="date-part-one"><?php echo esc_html(get_the_date('M')); ?></span><span class="date-part-two"><?php echo esc_html(get_the_date('j')); ?></span></div>
                            <span class="notification-meta-divider"></span>
                            <div class="notification-time"><?php the_time(); ?></div>
                        </div>
                        <div class="notification-archive-single">
                            <h1 class="notification-title"><?php the_title(); ?></h1>
                            <div class="notification_author"><?php the_author(); ?></div>
                            <div class="notification-content"><?php the_content(); ?></div>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php
                }
            } else {
                ?>
                <h1 class="zero-course-units"><?php esc_html_e("0 notifications. Please check back later.", 'educationpress'); ?></h1>
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