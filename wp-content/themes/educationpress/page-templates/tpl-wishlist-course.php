<?php
/**
 * Template Name:  Wishlisted Courses
 *
 * @package EducationPress\Page Template
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
 
get_header(); 
global $coursepress,$course_slug;
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
                            <a href="<?php echo esc_url( home_url( '/' ) ). $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php the_title(); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div> <!-- breadcrumb #end  -->
           <?php if ( is_user_logged_in() ) { ?>
                 
               <div id="products" class="list-group"> 
                <h2 class="dash-title"><?php esc_html_e( 'Courses you wishlisted', 'educationpress'); ?> </h2> 
              <?php /* Start the Loop */ 
			  $include_ids = array();
			  $include_ids =  get_user_option('li_user_loves',  get_current_user_id() );
				$post_args = array(
				'order'          => 'ASC',
				'post_type'      => 'course',
				'post_status'    => 'publish',
				'posts_per_page' =>  -1,
				);
				if ( ! empty( $include_ids ) ) {
				$post_args = wp_parse_args( array( 'post__in' => $include_ids ), $post_args );
				}
				
				
				if ( ! empty( $include_ids ) ) {
				$courses = get_posts( $post_args );
				}
			 if ( ! empty( $courses) ) :
			foreach ( $courses as $inscou ){ ?>
            <?php
				//$course				 = new Course( $inscou->ID );
				//$instructors = Course::get_course_instructors( $inscou->ID );
				$course_media = do_shortcode( '[course_media course_id="'.$inscou->ID.'" wrapper="figure" list_page="yes"]' );
				$course_disc = strip_tags(do_shortcode( '[course_summary length="100" course_id="'.$inscou->ID.'" ]' ));
				$course_price = educationpress_get_price_text($inscou->ID); 
				?>
                  <div class="col-xs-12 col-sm-4 zoom courses grid-group-item">
                	<div class="course clist">
                	<a href="<?php echo esc_url(get_permalink($inscou->ID)); ?>" class="img-thumb ">
                    <?php if($educationpress_options['educationpress_courselisting_sale']){?>
                   <?php if ( educationpress_is_sale_course($inscou->ID) &&  educationpress_is_paid_course($inscou->ID)) {?><span class="sale_tag"><?php esc_html_e( 'Sale', 'educationpress'); ?></span><?php }?>
                   <?php }?>
                     	<?php
                        if ( $course_media !== '' ) {
                        echo do_shortcode( '[course_media course_id="'.$inscou->ID.'" wrapper="figure" list_page="yes"]' );
                        }else{
                        ?>
                        <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt=""  />
                        <?php }?>

                    </a>
                                      
                    <div class="course_space">
                     <?php if($educationpress_options['educationpress_courselisting_price']){?>
                    <div class="price"><?php echo esc_html($course_price) ; ?>
					<?php if(educationpress_is_sale_course($inscou->ID)){?>
                    <s>
<?php echo  esc_html(education_course_orig_price( $inscou->ID ));?></s>
                    <?php }?>
                    <span></span></div>
                    <?php }?>
                    <h3><a href="<?php echo esc_url(get_permalink($inscou->ID)); ?>"><?php $title = ( mb_strlen( get_the_title( $inscou->ID) ) >= 65 ) ? mb_substr( get_the_title( $inscou->ID), 0, 65 ) . '...' : get_the_title( $inscou->ID);
					 echo esc_html($title); ?></a></h3>
                    <p class="meta"><?php
					if($educationpress_options['educationpress_courselisting_instructor']){
					 esc_html_e( 'by: ', 'educationpress'); 
					echo strip_tags(do_shortcode( '[course_instructors course_id="'.$inscou->ID.'" style="list-flat" link="true" label="" label_plural="" label_delimeter=""]' ),'<a>');
						}
					 ?>
                     <?php if($educationpress_options['educationpress_courselisting_cat']){?>
                     <?php esc_html_e( 'in:', 'educationpress'); ?>  <?php echo get_the_term_list( $inscou->ID, 'course_category', ' ', ', ', '' ); ?>
                     <?php }?>
                     </p>
                    <p><?php echo esc_html($course_disc);?></p>
                    
                    
                	</div> <!--course #end -->
                    	
                        <div class="course_rel">
                        <?php if($educationpress_options['educationpress_courselisting_ratting']  && class_exists('RichReviews')){
							$decimal=0;
							 $roundedAverage=0;
							 $stars='';
							 $average=educationpress_get_course_average_rating("post",$inscou->ID);
							 $decimal = $average - floor($average);
							 if($decimal >= 0.5) {
							 	$roundedAverage = floor($average) + 1;
							 } else {
								 $roundedAverage = floor($average);
							 }?>
                    	<div class="course_rating col-xs-12 col-sm-5">
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
                      
                        <p class="enroll col-xs-12 col-sm-7">
						<a title="<?php esc_html_e( 'Remove', 'educationpress'); ?>" href="#" data-post-id="<?php echo esc_attr(  $inscou->ID );?>" data-user-id="<?php echo esc_attr(  get_current_user_id() ) ;?>" class="loved like-id"><i class="fa fa-heart"></i> <?php esc_html_e( 'Wishlist', 'educationpress'); ?></a>
                        <?php if($educationpress_options['educationpress_courselisting_enroll']){?>
                         |
						<?php echo CoursePress_Data_Course::count_students( $inscou->ID); ?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?>
                        <?php }?>
                        </p>
                    	
                     
                        </div>
                    
                    </div>  <!--course space #end -->
                </div> <!-- course #end -->
                <?php } ?>


		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
               
      </div>
        
           
			<?php
            } else {
                //ob_start();
                // if( defined('DOING_AJAX') && DOING_AJAX ) { cp_write_log('doing ajax'); }
                wp_redirect( get_option( 'use_custom_login_form', 1 ) ? CoursePress::instance()->get_signup_slug( true ) : wp_login_url() );
                exit;
            }?>
           
           </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- course-learn-spacer #end -->
<?php get_footer(); ?>