<?php
if ( !class_exists( 'educationpress_Search_Lang_Filter_Widget' ) ) {
    class educationpress_Search_Lang_Filter_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_search_filter',
                'description' => esc_html__('Filter Course By Languages','educationpress')
            );
            parent::__construct( 'educationpress_search_lang_filter', esc_html__('Course Language Filter','educationpress'), $widget_ops );
			if ( is_active_widget(false, false, $this->id_base) )
			{
				wp_enqueue_style( 'educationpress-bootstrap-checkbox', get_template_directory_uri() . '/assets/css/build.css' );
			}
        }


        function widget($args, $instance) {
			global $wpdb;
			$all_lang = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'course_language'" );
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
                
                
                
               
                <ul class="filter">
                 
                    <?php 
					if(isset($_GET["lang"]))
					{
					$lang = explode(",", $_GET["lang"]);
					}
					for($i=0;$i<count($all_lang);$i++)
					{?>
                     <li>
                      <div class="checkbox">
                     <input id="<?php echo esc_attr($all_lang[$i]);?>" type="checkbox" class="langfil styled" name="lang" value="<?php echo esc_attr($all_lang[$i]);?>" <?php if(isset($_GET["lang"])){if (is_array($lang) && in_array($all_lang[$i], $lang)) {?> checked="checked" <?php }}?> />
                     <label for="<?php echo esc_attr($all_lang[$i]);?>">
                      <?php echo esc_html($all_lang[$i]);?>
                      </label>
                      </div>
                  </li>
                     <?php
				 }?>
                  
                 </ul>
                
			<?php
            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Language' ) );

            $title= esc_attr($instance['title']);

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Language Filter Title', 'educationpress'); ?></label>
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



if( !function_exists( 'educationpress_register_search_lang_filter_widget' ) ) :
    /**
     * Register search lang filter widget
     */
    function educationpress_register_search_lang_filter_widget() {
        register_widget( 'educationpress_Search_Lang_Filter_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_search_lang_filter_widget' );
endif;
