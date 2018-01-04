<div class="col-xs-12 widget news-widget">
        <header><h3><?php echo esc_html( $title );?></h3> 
        <a href="<?php echo get_category_link( $post_cat );?>" class="read-more"><?php esc_html_e('All News', 'edupress');?><i class="fa fa-arrow-circle-o-right"></i></a></header>
            
		<?php
	$args1 = array(
				'cat' => $post_cat,
				'posts_per_page' => intval($post_no),
			 );
			 

	$the_query = new WP_Query( $args1 );

	if ( $the_query->have_posts() ) : ?>
		 <ul>
	<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>            
            
          	<li>
               <a href="<?php the_permalink();?>">
                <?php  
				if ( has_post_thumbnail( $post->ID ) ) :
					the_post_thumbnail( 'edupress-university-home-small-96-72' );
				else:
				?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/img-not-available-96-72.jpg" alt="<?php the_title_attribute();?>" width="96" height="72">
				<?php
				endif;
				?>
                <div class="simi-co">
                <p class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
                <p class="meta"><span><?php echo get_the_date('F j, Y');
				?></span>  |  <a href="<?php echo get_comments_link( get_the_ID());?>">
                <?php
				 if( have_comments() ):
				 	esc_html_e( '0 Comment', 'edupress');
				 else:
				 	printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments number', 'edupress' ), number_format_i18n( get_comments_number() ) );
				 endif;
				 ?>
                 </a></p>
                <p><?php
				edupress_the_excerpt();
				?></p>
                </div>
            </li>
            <?php endwhile; ?>
	<!-- end of the loop -->

		</ul>

		<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, No news found.', 'edupress'); ?></p>
<?php endif; ?>
 </div>