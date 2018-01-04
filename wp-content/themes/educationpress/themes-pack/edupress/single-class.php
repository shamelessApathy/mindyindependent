<?php
/**
 * The template for displaying  single class.
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

if(edupress_is_a('ecom') || edupress_is_a('kid') || ( edupress_is_a('uni') && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='2') ) { 

?>

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
      
      <p> 
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php esc_html_e( 'Home', 'edupress' ); ?>
        >
        </a> 
        <a href="<?php echo get_post_type_archive_link('class')?>">
        <?php esc_html_e( 'Classes', 'edupress' ); ?>>
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
            	if( edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1') { ?>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
        <!-- .entry-header -->
        <?php 
				}
				?>
        <main id="main" class="site-main col-xs-12  <?php echo esc_attr(edupress_page_layout('edupress_classdetail_layout')); ?>"  >
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'kid-template-parts/content', 'class' ); ?>
          <?php endwhile; // End of the loop. ?>
         
	      <?php get_template_part( 'kid-template-parts/content-class', 'instructors' ); ?>
          
        </main>
        <!-- #main -->
        <?php
		if($edupress_options['edupress_classdetail_layout'] == '2') {
			$default_layout=" pull-left";
		} elseif($edupress_options['edupress_classdetail_layout'] == '3') {
			$default_layout=" pull-right";
		}
		?>
        
        
        <div id="secondary" class="widget-area col-xs-12 col-sm-4 <?php echo esc_attr($default_layout);?>" role="complementary">
          
		  <?php
		  if( !wp_is_mobile() )
		  {
			  ?>
              <div class="co-join-info">
                    <?php get_template_part( 'kid-template-parts/class-co-info' ); ?>
              </div>
          <?php
		  }
		  ?>
          
          
          <!--co-join-info #end  -->
       		
         <?php 
			if (  is_active_sidebar('class-detail' ) ) {
				dynamic_sidebar( 'class-detail' ); 
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

