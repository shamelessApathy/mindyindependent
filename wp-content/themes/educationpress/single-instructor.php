<?php
/**
 * The Template for displaying instructor profile.
 *
 * @package CoursePress
*/

get_header(); 
//$user = $vars['user']; //get user info from the CoursePress plugin
$display_name = urldecode(get_query_var('instructor'));  


//$users = get_user_by('display_name', $display_name);
$args= array(
  'search' => $display_name, // or login or nicename in this example
  'search_fields' => array('display_name')
);

$users =  get_users( $args ) ; 

$user =  ( isset( $users[0] ) ? $users[0] : false );

//$instructor = new Instructor($user->ID);
$instructor = $user; 
$course_ids = CoursePress_Data_Instructor::get_assigned_courses_ids( $user->ID , 'all');

global $educationpress_options;
?>


<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <h1 class="entry-title">
            <?php printf( esc_html__( 'Instructor: %s', 'educationpress' ), $instructor->display_name );?>
             </h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>


<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_courseinstructor_layout'));?>" >
                
                <section class="co-author clearfix">
                     	<div class="col-xs-12 col-sm-2">
                        	<?php echo get_avatar($user->ID, 150 );?>
                        </div>
                     	<div class="col-xs-12 col-sm-9">                     	
                         <h3><a href="<?php echo esc_url(do_shortcode( '[instructor_profile_url instructor_id="' . $user->ID . '"]' )); ?>"><?php echo esc_html( $instructor->display_name );?></a></h3>
                        <?php $job_title = get_the_author_meta( 'job_title',$user->ID );
                        if ( $job_title && $job_title != '' ) {?>
                        <p class="meta"><?php echo esc_html($job_title);?></p>
                        <?php }?>
                        <?php 
						$facebook_url = get_the_author_meta( 'facebook_url' ,$user->ID);
						$twitter_url = get_the_author_meta( 'twitter_url',$user->ID );
						$google_plus_url = get_the_author_meta( 'google_plus_url',$user->ID );
						$linkedin_url = get_the_author_meta( 'linkedin_url',$user->ID );
						$pinterest_url = get_the_author_meta( 'pinterest_url',$user->ID );
						$instagram_url = get_the_author_meta( 'instagram_url',$user->ID );
						$youtube_url = get_the_author_meta( 'youtube_url',$user->ID );
						?>
                         <ul class="social-icons si-detail">
                            
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
                        <?php if ( get_user_meta($user->ID , 'description', true) ) : ?>    
                        <div class="col-xs-12">  
                         <p><?php echo wp_kses_post(get_user_meta($user->ID, 'description', true  )); ?></p>
                        </div>
                        <?php endif; ?>
                    </section>
                    
                    
                    
               <div id="products" class="list-group"> 
     		<div class="row">  
             <?php /* Start the Loop */ 
			   /*
			   $include_ids = array();
               $include_ids = array_unique( array_merge( $include_ids, $course_ids ) );
			   */
			   $include_ids = array_unique(  $course_ids  );
			   
			   
			   $number = get_option('posts_per_page');
			 $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			 //$page = ($_GET['page']) ? $_GET['page'] : 1;
			  $offset = ($page - 1) * $number;
				$post_args = array(
				'order'          => 'ASC',
				'post_type'      => CoursePress_Data_Course::get_post_type_name(),
				'post_status'    => 'publish',
				'posts_per_page' =>  -1,
				'suppress_filters' => true,
			//	'paged' => $page,
				);
				if ( ! empty( $include_ids ) ) {
				$post_args = wp_parse_args( array( 'post__in' => $include_ids ), $post_args );
				}
				
				
				
				
				if ( ! empty( $include_ids ) ) {
					$courses = get_posts( $post_args );
				}
			
				
			 if ( count( $courses)>0 ) :
				//$total_courses = count( $courses);
				//$total_pages = ceil($total_courses / $number) ;
			foreach ( $courses as $inscou ){ ?>
            <?php
				//$course				 = new Course( $inscou->ID );
				//$instructors = Course::get_course_instructors( $inscou->ID );
				$course_media = do_shortcode( '[course_media course_id="'.$inscou->ID.'" wrapper="figure" list_page="yes"]' );
				$course_disc = do_shortcode( '[course_summary length="100" course_id="'.$inscou->ID.'" ]' );
				$course_price = educationpress_get_price_text($inscou->ID); 
				?>
                  <div class="col-xs-12 <?php echo esc_attr( educationpress_column_class('educationpress_courseinstructor_layout'));?> zoom courses grid-group-item">
                	<div class="course clist">
                	<a href="<?php echo esc_url(get_permalink($inscou->ID)); ?>" class="img-thumb ">
                    <?php if($educationpress_options['educationpress_courselisting_sale']){?>
                   <?php if ( educationpress_is_sale_course($inscou->ID) &&   educationpress_is_paid_course($inscou->ID)) {?><span class="sale_tag"><?php esc_html_e( 'Sale', 'educationpress'); ?></span><?php }?>
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
                     <?php if ( educationpress_is_sale_course($inscou->ID) ){?>
                    <s><?php echo  esc_html(educationpress_format_currency( get_post_meta( $inscou->ID, 'cp_mp_product_price', true ) ));?></s>
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
                    <p><?php echo strip_tags(do_shortcode( '[course_summary length="100" course_id="'.$inscou->ID.'" ]' ));?></p>
                    
                    
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
                        <?php if($educationpress_options['educationpress_courselisting_enroll']){?>
                        <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo esc_html(CoursePress_Data_Course::count_students($inscou->ID));?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                    	<?php }?>
                        </div>
                    
                    </div>  <!--course space #end -->
                </div> <!-- course #end -->
                <?php } ?>


		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
               
        </div> <!-- row #end -->
     </div>
        


        
        </main>   <!-- main -->

 <?php get_sidebar(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(); ?>
