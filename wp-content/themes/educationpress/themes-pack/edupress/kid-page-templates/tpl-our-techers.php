<?php
/**
 * Template Name: Our Teachers
 *
 * @package EduPress\page-Templates
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
 
get_header();
global $edupress_options;?>


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
               <main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_instructorlisting_layout'));?>" >
               
           
                    
                    <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edupress' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupress' ),
                        'after'  => '</div>',
                    ) );
                ?>
                    
                    
              
<?php endwhile; // End of the loop. ?>
 <?php 
 // WP_User_Query arguments
 
$user_orderby =  get_post_meta( $post->ID, 'EDU_PRESS_instructors_orderby', true ) ? get_post_meta( $post->ID, 'EDU_PRESS_instructors_orderby', true ) :'registered';
$user_order = get_post_meta( $post->ID, 'EDU_PRESS_instructors_order', true ) ? get_post_meta( $post->ID, 'EDU_PRESS_instructors_order', true ) : 'DESC';
$number = get_post_meta( $post->ID, 'EDU_PRESS_instructors_perpage', true ) ? get_post_meta( $post->ID, 'EDU_PRESS_instructors_perpage', true ) : 9;
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
	'fields'         => $user_fields,
);
}else{
$args1 = array (
	'number'         => $number,
	'offset' => $offset ,
	'order'          => $user_order,
	'orderby'        => $user_orderby,
	'fields'         => $user_fields,
);
}



$author_ids = edupress_kid_get_instructors_id_of_class();
$args1[ 'include' ] = $author_ids;


// The User Query
$user_query = new WP_User_Query( $args1 );
$total_authors = $user_query->get_total();

global $edupress_options;
$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';


// The User Loop
if ( ! empty( $user_query->results ) ) {
	$total_pages = ceil($total_authors / $number) ;
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
   
 	 		<div class="col-xs-12 <?php echo esc_attr(edupress_column_class('edupress_instructorlisting_layout'));?> teachers">
                	<div class="teachers-in <?php if( $edupress_options['edupress_instructorlisting_layout']=='2' || $edupress_options['edupress_instructorlisting_layout']=='3'){ echo esc_attr("teacher");}?>">
                         <div class="col-xs-12 col-sm-6 remove_space">
                        	<a class="teacher-img" href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$user->display_name)); ?>">
							<?php echo get_avatar( $user->ID, 150);?></a>
                        </div>
                        
                         <div class="col-xs-12 col-sm-6 remove_space">
                         	<h4 class="author-name"><a href="<?php echo esc_url(home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$user->display_name)); ?>"><?php echo esc_html($user->display_name);?></a></h4>
                            <?php if ( $job_title && $job_title != '' ) {?>
                            <p><?php echo esc_html($job_title);?></p>
                            <?php }?>
                            <?php
							
							if( get_post_meta( $post->ID, 'EDU_PRESS_instructors_is_phone', true ) != 'No' ) :
							?>
                            <?php if ( $mob_num && $mob_num != '' ) {?>
                            <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','edupress' ); ?>  <strong><?php echo esc_html($mob_num);?></strong></p>
                             <?php }else{?>
                             <p class="phone"><i class="lnr lnr-smartphone"></i><?php esc_html_e( 'Phone','edupress' ); ?>  <strong><?php esc_html_e( '- Nill -','edupress' ); ?></strong></p>
                             <?php }?>
                              <?php
							 endif;
							 ?>
                             <?php
							if( get_post_meta( $post->ID, 'EDU_PRESS_instructors_is_email', true ) != 'No' ) :
							?>
                            <p class="email"><?php esc_html_e( 'Email me at','edupress' ); ?> <a href="mailto:<?php echo antispambot( $user->user_email);?>"><strong><?php echo esc_html($user->user_email);?></strong></a></p>
                            <?php
							endif;
							?>
                         </div>
                        <?php
						$inst_desc = ( mb_strlen( $autho_description ) >= 70 ) ? mb_substr( $autho_description, 0, 70 ) . '...' : $autho_description;?>
					
                         <p><?php echo wp_kses_post($inst_desc) ;?></p>
						
                         <a href="<?php echo esc_url( home_url('/'.$edupress_ecommerce_instructor_slug.'/'.$user->display_name)); ?>" class="more"><?php esc_html_e( 'Read More','edupress' ); ?> <i class="lnr lnr-arrow-right"></i></a>
                     </div> <!-- teachers-in #end  -->
                </div> <!-- teachers #end -->
                
                 <?php 
				 if( ($edupress_options['edupress_instructorlisting_layout'] == '1' && $counter % 3 == 0)
				 		||
					 ( ($edupress_options['edupress_instructorlisting_layout'] == '2' || $edupress_options['edupress_instructorlisting_layout'] == '3') && $counter % 2 == 0 )
				  ) { 
				 ?>
					 <div class="clearfix"></div>
                <?php
				 }
				 ?>
                <?php }?>
                
                  
  
  <?php edupress_instructor_numeric_posts_nav( 'navigation-pagination', $total_pages );?>
                
       
  <?php }?>
  
  				</main><!-- #main -->
                
                 <?php get_sidebar(); ?>
                
        	</div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 
<?php get_footer(); ?>