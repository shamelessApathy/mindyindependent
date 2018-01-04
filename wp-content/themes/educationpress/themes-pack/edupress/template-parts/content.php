<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
 
        <!-- Image Post -->
	    
           <a class="post-thumb" href="<?php the_permalink(); ?>"> 
           <figure>
		   <?php the_post_thumbnail( 'post-thumbnail');?>
           <?php
			if ( is_sticky() ) {?>
			<div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
			<?php }?>
             </figure>
           </a>

        
       

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
 	</header><!-- .entry-header -->

	<div class="entry-content">
     
		<?php
			if( strpos( get_the_content(), 'more-link' ) === false ) {
                    the_excerpt();
                } else {
                    the_content( '' );
                }
		?>
        
 		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupress' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
    	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php edupress_posted_on(); ?>
            
            <?php edupress_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</footer><!-- .entry-footer -->
    
    <a href="<?php the_permalink(); ?>" class="btn btn-medium read-more"><?php esc_html_e( 'Read More','edupress' ); ?> <i class="lnr lnr-arrow-right"></i></a>
</article><!-- #post-## -->
