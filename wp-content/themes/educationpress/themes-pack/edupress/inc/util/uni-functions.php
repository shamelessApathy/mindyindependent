<?php
//for ACF
//add_action( 'init', 'edupress_university_setup' );
function edupress_university_setup() {
	
	if( get_option( 'edupress_university_is_acf_field', false) )
		return ;
	
	
	if( class_exists('acf') && post_type_exists( 'course' ) ) {   
		
		 $acf_args = array(
			"post_type"   => 'acf',
			//"post_title"  =>	esc_html( 'University Course Information' ),
			"s"  =>	esc_html( 'University Course Information' ),
			"post_status" =>  esc_html( 'publish' ) ,
		);
		$acf_posts = get_posts( $acf_args );
		if(  is_array( $acf_posts ) && count( $acf_posts ) == 0) {
			$post_id = 	wp_insert_post(array(
								'post_title' => 'University Course Information',
								//'post_name' => 'acf_course-information',
								'post_content'  => '',
								'post_type' => 'acf',
								'post_status'	=> 'publish',
								
								'comment_status' => 'closed',
								'ping_status' => 'closed',
								'menu_order' => 0,
							));
							
		
			$fields = array (
				array (
					'key' => 'field_57e51c13006c8',
					'label' => 'Course ID',
					'name' => 'course_id',
					'type' => 'text',
					'instructions' => '',
					'required' => '0',
					'default_value' => '',
					'placeholder' => 'Course ID',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => 0,
							'rules' => array
								(
									array
										(
											'field' => null,
											'operator' => '==',
											'value' => '',
										)
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 0,
				),
				array
				(
					'key' => 'field_57e51c8e35822',
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
							'status' => 0,
							'rules' => array
								(
										array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'Yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 2,
				),
				array
				(
					'key' => 'field_57e51cc199932',
					'label' => 'Lectures',
					'name' => 'lectures',
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
									array
										(
											'field' => null,
											'operator' => '==',
											'value' => '',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 5,
				),
				array
				(
					'key' => 'field_57e51ce499933',
					'label' => 'Certificate of Completion',
					'name' => 'certificate_of_completion',
					'type' => 'checkbox',
					'instructions' => '',
					'required' => '0',
					'choices' => array
						(
							'Yes' => 'Yes',
						),
				
					'default_value' => '',
					'layout' => 'vertical',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									array
										(
											'field' => 'field_57e51d1c99934',
											'operator' => '==',
											'value' => 'Internal',
										),
				
								),
				
							'allorany' => 'all',
						),
									
					'order_no' => 6,
				),
				array
				(
					'key' => 'field_57e51d1c99934',
					'label' => 'Course Type',
					'name' => 'course_type',
					'type' => 'select',
					'instructions' => '',
					'required' => '0',
					'choices' => array
						(
							'Internal' => 'Internal',
							'External' => 'External',
							'Part Time' => 'Part Time',
						),
				
					'default_value' => '',
					'allow_null' => '0',
					'multiple' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '7',
				),
				
				
				array
				(
					'key' => 'field_57e51dc099935',
					'label' => 'Skill Level',
					'name' => 'skill_level',
					'type' => 'select',
					'instructions' => '',
					'required' => '0',
					'choices' => array
						(
							'All Level' => 'All Level',
							'Beginner' => 'Beginner',
							'Expert' => 'Expert',
						),
				
					'default_value' => '',
					'allow_null' => '0',
					'multiple' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),				
					'order_no' => '8',
				),
				
				array
				(
					'key' => 'field_57e51e6199936',
					'label' => 'Language',
					'name' => 'language',
					'type' => 'select',
					'instructions' => '',
					'required' => '0',
					'choices' =>array
						(
							'English' => 'English',
							'German' => 'German',
							'Spanish' => 'Spanish',
						),
				
					'default_value' => '',
					'allow_null' => '0',
					'multiple' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
						
						
					'order_no' => '9',
				),
				array
				(
					'key' => 'field_57e51ec099937',
					'label' => 'Assessments',
					'name' => 'assessments',
					'type' => 'text',
					'instructions' => '',
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
									array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 10,
				), 
				array
				(
					'key' => 'field_57e51ed699938',
					'label' => 'Room Number',
					'name' => 'room_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => 0,
							'rules' => array
								(
									array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 11
,				),
				array
				(
					'key' => 'field_57e51ee499939',
					'label' => 'Time',
					'name' => 'time',
					'type' => 'text',
					'instructions' => '',
					'required' => '0',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'conditional_logic' => array
						(
							'status' => 0,
							'rules' => array
								(
									array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
					'order_no' => 4,
				),
				array
				(
					'key' => 'field_57e51f209993a',
					'label' => 'Study Level',
					'name' => 'study_level',
					'type' => 'select',
					'instructions' => '',
					'required' => '0',
					'choices' => array
						(
							'CPD' => 'CPD',
							'Post Graduate' => 'Post Graduate',
							'Under Graduate' => 'Under Graduate',
						),
				
					'default_value' => '',
					'allow_null' => 0,
					'multiple' => 0,
					'conditional_logic' => array
						(
							'status' => 0,
							'rules' => array
								(
									 array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'Yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => 12,
				),
				array
				(
					'key' => 'field_57e51f689993b',
					'label' => 'Campus',
					'name' => 'campus',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'post_type' => array
						(
							'campus',
						),
				
					'taxonomy' => array
						(
							 'all',
						),
				
					'allow_null' => '0',
					'multiple' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '13',
				),
				array
				(
					'key' => 'field_57e525adc8f36',
					'label' => 'Duration',
					'name' => 'duration',
					'type' => 'select',
					'instructions' => '',
					'required' => '0',
					'choices' => array
						(
							'1 Year' => '1 Year',
							'2 Years' => '2 Years',
							'3 Years' => '3 Years',
						),
				
					'default_value' => '',
					'allow_null' => '0',
					'multiple' => '0',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									'0' => array
										(
											'field' => 'field_57e51ce499933',
											'operator' => '==',
											'value' => 'Yes',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '3',
				),
				array
				(
					'key' => 'field_57e60eda6f487',
					'label' => 'Start Date',
					'name' => 'start_date',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => '0',
					'date_format' => 'yymmdd',
					'display_format' => 'dd/mm/yy',
					'first_day' => '1',
					'conditional_logic' => array
						(
							'status' => '0',
							'rules' => array
								(
									array
										(
											'field' => 'field_57e525adc8f36',
											'operator' => '==',
											'value' => '1 Year',
										),
				
								),
				
							'allorany' => 'all',
						),
				
					'order_no' => '1',
				),
				
				
				
			);
				
			foreach( $fields as $field ) {
				update_post_meta($post_id, $field['key'], $field);	
			}
			
			update_post_meta($post_id, 'position' , 'normal');
			update_post_meta($post_id, 'layout' , 'default');
			update_post_meta($post_id, 'hide_on_screen' , '');
			
			
			update_post_meta($post_id, 'rule' , array (
													'param' => 'post_type',
													'operator' => '==',
													'value' => 'course',
													'order_no' => 0,
													'group_no' => 0,
												)
											);
				
		}
		update_option( 'edupress_university_is_acf_field' , true);
	 }
	
}




add_filter( 'edupress_newsletter_fileds', 'edupress_university_remove_desc_field' );
function edupress_university_remove_desc_field( $fields ) {
	foreach( $fields as $key=>$field) {
		if( $field['id'] == 'edupress_newsletter_desc' )
			unset( $fields[$key] );
	}
	return array_values( $fields );
}

//for default theme option
add_filter( 'edupress_button_bg_desc' , 'edupress_university_button_bg_desc');
function edupress_university_button_bg_desc() {
	return 'default: #4caf50';
}

add_filter( 'edupress_button_bg_default' , 'edupress_university_button_bg_default');
function edupress_university_button_bg_default() {
	return '#4caf50';
}



add_action( 'wp_ajax_nopriv_course_listing', 'edupress_university_course_listing');
add_action( 'wp_ajax_course_listing',  'edupress_university_course_listing' );
function edupress_university_course_listing() {
	
	// storing  request (ie, get/post) global array to a variable  
	$requestData = $_REQUEST;
	
	$order = $requestData[ 'columns' ][ $requestData['order'][0]['column'] ]['name'];
	$order_by = $requestData['order'][0]['dir'];
	
	$start = $requestData['start'];
	$per_page = $requestData['length'];
	$search =  '';
	if( !empty( $requestData['search']['value'] ) ) {
		$search = $requestData['search']['value'];
	}
	elseif( !empty(  $requestData['req_search']  ) ) {
		$search = $requestData['req_search'];
	}


	$args = array(
		'post_type' => 'course',
		'post_status' => 'publish',
		'posts_per_page' => intval( $per_page ),
		'offset'           => intval( $start ),
	);
	
	
	if( !empty(  $requestData['req_instructor']  ) )
	{

		$display_name = urldecode( $requestData['req_instructor']);  

		$args_user= array(
		  'search' => $display_name, // or login or nicename in this example
		  'search_fields' => array('display_name')
		);
		
		$users =  get_users( $args_user ) ; 
		$user =  ( isset( $users[0] ) ? $users[0] : false );
		
		
		$author_id = ( $user ? $user->ID : false );		 
	
		$args['meta_query'] = array 
			(array(
			
				'key'     => 'edupress_university_course_instructors',
				'value'   => '[[:<:]]'.$author_id.'[[:>:]]',
				
				'compare'   => 'REGEXP',
				
			)
		);
		
	}
	
	
	
	
	if( !empty(  $requestData['req_cat']  ) )
	{
		if( term_exists( intval( $requestData['req_cat'] ), 'course-category' ) ) {
			$term_obj = get_term( intval( $requestData['req_cat'] ), 'course-category', OBJECT );
			
			$args['course-category'] = $term_obj->slug;
			/*$args['tax_query'][] = array(
				'taxonomy' => 'genre',
				'field' => 'slug',
				'terms' => 'jazz'
			);
			*/
		}
	}
	
	if( !empty( $search ) )
		$args['s'] = $search;
	
	
	
	if( $order == 'course_start_date') {
		$args['meta_key']= 'start_date';
		$args['orderby']= 'meta_value_num';
		
	}
	elseif( $order == 'course_created_date') {
		$args['orderby'] = 'date';
	}
	elseif( $order == 'title') {
		$args['orderby'] = 'title';
	}
	
	
	$args['order']= $order_by;
	
	
	
	
	
	$resp = array();
	$resp[ 'data' ] = array();
	$the_query = new WP_Query( $args );
	
	
	
	$resp['draw' ] = intval( $requestData['draw'] );
	$resp['recordsFiltered'] = $the_query->found_posts; 
	if( !empty( $search ) )
	{
		$resp['recordsTotal'] = wp_count_posts('course')->publish ;
	}
	else
		$resp['recordsTotal'] = $the_query->found_posts; 

	if ( $the_query->have_posts() ) : 	
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			$temp_array = array();
			
			$temp_array['title'] = '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
			$temp_course_cat = get_the_term_list( get_the_ID(), 'course-category', '', ', ');
			if( $temp_course_cat )
				$temp_array['course_cat'] = $temp_course_cat;
			else
				$temp_array['course_cat'] = esc_html__('N/A', 'edupress');
			 
			if( get_field( 'start_date') ) {
					$temp_array['course_start_date'] = date( 
													get_option( 'date_format' ) , 
													strtotime( get_field( 'start_date') )
												 ); 
			}
			else
			{
				$temp_array['course_start_date'] = esc_html__('N/A', 'edupress');
			}
			if( get_field( 'duration') ) {
				$temp_array['course_length'] =  get_field( 'duration'); 
			}
			else
			{
				$temp_array['course_length'] = esc_html__('N/A', 'edupress');
			}
			
			$temp_array['course_created_date']  = get_the_date(  get_option( 'date_format' )  ); 
			
			//echo 'hii'.rwmb_meta( 'EDU_PRESS_start_date' );
			//die;
			/*
			$temp_array[] = get_the_title();
			$temp_array[] = 'Full time'; 
			$temp_array[] = '18 SEP 2014'; 
			$temp_array[] = '2 Weeks'; 
			*/
			
			$resp[ 'data' ][] = $temp_array;
		endwhile; 
		wp_reset_postdata(); 
	endif; 	
	
	
	echo json_encode( $resp );
	wp_die();
}




function edupress_university_portfolio_page_template( $template ) {

	if ( is_post_type_archive( 'course' ) || is_tax( 'course-category' )  ) {
		$new_template = locate_template( array( 'uni-page-templates/tpl-courses.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}
	elseif ( is_post_type_archive( 'campus' )  ) {
		$new_template = locate_template( array( 'uni-page-templates/tpl-campus.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}
add_filter( 'template_include', 'edupress_university_portfolio_page_template', 99 );

// search suggest
add_action( 'wp_ajax_nopriv_edupress-university-ajax-tag-search-front', 'edupress_university_cp_suggest' );
add_action( 'wp_ajax_edupress-university-ajax-tag-search-front', 'edupress_university_cp_suggest' );


/**
 * Ajax auto-complete taxonomy search suggest.
 *
 * @return void
 */
function edupress_university_cp_suggest() {
	global $wpdb;
	
	$s = $_GET['term']; // is this slashed already?

	
	$taxonomy = sanitize_title( 'course-category' );
	
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




//Admin functions start
//for metabox in course
/**
 * Register meta box(es).
 */
function edupress_university_register_custom_meta_boxes() {
	add_meta_box( 'meta-box-id', __( 'Instructors', 'edupress' ), 'edupress_university_instructors_callback', 'course' , 'side', 'default'  );
}
add_action( 'add_meta_boxes', 'edupress_university_register_custom_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function edupress_university_instructors_callback( $post ) {
	$query = new WP_User_Query( array(
			'orderby' => 'display_name',
			'order'   => 'asc',
			'role'    => '',
			'fields'  => 'all',
		));

		$user_array =  $query->get_results();
		$selected_instructors = get_post_meta( $post->ID, 'edupress_university_course_instructors', true );
		$selected_instructors = (array) explode(',', $selected_instructors);
		
?>
 <p>
	<label for="meta-text" class="prfx-row-title"><?php _e( 'Instructors', 'edupress' )?></label>
	<br/>
	<select multiple="multiple" size="5"  id="edupress_university_course_instructors" name="edupress_university_course_instructors[]" class="select-2">
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
function edupress_university_save_meta_box( $post_id, $post, $update) {
	// Save logic goes here. Don't forget to include nonce checks!
	$post_type = get_post_type($post_id);

	// If this isn't a 'book' post, don't update it.
	if ( "course" != $post_type ) return;

	$post_meta_value = '';

	if( !empty($_POST['edupress_university_course_instructors']) )
	{
		if(is_array($_POST['edupress_university_course_instructors'])) {
			$instructors_input_array = $_POST['edupress_university_course_instructors'];
			$instructors_input_array = array_filter( $instructors_input_array );
			array_map( 'absint', $instructors_input_array ); 	
			$post_meta_value = implode(',', $_POST['edupress_university_course_instructors'] );
		}
		else {
			$post_meta_value = absint( $_POST['edupress_university_course_instructors'] );
		}
	}
	


	update_post_meta($post_id, 'edupress_university_course_instructors', $post_meta_value);


	
}
add_action( 'save_post', 'edupress_university_save_meta_box', 10 , 3);
		/*
		<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
*/


/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function wpdocs_enqueue_custom_admin_style( $hook ) {
	if ( ($hook !== 'post-new.php' && $hook !== 'post.php')  ) 
 		return;

	global $post;		
	if(isset($post->post_type) && 'course' !== $post->post_type)
		return;

	 wp_enqueue_style( 'edupress-university-select-advanced', get_stylesheet_directory_uri() . '/assets/css/select-advanced.css' );
	 
	wp_register_script( 'rwmb-select2', get_stylesheet_directory_uri() . '/assets/js/select2.min.js', array( 'jquery' ), '4.0.2', true );
	wp_enqueue_script( 'rwmb-select2');
	 wp_add_inline_script( 'rwmb-select2', "jQuery( document ).ready(function() { jQuery('.select-2').select2();; })");
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );
//Admin functions end


//For cart in menu start
add_filter('wp_nav_menu_items','edupress_university_woo_cart', 10, 2);
function edupress_university_woo_cart($menu, $args) {
		
		

		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
			return $menu;
			
			
			
			if($args->theme_location=='primary' || $args->theme_location=='visiter')
			{
				
				global $woocommerce;
				
				$cart_url = $woocommerce->cart->get_cart_url();
				$total_cour = $woocommerce->cart->cart_contents_count;
				
				$viewing_cart = esc_html__('View your cart', 'edupress');
				
				ob_start();
				$menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $cart_url .'" title="'. $viewing_cart .'">';
	
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
