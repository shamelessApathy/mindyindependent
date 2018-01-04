<?php
/*
 * Styles Options
 */
global $opt_name;

Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Styles', 'educationpress' ),
    'icon'  => 'el el-icon-website',
    'desc'  => esc_html__('This section contains styles related options.', 'educationpress'),
    'fields'=> array(),
    )
);

/*
 * Basic Styles Options
 */
require_once ( get_template_directory() . '/inc/theme-options/styles-options/basic-styles-options.php' );

/*
 * Header Styles Options
 */
require_once ( get_template_directory() . '/inc/theme-options/styles-options/header-styles-options.php' );

/*
 * Footer Styles Options
 */
require_once ( get_template_directory() . '/inc/theme-options/styles-options/footer-styles-options.php' );