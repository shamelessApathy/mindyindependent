<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'edupress' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'edupress' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label', 'edupress' ) ?>" />
             <?php if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post_type'])) { ?>
                         <input type="hidden" value="<?php echo esc_attr($_GET['post_type']);?>" name="post_type" id="post_type" />
                         <?php }?>
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'edupress'  ) ?>" />
</form>