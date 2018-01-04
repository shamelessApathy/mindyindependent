<?php
/*
 * Home Options
 */
global $opt_name;
Redux::setSection( $opt_name, array(
    'title' => esc_html__('Blog Page', 'edupress'),
    'id'    => 'blog-section',
	'icon'  => 'el el-blogger',
    'desc'  => esc_html__('This section contains options for Blog listing and detail.', 'edupress'),
    'fields'=> array(),
    )
);

/*
 * Blog Detail Page sub section
 */
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Blog Detail Page', 'edupress'),
    'id'    => 'blog-detail-page-section',
    'desc'  => esc_html__('This section contains options related to Blog Detail Page', 'edupress' ),
    'subsection' => true,
    'fields'=> array(
	 array(
                'id'       => 'edupress_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts', 'edupress' ),
				'subtitle' => esc_html__( 'Display realted posts', 'edupress' ),
                'desc'     => esc_html__('You can enable or disable the realted posts.', 'edupress'),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
	 array(
            'id'       => 'edupress_related_posts_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Title', 'edupress' ),
            'default'  => esc_html__( 'Related Posts', 'edupress' ),
			'required' => array( 'edupress_related_posts', '=', 1 ),
        ),
       
        array(
            'id'       => 'edupress_related_posts_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Type of Related Posts', 'edupress' ),
            'desc' => esc_html__( 'Choose the type of related posts to display.', 'edupress' ),
            'options'  => array(
                'category' => esc_html__('Based on Category', 'edupress'),
                'tag' => esc_html__('Based on Tag', 'edupress'),
            ),
            'default'  => 'category',
			'required' => array( 'edupress_related_posts', '=', 1 ),
        ),
       

    ) ) );