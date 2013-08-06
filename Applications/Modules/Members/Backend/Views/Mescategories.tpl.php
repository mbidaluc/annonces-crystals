
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
<div class="table">
   <img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
   <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
   <table class="listing" cellpadding="0" cellspacing="0">
        <tr>
            <th class="first" width="17">ID</th>
            <th width="177">Catégories</th>
            <th width="177">Image</th>
            <th>Description</th>
            <th class="last">Actions</th>
        </tr>
        <?php  foreach($datalist as $data):  
                //$decalage = '';
                //$decalage = str_pad($decalage, $data->getLength(), '>');            
        ?>
                <tr>
                    <td class="first style1"><?php echo $data->idFils ?></td>
                    <td class="first style1"><?php echo $data->libelle ?></td>
                    <td><img alt="<?php echo $data->libelle  ?>" src="<?php echo _UPLOAD_DIR_.'Categories/'.array_shift(explode(';',$data->image))  ?>" width="100"/></td>
                    <td ><?php echo $data->description ?></td>
                    <td class="last"></td>
                </tr>             

        <?php endforeach;?>
    </table>

    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>