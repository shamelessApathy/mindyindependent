<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package educationpress
 */
global $wp;
get_header(); ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<?php

$is_page = true;

if(isset( $wp->query_vars ) && is_array($wp->query_vars)):
	
	if( isset($wp->query_vars['page_id']) && $wp->query_vars['page_id'] == -1 )
	{
		$is_page = false;	
	}
endif;

?>
  
<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
  		<div class="container">
        	<div class="row">
				<main id="main" class="site-main col-xs-12 <?php if( $is_page  ) :?>col-sm-8<?php endif;?>"  >
            <?php
			if( $is_page !== true && array_key_exists( 'notifications_archive', $wp->query_vars )):
				
				$the_slug =  $wp->query_vars['coursename'];
				$args=array(
					'name'           => $the_slug,
					'post_type'      => 'course',
					'post_status'    => 'publish',
					'posts_per_page' => 1
				);
				$my_posts = get_posts( $args );
				$course_id = $my_posts[0]->ID;
				$course_slug = CoursePress_Core::get_slug( 'discussions' ) ;
			?>
            	<div class="breadcrumb-detail-page breadcrumb-in">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php
							if(get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' )){?>
                            	<?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
                            <?php
							}
							?>
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                            <?php esc_html_e( 'Notification', 'educationpress' ); ?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
            <?php
			elseif( $is_page !== true && array_key_exists( 'discussion_archive', $wp->query_vars )):
				$the_slug =  $wp->query_vars['coursename'];
				$args=array(
					'name'           => $the_slug,
					'post_type'      => 'course',
					'post_status'    => 'publish',
					'posts_per_page' => 1
				);
				$my_posts = get_posts( $args );
				$course_id = $my_posts[0]->ID;
				
				$course_slug = CoursePress_Core::get_slug( 'discussions' ) ;
			?>
           
            	<div class="breadcrumb-detail-page breadcrumb-in">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            
                            
                            <?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
                            
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title( $course_id )); ?></a><i class="fa fa-angle-right"></i>
                             <a href="<?php echo esc_url(get_permalink($course_id)). trailingslashit( CoursePress_Core::get_slug( 'discussions' ) ); ?>"><?php esc_html_e( 'Discussions', 'educationpress' ); ?></a><?php /*?><i class="fa fa-angle-right"></i>
                             <?php the_title();?><?php */?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
            <?php
            
			elseif( $is_page !== true && array_key_exists( 'discussion_name', $wp->query_vars ) ):
			
				$posts = get_posts( 
							array(
								 'name' => $wp->query_vars['discussion_name'],
								 'post_type'        => CoursePress_Data_Discussion::get_post_type_name(),  
							)
						);
						
					
				   ?>            
                <div class="breadcrumb-detail-page breadcrumb-in">
                    <div class="container">
                        <div class="row">
                            <p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <a href="<?php echo esc_url( home_url( '/' ) ) . $course_slug;?>"><?php esc_html_e( 'All Courses', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                            <?php
							if(isset($course_id) &&  intval( $course_id ) > 0)
							{
								$term_list = get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' );
								if( !empty( $term_list ) ):
								?>
									<?php echo get_the_term_list(  $course_id, 'course_category','', '<i class="fa fa-angle-right"></i>' ); ?><i class="fa fa-angle-right"></i>
								<?php endif;
							}
							?>
                            
                            <a href="<?php echo esc_url(get_permalink($course_id)); ?>"><?php echo esc_html(get_the_title(isset($course_id) && intval($course_id) ? $course_id : 0 )); ?></a><i class="fa fa-angle-right"></i>
                             <a href="<?php echo esc_url(get_permalink($course_id)). trailingslashit(CoursePress_Core::get_slug('discussion') ); ?>"><?php esc_html_e( 'Discussions', 'educationpress' ); ?></a><i class="fa fa-angle-right"></i>
                             <?php echo get_the_title( $posts[0]->ID );?>
                            </p>
                        </div> <!--row #end  -->
                    </div>
                </div>
                <?php
			endif;

			?>
			


			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						if( !(is_array($wp->query_vars) && $wp->query_vars['page_id'] == -1) )
						{
							comments_template();
						}
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
        
        <?php get_sidebar(); ?>
        </div>  <!-- #row -->
	</div><!-- #container -->
</div> <!-- primary #end -->
</div>

<?php get_footer(); ?>
