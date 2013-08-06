<img src="../Themes/backend/backend_images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="../Themes/backend/backend_images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th width="120"></th>
            <th width="120">Pack</th>
            <!--<th width="120">Mode de Paiement</th>
            <th width="120">Pseudo Client</th>-->
            <th width="150">Nom Expéditeur</th>
            <th>Montant</th>
            <!--<th>Bordereau</th>-->
            <th>Tel</th>
            <th>MDP</th>
            <th>Ville</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
    <?php if(isset($dataList)&& is_array($dataList)):?>
        <?php foreach($dataList as $data):  ?>
            <tr>
                <td ><input type="checkbox" name="eltcheck[]" class="elttocheck" value="<?php echo $data->id; ?>"></td>
                <td><?php echo $data->nompack.'('.$data->prixpack.' FCFA)'?></td>
                <!--<td><img alt="<?php echo $data->nommp  ?>" src="<?php echo _UPLOAD_DIR_.'PaiementMod/'.array_shift(explode(';',$data->logo));  ?>" width="100"/> <span><?php echo $data->nommp  ?></span></td>
                <td><?php echo $data->prenom.' '.$data->nom .'('.$data->pseudo.')' ?></td>-->
                <td><?php echo $data->nom_expediteur ?></td>
                <td><?php echo $data->montant ?></td>
                <!--<td><?php echo $data->num_bordero ?></td>-->
                <td><?php echo $data->num_tel ?></td>
                <td><?php echo $data->password ?></td>
                <td><?php echo $data->ville ?></td>
                <td><?php echo $data->paiementEff?'Paiement effectué':'En attente de paiement' ?></td>
                <td>
                    <?php if ($data->paiementEff){ ?>
                    <a href="desactivate-credit-<?php echo $data->id; ?>.html">desactiver</a>
                    <?php }else{ ?>
                    <a href="#" onclick="validateOrderPack(<?php echo $data->id; ?>)">activer</a>
                    <?php }?>
                </td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>
        </tbody>
    </table>
    <div class="select">
        <?php if( isset($pagination) ) echo $pagination; ?>
    </div>