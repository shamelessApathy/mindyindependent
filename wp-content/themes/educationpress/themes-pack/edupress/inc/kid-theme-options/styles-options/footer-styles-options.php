<?php
//Start for remaining section in footer
Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_is_footer_top_banner',
            'type'      => 'switch',
            'title'     => esc_html__( 'Disply Footer Top Banner', 'edupress' ),
			'default'  => true,
			'on'    => esc_html__( 'Yes', 'edupress' ),
            'off'   => esc_html__( 'No', 'edupress' ),
			'section_id' => 'footer-styles',
			'priority' => 1,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_bg',
            'type'      => 'background',
			'output' => array( '.call-to-action' ),
            'title'     => esc_html__( 'Footer Top Banner Background', 'edupress' ),
			'default'  => array( 
								'background-image' => get_template_directory_uri().'/images/call-to-action-bg.jpg',								
								'background-position' => 'left bottom',
								'background-repeat' =>  'repeat-x',
								'background-size' => 'cover', 
								),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 2,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Footer Top Banner Title', 'edupress' ),
			'default'  => esc_html( 'Remaining essentially unchanged.' ),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 3,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_title_color',
            'type'      => 'color',
			'output' => array( '.call-to-action h3' ),
            'title'     => esc_html__( 'Footer Top Banner Title Color', 'edupress' ),
			'default'  => '#ffffff',
    		'validate' => 'color',
			'transparent' => false,
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 4,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_desc',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Footer Top Banner Description', 'edupress' ),
			'default'  => esc_html( 'When an unknown printer took a galley of type and scrambled it to make a type specimen book.' ),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 5,
        )
);


Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_desc_color',
            'type'      => 'color',
			'output' => array( '.call-to-action p' ),
            'title'     => esc_html__( 'Footer Top Banner Description Color', 'edupress' ),
			'default'  => '#ffffff',
    		'validate' => 'color',
			'transparent' => false,
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 6,
        )
);


Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_btn_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Footer Top Banner Button Text', 'edupress' ),
			'default'  => esc_html( 'Know More' ),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 7,
        )
);

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_btn_link',
            'type'      => 'text',
            'title'     => esc_html__( 'Footer Top Banner Button Link open in new window', 'edupress' ),
			'description' => esc_html__( 'If you would not like to show button, please leave Button Url as empty', 'edupress' ),
			'default'  => home_url(),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'validate' => 'url',
			'section_id' => 'footer-styles',
			'priority' => 8,
        )
);



Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
            'id'        => 'edupress_footer_footer_top_banner_btn_newwindow',
            'type'      => 'switch',
            'title'     => esc_html__( 'Footer Top Banner Button Link open in new window', 'edupress' ),
			
			//'desc'     => esc_html__('Yes', 'edupress'),
			'default'  => '0',
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'section_id' => 'footer-styles',
			'priority' => 9,
        )
);
	$output = array( '.call-to-action a.btn-default' );
	$output_hover = array( '.call-to-action a:hover.btn-default' );
	

	//button start
	Redux::setField(
		$opt_name, // This is your opt_name,
		array(
					'id'        => 'edupress_footer_footer_top_banner_button_bg',
					'type'      => 'color',
					'mode'      => 'background-color',
					'section_id' => 'footer-styles',
					'output'    => $output,
					'title'     => esc_html__( 'Footer Top Banner Button Normal Background Color', 'edupress' ),
					'desc'      => 'default: transparent',
					'default'   => 'transparent',
					'transparent' => true,
					'required' => array(
						array( 'edupress_footer_is_footer_top_banner', '=', true),
					),
					'priority' => 10,
				)
		);
		
	Redux::setField(
		$opt_name, // This is your opt_name,		
		array(
			'id'        => 'edupress_footer_footer_top_banner_button_bg_hover',
			'type'      => 'color',
			'section_id' => 'footer-styles',
			'mode'      => 'background-color',
			'output'    => $output_hover,
			'title'     => esc_html__( 'Footer Top Banner Button Hover Background Color', 'edupress' ),
			'desc'      => 'default: transparent',
			'default'   => 'transparent',
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'transparent' => true,
			'priority' => 11,
		)
	);
	
	
	
	Redux::setField(
		$opt_name, // This is your opt_name,
		array(
					'id'        => 'edupress_footer_footer_top_banner_button_color',
					'type'      => 'color',
					'important' => true,
					'section_id' => 'footer-styles',
					'output'    => $output,
					'title'     => esc_html__( 'Footer Top Banner Button Normal Text Color', 'edupress' ),
					'desc'      => 'default: #ffffff',
					'default'   => '#ffffff',
					'transparent' => true,
					'required' => array(
						array( 'edupress_footer_is_footer_top_banner', '=', true),
					),
					'priority' => 12,
				)
		);
		
	Redux::setField(
		$opt_name, // This is your opt_name,		
		array(
			'id'        => 'edupress_footer_footer_top_banner_button_color_hover',
			'type'      => 'color',
			'important' => true,
			'section_id' => 'footer-styles',
			'output'    => $output_hover,
			'title'     => esc_html__( 'Footer Top Banner Button Hover Text Color', 'edupress' ),
			'desc'      => 'default: #03a9f4',
			'default'   => '#03a9f4',
			'transparent' => true,
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'priority' => 13,
		)
	);
	
	
	
	
	Redux::setField(
		$opt_name, // This is your opt_name,
		array(
					'id'        => 'edupress_footer_footer_top_banner_button_border',
					'type'      => 'border',
					'section_id' => 'footer-styles',
					'output'    => $output,
					'title'     => esc_html__( 'Button Normal Border', 'edupress' ),
					'default'   => array( 
										'border-color'  => '#ffffff', 
										'border-style'  => 'solid', 
										'border-width' => '1px',
									),
					'all' => true,
					'required' => array(
						array( 'edupress_footer_is_footer_top_banner', '=', true),
					),
					'priority' => 14,
				)
		);
		
	Redux::setField(
		$opt_name, // This is your opt_name,		
		array(
			'id'        => 'edupress_footer_footer_top_banner_button_border_hover',
			'type'      => 'border',
			'section_id' => 'footer-styles',
			'output'    => $output_hover,
			'title'     => esc_html__( 'Button Hover Border', 'edupress' ),
			//'desc'      => 'default: #ffffff',
			'default'   => array( 
										'border-color'  => '#03a9f4', 
										'border-style'  => 'solid', 
										'border-width' => '1px',
									),
			'required' => array(
				array( 'edupress_footer_is_footer_top_banner', '=', true),
			),
			'all' => true, 
			'priority' => 15,
		)
	);
	//button end



//end for remaining section in footer



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