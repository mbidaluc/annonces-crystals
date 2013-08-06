<div class="top-bar">
    <h1>Paiements Validés</h1>
</div><br />
<form name="" action="annonce.html" method="post" id="groupaction">
    <input type="hidden" name="statuspack" value="1" />
    <div id="toolsbar">
        <ul>
            <li><a href="#" id="checkall">tout cocher</a></li>
            <li><a href="#" id="uncheckall">tout décocher</a></li>
            <li>
                <select name="actionselect" id="actionselect">
                    <option value="">Pour la selection</option>
                    <option value="delete">Supprimer</option>
                    <!--<option value="active">activer le paiement</option>
                    <option value="unactive">desactiver le paiement</option>-->
                </select>
            </li>
        </ul>
    </div>
    <div class="table">

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

    </div>
    <input type="hidden" name="actiontodo" value="./actiongroupedpc.html" id="actiontodo" />
</form>

<a href="#validatepaiement" id="fancy_auto"></a>
<div id="validatepaiement" style="display: none;">
    <form method="post" id="formcontrole">
        <p>
            <label>Mot de passe</label>
            <input type="password" name="pwd" />
        </p>
       
        <p>
            <label>Montant</label>
            <input type="text" name="montant" />
        </p>
        <p>
            <label>Bordero</label>
            <input type="text" name="bordero" />
        </p>
        <input type="hidden" name="id" value="" id="id_op"/>
        <input type="button" value="vérifier" id="getvalidate" />
    </form>
</div>


