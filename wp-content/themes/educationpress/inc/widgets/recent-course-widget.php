<?php
if ( !class_exists( 'educationpress_Courses_Widget' ) ) {
    class educationpress_Courses_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_courses',
                'description' => esc_html__('Displays recent, most popular and most rated courses.','educationpress')
            );
            parent::__construct( 'educationpress_Courses_Widget', esc_html__('Courses','educationpress'), $widget_ops );
        }


        function widget($args, $instance) {
            extract($args);

            $title = apply_filters( 'widget_title', $instance['title'] );

            if ( empty($title) ) $title = false;

            // number of properties
            $count = intval( $instance['count']);
            if ( !$count || $count < 1 ) {
                $count = 2;
            }

            $sort_by = $instance['sort_by'];
			$cat = $instance['cat'];

            $recent_course_args = array(
                'post_type' => 'course',
                'posts_per_page' => $count,
				'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
            );


            //Order by
            if($sort_by == "random"):
                $recent_course_args['orderby']= "rand";
			elseif($sort_by == "popular"):
                $recent_course_args['meta_key']= "total_enroll";
				$recent_course_args['orderby']= "meta_value_num";
				$recent_course_args['order']= "DESC";
				$tax_meta_args = array(
				'meta_query' => array(
				array(
				'key' => 'total_enroll',
				'value' => 0,
				'compare' => '>',)));
				$recent_course_args=array_merge($recent_course_args,$tax_meta_args );
			elseif($sort_by == "ratings"):
                $recent_course_args['meta_key']= "total_reviews";
				$recent_course_args['orderby']= "meta_value_num";
				$recent_course_args['order']= "DESC";
				$tax_meta_args = array(
				'meta_query' => array(
				array(
				'key' => 'total_reviews',
				'value' => 0,
				'compare' => '>',)));
				$recent_course_args=array_merge($recent_course_args,$tax_meta_args );
			elseif($sort_by == "wishlist"):
                $recent_course_args['meta_key']= "_li_love_count";
				$recent_course_args['orderby']= "meta_value_num";
				$recent_course_args['order']= "DESC";
				$tax_meta_args = array(
				'meta_query' => array(
				array(
				'key' => '_li_love_count',
				'value' => 0,
				'compare' => '>',)));
				$recent_course_args=array_merge($recent_course_args,$tax_meta_args );
			elseif($sort_by == "title"):
                $recent_course_args['orderby']= "title";
				$recent_course_args['order']= "ASC";
			else:
                $recent_course_args['orderby']= "date";
				$recent_course_args['order']= "DESC";
            endif;
			
			if ( !empty( $cat ) ) {
			//$featured_args[ 'cat' ] = $cat;
			$tax_query_args = array(
				'tax_query' => array(
				array(
				'taxonomy' => 'course_category',
				'field' => 'term_id',
				'terms' => $cat
				)
				)
				); 
				$recent_course_args=array_merge($recent_course_args,$tax_query_args );
			}

            $recent_course_query = new WP_Query($recent_course_args);

            echo $before_widget;

            if($title):
                echo $before_title;
                echo esc_html( $title );
                echo $after_title;
            endif;

            if( $recent_course_query->have_posts() ):
                ?> <ul>
                     <?php
                    while($recent_course_query->have_posts()):
                        $recent_course_query->the_post();
						$course_price ='';
						$course_price = educationpress_get_price_text(get_the_ID()); 
						
                        ?>
                        <li class="clearfix">
                           
                            <?php echo do_shortcode( '[course_media course_id="'.get_the_ID().'" class="thumb" list_page="yes"]' );?> 
                            <div class="simi-co">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="meta"><?php echo strip_tags(do_shortcode( '[course_instructors course_id="'.get_the_ID().'" style="list-flat" link="true" label="" label_plural="" label_delimeter=""]' ),'<a>');?></p>
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
                    esc_html_e('No courses found!', 'educationpress');
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
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Courses', 'cat' => 0 , 'count' => 3 , 'sort_by' => 'random' ) );

            $title= esc_attr($instance['title']);
            $count =  $instance['count'];
            $sort_by = $instance['sort_by'];
			$cat =  $instance['cat'];

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'educationpress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                 <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('cat') ); ?>"><?php esc_html_e('Category', 'educationpress'); ?></label>
                    <?php 
					$args1 = array('show_option_none' => esc_html__('Select Category','educationpress') ,  'option_none_value'  => '0' , 'orderby' => 'name' , 'taxonomy' => 'course_category', 'name' => esc_attr( $this->get_field_name('cat') ) ,'hide_empty' => 0, 'selected' => esc_attr( $cat ));
					wp_dropdown_categories( $args1 );
					?>
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
                             <option value="popular"<?php selected( $sort_by, 'popular' ); ?>><?php esc_html_e('Popular Course By Enrolled', 'educationpress'); ?></option>
                            <?php  if(class_exists('RichReviews')){ ?>
                            <option value="ratings"<?php selected( $sort_by, 'ratings' ); ?>><?php esc_html_e('Popular Course By Ratings', 'educationpress'); ?></option>
                            <?php }?>
                            <option value="title"<?php selected( $sort_by, 'title' ); ?>><?php esc_html_e('Order By Title', 'educationpress'); ?></option>
                            <option value="wishlist"<?php selected( $sort_by, 'wishlist' ); ?>><?php esc_html_e('Most Wishlisted', 'educationpress'); ?></option>
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
			 $instance['cat'] = $new_instance['cat'];

            return $instance;

        }

    }
}



if( !function_exists( 'educationpress_register_courses_widget' ) ) :
    /**
     * Register courses widget
     */
    function educationpress_register_courses_widget() {
        register_widget( 'educationpress_Courses_Widget' );
    }
    add_action( 'widgets_init', 'educationpress_register_courses_widget' );
endif;
