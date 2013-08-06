<div class="top-bar">
    <a href="add-groupuser.html" class="button">ADD NEW</a>
    <h1>Gestion des utilisateurs</h1>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<div class="table">
   <img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
   <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
   <table class="listing" cellpadding="0" cellspacing="0">
        <tr>
            <th>id</th>
            <th >Nom</th>
            <th class="last">Actions</th>
        </tr>
        <?php foreach($datalist as $data):  ?>
        <tr>
            <td><?php echo $data->id  ?></td>
            <td><?php echo $data->nom_groupe  ?></td>
            <td class="last">
                <a href="groupeutilisateurs-edit-<?php echo $data->id ?>.html" title="editer cet utilisateur"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a>
                <a href="groupeutilisateurs-delete-<?php echo $data->id ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>
