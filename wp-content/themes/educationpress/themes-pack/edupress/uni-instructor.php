<?php
/**
 * The Template for displaying instructor profile.
 *
 * @package CoursePress
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
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
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
<?php
}
?>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main woocommerce col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_courseinstructor_layout'));?>" >
                 <?php
				if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
				{
					?>
                    <header class="entry-header">
                        <h1 class="entry-title">            
							<?php 
                            $title = !empty( $edupress_options['edupress_instructor_title'] ) ? $edupress_options['edupress_instructor_title'] : 'Instructor';
                            printf( esc_html__( '%s: %s', 'edupress' ), $title, $instructor->display_name );
                        ?>
                         </h1>
                </header><!-- .entry-header -->
                    
                 <?php
				}
				?>
                <section class="co-author clearfix">
                     	<div class="col-xs-12 col-sm-2">
                        	<?php echo get_avatar($user->ID, 150 );?>
                        </div>
                     	<div class="col-xs-12 col-sm-9">  
                         <?php
						 	$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
						 ?>                   	
                         <h3><a href="<?php echo esc_url(home_url('/'.$edupress_university_instructor_slug.'/'.$instructor->display_name)); ?>"><?php echo esc_html( $instructor->display_name );?></a></h3>
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
                    
                    
                    <br class="clearfix" />
                    <div id="no-more-tables">
                        <table id="myTable">  
                        <thead>  
                          <tr>  
                            <th><?php esc_html_e('Course Name','edupress');?></th>  
                            <th><?php esc_html_e('Course Type','edupress');?></th>  
                            <th><?php esc_html_e('Starts','edupress');?></th>  
                            <th><?php esc_html_e('Length','edupress');?></th> 
                             <th><?php esc_html_e('Created','edupress');?></th>  
                          </tr>  
                        </thead>  
                      </table>
					</div>             			
        


        
        </main>   <!-- main -->

 <?php get_sidebar(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(); ?>
