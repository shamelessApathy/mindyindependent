<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'educationpress' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'educationpress' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label', 'educationpress' ) ?>" />
             <?php if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post-type']) && $_GET['post-type']=='course') { ?>
                         <input type="hidden" value="course" name="post-type" id="post_type" />
                         <?php }?>
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'educationpress'  ) ?>" />
</form>