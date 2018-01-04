<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package educationpress
 */

if ( ! function_exists( 'educationpress_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function educationpress_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'educationpress' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'educationpress' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . ' <small>.</small></span> '; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'educationpress_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function educationpress_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'educationpress' ) );
		if ( $categories_list && educationpress_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in &quot; %1$s &quot; ', 'educationpress' ) . ' <small>.</small> </span> ', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'educationpress' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tags &quot; %1$s &quot;', 'educationpress' ) . ' <small>.</small> </span> ', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'educationpress' ), esc_html__( '1 Comment', 'educationpress' ), esc_html__( '% Comments', 'educationpress' ) );
		echo ' <small>.</small> </span>';
	}

	edit_post_link( esc_html__( 'Edit', 'educationpress' ), ' <span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function educationpress_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'educationpress_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'educationpress_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so educationpress_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so educationpress_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in educationpress_categorized_blog.
 */
function educationpress_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'educationpress_categories' );
}
add_action( 'edit_category', 'educationpress_category_transient_flusher' );
add_action( 'save_post',     'educationpress_category_transient_flusher' );

	if ( !function_exists( 'educationpress_discussion_comment' ) ) :

		/**
		 * Template for comments and pingbacks.
		 *
		 * Used as a callback by wp_list_comments() for displaying the comments.
		 */
		function educationpress_discussion_comment( $comment, $args, $depth ) {
			$GLOBALS[ 'comment' ] = $comment;

			if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) :
				?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<div class="comment-body">
					<?php esc_html_e( 'Pingback:', 'educationpress' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'educationpress' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			<?php else : ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<footer class="comment-meta">
						<div class="discussion-archive-single-meta">
							<div class="discussion-answer-circle"><span class="comments-count"><?php esc_html_e( 'A', 'educationpress' ) ?></span></div>
						</div>

						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'educationpress' ); ?></p>
						<?php endif; ?>
					</footer><!-- .comment-meta -->

					<div class="comment-content">
						<?php comment_text(); ?>
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time>
								<?php echo esc_html(comment_author()) . ', '; ?>
								<?php echo esc_html(human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ));  esc_html_e( 'ago', 'educationpress' ) ; ?>
							</time>
						</a>
						<?php edit_comment_link( esc_html__( 'Edit', 'educationpress' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-content -->



					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below'	 => 'div-comment',
						'depth'		 => $depth,
						'max_depth'	 => $args[ 'max_depth' ],
						'before'	 => '<div class="reply">',
						'after'		 => '</div>',
					) ) );
					?>
				</article><!-- .comment-body -->

			<?php
			endif;
		}

	endif; // ends check for coursepress_comment()