<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EducationPress
 */

get_header(); 
global $educationpress_options;
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

<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
    	<div class="container">
        	<div class="row">
                    <main id="main" class="site-main col-xs-12<?php echo esc_attr(educationpress_page_layout('educationpress_blogdetail_layout'));?>" >
            
                    <?php while ( have_posts() ) : the_post(); ?>
            
                        <?php get_template_part( 'template-parts/content', 'single' ); ?>
            
                        
                        <nav role="navigation" class="navigation post-navigation">
                             <div class="nav-links">
                             	<div class="nav-previous"><?php previous_post_link('<i class="fa fa-arrow-circle-left"></i> %link'); ?></div>
                                <div class="nav-next"><?php next_post_link( '%link <i class="fa fa-arrow-circle-right"></i>' ); ?></div>
                             </div>
                        </nav>
                        
                      <?php 
					   $orig_post ='';
					  if ( $educationpress_options[ 'educationpress_related_posts' ] ) {
						  $orig_post = $post;
						$related_posts_args = array(
						'post_type' => 'post',
						'posts_per_page' =>2,
						'post__not_in' => array($post->ID),
						'ignore_sticky_posts' => 1,
						'orderby'=>'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-quote' ),
								'operator' => 'NOT IN'
							)
						)
						);
						
						if (!empty( $educationpress_options[ 'educationpress_related_posts_type' ] )&&  $educationpress_options[ 'educationpress_related_posts_type' ] == 'category' ) {
							$categories = get_the_category($post->ID);
							if ($categories) 
							{
								$category_ids = array();
								foreach($categories as $individual_category)
								{
									 $category_ids[] = $individual_category->term_id;
								}
								$related_posts_args[ 'category__in' ] =  $category_ids;
							}
						}elseif ( !empty( $educationpress_options[ 'educationpress_related_posts_type' ] )  && $educationpress_options[ 'educationpress_related_posts_type' ] == 'tag' ) {
							$tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
							
						$related_posts_args[ 'tag__in' ] = $tag_ids;
						}  
						$related_posts_query = new wp_query( $related_posts_args );
						if( $related_posts_query->have_posts() ) {
					  ?>  
                      <section class="related-posts clearfix">
                      <?php   if ( ! empty( $educationpress_options['educationpress_related_posts_title'] ) ) {?> 
                      	<h3><?php echo esc_html( $educationpress_options['educationpress_related_posts_title'] ); ?></h3>
                        <?php }
						while( $related_posts_query->have_posts() ) {
						$related_posts_query->the_post();
						$reltscat=get_the_category($post->ID); ?>
                        <div class="col-xs-12 <?php echo esc_attr(educationpress_column_class('educationpress_blogdetail_layout'));?>">
                        	<article>
                               <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"> <?php the_post_thumbnail('educationpress-related-posts' );?></a>
                                <h4><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

                                <p class="meta"><?php esc_html_e( 'In', 'educationpress'); ?> "<?php echo get_the_category_list( esc_html__( ', ', 'educationpress' ) );?>"</p>
                            </article>
                        </div>
                        <?php }?>
                        
            		</section> <!-- related-posts #end -->
                    <?php }
					  }
					$post = $orig_post;
					wp_reset_postdata();
					?>
                    
                    
                    <?php 
					$auth_desc = get_user_meta(get_the_author_meta( 'ID' ) ,'description', true);
					if( $auth_desc != ""){?>
                     <section class="about-author clearfix">
                     	<div class="col-xs-12 col-sm-3">
                        	<?php echo get_avatar(get_the_author_meta( 'ID' ), 150 );?>
                        </div>
                     	<div class="col-xs-12 col-sm-9">                     	
                        <h3><a href="<?php echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_html( get_the_author() );?></a>
						<?php $job_title = get_the_author_meta( 'job_title' );
                        if ( $job_title && $job_title != '' ) {?> <span>(<?php echo esc_html($job_title);?>)</span><?php }?></h3> 
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
                        	<?php if( !empty( $facebook_url ) ) :?>
                            <li><a href="<?php echo esc_url($facebook_url);?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif;?>
                            <?php if( !empty( $google_plus_url ) ) :?>
                            <li><a href="<?php echo esc_url($google_plus_url);?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif;?>
                            <?php if( !empty( $twitter_url ) ) :?>
                            <li><a href="<?php echo esc_url($twitter_url);?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif;?>
                            <?php if( !empty( $linkedin_url ) ) :?>
                            <li><a href="<?php echo esc_url($linkedin_url);?>"><i class="fa fa-linkedin"></i></a></li>
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
                        <p><?php echo wp_kses_post( $auth_desc );?></p>
                        <a href="<?php echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>" class="btn btn-ex-small btn-orange"><?php esc_html_e('View All Post','educationpress');?></a>
                        </div>
                    </section><!-- about-author #end -->
                     <?php }?>
                    
                    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
            
                    <?php endwhile; // End of the loop. ?>
            
                    </main><!-- #main -->
                    
                    <?php get_sidebar(); ?>

                    
	 		</div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div><!-- #page-spacer -->

<?php get_footer(); ?>
