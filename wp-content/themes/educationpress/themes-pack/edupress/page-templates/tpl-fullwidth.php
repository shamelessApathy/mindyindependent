<?php
/**
 * Template Name: Full Width
 *
 * @package EduPress\Template
 * @author  ThemeCycle
 * @since   EduPress 1.0
 */
 
 
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main" >
                    
                    <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edupress' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupress' ),
                        'after'  => '</div>',
                    ) );
                ?>
                     
                </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end -->       
<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>
