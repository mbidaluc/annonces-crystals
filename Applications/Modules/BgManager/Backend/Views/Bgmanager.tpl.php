<div class="top-bar">
    <h1>Gestion des Background</h1>
    <div class="breadcrumbs"><a href="bgmanager.html">Liste des pages</a></div>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<form name="" action="actiongroupedpage.html" method="post" id="groupaction">
    <div id="toolsbar">
        <ul>
            <li><a href="#" id="checkall">tout cocher</a></li>
            <li><a href="#" id="uncheckall">tout décocher</a></li>
            <li>
                <select name="actionselect" id="actionselect">
                    <option value="">Pour la selection</option>
                    <option value="delete">Supprimer</option>
                    <option value="active">activer</option>
                    <option value="unactive">desactiver</option>
                    <option value="deletebg">supprimer l'arrière plan de la page cms</option>
                    <option value="deletebgbody">supprimer l'arrière plan de la page</option>
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
                <th></th>
                <th class="first" width="17">Titre</th>
                <th class="" width="50">Identifiant</th>
                <th width="177">Arrière plan page</th>
                <th width="177">Arrière plan body</th>
                <th width="177">Activé</th>
                <th>Repétition X</th>
                <th>Repétition Y</th>
                <th class="last">Actions</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach($datalist as $key => $data):  ?>
            <tr>
                <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $data->getId(); ?>"></td>
                <td class="first style1"><?php echo $data->getTitre() ?></td>
                <td><?php echo $data->getIdentifiant();?></td>
                <td>
                    <?php if($data->getBgImage()!=''){?>
                    <div class="ui-widget-content ui-corner-tr" > <a href="BgManager-detail-<?php echo $data->getId() ?>.html" title="plus de détail"><img alt="<?php echo $data->getTitre()  ?>" src="<?php echo _UPLOAD_DIR_.'BgManager/'.$data->getBgImage()  ?>" width="100" id="img<?php echo $data->getId(); ?>"/></a>
                    <a href="bgmanager-deletebg-<?php echo $data->getId() ?>.html" id="<?php echo $data->getId(); ?>" title="Supprimer cet arrière plan" class="ui-icon ui-icon-trash">Delete image</a>
                    </div>
                    <?php } ?>
                </td>
                 <td>
                    <?php if($data->getBgImageBody()!=''){?>
                    <div class="ui-widget-content ui-corner-tr" > <a href="BgManager-detail-<?php echo $data->getId() ?>.html" title="plus de détail"><img alt="<?php echo $data->getTitre()  ?>" src="<?php echo _UPLOAD_DIR_.'BgManager/'.$data->getBgImageBody()  ?>" width="100" id="img<?php echo $data->getId(); ?>"/></a>
                    <a href="bgmanager-deletebgbody-<?php echo $data->getId() ?>.html" id="<?php echo $data->getId(); ?>" title="Supprimer cet arrière plan" class="ui-icon ui-icon-trash">Delete image</a>
                    </div>
                    <?php } ?>
                </td>
                <td><?php 
                            if($data->getActived())
                                echo 'OUI';
                            else
                                echo 'NON';
                    ?>
                </td>
                <td><?php
                            if($data->getRepeatX())
                                echo 'OUI';
                            else
                                echo 'NON';
                    ?>
                </td>
                <td><?php
                            if($data->getRepeatY())
                                echo 'OUI';
                            else
                                echo 'NON';
                    ?>
                </td>
                <td class="last"><a href="bgmanager-editpage-<?php echo $data->getId() ?>.html"><img src="../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="&Eacute;diter" /></a> <a href="bgmanager-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a> </td>
            </tr>
            <?php endforeach;?>
           </tbody>
        </table>

        <div class="select">
            <?php if( isset($pagination) ) echo $pagination; ?>
        </div>
    </div>
    <input type="hidden" name="actiontodo" value="./actiongroupedpage.html" id="actiontodo" />
</form>