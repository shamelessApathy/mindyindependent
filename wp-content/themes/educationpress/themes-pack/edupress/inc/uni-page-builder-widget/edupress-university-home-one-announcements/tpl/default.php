<div class="col-xs-12 widget announcements-widget">
    <header><h3><?php echo esc_html( $title );?></h3> <a href="<?php echo get_category_link( $post_cat ); ?> " class="read-more">View All <i class="fa fa-arrow-circle-o-right"></i></a></header>
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
            <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
            <p><?php edupress_the_excerpt( 9 );?></p>
         </li>
         <?php endwhile; ?>
	<!-- end of the loop -->

	</ul>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no announcements found.', 'edupress'); ?></p>
<?php endif; ?>
</div>