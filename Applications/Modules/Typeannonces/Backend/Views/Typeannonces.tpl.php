<div class="top-bar">
    <h1>Gestion des Types d'Annonces</h1>
    <div class="breadcrumbs"><a href="bgmanager.html">Liste des Types d'annonces</a></div>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<div class="table">
   <img src="../backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
   <img src="../backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
   <table class="listing" cellpadding="0" cellspacing="0">
        <tr>
            <th class="first" width="17">Libellé</th>
            <th width="177">Prix</th>
            <th class="last">Actions</th>
        </tr>
        <?php foreach($datalist as $data):  ?>
        <tr>
            <td class="first style1"><?php echo $data->getLibelle() ?></td>

            <td> <?php $data->getPrix(); ?> </td>
            <td class="last"><a href="typeannonces-edit-<?php echo $data->getId() ?>.html"><img src="../backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="typeannonces-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
        </tr>
        <?php endforeach;?>
    </table>

    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>