<?php
/**
 * Template Name: Our Instructors
 *
 * @package EducationPress\page-Templates
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
 
 
get_header();
global $educationpress_options;?>



<div class="breadcrumb-section">
	<div class="container">
		<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
    </div>
</div>

<div class="page-spacer clearfix">
<?php while ( have_posts() ) : the_post(); ?> 
  <div id="primary">
        <div class="container">
        	<div class="row">
               <main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_instructorlisting_layout'));?>" >
                    
                    <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'educationpress' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educationpress' ),
                        'after'  => '</div>',
                    ) );
                ?>
                    
                    
              
<?php endwhile; // End of the loop. ?>
 <?php 
 // WP_User_Query arguments
 
$user_orderby = get_post_meta( $post->ID, 'EDU_PRESS_instructors_orderby', true );
$user_order = get_post_meta( $post->ID, 'EDU_PRESS_instructors_order', true );
$number = get_post_meta( $post->ID, 'EDU_PRESS_instructors_perpage', true );
$user_fields = array( 'ID','display_name','user_email');
 $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $offset = ($page - 1) * $number;
if ( is_multisite() ) 
{
$args1 = array (
	'blog_id'         => get_current_blog_id(),
	'number'         => $number,
	'offset' => $offset ,
	'order'          => $user_order,
	'orderby'        => $user_orderby,
	'meta_query'     => array(
		array(
			'key'       => $wpdb->prefix.'role_ins',
			'value'     => 'instructor',
			'compare'   => '=',
		),
	),
	'fields'         => $user_fields,
);
}else{
$args1 = array (
	'number'         => $number,
	'offset' => $offset ,
	'order'          => $user_order,
	'orderby'        => $user_orderby,
	'meta_query'     => array(
		array(
			'key'       => 'role_ins',
			'value'     => 'instructor',
			'compare'   => '=',
		),
	),
	'fields'         => $user_fields,
);
}
// The User Query
$user_query = new WP_User_Query( $args1 );
$total_authors = $user_query->get_total();
$total_pages = ceil($total_authors / $number) ;

// The User Loop
if ( ! empty( $user_query->results ) ) {

	?>
 
	       <?php
		   $counter = 0;
		   foreach ( $user_query->results as $user ) 
 		   {
			   $counter++;
			   $job_title = get_the_author_meta( 'job_title',$user->ID);
			    $mob_num = get_the_author_meta( 'mob_num',$user->ID);
				$autho_description = strip_tags( get_the_author_meta( 'description',$user->ID  ));
			    ?>
   
 	 		<div class="col-xs-12 <?php echo esc_attr(educationpress_column_class('educationpress_instructorlisting_layout'));?> teachers">
                	<div class="teachers-in <?php if( $educationpress_options['educationpress_instructorlisting_layout']=='2' || $educationpress_options['educationpress_instructorlisting_layout']=='3'){ echo esc_attr("teacher");}?>">
                         <div class="col-xs-12 col-sm-6 remove_space">
                        	<a class="teacher-img" href="<?php echo esc_url(do_shortcode( '[instructor_profile_url instructor_id="' . $user->ID . '"]' )); ?>">
							<?php echo get_avatar( $user->ID, 150);?></a>
                        </div>
                        
                         <div class="col-xs-12 col-sm-6 remove_space">
                         	<h4 class="author-name"><a href="<?php echo esc_url(do_shortcode( '[instructor_profile_url instructor_id="' . $user->ID . '"]' )); ?>"><?php echo esc_html($user->display_name);?></a></h4>
                            <?php if ( $job_title && $job_title != '' ) {?>
                            <p><?php echo esc_html($job_title);?></p>
                            <?php }?>
                            
                            
                            <?php
							
							if( get_post_meta( $post->ID, 'EDU_PRESS_instructors_is_phone', true ) != 'No' ) :
							?>
                            <?php if ( $mob_num && $mob_num != '' ) {?>
                            <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','educationpress' ); ?>  <strong><?php echo esc_html($mob_num);?></strong></p>
                             <?php }else{?>
                             <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','educationpress' ); ?>  <strong><?php esc_html_e( '- Nill -','educationpress' ); ?></strong></p>
                             <?php }?>
                             <?php
							 endif;
							 ?>
                             <?php
							if( get_post_meta( $post->ID, 'EDU_PRESS_instructors_is_email', true ) != 'No' ) :
							?>
                            <p class="email"><?php esc_html_e( 'Email me at','educationpress' ); ?> <a href="mailto:<?php echo antispambot( $user->user_email);?>"><strong><?php echo esc_html($user->user_email);?></strong></a></p>
                            <?php
							endif;
							?>
                         </div>
                        <?php
						$inst_desc = ( mb_strlen( $autho_description ) >= 70 ) ? mb_substr( $autho_description, 0, 70 ) . '...' : $autho_description;?>
					
                         <p><?php echo esc_html($inst_desc) ;?></p>
						
                         <a href="<?php echo esc_url(do_shortcode( '[instructor_profile_url instructor_id="' . $user->ID . '"]' )); ?>" class="more"><?php esc_html_e( 'Read More','educationpress' ); ?> <i class="lnr lnr-arrow-right"></i></a>
                     </div> <!-- teachers-in #end  -->
                </div> <!-- teachers #end -->
                
                 <?php 
				 if( ($educationpress_options['educationpress_instructorlisting_layout'] == '1' && $counter % 3 == 0)
				 		||
					 ( ($educationpress_options['educationpress_instructorlisting_layout'] == '2' || $educationpress_options['educationpress_instructorlisting_layout'] == '3') && $counter % 2 == 0 )
				  ) { 
				 ?>
					 <div class="clearfix"></div>
                <?php
				 }
				 ?>
                <?php }?>
                
                  
  
  <?php educationpress_instructor_numeric_posts_nav( 'navigation-pagination', $total_pages );?>
                
       
  <?php }?>
  
  				</main><!-- #main -->
                
                 <?php get_sidebar(); ?>
                
        	</div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 
<?php get_footer(); ?>
