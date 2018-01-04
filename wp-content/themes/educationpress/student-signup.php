<?php
/**
 * Template Name: SignUp
 *
* The Template for displaying student login.
 *
 * @package CoursePress
 */
get_header(); 
$redirect_url = '';
if ( ! empty( $_REQUEST['redirect_url'] ) ) {
	$redirect_url = $_REQUEST['redirect_url'];
}?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
              <?php
			if(get_the_title( get_the_ID())){
			 the_title( '<h1 class="entry-title">', '</h1>' ); 
			}else{
			 ?>
              <h1 class="entry-title"><?php esc_html_e( 'Register', 'educationpress'); ?> </h1>  
             <?php }?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
               <main id="main" class="site-main col-xs-12 " >
                  <div class="register-form">  	
                      <h3><?php esc_html_e( 'Register', 'educationpress'); ?></h3>  
                    <?php
                    echo do_shortcode( '[cp_pages page="student_signup"]' );
                    ?>
                  </div>
		  <?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; // End of the loop. ?>	


			 </main><!-- #main -->
             
             
              <?php get_sidebar(); ?>
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
 </div> <!-- page-spacer #end  --> 	 
<?php get_footer(); ?>