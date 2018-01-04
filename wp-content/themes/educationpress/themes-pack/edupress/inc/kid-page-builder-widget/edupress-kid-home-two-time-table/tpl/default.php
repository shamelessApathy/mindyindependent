<?php
/**
 * @var $timetables
 */
?>
<div class="col-xs-12">
    <div class="timetable">
    <h3>Timetable</h3>
    <ul>
    	<?php
    	foreach( $timetables as $timetable ) :
		?>
            <li>
                <i class="lnr lnr-clock"></i>
                <div class="time-info">
                    <p class="week"><?php echo esc_html($timetable['title']);?></p>
                    <p class="time"><?php echo esc_html($timetable['time']);?></p>
                    <p><?php echo esc_html( $timetable['desc'] );?></p>
                </div>
            </li>
        <?php
		endforeach;
		?>
    </ul>
    
    </div> 
</div> <!-- col 2 #end -->
