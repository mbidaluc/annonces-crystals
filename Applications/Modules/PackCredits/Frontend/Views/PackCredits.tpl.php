<div class="table">
    <div id="pack_credit_2">
    <p><?php echo "Choisissez Votre Pack"; ?></p>
    <?php if(isset($dataList)&& is_array($dataList)){?>
         <?php foreach($dataList as $data){  ?>
             
            <div class="paiement">
                <a href="<?php echo _BASE_URI_.'modepaiementfrontpacks-'.$data->getId().'.html'; ?>">
                    <img alt="<?php echo $data->getLibelle()  ?>" src="<?php echo _UPLOAD_DIR_.'PackCredits/'.$data->getImage() ?>" width="100" />
                    <span class="credit"><?php echo $data->getLibelle()?></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;Prix : &nbsp;<span class="prix"><?php echo $data->getPrix() .' FCFA'; ?></span>
                </a>
            </div>
        <?php } }?>
       
    </div>
</div>