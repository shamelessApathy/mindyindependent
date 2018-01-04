<?php
if ( !class_exists( 'edupress_kid_Search_Cat_List_Widget' ) ) {
    class edupress_kid_Search_Cat_List_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'cp_course_categories',
                'description' => esc_html__('Class Categories List with links','edupress')
            );
            parent::__construct( 'edupress_kid_cat_list', esc_html__('Class Categories List','edupress'), $widget_ops );
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
                
      
                 <?php 
					$args1 = array( 'hide_empty=0' );
					$terms = get_terms( 'class-category', $args1 );
					
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {?>
					<ul>
					 
					<?php 
					foreach ( $terms as $term ) {?>
						<li>
							<a href="<?php echo get_term_link($term->term_id, 'class-category');?>"
							title="<?php echo esc_attr($term->name);?>">
								<?php echo esc_html($term->name);?>
							</a>
                            <?php echo esc_html__('(', 'edupress').$term->count.esc_html__(')', 'edupress') ?>
						 </li>
					<?php }?>
					</ul>
					
				<?php
					
				}
				?>
               
 				
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Categories' ) );

            $title= esc_attr($instance['title']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Category List Title', 'edupress'); ?></label>
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



if( !function_exists( 'edupress_kid_register_cat_list_widget' ) ) :
    /**
     * Register search cat list widget
     */
    function edupress_kid_register_cat_list_widget() {
        register_widget( 'edupress_kid_Search_Cat_List_Widget' );
    }
    add_action( 'widgets_init', 'edupress_kid_register_cat_list_widget' );
endif;
//class-cat-list-widget