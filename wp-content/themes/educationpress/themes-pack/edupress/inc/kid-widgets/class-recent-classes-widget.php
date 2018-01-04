<?php
if ( !class_exists( 'edupress_kid_Recent_Classes_Widget' ) ) {
    class edupress_kid_Recent_Classes_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_courses',
                'description' => esc_html__('Displays recent classes in class detail page sidebar.','edupress')
            );
            parent::__construct( 'edupress_kid_Recent_Classes_Widget', esc_html__('Recent Classes','edupress'), $widget_ops );
        }


       function widget($args, $instance) {
			global $post;
			//$term_list = wp_get_post_terms($post->ID, 'class-category', array("fields" => "ids"));
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


			 $featured_args =  array();

            $featured_args = array(
                'post_type' => 'class',
				'post__not_in' => $post_not_arr,
                'posts_per_page' => $count,
				/*'tax_query' => array(
                    array(
                        'taxonomy' => 'class-category',
                        'field' => 'id',
                        'terms' => $term_list,
                    )
                )
				*/
                
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
						
						
                        ?>
                        <li class="clearfix">
                             <div class="course-thumbnail">
							<?php
                            if ( has_post_thumbnail() ) {
								
								echo get_the_post_thumbnail( get_the_ID(), 'edupress-kid-similar-course-widget', array(
									'title'	 => get_the_title(),
									'alt'    => get_the_title(),
								) );
							} else {
								?>
								<img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available-small.jpg" alt="<?php echo get_the_title();?>" width="100" height="75" title="<?php echo get_the_title();?>" />
                                <?php
							}
							?>
                            </div>
                            <div class="simi-co">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="meta"><?php echo edupress_kid_get_author_link();?></p>
                            <p>
                            	 <?php if( get_field('price') ): ?>
                            	<span class="simi-price"><?php echo edupress_kid_format_currency( get_field('price'));?></span> 
                                  <?php
								 endif;
							  ?>
                            </p>
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
                    esc_html_e('No classes found!', 'edupress');
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
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Recent Classes', 'count' => 3 , 'sort_by' => 'random' ) );

            $title= esc_attr($instance['title']);
            $count =  $instance['count'];
            $sort_by = $instance['sort_by'];

                ?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('count') ); ?>"><?php esc_html_e('Number of Classes', 'edupress'); ?></label>
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



if( !function_exists( 'edupress_university_register_recent_classes_widget' ) ) :
    /**
     * Register recent classes widget
     */
    function edupress_kid_register_recent_classes_widget() {
        register_widget( 'edupress_kid_Recent_Classes_Widget' );
    }
    add_action( 'widgets_init', 'edupress_kid_register_recent_classes_widget' );
endif;
