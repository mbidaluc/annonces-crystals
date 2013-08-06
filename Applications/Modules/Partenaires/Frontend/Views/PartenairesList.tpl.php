<div class="table">
    <form method="post">
        <div id="texte-page" class="clearfix"><?php echo (isset($infosPage)?$infosPage->getContenu():'') ;?></div>
        <?php  foreach($datalist as $data){ ?>
        <?php $i = 1; if($data->getIs_active()):?>
        <div class="partenaires<?php if($i==count($datalist)) echo' last';?> clearfix">
            <div class="leftpartenaires">
                <a href="<?php echo $data->getLien(); ?>" title="<?php echo $data->getNom()  ?>">
                    <img alt="<?php echo $data->getNom()  ?>" src="<?php echo _UPLOAD_DIR_.'Partenaires/'.array_shift(explode(';',$data->getLogo()))  ?>"/>
                </a>
            </div>
            <div class="rightpartenaires">
                <h4><a href="<?php echo $data->getLien(); ?>" title="<?php echo $data->getNom()  ?>"><?php echo $data->getNom()  ?></a></h4>
                <p><?php echo $data->getDescription() ?></p>
            </div>
        </div>
        <?php $i++; endif;?>
    <?php }?>
    </form>
</div>