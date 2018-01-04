<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
        <?php
		
		if ( has_post_format( 'gallery' )) {
			educationpress_standard_gallery();
		}elseif ( has_post_format( 'image' )) {
			 educationpress_standard_thumbnail();
		}elseif ( has_post_format( 'video' )) {
			$embed_code = get_post_meta( $post->ID, 'EDU_PRESS_embed_code', true );
			if( !empty( $embed_code ) ) :
				?>
				<div class="embed-responsive embed-responsive-4by3">
				<?php
                if ( is_sticky() ) {?>
                <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                <?php }?>
					<?php echo stripslashes( htmlspecialchars_decode( $embed_code ) ); ?>
				</div>
				<?php
			else :
				educationpress_standard_thumbnail();
			endif;
		}elseif ( has_post_format( 'audio' )) {
				$embed_code = get_post_meta( $post->ID, 'EDU_PRESS_audio_embed_code', true );
				if( !empty( $embed_code ) ) :
					?>
					<div class="embed-responsive embed-responsive-4by3 embed-audio">
					<?php
                    if ( is_sticky() ) {?>
                    <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                    <?php }?>
						<?php echo stripslashes( htmlspecialchars_decode( $embed_code ) ); ?>
					</div>
					<?php
				else :
					educationpress_standard_thumbnail();
				endif;
		}elseif ( has_post_format( 'quote' )) {
			$embed_code = get_post_meta( $post->ID, 'EDU_PRESS_quote_text', true );
			if( !empty( $embed_code ) ) :
				?>
                <blockquote class="post-quote">
				<?php
                if ( is_sticky() ) {?>
                <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                <?php }?>
                <i class="fa fa-quote-left"></i>
                <?php echo stripslashes( htmlspecialchars_decode( $embed_code ) ); ?>
                </blockquote>

				<?php
			else :
				educationpress_standard_thumbnail();
			endif;
		}else{
			 educationpress_standard_thumbnail();
		}?>

	<header class="entry-header">

		<div class="entry-meta">
			<?php educationpress_posted_on(); ?>
            <?php educationpress_entry_footer(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educationpress' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

 </article><!-- #post-## -->

