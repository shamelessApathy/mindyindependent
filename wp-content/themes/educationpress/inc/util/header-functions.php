<?php
/*
 * Dynamic css
 */
$educationpress_is_tmpl_dynamic_css = true;
if( is_child_theme() )
{
	$educationpress_child_dynamic_file = get_stylesheet_directory() . '/assets/css/dynamic-css.php'; 
	if( file_exists( $educationpress_child_dynamic_file ) )
	{
		require_once ( $educationpress_child_dynamic_file );
		$educationpress_is_tmpl_dynamic_css = false;	
	}
}
if( $educationpress_is_tmpl_dynamic_css )
{
	
	require_once( get_template_directory() . '/assets/css/dynamic-css.php' );
}




if ( !function_exists( 'educationpress_generate_favicon' ) ) :
    /**
     * Generate favicon
     */
    function educationpress_generate_favicon() {
        if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) {
            global $educationpress_options;
            if ( !empty( $educationpress_options['educationpress_favicon'] ) && !empty( $educationpress_options['educationpress_favicon']['url'] ) ) {
                ?>
                <!-- favicon -->
                <link rel="shortcut icon" href="<?php echo esc_url( $educationpress_options['educationpress_favicon']['url'] ); ?>"/>
                <?php
            }
        }
    }
    add_action( 'wp_head', 'educationpress_generate_favicon', 5 );
endif;




if ( !function_exists( 'educationpress_quick_css' ) ) {
    /**
     * Generate Quick CSS
     */
    function educationpress_quick_css(){
        global $educationpress_options;
        if ( isset( $educationpress_options['educationpress_quick_css'] ) ) {
            // Quick CSS from Theme Options
            $quick_css = stripslashes( $educationpress_options['educationpress_quick_css'] );
            if ( !empty( $quick_css ) ) {
                echo "\n<style type='text/css' id='educationpress-quick-css'>\n";
                echo $quick_css . "\n";
                echo "</style>". "\n\n";
            }
        }
		if ( isset( $educationpress_options['educationpress_quick_js'] ) ) {
            // Quick Javascript from Theme Options
            $quick_js = stripslashes( $educationpress_options['educationpress_quick_js'] );
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
add_action( 'wp_head', 'educationpress_quick_css' );