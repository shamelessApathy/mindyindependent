<?php
if ( !class_exists( 'educationpress_Course_Search_Widget' ) ) {
    class educationpress_Course_Search_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_search',
                'description' => esc_html__('Course search form','educationpress')
            );
            parent::__construct( 'educationpress_course_search_widget', esc_html__('Search Course','educationpress'), $widget_ops );
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
                ?> 
                
            <form role="search" method="get" class="search-form search-course" action="<?php echo esc_url(home_url( '/' )); ?>">
                <label>
                    <span class="screen-reader-text"><?php  esc_html_e( 'Search for:', 'educationpress' ) ?></span>
                    <input type="search" class="search-field" 
                        placeholder="<?php esc_html_e( 'Search Course', 'educationpress' ) ?>"
                        value="<?php echo get_search_query() ?>" name="s"
                        title="<?php esc_html_e( 'Search for:', 'educationpress' ) ?>" />
                         <input type="hidden" value="course" name="post-type" id="post_type" />
                </label>
              
               
                <button class="btn btn-orange btn-medium course-submit" type="submit">
                <i class="lnr lnr-magnifier"></i>
                 </button>
            </form>
                
              
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Search Course' ) );

            $title= esc_attr($instance['title']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Search Form Title', 'educationpress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
               
                <?php
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = esc_html($new_instance['title']);

            return $instance;

        }

    }
}



if( !function_exists( 'educationpress_register_course_search_widget' ) ) :
    /**
     * Register course search widget
     */
    function educationpress_register_course_search_widget() {
        register_widget( 'educationpress_Course_Search_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_course_search_widget' );
endif;
