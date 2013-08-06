<div class="table">
   <?php echo $dataForm  ?>
   <div id="tabListing">
       <table class="listing" cellpadding="0" cellspacing="0">
           <thead>
            <tr>
                <th class="first" width="17">ID</th>
                <th width="177">nom</th>
                <th width="177">Email</th>
                <th width="177">Message</th>
            </tr>
           </thead>
           <tbody>
            <?php foreach ($dataList as $data){
                   echo ' <tr>
                        <td class="first style1">'.$data->getIdAbus() .'</td>
                        <td>'.$data->getNomSignaleur()  .'</td>
                        <td class="first style1">'.$data->getEmail().'</td>
                        <td class="first style1">'.$data->getMessage().'</td>
                    </tr>';

            }?>
           </tbody>
            </table>
   </div>

    <div class="select">
        <?php if( isset($pagination) ) echo $pagination; ?>
    </div>
   <!--<input type="submit" name="csv" value="Générer Le fichier CSV" />-->
</form>
</div>