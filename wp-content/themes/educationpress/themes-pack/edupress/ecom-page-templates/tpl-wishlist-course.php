<?php
/**
 * Template Name:  Wishlisted Courses
 *
 * @package EduPress\Page Template
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
 
if ( !is_user_logged_in() ) { 
	wp_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ) ? get_permalink( get_option('woocommerce_myaccount_page_id') )  : 		wp_login_url() );
     exit;
}
				
	global $edupress_options;
/* Start the Loop */ 
			  $include_ids = array();
			  $include_ids =  get_user_option('li_user_loves',  get_current_user_id() );
			  
			  
				$post_args = array(
				'order'          => 'ASC',
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' =>  -1,
				);
				if ( ! empty( $include_ids ) ) {
				$post_args = wp_parse_args( array( 'post__in' => $include_ids ), $post_args );
				}
				if(count($include_ids) > 0)
				{
					global $wp_query;
					$wp_query = new WP_Query($post_args);
				}



get_header(); ?>
<div class="breadcrumb-section">
	<div class="container">
		<div class="row">
	

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<header class="entry-header">
				<h1 class="entry-title">
					<?php esc_html_e( 'Courses you wishlisted', 'edupress'); ?>
                </h1>
            </header>
		<?php endif; ?>
        </div>
     </div>
</div>

		<div class="breadcrumb-detail-page">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'edupress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php
							$shop_page_url = get_permalink(  );
							$shop_page_title = function_exists('woocommerce_get_page_id') ? get_the_title( woocommerce_get_page_id( 'shop' ) ):'Courses';
							?>
                            <a href="<?php echo $shop_page_url;?>"><?php echo  $shop_page_title; ?></a><i class="fa fa-angle-right"></i>
                            <?php the_title(); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div> <!-- breadcrumb #end  -->
		<?php
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            //do_action( 'woocommerce_before_main_content' );     
        ?>
       
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @removed hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			//do_action( 'woocommerce_archive_description' );
		?>
       
<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
       <div class="container">
        	<div class="row">

				<main id="main" class="site-main col-xs-12"  >
      
		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				//do_action( 'woocommerce_before_shop_loop' );
				
			?>
 
			<?php woocommerce_product_loop_start(); ?>
				<?php woocommerce_product_subcategories(); ?>
				<?php
				if( !empty( $include_ids )):?>
					<?php while ( have_posts() ) : the_post(); ?>
    
                        <div class="col-xs-12 col-sm-4 zoom courses three-column with-sidebar">
                            <div class="course clist">
                            <?php
                            /**
                             * woocommerce_before_shop_loop_item hook.
                             *
                             * Removed hook
                             * @hooked woocommerce_template_loop_product_link_open - 10
                             */
                            do_action( 'woocommerce_before_shop_loop_item' );
                        
                            /**
                             * woocommerce_before_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                             */
                            do_action( 'woocommerce_before_shop_loop_item_title' );
                        
                            /**
                             * woocommerce_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_template_loop_product_title - 10
                             */
                            do_action( 'woocommerce_shop_loop_item_title' );
                        
                            /**
                             * woocommerce_after_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_template_loop_rating - 5
                             * @removed hooked woocommerce_template_loop_price - 10
                             */
                             ?>
                            
                             
                             
                             <div class="course_rel">
                             
                              <p class="clearfix">
                             <a  title="<?php esc_html_e( 'Remove', 'edupress'); ?>" href="#" data-post-id="<?php echo esc_attr(  $product->id );?>" data-user-id="<?php echo esc_attr(  get_current_user_id() ) ;?>" class="loved like-id pull-right"><i class="fa fa-heart"></i> <?php esc_html_e( 'Wishlist', 'edupress'); ?></a>
                             </p>
                             
                             <?php
                                do_action( 'woocommerce_after_shop_loop_item_title' );
                                global $edupress_options;
                                if( !empty($edupress_options['edupress_courselisting_enroll']) && $edupress_options['edupress_courselisting_enroll']){
                                    global $product;
                                    ?>
                                    
                                    
                                   
                                    <p class="enroll col-xs-12 col-sm-6 pull-right">
                                     <?php if($edupress_options['edupress_courselisting_enroll']){?>
                                           
                                            <?php echo esc_html(get_post_meta( $product->id, 'total_sales', true ) );?> <?php esc_html_e( 'Enrolled', 'edupress'); ?>
                                            <?php }?>
                                     </p>
                                 <?php }?>
                            </div>
                            <?php
                            /**
                             * woocommerce_after_shop_loop_item hook.
                             *
                             * @removed hooked woocommerce_template_loop_product_link_close - 5
                             * @hooked woocommerce_template_loop_add_to_cart - 10
                             */
                            do_action( 'woocommerce_after_shop_loop_item' );
                            ?>
                            </div>
                        </div>
    
    
                    <?php endwhile; // end of the loop. ?>
				<?php
				else:
					get_template_part( 'template-parts/content', 'none' );	
				endif;
				?>               

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( class_exists( 'WooCommerce' ) && ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
   </main>   <!-- main -->

 <?php //get_sidebar();
 wp_reset_postdata(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(  ); ?>
