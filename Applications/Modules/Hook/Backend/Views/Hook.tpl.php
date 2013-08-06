<div class="top-bar">
    
    <a href="position-add.html" title="Ajouter une position" class="button">ADD NEW</a>
    <h1>Gestion des positions </h1>
    <div class="breadcrumbs"><a href="position.html">Positions</a> / Liste</div>
    
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
            <th class="first" width="27">N¤</th>
            <th width="120">Nom</th>
            <th width="150">Nom technique</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Coût Cdt</th>
            <th class="last">Actions</th>
        </tr>
        </thead>
        <tbody>
    <?php if(isset($dataList)&& is_array($dataList)):?>
    <?php foreach($dataList as $data):  ?>
        <tr>
            <td class="first style1"><?php echo $data->getId() ?></td>
            <td><?php echo $data->getName() ?></td>
            <td><?php echo $data->getTechnicalName() ?></td>
            <td><?php echo $data->getType() ?></td>
            <td><?php echo $data->getPrice() ?></td>
            <td><?php echo $data->getActive() ?></td>
            <td><?php echo $data->getCoutCredit() ?></td>
            <td class="last"><a href="position-edit-<?php echo $data->getId() ?>.html" title="modifiier"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="position-delete-<?php echo $data->getId() ?>.html" title="supprimer" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
        </tr>
    <?php endforeach;?>
    <?php endif;?>
        </tbody>
    </table>
    
    <div class="select">
        <?php if( isset($pagination) ) echo $pagination; ?>
    </div>
   
</div>


