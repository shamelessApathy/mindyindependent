<?php
if ( !class_exists( 'edupress_Recent_Events_Widget' ) ) {
    class edupress_Recent_Events_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_events',
                'description' => esc_html__('Show events with image.','edupress')
            );
            parent::__construct( 'edupress_Recent_events_Widget', esc_html__('Recent Events With Image','edupress'), $widget_ops );
        }


        function widget($args, $instance) {
			global $post;
            extract($args);

            $title = apply_filters( 'widget_title', $instance['title'] );

            if ( empty($title) ) $title = false;

            // number of properties
            $count = intval( $instance['count']);
            if ( !$count || $count < 1 ) {
                $count = 2;
            }

            $sort_by = $instance['sort_by'];
			if (!is_object($post)) {
				$post_not_arr= array();
			}else{
				$post_not_arr=array($post->ID);
			}


            $featured_args = array(
                'post_type' => 'event',
				'post__not_in' => $post_not_arr,
                'posts_per_page' => $count,
                'ignore_sticky_posts' => 1,
            );


            //Order by
            if($sort_by == "random"):
                $featured_args['orderby']= "rand";
            else:
                $featured_args['orderby']= "date";
            endif;

            $featured_query = new WP_Query($featured_args);

            echo $before_widget;

            if($title):
                echo $before_title;
                echo esc_html( $title );
                echo $after_title;
            endif;

            if( $featured_query->have_posts() ):
                ?> <ul>
                    <?php
					$image_size = 'edupress-small' ;
					while($featured_query->have_posts()):
                        $featured_query->the_post();
						
						
                        ?>
                        <li class="clearfix">
                            <?php  if ( has_post_thumbnail( $post->ID ) ) :
							the_post_thumbnail( $image_size, array( 'alt' => get_the_title() ) );
							  endif;
							?> 
                            <div class="simi-co">
                          		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                               <p> <?php echo get_the_date(); ?></p>
                                <?php // the_date( '' , '<p>', '</p>');?>                            
                            </div>
                         </li>
                        <?php
                    endwhile;
                    ?>
                     </ul>
                <?php
            else:
                ?>
                <ul>
                    <?php
                    echo '<li>';
                    esc_html_e('No recent events found!', 'edupress');
                    echo '</li>';
                    ?>
                </ul>
                <?php
            endif;

            wp_reset_postdata();

            echo $after_widget;
        }


        function form($instance)
        {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Recent Events', 'count' => 3 , 'sort_by' => 'random' ) );

            $title= esc_attr($instance['title']);
            $count =  $instance['count'];
            $sort_by = $instance['sort_by'];

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('count') ); ?>"><?php esc_html_e('Number of Events', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>"><?php esc_html_e('Sort By:', 'edupress') ?></label>
                    <select name="<?php echo esc_attr( $this->get_field_name('sort_by') ); ?>" id="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>" class="widefat">
                            <option value="recent"<?php selected( $sort_by, 'recent' ); ?>><?php esc_html_e('Most Recent', 'edupress'); ?></option>
                            <option value="random"<?php selected( $sort_by, 'random' ); ?>><?php esc_html_e('Random', 'edupress'); ?></option>
                    </select>
                </p>
                <?php
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = esc_html($new_instance['title']);
            $instance['count'] = $new_instance['count'];
            $instance['sort_by'] = $new_instance['sort_by'];

            return $instance;

        }

    }
}



if( !function_exists( 'edupress_register_recent_events_widget' ) ) :
    /**
     * Register recent posts widget
     */
    function edupress_register_recent_events_widget() {
        register_widget( 'edupress_Recent_Events_Widget' );
    }
    add_action( 'widgets_init', 'edupress_register_recent_events_widget' );
endif;
