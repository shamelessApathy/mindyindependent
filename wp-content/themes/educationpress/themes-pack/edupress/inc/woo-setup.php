<?php
/**
 *  WooCommerce Functions for Dazzling theme
 */

if ( ! function_exists( 'edupress_ecommerce_woo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function edupress_ecommerce_woo_setup() {
	
	if( !get_option( 'edupress_ecommerce_woocommerce_option_setup', false) ) 
	{
		$woocommerce_permalinks = get_option( 'woocommerce_permalinks', array() );
		
		$woocommerce_permalinks[ 'category_base' ] = 'couse-category';
		$woocommerce_permalinks[ 'tag_base' ] = 'couse-tag';
		$woocommerce_permalinks[ 'product_base' ] = '/course';
		update_option('woocommerce_permalinks' , $woocommerce_permalinks);
		
		$shop_page_id =  woocommerce_get_page_id( 'shop' ) ;
		
		update_option( 'woocommerce_enable_myaccount_registration', '1');
		update_option( 'woocommerce_price_num_decimals', 0);
		
		if($shop_page_id > 0) {
			$page_data = array(
				'ID'           => intval( $shop_page_id ),
				'post_title' => sanitize_text_field( 'Courses' ),
				'post_name' => sanitize_title_with_dashes( 'courses', '', 'save') 
			);
			wp_update_post($page_data, true);
			update_option( 'edupress_ecommerce_woocommerce_option_setup', true);
		}

	}
}
endif; // edupress_ecommerce_woo_setup
add_action( 'after_setup_theme', 'edupress_ecommerce_woo_setup' );

add_action( 'init', 'edupress_ecommerce_woocommerce_image_dimensions', 1 );
/**
 * Define image sizes
*/
function edupress_ecommerce_woocommerce_image_dimensions() {
  $catalog = array(
		'width' 	=> '360',	// px
		'height'	=> '270',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '800',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '277',	// px
		'height'	=> '270',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/*
 * Add basic WooCommerce template support
 *
 */

// First let's remove original WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Replace WooComemrce button class with Bootstrap
add_filter('woocommerce_loop_add_to_cart_link', 'edupress_ecommerce_commerce_switch_buttons');

function edupress_ecommerce_commerce_switch_buttons( $button ){

  $button = str_replace('button', 'btn btn-default', $button);

  return $button;

}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 */
function edupress_ecommerce_woomenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && ('primary' !== $args->theme_location || 'visiter' == $args->theme_location))
		return $menu;


		global $woocommerce;					
		$cart_url = $woocommerce->cart->get_cart_url();
		$total_cour = $woocommerce->cart->cart_contents_count;
		$viewing_cart = esc_html__('View your cart', 'edupress');
		
		ob_start();
		$menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. esc_url($cart_url) .'" title="'. $viewing_cart .'">';

		$menu_item .= '<i class="lnr lnr-cart"></i> ';

		
		$menu_item .= '<span>'.$total_cour.'</span>';
		$menu_item .= '</a></li>';

		echo $menu_item;
		$social = ob_get_clean();
		return $menu . $social;

}
add_filter('wp_nav_menu_items','edupress_ecommerce_woomenucart', 10, 2);


add_filter( 'woocommerce_register_post_type_product', 'edupress_ecommerce_change_post_type_product' );
function edupress_ecommerce_change_post_type_product( $args ) {
	$args[ 'labels' ] = array(
							'name'                  => esc_html__( 'Courses', 'edupress' ),
							'singular_name'         => esc_html__( 'Course', 'edupress' ),
							'menu_name'             => _x( 'Courses', 'Admin menu name', 'edupress' ),
							'add_new'               => esc_html__( 'Add Course', 'edupress' ),
							'add_new_item'          => esc_html__( 'Add New Course', 'edupress' ),
							'edit'                  => esc_html__( 'Edit', 'edupress' ),
							'edit_item'             => esc_html__( 'Edit Course', 'edupress' ),
							'new_item'              => esc_html__( 'New Course', 'edupress' ),
							'view'                  => esc_html__( 'View Course', 'edupress' ),
							'view_item'             => esc_html__( 'View Course', 'edupress' ),
							'search_items'          => esc_html__( 'Search Courses', 'edupress' ),
							'not_found'             => esc_html__( 'No Courses found', 'edupress' ),
							'not_found_in_trash'    => esc_html__( 'No Courses found in trash', 'edupress' ),
							'parent'                => esc_html__( 'Parent Course', 'edupress' ),
							'featured_image'        => esc_html__( 'Course Image', 'edupress' ),
							'set_featured_image'    => esc_html__( 'Set course image', 'edupress' ),
							'remove_featured_image' => esc_html__( 'Remove course image', 'edupress' ),
							'use_featured_image'    => esc_html__( 'Use as course image', 'edupress' ),
							'insert_into_item'      => esc_html__( 'Insert into course', 'edupress' ),
							'uploaded_to_this_item' => esc_html__( 'Uploaded to this course', 'edupress' ),
							'filter_items_list'     => esc_html__( 'Filter courses', 'edupress' ),
							'items_list_navigation' => esc_html__( 'Courses navigation', 'edupress' ),
							'items_list'            => esc_html__( 'Courses list', 'edupress' ),
						);
	$args[ 'supports' ][] = 'author';
	return $args;	
}

add_filter( 'woocommerce_taxonomy_args_product_cat', 'edupress_ecommerce_change_product_cat' );
function edupress_ecommerce_change_product_cat( $args ) {
	$args[ 'labels' ] = array(
						'name'              => esc_html__( 'Course Categories', 'edupress' ),
						'singular_name'     => esc_html__( 'Course Category', 'edupress' ),
						'menu_name'         => _x( 'Categories', 'Admin menu name', 'edupress' ),
						'search_items'      => esc_html__( 'Search Course Categories', 'edupress' ),
						'all_items'         => esc_html__( 'All Course Categories', 'edupress' ),
						'parent_item'       => esc_html__( 'Parent Course Category', 'edupress' ),
						'parent_item_colon' => esc_html__( 'Parent Course Category:', 'edupress' ),
						'edit_item'         => esc_html__( 'Edit Course Category', 'edupress' ),
						'update_item'       => esc_html__( 'Update Course Category', 'edupress' ),
						'add_new_item'      => esc_html__( 'Add New Course Category', 'edupress' ),
						'new_item_name'     => esc_html__( 'New Course Category Name', 'edupress' ),
						'not_found'         => esc_html__( 'No Course Category found', 'edupress' ),
					);
	return $args;	
}

add_filter( 'woocommerce_taxonomy_args_product_tag', 'edupress_ecommerce_change_product_tag' );
function edupress_ecommerce_change_product_tag( $args ) {
	$args[ 'labels' ] = array(
						'name'                       => esc_html__( 'Course Tags', 'edupress' ),
						'singular_name'              => esc_html__( 'Course Tag', 'edupress' ),
						'menu_name'                  => _x( 'Tags', 'Admin menu name', 'edupress' ),
						'search_items'               => esc_html__( 'Search Course Tags', 'edupress' ),
						'all_items'                  => esc_html__( 'All Course Tags', 'edupress' ),
						'edit_item'                  => esc_html__( 'Edit Course Tag', 'edupress' ),
						'update_item'                => esc_html__( 'Update Course Tag', 'edupress' ),
						'add_new_item'               => esc_html__( 'Add New Course Tag', 'edupress' ),
						'new_item_name'              => esc_html__( 'New Course Tag Name', 'edupress' ),
						'popular_items'              => esc_html__( 'Popular Course Tags', 'edupress' ),
						'separate_items_with_commas' => esc_html__( 'Separate Course Tags with commas', 'edupress'  ),
						'add_or_remove_items'        => esc_html__( 'Add or remove Course Tags', 'edupress' ),
						'choose_from_most_used'      => esc_html__( 'Choose from the most used Course tags', 'edupress' ),
						'not_found'                  => esc_html__( 'No Course Tags found', 'edupress' ),
					);
	return $args;					
}


function edupress_ecommerce_product_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'product' == $screen->post_type ) {
          $title = 'Course Name';
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'edupress_ecommerce_product_change_title_text', 999 );



//change Title of Product gallery
add_action('add_meta_boxes_product', 'edupress_ecommerce_change_product_gallery_meta_box_title', 999);
function edupress_ecommerce_change_product_gallery_meta_box_title()
{
	//global $wp_meta_boxes; // array of defined meta boxes
	remove_meta_box( 'woocommerce-product-images', 'product',  'side', 'low' );
	add_meta_box( 'woocommerce-product-images', __( 'Course Gallery', 'edupress' ), 'edupress_ecommerce_product_gallery_output', 'product', 'side', 'low' );
	
	remove_meta_box( 'postexcerpt', 'product',  'normal' );
	add_meta_box( 'postexcerpt', __( 'Course Short Description', 'edupress' ), 'WC_Meta_Box_Product_Short_Description::output', 'product', 'normal' );
	/*
	echo "<pre>";
	print_r($wp_meta_boxes);
	die;
	*/
}
//For Couse Gallery Image
function edupress_ecommerce_product_gallery_output( $post ) {
	?>
	<div id="product_images_container">
		<ul class="product_images">
			<?php
				if ( metadata_exists( 'post', $post->ID, '_product_image_gallery' ) ) {
					$product_image_gallery = get_post_meta( $post->ID, '_product_image_gallery', true );
				} else {
					// Backwards compat
					$attachment_ids = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_key=_woocommerce_exclude_image&meta_value=0' );
					$attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
					$product_image_gallery = implode( ',', $attachment_ids );
				}

				$attachments         = array_filter( explode( ',', $product_image_gallery ) );
				$update_meta         = false;
				$updated_gallery_ids = array();

				if ( ! empty( $attachments ) ) {
					foreach ( $attachments as $attachment_id ) {
						$attachment = wp_get_attachment_image( $attachment_id, 'thumbnail' );

						// if attachment is empty skip
						if ( empty( $attachment ) ) {
							$update_meta = true;
							continue;
						}

						echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
							' . $attachment . '
							<ul class="actions">
								<li><a href="#" class="delete tips" data-tip="' . esc_attr__( 'Delete image', 'edupress' ) . '">' . __( 'Delete', 'edupress' ) . '</a></li>
							</ul>
						</li>';

						// rebuild ids to be saved
						$updated_gallery_ids[] = $attachment_id;
					}

					// need to update product meta to set new gallery ids
					if ( $update_meta ) {
						update_post_meta( $post->ID, '_product_image_gallery', implode( ',', $updated_gallery_ids ) );
					}
				}
			?>
		</ul>

		<input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?php echo esc_attr( $product_image_gallery ); ?>" />

	</div>
	<p class="add_product_images hide-if-no-js">
		<a href="#" data-choose="<?php esc_attr_e( 'Add Images to Course Gallery', 'edupress' ); ?>" data-update="<?php esc_attr_e( 'Add to gallery', 'edupress' ); ?>" data-delete="<?php esc_attr_e( 'Delete image', 'edupress' ); ?>" data-text="<?php esc_attr_e( 'Delete', 'edupress' ); ?>"><?php _e( 'Add course gallery images', 'edupress' ); ?></a>
	</p>
	<?php
}

/*
 * start For adding course related fields
 */
/*
add_action( 'woocommerce_product_options_general_product_data', 'edupress_ecommerce_custom_add_custom_fields' );
function edupress_ecommerce_custom_add_custom_fields() {
    woocommerce_wp_text_input( array(
        'id' => '_duration',
        'label' => esc_html__( 'Duration', 'edupress' ),
        'description' => esc_html__( 'Please enter course duraion. for ex. 5 Days', 'edupress' ),
        'desc_tip' => 'true',
        'placeholder' => esc_html__( 'Duration', 'edupress' )
    	)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'                => '_lectures', 
			'label'             => esc_html__( 'Lectures', 'edupress' ), 
			'placeholder'       => '', 
			'description'       => esc_html__( 'Enter the number of lectures', 'edupress' ),
			'type'              => 'number', 
			'custom_attributes' => array(
					'step' 	=> 'any',
					'min'	=> '0',
				),
			'placeholder' => esc_html__( 'Lectures', 'edupress' ),
			'desc_tip' => 'true'
		)
	);
	woocommerce_wp_checkbox( 
		array( 
			'id'            => '_certificate_of_completion', 
			'wrapper_class' => 'show_if_simple', 
			'label'         => esc_html__('Certificate of Completion', 'edupress' ), 
			'description'   => esc_html__( 'Yes', 'edupress' ) 
			)
	  );
}
*/
add_action( 'woocommerce_process_product_meta', 'edupress_ecommerce_save_custom_fields' );
function edupress_ecommerce_save_custom_fields( $post_id ) {
    if ( !empty( $_POST['_duration'] ) ) {
        update_post_meta( $post_id, '_duration', esc_attr( $_POST['_duration'] ) );
    }
	if ( !empty( $_POST['_lectures'] ) ) {
        update_post_meta( $post_id, '_lectures', esc_attr( $_POST['_lectures'] ) );
    }
	$_certificate_of_completion = isset( $_POST['_certificate_of_completion'] ) ? 'yes' : 'no';
 	update_post_meta( $post_id, '_certificate_of_completion', $_certificate_of_completion );
}
/*
 * End For adding course related fields
 */
/*
* Change not available placeholder image of thumbnail
*
**/
add_action( 'init', 'edupress_ecommerce_custom_fix_thumbnail' ); 
function edupress_ecommerce_custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
	function custom_woocommerce_placeholder_img_src( $src ) {
		return esc_url(get_template_directory_uri().'/images/img-not-available.jpg');
	}
}

/**
 * For bredcumb
*/
add_filter('woocommerce_breadcrumb_defaults', 'edupress_ecommerce_bredcumb_args', 99);
function edupress_ecommerce_bredcumb_args( $args )
{	
	$args[ 'delimiter' ] = '<i class="fa fa-angle-right"></i>';
	$args[ 'wrap_before' ] = '
	<div class="breadcrumb-detail-page">
		<div class="container">
			<div class="row">
				<p>';	
	$args[ 'wrap_after' ] = '
				</p>
			</div> <!--row #end  -->
		</div>
	</div>';
	return $args;
}
//No need to display result count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count' , 20 );
//Remove sort by from shop page 
add_filter( 'woocommerce_catalog_orderby' , 'edupress_ecommerce_catlog_order_by_remove_sort_by', 99);
function edupress_ecommerce_catlog_order_by_remove_sort_by( $catalog_orderby_options ) {
	foreach( $catalog_orderby_options as $key=>$val) {
		$catalog_orderby_options[ $key ] = ucfirst( str_replace('Sort by ','',$val) );
	}
	return $catalog_orderby_options;
}
//for archieve product catlog size
//now no need because we make new function archieve product thumbnail
//add_filter( 'single_product_archive_thumbnail_size' , function($size) { return 'catlog'; });

//Remove action single proct on archieve loop link
remove_action( 'woocommerce_before_shop_loop_item' , 'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_product_link_close', 5);
//Remove add to cart from single product
remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_add_to_cart', 10);

//For product thumbnail on archieve page

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'edupress_ecommerce_woocommerce_template_loop_product_thumbnail', 10);

function edupress_ecommerce_woocommerce_template_loop_product_thumbnail() {
	global $post;
	$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );
	
	echo '<a href="' . get_the_permalink() . '" class="img-thumb">';
	woocommerce_show_product_loop_sale_flash();
	echo '<div class="course-thumbnail course-featured-media">
    			<figure>';
			
			if ( has_post_thumbnail() ) {
				$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
				echo get_the_post_thumbnail( $post->ID, $image_size, array(
					'title'	 => esc_html( $props['title'] ),
					'alt'    => esc_html( $props['alt'] )
				) );
			} elseif ( wc_placeholder_img_src() ) { ?>
				<img src="<?php echo wc_placeholder_img_src();?>" />
                <?php
			}
	echo '		</figure>
			</div>';		
	woocommerce_template_loop_product_link_close();
}
//Archieve Product revove sale flush 
remove_action( 'woocommerce_before_shop_loop_item_title' , 'woocommerce_show_product_loop_sale_flash', 10);
//Archieve Product remove default woocommerce price
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
//Archieve product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action( 'woocommerce_shop_loop_item_title', 'edupress_child_woo_woocommerce_template_loop_product_title', 10);
function edupress_child_woo_woocommerce_template_loop_product_title()
{
	global $edupress_options;
	echo '<div class="course_space">';
	// To Do: Put price here
	
	woocommerce_template_loop_price();
	
	echo '<h3>';
	woocommerce_template_loop_product_link_open();
	echo get_the_title();
	woocommerce_template_loop_product_link_close();
	echo '</h3>';
	
	// Instructor and Category Put here
	?>
	<p class="meta">
		<?php
		if( $edupress_options[ is_search() ? 'edupress_coursesearch_instructor' : 'edupress_courselisting_instructor'] ){
			 
				esc_html_e( 'by: ', 'edupress'); 
				echo edupress_ecommerce_get_author_link();
			  
		}
		 ?>
		 <?php if($edupress_options[ is_search() ? 'edupress_coursesearch_cat' :'edupress_courselisting_cat']){?>
		 <?php esc_html_e( 'in:', 'edupress');
				echo get_the_term_list( get_the_ID(), 'product_cat', ' ', ', ', '' ); ?>
		 <?php }?>
     
		 </p>
     <?php
		echo  '<p class="desc">'.edupress_ecommerce_get_the_popular_excerpt().'</p>';
	echo '</div>';
}

function edupress_ecommerce_get_the_popular_excerpt(){
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 100);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	//$excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
	$excerpt = $excerpt.'... ';
	return $excerpt;
}
//format price as per design

add_filter( 'woocommerce_get_price_html_from_to' , 'edupress_ecommerce_woocommerce_get_price_html_from_to',99 ,3);
function edupress_ecommerce_woocommerce_get_price_html_from_to( $price, $from, $to) {
	$price = '<span>'.( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</span><s>' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</s>';
	return $price;
}

add_filter( 'wc_price' , 'edupress_ecommerce_wc_price', 10, 3);
function edupress_ecommerce_wc_price( $return, $price, $args = array() ) {
	
	extract( apply_filters( 'wc_price_args', wp_parse_args( $args, array(
		'ex_tax_label'       => false,
		'currency'           => '',
		'decimal_separator'  => wc_get_price_decimal_separator(),
		'thousand_separator' => wc_get_price_thousand_separator(),
		'decimals'           => wc_get_price_decimals(),
		'price_format'       => get_woocommerce_price_format()
	) ) ) );

	$negative        = $price < 0;
	

	$formatted_price = ( $negative ? '-' : '' ) . sprintf( $price_format, get_woocommerce_currency_symbol( $currency ) , $price );
	$return          =  $formatted_price ;

	if ( $ex_tax_label && wc_tax_enabled() ) {
		$return .= ' <small class="woocommerce-Price-taxLabel tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
	}
	return $return;
}

//for single price not sale price
add_filter( 'woocommerce_price_html' , 'edupress_ecommerce_woocommerce_price_html', 10, 2);
function edupress_ecommerce_woocommerce_price_html($price, $product_obj ) {
	if ( !($product_obj->is_on_sale() && $product_obj->get_regular_price()) ) {
		$price = '<span>'.$price.'</span>'
;	}
	return $price;
}



//Start For single product

//Add to cart button when sale price and regular price is not given, default woocommerce make hide it
add_filter( 'woocommerce_is_purchasable', 'edupress_ecommerce_woocommerce_is_purchasable', 10, 2 );
function edupress_ecommerce_woocommerce_is_purchasable($purchasable, $obj_product ) {
	if( $purchasable )
		return $purchasable;
		
	$purchasable = true;
	// Products must exist of course
	if ( ! $obj_product->exists() ) {
		$purchasable = false;
	// Check the product is published
	} elseif ( $obj_product->post->post_status !== 'publish' && ! current_user_can( 'edit_post', $this->id ) ) {
		$purchasable = false;
	}
	
	return $purchasable;	
}
			
//@removed hooked woocommerce_template_single_rating - 10
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
//@removed hooked woocommerce_template_single_price - 10
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
//* @removed hooked woocommerce_template_single_add_to_cart - 30
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//* @removed hooked woocommerce_template_single_meta - 40
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
//* @removed hooked woocommerce_template_single_sharing - 50
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// * @removed hooked woocommerce_show_product_sale_flash - 10
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

//@removed hooked woocommerce_output_product_data_tabs - 10
remove_action(  'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	 
//end for single product

//start for category page
// * @removed hooked woocommerce_taxonomy_archive_description - 10
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
//end for category page



//Set 12 product display per page
if (!function_exists('edupress_ecommerce_shop_loop_shop_per_page'))
{
    function edupress_ecommerce_shop_loop_shop_per_page()
    {
		global $edupress_options;	
		if( !is_search() && !empty( $edupress_options[ 'edupress_courselisting_number' ]) )
		{
			$number_of_courses = intval( $edupress_options[ 'edupress_courselisting_number' ] );
			return $number_of_courses;
		}
		elseif( is_search() && !empty( $edupress_options[ 'edupress_coursesearch_number' ]) )
		{
			$number_of_courses = intval( $edupress_options[ 'edupress_coursesearch_number' ] );
			return $number_of_courses;
		}
		else
		{
        	return 12;
		}
    }
}
add_filter('loop_shop_per_page', 'edupress_ecommerce_shop_loop_shop_per_page');

// Remove Order Review
remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review');

// Remove On Sale
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');
//Remove qantity dropdown from single product page
add_filter( 'woocommerce_is_sold_individually', 'edupress_ecommerce_wc_remove_all_quantity_fields', 10, 2 );
function edupress_ecommerce_wc_remove_all_quantity_fields( $return, $product ) {
	if(is_single())
	    return true;
	else
		return $return;
}
//Add to cart button text change
add_filter( 'add_to_cart_text', 'edupress_ecommerce_woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'edupress_ecommerce_woo_custom_single_add_to_cart_text' );  // 2.1 +
function edupress_ecommerce_woo_custom_single_add_to_cart_text() {
  
    return esc_html__( 'Enroll This Course', 'edupress' );
  
}
//For Wishlist
add_action( 'woocommerce_after_add_to_cart_button' , 'edupress_ecommerce_woocommerce_after_add_to_cart_button', 20);
function edupress_ecommerce_woocommerce_after_add_to_cart_button()
{
	global $edupress_options;
	if( !empty( $edupress_options[ 'edupress_coursedetail_wishlist' ] ) && $edupress_options[ 'edupress_coursedetail_wishlist' ])
	{
		if ( is_user_logged_in() ) 
		{
			edupress_ecommerce_li_love_link($love_text = null, $loved_text = null);
		}
		else
		{
			global  $post;
			echo '<a href="#" class="fav" onclick="return false;"><i class="fa fa-heart-o"></i> <span> '.esc_html(edupress_ecommerce_li_get_love_count( $post->ID )).'</span></a>';
		 }
	}	
}

function edupress_ecommerce_remove_specific_hook() {
	global $edupress_options;

	if( !empty( $edupress_options['edupress_courselisting_ratting'] ) &&  $edupress_options['edupress_courselisting_ratting'] == 0)
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
}
add_action( 'init', 'edupress_ecommerce_remove_specific_hook', 50 );

//Get all Attributes in key val form
function edupress_woo_get_formatted_product_attributes() {
	global $product;	
	$formatted_attributes = array();	
	$attributes = $product->get_attributes();	
	foreach($attributes as $attr=>$attr_deets){	
		$attribute_label = wc_attribute_label($attr);	
		if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {
	
			$attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];
	
			if ( $attribute['is_taxonomy'] ) {
	
				$formatted_attributes[$attribute_label] = implode( ', ', wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) ) );
	
			} else {
	
				$formatted_attributes[$attribute_label] = $attribute['value'];
			}
	
		}
	}
	return $formatted_attributes;
}


/*
 * For template Course Grid 2 Col, Courses Grid 3 Col and Couses List Mode 
 */
if( !is_admin() ) {
	add_action( 'pre_get_posts', 'edupress_ecommerce_pre_get_posts' );
	function edupress_ecommerce_pre_get_posts( $q ) {
		// We only want to affect the main query
		if ( ! $q->is_main_query() ) {
			return;
		}
			
		// Fix for verbose page rules
		// $q->queried_object->ID === wc_get_page_id( 'shop' )
		if ( isset( $q->queried_object->ID ) &&
			 is_page_template(array('ecom-page-templates/tpl-courses-grid-2-col.php','ecom-page-templates/tpl-courses-grid-3-col.php','ecom-page-templates/tpl-courses-list.php' )) ) {
				 
			/*	 
			global $course_page_title;			
			$course_page_title = the_title( '<h1 class="entry-title">', '</h1>', false );
			*/
			
			
			$q->set( 'post_type', 'product' );
			$q->set( 'page', '' );
			$q->set( 'pagename', '' );
	
			// Fix conditional Functions
			$q->is_archive           = true;
			$q->is_post_type_archive = true;
			$q->is_singular          = false;
			$q->is_page              = false;
			
			$GLOBALS['woocommerce']->query->product_query( $q );
		}
		
		
		remove_action( 'pre_get_posts', 'edupress_ecommerce_pre_get_posts' );
	}
}	



add_filter( 'woocommerce_page_title' , 'edupress_ecommerce_woocommerce_page_title', 20 );
function edupress_ecommerce_woocommerce_page_title( $page_title ) {
	if( is_post_type_archive( 'product' ) && edupress_ecommerce_is_product_page_template( array('ecom-page-templates/tpl-courses-grid-2-col.php','ecom-page-templates/tpl-courses-grid-3-col.php','ecom-page-templates/tpl-courses-list.php' ) ) )
	{
		$page_title = get_the_title( get_queried_object_id() );
	}
	return $page_title;
}

add_filter( 'woocommerce_get_breadcrumb', 'edupress_ecommerce_woocommerce_get_breadcrumb', 20, 2 );
function edupress_ecommerce_woocommerce_get_breadcrumb($breadcrumb, $breadcrumb_obj) {
	if( is_post_type_archive( 'product' ) && edupress_ecommerce_is_product_page_template( array('ecom-page-templates/tpl-courses-grid-2-col.php','ecom-page-templates/tpl-courses-grid-3-col.php','ecom-page-templates/tpl-courses-list.php' ) ) )
	{
		$breadcrumb[1][0] = get_the_title( get_queried_object_id() );
		$breadcrumb[1][1] = get_the_permalink( get_queried_object_id() );
	}
	return $breadcrumb;
}

function edupress_ecommerce_is_product_archive_template() {
	return function_exists( 'edupress_ecommerce_is_product_page_template') && is_post_type_archive( 'product' ) && edupress_ecommerce_is_product_page_template( array('ecom-page-templates/tpl-courses-grid-2-col.php','ecom-page-templates/tpl-courses-grid-3-col.php','ecom-page-templates/tpl-courses-list.php' ) );	
}

function edupress_ecommerce_is_product_page_template( $template = '' ) {
	$id = get_queried_object_id();
    $page_template = get_post_meta( $id, '_wp_page_template', true );
 
    if ( empty( $template ) )
        return (bool) $page_template;
 
    if ( $template == $page_template )
        return true;
 
    if ( is_array( $template ) ) {
        if ( ( in_array( 'default', $template, true ) && ! $page_template )
            || in_array( $page_template, $template, true )
        ) {
            return true;
        }
    }
 
    return ( 'default' === $template && ! $page_template );
}

/**
 * Fix active class in nav for shop page.
 *
 * @param array $menu_items
 * @return array
 */
remove_filter( 'wp_nav_menu_objects', 'wc_nav_menu_item_classes', 2 );
add_filter( 'wp_nav_menu_objects', 'edupress_ecommerce_wp_nav_menu_objects',2 , 1);
function edupress_ecommerce_wp_nav_menu_objects( $menu_items ) {
	if ( ! is_woocommerce() ) {
		return $menu_items;
	}

	$shop_page 		= (int) wc_get_page_id('shop');
	$page_for_posts = (int) get_option( 'page_for_posts' );

	foreach ( (array) $menu_items as $key => $menu_item ) {

		$classes = (array) $menu_item->classes;

		// Unset active class for blog page
		if ( $page_for_posts == $menu_item->object_id ) {
			$menu_items[$key]->current = false;

			if ( in_array( 'current_page_parent', $classes ) ) {
				unset( $classes[ array_search('current_page_parent', $classes) ] );
			}

			if ( in_array( 'current-menu-item', $classes ) ) {
				unset( $classes[ array_search('current-menu-item', $classes) ] );
			}

		// Set active state if this is the shop page link
		} elseif ( edupress_ecommerce_is_product_archive_template() && get_queried_object_id() == $menu_item->object_id && 'page' === $menu_item->object ) {
			$menu_items[ $key ]->current = true;
			$classes[] = 'current-menu-item';
			$classes[] = 'current_page_item';

		// Set parent state if this is a product page
		} elseif ( !edupress_ecommerce_is_product_archive_template() && is_shop() && $shop_page == $menu_item->object_id && 'page' === $menu_item->object ) {
			$menu_items[ $key ]->current = true;
			$classes[] = 'current-menu-item';
			$classes[] = 'current_page_item';

		// Set parent state if this is a product page
		} elseif ( is_singular( 'product' ) && $shop_page == $menu_item->object_id ) {
			$classes[] = 'current_page_parent';
		}

		$menu_items[ $key ]->classes = array_unique( $classes );

	}

	return $menu_items;
}



/**
 * For Cart Page
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );


/*
 * For loop item 0 review display
 */
add_filter( 'woocommerce_product_get_rating_html', 'edupress_ecommerce_product_get_rating_html',10, 2 );
function edupress_ecommerce_product_get_rating_html($rating_html, $rating) {
	if( comments_open() && empty( $rating_html ) && $rating == 0 ) {
		$rating_html  = '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'edupress' ), $rating ) . '">';

			$rating_html  = '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'edupress' ), $rating ) . '">';

			$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'edupress' ) . '</span>';

			$rating_html .= '</div>';
	}
	return $rating_html;
}


//Disable repeat purchase in woocommerce
function edupress_ecommerce_disable_repeat_purchase( $purchasable, $product ) {
    // Enter the ID of the product that shouldn't be purchased again
    //$non_purchasable = 356;
    
    // Get the ID for the current product (passed in)
    $product_id = $product->is_type( 'variation' ) ? $product->variation_id : $product->id;
    
    
    // return false if the customer has bought the product
    if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $product_id ) ) {
        $purchasable = false;
    }
    
    // Double-check for variations: if parent is not purchasable, then variation is not
    if ( $purchasable && $product->is_type( 'variation' ) ) {
        $purchasable = $product->parent->is_purchasable();
    }
    
    return $purchasable;
}
add_filter( 'woocommerce_variation_is_purchasable', 'edupress_ecommerce_disable_repeat_purchase', 20, 2 );
add_filter( 'woocommerce_is_purchasable', 'edupress_ecommerce_disable_repeat_purchase', 20, 2 );

function edupress_ecommerce_purchase_disabled_message() {
	// Get the current product to check if purchasing should be disabled
    global $product;
	
    // Enter the ID of the product that shouldn't be purchased again
	
    $no_repeats_id = $product->id;
    $no_repeats_product = wc_get_product( $no_repeats_id );
	
    if ( $no_repeats_product->is_type( 'variation' ) ) {
        // Bail if we're not looking at the product page for the non-purchasable product
        if ( ! $no_repeats_product->parent->id === $product->id ) {
            return;
        }
        
        // Render the purchase restricted message if we are
        if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $no_repeats_id ) ) {
            edupress_ecommerce_render_variation_non_purchasable_message( $product, $no_repeats_id );
        }
        
    } elseif ( $no_repeats_id === $product->id ) {
        if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $no_repeats_id ) ) {
            // Create your message for the customer here
            echo '<div class='.sanitize_html_class('woocommerce').'.><div class="woocommerce-info wc-nonpurchasable-message">'.esc_html__('You have already enrolled this course! It can only be enrolled once.', 'edupress').'</div></div>';
        }
    }
}
add_action( 'woocommerce_after_add_to_cart_button', 'edupress_ecommerce_purchase_disabled_message', 10 );

add_filter( 'woocommerce_is_sold_individually', '__return_true' );



//for folder change of template
add_filter( 'wc_get_template_part', function( $template, $slug, $name ) 
{ 

    // Look in plugin/woocommerce/slug-name.php or plugin/woocommerce/slug.php
    if ( $name ) {
		
		if( is_child_theme() )
		{
			$child_path =  get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  . WC()->template_path() . "{$slug}-{$name}.php"; 
			if( file_exists( $child_path ) )
			{
				return $child_path;
			}
		}
		
        $path = get_template_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  . WC()->template_path() . "{$slug}-{$name}.php";    
		
		
		
    } else {
		
		if( is_child_theme() )
		{
			$child_path =  get_stylesheet_directory() .DIRECTORY_SEPARATOR .
		 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  . WC()->template_path() . "{$slug}.php";  
			if( file_exists( $child_path ) )
			{
				return $child_path;
			}
		}
		
        $path = get_template_directory() . DIRECTORY_SEPARATOR .
		 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  . WC()->template_path() . "{$slug}.php";    
		
    }



    return file_exists( $path ) ? $path : $template;

}, 10, 3 );


// get path for all other templates.
add_filter( 'woocommerce_locate_template', function( $template, $template_name, $template_path ) 
{	 
	if( is_child_theme() )
	{
		$child_path =  get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  .$template_path . $template_name;  
		if( file_exists( $child_path ) )
		{
			return $child_path;
		}
	}

    $path =  get_template_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR  .$template_path . $template_name;  
    return file_exists( $path ) ? $path : $template;

}, 10, 3 );


add_filter('comments_template','edupress_ecommerce_review_template',100,1);

function edupress_ecommerce_review_template($template) {
	global $woocommerce;
	if (get_post_type() == "product" ) {		
		if(is_child_theme())
		{
			if(file_exists(get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR . "/woocommerce/single-product-reviews.php"))
			{
				$path = get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR . "/woocommerce/single-product-reviews.php";
				return $path;
			}
		}
		
		if(file_exists(get_template_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR . "/woocommerce/single-product-reviews.php"))
		{
			$path = get_template_directory() . DIRECTORY_SEPARATOR . 'ecom-woocommerce' .  DIRECTORY_SEPARATOR . "/woocommerce/single-product-reviews.php";
			return $path;
		}
	}
	return $template;
}



add_filter( 'woocommerce_output_related_products_args', 'edupress_ecommerce_related_products_args' );
  function edupress_ecommerce_related_products_args( $args ) {
	$args['posts_per_page'] = 2; // 4 related products
	return $args;
}

/**
 * For Out of Stock Text Change 
 */
add_filter( 'woocommerce_get_availability_text','edupress_ecommerce_set_out_of_stock_text', 10, 2);
function edupress_ecommerce_set_out_of_stock_text($availability, $product_inst ) 
{
	if ( ! $product_inst->is_in_stock() ) {
		$availability = __( 'Seat Not Available', 'edupress' );
	} 
	elseif ( $product_inst->managing_stock() ) {
			switch ( get_option( 'woocommerce_stock_format' ) ) {
				case 'no_amount' :
					
				break;
				case 'low_amount' :
					
				break;
				default :
					$availability = '';
				break;
			}
	}
	
	return $availability;
}


//for Wordpress Social Login compatibility
if ( in_array( 'wordpress-social-login/wp-social-login.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	// display WSL widget in woocommerce forms
	add_action( 'woocommerce_login_form_end', 'wsl_action_wordpress_social_login' );
	 
	/**
	* Our hooked in function - $fields is passed via the filter
	*/
	function educationpress_custom_override_checkout_fields( $fields )
	{
		$current_user = wp_get_current_user();
		
		$fields['billing']['billing_first_name']['default'] = $current_user->user_firstname;
		$fields['billing']['billing_last_name']['default']  = $current_user->user_lastname;
		
		return $fields;
	}
	 
	add_filter( 'woocommerce_checkout_fields' , 'educationpress_custom_override_checkout_fields' );
}
