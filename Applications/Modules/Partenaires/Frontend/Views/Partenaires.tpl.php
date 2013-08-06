<div class="table">
    <?php if(!empty($errors)): ?>
        <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
    <?php endif; ?>
    
    <form method="post">
        <div id="texte-page" class="clearfix"><?php echo (isset($infosPage)?$infosPage->getContenu():'') ;?></div>
        <?php if(isset($dataList)&& is_array($dataList)):?>
            <?php $i = 1; foreach($dataList as $data):  
                if($data->getIs_active()){?>
                    <div class="partenaires<?php if($i==count($dataList)) echo' last';?> clearfix">
                        <div class="leftpartenaires">
                            <input name="partenaire[]" type="checkbox" value="<?php echo $data->getId(); ?>" />
                            <a href="<?php echo $data->getLien(); ?>" title="<?php echo $data->getNom()  ?>">
                                <img alt="<?php echo $data->getNom()  ?>" src="<?php echo _UPLOAD_DIR_.'Partenaires/'.array_shift(explode(';',$data->getLogo()))  ?>"/>
                            </a>
                        </div>
                        <div class="rightpartenaires">
                            <h4><a href="<?php echo $data->getLien(); ?>" title="<?php echo $data->getNom()  ?>"><?php echo $data->getNom()  ?></a></h4>
                            <p><?php echo $data->getDescription() ?></p>
                        </div>
                    </div>
            <?php $i++;
                }
            endforeach;?>
            <?php endif;?>

        <div id="registerInfos">
            <p><label>Téléphone</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>"/>
            </p>
            <p><label>Email</label>
                <input type="text" name="email_member" value="<?php echo $email; ?>"/>
            </p>
        </div>
        <p class="center">
            <span class="left-bouton">
                <span class="right-bouton">
                    <input id="submitpartner" type="submit" value="Suivant" />
                </span>            
            </span>
        </p>
</form>    
</div>