<?php
/**
 * edupress functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package edupress
 */


//for ACF
//add_action( 'init', 'edupress_ecommerce_setup' );
function edupress_ecommerce_setup() {
	
	if( get_option( 'edupress_ecommerce_is_acf_field', false) )
		return ;
	
	
	if( class_exists('acf') ) {   
		
		 $acf_args = array(
			"post_type"   => 'acf',
			//"post_title"  =>	esc_html( 'Course Information'),
			""  =>	esc_html( 'Course Information'),
			"post_status" =>  'publish' ,
		);
		$acf_posts = get_posts( $acf_args );
		if(  is_array( $acf_posts ) && count( $acf_posts ) == 0) {
			$post_id = 	wp_insert_post(array(
								'post_title' => esc_html( 'Course Information' ),
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
					'key' => 'field_57ef783160e69',
					'label' => 'Duration',
					'name' => 'duration',
					'type' => 'text',
					'instructions' => 'Please enter course duraion. for ex. 5 Days',
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
									array
										(
											'field' => 'null',
											'operator' => '==',
											'value' => '',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '0',
				),
				array
				(
					'key' => 'field_57ef78f260e6a',
					'label' => 'Lectures',
					'name' => 'lectures',
					'type' => 'number',
					'instructions' => 'Enter the number of lectures',
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
									array
										(
											'field' => null,
											'operator' => '==',
											'value' => '',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '1',
				),
				array
				(
					'key' => 'field_57ef797760e6b',
					'label' => 'Certificate of Completion',
					'name' => 'certificate_of_completion',
					'type' => 'true_false',
					'instructions' => '',
					'required' => '0',
					'message' => '',
					'default_value' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									array
										(
											'field' => null,
											'operator' => '==',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '2',
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
														'value' => 'product',
														'order_no' => 0,
														'group_no' => 0,
													)
											);
				
		}
		update_option( 'edupress_ecommerce_is_acf_field' , true);
	 }
	
}



// search suggest
add_action( 'wp_ajax_nopriv_edupress-ecommerce-ajax-tag-search-front', 'edupress_ecommerce_cp_suggest' );
add_action( 'wp_ajax_edupress-ecommerce-ajax-tag-search-front', 'edupress_ecommerce_cp_suggest' );


/**
 * Ajax auto-complete taxonomy search suggest.
 *
 * @return void
 */
function edupress_ecommerce_cp_suggest() {
	global $wpdb;

	$s = $_GET['term']; // is this slashed already?

	if ( isset( $_GET['tax'] ) ) {
		$taxonomy = sanitize_title( $_GET['tax'] );
	} else {
		die( 'no taxonomy' );
	}

	if ( false !== strpos( $s, ',' ) ) {
		$s = explode( ',', $s );
		$s = $s[count( $s ) - 1];
	}
	$s = trim( $s );
	if ( strlen( $s ) < 2 ) {
		die( esc_html__( 'need at least two characters', 'edupress' ) ); // require 2 chars for matching
	}

	$terms = $wpdb->get_col( "
		SELECT t.slug FROM $wpdb->term_taxonomy AS tt INNER JOIN $wpdb->terms AS t ON tt.term_id = t.term_id ".
		"WHERE tt.taxonomy = '$taxonomy' AND tt.count > 0 ".
		"AND t.name LIKE (
			'%$s%'
		)" .
		"LIMIT 50"
	);

	if ( empty( $terms ) ) {
		echo wp_json_encode( $terms );
		die;
	} else {
		$i = 0;
		foreach ( $terms as $term ) {
			$results[ $i ] = get_term_by( 'slug', $term, $taxonomy );
			$i++;
		}
		echo wp_json_encode( $results );
		die;
	}
}


add_filter( 'pre_get_posts', 'edupress_ecommerce_be_archive_query', 50 );
function edupress_ecommerce_be_archive_query( $query ) {
	if(is_admin() && is_search())
		return $query;

	if( $query->is_main_query() && ($query->is_post_type_archive('product')) || $query->is_tax( 'product_cat' )) 
	{	
		if ( !empty( $_GET['free'] ) && empty( $_GET['paid'] ) ) {
			$freecourse =$_GET['free'];
			$meta_query[] = array(
					'key' => '_price',
					'value' => array('', '0'),
					'compare' => 'IN',
				);
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
				$freecourse =$_GET['paid'];
				$meta_query[]  = array(
					'key' => '_price',
					'value' => array('', '0'),
					'compare' => 'NOT IN',
				);
				
		}
		if ( ! empty( $meta_query ) ) 
			{
				$query->set( 'meta_query', $meta_query);
			}
		
	}
	
	
	
	return $query;
}



function edupress_ecommerce_query_vars( $query_vars )
{
	//For instructor full listing page
    $query_vars[] = 'instructor';
	//For serach category sidebar
	$query_vars[] = 'scat';
    return $query_vars;
}

function advanced_search_query($query) {
	
    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['s']) && !empty($_GET['s'])) {
			
            $query->set('tax_query', array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array( $_GET['s'] ) 
			));
			
			/*
			echo "<pre>";
			print_r($query);
			*/
			
        }    
	   return $query;
		
    }
}
//add_action('pre_get_posts', 'advanced_search_query',1000);
remove_filter( 'posts_where', 'search_post_excerpt'  );

if ( ! is_admin() ) {
	add_filter( 'posts_join', 'edupress_ecommerce_custom_search_join',1000, 2);
	add_filter( 'posts_where', 'edupress_ecommerce_custom_search_where',1000, 2 );
	
	add_filter( 'posts_groupby', 'edupress_ecommerce_custom_search_groupby' );
}

function edupress_ecommerce_custom_search_join( $join, &$pass_query ) {
	global $wp_query,$wpdb;
	
	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type']) && $_GET['post_type']=='product' && !empty( $wp_query->query_vars['search_terms'] ) && $pass_query->is_main_query()) {

		$join  = " LEFT JOIN $wpdb->term_relationships AS r ON ($wpdb->posts.ID = r.object_id) ";
		$join .= " LEFT JOIN $wpdb->term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id) ";
		$join .= " AND (x.taxonomy = 'product_cat' OR 1=1) ";
		
		// if an ad category is selected, limit results to that cat only
		$catid = get_query_var( 'scat' );

		if ( ! empty( $catid ) ) {

			// put the catid into an array
			(array) $include_cats[] = $catid;

			// get all sub cats of catid and put them into the array
			$descendants = get_term_children( (int) $catid, 'product_cat' );

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
		/*
		$join .= " INNER JOIN $wpdb->postmeta AS m2 ON ($wpdb->posts.ID = m2.post_id) ";
		$join .= " INNER JOIN $wpdb->postmeta AS m3 ON ($wpdb->posts.ID = m3.post_id) ";
		*/
		$join .= " LEFT JOIN $wpdb->terms AS t ON x.term_id = t.term_id ";

		remove_filter( 'posts_join', 'edupress_ecommerce_custom_search_join' );
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
function edupress_ecommerce_custom_search_where( $where, &$pass_query ) {
	global $wpdb;
	
	remove_filter( 'posts_where', 'search_post_excerpt'  );

	$old_where = $where; // intercept the old where statement

	if ( (is_search() || isset( $_GET['s'] )) 
	&& isset($_GET['post_type']) && $_GET['post_type']=='product' && !empty( $pass_query->query_vars['search_terms'] ) && $pass_query->is_main_query() ) 
	{
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
		
	
		
		if ( !empty( $_GET['free'] ) && empty( $_GET['paid'] ) ) {
					
					$freecourse =$_GET['free'];
					$query .= "{$searchand}(";
					/*
					$query .= "(m.meta_key = 'paid_course')";
					$query .= " AND (m.meta_value LIKE '{$n}{$freecourse}{$n}')";
					*/
					$query .= "(m.meta_key = '_price')";
					$query .= " AND (m.meta_value='' OR m.meta_value=0 )";
					
					$query .= ")";
					$searchand = ' AND ';
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
					$freecourse =$_GET['paid'];
					$query .= "{$searchand}(";
					/*
					$query .= "(m.meta_key = 'paid_course')";
					$query .= " AND (m.meta_value LIKE '{$n}{$freecourse}{$n}')";
					*/

					$query .= "(m.meta_key = '_price')";
					$query .= " AND (m.meta_value > 0)";
					$query .= ")";
					$searchand = ' AND ';
		}
	
	

		if ( count( $search_terms ) > 1 && $search_terms[0] != $var_q ) {
				$query .= " OR ($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
				$query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
			
		}
		if (  empty( $search_terms ) ) {
			
			$where = " AND ($wpdb->posts.post_status = 'publish') ";

			// setup the array for post types
			$post_type_array = array();

			// always include the ads post type
			$post_type_array[] = 'product';

			

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
			$post_type_array[] = 'product';

			

			// build the post type filter sql from the array values
			$post_type_filter = "'" . implode( "','", $post_type_array ) . "'";

			// return the post type sql to complete the where clause
			$where .= " AND ($wpdb->posts.post_type IN ($post_type_filter)) ";

		}

		remove_filter( 'posts_where', 'edupress_ecommerce_custom_search_where' );
	}
	


	return $where;
}

function edupress_ecommerce_custom_search_groupby( $groupby ) {
	global $wpdb;

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type']) && $_GET['post_type']=='product' && is_main_query() ) {
		$groupby = "$wpdb->posts.ID";

		remove_filter( 'posts_groupby', 'edupress_ecommerce_custom_search_groupby' );
	}

	return $groupby;
}