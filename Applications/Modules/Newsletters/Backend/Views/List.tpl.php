<div class="top-bar">
    <h1>Gestion de la Newsletter</h1>
    <div class="breadcrumbs"><a href="newsletter.html">Newsletters</a> / Liste</div>
</div><br />
<div class="select-bar"></div>
<div class="table">
   <img src="../backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
   <img src="../backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
   <table class="listing" cellpadding="0" cellspacing="0">
        <tr>
            <th class="first" width="17">Id</th>
            <th width="177">Titre</th>
            <th>Categorie</th>
            <th>Type de Newsletter</th>
            <th>Date d'Enregistrement</th>
            <th class="last">Actions</th>
        </tr>
        <?php foreach($newsletterslist as $newsletter):  ?>
        <tr>
            <td class="first style1"><?php echo $newsletter->getId_news()  ?></td>
            <td><?php echo $newsletter->getTitre()  ?></td>
            <td><?php echo $newsletter->getCategorie() ?></td>
            <td><?php echo $newsletter->getType_envoie() ?></td>
            <td><?php echo $newsletter->getDate_news() ?></td>
            <td class="last"> <a href="newsletter-edit-<?php echo $newsletter->getId_news() ?>.html" title="modifiier"><img src="../backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="newsletter-delete-<?php echo $newsletter->getId_news() ?>.html" title="supprimer" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
            
        </tr>
        <?php endforeach;?>
    </table>
    
    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>
