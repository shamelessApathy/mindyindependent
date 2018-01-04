<?php
/*
 * Header Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Theme Mode', 'edupress'),
    'id'    => 'thmemode-section',
	'icon'  => 'el el-wrench',
	'ajax_save' => false,
    'desc'  => esc_html__('This section contains options for theme mode.', 'edupress'),
    'fields'=> array(
		
		array(
			'id'   => 'edupress_theme_mode_info_normal',
		    'type' => 'info',
			'style' => 'normal', 
    		'desc' => '<b>'.esc_html__('If you are selecting Course E-Commerce (first option), Please install and activate woocommerce plugin before demo import.', 'edupress').'</b>',
		
		),
	
		 array(
            'id'       => 'edupress_theme_mode',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Theme Mode', 'edupress' ),
            'subtitle' => esc_html__( 'Select Theme Mode.', 'edupress' ),
			'priority' => 20,
			//'desc'     => esc_html__('If you are selecting Course E-Commerce (first option), Please install and activate woocommerce plugin before demo import.', 'edupress'),
			'options'  => array(
				'ecom'      => array(
					'alt'   => 'EduPress E-Commerce', 
					'img'   => get_template_directory_uri().'/inc/theme-options/images/ecom.jpg'
				),
				'uni'      => array(
					'alt'   => 'EduPress University', 
					'img'   => get_template_directory_uri().'/inc/theme-options/images/uni.jpg'
				),
				'kid'      => array(
					'alt'   => 'EduPress Kindergarten', 
					'img'  => get_template_directory_uri().'/inc/theme-options/images/kid.jpg'
				),
			),
            'default'  => 'uni',
			// 'reload_on_change' => true,
        ),
       

    ) ) );
