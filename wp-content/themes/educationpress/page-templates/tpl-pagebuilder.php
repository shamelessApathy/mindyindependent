<?php
/**
 * Template Name: Page Builder
 *
 * @package EducationPress\Template
 * @author  ThemeCycle
 * @since   EducationPress 1.0
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
                 <main id="main" class="site-main" >
                    
                    <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'educationpress' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educationpress' ),
                        'after'  => '</div>',
                    ) );
                ?>
                     
                </main><!-- #main -->
   </div><!-- #primary -->   
</div> <!-- page-spacer #end -->  
<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>
