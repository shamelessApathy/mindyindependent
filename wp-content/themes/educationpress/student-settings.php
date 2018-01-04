<?php
/**
 * Template Name: Edit Profile
 *
* The Template for displaying student login.
 *
 * @package CoursePress
 */
get_header(); 
?>
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <header class="entry-header">
        <?php
			if(get_the_title( get_the_ID())){
			 the_title( '<h1 class="entry-title">', '</h1>' ); 
			}else{
			 ?>
        <h1 class="entry-title">
          <?php esc_html_e( 'Dashboard - Edit Profile', 'educationpress'); ?>
        </h1>
        <?php }?>
      </header>
      <!-- .entry-header --> 
    </div>
    <!--row #end  --> 
  </div>
</div>
<div class="page-spacer clearfix">
  <div id="primary">
    <div class="container">
      <div class="row">
        <main id="main" class="site-main col-xs-12" >
        	<div class=" col-xs-12 clearfix" >
              <div class="edit-form">
                <h3>
                  <?php esc_html_e( 'Edit Profile', 'educationpress'); ?>
                </h3>
                <?php echo do_shortcode('[cp_pages page="student_settings"]'); ?>
              </div>
            </div>
			  <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>
              <?php endwhile; // End of the loop. ?>
        </main>
        <!-- #main --> 
        
      </div>
      <!-- row --> 
    </div>
    <!-- container --> 
  </div>
  <!-- #primary --> 
</div>
<!-- page-spacer #end  -->
<?php get_footer(); ?>
