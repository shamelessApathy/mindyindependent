<?php
/**
 * Template part for displaying course rating.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */
global $educationpress_options;?>
<?php if($educationpress_options['educationpress_coursedetail_reviewratings'] && class_exists('RichReviews')){
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
          <div id="reviews" class="courses-info clearfix <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php global $active_sec; if($active_sec == 'reviews'):?>in active<?php endif;?> <?php } ?>">
        <section class="courses-review clearfix">
            <h3><?php echo $educationpress_options['educationpress_coursedetail_reviews_title']; ?></h3>
            <div class="col-xs-12 col-sm-3 average-rating" itemscope itemtype="http://schema.org/Product">
            <span itemprop="name" style="display:none">
            <?php the_title(); ?>
            </span>
              <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            	<p><?php esc_html_e( 'Average Rating', 'educationpress' ); ?></p>
                <p class="total-rating" itemprop="ratingValue"><?php echo esc_html($average);?></p>
                <span>
			<?php       for ($i=1; $i<=5; $i++)
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
                        </span>
                <p itemprop="reviewCount"><?php echo educationpress_get_course_approvedReviews("post",get_the_ID());?> <?php esc_html_e( 'ratings', 'educationpress' ); ?></p>
                <div style="display:none">
					<span itemprop="bestRating">5</span>
					<span itemprop="worstRating">1</span>
				</div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-7">
            	<p><?php esc_html_e( 'Details', 'educationpress' ); ?></p>
                  <!-- 5 start-->   
                <div class="stars-rating">
                  <span><?php esc_html_e( '5 Stars', 'educationpress' ); ?></span>
                 <div class="progress active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo educationpress_get_course_star(get_the_ID(),5);?>" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo educationpress_get_course_star(get_the_ID(),5);?>%"></div>
                </div> 
                  <span><?php echo educationpress_get_course_star(get_the_ID(),5);?></span>		
                </div><!-- 5 start #end-->
                 <!-- 4 start-->   
                <div class="stars-rating">
                  <span><?php esc_html_e( '4 Stars', 'educationpress' ); ?></span>
                 <div class="progress active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo educationpress_get_course_star(get_the_ID(),4);?>" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo educationpress_get_course_star(get_the_ID(),4);?>%"></div>
                </div> 
                  <span><?php echo educationpress_get_course_star(get_the_ID(),4);?></span>		
                </div><!-- 4 start #end-->
                <!-- 3 start-->   
                <div class="stars-rating">
                  <span><?php esc_html_e( '3 Stars', 'educationpress' ); ?></span>
                 <div class="progress active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo educationpress_get_course_star(get_the_ID(),3);?>" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo educationpress_get_course_star(get_the_ID(),3);?>%"></div>
                </div> 
                  <span><?php echo educationpress_get_course_star(get_the_ID(),3);?></span>		
                </div><!-- 3 start #end-->
                
                <!-- 2 start-->   
                <div class="stars-rating">
                  <span><?php esc_html_e( '2 Stars', 'educationpress' ); ?></span>
                 <div class="progress active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo educationpress_get_course_star(get_the_ID(),2);?>" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo educationpress_get_course_star(get_the_ID(),2);?>%"></div>
                </div> 
                  <span><?php echo educationpress_get_course_star(get_the_ID(),2);?></span>		
                </div><!-- 2 start #end-->
                
                 <!-- 1 start-->   
                <div class="stars-rating">
                  <span><?php esc_html_e( '1 Stars', 'educationpress' ); ?></span>
                 <div class="progress active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo educationpress_get_course_star(get_the_ID(),1);?>" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo educationpress_get_course_star(get_the_ID(),1);?>%"></div>
                </div> 
                  <span><?php echo educationpress_get_course_star(get_the_ID(),1);?></span>		
                </div><!-- 1 start #end-->
                
                </div>
        </section> <!--  courses-review #end -->
        
        <ul class="review-list clearfix">
        	 <?php  echo do_shortcode( '[RICH_REVIEWS_SHOW category="post" num="8"]' ); ?>
        	
        </ul>
        <h3><?php esc_html_e( 'ADD A REVIEW', 'educationpress' ); ?></h3>
        <?php  echo do_shortcode( '[RICH_REVIEWS_FORM category="post"]' ); ?>
     </div> <!-- course info #end-->
                    <?php }?>