<div class="table">
   <img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
   <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
   <?php echo $dataForm  ?>
   <div id="tabListing">
    <table class="listing" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="first" width="17">ID</th>
                <th width="177">téléphone</th>
                <th width="177">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach($datalist as $data):  ?>
                    <tr>
                        <td class="first style1"><?php echo $data->getId_member() ?></td>
                        <td><?php echo $data->getPhone()  ?></td>
                        <td class="first style1"><?php echo $data->getEmail_member() ?></td>   
                    </tr>             

            <?php endforeach;?>
        </tbody>
        </table>
   </div>

    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
   <input type="submit" name="csv" value="Générer Le fichier CSV" />
</form>
</div>