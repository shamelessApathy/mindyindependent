<?php
if ( !class_exists( 'edupress_kid_Course_Search_Widget' ) ) {
    class edupress_kid_Course_Search_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_search',
                'description' => esc_html__('Class search form','edupress')
            );
            parent::__construct( 'edupress_kid_course_search_widget', esc_html__('Search Class','edupress'), $widget_ops );
        }


        function widget($args, $instance) {
            extract($args);
            $title = apply_filters( 'widget_title', $instance['title'] );
			$placeholder = apply_filters( 'widget_class_search_placeholder', $instance['placeholder'] );

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
                    <span class="screen-reader-text"><?php  esc_html_e( 'Search for:', 'edupress' ) ?></span>
                    <input type="search" class="search-field" 
                        placeholder="<?php echo esc_html( $placeholder );?>"
                        value="<?php echo get_search_query() ?>" name="s"
                        title="<?php echo esc_html( $placeholder );?>" />
                        <!--
                    <input type="search" title="What do you want to learn today?" name="s" value="" placeholder="What do you want to learn today?" class="search-field">    
                        -->
                        
                         <input type="hidden" value="class" name="post_type"/>
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
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Search Class', 'placeholder' => 'What do you want to learn today?' ) );

            $title= esc_attr($instance['title']);
			$placeholder= esc_attr($instance['placeholder']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Search Form Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                    <label for="<?php echo esc_attr( $this->get_field_id('placeholder') ); ?>"><?php esc_html_e('Placeholder', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('placeholder') ); ?>" name="<?php echo esc_attr( $this->get_field_name('placeholder') ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
                </p>
               
                <?php
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = esc_html($new_instance['title']);
			$instance['placeholder'] = esc_html($new_instance['placeholder']);

            return $instance;

        }

    }
}



if( !function_exists( 'edupress_kid_register_course_search_widget' ) ) :
    /**
     * Register course search widget
     */
    function edupress_kid_register_course_search_widget() {
        register_widget( 'edupress_kid_Course_Search_Widget' );
    }
    add_action( 'widgets_init', 'edupress_kid_register_course_search_widget' );
endif;
