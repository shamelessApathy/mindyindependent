<?php
/**
 * Template part for displaying course instructors.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPress
 */
 
?>
<?php
	global $edupress_options;
			 $instructors = edupress_university_get_course_instructors( get_the_ID() );
					if ( ! empty( $instructors ) ) {
                    ?>
                      <section class="courses-instructor clearfix">
                     		
                            <h3><?php esc_html_e( 'ABOUT INSTRUCTOR', 'edupress' ); ?></h3>
                     			<?php 
								
								
								
								foreach ( $instructors as $instructor ) {
									
									//if( isset( $instructor->ID ) )
									$author_id =  $instructor->ID;
									//else
									//	continue;
								
									
									$job_title = get_the_author_meta( 'job_title', $author_id );
									$facebook_url = get_the_author_meta( 'facebook_url',$author_id );
									$twitter_url = get_the_author_meta( 'twitter_url',$author_id );
									$google_plus_url = get_the_author_meta( 'google_plus_url',$author_id );
									$linkedin_url = get_the_author_meta( 'linkedin_url' , $author_id );
									$pinterest_url = get_the_author_meta( 'pinterest_url',$author_id );
									$instagram_url = get_the_author_meta( 'instagram_url',$author_id );
									$youtube_url = get_the_author_meta( 'youtube_url',$author_id );
									$autho_description = get_the_author_meta( 'description',$author_id  );
									?>
                                <div class="row instructor-single">
                                 <div class="col-xs-12 col-sm-2">
                                        <?php  echo get_avatar( $author_id, 150);?>
                                    </div>
                                 <div class="col-xs-12 col-sm-9">                     	
                                        <h3 class="inst-name"><?php echo (edupress_university_get_instructor_link($instructor->display_name)); ?></h3>
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
                    
             		<?php }?>