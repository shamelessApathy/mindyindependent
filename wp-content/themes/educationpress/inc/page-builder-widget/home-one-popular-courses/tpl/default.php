<?php
/**
 * @var $title
 */
 global $educationpress_options,$instructor_profile_slug;
?>
<section class="popular-courses">
       		<div class="container">
            	<div class="row">
            	<div class="course_list">
                <?php  if ( ! empty(  $title) ) {?>
            	<h2 class="text-center head-border-default"><?php echo esc_html( $title); ?></h2>
                 <?php }?>
                <!-- course start-->
				<?php
				$popular_course_no=$course_no;
				 $popular_course_orderby=$course_orderby;
				 $popular_course_cat=$course_cat;
			     $args1 =  array( 'post_type' => 'course','posts_per_page' => $popular_course_no,'post_status' => 'publish') ; 
				 if((int)$popular_course_cat>0)
				 {
					$tax_query_args = array(
					'tax_query' => array(
					array(
					'taxonomy' => 'course_category',
					'field' => 'term_id',
					'terms' => $popular_course_cat
					)
					)
					); 
					$args1=array_merge($args1,$tax_query_args );
				 }
				 if($popular_course_orderby=='date' || $popular_course_orderby=='rand' || $popular_course_orderby=='title')
				 {
					 if($popular_course_orderby=='date')
					 {
					 	$orderby_query_args = array('orderby' => $popular_course_orderby, 'order' => 'DESC') ; 
					 }
					 elseif($popular_course_orderby=='title')
					 {
					 	$orderby_query_args = array('orderby' => $popular_course_orderby, 'order' => 'ASC') ; 
					 }
					 else
						 $orderby_query_args = array('orderby' => $popular_course_orderby) ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 if($popular_course_orderby=='popular')
				 {
					 $orderby_query_args = array('meta_key' => 'total_enroll', 'orderby' => 'meta_value_num', 'order' => 'DESC') ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				 if($popular_course_orderby=='ratings' && class_exists('RichReviews'))
				 {
					 $orderby_query_args = array('meta_key' => 'total_reviews', 'orderby' => 'meta_value_num', 'order' => 'DESC') ; 
					
					 $args1=array_merge($args1,$orderby_query_args );
				 }
				

				 
				 
				 $popularcourses = get_posts( $args1 );
				if (  $popularcourses ) : ?>
                <?php
				$j = 0;
				foreach ( $popularcourses as $popular_course ) {
					$j++;
					
				
					
				$course_media	 = do_shortcode( '[course_media course_id="'.$popular_course->ID.'" wrapper="figure" list_page="yes"]' );
				
				
				$course_price = educationpress_get_price_text($popular_course->ID); 
				?>

                <div class="col-xs-12 col-sm-4 zoom">
                	<div class="course">
                	<a href="<?php echo esc_url(get_permalink($popular_course->ID)); ?>" class="img-thumb ">
                     <?php if($educationpress_options['educationpress_courselisting_sale']){?>
					<?php if ( educationpress_is_sale_course($popular_course->ID) &&  educationpress_is_paid_course($popular_course->ID)) {?><span class="sale_tag"><?php esc_html_e( 'Sale', 'educationpress'); ?></span><?php }?>
                     <?php }?>
					<?php
					if ( $course_media !== '' ) {
                    echo do_shortcode( '[course_media course_id="'.$popular_course->ID.'" wrapper="figure" list_page="yes"]' );
					}else{
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt=""  />
                    <?php }?>
                    </a>
                                      
                    <div class="course_space">
                     <?php if($educationpress_options['educationpress_courselisting_price']){?>
                    <div class="price"><?php echo esc_html($course_price) ; ?>
                    <?php if(educationpress_is_sale_course($popular_course->ID)){?>
                    <s><?php echo  esc_html(education_course_orig_price( $popular_course->ID ));?></s>
                    <?php }?>
                    <span></span></div>
                     <?php }?>
                    <h3><a href="<?php echo esc_url(get_permalink($popular_course->ID)); ?>" rel="bookmark">
					<?php $title = ( mb_strlen( get_the_title( $popular_course->ID) ) >= 65 ) ? mb_substr( get_the_title( $popular_course->ID), 0, 65 ) . '...' : get_the_title( $popular_course->ID);
					 echo esc_html($title); ?> </a></h3>
                    <p class="meta">
                    <?php
					if($educationpress_options['educationpress_courselisting_instructor']){
					 esc_html_e( 'by: ', 'educationpress'); 
					 echo strip_tags(do_shortcode( '[course_instructors course_id="'.$popular_course->ID.'" style="list-flat" link="true" label="" label_plural="" label_delimeter=""]' ),'<a>');
						}
					 ?>
					<?php if($educationpress_options['educationpress_courselisting_cat']){?>
                     <?php esc_html_e( 'in:', 'educationpress'); ?>  <?php echo get_the_term_list( $popular_course->ID, 'course_category', ' ', ', ', '' ); ?>
                     <?php }?>
                     </p>
                   <?php echo do_shortcode( '[course_summary course_id="'.$popular_course->ID.'" length="100" class=""]' );?>
                   
                    
                 	</div> <!--course space #end -->
                    
                    <div class="course_rel">
                    <?php if($educationpress_options['educationpress_courselisting_ratting'] && class_exists('RichReviews')){
							$decimal=0;
							 $roundedAverage=0;
							 $stars='';
							 $average=educationpress_get_course_average_rating("post",$popular_course->ID);
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
                        </div><!-- course_rating #end  -->
                        <?php }?>
                         <?php if($educationpress_options['educationpress_courselisting_enroll']){?>
                        <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo CoursePress_Data_Course::count_students( $popular_course->ID ); ?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?> </p>
                         <?php }?>
                    	</div><!--course_rel #end -->
                    
                    </div>  <!--course space #end -->
                </div> <!-- col course #end -->
                	<?php 
					if($j % 3 == 0) {
					?>
						<div class="clearfix"></div>
					 <?php 
					 }
					 ?>
                
                <?php }?>
                <?php endif; ?>
                
                 <!-- course start End-->
                
                <?php  if ( ! empty($button_url ) ) {?>
                <div class="btn-group text-center col-xs-12">
                <a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-orange btn-medium"><?php echo esc_html($button_text); ?><i class="lnr lnr-arrow-right"></i></a>
                </div>
                 <?php }?>
                
               </div>   <!-- #course_list #end  -->
                </div> <!-- row #end -->
            </div><!-- #container #end  -->
       </section>