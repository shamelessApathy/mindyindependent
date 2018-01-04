<?php
/**
 * Template Name: All Events
 *
 * @package EduPress\Page-Templates
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
 

 
get_header();
global $edupress_options;
$number_of_events = intval( $edupress_options[ 'edupress_eventlisting_number' ] );
 ?>
<?php if ( have_posts() ) : ?>


<?php
global $edupress_options;
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
?>
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
}
?>
<div class="page-spacer clearfix">
  <div id="primary">
        <div class="container">
        	<div class="row">
            	 <?php
			
				if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
				{
					?>
						<header class="entry-header">
						  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
				<?php
				}
				
			
				?>
               <main id="main" class="site-main col-xs-12 school-events <?php echo esc_attr(edupress_page_layout('edupress_eventlisting_layout'));?>" >
                      
             <?php /* Start the Loop */
			 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			 $the_query = new WP_Query( array( 'post_type' => 'event', 'ignore_sticky_posts' => 1, 'paged' => $paged, 'posts_per_page' => $number_of_events )  );
			
			 ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="col-xs-12 col-sm-4">
					<?php
					if( edupress_is_a('kid') )
					{
					?>
                    	 <div class="events">
                            <figure>
                             <?php the_post_thumbnail( 'medium' );?>
                            </figure>
                                <div class="events-info">
                                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <?php if($edupress_options['edupress_eventlisting_loc']){?>
                                    <p class="location"><i class="lnr lnr-map-marker"></i><?php echo  esc_html(get_post_meta( $post->ID, 'EDU_PRESS_event_location', true ));?></p>
                                    <?php
									}
									?>
                                    <p><?php edupress_the_excerpt();?></p>
                                    
                                    <ul class="events-time">
                                    <li><span><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( get_the_ID(), 'EDU_PRESS_event_start_datetime', true ))) ;?></span>
                                    <?php esc_html_e('Date', 'edupress');?> </li>
                                     <li><span><?php echo  esc_html(mysql2date( get_option( 'time_format' ), get_post_meta( get_the_ID(), 'EDU_PRESS_event_start_datetime', true ))) ;?></span>
                                    <?php esc_html_e('Time', 'edupress');?></li>
                                    </ul>
                                    
                                
                                <a href="<?php the_permalink();?>" class="know-more"><?php esc_html_e('Know More', 'edupress');?><i class="lnr lnr-arrow-right"></i></a>
                                </div>
                             </div>
                    <?php
					}
					else
					{              		
					?>
                        <article class="events">
                             <a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>" class="img-thumb">
                             <figure>
                             <?php the_post_thumbnail( 'medium' );?>
                             </figure>
                             </a>
                            <h4><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title();?></a></h4>
                            <p class="meta">
                            <?php if($edupress_options['edupress_eventlisting_time']){?>
                            <?php esc_html_e('on:','edupress'); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong><?php esc_html_e('.','edupress'); ?> 
                            <?php }?>
                            <?php if($edupress_options['edupress_eventlisting_loc']){?>
                            <?php esc_html_e(' at:','edupress'); ?> <strong><?php echo  esc_html(get_post_meta( $post->ID, 'EDU_PRESS_event_location', true ));?></strong>
                            <?php }?>
                            </p>
                            
                            <a href="<?php the_permalink()?>" class="more"><?php esc_html_e('Read More','edupress'); ?><i class="lnr lnr-arrow-right"></i></a>
                        </article>
                    <?php
					}
					?>
                 </div> <!-- event #end -->
             <?php endwhile; 
			 wp_reset_postdata();
			 ?>

			<?php 
			
					 
				
			if(function_exists('edupress_numeric_posts_nav')){
			edupress_numeric_posts_nav( 'navigation-pagination' ); 
			}?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
               
        </main><!-- #main -->
        <?php 
		
		 
		get_sidebar();
		
		 ?>
        
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 	 

<?php get_footer(); ?>
