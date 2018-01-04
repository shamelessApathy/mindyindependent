<?php
/**
 * Template Name: All Courses
 *
 * @package EducationPress\Page-Templates
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */

get_header();?>
<?php
global $educationpress_options;
$default_sort = $educationpress_options[ 'educationpress_courselisting_default_sort' ];
$educationpress_options['educationpress_courselisting_mode'];
$view_mode=($educationpress_options['educationpress_courselisting_mode'] == '1') ? "grid-group-item" : "grid-group-item list-group-item" ;
$number_of_courses = intval( $educationpress_options[ 'educationpress_courselisting_number' ] );
 ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           		 <?php 
				 //For woocommerce shop page
				 if(class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' ) &&  in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) )) && function_exists( 'is_shop' ) && is_shop() &&  function_exists( 'woocommerce_page_title' ) ) {
					 echo '<h1 class="entry-title">';
					 woocommerce_page_title();
					 echo '</h1>';
				 }
				 else {
				 	the_title( '<h1 class="entry-title">', '</h1>' );
				 }
				 
				  ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
       <div class="container">
        	<div class="row">

		<main id="main" class="site-main col-xs-12<?php echo esc_html(educationpress_page_layout('educationpress_courselisting_layout'));?>"  >
        	
                
                
                
         <div class="well well-sm row">
         		
                <div class="col-xs-12 col-sm-5 sorting">
                	<?php  
					if($educationpress_options['educationpress_courselisting_sorting']){
					add_course_soring_dropdown();
					}?>
                </div>
         
                 <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm <?php if($educationpress_options['educationpress_courselisting_mode'] == '2'){?>active<?php }?>"><span class="glyphicon glyphicon-th-list">
                    </span></a> <a href="#" id="grid" class="btn btn-default btn-sm <?php if($educationpress_options['educationpress_courselisting_mode'] == '1'){?>active<?php }?>"><span
                        class="glyphicon glyphicon-th"></span></a>
                </div>
            </div>
            
			<div id="products" class="list-group"> 
     		<div class="row"> 
             <?php /* Start the Loop */ 
			  global $paged;
                            if ( is_front_page() ) {
                                $paged = ( get_query_var('page') ) ? get_query_var( 'page' ) : 1;
                            }
			  $course_args = array(
                'post_type' => 'course',
                'posts_per_page' => $number_of_courses,
				'paged' => $paged
                
            );
			if(!isset($_GET['c_sort']))
			{
				$_GET['c_sort']= $default_sort;
			}
			
		if($_GET['c_sort']=="plow_high" || $default_sort=="plow_high") 
		{
			$course_args['meta_key']= "cp_mp_product_price";
			$course_args['orderby']= "meta_value_num";
			$course_args['order']= "ASC";
		}
		if($_GET['c_sort']=="phigh_low" || $default_sort=="phigh_low")
		{
			$course_args['meta_key']= "cp_mp_product_price";
			$course_args['orderby']= "meta_value_num";
			$course_args['order']= "DESC";
		}
		if($_GET['c_sort']=="popular" || $default_sort=="popular")
		{
			$course_args['meta_key']= "total_enroll";
			$course_args['orderby']= "meta_value_num";
			$course_args['order']= "DESC";
		}
		if($_GET['c_sort']=="ratings" || $default_sort=="ratings" && class_exists('RichReviews'))
		{
			$course_args['meta_key']= "total_reviews";
			$course_args['orderby']= "meta_value_num";
			$course_args['order']= "DESC";
		}
		
		if ( !empty( $_GET['free'] ) && empty( $_GET['paid'] ) ) {
					
			//$freecourse =$_GET['free'];
			$meta_query[] = array(
					'key' => 'cp_payment_paid_course',
					'value' => 'on',
					'compare' => 'NOT LIKE',
				);
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
				//$freecourse =$_GET['paid'];
				$meta_query[]  = array(
					'key' => 'cp_payment_paid_course',
					'value' => 'on',
					'compare' => 'LIKE',
				);
				
		}
		
		
		if (  !empty( $_GET['lang'] ) ) {
					
				$c_lang_arr = explode(",", $_GET["lang"]);
				
				$meta_query[] = array(
					'key' => 'course_language',
					'value' => $c_lang_arr,
					'compare' => 'IN',
				);

			
			
		}
		if (  !empty( $_GET['lang'] ) ||  !empty( $_GET['paid'] ) || !empty( $_GET['free'] )) 
		{
			if ( ! empty( $meta_query ) ) 
			{
				$course_args['meta_query']=$meta_query;
				//$query->set( 'meta_query', $meta_query);
			}
		}
		
		 if($_GET['c_sort']=='alphabet_az' || ($default_sort=='alphabet_az' && $_GET['c_sort']==''))
		 {
			$course_args['orderby']= "title";
			$course_args['order']= "ASC";

		 }
		 if($_GET['c_sort']=='alphabet_za' || ($default_sort=='alphabet_za' && $_GET['c_sort']==''))
		 {
			$course_args['orderby']= "title";
			$course_args['order']= "DESC";
		 }
		 if($_GET['c_sort']=='new_first' || ($default_sort=='new_first' && $_GET['c_sort']==''))
		 {
			$course_args['orderby']= "date";
			$course_args['order']= "DESC";
		 }
		 if($_GET['c_sort']=='old_first' || ($default_sort=='old_first' && $_GET['c_sort']==''))
		 {
			$course_args['orderby']= "date";
			$course_args['order']= "ASC";

		 }
		
			//only showing publish course
			$course_args['post_status'] = 'publish';
			$course_query = new WP_Query($course_args);
			 ?>
             <?php if ( $course_query->have_posts() ) : ?>
			<?php while ( $course_query->have_posts() ) : $course_query->the_post(); ?>
            <?php
				$course_media = do_shortcode( '[course_media course_id="'.get_the_ID().'" wrapper="figure" list_page="yes"]' );
				$course_disc = strip_tags(do_shortcode( '[course_summary length="100" course_id="'.get_the_ID().'" ]' ));
				
				$course_price = educationpress_get_price_text(get_the_ID()); 				
				?>
                  <div class="col-xs-12 <?php echo esc_html(educationpress_column_class('educationpress_courselisting_layout'));?> zoom courses <?php echo esc_attr($view_mode);?>">
                	<div class="course clist">
                    <?php
                    $course_video = get_post_meta( get_the_ID(), 'course_video_url', true );
					//for a tag to only image tag
					if(   empty( $course_video ) )
					{
						?>
	                	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="img-thumb ">
                    <?php
					}
					else
					{
						?>
                        <div class="img-thumb ">
                        <?php
						
					}
					?>
                   <?php if($educationpress_options['educationpress_courselisting_sale']){?>
                  
                   <?php if ( educationpress_is_sale_course(get_the_ID()) &&  educationpress_is_paid_course(get_the_ID())) {?><span class="sale_tag"><?php esc_html_e( 'Sale', 'educationpress'); ?></span><?php }?>
                   <?php }?>
                    
                    
					<?php
					if ( $course_media !== '' ) {
						
					
							echo do_shortcode( '[course_media course_id="'.get_the_ID().'" wrapper="figure" list_page="yes"]' );
						
					}else{
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt=""  />
                    <?php }?>
                    <?php
                    //for a tag to only image tag
                  	if(   empty( $course_video ) )
					{?>
                    	</a>
                    <?php
					}
					else
					{
					?>
                    	</div>
                    <?php
					}
					?>
                    <div class="course_space">
                     <?php if($educationpress_options['educationpress_courselisting_price']){?>
                    <div class="price"><?php echo esc_html($course_price) ; ?>
                    <?php if(educationpress_is_sale_course(get_the_ID())){?>
                    <s><?php echo  esc_html(education_course_orig_price( get_the_ID() ));?></s>
                    <?php }?>
                    <span></span></div>
                    <?php }?>
                    <h3><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php 
					$title = ( mb_strlen( get_the_title( get_the_ID()) ) >= 65 ) ? mb_substr( get_the_title( get_the_ID()), 0, 65 ) . '...' : get_the_title( get_the_ID());
					 echo $title; ?></a></h3>
                    <p class="meta">
					<?php
					if($educationpress_options['educationpress_courselisting_instructor']){
					 esc_html_e( 'by: ', 'educationpress'); 
					 echo strip_tags(do_shortcode( '[course_instructors course_id="'.get_the_ID().'" style="list-flat" link="true"  label="" label_plural="" label_delimeter=""]' ),'<a>');
						}
					 ?>
					 <?php if($educationpress_options['educationpress_courselisting_cat']){?>
                     <?php esc_html_e( 'in:', 'educationpress'); ?>  <?php echo get_the_term_list( get_the_ID(), 'course_category', ' ', ', ', '' ); ?>
                     <?php }?>
                     </p>
                     
                    <p class="desc"><?php echo $course_disc;?></p>
                    
                    
                	</div> <!--course #end -->
                    	
                        <div class="course_rel">
                        <?php if($educationpress_options['educationpress_courselisting_ratting'] && class_exists('RichReviews')){
							 $decimal=0;
							 $roundedAverage=0;
							 $stars='';
							 $average=educationpress_get_course_average_rating("post",get_the_ID());
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
                        <?php if($educationpress_options['educationpress_courselisting_enroll']){?>
                        <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo CoursePress_Data_Course::count_students( get_the_ID() );?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                         <?php }?>
                    	</div>
                    
                    </div>  <!--course space #end -->
                </div> <!-- course #end -->
                <?php endwhile; ?>

			<?php if(function_exists('educationpress_pagination')){
				educationpress_pagination( $course_query );
				} 
                  wp_reset_postdata();?>

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
