<img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
<img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
<table class="listing" cellpadding="0" cellspacing="0">
   <thead>
    <tr>
        <th class="first" width="17"></th>
        <th class="first" width="17">ID</th>
        <th>Designation</th>
        <th>Date debut</th>
        <th>Date d'expiration</th>
        <th>Prix total</th>
        <th>Activer</th>
        <th>T. Abus</th>
        <th class="last">Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php  foreach($datalist as $data):  ?>
            <tr>
                <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $data->getId(); ?>"></td>
                <td class="first style1"><?php echo $data->getId() ?></td>
                <td ><?php echo $data->getDesignation() ?></td>
                <td ><?php echo $data->getDateDebut() ?></td>
                <td ><?php echo $data->getDateexp() ?></td>
                <td ><?php echo $data->getPrixTotal() ?></td>
                <td ><?php echo ($data->getIs_actived())?"Oui":"Non"; ?></td>
                <td ><?php echo $abus[$data->getId()]; ?></td>
                <td class="last">
                    <?php 
                    if($data->getDateexp() > date("Y-m-d H:i:s")){ ?>
                    <a href="annonce-details-<?php echo $data->getId() ?>.html">Détails</a> 
                    <?php } ?>
                    <a href="annonce-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a> <a href="annonce-edit-<?php echo $data->getId() ?>.html" ><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="Modifier" /></a></td>
            </tr>             

    <?php endforeach;?>
   </tbody>
</table>

<div class="select">
    <?php if( isset($pagination) ) echo $pagination; ?>
</div>
   
