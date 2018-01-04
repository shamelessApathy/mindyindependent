<?php

add_action( 'coursepress_form_fields', 'wsl_action_wordpress_social_login', 90 );
add_action( 'coursepress_after_all_signup_fields', 'wsl_action_wordpress_social_login',90 );


add_filter( 'wsl_hook_process_login_alter_redirect_to', 'educationpress_wsl_hook_process_login_alter_redirect_to', 100 );

function educationpress_wsl_hook_process_login_alter_redirect_to( $url )
{
	if( !class_exists('CoursePress_Core') )
		return $url;
	
	$cp_student_login_address = cp_student_login_address();
	if( $cp_student_login_address == $url)
	{
		$args = array(
			'post_type' => 'page',
			'fields' => 'ids',
			'nopaging' => true,
			'meta_key' => '_wp_page_template',
			'meta_value' => 'student-dashboard.php'
		);
		$pages = get_posts( $args );
		if( isset( $pages[0] ) )
		{
			$url  = get_page_link( intval( $pages[0] ) );
		}
		else
		{
			$url  = esc_url_raw( CoursePress_Core::get_slug( 'student_dashboard', true ) );		
		}
	}
	
	return $url;
}
