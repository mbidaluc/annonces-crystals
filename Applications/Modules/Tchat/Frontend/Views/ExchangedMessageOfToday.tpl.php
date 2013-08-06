<?php

$i = 1;

if(count($datalist)){
    foreach ($datalist as $value) {
?>
    <div class="<?php ($i%2 == 0)?"blue":"white"; ?>" >
        [<?php echo $value->getPseudo(); ?> ] a écrit:
        <p><?php echo $tools->smiley($value->getMessage_text()); ?></p>
    </div>
<?php
    }
}
?>
