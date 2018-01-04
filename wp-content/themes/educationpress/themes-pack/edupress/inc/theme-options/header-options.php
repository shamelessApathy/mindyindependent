<?php
/*
 * Header Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Header', 'edupress'),
    'id'    => 'header-section',
	'icon'  => 'el el-website-alt',
    'desc'  => esc_html__('This section contains options for header.', 'edupress'),
    'fields'=> array(
	
		 array(
            'id'       => 'edupress_favicon',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Favicon', 'edupress' ),
            'subtitle' => esc_html__( 'Upload your website favicon.', 'edupress' ),
			'priority' => 20,
        ),
        array(
            'id'       => 'edupress_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Logo', 'edupress' ),
            'subtitle' => esc_html__( 'Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'edupress' ),
			'priority' => 40,
        ),		
        array(
            'id'        => 'edupress_page_loader',
            'type'      => 'switch',
            'title'     => esc_html__('Page Loader', 'edupress'),
            'desc'     => esc_html__('You can enable or disable page loader.', 'edupress'),
            'default'   => 1,
            'on'        => esc_html__('Enable','edupress'),
            'off'       => esc_html__('Disable','edupress'),
			'priority' => 60,
        ),
        array(
            'id'       => 'edupress_page_loader_gif',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Page Loader Gif', 'edupress' ),
            'desc'     => esc_html__( 'You can upload your page loader gif here or default one will be displayed.', 'edupress' ),
            'required' => array( 'edupress_page_loader', '=', 1 ),
			'priority' => 80,
        ),
		array(
            'id'        => 'edupress_scroll_top_btn',
            'type'      => 'switch',
            'title'     => esc_html__('Scroll Top Button', 'edupress'),
            'desc'     => esc_html__('You can enable or disable scroll top button.', 'edupress'),
            'default'   => false,
            'on'        => esc_html__('Enable','edupress'),
            'off'       => esc_html__('Disable','edupress'),
			'priority' => 120,
        ),
        array(
            'id'        => 'edupress_quick_js',
            'type'      => 'ace_editor',
            'title'     => esc_html__('Quick JavaScript', 'edupress'),
            'desc'  => esc_html__('You can paste your JavaScript code here without script tag just only code.', 'edupress'),
            'mode'      => 'javascript',
            'theme'     => 'chrome',
			'priority' => 160,
        ),
		

    ) ) );
