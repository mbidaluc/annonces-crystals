<img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
<img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />

<table class="listing" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th></th>
            <th class="first" width="27">N¤</th>
            <th width="120">Bannière</th>
            <th width="150">Aperçu</th>
            <th width="20">Activé</th>
            <th>Date de Publication</th>
            <th>Date d'Expiration</th>
            <th>Prix Final</th>
            <th class="last">Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($dataList as $advers):  ?>
    <tr>
        <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $advers->getId(); ?>"></td>
        <td class="first style1"><?php echo $advers->getId() ?></td>
        <td class="first style1"><a href="adversiting-detail-<?php echo $advers->getId() ?>.html" title="plus de détail"><?php echo $advers->getAltText()  ?></a></td>
        <td><a href="adversiting-detail-<?php echo $advers->getId() ?>.html" title="plus de détail"><img alt="<?php echo $advers->getAltText()  ?>" src="<?php echo _UPLOAD_DIR_.'Adversiting/'.array_shift(explode(';',$advers->getImage()))  ?>" width="100"/></a></td>
        <td><?php echo $advers->getActive()?'enabled':'disabled' ?></td>
        <td><?php echo $advers->getDateBegin() ?></td>
        <td><?php echo $advers->getDateEnd() ?></td>
        <td><?php echo $advers->getFinalPrice() ?></td>
        <td class="last"> <a href="adversiting-edit-<?php echo $advers->getId() ?>.html" title="modifiier"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a class="delete_elt" href="adversiting-delete-<?php echo $advers->getId() ?>.html" title="supprimer" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>

<div class="select">
    <?php if( isset($pagination) ) echo $pagination; ?>
</div>