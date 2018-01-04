<?php
/*
 * Dynamic CSS
 */
 
 
 /*
 * Dynamic CSS
 */
$edupress_is_tmpl_dynamic_css = true;
if( is_child_theme() )
{
	$edupress_child_dynamic_file = get_stylesheet_directory() . '/assets/css/dynamic-css.php'; 
	if( file_exists( $edupress_child_dynamic_file ) )
	{
		require_once ( $edupress_child_dynamic_file );
		$edupress_is_tmpl_dynamic_css = false;	
	}
}
if( $edupress_is_tmpl_dynamic_css )
{
	require_once( get_template_directory() . '/assets/css/dynamic-css.php' );
}



if ( !function_exists( 'edupress_generate_favicon' ) ) :
    /**
     * Generate favicon
     */
    function edupress_generate_favicon() {
        if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) {
            global $edupress_options;
            if ( !empty( $edupress_options['edupress_favicon'] ) && !empty( $edupress_options['edupress_favicon']['url'] ) ) {
                ?>
                <!-- favicon -->
                <link rel="shortcut icon" href="<?php echo esc_url( $edupress_options['edupress_favicon']['url'] ); ?>"/>
                <?php
            }
        }
    }
    add_action( 'wp_head', 'edupress_generate_favicon', 5 );
endif;




if ( !function_exists( 'edupress_quick_css' ) ) {
    /**
     * Generate Quick CSS
     */
    function edupress_quick_css(){
        global $edupress_options;
        if ( isset( $edupress_options['edupress_quick_css'] ) ) {
            // Quick CSS from Theme Options
            $quick_css = stripslashes( $edupress_options['edupress_quick_css'] );
            if ( !empty( $quick_css ) ) {
                echo "\n<style type='text/css' id='edupress-quick-css'>\n";
                echo $quick_css . "\n";
                echo "</style>". "\n\n";
            }
        }
		if ( isset( $edupress_options['edupress_quick_js'] ) ) {
            // Quick Javascript from Theme Options
            $quick_js = stripslashes( $edupress_options['edupress_quick_js'] );
            if ( !empty( $quick_js ) ) {
				echo "<script type='text/javascript'>\n";
				echo "//<![CDATA[\n";
				echo $quick_js . "\n";
				echo "//]]>\n";
				echo "</script>";
            }
        }
    }
}
add_action( 'wp_head', 'edupress_quick_css' );