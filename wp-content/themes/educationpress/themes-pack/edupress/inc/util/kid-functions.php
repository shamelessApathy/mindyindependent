<?php
//Admin functions start
//for metabox in class

//for ACF
//add_action( 'init', 'edupress_kid_acf_setup' );
function edupress_kid_acf_setup() {
	
	if( get_option( 'edupress_kid_is_acf_field', false) )
	{
		return ;
	}
	
	if( class_exists('acf')  && post_type_exists( 'class' )) {   
		 $acf_args = array(
			"post_type"   => 'acf',
			//"post_title"  =>	esc_html( 'Class Information'),
			"s"  =>	esc_html( 'Class Information'),
			"post_status" =>  'publish' ,
		);
		$acf_posts = get_posts( $acf_args );
		
		if(  is_array( $acf_posts ) && count( $acf_posts ) == 0) {
			$post_id = 	wp_insert_post(array(
								'post_title' => esc_html( 'Class Information' ),
								//'post_name' => 'acf_course-information',
								'post_content'  => '',
								'post_type' => 'acf',
								'post_status'	=> 'publish',
								
								'comment_status' => 'closed',
								'ping_status' => 'closed',
								'menu_order' => 0,
							));
							
		
			$fields = array (
				array
				(
					'key' => 'field_57f39b0f62e14',
					'label' => 'Price',
					'name' => 'price',
					'type' => 'number',
					'instructions' => '',
					'required' => '0',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57ef797760e6b',
											'operator' => '==',
											'value' => '1',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '0',
				),
				array
				(
					'key' => 'field_57f39bcae4c05',
					'label' => 'Year Old',
					'name' => 'year_old',
					'type' => 'text',
					'instructions' => 'Please enter year old range. for ex. 2 - 5',
					'required' => '0',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57ef797760e6b',
											'operator' => '==',
											'value' => '1',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '1',
				),
				array
				(
					'key' => 'field_57f39bcae4c05',
					'label' => 'Year Old',
					'name' => 'year_old',
					'type' => 'text',
					'instructions' => 'Please enter year old range. for ex. 2 - 5',
					'required' => '0',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57ef797760e6b',
											'operator' => '==',
											'value' => '1',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '1',
				),
				array
				(
					'key' => 'field_57f39c3be4c06',
					'label' => 'Class Size',
					'name' => 'class_size',
					'type' => 'number',
					'instructions' => '',
					'required' => '0',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => null,
											'operator' => '==',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '2',
				),
				
				array
				(
					'key' => 'field_57ef783160e69',
					'label' => 'Class Duration',
					'name' => 'class_duration',
					'type' => 'text',
					'instructions' => 'Please enter class duraion. for ex. 09:00 - 10:00',
					'required' => '0',
					'default_value' => '',
					'placeholder' => 'Duration',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57ef797760e6b',
											'operator' => '==',
											'value' => '1',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '3',
				),
				
				
			);
				
			foreach( $fields as $field ) {
				update_post_meta($post_id, $field['key'], $field);	
			}
			
			update_post_meta($post_id, 'position' , 'normal');
			update_post_meta($post_id, 'layout' , 'default');
			update_post_meta($post_id, 'hide_on_screen' , '');
			
			
			update_post_meta($post_id, 'rule' , array
													(
														'param' => 'post_type',
														'operator' => '==',
														'value' => 'class',
														'order_no' => 0,
														'group_no' => 0,
													)
											);
				
		}
		update_option( 'edupress_kid_is_acf_field' , true);
	 }
	
}


/**
 * Register meta box(es).
 */
function edupress_kid_register_custom_meta_boxes() {
	add_meta_box( 'meta-box-id', __( 'Teachers', 'edupress' ), 'edupress_kid_instructors_callback', 'class' , 'side', 'default'  );
}
add_action( 'add_meta_boxes', 'edupress_kid_register_custom_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function edupress_kid_instructors_callback( $post ) {
	$query = new WP_User_Query( array(
			'orderby' => 'display_name',
			'order'   => 'asc',
			'role'    => '',
			'fields'  => 'all',
		));

		$user_array =  $query->get_results();
		$selected_instructors = get_post_meta( $post->ID, 'edupress_kid_class_instructors', true );
		$selected_instructors = (array) explode(',', $selected_instructors);
		
?>
 <p>
	<label for="meta-text" class="prfx-row-title"><?php _e( 'Teachers', 'edupress' )?></label>
	<br/>
	<select multiple="multiple" size="5"  id="edupress_kid_class_instructors" name="edupress_kid_class_instructors[]" class="select-2">
			<?php
			foreach($user_array as $user) {
			?>
			<option value="<?php echo $user->ID;?>" <?php if( in_array($user->ID , $selected_instructors) ) {?>selected<?php } ?> ><?php echo $user->data->display_name ;?> </option>
			<?php 
			}
			?>
	 </select>
	
</p>
<?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function edupress_kid_save_meta_box( $post_id, $post, $update) {
	// Save logic goes here. Don't forget to include nonce checks!
	$post_type = get_post_type($post_id);

	// If this isn't a 'book' post, don't update it.
	if ( "class" != $post_type ) return;

	$post_meta_value = '';

	if( !empty($_POST['edupress_kid_class_instructors']) )
	{
		if(is_array($_POST['edupress_kid_class_instructors'])) {
			$instructors_input_array = $_POST['edupress_kid_class_instructors'];
			$instructors_input_array = array_filter( $instructors_input_array );
			array_map( 'absint', $instructors_input_array ); 	
			$post_meta_value = implode(',', $_POST['edupress_kid_class_instructors'] );
		}
		else {
			$post_meta_value = absint( $_POST['edupress_kid_class_instructors'] );
		}
	}
	


	update_post_meta($post_id, 'edupress_kid_class_instructors', $post_meta_value);


	
}
add_action( 'save_post', 'edupress_kid_save_meta_box', 10 , 3);
		/*
		<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
*/


/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function wpdocs_enqueue_custom_admin_style( $hook ) {
	  global $post;

     if ( ($hook !== 'post-new.php' && $hook !== 'post.php') ) 
 		return;
		
	global $post;		
	if(isset($post->post_type) && 'class' !== $post->post_type)
		return;
	
	 wp_enqueue_style( 'edupress-university-select-advanced', get_stylesheet_directory_uri() . '/assets/css/select-advanced.css' );
	 
	wp_register_script( 'rwmb-select2', get_stylesheet_directory_uri() . '/assets/js/select2.min.js', array( 'jquery' ), '4.0.2', true );
	wp_enqueue_script( 'rwmb-select2');
	 wp_add_inline_script( 'rwmb-select2', "jQuery( document ).ready(function() { jQuery('.select-2').select2();; })");
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );
//Admin functions end


//For cart in menu start
add_filter('wp_nav_menu_items','edupress_kid_woo_cart', 10, 2);
function edupress_kid_woo_cart($menu, $args) {
		
		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
			return $menu;
		
		
		if($args->theme_location=='primary' || $args->theme_location=='visiter')
		{
			
			global $woocommerce;
			
			$cart_url = $woocommerce->cart->get_cart_url();
			$total_cour = $woocommerce->cart->cart_contents_count;
			
			$viewing_cart = esc_html__('View your cart', 'edupress');
			
			ob_start();
			$menu_item = '<li class="pull-right"><a class="menu-cart" href="'. $cart_url .'" title="'. $viewing_cart .'">';

			$menu_item .= '<i class="lnr lnr-cart"></i> ';

			
			$menu_item .= '<span>'.$total_cour.'</span>';
			$menu_item .= '</a></li>';
	
			echo $menu_item;
			$social = ob_get_clean();
			return $menu . $social;
			}
			return $menu;

}
//For cart in menu end



/*
 * For template Course Grid 2 Col, Courses Grid 3 Col and Couses List Mode 
 */
if( !is_admin() ) {
	add_action( 'pre_get_posts', 'edupress_kid_pre_get_posts' );
	function edupress_kid_pre_get_posts( $q ) {
		// We only want to affect the main query
		if ( ! $q->is_main_query() ) {
			return;
		}
			
	
			
		// Fix for verbose page rules
		// $q->queried_object->ID === wc_get_page_id( 'shop' )
		if ( (
				isset( $q->queried_object->ID ) 
				&&
			 	is_page_template(array('kid-page-templates/tpl-classes.php','kid-page-templates/tpl-classes-grid-2-col.php','kid-page-templates/tpl-classes-grid-3-col.php','kid-page-templates/tpl-classes-list.php' ))
			  )
			  ||
				 is_tax( 'class-category' )
			  ||
			  (is_search() && isset($q->query_vars['post_type']) && $q->query_vars['post_type'] == 'class' )
			   
			   ) {
				
				
				 
			/*	 
			global $class_page_title;			
			$class_page_title = the_title( '<h1 class="entry-title">', '</h1>', false );
			*/
			
			
			$q->set( 'post_type', 'class' );
			$q->set( 'page', '' );
			$q->set( 'pagename', '' );
	
			// Fix conditional Functions
			$q->is_archive           = true;
			$q->is_post_type_archive = true;
			$q->is_singular          = false;
			$q->is_page              = false;
			
		
		}
		
		if( $q->is_post_type_archive( 'class' ) && $q->is_main_query() ){
			
			if( is_search()) 
				$q->set( 'posts_per_page', $GLOBALS['edupress_options']['edupress_classsearch_number'] );
			else
            	$q->set( 'posts_per_page', $GLOBALS['edupress_options']['edupress_classlisting_number'] );
    	}
		
		
		remove_action( 'pre_get_posts', 'edupress_kid_pre_get_posts' );
	}
}	

add_filter( 'template_include', 'edupress_kid_search_to_archive_class', 99 );

function edupress_kid_search_to_archive_class( $template ) {
	
	if ( is_search() && !empty( $_GET['post_type'] ) && $_GET['post_type'] == 'class' ) {
		$new_template = locate_template( array( 'archive-class.php' ) );
		if ( '' != $new_template ) {
			
			
			return $new_template ;
		}
	}

	return $template;
}


//Start for search all
// load search filters only on frontend
if ( ! is_admin() ) {
	add_filter( 'posts_join', 'edupress_custom_search_join', 99, 2 );
	add_filter( 'posts_where', 'edupress_custom_search_where', 99, 2 );
	add_filter( 'posts_groupby', 'edupress_custom_search_groupby' );
}

function edupress_custom_search_join( $join, &$pass_query ) {
	global $wpdb;

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type']) && $_GET['post_type']=='class' && $pass_query->is_main_query()) {

		$join  = " LEFT JOIN $wpdb->term_relationships AS r ON ($wpdb->posts.ID = r.object_id) ";
		$join .= " LEFT JOIN $wpdb->term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id) ";
		$join .= " AND (x.taxonomy = 'class-category' OR 1=1) ";

		// if an ad category is selected, limit results to that cat only
		$catid = get_query_var( 'scat' );

		if ( ! empty( $catid ) ) {

			// put the catid into an array
			(array) $include_cats[] = $catid;

			// get all sub cats of catid and put them into the array
			$descendants = get_term_children( (int) $catid, 'class-category' );

			foreach ( $descendants as $key => $value ) {
				$include_cats[] = $value;
			}

			// take catids out of the array and separate with commas
			$include_cats = "'" . implode( "', '", $include_cats ) . "'";

			// add the category filter to show anything within this cat or it's children
			$join .= " INNER JOIN $wpdb->term_relationships AS tr2 ON ($wpdb->posts.ID = tr2.object_id) ";
			$join .= " INNER JOIN $wpdb->term_taxonomy AS tt2 ON (tr2.term_taxonomy_id = tt2.term_taxonomy_id) ";
			$join .= " AND tt2.term_id IN ($include_cats) ";

		}

		$join .= " INNER JOIN $wpdb->postmeta AS m ON ($wpdb->posts.ID = m.post_id) ";
		$join .= " INNER JOIN $wpdb->postmeta AS m2 ON ($wpdb->posts.ID = m2.post_id) ";
		$join .= " INNER JOIN $wpdb->postmeta AS m3 ON ($wpdb->posts.ID = m3.post_id) ";
		$join .= " LEFT JOIN $wpdb->terms AS t ON x.term_id = t.term_id ";

		remove_filter( 'posts_join', 'edupress_custom_search_join' );
	}

	return $join;
}


/**
 * Builds the WHERE part in search queries.
 *
 * @param string $where
 *
 * @return string
 */
function edupress_custom_search_where( $where, &$pass_query ) {
	global $wpdb;

	$old_where = $where; // intercept the old where statement

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type']) && $_GET['post_type']=='class' && $pass_query->is_main_query() ) {

	

		$query = '';

		$var_q = stripslashes( $_GET['s'] );

		if ( $var_q == '' ) {
			$search_terms = array($var_q);
		} else {
			preg_match_all( '/".*?("|$)|((?<=[\\s",+])|^)[^\\s",+]+/', $var_q, $matches );
			$search_terms = array_map( create_function( '$a', 'return trim($a, "\\"\'\\n\\r ");' ), $matches[0] );
		}

		if ( ! isset( $_GET['exact'] ) ) {
			$_GET['exact'] = '';
		}

		$n = ( $_GET['exact'] ) ? '' : '%';

		$searchand = '';
		$search_terms = array_filter($search_terms);
		foreach ( (array) $search_terms as $term ) {
			$term = addslashes_gpc( $term );

			$query .= "{$searchand}(";

				$query .= "($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
				$query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
				$query .= " OR ((t.name LIKE '{$n}{$term}{$n}')) OR ((t.slug LIKE '{$n}{$term}{$n}'))";

							

			$query .= ")";
			$searchand = ' AND ';
		}

		$term = esc_sql( $var_q );
		
		
		
		
	
		

		if ( count( $search_terms ) > 1 && $search_terms[0] != $var_q ) {
				$query .= " OR ($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
				$query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
			
		}
		if (  empty( $search_terms ) ) {
			
			$where = " AND ($wpdb->posts.post_status = 'publish') ";

			// setup the array for post types
			$post_type_array = array();

			// always include the ads post type
			$post_type_array[] = 'class';

			// build the post type filter sql from the array values
			$post_type_filter = "'" . implode( "','", $post_type_array ) . "'";

			// return the post type sql to complete the where clause
			$where .= " AND ($wpdb->posts.post_type IN ($post_type_filter)) ";
			
		}

		if ( ! empty( $query ) ) {

			$where = " AND ({$query}) AND ($wpdb->posts.post_status = 'publish') ";

			// setup the array for post types
			$post_type_array = array();

			// always include the ads post type
			$post_type_array[] = 'class';

			

			// build the post type filter sql from the array values
			$post_type_filter = "'" . implode( "','", $post_type_array ) . "'";

			// return the post type sql to complete the where clause
			$where .= " AND ($wpdb->posts.post_type IN ($post_type_filter)) ";

		}

		remove_filter( 'posts_where', 'edupress_elearning_custom_search_where' );
	}

	return $where;
}

function edupress_custom_search_groupby( $groupby ) {
	global $wpdb;

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type']) && $_GET['post_type']=='class') {
		$groupby = "$wpdb->posts.ID";

		remove_filter( 'posts_groupby', 'edupress_custom_search_groupby' );
	}

	return $groupby;
}
//End for search all

