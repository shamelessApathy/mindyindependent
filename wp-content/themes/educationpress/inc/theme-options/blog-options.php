<?php
/*
 * Home Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Blog Page', 'educationpress'),
    'id'    => 'blog-section',
	'icon'  => 'el el-blogger',
    'desc'  => esc_html__('This section contains options for Blog listing and detail.', 'educationpress'),
    'fields'=> array(),
    )
);

/*
 * Blog Detail Page sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Blog Detail Page', 'educationpress'),
    'id'    => 'blog-detail-page-section',
    'desc'  => esc_html__('This section contains options related to Blog Detail Page', 'educationpress' ),
    'subsection' => true,
    'fields'=> array(
	 array(
                'id'       => 'educationpress_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts', 'educationpress' ),
				'subtitle' => esc_html__( 'Display realted posts', 'educationpress' ),
                'desc'     => esc_html__('You can enable or disable the realted posts.', 'educationpress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
	 array(
            'id'       => 'educationpress_related_posts_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Title', 'educationpress' ),
            'default'  => esc_html__( 'Related Posts', 'educationpress' ),
			'required' => array( 'educationpress_related_posts', '=', 1 ),
        ),
       
        array(
            'id'       => 'educationpress_related_posts_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Type of Related Posts', 'educationpress' ),
            'desc' => esc_html__( 'Choose the type of related posts to display.', 'educationpress' ),
            'options'  => array(
                'category' => esc_html__('Based on Category', 'educationpress'),
                'tag' => esc_html__('Based on Tag', 'educationpress'),
            ),
            'default'  => 'category',
			'required' => array( 'educationpress_related_posts', '=', 1 ),
        ),
       

    ) ) );