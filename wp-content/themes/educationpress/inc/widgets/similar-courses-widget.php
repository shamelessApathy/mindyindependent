<?php
if ( !class_exists( 'educationpress_Similar_Courses_Widget' ) ) {
    class educationpress_Similar_Courses_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_courses',
                'description' => esc_html__('Displays similar courses in course detail page sidebar.','educationpress')
            );
            parent::__construct( 'educationpress_Similar_Courses_Widget', esc_html__('Similar Courses','educationpress'), $widget_ops );
        }


        function widget($args, $instance) {
			global $post;
			$term_list = wp_get_post_terms($post->ID, 'course_category', array("fields" => "ids"));
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
                'post_type' => 'course',
				'post__not_in' => $post_not_arr,
                'posts_per_page' => $count,
				'tax_query' => array(
                        'taxonomy' => 'course_category',
                        'field' => 'term_id',
                        'terms' => $term_list,
                )
                
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
                    while($featured_query->have_posts()):
                        $featured_query->the_post();
						$course_price ='';
						$course_price = educationpress_get_price_text(get_the_ID()); 
						
                        ?>
                        <li class="clearfix">
                            <?php echo do_shortcode( '[course_media course_id="'.get_the_ID().'" class="thumb" list_page="yes"]' );?> 
                            <div class="simi-co">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="meta"><?php echo strip_tags(do_shortcode( '[course_instructors course_id="'.get_the_ID().'" style="list-flat" link="true"  course_id="'.get_the_ID().'" label="" label_plural="" label_delimeter=""]' ),'<a>');?></p>
                            <p><span class="simi-price"><?php echo esc_html($course_price);?></span> 
                            <span class="rating">
                            <?php 
							if(class_exists('RichReviews')){
								$decimal=0;
								$roundedAverage=0;
								$stars='';
								$average=educationpress_get_course_average_rating("post",get_the_ID());
								$decimal = $average - floor($average);
								if($decimal >= 0.5) {
								$roundedAverage = floor($average) + 1;
								} else {
								$roundedAverage = floor($average);
								}
								for ($i=1; $i<=5; $i++)
                       			 {
									if ($i <= $roundedAverage) {?>
										<i class="glyphicons glyphicon-star"></i>
									
									<?php
									}
									else {?>
										<i class="glyphicons glyphicon-star-empty"></i>
									<?php
									}
                        		}
							}?>
                            </span></p>
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
                    esc_html_e('No similar courses found!', 'educationpress');
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
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Similar Courses', 'count' => 3 , 'sort_by' => 'random' ) );

            $title= esc_attr($instance['title']);
            $count =  $instance['count'];
            $sort_by = $instance['sort_by'];

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'educationpress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('count') ); ?>"><?php esc_html_e('Number of Courses', 'educationpress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>"><?php esc_html_e('Sort By:', 'educationpress') ?></label>
                    <select name="<?php echo esc_attr( $this->get_field_name('sort_by') ); ?>" id="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>" class="widefat">
                            <option value="recent"<?php selected( $sort_by, 'recent' ); ?>><?php esc_html_e('Most Recent', 'educationpress'); ?></option>
                            <option value="random"<?php selected( $sort_by, 'random' ); ?>><?php esc_html_e('Random', 'educationpress'); ?></option>
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



if( !function_exists( 'educationpress_register_similar_courses_widget' ) ) :
    /**
     * Register similar courses widget
     */
    function educationpress_register_similar_courses_widget() {
        register_widget( 'educationpress_Similar_Courses_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_similar_courses_widget' );
endif;
