<?php
/**
 * @package CoursePress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php
		if ( has_post_thumbnail() ) {
			echo '<div class="featured-image">';
			the_post_thumbnail();
			echo '</div>';
		}
		?>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php coursepress_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php
			the_content(
				__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cp' )
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cp' ),
					'after' => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php
		if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
			// translators: Used between list items, there is a space after the comma.
			$categories_list = get_the_category_list( __( ', ', 'cp' ) );
			if ( $categories_list && coursepress_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'cp' ), $categories_list ); ?>
				</span>
				<?php
			endif; // End if categories

			// translators: Used between list items, there is a space after the comma.
			$tags_list = get_the_tag_list( '', __( ', ', 'cp' ) );
			if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'cp' ), $tags_list ); ?>
				</span>
				<?php
			endif; // End if $tags_list
		endif; // End if 'post' == get_post_type()

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<span class="comments-link">
			<?php
			comments_popup_link(
				__( 'Leave a comment', 'cp' ),
				__( '1 comment', 'cp' ),
				__( '% comments', 'cp' )
			);
			?>
		</span>
		<?php
		endif;

		edit_post_link(
			__( 'Edit', 'cp' ),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->