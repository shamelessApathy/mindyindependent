<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop, $edupress_options;

if ( ! $upsells = $product->get_upsells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => WC()->query->get_meta_query()
);

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'up-sells';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_up_sells_columns', $columns );

if ( $products->have_posts() ) : ?>
<div id="upsells" class="courses-info <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php if($active_sec == 'like'):?>in  active<?php endif;?> <?php } ?>">
	<section class="up-sells upsells products">
    
		<h3><?php _e( 'You may also like&hellip;', 'edupress' ) ?></h3>
       
        

		<?php woocommerce_product_loop_start(); ?>
        	 <?php
				global $single_product_class;
				$single_product_class = "col-sm-6";
			?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>
</div>

<?php endif;

wp_reset_postdata();
