<?php
if ( !class_exists( 'edupress_university_Our_Instructors_Widget' ) ) {
    class edupress_university_Our_Instructors_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'teacher-widget',
                'description' => esc_html__('Displays Instructors','edupress')
            );
            parent::__construct( 'our-instructors-widget', esc_html__('Our Instructors','edupress'), $widget_ops );
        }


        function widget($args, $instance) {
            extract($args);
            $title = apply_filters( 'widget_title', $instance['title'] );

            if ( empty($title) ) $title = false;


            echo $before_widget;

            if($title):
                echo $before_title;
                echo esc_html( $title );
                echo $after_title;
            endif;
			
			$user_fields = array( 'ID','display_name');
			$number = !empty( $count ) ? intval( $count ): 3;
			if ( is_multisite() ) 
			{
				$args1 = array (
					'blog_id'         => get_current_blog_id(),
					'number'         => $number,
					'fields'         => $user_fields,
				);
			}else{
				$args1 = array (
					'number'         => $number,
					'fields'         => $user_fields,
				);
			}
			
			if( $instance[ 'sort_by' ] == 'recent' )
			{
				$args1[ 'orderby ' ] = 'user_registered';
				$args1[ 'order ' ] = 'DESC';
			}
			elseif( $instance[ 'sort_by' ] == 'title' )
			{
				$args1[ 'orderby ' ] = 'display_name';
				$args1[ 'order ' ] = 'ASC';
			}
			
			$author_ids = edupress_university_get_instructors_id_of_course();
			
			$args1[ 'include' ] = $author_ids;
			
			
			// The User Query
			$user_query = new WP_User_Query( $args1 );
			$total_authors = $user_query->get_total();
			$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
                ?> 
                
                <ul>
                	<?php
				   $counter = 0;
				   foreach ( $user_query->results as $user ) 
				   {
					   $counter++;
					
					 $job_title = get_the_author_meta( 'job_title',$user->ID);
					 $autho_description = strip_tags( get_the_author_meta( 'description',$user->ID  ));
					 $limit = 14;
					 $autho_description = explode(' ', $autho_description, $limit);
					  if (count($autho_description)>=$limit) {
						array_pop($autho_description);
						$autho_description = implode(" ",$autho_description).'...';
					  } else {
						$autho_description = implode(" ",$autho_description);
					  }	
					  $autho_description = preg_replace('`[[^]]*]`','',$autho_description);
					 ?>
					<li> 
                        <a href="<?php echo esc_url(home_url('/'.$edupress_university_instructor_slug.'/'.$user->display_name)); ?>"><?php echo get_avatar( $user->ID, 95);?></a>
                        <div class="simi-co">
                          <p class="title"><a href="<?php echo esc_url(home_url('/'.$edupress_university_instructor_slug.'/'.$user->display_name)); ?>"><?php echo esc_html($user->display_name);?></a></p>
                          <p class="meta"><?php echo  $job_title;?></p>
                          <p><?php echo wp_kses_post($autho_description);?></p>
                        </div>
                	</li>
                   	<?php
				   }
				   ?>
                </ul>
 				
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Our Instructors', 'count' => 3 , 'sort_by' => 'recent' ) );

            $title= esc_attr($instance['title']);
            $count =  $instance['count'];
            $sort_by = $instance['sort_by'];
			
                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('count') ); ?>"><?php esc_html_e('Number of Courses', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>"><?php esc_html_e('Sort By:', 'edupress') ?></label>
                    <select name="<?php echo esc_attr( $this->get_field_name('sort_by') ); ?>" id="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>" class="widefat">
                            <option value="recent"<?php selected( $sort_by, 'recent' ); ?>><?php esc_html_e('Most Recent', 'edupress'); ?></option>
                            <option value="title"<?php selected( $sort_by, 'title' ); ?>><?php esc_html_e('Order By Title', 'edupress'); ?></option>
                    </select>
                </p>
                <?php
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = esc_html($new_instance['title']);
			$instance['sort_by'] = esc_html($new_instance['sort_by']);
			$instance['count'] = intval($new_instance['count']);

			

            return $instance;

        }

    }
}



if( !function_exists( 'edupress_university_register_our_instructors_widget' ) ) :
    /**
     * Register search cat filter widget
     */
    function edupress_university_register_our_instructors_widget() {
	    register_widget( 'edupress_university_Our_Instructors_Widget' );
    }
    add_action( 'widgets_init', 'edupress_university_register_our_instructors_widget' );
endif;
