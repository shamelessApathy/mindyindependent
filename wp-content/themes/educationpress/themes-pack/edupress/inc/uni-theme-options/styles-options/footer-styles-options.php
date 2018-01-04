<?php
Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'       => 'edupress_footer_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Footer Logo', 'edupress' ),
            'subtitle' => esc_html__( 'Upload footer logo image for your Website.', 'edupress' ),
			'section_id' => 'footer-styles',
			'priority' => 1,
        ));
		

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_social_share',
            'type'      => 'switch',
            'title'     => esc_html__( 'Social Share Icons in Footer', 'edupress' ),
			'default'  => true,
			'on'    => esc_html__( 'Yes', 'edupress' ),
            'off'   => esc_html__( 'No', 'edupress' ),
			'section_id' => 'footer-styles',
			'priority' => 81,
			
        ));
		
?>