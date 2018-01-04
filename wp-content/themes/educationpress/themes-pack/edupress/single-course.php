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
        <a href="<?php echo get_post_type_archive_link('course')?>">
        <?php esc_html_e( 'Courses', 'edupress' ); ?>
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
        <main id="main" class="site-main col-xs-12  <?php echo esc_attr(edupress_page_layout('edupress_coursedetail_layout')); ?>"  >
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'uni-template-parts/content', 'course' );
		   ?>
          <?php get_template_part( 'uni-template-parts/content-course', 'instructors' ); ?>
          <?php endwhile; // End of the loop. ?>
        </main>
        <!-- #main -->
        <?php
		if($edupress_options['edupress_coursedetail_layout'] == '2') {
			$default_layout=" pull-left";
		} elseif($edupress_options['edupress_coursedetail_layout'] == '3') {
			$default_layout=" pull-right";
		}
		?>
        
        <div id="secondary" class="widget-area col-xs-12 col-sm-4 <?php echo esc_attr($default_layout);?>" role="complementary">
          
		  <?php
		  if( !wp_is_mobile() )
		  {
			  ?>
              <div class="co-join-info">
                    <?php get_template_part( 'uni-template-parts/course-co-info' ); ?>
              </div>
          <?php
		  }
		  ?>
          
          
          <!--co-join-info #end  -->
       		
         <?php 
			if (  is_active_sidebar('course-detail' ) ) {
				dynamic_sidebar( 'course-detail' ); 
			}
			?>
        </div>
       
      </div>
      <!-- #row --> 
    </div>
    <!-- #container --> 
  </div>
  <!-- primary #end --> 
</div>
<?php get_footer(); ?>

<!-- inquiry contact popup start -->
<?php
if( isset($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp']) && $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp'] && !empty($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_type'] ) && $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_type'] == 'contact_form' )
{
	?>
<div id="inquiry-form" style="display:none;">
     <div class="row">
     <h3><?php echo esc_html($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_contact_title']);?></h3>
    <p><?php echo wp_kses_post($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_contact_desc']);?></p>
    
 	 <?php
	 	
		if( !empty( $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_contact_form'] ) )     {
			echo do_shortcode( $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_contact_form'] );	
		}
	 ?>   
    
    </div>
</div>
<?php
}
?>
<!-- inquiry contact popup #end -->
