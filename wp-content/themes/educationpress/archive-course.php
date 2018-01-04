<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Educationpress
 */
get_header();?>
<?php
global $wp_query;
global $educationpress_options;
$educationpress_options['educationpress_courselisting_mode'];
$view_mode=($educationpress_options['educationpress_courselisting_mode'] == '1') ? "grid-group-item" : "grid-group-item list-group-item" ; ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
           		 <?php
				 	if( !empty($wp_query->query['course_category']) && 
					$wp_query->query['course_category'] != 'all' ):
					
				 	//$current_term = single_term_title("", false);
					//if ( !empty( $current_term  ) ) :
						echo '<h1 class="page-title">';
						esc_html_e( 'Course Category : ', 'educationpress' );
						$tax = get_term_by( 'slug', $wp_query->query['course_category'], 'course_category'); 
						echo $tax->name;
						echo "</h1>";
					?>
					<?php /*?><h1 class="page-title"><?php echo esc_html( $current_term );?></h1><?php */?>
					<?php
					else:
					?>
							<h1 class="page-title"><?php esc_html_e('Courses', 'educationpress');?></h1>
                            <?php
					endif;
				
				 ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>



<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
       <div class="container">
        	<div class="row">

		

		<main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_courselisting_layout'));?>"  >
        
        
          	<?php
            	if( !empty($wp_query->query['course_category']) && $wp_query->query['course_category'] != 'all' ):
					if( !empty($tax->description) ):
						echo '<div class="taxonomy-description">'; 
						echo esc_html($tax->description);
						echo '</div>';
					endif;
				endif;
                ?>
                
                
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
             <?php
			 
			 	global $wp_query,$paged, $educationpress_options;
				$number_of_courses = intval( $educationpress_options[ 'educationpress_courselisting_number' ] );
				$default_sort = $educationpress_options[ 'educationpress_courselisting_default_sort' ];
				$course_args = array(
					'post_type' => 'course', 
					'posts_per_page' => $number_of_courses,
					'paged' => $paged,
					
				);
				
				if( isset( $tax ))
			 	{
					$course_args['tax_query'] = array(
						array(
							'taxonomy' => 'course_category',
							'field'    => 'term_id',
							'terms'    => array( $tax->term_id ),
						),
					);
					
				}
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
					
			$freecourse =$_GET['free'];
			$meta_query[] = array(
					'key' => 'cp_payment_paid_course',
					/*
					'value' => $freecourse,
					'compare' => 'LIKE',
					*/
					'value' => 'on',
					'compare' => 'NOT LIKE',
				);
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
				$freecourse =$_GET['paid'];
				$meta_query[]  = array(
					'key' => 'cp_payment_paid_course',
					'value' => $freecourse,
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
			$wp_query = new WP_Query( $course_args );
				//query_posts($args);
			
				/*
				have_posts();
				have_posts();  the_post();
				the_content();
				die;
				*/
			
			 
		
			 
			  /* Start the Loop */ ?>
             <?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
            <?php
				$course_media = do_shortcode( '[course_media course_id="'.get_the_ID().'" wrapper="figure" list_page="yes"]' );
				$course_disc = strip_tags(do_shortcode( '[course_summary length="100" course_id="'.get_the_ID().'" ]' ));
				$course_price = educationpress_get_price_text(get_the_ID()); 
				?>
                  <div class="col-xs-12 <?php echo esc_attr(educationpress_column_class('educationpress_courselisting_layout'));?> zoom courses <?php echo  esc_attr($view_mode);?>">
                	<div class="course clist">
                    <?php
					$course_video = get_post_meta( get_the_ID(), 'course_video_url', true );
					//for a tag to only image tag
                  	if(   empty( $course_video ) )
					{?>
                	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="img-thumb ">
                    <?php
					}
					else
					{?>
                    	<div class="img-thumb">
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
                    <div class="price"><?php echo  esc_html($course_price) ; ?>
                    <?php if(educationpress_is_sale_course(get_the_ID())){?>
                    <s><?php echo  esc_html(education_course_orig_price( get_the_ID() ));?></s>
                    <?php }?>
                    <span></span></div>
                    <?php }?>
                    <h3><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php $title = ( mb_strlen( get_the_title( get_the_ID()) ) >= 65 ) ? mb_substr( get_the_title( get_the_ID()), 0, 65 ) . '...' : get_the_title( get_the_ID());
					 echo  $title; ?></a></h3>
                    <p class="meta">
					<?php
					if($educationpress_options['educationpress_courselisting_instructor']){
					 esc_html_e( 'by: ', 'educationpress'); 
					 echo strip_tags(do_shortcode( '[course_instructors style="list-flat" link="true" label="" label_plural="" course_id="' . get_the_ID() .'" label_delimeter="" ]' ),'<a>');
						}
					 ?>
					 <?php if($educationpress_options['educationpress_courselisting_cat'] && get_the_term_list( get_the_ID(), 'course_category', ' ', ', ', '' )){?>
                     <?php esc_html_e( 'in:', 'educationpress'); ?>  <?php echo get_the_term_list( get_the_ID(), 'course_category', ' ', ', ', '' ); ?>
                     <?php }?>
                     </p>
                     
                    <p><?php echo strip_tags(do_shortcode( '[course_summary length="100" course_id="'.get_the_ID().'" ]' ));?></p>
                    
                    
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
                        <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo CoursePress_Data_Course::count_students( get_the_ID() ); ?> <?php esc_html_e( 'Enrolled', 'educationpress'); ?></p>
                         <?php }?>
                    	</div>
                    
                    </div>  <!--course space #end -->
                </div> <!-- course #end -->
                <?php endwhile; ?>

			<?php if(function_exists('educationpress_pagination')){
				educationpress_pagination( $wp_query );
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
