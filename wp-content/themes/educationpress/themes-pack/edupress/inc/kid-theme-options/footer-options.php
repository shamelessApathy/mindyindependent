<?php
/*
 * Footer Options
 */
global $opt_name;

Redux::setField(
    $opt_name, // This is your opt_name,	
		array(
						'id'       => 'edupress_footer_column',
						'type'     => 'button_set',
						'section_id' => 'footer-section',
						'title'    => esc_html__( 'Footer Column', 'edupress' ),
						'desc' => esc_html__( 'Choose the Footer Column layout.', 'edupress' ),
						'options'  => array(
							'1' => esc_html__('Column 1', 'edupress'),
							'2' => esc_html__('Column 2', 'edupress'),
							'3' => esc_html__('Column 3', 'edupress'),
						),
						'default'  => '3',
						'priority' => 1,
					)
	);
