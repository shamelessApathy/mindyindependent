<?php
/*
 * Browse by Category For Home Page Three
 */
 /**
 * @var $title
 * @var $course_cat
 */
global $educationpress_options;
if (  count( $course_cat )>0 && !empty($course_cat)) {
?>
<section class="browse-by-category clearfix">
				<?php  if ( ! empty( $title) ) {?>
             	<div class="head text-center"><?php echo esc_html( $title ); ?></div>
                 <?php }?>
                 
                 <?php if(count( $course_cat )>=1 && term_exists( (int)$course_cat[0], 'course_category')){
					$course_cat1 = get_term_by('id', (int) $course_cat[0], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[0]);?>
                <div class="col-xs-12 col-md-2 by_cat i_sport" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat1->term_id,'course_category'));?>">
					<?php 
					$course_cattext1 = ( mb_strlen( $course_cat1->name ) >= 17 ) ? mb_substr( $course_cat1->name, 0, 17 ) . '..' : $course_cat1->name;
					 echo esc_html($course_cattext1);?></a></h3>
                     <?php
					$cat_short_text_arr1 = get_term_meta($course_cat1->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr1[0]))
					{
					?>
                    <p>
					<?php
					$cat_short_text1 = ( mb_strlen(  $cat_short_text_arr1[0] ) >= 24 ) ? mb_substr( $cat_short_text_arr1[0], 0, 24 ) . '...' :  $cat_short_text_arr1[0];
					 echo  esc_html($cat_short_text1);?></p>
                     <?php }?>
                 </div>
                 <?php }?>
                
                 <?php if(count( $course_cat)>=2 && term_exists( (int)$course_cat[1], 'course_category')){
					$course_cat2 = get_term_by('id', (int) $course_cat[1], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[1]);
					?>
                <div class="col-xs-12 col-md-2 by_cat i_food" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat2->term_id,'course_category'));?>"><?php 
					$course_cattext2 = ( mb_strlen( $course_cat2->name ) >= 17 ) ? mb_substr( $course_cat2->name, 0, 17 ) . '..' : $course_cat2->name;
					 echo esc_html($course_cattext2);?></a></h3>
                      <?php
					$cat_short_text_arr2 = get_term_meta($course_cat2->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr2[0]))
					{
					?>
                    <p><?php
					$cat_short_text2 = ( mb_strlen(  $cat_short_text_arr2[0] ) >= 24 ) ? mb_substr(  $cat_short_text_arr2[0], 0, 24 ) . '...' :  $cat_short_text_arr2[0];
					 echo  esc_html($cat_short_text2);?></p>
                     <?php }?>
                 </div>
                 <?php }?>
                
                <?php if(count($course_cat )>=3 && term_exists( (int)$course_cat[2], 'course_category')){
					$course_cat3 = get_term_by('id', (int) $course_cat[2], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[2]);
					?> 
                <div class="col-xs-12 col-md-2 by_cat i_development" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat3->term_id,'course_category'));?>"><?php 
					$course_cattext3 = ( mb_strlen( $course_cat3->name ) >= 17 ) ? mb_substr( $course_cat3->name, 0, 17 ) . '..' : $course_cat3->name;
					echo esc_html($course_cattext3);?></a></h3>
                    <?php
					$cat_short_text_arr3 = get_term_meta($course_cat3->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr3[0]))
					{
					?>
                    <p><?php
					$cat_short_text3 = ( mb_strlen( $cat_short_text_arr3[0] ) >= 24 ) ? mb_substr( $cat_short_text_arr3[0], 0, 24 ) . '...' : $cat_short_text_arr3[0];
					 echo  esc_html($cat_short_text3);?></p>
                   <?php }?>
                 </div>
                 <?php }?>
                
                <?php if(count( $course_cat )>=4 && term_exists( (int)$course_cat[3], 'course_category')){
					$course_cat4 = get_term_by('id', (int) $course_cat[3], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[3]);
				?>
                <div class="col-xs-12 col-md-2 by_cat i_language" <?php if( !empty($bg_style) ) echo 'style="' .esc_attr( implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat4->term_id,'course_category'));?>"><?php 
					$course_cattext4 = ( mb_strlen( $course_cat4->name ) >= 17 ) ? mb_substr( $course_cat4->name, 0, 17 ) . '..' : $course_cat4->name;
					echo esc_html($course_cattext4);?></a></h3>
                    <?php
					$cat_short_text_arr4 = get_term_meta($course_cat4->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr4[0]))
					{
					?>
                    <p><?php
					$cat_short_text4 = ( mb_strlen( $cat_short_text_arr4[0] ) >= 24 ) ? mb_substr( $cat_short_text_arr4[0], 0, 24 ) . '...' : $cat_short_text_arr4[0];
					 echo  esc_html($cat_short_text4);?></p>
                   <?php }?>
                 </div>
                 <?php }?>
                
                  <?php if(count( $course_cat )>=5 && term_exists( (int)$course_cat[4], 'course_category')){
					$course_cat5 = get_term_by('id', (int) $course_cat[4], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[4]);
				?>
                <div class="col-md-2 by_cat i_music" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat5->term_id,'course_category'));?>"><?php
					$course_cattext5 = ( mb_strlen( $course_cat5->name ) >= 17 ) ? mb_substr( $course_cat5->name, 0, 17 ) . '..' : $course_cat5->name;
					 echo esc_html($course_cattext5);?></a></h3>
                      <?php
					$cat_short_text_arr5 = get_term_meta($course_cat5->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr5[0]))
					{
					?>
                    <p><?php
					$cat_short_text5 = ( mb_strlen( $cat_short_text_arr5[0] ) >= 24 ) ? mb_substr( $cat_short_text_arr5[0], 0, 24 ) . '...' : $cat_short_text_arr5[0];
					 echo  esc_html($cat_short_text5);?></p>
                      <?php }?>
                 </div>
                 <?php }?>
                
                <?php if(count( $course_cat )>=6 && term_exists( (int)$course_cat[5], 'course_category')){
					$course_cat6 = get_term_by('id', (int) $course_cat[5], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[5]);
				?> 
                <div class=" col-xs-12 col-md-2 by_cat i_frontend" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                    <h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat6->term_id,'course_category'));?>"><?php 
					$course_cattext6 = ( mb_strlen( $course_cat6->name ) >= 17 ) ? mb_substr( $course_cat6->name, 0, 17 ) . '..' : $course_cat6->name;
					echo esc_html($course_cattext6);?></a></h3>
                     <?php
					$cat_short_text_arr6 = get_term_meta($course_cat6->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr6[0]))
					{
					?>
                    <p><?php
					$cat_short_text6 = ( mb_strlen( $cat_short_text_arr6[0] ) >= 24 ) ? mb_substr( $cat_short_text_arr6[0], 0, 24 ) . '...' : $cat_short_text_arr6[0];
					 echo  esc_html($cat_short_text6);?></p>
                      <?php }?>
                 </div>
                <?php }?>
                  
         </section>
<?php }?>