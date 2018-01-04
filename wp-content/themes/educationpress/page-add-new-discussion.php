<?php
/**
 * Add New Discussion template file
 *
 * @package CoursePress
 */

$course_id = do_shortcode( '[get_parent_course_id]' );
cp_can_access_course( $course_id );

$form_message_class = '';
$form_message = '';

if ( isset( $_POST['new_question_submit'] ) ) {
	check_admin_referer( 'new_question' );
	if ( empty( $_POST['question_title'] ) ) {
		$form_message = __( 'Question title is required.', 'educationpress' );
		$form_message_class = 'red';
	} elseif ( empty( $_POST['question_description'] ) ) {
		$form_message = __( 'Question description is required.', 'educationpress' );
		$form_message_class = 'red';
	} else {
		CoursePress_Data_Discussion::update_discussion(
			$_POST['question_title'],
			$_POST['question_description'],
			$course_id
		);
		wp_safe_redirect(
			get_permalink( $course_id ) . CoursePress_Core::get_slug( 'discussion' )
		);
		exit;
	}
}

get_header();

$post = CoursePress_Data_Discussion::get_one();

?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           <h1><?php echo esc_html(get_the_title( $course_id )); ?></h1>
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
                             <a href="<?php echo esc_url(get_permalink($course_id)). trailingslashit( CoursePress_Core::get_slug('discussion') ); ?>"> <?php esc_html_e( 'Discussions', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                               <?php esc_html_e( 'Ask a Question', 'educationpress' ); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
      

        <?php
        echo do_shortcode( '[course_unit_archive_submenu]' );
        ?>

        <div class="clearfix"></div>

        <p class="form-info-<?php echo esc_attr($form_message_class); ?>"><?php echo esc_html($form_message); ?></p>

        <form id="new_question_form" name="new_question_form" method="post" class="new_question_form">
            <input type="hidden" value="<?php echo intval( $post['ID'] ); ?>" name="discussion_id" />
			<div class="add_new_discussion">
				<?php
				$scode = sprintf(
					'[units_dropdown course_id="%d" include_general="true" general_title="%s"]',
					$course_id,
					__( 'Course General', 'educationpress' )
				);
				echo do_shortcode( $scode );
				?>
				<div class="new_question">
					<div class="rounded"><span>Q</span></div>
					<input type="text" name="question_title" placeholder="<?php
						esc_attr_e( 'Title of your question', 'educationpress' );
				?>" value="<?php echo esc_attr( $post['post_title'] ); ?>"/>
					<textarea name="question_description" placeholder="<?php
						esc_attr_e( 'Question description...', 'educationpress' );
							?>"><?php echo  CoursePress_Helper_Utility::filter_content( $post['post_content'] ); ?></textarea>

					<input type="submit" class="button_submit" name="new_question_submit" value="<?php
						esc_attr_e( 'Ask this Question', 'educationpress' );
?>" />

					<a href="<?php
						echo get_permalink( $course_id ) . CoursePress_Core::get_slug( 'discussion' );
						?>/" class="button_cancel">
						<?php esc_attr_e( 'Cancel', 'educationpress' ); ?>
					</a>

					<?php wp_nonce_field( 'new_question' ); ?>
				</div>
			</div>
		</form>

      </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
 </div><!-- course-learn-spacer #end -->
<?php get_footer(); ?>