
<div class="table">
    <p><?php echo _CHOOSE_PAYMENT_; ?></p>
    <?php if(isset($dataList)&& is_array($dataList)):?>
         <?php $i = 1; foreach($dataList as $data):  
             if($data->getIs_actived()){?>
    <div class="paiement<?php if($i==count($dataList)) echo' last';?>">
        <a title="<?php echo _BASE_URI_.'paiementfront-'.$data->getId().'.html'; ?>" href="<?php echo trim($data->getLien())!=""?"http://".$data->getLien():"#ModalFormPaiement"; ?>" target="<?php echo trim($data->getLien())!=""?"_blank":""; ?>" ><img alt="<?php echo $data->getNom()  ?>" src="<?php echo _UPLOAD_DIR_.'PaiementMod/'.array_shift(explode(';',$data->getLogo()))  ?>" width="100"/>

        <span><?php echo $data->getDescription() ?></span></a>
    </div>
        <?php $i++;
             }
        endforeach;?>
        <?php endif;?>
   
</div>

<div id="ModalFormPaiement" style="display: none;">
    
</div>