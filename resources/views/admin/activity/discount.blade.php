<div class="timing_price_ul_li_col">
    <?php if($shift_timings){
    $i = 1;
    $shift_timings    =   json_decode($shift_timings, true);
    foreach($shift_timings as $shift_timing){ ?>
        <input type="text" id="sp_<?php echo $i;?>_1" class="shift_timings_list" name="sp[<?php echo $i;?>][1]" placeholder="Eg: Morning" value="<?php echo $shift_timing[1];?>">
        <input type="text" id="sp_<?php echo $i;?>_2" class="shift_timings_list" name="sp[<?php echo $i;?>][2]" placeholder="Eg: 5% or 500" value="<?php echo $shift_timing[2];?>">
        <br>
        <?php $i++; } ?>
    <?php } ?>
</div>