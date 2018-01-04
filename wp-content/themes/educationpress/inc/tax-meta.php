<?php
/*
Plugin Name: Demo Tax meta class
Plugin URI: http://en.bainternet.info
Description: Tax meta class usage demo
Version: 2.0.2
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
*/

//include the main class file
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'tc_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'educationpress_cp_cat_meta_box',          // meta box id, unique per meta box
    'title' => 'EducationPress Category Meta',          // meta box title
    'pages' => array('course_category'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $my_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */
  
  //text field
  $my_meta->addText($prefix.'cp_cat_short_text',array('name'=> esc_html__('Short Description','educationpress'),'desc' =>  esc_html__('Leave blank if you don\'t want use short description for category on home page.','educationpress')));
  //Color field
  $my_meta->addColor($prefix.'cp_cat_bg',array('name'=> esc_html__('Background Color','educationpress'),'desc' =>  esc_html__('Choose background color for the Category <br> Leave blank if you don\'t want use background color for category on home page.','educationpress')));
  //Image field
  $my_meta->addImage($prefix.'cp_cat_icon',array('name'=> esc_html__('Icon','educationpress') ,'desc' => esc_html__('Choose Icon for the Category 96X96 pixel. <br> Leave blank if you don\'t want use icon for category on home page.','educationpress')));
 
 
  //Finish Meta Box Decleration
  $my_meta->Finish();
}
