<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<form name="" action="annonce.html" method="post" id="groupaction">
    <div id="toolsbar">
        <ul>
            <li><a href="#" id="checkall">tout cocher</a></li>
            <li><a href="#" id="uncheckall">tout décocher</a></li>
            <li>
                <select name="actionselect" id="actionselect">
                    <option value="">Pour la selection</option>
                    <option value="delete">Supprimer</option>
                    <!--<option value="active">activer</option>
                    <option value="unactive">desactiver</option>-->
                </select>
            </li>
            <li>
                <input type="text" value="recherche" name="searchzone" id="searchzone" />
            </li>
            <li>
                <input type="button" value="rechercher" id="btnsearchzone" />
            </li>
        </ul>
    </div>
    <div class="table">
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
                        <td class="last"><a href="annonce-details-<?php echo $data->getId() ?>.html">Détails</a> <a href="annonce-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a> <a href="annonce-edit-<?php echo $data->getId() ?>.html" ><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="Modifier" /></a></td>
                    </tr>             

            <?php endforeach;?>
           </tbody>
        </table>

        <div class="select">
            <?php if( isset($pagination) ) echo $pagination; ?>
        </div>
    </div>
    <!--<div id="loadingmessage" style="display:none; margin: auto;">
        <img src="<?php echo _WEB_IMG_DIR_.'ajax-loader.gif'?>" />
    </div>-->
    <input type="hidden" name="actiontodo" value="./actiongrouped.html" id="actiontodo" />
</form>
