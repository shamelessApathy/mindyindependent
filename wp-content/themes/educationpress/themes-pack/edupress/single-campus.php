<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package edupress
 */
 
 
get_header();
global $edupress_options;

if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='2') { ?>

<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header>
      <!-- .entry-header --> 
    </div>
    <!--row #end  --> 
  </div>
</div>
<?php
}
?>
<!-- breadcrumb #end -->
<div class="breadcrumb">
  <div class="container">
    <div class="row"> 
      <!--<p><a href="#">Home ></a> <span>About Us</span></p>-->
      
      <p> 
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php esc_html_e( 'Home', 'edupress' ); ?>
        >
        </a> 
        <a href="<?php echo get_post_type_archive_link('campus')?>">
        <?php esc_html_e( 'Campus', 'edupress' ); ?>
        >
        </a>
        <span>
        <?php the_title(); ?>
        </span>
      </p>
    </div>
  </div>
</div>

<!-- breadcrumb #end -->

<div class="page-spacer clearfix">
  <div id="primary" class="content-area">
    <div class="container">
      <div class="row">
        <?php
            	if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1') { ?>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
        <!-- .entry-header -->
        <?php 
				}
				?>
        <main id="main" class="site-main col-xs-12  <?php echo esc_attr(edupress_page_layout('edupress_campusdetail_layout')); ?>"  >
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'uni-template-parts/content', 'campus' ); ?>
          <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
          <?php endwhile; // End of the loop. ?>
        </main>
        <!-- #main -->
      
      	 <?php get_sidebar(); ?>
       
      </div>
      <!-- #row --> 
    </div>
    <!-- #container --> 
  </div>
  <!-- primary #end --> 
</div>
<?php get_footer(); ?>
