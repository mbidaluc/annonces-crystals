<div class="top-bar">
    <h1>Gestion des Partenaires</h1>
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
            <th class="first" width="17">ID</th>
            <th width="177">Logo</th>
            <th width="177">Nom</th>
            <th>Actif</th>
            <th class="last">Actions</th>
        </tr>
       </thead>
       <tbody>
        <?php  foreach($datalist as $data):  ?>
                <tr>
                    <td class="first style1"><?php echo $data->getId() ?></td>
                    <td><img alt="<?php echo $data->getNom()  ?>" src="<?php echo _UPLOAD_DIR_.'Partenaires/'.array_shift(explode(';',$data->getLogo()))  ?>" width="100"/></td>
                    <td class="first style1"><?php echo $data->getNom() ?></td>   
                    <td ><?php echo $data->getIs_active() ?></td>
                    <td class="last"><a href="partenaire-abonne-<?php echo $data->getId() ?>.html"> List</a> <a href="partenaire-edit-<?php echo $data->getId() ?>.html"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="partenaire-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
                </tr>             

        <?php endforeach;?>
       </tbody>
    </table>

    <div class="select">
         <?php if( isset($pagination) ) echo $pagination; ?>
    </div>
</div>