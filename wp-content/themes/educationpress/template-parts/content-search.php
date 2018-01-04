<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package educationpress
 */
global $educationpress_options;
?>
<?php
 	
	//$course_id = get_post_meta( get_the_ID(), 'cp_course_id', true ); 
	$course_id = get_the_ID();
			
				$course_media = do_shortcode( '[course_media course_id="'.$course_id.'" wrapper="figure" list_page="yes"]' );
				$course_disc = strip_tags(do_shortcode( '[course_summary length="100" course_id="'.$course_id.'" ]' ));
				$course_price = educationpress_get_price_text($course_id); 
				?>
                  <div class="col-xs-12 <?php echo esc_attr(educationpress_column_class('educationpress_searchcourse_layout'));?> zoom courses grid-group-item">
                	<div class="course clist">
                	<a href="<?php echo esc_url(get_permalink($course_id)); ?>" class="img-thumb ">
                    <?php if($educationpress_options['educationpress_coursesearch_sale']){?>
                   <?php if ( educationpress_is_sale_course( $course_id  ) &&
				    educationpress_is_paid_course ( $course_id )) {?><span class="sale_tag"><?php esc_html_e( 'Sale', 'educationpress'); ?></span><?php }?>
                   <?php }?>
                     <?php
					if ( $course_media !== '' ) {
                    echo do_shortcode( '[course_media course_id="'.$course_id.'" wrapper="figure" list_page="yes"]' );
					}else{
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt=""  />
                    <?php }?>
                    </a>
                                      
                    <div class="course_space">
                     <?php if($educationpress_options['educationpress_coursesearch_price']){?>
                    <div class="price"><?php echo esc_html($course_price) ; ?>
                    <?php if(educationpress_is_sale_course($course_id)){?>
                    <s><?php echo  esc_html(education_course_orig_price( $course_id ));?></s>
                    <?php }?>
                    <span></span></div>
                    <?php }?>
                    <h3><a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php $title = ( mb_strlen( get_the_title( $course_id) ) >= 65 ) ? mb_substr( get_the_title( $course_id), 0, 65 ) . '...' : get_the_title( $course_id);
					 echo esc_html($title); ?></a></h3>
                    <p class="meta">
					<?php
					if($educationpress_options['educationpress_coursesearch_instructor']){
					 esc_html_e( 'by: ', 'educationpress'); 
					 echo strip_tags(do_shortcode( '[course_instructors style="list-flat" link="true"  label="" label_plural="" label_delimeter=""]' ),'<a>');
						}
						
						
						
					 ?>
					 <?php if($educationpress_options['educationpress_coursesearch_cat']){?>
                     <?php esc_html_e( 'in:', 'educationpress'); ?>  <?php echo get_the_term_list( $course_id, 'course_category', ' ', ', ', '' ); ?>
                     <?php }?>
                     </p>
                     
                    <p><?php echo strip_tags(do_shortcode( '[course_summary length="100" course_id="'.$course_id.'" ]' ));?></p>
                    
                    
                	</div> <!--course #end -->
                    	
                        <div class="course_rel">
                        <?php if($educationpress_options['educationpress_coursesearch_ratting'] && class_exists('RichReviews')){
							 $decimal=0;
							 $roundedAverage=0;
							 $stars='';
							 $average=educationpress_get_course_average_rating("post",$course_id);
							 $decimal = $average - floor($average);
							 if($decimal >= 0.5) {
							 	$roundedAverage = floor($average) + 1;
							 } else {
								 $roundedAverage = floor($average);
							 }
							
							?>
                    	<div class="course_rating col-xs-12 col-sm-6">
                        	 
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
                        <?php if($educationpress_options['educationpress_coursesearch_enroll']){?>
                        <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo CoursePress_Data_Course::count_students( $course_id ); ?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                         <?php }?>
                    	</div>
                    
                    </div>  <!--course space #end -->
                </div> <!-- course #end -->
