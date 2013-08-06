
<?php    
    foreach ($datalist as $value) {
?>
        <option value="<?php echo $value->online_user ?>">
            <div  id="<?php echo $value->online_user ?>">
                <?php echo $value->online_user?>
            </div>
        </option>
    <?php
        }
    ?>
 
    

