<?php
if ( !class_exists( 'educationpress_Search_Cat_Filter_Widget' ) ) {
    class educationpress_Search_Cat_Filter_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_search_filter',
                'description' => esc_html__('Filter Course By Course Categories','educationpress')
            );
            parent::__construct( 'educationpress_search_cat_filter', esc_html__('Course Categories Filter','educationpress'), $widget_ops );
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
                
                <ul>
                <li>
                 <?php 
				    if(is_search()  && !empty($_GET['post_type']) && $_GET['post_type']=='course')
					{
						$args1 = array('show_option_none' => esc_html__('Select Category','educationpress'), 'option_none_value'  => '0' , 'orderby' => 'name' , 'name' => 'scat' ,'hide_empty' => 0, 'selected' => get_query_var( 'scat' ),'taxonomy' => 'course_category');
						wp_dropdown_categories( $args1 );
					}else{
						$term = get_queried_object(); 
						$ccat_selected= $term->term_id;
						$args1 = array( 'hide_empty=0' );
						
						$terms = get_terms( 'course_category', $args1 );
						
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {?>
                        <select name="ccat" id="ccat">
                         <option value=""><?php esc_html_e('Select Category','educationpress');?></option>
                        <?php 
						foreach ( $terms as $term ) {?>
            <option value="<?php echo  esc_url( get_term_link( $term ) );?>" <?php if($ccat_selected==$term->term_id){?> selected="selected"<?php }?>><?php echo esc_attr($term->name);?></option>
                        <?php }?>
                        </select>
						
					<?php
                        }
					}
					?>
                </li>
                </ul>
 				
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Categories' ) );

            $title= esc_attr($instance['title']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Category Filter Title', 'educationpress'); ?></label>
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



if( !function_exists( 'educationpress_register_search_cat_filter_widget' ) ) :
    /**
     * Register search cat filter widget
     */
    function educationpress_register_search_cat_filter_widget() {
        register_widget( 'educationpress_Search_Cat_Filter_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_search_cat_filter_widget' );
endif;
