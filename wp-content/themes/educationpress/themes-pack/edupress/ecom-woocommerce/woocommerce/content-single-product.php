<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php

	global $edupress_options, $product;
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<!--
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>-->
<main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_coursedetail_layout'));?>" >
	<div class="courses-info">
	

	<!--<div class="summary entry-summary">-->

                     
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @removed hooked woocommerce_template_single_rating - 10
			 * @removed hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @removed hooked woocommerce_template_single_add_to_cart - 30
			 * @removed hooked woocommerce_template_single_meta - 40
			 * @removed hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
         <p class="meta">
		 	<?php				
				 if($edupress_options['edupress_coursedetail_instructor']){
				 	esc_html_e( 'Instructed by: ', 'edupress' );  
				 	echo edupress_ecommerce_get_author_link();
				 }				
				 if($edupress_options['edupress_coursedetail_cat']){ 
				 	echo get_the_term_list( get_the_ID(), 'product_cat', esc_html__( '. in: ', 'edupress'), ', ' ); } 
				if( !empty($edupress_options['edupress_coursedetail_tag']) && $edupress_options['edupress_coursedetail_tag']){ 
                    echo get_the_term_list( get_the_ID(), 'product_tag', esc_html__( '. tags: ', 'edupress'), ', ' ); 
				}?>
                    
          </p>

	<!--</div>--><!-- .summary -->
    </div>
    <?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @removed hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="courses-info">
		 <?php if($edupress_options['edupress_coursedetail_socialshare']){?>
            <ul class="social-icons">
            <li><a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink(); ?>&p[images][0]=&p[title]=<?php the_title(); ?>&p[summary]=<?php echo urlencode( strip_tags( get_the_excerpt() ) ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo esc_attr(strip_tags( get_the_excerpt() )); ?>" target="_top"><i class="fa fa-envelope"></i></a></li>
            </ul>
        <?php } ?>
    </div> <!--courses-info #end  -->    
    <?php
	
	
	
	if(  wp_is_mobile() ) {
				?>
				<div class="co-join-info">
				
					<?php
						woocommerce_template_single_price();
					?>
					<?php
						woocommerce_template_single_add_to_cart(); 
					?>
						
				<div class="btns clearfix">
					
				</div>
			
				
				<div class="course_rat clearfix">
                	
					<div class="col-xs-12 col-sm-6 pull-left">
						<?php
						 if(comments_open() && !empty( $edupress_options['edupress_coursedetail_ratting'] ) && $edupress_options['edupress_coursedetail_ratting'] )
							 wc_get_template( 'single-product/rating.php' );
						?>
						
					</div>
					<div class="col-xs-12 col-sm-6 pull-right">
						<?php
						 $units_sold = get_post_meta( $product->id, 'total_sales', true );
						if( empty($units_sold) )
						{
							$units_sold = 0;
						}
						else
						{
							$units_sold = intval( $units_sold );
						}
						?>
						<p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo $units_sold;?> <?php esc_html_e(' Enrolled' ,'edupress');?></p>
					</div>
				</div>
				<!-- course rat #end -->
			
				<ul>
					<?php
					$fields = get_field_objects();
					if( $fields )
					{
						foreach( $fields as $field_name => $field )
						{
							
							if( !empty( $field['value'] ) && apply_filters( 'edupress_ecommerce_render_acf_field', true, $field ) )
							{
						?>
                                <li>
                                <span><?php echo esc_html($field['label']);?> :</span> 
                                    <?php
                                        edupress_render_acf_field( $field );
                                    ?>
                                </li>
                      <?php
							}
						}
					}
					
					
					$certificate_of_completion = get_post_meta($product->id,'_certificate_of_completion', true) ;
					if( !empty( $certificate_of_completion ) && $certificate_of_completion == 'yes'):
					?>
						<li><span>Includes:</span> Certificate of Completion </li>
					<?php
					endif;
					if(  $product->stock > 0  ):
						$units_sold = get_post_meta( $product->id, 'total_sales', true );
						if( empty($units_sold) )
						{
							$units_sold = 0;
						}
						else
						{
							$units_sold = intval( $units_sold );
						}
					?>
						<li><span>Class Size:</span> <?php echo intval($product->stock + $units_sold);?>  (<?php echo intval($product->stock);?> places left) </li>
					<?php
					endif;
					
					$attrs = edupress_woo_get_formatted_product_attributes();
					
					foreach( $attrs as $key=>$val ) {
						if( !empty( $val ) ) {
						?>
							<li><span><?php echo $key?>:</span> <?php echo $val;?> </li>
					<?php
						}
					}
					?>
					
					
				</ul>
			
			
			</div><!-- co-join-info #end -->
		    <?php
            }
			?>
            
     <?php   
	 
	  // For Tab  	    
	   if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  ) 
	   {
			$tab_order  =  $edupress_options[ 'edupress_coursedetail_tabs' ]['enabled'] ; 
			if(  !$tab_order )
			{
				$tab_order  = array(
								'desc' =>  esc_html__( 'Description', 'edupress'),
								'like' => esc_html__( 'Like Courses', 'edupress'),
								'related' => esc_html__( 'Related Courses', 'edupress'),
								'inst' =>  esc_html__( 'About Instructor', 'edupress'),
								'reviews' => esc_html__( 'Reviews', 'edupress'),
								);
			}
			
			
			if( $tab_order ):
				
		?>
	 
			 <ul id="tab_list" class="nav nav-tabs">
             	<?php
							global $active_sec;
							$i = 0;
							
							$active_set_remain = true;
                            foreach ( $tab_order as $key=>$value) {
								switch( $key ) {
								
									case  'desc': 								
									?>
										<!-- Desc Start -->
										<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#description" data-toggle="tab"><?php echo $edupress_options['edupress_coursedetail_desc_title']; ?></a> </li>
                                     <!-- Desc End -->
									<?php
										$i++;
										break;
									case  'like': 
									?>
                                        <!-- Like start -->
										<?php
                                        if ( $upsells = $product->get_upsells() ) {
                                        ?>
                                            <li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#upsells" data-toggle="tab"><?php esc_html_e( 'You may also like', 'edupress' ); ?></a> </li>
                                        <?php	
											$i++;
                                        }
										?>
                                        <!-- Like End-->
                                        <?php
										break;
										case  'related': 										
											if (  $related = $product->get_related( $posts_per_page ) ) {
											?>
											<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#related" data-toggle="tab"><?php esc_html_e( 'Related Courses', 'edupress' ); ?></a> </li>
											<?php
											$i++;
											}
										break;
										case  'inst': 
											$author_id  = $product->post->post_author;
											if ( ! empty( $author_id ) && $author_id > 0) {
												?>
											<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#instructor" data-toggle="tab"> <?php echo $edupress_options['edupress_coursedetail_inst_title']; ?></a> </li>
											<?php
											$i++;
											}
										break;
										case 'reviews':
											if ( comments_open() && !empty(  $edupress_options['edupress_coursedetail_reviewratings'] ) && $edupress_options['edupress_coursedetail_reviewratings'] ) {?>
												<li class="<?php if( $i == 0):?>active<?php endif;?>"><a href="#reviews" data-toggle="tab"><?php esc_html_e( 'Reviews', 'edupress' ); ?></a></li>
											<?php
											$i++;
											}
										break;
										} //end switch
										
										if( $i == 1 && $active_set_remain)
										{
											$active_sec = $key;
											$active_set_remain = false;
										}
										
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
    
    <div id="description" class="courses-info  <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php if($active_sec == 'desc'):?>in active <?php endif; ?> <?php } ?>">
        <h3><?php echo $edupress_options['edupress_coursedetail_desc_title']; ?></h3>
        <?php the_content(); ?>
    </div>
    
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @removed hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
    
    <?php 
			$author_id  = $product->post->post_author;
			
			if ( ! empty( $author_id ) && $author_id > 0) {
			?>
            
                           <div id="instructor" class="courses-info courses-instructor clearfix  <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php if($active_sec == 'inst'):?>in  active<?php endif;?><?php } ?>">
                    
                    <h3><?php echo $edupress_options['edupress_coursedetail_inst_title']; ?></h3>
                        <?php 
                        //foreach ( $instructors as $instructor ) {
                            $job_title = get_the_author_meta( 'job_title',$author_id);
                            $facebook_url = get_the_author_meta( 'facebook_url',$author_id);
                            $twitter_url = get_the_author_meta( 'twitter_url',$author_id);
                            $google_plus_url = get_the_author_meta( 'google_plus_url',$author_id);
                            $linkedin_url = get_the_author_meta( 'linkedin_url' , $author_id);
                            $pinterest_url = get_the_author_meta( 'pinterest_url',$author_id);
                            $instagram_url = get_the_author_meta( 'instagram_url',$author_id);
                            $youtube_url = get_the_author_meta( 'youtube_url',$author_id);
                            $autho_description = get_the_author_meta( 'description',$author_id );
                            ?>
                        <div class="row instructor-single">
                            <div class="col-xs-12 col-sm-2">
                                <?php  echo get_avatar( $author_id, 150);?>
                            </div>
                            <div class="col-xs-12 col-sm-10">                     	
                                <h3 class="inst-name">
                                    <?php
                                        echo edupress_ecommerce_get_author_link();
                                    ?>
                                </h3>
                                <?php if ( $job_title && $job_title != '' ) {?>
                                <p class="meta">
                                    <?php echo esc_html($job_title);?>
                                </p>
                                <?php
								}
								?>
                            </div>
                            <?php if ( $job_title && $job_title != '' ) {?>
                                
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
                            
                             <?php if( !empty( $autho_description ) ) :?>
                                <div class="about-instr clearfix">                   	
                                    <p><?php echo wp_kses_post($autho_description);?></p>
                                </div>
                             <?php endif;?>
                        
                          <?php }?>
                        </div>
                  </div>

           <?php }?>
           
           
           <!--
           </div>
           </div>
           -->
					 <?php					
			 if( !empty(  $edupress_options['edupress_coursedetail_reviewratings'] ) && $edupress_options['edupress_coursedetail_reviewratings'] )
			 {
			 	comments_template();
			 }
			 ?>
			
	
            
            
       
</main>


<!-- sidebar start-->
<div role="complementary" class="widget-area col-xs-12 col-sm-4 pull-right" id="secondary">
<?php
   if(  !wp_is_mobile() ) {
   ?>
   		<div class="co-join-info">
        
        	<?php
            woocommerce_template_single_price();
			?>
            <?php
				woocommerce_template_single_add_to_cart(); 
			?>
		
    	
        <div class="course_rat clearfix">
        	<div class="col-xs-12 col-sm-6 pull-left">
				<?php
				 if(comments_open() && !empty( $edupress_options['edupress_coursedetail_ratting'] ) && $edupress_options['edupress_coursedetail_ratting'] )
					 wc_get_template( 'single-product/rating.php' );
                ?>
                
            </div>
            <div class="col-xs-12 col-sm-6 pull-right">
            	<?php
            	 $units_sold = get_post_meta( $product->id, 'total_sales', true );
				if( empty($units_sold) )
				{
					$units_sold = 0;
				}
				else
				{
					$units_sold = intval( $units_sold );
				}
				?>
            	<p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo $units_sold;?> <?php esc_html_e(' Enrolled' ,'edupress');?></p>
            </div>
        </div>
        <!-- course rat #end -->
    
        <ul>
        	<?php
        	$fields = get_field_objects();
			
	
			
			if( $fields )
			{
				foreach( $fields as $field_name => $field )
				{
					
					if( !empty( $field['value'] ) && apply_filters( 'edupress_universiry_render_acf_field', true, $field ) && $field['name'] != 'certificate_of_completion' )
					{
				?>
						<li>
						<span><?php echo esc_html($field['label']);?> :</span> 
							<?php
								edupress_render_acf_field( $field );
							?>
						</li>
			  <?php
					}
					elseif($field['name'] == 'certificate_of_completion' ) 
					{
						$certificate_of_completion = get_field( 'certificate_of_completion' );
						if( isset( $certificate_of_completion ) && $certificate_of_completion):
						?>
							<li><span>Includes:</span> Certificate of Completion </li>
						<?php
						endif;
					}
				}
			}
			
			
			if(  $product->stock > 0  ):
				$units_sold = get_post_meta( $product->id, 'total_sales', true );
				if( empty($units_sold) )
				{
					$units_sold = 0;
				}
				else
				{
					$units_sold = intval( $units_sold );
				}
			?>
            	<li><span>Class Size:</span> <?php echo intval($product->stock + $units_sold);?>  (<?php echo intval($product->stock);?> places left) </li>
            <?php
			endif;
			
			$attrs = edupress_woo_get_formatted_product_attributes();
			
			foreach( $attrs as $key=>$val ) {
				if( !empty( $val ) ) {
				?>
					<li><span><?php echo $key?>:</span> <?php echo $val;?> </li>
            <?php
				}
			}
			
			
			?>
            
            
        </ul>
    
    
    </div><!-- co-join-info #end -->
   <?php
   }
    	if (  is_active_sidebar('course-detail' ) ) {
			dynamic_sidebar( 'course-detail' ); 
		}
		
		?>
</div>
                <!-- sidebar #end -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
