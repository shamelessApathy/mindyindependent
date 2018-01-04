<?php
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

if ( !is_user_logged_in() && in_array( 'google-captcha/google-captcha.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists( 'gglcptch_display' ) )
{
	
	 //add_action( 'woocommerce_login_form', 'educationpress_gglcptch_display', 50 ); 
	 //add_action( 'woocommerce_process_login_errors', 'educationpress_validate_login_captcha', 10, 2 );

	function educationpress_validate_login_captcha( $user, $password ) {
				
		if (  !isset($_POST["g-recaptcha-response"]) || empty( $_POST["g-recaptcha-response"] ) ) 
		{
			return new WP_Error( 'empty_captcha', esc_html_e('Please enter reCAPTCHA value', 'educationpress') );
		}
		else
		{
			  $gglcptch_remote_addr = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP );
				global $gglcptch_options;
				if ( empty( $gglcptch_options ) )
					register_gglcptch_settings();
		
				$publickey	= $gglcptch_options['public_key'];
				$privatekey	= $gglcptch_options['private_key'];

				$resp = gglcptch_get_response( $privatekey, $gglcptch_remote_addr );
				
				if ( !$resp['success'] ) { /* the CAPTCHA answer is right */
						return new WP_Error( 'empty_captcha', esc_html__('Error: You have entered an incorrect reCAPTCHA value', 'educationpress'));
				}
		}
		
		return $user;
	}

}