<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edupress
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <h1 class="entry-title">
            <?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						printf( esc_html__( 'Author: %s', 'edupress' ), get_the_author() );
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
                <main id="main" class="site-main col-xs-12<?php echo esc_attr(edupress_page_layout('edupress_blogauthor_layout'));?>" >
                
                <section class="co-author clearfix">
                     	<div class="col-xs-12 col-sm-2">
                        	<?php echo get_avatar(get_the_author_meta( 'ID' ), 150 );?>
                        </div>
                     	<div class="col-xs-12 col-sm-9">                     	
                         <h3><a href="<?php echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_html( get_the_author() );?></a></h3>
                        <?php $job_title = get_the_author_meta( 'job_title' );
                        if ( $job_title && $job_title != '' ) {?>
                        <p class="meta"><?php echo esc_html($job_title);?></p>
                        <?php }?>
                        <?php 
						$facebook_url = get_the_author_meta( 'facebook_url' );
						$twitter_url = get_the_author_meta( 'twitter_url' );
						$google_plus_url = get_the_author_meta( 'google_plus_url' );
						$linkedin_url = get_the_author_meta( 'linkedin_url' );
						$pinterest_url = get_the_author_meta( 'pinterest_url' );
						$instagram_url = get_the_author_meta( 'instagram_url' );
						$youtube_url = get_the_author_meta( 'youtube_url' );
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
                        <?php if ( get_the_author_meta( 'description' ) ) : ?>    
                        <div class="col-xs-12">  
                         <p><?php echo wp_kses_post(get_the_author_meta( 'description' ) ); ?></p>
                        </div>
                        <?php endif; ?>
                    </section>
        


 			<?php 
			/*
			* Since we called the_post() above, we need to rewind
			* the loop back to the beginning that way we can run
			* the loop properly, in full.
			*/
			rewind_posts();

			/* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if(function_exists('edupress_numeric_posts_nav')){
				edupress_numeric_posts_nav( 'navigation-pagination' );
				} ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
        
        </main>   <!-- main -->

 <?php get_sidebar(); ?>
 
			 </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- page-spacer -->
<?php get_footer(); ?>
