<?php
if ( !class_exists( 'edupress_university_Footer_Contact_Widget' ) ) {
    class edupress_university_Footer_Contact_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_footer_contact',
                'description' => esc_html__('Displays Contact details in footer.','edupress')
            );
            parent::__construct( 'edupress_university_Footer_Contact_Widget', esc_html__('Footer Contact','edupress'), $widget_ops );
        }


        function widget($args, $instance) {
			global $post;
			extract($args);
			extract( $instance );
			

            $title = apply_filters( 'widget_title', $instance['title'] );
		

            echo $before_widget;
			?>
				 <aside class="widget contact-widget" id="">
					<p><i class="fa fa-map-marker"></i>
					<span>
					<?php
					if($title):
						echo esc_html( $title );
					endif;
					?>
					<br>
					<?php echo esc_html( $address );?>
					</span></p>
					<p class="mobile"><i class="fa fa-mobile"></i> <span><?php echo esc_html( $phone );?></span></p>
					<p class="email"><i class="fa fa-envelope-o"></i> <span><?php echo esc_html( $email );?></span></p>
				</aside>
				
            <?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, 
				array( 'title' => 'EduPress University', 
					'address' => '51, some street Name, Ahmedabad - 380001 Gujarat, India.' , 
			 		'phone' => '+731 234 5678', 
					'email' => 'info@themecycle.com' ) );

            $title= esc_html($instance['title']);
            $address =  esc_textarea( $instance['address'] );
			$phone =  esc_attr( $instance['phone'] );
			$email =  esc_attr(  $instance['email'] );


                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />               </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('address') ); ?>"><?php esc_html_e('Address', 'edupress'); ?></label>
                    <br/>
                   <textarea id="<?php echo esc_attr( $this->get_field_id('address') ); ?>" name="<?php echo esc_attr( $this->get_field_name('address') ); ?>"><?php echo esc_html( $address ); ?></textarea>
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('phone') ); ?>"><?php esc_html_e('Phone', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone') ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />               </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('email') ); ?>"><?php esc_html_e('Email', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email') ); ?>" name="<?php echo esc_attr( $this->get_field_name('email') ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />               </p>
                <?php
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
			
            $instance['title'] = esc_html($new_instance['title']);
			$instance['address'] = esc_html( esc_textarea( $new_instance['address'] ) );
			$instance['phone'] = esc_html($new_instance['phone']);
			$instance['email'] = esc_html($new_instance['email']);

            return $instance;

        }

    }
}



if( !function_exists( 'edupress_university_register_footer_contact_widget' ) ) :
    /**
     * Register footer contact widget
     */
    function edupress_university_register_footer_contact_widget() {
        register_widget( 'edupress_university_Footer_Contact_Widget' );
    }
    add_action( 'widgets_init', 'edupress_university_register_footer_contact_widget' );
endif;
