<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $edupress_options;


if ( ! comments_open() ) {
	return;
}
global $active_sec;
?>
<div id="reviews" class="woocommerce-Reviews courses-info  <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php if($active_sec == 'reviews'):?>in  active<?php endif;?><?php } ?>">
	<div id="comments">
		<h3 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				printf( _n( '%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'edupress' ), $count, '<span>', get_the_title(), '</span>' );
			else
				_e( 'Reviews', 'edupress' );
		?>
        </h3>
        <?php
        if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
			 $count = $product->get_review_count();
			?>
			<section class="courses-review clearfix">
            	 <div class="col-xs-12 col-sm-4">
                    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                        <p><?php esc_html_e( 'Average Rating', 'edupress' ); ?></p>
                        <p class="total-rating" itemprop="ratingValue"><?php echo $product->get_average_rating();?></p>
                        <?php
                        wc_get_template( 'single-product/rating.php' );
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p><?php esc_html_e( 'Details', 'edupress' ); ?></p>
                    
                    <?php
					
					global $product;
					
					$review_count = get_post_meta($product->id, '_wc_rating_count', true, false);
				
					
					
					for( $i=1; $i<=5; $i++) {
						//$review_count as $star_num => $count
						$star_num =  $i;
						$count = !empty( $review_count[ $i ] ) ? $review_count[ $i ] : 0;
					?>
					<div class="stars-rating">
						  <span><?php esc_html_e( $star_num.' Stars', 'edupress' ); ?></span>
						  <div class="progress active">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $count;?>%" aria-valuemin="1" aria-valuemax="100" style="width:<?php echo $count;?>%"></div>
						</div>
						<span><?php echo $count;?></span> 
					</div>    
				<?php
					}					
				?>
				
                 </div>
            </section>
            <?php
		}
		?>
		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'edupress' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'edupress' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'edupress' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'edupress' ),
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'edupress' ) . ' <span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'edupress' ) . ' <span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'edupress' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'edupress' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'edupress' ) .'</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . __( 'Rate&hellip;', 'edupress' ) . '</option>
							<option value="5">' . __( 'Perfect', 'edupress' ) . '</option>
							<option value="4">' . __( 'Good', 'edupress' ) . '</option>
							<option value="3">' . __( 'Average', 'edupress' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'edupress' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'edupress' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'edupress' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'edupress' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
