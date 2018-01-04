<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $edupress_options;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
$view_mode= "grid-group-item" ;
if( is_archive() )
{
	$view_mode = ($edupress_options['edupress_courselisting_mode'] == '1' && !edupress_ecommerce_is_product_page_template( 'ecom-page-templates/tpl-courses-list.php' ) ) ? "grid-group-item" : "grid-group-item list-group-item" ;
}
global $single_product_class;
?>
<div class="col-xs-12 <?php if( !empty( $single_product_class ) ) { echo esc_attr($single_product_class); } else{ echo esc_attr(edupress_column_class(is_search() ? 'edupress_searchcourse_layout' :'edupress_courselisting_layout')); } ?> zoom courses <?php echo esc_attr($view_mode);?>">
	<div class="course clist">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * Removed hook
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @removed hooked woocommerce_template_loop_price - 10
	 */
	 ?>
	 <div class="course_rel">
     <?php
		do_action( 'woocommerce_after_shop_loop_item_title' );
		global $edupress_options;
		if( !empty($edupress_options[ is_search() ? 'edupress_coursesearch_enroll' : 'edupress_courselisting_enroll']) && $edupress_options[is_search() ? 'edupress_coursesearch_enroll' : 'edupress_courselisting_enroll']){
			global $product, $edupress_options;
			?>
            <p class="enroll col-xs-12 col-sm-6 pull-right"><?php echo esc_html( get_post_meta( $product->id, 'total_sales', true ) );?> <?php esc_html_e( 'Enrolled', 'edupress'); ?></p>
            
         <?php }?>
	</div>
	<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @removed hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
    </div>
</div>

