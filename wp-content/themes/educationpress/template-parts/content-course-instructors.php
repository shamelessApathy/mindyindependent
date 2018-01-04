<?php
/**
 * Template part for displaying course instructors.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */
 
global $active_sec;
?>
<?php
	global $educationpress_options;
			 //$instructors = Course::get_course_instructors( get_the_ID() );
			 $instructors = CoursePress_Data_Course::get_setting( get_the_ID(),'instructors' );
			 
		
			 						
					if ( ! empty( $instructors ) ) {
                    ?>
              		<div id="instructor" class="courses-info clearfix <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php global $active_sec; if($active_sec == 'inst'):?>in active<?php endif;?><?php } ?>">
                    	
                     <section class="courses-instructor clearfix">
                     		
                            <h3><?php echo $educationpress_options['educationpress_coursedetail_inst_title']; ?></h3>
                     			<?php 
								foreach ( $instructors as $instructor ) {
									
									$instructor = get_user_by( 'ID', $instructor);
									
									if( $instructor == false)
                                    	continue;
									
									$job_title = get_the_author_meta( 'job_title',$instructor->ID );
									$facebook_url = get_the_author_meta( 'facebook_url',$instructor->ID );
									$twitter_url = get_the_author_meta( 'twitter_url',$instructor->ID );
									$google_plus_url = get_the_author_meta( 'google_plus_url',$instructor->ID );
									$linkedin_url = get_the_author_meta( 'linkedin_url' , $instructor->ID );
									$pinterest_url = get_the_author_meta( 'pinterest_url',$instructor->ID );
									$instagram_url = get_the_author_meta( 'instagram_url',$instructor->ID );
									$youtube_url = get_the_author_meta( 'youtube_url',$instructor->ID );
									$autho_description = get_user_meta($instructor->ID, 'description', true );
									?>
                                <div class="row instructor-single">
                                <div class="col-xs-12 col-sm-2">
                                    <?php  echo get_avatar( $instructor->ID, 150);?>
                                </div>
                                <div class="col-xs-12 col-sm-9">                     	
                                <h3 class="inst-name"><a href="<?php echo esc_url(do_shortcode( '[instructor_profile_url instructor_id="' . $instructor->ID . '"]' )); ?>"><?php echo esc_html($instructor->display_name);?></a></h3>
                                <?php if ( $job_title && $job_title != '' ) {?>
                                <p class="meta"><?php echo esc_html($job_title);?></p>
                                <?php }?>
                                 <ul class="social-icons">
									<?php if( !empty( $twitter_url ) ) :?>
                                    <li><a href="<?php echo esc_url($twitter_url);?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $facebook_url ) ) :?>
                                    <li><a href="<?php echo esc_url($facebook_url);?>"><i class="fa fa-facebook-square"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $linkedin_url ) ) :?>
                                    <li><a href="<?php echo esc_url($linkedin_url);?>"><i class="fa fa-linkedin-square"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $google_plus_url ) ) :?>
                                    <li><a href="<?php echo esc_url($google_plus_url);?>"><i class="fa fa-google-plus"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $pinterest_url ) ) :?>
                                    <li><a href="<?php echo esc_url($pinterest_url);?>"><i class="fa fa-pinterest"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $instagram_url ) ) :?>
                                    <li><a href="<?php echo esc_url($instagram_url);?>"><i class="fa fa-instagram"></i></a></li>
                                    <?php endif;?>
                                    <?php if( !empty( $youtube_url ) ) :?>
                                    <li><a href="<?php echo esc_url($youtube_url);?>"><i class="fa fa-youtube"></i></a></li>
                                    <?php endif;?>
                                </ul>
                                </div>
                         	 <?php if( !empty( $autho_description ) ) :?>
                             <div class="about-instr clearfix">                   	
                             <p><?php echo wp_kses_post($autho_description);?></p>
                            </div>
                            <?php endif;?>
                         </div>
                         <?php }?>
                    </section>
                    
                    </div>
            		<?php }?>