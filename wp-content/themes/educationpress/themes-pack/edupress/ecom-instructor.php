<?php
/**
 * The Template for displaying instructor profile.
 *
 * @package EduPress
 */
get_header();
global $edupress_options;

$display_name = urldecode(get_query_var('instructor'));  




//$users = get_user_by('display_name', $display_name);
$args= array(
  'search' => $display_name, // or login or nicename in this example
  'search_fields' => array('display_name')
);

$users =  get_users( $args ) ; 

$user =  ( isset( $users[0] ) ? $users[0] : false );


$author_id = ( $user ? $user->ID : false );



//$instructor = new Instructor($user->ID);
$instructor =  $user->data;


//$course_ids = $instructor->get_assigned_courses_ids('publish');
global $edupress_options;
?>


<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <h1 class="entry-title">            
            <?php 
			$title = !empty( $edupress_options['edupress_instructor_title'] ) ? $edupress_options['edupress_instructor_title'] : 'Instructor';
			printf( esc_html__( '%s: %s', 'edupress' ), $title, $instructor->display_name );
			?>
             </h1>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>


<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main woocommerce col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_courseinstructor_layout'));?>" >
                
                <section class="co-author clearfix">
                     	<div class="col-xs-12 col-sm-2">
                        	<?php echo get_avatar($user->ID, 150 );?>
                        </div>
                     	<div class="col-xs-12 col-sm-9">  
                         <?php
						 	$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						 ?>                   	
                         <h3><a href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$instructor->display_name)); ?>"><?php echo esc_html( $instructor->display_name );?></a></h3>
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
                        <?php if ( get_the_author_meta( 'description',$user->ID ) ) : ?>    
                        <div class="col-xs-12">  
                         <p><?php echo wp_kses_post(get_the_author_meta( 'description',$user->ID  )); ?></p>
                        </div>
                        <?php endif; ?>
                    </section>
                    
                    
                    
               <div id="products" class="list-group"> 
     		<div class="row">  
             <?php /* Start the Loop */ 
			  $include_ids = array();
               
			 //$include_ids = array_unique( array_merge( $include_ids, $course_ids ) );
			 $number = get_option('posts_per_page');
			 $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			 //$page = ($_GET['page']) ? $_GET['page'] : 1;
			  $offset = ($page - 1) * $number;
				$post_args = array(
				'order'          => 'ASC',
				'post_type'      => 'product',
				//'offset' => $offset ,
				'meta_key'       => 'total_sales',
				'post_status'    => 'publish',
				'posts_per_page' =>  -1,
				 'author' => $author_id,
			//	'paged' => $page,
				);
				
				$course_query = new WP_Query( $post_args );
				
		
			if ( $course_query->have_posts() ) : ?>	
				<div class="col-xs-12 zoom courses grid-group-item">
                	<div class="row">
                <?php
				while ( $course_query->have_posts() ) {
					global $single_product_class; 
					$single_product_class = edupress_column_class('edupress_courseinstructor_layout'); 
				 	$course_query->the_post();
					
                    	wc_get_template_part( 'content', 'product' );
                  
                } ?>
                	</div>
				</div>

		<?php else : ?>

			<?php
			if( function_exists( 'wc_get_template' ) ):
				wc_get_template( 'loop/no-products-found.php' );
			endif;
			?>

		<?php endif; 
		wp_reset_postdata();
		?>
               
        </div> <!-- row #end -->
     </div>
        


        
        </main>   <!-- main -->

 <?php get_sidebar(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(); ?>
