<div class="top-bar">
    
    <a href="packs-add.html" title="Ajouter un pack de crédit" class="button">ADD NEW</a>
    <h1>Gestion des Packs de crédits </h1>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<div class="table">
    
    <img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    
    <table class="listing" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th class="first" width="27">ID</th>
            <th width="120">Image</th>
            <th width="120">Libele</th>
            <th width="150">Crédits</th>
            <th>Prix</th>
            <th class="last">Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php if(isset($dataList)&& is_array($dataList)):?>
    <?php foreach($dataList as $data):  ?>
        <tr>
            <td class="first style1"><?php echo $data->getId() ?></td>
            <td><img alt="<?php echo $data->getLibelle()  ?>" src="<?php echo _UPLOAD_DIR_.'PackCredits/'.$data->getImage() ?>" width="60"/></td>
            <td><?php echo $data->getLibelle() ?></td>
            <td><?php echo $data->getCredit() ?></td>
            <td><?php echo $data->getPrix() ?></td>
            <td class="last"><a href="packs-edit-<?php echo $data->getId() ?>.html" title="modifiier"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="packs-delete-<?php echo $data->getId() ?>.html" title="supprimer" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
        </tr>
    <?php endforeach;?>
    <?php endif;?>
        </tbody>
    </table>
    
    <div class="select">
         <?php if( isset($pagination) ) echo $pagination; ?>
    </div>
   
</div>


