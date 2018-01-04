<?php
/**
 * @var $title
 * @var $course_cat
 */
if (  count( $course_cat )>0 && !empty($course_cat)) {
?>
<section class="search-category">
       		<div class="container">
            <div class="row">
			<?php  if ( ! empty( $title ) ) {?>
            <h2 class="text-center"><?php echo esc_html($title ); ?></h2>
            <?php }
			
			
			
			// 6 categries start 
			if(count( $course_cat)>1 && term_exists( (int)$course_cat[0], 'course_category') ){
			?>
            <div class="col-xs-12 col-sm-6" >
                <?php if(count( $course_cat)>1 &&  term_exists( (int)$course_cat[0], 'course_category')){
					$course_cat1 = get_term_by('id', (int)  $course_cat[0], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[0]);
					?>
            	<div class="cat cat_first" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat1->term_id,'course_category'));?>"><?php echo esc_html($course_cat1->name);?></a></h3>
                   <?php $cat_short_text1 =  get_term_meta($course_cat1->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text1[0])){?>
					 <p><?php echo esc_html($cat_short_text1[0]); ?></p>
                    <?php
                    }
					?>
                </div> <!-- cat first #end -->
                <?php }?>
                <?php if(count( $course_cat )>=2 && term_exists( (int)$course_cat[1], 'course_category')){
					$course_cat2 = get_term_by('id', (int) $course_cat[1], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[1]);
					?>
                <div class="cat cat_second" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat2->term_id,'course_category'));?>"><?php 
					$course_cattext2 = ( mb_strlen( $course_cat2->name ) >= 32 ) ? mb_substr( $course_cat2->name, 0, 29 ) . '..' : $course_cat2->name;
					 echo esc_html($course_cattext2);?></a></h3>
                    <?php
					$cat_short_text_arr2 = get_term_meta($course_cat2->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr2[0])){?>
                    <p>
                    <?php
					$cat_short_text2=( mb_strlen( $cat_short_text_arr2[0] ) >= 137 ) ? mb_substr(  $cat_short_text_arr2[0], 0, 137 ) . '...' : 
					$cat_short_text_arr2[0];
					 echo  esc_html($cat_short_text2);?>
                     </p>
                  <?php }?>
                </div>  <!-- cat second #end -->
                <?php }?>
            </div> <!-- col 1 #end -->
            <?php }?>
            
            <?php if(count( $course_cat )>=3 &&  term_exists( (int)$course_cat[2], 'course_category')){?>
            <div class="col-xs-12 col-sm-6" >
             <?php if(count( $course_cat )>=3){
					$course_cat3 = get_term_by('id', (int) $course_cat[2], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[2]);
					?>
            	 <div class="cat cat_third" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat3->term_id,'course_category'));?>"><?php 
					$course_cattext3 = ( mb_strlen( $course_cat3->name ) >= 32 ) ? mb_substr( $course_cat3->name, 0, 29 ) . '..' : $course_cat3->name;
					echo esc_html($course_cattext3);?></a></h3>
                    <?php
					$cat_short_text_arr3 =get_term_meta($course_cat3->term_id,'tc_cp_cat_short_text');
                	if(!empty($cat_short_text_arr3)){?>
                    <p><?php
					$cat_short_text3 = ( mb_strlen( $cat_short_text_arr3[0]) >= 138 ) ? mb_substr( $cat_short_text_arr3[0], 0, 138 ) . '...' : $cat_short_text_arr3[0];
					 echo  esc_html($cat_short_text3);?></p>
                     <?php }?>
                </div>  <!-- cat third #end -->
                 <?php }?>
                <?php if(count( $course_cat )>=4 && term_exists( (int)$course_cat[0], 'course_category')){
					$course_cat4 = get_term_by('id', (int) $course_cat[3], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[3]);
				?>
                <div class="cat cat_forth" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat4->term_id,'course_category'));?>"><?php 
					$course_cattext4 = ( mb_strlen( $course_cat4->name ) >= 15 ) ? mb_substr( $course_cat4->name, 0, 13 ) . '..' : $course_cat4->name;
					echo esc_html($course_cattext4);?></a></h3>
                    <?php
					$cat_short_text_arr4 = get_term_meta($course_cat4->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr4[0]))
					{
					?>
                    <p><?php
					$cat_short_text4 = ( mb_strlen( $cat_short_text_arr4[0] ) >= 45 ) ? mb_substr( $cat_short_text_arr4[0], 0, 45 ) . '...' : $cat_short_text_arr4[0];
					 echo  esc_html($cat_short_text4);?></p>
                     <?php }?>
                </div>  <!-- cat forth #end -->
                <?php }?>
                  <?php if(count( $course_cat )>=5 && term_exists( (int)$course_cat[4], 'course_category')){
					$course_cat5 = get_term_by('id', (int) $course_cat[4], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[4]);
				?>
                <div class="cat cat_fifth" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat5->term_id,'course_category'));?>"><?php
					$course_cattext5 = ( mb_strlen( $course_cat5->name ) >= 15 ) ? mb_substr( $course_cat5->name, 0, 13 ) . '..' : $course_cat5->name;
					 echo esc_html($course_cattext5);?></a></h3>
                     <?php
					 $cat_short_text_arr5 = get_term_meta($course_cat5->term_id,'tc_cp_cat_short_text');
					 if(!empty( $cat_short_text_arr5[0])){
					 ?>
                    <p><?php
					$cat_short_text5 = ( mb_strlen( $cat_short_text_arr5[0] ) >= 52 ) ? mb_substr( $cat_short_text_arr5[0], 0, 52 ) . '...' : $cat_short_text_arr5[0];
					 echo  esc_html($cat_short_text5);?></p>
                     <?php }?>
                </div>  <!-- cat fifth #end -->
                <?php }?>
                 <?php if(count( $course_cat )>=6 &&  term_exists( (int)$course_cat[5], 'course_category')){
					$course_cat6 = get_term_by('id', (int) $course_cat[5], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[5]);
				?>
                <div class="cat cat_sixth" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo   esc_url(get_term_link((int) $course_cat6->term_id,'course_category'));?>"><?php 
					$course_cattext6 = ( mb_strlen( $course_cat6->name ) >= 32 ) ? mb_substr( $course_cat6->name, 0, 29 ) . '..' : $course_cat6->name;
					echo esc_html($course_cattext6);?></a></h3>
                    <?php
					$cat_short_text_arr6 = get_term_meta($course_cat6->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr6[0]))
					{
					?>
                    <p><?php
					$cat_short_text6 = ( mb_strlen( $cat_short_text_arr6[0] ) >= 139 ) ? mb_substr( $cat_short_text_arr6[0], 0, 139 ) . '...' : $cat_short_text_arr6[0];
					 echo  esc_html($cat_short_text6);?></p>
                     <?php
					}?>
                </div>  <!-- cat sixth #end -->
                <?php }?>
            </div> <!-- col 2 #end -->
            <?php }?>
            <?php  // 6 categries end ?>	
                 </div> <!-- row #end -->
                 
                 
			<?php
			
			 
			// 12 categories start 
			if(count( $course_cat )>=7  ){?>
            <div class="row">  <!-- row #start 12 categories -->
            <div class="col-xs-12 col-sm-6" >
                <?php if(count( $course_cat )>=7 && term_exists( (int)$course_cat[6], 'course_category')){
					$course_cat7 = get_term_by('id', (int) $course_cat[6], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[6]);
					?>
            	<div class="cat cat_first cat_seventh" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat7->term_id,'course_category'));?>"><?php echo esc_html($course_cat7->name);?></a></h3>
                    <?php $cat_short_text7 =  get_term_meta($course_cat7->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text7[0] )){
					?>
                    <p><?php echo esc_html($cat_short_text7[0]);?></p>
                    <?php }?>
                </div> <!-- cat first #end -->
                <?php }?>
                <?php if(count( $course_cat)>=8 && term_exists( (int)$course_cat[7], 'course_category')){
					$course_cat8 = get_term_by('id', (int) $course_cat[7], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[7]);
					?>
                <div class="cat cat_second cat_eighth" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat8->term_id,'course_category'));?>"><?php 
					$course_cattext8 = ( mb_strlen( $course_cat8->name ) >= 32 ) ? mb_substr( $course_cat8->name, 0, 29 ) . '..' : $course_cat8->name;
					echo esc_html($course_cattext8) ;?></a></h3>
                    <?php 
					$cat_short_text_arr8 =  get_term_meta($course_cat8->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr8[0]))
					{
					?>
                    <p><?php 
					$cat_short_text8 = ( mb_strlen( $cat_short_text_arr8[0] ) >= 137 ) ? mb_substr( $cat_short_text_arr8[0], 0, 137 ) . '...' : $cat_short_text_arr8[0];
					echo  esc_html($cat_short_text8);?></p>
                     <?php }?>
                </div>  <!-- cat second #end -->
                <?php }?>
            </div> <!-- col 1 #end -->
            
            <?php if(count( $course_cat)>=9 && term_exists( (int)$course_cat[8], 'course_category')){?>
            <div class="col-xs-12 col-sm-6" >
             <?php if(count( $course_cat)>=9){
					$course_cat9 = get_term_by('id', (int) $course_cat[8], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[8]);
					?>
            	 <div class="cat cat_third cat_nine" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat9->term_id,'course_category'));?>"><?php
					$course_cattext9 = ( mb_strlen( $course_cat9->name ) >= 32 ) ? mb_substr( $course_cat9->name, 0, 29 ) . '..' : $course_cat9->name;
					 echo esc_html($course_cattext9);?></a></h3>
                     <?php 
					$cat_short_text_arr9 =  get_term_meta($course_cat9->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr9[0]))
					{
					?>
                    <p><?php 
					$cat_short_text9 = ( mb_strlen( $cat_short_text_arr9[0] ) >= 138 ) ? mb_substr( $cat_short_text_arr9[0], 0, 138 ) . '...' : $cat_short_text_arr9[0];
					echo  esc_html($cat_short_text9);?></p>
                    <?php }?>
                </div>  <!-- cat third #end -->
                 <?php }?>
                <?php if(count( $course_cat )>=10 && term_exists( (int)$course_cat[9], 'course_category')){
					$course_cat10 = get_term_by('id', (int) $course_cat[9], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[9]);
				?>
                <div class="cat cat_forth cat_ten" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat10->term_id,'course_category'));?>"><?php
					$course_cattext10 = ( mb_strlen( $course_cat10->name ) >= 15 ) ? mb_substr( $course_cat10->name, 0, 13 ) . '..' : $course_cat10->name;
					 echo esc_html($course_cattext10);?></a></h3>
                     <?php 
					$cat_short_text_arr10 =  get_term_meta($course_cat10->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr10[0]))
					{
					?>
                    <p><?php 
					$cat_short_text10 = ( mb_strlen(  $cat_short_text_arr10[0] ) >= 45 ) ? mb_substr($cat_short_text_arr10[0], 0, 45 ) . '...' :  $cat_short_text_arr10[0];
					echo esc_html($cat_short_text10);?></p>
                    <?php }?>
                </div>  <!-- cat forth #end -->
                <?php }?>
                  <?php if(count( $course_cat )>=11 && term_exists( (int)$course_cat[10], 'course_category')){
					$course_cat11 = get_term_by('id', (int) $course_cat[10], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[10]);
				?>
                <div class="cat cat_fifth cat_eleven" <?php if( !empty($bg_style) ) echo 'style="' .esc_attr( implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat11->term_id,'course_category'));?>"><?php
					$course_cattext11 = ( mb_strlen( $course_cat11->name ) >= 15 ) ? mb_substr( $course_cat11->name, 0, 13 ) . '..' : $course_cat11->name;
					 echo esc_html($course_cattext11);?></a></h3>
                     <?php 
					$cat_short_text_arr11 =  get_term_meta($course_cat11->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr11[0]))
					{
					?>
                    <p><?php 
					$cat_short_text11 = ( mb_strlen( $cat_short_text_arr11[0] ) >= 52 ) ? mb_substr( $cat_short_text_arr11[0], 0, 52 ) . '...' : $cat_short_text_arr11[0];
					echo  esc_html($cat_short_text11);?></p>
                     <?php }?>
                </div>  <!-- cat fifth #end -->
                <?php }?>
                 <?php if(count( $course_cat )>=12 && term_exists( (int)$course_cat[11], 'course_category')){
					$course_cat12 = get_term_by('id', (int) $course_cat[11], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[11]);
				?>
                <div class="cat cat_sixth cat_twelve" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat12->term_id,'course_category'));?>"><?php 
					$course_cattext12 = ( mb_strlen( $course_cat12->name ) >= 32 ) ? mb_substr( $course_cat12->name, 0, 29 ) . '..' : $course_cat12->name;
					echo esc_html($course_cattext12);?></a></h3>
                     <?php 
					$cat_short_text_arr12 =  get_term_meta($course_cat12->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr12[0]))
					{
					?>
                    <p><?php 
					$cat_short_text12 = ( mb_strlen( $cat_short_text_arr12[0] ) >= 139 ) ? mb_substr( $cat_short_text_arr12[0], 0, 139 ) . '...' : $cat_short_text_arr12[0];
					echo  esc_html($cat_short_text12);?></p>
                    <?php }?>
                </div>  <!-- cat sixth #end -->
                <?php }?>
            </div> <!-- col 2 #end -->
              <?php }?>
              </div> <!-- row #end  12 categories-->
               <?php }?>
            <?php  // 12 categories end ?>	
               
            
			<?php 
			// 18 categories start
			if(count( $course_cat )>=13 && term_exists( (int)$course_cat[12], 'course_category')){  ?>
            <div class="row"> <!-- row #start 18 categories-->
            <div class="col-xs-12 col-sm-6" >
                <?php if(count( $course_cat )>=13){
					$course_cat13 = get_term_by('id', (int) $course_cat[12], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[12]);
					?>
            	<div class="cat cat_first cat_thirteen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat13->term_id,'course_category'));?>"><?php echo esc_html($course_cat13->name);?></a></h3>
                    <?php $cat_short_text13 =  get_term_meta($course_cat13->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text13[0])){
					?>
                    <p><?php echo esc_html($cat_short_text13[0]);?></p>
                    <?php }?>
                </div> <!-- cat first #end -->
                <?php }?>
                <?php if(count( $course_cat )>=14 && term_exists( (int)$course_cat[13], 'course_category')){
					$course_cat14 = get_term_by('id', (int) $course_cat[13], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[13]);
					?>
                <div class="cat cat_second cat_fourteen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat14->term_id,'course_category'));?>"><?php 
					$course_cattext14 = ( mb_strlen( $course_cat14->name ) >= 32 ) ? mb_substr( $course_cat14->name, 0, 29 ) . '..' : $course_cat14->name;
					echo esc_html($course_cattext14);?></a></h3>
                     <?php 
					$cat_short_text_arr14 =  get_term_meta($course_cat14->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr14[0]))
					{
					?>
                    <p><?php 
					$cat_short_text14 = ( mb_strlen( $cat_short_text_arr14[0] ) >= 137 ) ? mb_substr( $cat_short_text_arr14[0], 0, 137 ) . '...' : $cat_short_text_arr14[0];
					echo  esc_html($cat_short_text14);?></p>
                    <?php }?>
                </div>  <!-- cat second #end -->
                <?php }?>
            </div> <!-- col 1 #end -->
            
            <?php if(count( $course_cat )>=15){?>
            <div class="col-xs-12 col-sm-6" >
             <?php if(count( $course_cat )>=15  && term_exists( (int)$course_cat[14], 'course_category')){
					$course_cat15 = get_term_by('id', (int) $course_cat[14], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[14]);
					?>
            	 <div class="cat cat_third cat_fifteen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link( (int) $course_cat15->term_id,'course_category'));?>"><?php 
					$course_cattext15 = ( mb_strlen( $course_cat15->name ) >= 32 ) ? mb_substr( $course_cat15->name, 0, 29 ) . '..' : $course_cat15->name;
					echo esc_html($course_cattext15);?></a></h3>
                     <?php 
					$cat_short_text_arr15 =  get_term_meta($course_cat15->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr15[0]))
					{
					?>
                    <p><?php 
					$cat_short_text15 = ( mb_strlen( $cat_short_text_arr15[0] ) >= 138 ) ? mb_substr( $cat_short_text_arr15[0], 0, 138 ) . '...' : $cat_short_text_arr15[0];
					echo  esc_html($cat_short_text15);?></p>
                     <?php }?>
                </div>  <!-- cat third #end -->
                 <?php }?>
                <?php if(count( $course_cat )>=16  && term_exists( (int)$course_cat[15], 'course_category')){
					$course_cat16 = get_term_by('id', (int) $course_cat[15], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[15]);
				?>
                <div class="cat cat_forth cat_sixteen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo   esc_url(get_term_link( (int) $course_cat16->term_id,'course_category'));?>"><?php 
						$course_cattext16 = ( mb_strlen( $course_cat16->name ) >= 15 ) ? mb_substr( $course_cat16->name, 0, 13 ) . '..' : $course_cat16->name;
					echo esc_html($course_cattext16) ;?></a></h3>
                     <?php 
					$cat_short_text_arr16 =  get_term_meta($course_cat16->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr16[0]))
					{
					?>
                    <p><?php 
					$cat_short_text16 = ( mb_strlen( $cat_short_text_arr16[0] ) >= 45 ) ? mb_substr( $cat_short_text_arr16[0], 0, 45 ) . '...' : $cat_short_text_arr16[0];
					echo  esc_html($cat_short_text16) ;?></p>
                    <?php }?>
                </div>  <!-- cat forth #end -->
                <?php }?>
                  <?php if(count( $course_cat )>=17  && term_exists( (int)$course_cat[16], 'course_category')){
					$course_cat17 = get_term_by('id', (int) $course_cat[16], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[16]);
				?>
                <div class="cat cat_fifth cat_seventeen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo   esc_url(get_term_link((int) $course_cat17->term_id,'course_category'));?>"><?php
					$course_cattext17 = ( mb_strlen( $course_cat17->name ) >= 15 ) ? mb_substr( $course_cat17->name, 0, 13 ) . '..' : $course_cat17->name;
					 echo esc_html($course_cattext17);?></a></h3>
                     <?php 
					$cat_short_text_arr17 =  get_term_meta($course_cat17->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr17[0]))
					{
					?>
                    <p><?php
					$cat_short_text17 = ( mb_strlen( $cat_short_text_arr17[0] ) >= 52 ) ? mb_substr( $cat_short_text_arr17[0], 0, 52 ) . '...' : $cat_short_text_arr17[0];
					 echo  esc_html($cat_short_text17);?></p>
                      <?php }?>
                </div>  <!-- cat fifth #end -->
                <?php }?>
                 <?php if(count( $course_cat )>=18  && term_exists( (int)$course_cat[18], 'course_category')){
					$course_cat18 = get_term_by('id', (int) $course_cat[17], 'course_category');
					$bg_style=$this->get_term_icon_and_bg($course_cat[17]);
				?>
                <div class="cat cat_sixth cat_eighteen" <?php if( !empty($bg_style) ) echo 'style="' . esc_attr(implode(';', $bg_style)) . '"' ?>>
                	<h3><a href="<?php echo  esc_url(get_term_link((int) $course_cat18->term_id,'course_category'));?>"><?php 
					$course_cattext18 = ( mb_strlen( $course_cat18->name ) >= 32 ) ? mb_substr( $course_cat18->name, 0, 29 ) . '..' : $course_cat18->name;
					echo esc_html($course_cattext18) ;?></a></h3>
                    <?php 
					$cat_short_text_arr18 =  get_term_meta($course_cat18->term_id,'tc_cp_cat_short_text');
					if(!empty($cat_short_text_arr18[0]))
					{
					?>
                    <p><?php 
					$cat_short_text18 = ( mb_strlen($cat_short_text_arr18[0]) >= 139 ) ? mb_substr( $cat_short_text_arr18[0], 0, 139 ) . '...' :$cat_short_text_arr18[0];
					echo  esc_html($cat_short_text18);?></p>
                    <?php }?>
                </div>  <!-- cat sixth #end -->
                <?php }?>
            </div> <!-- col 2 #end -->
            <?php }?>
             </div> <!-- row #end 18 categories-->
             <?php }?>
            <?php // 18 categories end ?>	
             
                 
                 
            </div> <!-- #container #end -->
       </section>
<?php }?>