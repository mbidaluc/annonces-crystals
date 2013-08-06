<img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
       <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
       <table class="listing" cellpadding="0" cellspacing="0">
           <thead>
            <tr>
                <th></th>
                <th>Avatar</th>
                <th >Pseudo</th>
                <th class="first">Email</th>
                <th>Nom et prenom</th>
                <th>Total Cdts </th>
                <th>Actif</th>
                <th class="last">Actions</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach($datalist as $data):  ?>
            <tr>
                <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $data->getId(); ?>"></td>
                <td><img alt="avatar" src="<?php echo _UPLOAD_DIR_.'Utilisateurs/'.array_shift(explode(';',$data->getAvatar()))  ?>" width="50"/></td>
                <td><?php echo $data->getPseudo()  ?></td>
                <td><?php echo $data->getEmail()  ?></td>
                <td><?php echo $data->getNom().' '.$data->getprenom() ?></td>
                 <td><?php echo $data->getNbCredits()  ?></td>
                <td><?php
                        if($data->getIs_active())
                            echo "Oui";
                        else
                            echo "Non";
                    ?>
                </td>
                <td class="last">
                    <a href="utilisateur-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a>
                    <a href="add-user-<?php echo $data->getId() ?>.html" title="editer cet utilisateur"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a>
                </td>
            </tr>
            <?php endforeach;?>
           </tbody>
        </table>

        <div class="select">
            <?php if( isset($pagination) ) echo $pagination; ?>
        </div>
    </div>