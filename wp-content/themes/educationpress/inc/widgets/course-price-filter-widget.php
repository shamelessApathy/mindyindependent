<?php
if ( !class_exists( 'educationpress_Search_Price_Filter_Widget' ) ) {
    class educationpress_Search_Price_Filter_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_search_filter',
                'description' => esc_html__('Filter Course By Free OR Paid','educationpress')
            );
			
            parent::__construct( 'educationpress_search_price_filter', esc_html__('Courses Price Filter','educationpress'), $widget_ops );
			if ( is_active_widget(false, false, $this->id_base) )
			{
				wp_enqueue_style( 'educationpress-bootstrap-checkbox', get_template_directory_uri() . '/assets/css/build.css' );
			}
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
				 if(!empty($_GET['c_sort']))
				 {
				 ?>
                 <input name="c_sort" value="<?php echo esc_attr($_GET['c_sort']);?>" type="hidden" />
                 <?php
				 }?>
               
 				
                <ul class="filter">	
                  
                   <li>
                      <div class="checkbox">
                        <input class="styled"  type="checkbox" name="free" id="free" value="off" <?php if(isset($_GET['free'])){ if($_GET['free']=='off'){?> checked="checked" <?php }}?> />
                        <label for="free">
                            <?php esc_html_e("Free",'educationpress'); ?>
                        </label>
                    </div>
					</li>
                   
                  <li>
                   <div class="checkbox">
                 <input  class="styled" type="checkbox" name="paid" id="paid" value="on" <?php if(isset($_GET['paid'])){ if($_GET['paid']=='on'){?> checked="checked" <?php } }?>  />
				  <label for="paid">
				 <?php esc_html_e("Paid",'educationpress'); ?> 
                 </label>
                  </div>
                  </li>
                  </ul>
                  
                 
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Price' ) );

            $title= esc_attr($instance['title']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Price Filter Title', 'educationpress'); ?></label>
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



if( !function_exists( 'educationpress_register_search_price_filter_widget' ) ) :
    /**
     * Register search price filter widget
     */
    function educationpress_register_search_price_filter_widget() {
        register_widget( 'educationpress_Search_Price_Filter_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_search_price_filter_widget' );
endif;
