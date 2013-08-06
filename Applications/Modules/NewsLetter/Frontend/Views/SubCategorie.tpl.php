<?php if(sizeof($datalist)): ?>
<ul>
<?php foreach($datalist as $data): ?>
    <li><p><input type="checkbox" id="idCategoriea<?php echo $data->getIdFils(); ?>" name="idCategorie[]" value="<?php echo $data->getIdFils(); ?>" /><?php echo $data->getLibelle(); ?></p></li> 
<?php endforeach;?>
</ul>
<?php endif; ?>