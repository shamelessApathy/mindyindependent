<?php
if ( !class_exists( 'edupress_ecommerce_Similar_Courses_Widget' ) ) {
    class edupress_ecommerce_Similar_Courses_Widget extends WP_Widget {

        public function __construct(){
            $widget_ops = array(
                'classname' => 'widget_courses',
                'description' => esc_html__('Displays similar courses in course detail page sidebar.','edupress')
            );
            parent::__construct( 'edupress_ecommerce_Similar_Courses_Widget', esc_html__('Similar Courses','edupress'), $widget_ops );
        }


        function widget($args, $instance) {
			global $post;
			$term_list = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "ids"));
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
                'post_type' => 'product',
				'post__not_in' => $post_not_arr,
                'posts_per_page' => $count,
				'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $term_list,
                    )
                )
                
            );


            //Order by
            if($sort_by == "random"):
                $featured_args['orderby']= "rand";
            else:
                $featured_args['orderby']= "date";
            endif;
			
			/*
			echo "<pre>";
			print_r( $featured_args );
			die;
			*/

            $featured_query = new WP_Query($featured_args);
			
			/*
						echo "<pre>";
			print_r( $featured_query );
			die;
			*/

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
                             <div class="course-thumbnail course-featured-media course-featured-media-569 thumb">
							<?php
                            if ( has_post_thumbnail() ) {
								$props = wc_get_product_attachment_props( get_post_thumbnail_id() );
								echo get_the_post_thumbnail( get_the_ID(), array(100, 75), array(
									'title'	 => esc_attr( $props['title'] ),
									'alt'    => esc_attr( $props['alt'] )
								) );
							} elseif ( wc_placeholder_img_src() ) {
								echo wc_placeholder_img( 'shop_thumbanail' );
							}
							?>
                            </div>
                            <?php
							global $product;
							?>
                            <div class="simi-co woocommerce">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="meta"><?php echo edupress_ecommerce_get_author_link();?></p>
                            <p><span class="simi-price"><?php echo $product->get_display_price() ?  $product->get_price_html():"Free"; ?></span> 
                            <span class="rating">
                           <?php 
							if( get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) {
								echo $product->get_rating_html();
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
                    esc_html_e('No similar courses found!', 'edupress');
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
                    <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Widget Title', 'edupress'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id('count') ); ?>"><?php esc_html_e('Number of Courses', 'edupress'); ?></label>
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



if( !function_exists( 'edupress_ecommerce_register_similar_courses_widget' ) ) :
    /**
     * Register similar courses widget
     */
    function edupress_ecommerce_register_similar_courses_widget() {
        register_widget( 'edupress_ecommerce_Similar_Courses_Widget' );
    }
    add_action( 'widgets_init', 'edupress_ecommerce_register_similar_courses_widget' );
endif;
