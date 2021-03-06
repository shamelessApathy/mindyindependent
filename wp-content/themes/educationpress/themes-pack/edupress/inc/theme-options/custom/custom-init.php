<?php
 function edupress_overload_IconFont_path($field) {
     return get_template_directory().'/inc/theme-options/custom/elusive-icons.php';;
}
function edupress_reduxnewIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    //wp_deregister_style( 'redux-elusive-icon' );
    //wp_deregister_style( 'redux-elusive-icon-ie7' );
    wp_register_style(
        'font-awesome',
        get_template_directory_uri() . '/assets/css/font-awesome.min.css',
        array(),
        time(),
        'all'
    ); 
	
	 wp_register_style(
        'linearicons',
        get_template_directory_uri() . '/assets/css/linearicons.min.css',
        array(),
        time(),
        'all'
    ); 
    wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'linearicons' );
}
add_action( 'redux/page/edupress_options/enqueue', 'edupress_reduxnewIconFont',11,1 );
add_filter( "redux/edupress_options/field/font/icons/file", "edupress_overload_IconFont_path",11,1 );
?>