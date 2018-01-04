<?php
/*
Widget Name: Home Two Contact 
Description: Contact for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Contact_Widget' ) ):

class Edupress_Kid_Home_Two_Contact_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-kid-home-two-contact',

        esc_html__('Home Two Contact', 'edupress'),


        array(
            'description' => esc_html__('Home Two Contact', 'edupress'),
			'panels_groups' => array('edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		false,

        plugin_dir_path(__FILE__)
    );
	}
	
	function get_widget_form() {
		return array(
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'edupress'),
				'default' => esc_html('Contact Us'),
			),
			'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),		
					'default' => esc_html('Our preschool program has four dedicated classes'),			
				),
            
			
			'adr_title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Address Title', 'edupress' ),
						'default' => esc_html('Postal Address'),
					),
					
			'adr_desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Address Description', 'edupress' ),
						'default' => '<p>EduPress <br>101 Some Big Name Ave<br> Gujarat, IN 360001</p>',
					),
					
			'phone_email_title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Phone & Email Title', 'edupress' ),
						'default' => esc_html('Phone &amp; E-mail'),
					),
			'phone_email_desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Phone & Email Description', 'edupress' ),
						'default' => '<p>Phone:123-456-7890 <br>
							Email: <a href="#">edupress@mail.com</a></p>',
					),
					
					
			'office_hours_title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Office Hours Title', 'edupress' ),
						'default' => esc_html('Office Hours'),
					),
			'office_hours_email_desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Office Hours Description', 'edupress' ),
						'default' => '<p>Monday - Friday <br>
                            8.00 Am - 5.00 Pm <br>
                            Weekend Closed</p>',
					),
			
			'contact_short_code' => array(
						'type' => 'text',
						'label' => esc_html__( 'Contact Form Short Code', 'edupress' ),
						'default' => '',
						'description' => esc_html__('Please put here contact form 7 short code', 'edupress'), 
					),
			
			
			
        );	
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],		
			'desc' => $instance['desc'],
			
			'adr_title' => $instance['adr_title'],
			'adr_desc' => $instance['adr_desc'],
					
			'phone_email_title' => $instance['phone_email_title'],
			'phone_email_desc' => $instance['phone_email_desc'],
					
			'office_hours_title' => $instance['office_hours_title'],
			'office_hours_email_desc' => $instance['office_hours_email_desc'],
			
			'contact_short_code' => $instance['contact_short_code'],
			
			
			
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('edupress-kid-home-two-contact', __FILE__, 'Edupress_Kid_Home_Two_Contact_Widget');
endif;

?>