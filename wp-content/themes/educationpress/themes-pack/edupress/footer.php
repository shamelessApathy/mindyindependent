<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPress
 */
global $edupress_options;
?>
</div>
<!-- #content -->
<?php
	if( edupress_is_a( 'ecom' ) ) {
		get_template_part( 'partials/ecom-footer' );
	}
	elseif( edupress_is_a( 'uni' ) ) {
		get_template_part( 'partials/uni-footer' );
	}
	elseif( edupress_is_a( 'kid' ) ) {
		get_template_part( 'partials/kid-footer' );
	}	
?>

<?php wp_footer(); ?>
</body></html>