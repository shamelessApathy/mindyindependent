<?php
/**
 * @var $columns
 */
?>
<div class="pricing-plan clearfix">
				<?php 
				$x=0;
				foreach($columns as $i => $column) :
				$x++;
				 ?>
            	<div class="col-xs-12 col-sm-4">
                	<div class="plan <?php if($x==1){?>first-plan<?php }elseif($x==2){?>second-plan<?php }elseif($x==3){?>third-plan<?php }?>">
                	<div class="plan-info"> 
                    	<?php if(!empty($column['title'])){?>
                    	<h3><?php echo esc_html($column['title']);?></h3>
                        <?php }?>
                        <div class="plan-price">
						<?php if(!empty($column['cur'])){ echo esc_attr($column['cur']);}?> 
                        <span><?php if(isset($column['price'])){ echo esc_attr($column['price']);}?> </span>
                        <small>/</small> <?php if(!empty($column['per'])){ echo esc_attr($column['per']);}?> </div>
                        
                        <?php if(!empty($column['subtitle'])){?>
                        <p><?php echo esc_html($column['subtitle']);?></p>
                         <?php }?>
                    </div>
                    <?php 
					if($x==3){
						$x=0;
					}
					if(!empty($column['features'])){?>
                    <ul>
                   <?php foreach($column['features'] as $i => $feature) : ?>
                  <li><?php echo siteorigin_widget_get_icon($feature['icon_new'], array());?><?php echo esc_attr($feature['text']);?></li>
                   <?php endforeach; ?>
                   </ul>
                   <?php }?>
                   <?php if(!empty($column['url'])){?> 
                    <a href="<?php echo esc_url($column['url']);?>" class="btn plan-btn btn-medium">
                   <?php if(!empty($column['button'])){ echo esc_attr($column['button']);}?> </a>
                   <?php }?>
                    </div> <!--first-plan #end  -->
                </div> <!-- plan 1 #end -->
                <?php endforeach; ?>
                
                
                
            
            </div> <!-- pricing plan nonw-->