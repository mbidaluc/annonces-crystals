<img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
<img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
<table class="listing" cellpadding="0" cellspacing="0"  >
    <thead>
         <tr>
             <th></th>
             <th class="first">ID</th>
             <th >Image</th>
             <th >Catégories</th>
             <th >Afficher en FO</th>
             <th >Description</th>
             <th class="last">Actions</th>
         </tr>
    </thead>
    <tbody>
         <?php  foreach($datalist as $data):  
                 $decalage = '';
                 $decalage = str_pad($decalage, $data->getLength(), '>');            
         ?>
                 <tr>
                     <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $data->getIdFils(); ?>"></td>
                     <td class="first style1"><?php echo $data->getIdFils() ?></td>
                     <td><img alt="<?php echo $data->getLibelle()  ?>" src="<?php echo _UPLOAD_DIR_.'Categories/'.array_shift(explode(';',$data->getImage()))  ?>" width="100"/></td>
                     <td class="first style1"><?php echo $decalage.$data->getLibelle() ?></td>
                     <td class="first style1"><?php echo ($data->getFrontVisitility())?'OUI':'NON'; ?></td>
                     <td ><?php echo $data->getDescription() ?></td>
                     <td class="last"><a href="categories-edit-<?php echo $data->getIdFils() ?>.html"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="categories-delete-<?php echo $data->getIdFils() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a></td>
                 </tr>             

         <?php endforeach;?>
     </tbody>

 </table>


 <div class="select">
     <?php if( isset($pagination) ) echo $pagination; ?>
 </div>