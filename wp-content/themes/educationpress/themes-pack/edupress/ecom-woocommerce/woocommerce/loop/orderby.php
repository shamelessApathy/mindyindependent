<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="well well-sm row">         		
	<div class="col-xs-12 col-sm-5 sorting">
        <form class="woocommerce-ordering" name="ads_sort_form" method="get">
        	<label>Sort by:</label>
            <select name="orderby" class="orderby">
                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
                <?php endforeach; ?>
            </select>
            <?php
                // Keep query string vars intact
                foreach ( $_GET as $key => $val ) {
                    if ( 'orderby' === $key || 'submit' === $key ) {
                        continue;
                    }
                    if ( is_array( $val ) ) {
                        foreach( $val as $innerVal ) {
                            echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                        }
                    } else {
                        echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
                    }
                }
            ?>
        </form>
	</div>
    
<?php
	if( !edupress_ecommerce_is_product_archive_template() ):
	global $edupress_options;
	
	?>
    <div class="btn-group">
        <a class="btn btn-default btn-sm <?php if($edupress_options['edupress_courselisting_mode'] == '2'){?>active<?php }?>" id="list" href="#"><span class="glyphicon glyphicon-th-list">        
        </span></a> 
        <a class="btn btn-default btn-sm  <?php if($edupress_options['edupress_courselisting_mode'] == '1'){?>active<?php }?>" id="grid" href="#">
        <span class="glyphicon glyphicon-th"></span></a>
    </div>
    <?php
	endif;
	?>
</div>
