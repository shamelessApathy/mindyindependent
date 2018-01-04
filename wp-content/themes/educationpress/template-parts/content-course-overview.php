<?php
/**
 * Template part for displaying course.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */
global $educationpress_options;

//$units = $course->get_units();

//$student         = new Student( get_current_user_id() );
$is_enrolled = false;
//$is_enrolled     = $student->has_access_to_course( get_the_ID() );
$is_enrolled     =  CoursePress_Data_Course::student_enrolled( get_current_user_id()  , get_the_ID() );

$enrollment_type = CoursePress_Data_Course::get_setting( get_the_ID(), 'enrollment_type' );


 

if(get_post_meta( get_the_ID(), 'total_enroll', true )!=CoursePress_Data_Course::count_students( get_the_ID() )|| get_post_meta( get_the_ID(), 'total_enroll', true )=="")
{
	update_post_meta( get_the_ID(), 'total_enroll', CoursePress_Data_Course::count_students( get_the_ID() ));
}

if ( class_exists('RichReviews')) 
{
	if(get_post_meta( get_the_ID(), 'total_reviews', true )!=educationpress_get_course_average_rating("post",get_the_ID()) || get_post_meta( get_the_ID(), 'total_reviews', true )=="")
	{
		update_post_meta( get_the_ID(), 'total_reviews', educationpress_get_course_average_rating("post",get_the_ID()) );
	}
}
?>
<main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_coursedetail_layout'));?>" >
                	
                     <div class="courses-info">
                     	<h1><?php the_title(); ?></h1>
                        <p class="excerpt"><?php echo strip_tags( get_the_excerpt() ); ?></p>
                        
                         <p class="meta"><?php if($educationpress_options['educationpress_coursedetail_instructor']){ esc_html_e( 'Instructed by: ', 'educationpress' );  echo strip_tags(do_shortcode( '[course_instructors style="list-flat" link="true"  label="" label_plural="" label_delimeter=""]' ),'<a>'); }?> <?php if($educationpress_options['educationpress_coursedetail_cat']){ echo get_the_term_list( get_the_ID(), 'course_category', esc_html__( '. in: ', 'educationpress'), ', ' ); } ?></p>
                     </div><!--courses-info #end  -->
                	
                    <?php
					$course_video = get_post_meta( get_the_ID(), 'cp_featured_video', true );
					//for a tag to only image tag
                  	if(   empty( $course_video ) )
					{?>
                	 <a class="img-thumb " href="<?php the_permalink(); ?>">
                    <?php
					}
					else
					{?>
                    	<div class="img-thumb">
                    <?php
					}
					?>
                    
                        <figure>
                        <?php
						$course_media	 = do_shortcode( '[course_media]' );
						echo do_shortcode( '[course_media]' );
						?>
                        </figure>
                        
                    <?php
                    if( empty( $course_video  ) )
					{?>
                	 </a>
                    <?php
					}
					else
					{?>
                    </div>
                    <?php
					}
					?>
                    <div class="courses-info">
                     <?php if($educationpress_options['educationpress_coursedetail_socialshare']){?>
                    <ul class="social-icons">
                    <?php 
					$fb_share = 'sharer/sharer.php?s=100&p[url]='.get_the_permalink().'&p[images][0]=&p[title]='.get_the_title().'&p[summary]='.( strip_tags( get_the_excerpt() ) ); ?>
                    <li><a href="http://www.facebook.com/<?php echo urlencode ($fb_share);?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                    <?php
					//$twitter_share = 'share?text='.strip_tags(get_the_title()).'&url='.get_the_permalink(); ?>
				
                    <li><a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>%20<?php  echo urlencode(get_the_permalink()); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <?php
                    $mail_share = 'subject='.get_the_title().'&body='.esc_attr(strip_tags( get_the_excerpt() )); ?>
                    <li><a href="mailto:?<?php echo urlencode ($mail_share);?>" target="_top"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    <?php }?>
                    </div>
					
                    <?php
                    	if(  wp_is_mobile() ) {
							?>
                             <div class="courses-info">       
                                <div class="co-join-info">
                                   <?php 
                                    $course_price = educationpress_get_price_text(get_the_ID()); 
									
                                   ?>
                                    
                                    <p class="co-price"><?php esc_html_e( 'Price:', 'educationpress' ); ?>  <span><?php echo esc_html($course_price);?></span>
                                    <?php if(educationpress_is_sale_course(get_the_ID())){?>
                                    <s><?php echo  esc_html(education_course_orig_price( get_the_ID() ));?></s>
                                    <?php }?> 
                                   
                                    </p>
                                    
                                    <div class="btns clearfix">
                                    <?php if ( $enrollment_type=='manually' && !$is_enrolled && !educationpress_is_paid_course( get_the_ID() )) {?>
                                    <span class="apply-button apply-button-enrollment-finished btn apply-button-enrollment-closed btn-orange btn-medium"><?php esc_html_e( 'Contact To Instructors', 'educationpress' ); ?></span>
                                    <?php }?>
                                    
                                    <?php 
									echo do_shortcode( '[course_join_button class="btn apply-button-enrollment-closed btn-orange btn-medium" enroll_text="'.esc_html__('Enroll This Course', 'educationpress').'"]' ); ?>
                                    <?php if($educationpress_options['educationpress_coursedetail_wishlist']){?>
                                    <?php /*?><a href="#" class="fav  <?php if ( $enrollment_type=='passcode' ) {?>passcode-fav <?php }?>"><i class="fa fa-heart-o"></i></a><?php */?>
                                    <?php  
                                    $passcode_class="";
                                    if ( $enrollment_type=='passcode' ) 
                                    {
                                        $passcode_class="passcode-fav";
                                    }
                                    if ( is_user_logged_in() ) 
                                    {
                                    educationpress_li_love_link($love_text = null, $loved_text = null,$passcode_class);
                                    }else{
                                    ?>
                                    <a href="#" class="fav <?php if ( $enrollment_type=='passcode' ) {?>passcode-fav <?php }?>" onclick="return false;"><i class="fa fa-heart-o"></i> <span><?php echo  esc_html(educationpress_li_get_love_count( $post->ID ));?></span></a>
                                    <?php }
                                    }?>
                                    </div>
                                    
                                    
                                    <div class="course_rat clearfix">
                                     <?php if($educationpress_options['educationpress_coursedetail_ratting'] && class_exists('RichReviews')){
                                        $decimal=0;
                                        $roundedAverage=0;
                                        $stars='';
                                        $average=educationpress_get_course_average_rating("post",get_the_ID());
                                        $decimal = $average - floor($average);
                                        if($decimal >= 0.5) {
                                        $roundedAverage = floor($average) + 1;
                                        } else {
                                        $roundedAverage = floor($average);
                                        }?>
                                    <div class="course_rating col-xs-12 col-sm-6 pull-left">
                                        <?php       
                                        for ($i=1; $i<=5; $i++)
                                         {
                                            if ($i <= $roundedAverage) {?>
                                                <i class="glyphicons glyphicon-star"></i>
                                            
                                            <?php
                                            }
                                            else {?>
                                                <i class="glyphicons glyphicon-star-empty"></i>
                                            <?php
                                            }
                                        }?> 
                                    </div>
                                    <?php }?>
                                    
                                    <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo CoursePress_Data_Course::count_students( get_the_ID() ); ?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                                    </div> <!-- course rat #end -->
                                    
                                    <ul>
                                        <?php if(count($units)>0){?>
                                        <li><span><?php esc_html_e( 'Lectures:', 'educationpress' ); ?></span> <?php echo esc_html(count($units));?> </li>
                                        <?php }?>
                                        <?php if ( $is_enrolled ) {?>
                                        <li><span><?php esc_html_e( 'You Enrolled:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_dates label_enrolled="" show_alt_display="no" label=""]' ));?> </li>
                                        <?php }else{?>
                                        <li><span><?php esc_html_e( 'Enroll Dates:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_dates show_alt_display="no" label=""]' ));?> </li>
                                        <?php }?>
                                        
                                        <li><span><?php esc_html_e( 'Course Dates:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_dates show_alt_display="no" label=""]' ));?> </li>
                                        
                                        <li><span><?php esc_html_e( 'Enrollment:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_type label=""]' )); ?> </li>
                                       
                                        
                                        <?php if($course->details->course_language){?>
                                        <li><span><?php esc_html_e( 'Language:', 'educationpress' ); ?></span> <?php echo esc_html($course->details->course_language);?> </li>
                                        <?php }?>
                                        <?php
                                        $course_time_estimation = strip_tags(do_shortcode( '[course_time_estimation]' ));
                                         if($course_time_estimation!='00:00:00'){?>
                                        <li><span><?php esc_html_e( 'Duration:', 'educationpress' ); ?></span> <?php echo  esc_html($course_time_estimation); ?> <?php esc_html_e( '(HH:MM:SS)', 'educationpress'); ?> </li>
                                        <?php }?>
                                      
                                        <?php
                                        $show_link = false;
                                       
                                        $show_link = CoursePress_Data_Certificate::is_enabled();
                                       
                                       
                                        if($show_link){
                                        ?>
                                        <li><span><?php esc_html_e( 'Includes:', 'educationpress' ); ?></span> <?php esc_html_e( 'Certificate of Completion', 'educationpress' ); ?> </li>
                                        <?php }?>
                                        
                                        <?php
                                        if(strip_tags(do_shortcode( '[course_class_size label=""]' ))){
                                        ?>
                                        <li><span><?php esc_html_e( 'Class Size:', 'educationpress' ); ?></span>  <?php echo strip_tags(do_shortcode( '[course_class_size label=""]' )); ?></li>
                                         <?php }?>
                                    </ul>
                                    
                                      
                                </div><!-- co-join-info #end -->
                        </div>
                        <?php
						}
						?>
                        
                  
                   <?php     
                   if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  ) 
				   {
					?>
                    	<?php
						$tab_order  =  $educationpress_options[ 'educationpress_coursedetail_tabs' ]['enabled'] ; 
						
						if(  !$tab_order )
						{
							$tab_order  = array(
											'desc' =>  esc_html__( 'Description', 'educationpress'),
											'structure' => esc_html__( 'Curriculum', 'educationpress'),
											'inst' =>  esc_html__( 'About Instructor', 'educationpress'),
											'reviews' => esc_html__( 'Reviews', 'educationpress'),
											);
						}
						
						
						if( $tab_order ):
						?>	
                    	 <ul id="tab_list" class="nav nav-tabs">
                         	<?php
							global $active_sec;
							$i = 0;
                            foreach ( $tab_order as $key=>$value) {
								switch( $key ) {
								
									case  'desc': 								
									?>
										<!-- Desc Start -->
										<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#description" data-toggle="tab"><?php echo $educationpress_options['educationpress_coursedetail_desc_title']; ?></a> </li>
										<!-- Desc End -->
									<?php
										$i++;
										break;
									case  'structure': 
									?>
										<!-- Structure Start -->
										<?php
										if ( cp_is_true(
													CoursePress_Data_Course::get_setting( get_the_ID(), 'structure_visible' )
												)
										 ) {
										?>
										<li  class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#stucture" data-toggle="tab"><?php echo $educationpress_options['educationpress_coursedetail_structure_title']; ?></a> </li>
										<?php
											$i++;
										}
										?>
										<!-- Structure End -->
									<?php
										
										break;
									case  'inst': 
									?>
										<!-- Inst Start -->
										<?php
										
										//$instructors = Course::get_course_instructors( get_the_ID() );
										$instructors = CoursePress_Data_Course::get_setting( get_the_ID(),'instructors' );						
										
										if ( ! empty( $instructors ) ) {
											?>
										<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#instructor" data-toggle="tab"> <?php echo $educationpress_options['educationpress_coursedetail_inst_title']; ?></a> </li>
										<?php
											$i++;
										}
										?>
										<!-- Inst End -->
									<?php
										break;
									case  'reviews': 
									?>
										<!-- Review Start -->
										<?php							
										if($educationpress_options['educationpress_coursedetail_reviewratings'] && class_exists('RichReviews')){?>
											<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#reviews" data-toggle="tab"><?php echo $educationpress_options['educationpress_coursedetail_reviews_title']; ?></a></li>
										<?php
											$i++;
										}
										?>
										<!-- Review End -->
										<?php
										break;
									} //end switch
									
									if( $i == 1 && !isset($active_sec))
									 $active_sec = $key;
									
                                ?>
                            <?php
							} //end for loop
							?>
                        </ul> 
                        <?php 
						endif;
						?>
                        <div class="tab-content">   
                   <?php
				   
				   }
				   ?>

                    <div id="description" class="courses-info <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  )  {?> tab-pane fade 
					<?php if($active_sec == 'desc'):?>in  active<?php endif;?><?php } ?>">
                    	<h3>
							<?php echo $educationpress_options['educationpress_coursedetail_desc_title'];
                            ?>
                        </h3>
                        <?php 
						$course_post = get_post( get_the_ID() );	
						echo do_shortcode( $course_post->post_content );
						?>
                    </div> <!--courses-info #end  -->
                
          		
                	<?php get_template_part( 'template-parts/content-course-structure', 'single' ); ?>	
               
				    <?php get_template_part( 'template-parts/content-course-instructors', 'single' ); ?>	
                	
			       	<?php get_template_part( 'template-parts/content-course-rating', 'single' ); ?>
				<?php  
                    if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  ) 
				   {
					?>
                    </div>
                    <?php   
                    }        
                   
                ?>

               
                </main><!-- #main -->
                
                <!-- sidebar start-->
					<?php
                    if($educationpress_options['educationpress_coursedetail_layout'] == '2') {
                    $default_layout=" pull-left";
                    } elseif($educationpress_options['educationpress_coursedetail_layout'] == '3') {
                    $default_layout=" pull-right";
                    }?>
                 	<div id="secondary" class="widget-area col-xs-12 col-sm-4 <?php echo esc_attr($default_layout);?>" role="complementary">	
                    	<?php
                    	if( ! wp_is_mobile() ) {
							?>
                    	<div class="co-join-info">
                           <?php 
							$course_price = educationpress_get_price_text( get_the_ID() );
							
						   ?>
                        	
                            <p class="co-price"><?php esc_html_e( 'Price:', 'educationpress' ); ?>  <span><?php echo esc_html($course_price);?></span>
							<?php if(educationpress_is_sale_course(get_the_ID())){?>
                            <s><?php echo  esc_html(education_course_orig_price(get_the_ID()));?></s>
							<?php }?> 
                           
                            </p>
                            
                            <div class="btns clearfix">
                            <?php if ( $enrollment_type=='manually' && !$is_enrolled && !educationpress_is_paid_course( get_the_ID() )) {?>
                            <span class="apply-button apply-button-enrollment-finished btn apply-button-enrollment-closed btn-orange btn-medium"><?php esc_html_e( 'Contact To Instructors', 'educationpress' ); ?></span>
                            <?php }?>
                            
                            <?php 
							
							echo do_shortcode( '[course_join_button course_id="'.get_the_ID().'" class="btn apply-button-enrollment-closed btn-orange btn-medium" enroll_text="'.esc_html__('Enroll This Course', 'educationpress').'"]' ); 
							?>
                            
                            <?php if($educationpress_options['educationpress_coursedetail_wishlist']){?>
                            <?php  
							$passcode_class="";
							if ( $enrollment_type=='passcode' ) 
							{
								$passcode_class="passcode-fav";
							}
							if ( is_user_logged_in() ) 
							{
								educationpress_li_love_link($love_text = null, $loved_text = null,$passcode_class);
							}else{
							?>
                            	<a href="#" class="fav <?php if ( $enrollment_type=='passcode' ) {?>passcode-fav <?php }?>" onclick="return false;"><i class="fa fa-heart-o"></i> <span><?php echo  esc_html(educationpress_li_get_love_count( $post->ID ));?></span></a>
                            <?php }
							}?>
                            </div>
                            
                            
                            <div class="course_rat clearfix">
                             <?php if($educationpress_options['educationpress_coursedetail_ratting'] && class_exists('RichReviews')){
								$decimal=0;
								$roundedAverage=0;
								$stars='';
								$average=educationpress_get_course_average_rating("post",get_the_ID());
								$decimal = $average - floor($average);
								if($decimal >= 0.5) {
								$roundedAverage = floor($average) + 1;
								} else {
								$roundedAverage = floor($average);
								}?>
                            <div class="course_rating col-xs-12 col-sm-6 pull-left">
                                <?php       
								for ($i=1; $i<=5; $i++)
                       			 {
									if ($i <= $roundedAverage) {?>
										<i class="glyphicons glyphicon-star"></i>
									
									<?php
									}
									else {?>
										<i class="glyphicons glyphicon-star-empty"></i>
									<?php
									}
                        		}?> 
                            </div>
                            <?php }?>
                            
                            <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo esc_html(CoursePress_Data_Course::count_students( get_the_ID() ) );?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                            </div> <!-- course rat #end -->
                            
                            <ul>
                            	<?php 
								$post_args = array(
										'post_type' => CoursePress_Data_Unit::get_post_type_name(),
										'post_parent' => get_the_ID(),
										'post_status' => array( 'publish'),
									);
								$unit_query = new WP_Query( $post_args );
								
								if( intval($unit_query->post_count) >0){?>
                            		<li><span><?php esc_html_e( 'Lectures:', 'educationpress' ); ?></span> <?php echo esc_html(intval($unit_query->post_count));?> </li>
                                <?php }?>
                                <?php if ( $is_enrolled ) {?>
                                <li><span><?php esc_html_e( 'You Enrolled:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_dates label_enrolled="" show_alt_display="no" label=""]' ));?> </li>
                                <?php }else{?>
                                <li><span><?php esc_html_e( 'Enroll Dates:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_dates show_alt_display="no" label=""]' ));?> </li>
                                <?php }?>
                                
                                <li><span><?php esc_html_e( 'Course Dates:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_dates show_alt_display="no" label=""]' ));?> </li>
                                
                                <li><span><?php esc_html_e( 'Enrollment:', 'educationpress' ); ?></span> <?php echo strip_tags(do_shortcode( '[course_enrollment_type label=""]' )); ?> </li>
                                <?php 
								$language = CoursePress_Data_Course::get_setting( get_the_ID(), 'course_language', '' );
								if($language){?>
                                <li><span><?php esc_html_e( 'Language:', 'educationpress' ); ?></span> <?php echo esc_html($language);?> </li>
                                <?php }?>
                                <?php
								$course_time_estimation = strip_tags(do_shortcode( '[course_time_estimation]' ));
								 if($course_time_estimation!='00:00:00'){?>
                                <li><span><?php esc_html_e( 'Duration:', 'educationpress' ); ?></span> <?php echo  esc_html($course_time_estimation); ?> <?php esc_html_e( '(HH:MM:SS)', 'educationpress'); ?> </li>
                                <?php }?>
                              
								<?php
                                $show_link = false;
                                
                                $show_link = CoursePress_Data_Certificate::is_enabled();
								if($show_link){
								?>
                                <li><span><?php esc_html_e( 'Includes:', 'educationpress' ); ?></span> <?php esc_html_e( 'Certificate of Completion', 'educationpress' ); ?> </li>
                                <?php }?>
                                
                                <?php
                                if(strip_tags(do_shortcode( '[course_class_size label=""]' ))){
								?>
                                <li><span><?php esc_html_e( 'Class Size:', 'educationpress' ); ?></span>  <?php echo strip_tags(do_shortcode( '[course_class_size label=""]' )); ?></li>
                                 <?php }?>
                            </ul>
                            
                              
                        </div><!-- co-join-info #end -->
                        <?php
						}
						?>
						
                        <?php 
						if (  is_active_sidebar('course-detail' ) ) {
							dynamic_sidebar( 'course-detail' ); 
						}
						?>
 					</div>
                <!-- sidebar #end -->