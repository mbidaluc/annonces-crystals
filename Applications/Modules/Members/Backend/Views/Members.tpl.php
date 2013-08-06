<table class="listing" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Activé</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($datalist as $value): ?>
            <tr>
                <td><?php echo $value->getId_member()  ?></td>
                <td><?php echo $value->getNom_membre()  ?></td>
                <td><?php echo $value->getEmail_member()  ?></td>
                 <td><?php echo $value->getPhone()  ?></td>
                <td><?php echo $value->getIs_actived()  ?></td>
                <td><a href="categories-list-<?php echo $value->getId_member(); ?>.html" title="Mes catégories" >Mes Cat </a> <a href="membres-delete-<?php echo $value->getId_member() ?>.html" title="supprimer" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
            </tr>
        <?php endforeach; ?>
 
    </tbody>
</table>
 <div class="select">
        <?php if( isset($pagination) ) echo $pagination; ?>
    </div>