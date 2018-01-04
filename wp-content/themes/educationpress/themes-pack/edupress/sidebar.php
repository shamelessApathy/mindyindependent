<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edupress
 */

if( edupress_is_a( 'ecom' ) ) {
	get_template_part( 'ecom-sidebar' );
}
elseif( edupress_is_a( 'uni' ) ) {
	get_template_part( 'uni-sidebar' );
}
elseif( edupress_is_a( 'kid' ) ) {
	get_template_part( 'kid-sidebar' );
}
 