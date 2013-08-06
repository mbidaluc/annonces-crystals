
<div class="table">
     
<ul id ="listing_annonce" class="clearfix">
    <?php $i=1; foreach ($dataList as $data): ?>
    <li class="item-elt clearfix<?php echo ($i==count($dataList)?' last_elt':'')?>">
        <div class="block_desc clearfix">
            <div class="img_annonce"><a class="wrap_img_annonce" href="#" ><img src="<?php echo _UPLOAD_DIR_.'PackCredits/'.$data->image  ?>" /></a></div>
            <div class="desc_annonce">
                <div class="texte_desc">
                    Pack <?php echo $data->nompack;?>
                    <br> <br>
                    Crédits: <?php echo $data->credit;?> cdts
                </div>
                <span class="wrap_price">Montant: <span class="price"><?php echo $tools->displayPrice($data->montant);?></span></span>
                <div class="bottom_desc clearfix">
                    <span class="wrap_date">Bordero: <span><?php echo $data->num_bordero;?></span></span>
                    <span class="wrap_date">Ville: <span><?php echo $data->ville ?></span></span>
                    <div class="details">
                        <span class="wrap_date"> Statut: <span><?php echo $data->paiementEff?'Paiement effectué':'En attente de paiement' ?></span></span>
                    </div>
              </div>
            </div>
        </div>
    </li>
    <?php $i++; endforeach;?>
</ul>
</div>