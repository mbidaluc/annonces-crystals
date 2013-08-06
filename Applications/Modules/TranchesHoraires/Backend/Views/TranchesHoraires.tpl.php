
<form method="post">
        
  <div class="table">
   <?php if(!empty($errors)): ?>
        <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
   <?php endif; ?>
   <table class="listing" cellpadding="0" cellspacing="0">
       <thead>
        <tr>
            <th class="first" width="17">Check</th>
            <th width="17">ID</th>
            <th width="17">Libelle</th>
            <th width="177">période</th>
            <th width="177">Prix</th>
        </tr>
       </thead>
       <tbody>
        <?php  foreach($datalist as $data): ?>
                <tr>
                    <td class="first style1"><input type="checkbox" name="idTranche[]" value="<?php echo $data->getIdTanche() ?>"/></td>
                    <td class="first style1"><?php echo $data->getIdTanche() ?></td>
                    <td> <input type="text" value="<?php echo $data->getLibelle() ?>" name="libelle<?php echo $data->getIdTanche(); ?>"</td>
                    <td> <?php echo $data->getHeureDeb().' - ' .$data->getHeureFin();?></td>
                    <td> <input type="text" value="<?php echo $data->getPrix() ?>" name="prix<?php echo $data->getIdTanche(); ?>"</td>
                </tr>             

        <?php endforeach;?>
       </tbody>
    </table>
        <p>
            <input type="submit" value="Modifier"/>
        </p>
    <div class="select">
        <?php if( isset($pagination) ) echo $pagination; ?>
    </div>
</div>
    </form>