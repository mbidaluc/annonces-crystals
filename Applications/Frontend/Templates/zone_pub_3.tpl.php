<div id="banner-position-3">  
    <?php if(isset($tabAnnonceByPositionPub) && isset($tabAnnonceByPositionPub['pub_3']) && sizeof($tabAnnonceByPositionPub['pub_3'])):
        $tabZonePub = $tabAnnonceByPositionPub['pub_3'];
        $ext = strrchr($tabZonePub[0]['image'], '.');
    ?>
        <?php if(in_array($ext,$tools->getArrayImgExtension())): ?>
            <a href="<?php echo $tabZonePub[0]['link']!=''?$tabZonePub[0]['link'].'#':'#'; ?>" target="_blank" class="annPub" id="imagepub_<?php echo $tabZonePub[0]['id']; ?>"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_3',$tabZonePub[0]['image'])?>" alt="img" /></a>
        <?php elseif(in_array($ext,$tools->getArraySWFExtension())):?>
            <?php $tools->includeFileTemplates('_flash',array('tools'=>$tools,'banner_link'=>$tabZonePub[0]['image'],'cache'=>$cache,'width'=>229,'height'=>359)); ?>
        <?php else: ?>
            <a href="#" title="<?php echo _CLICK_TO_ADD_BANNER_;?>"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_3')?>" alt="image" /></a>   
        <?php endif; ?>
	<?php else: ?>
         <a href="#" title="<?php echo _CLICK_TO_ADD_BANNER_;?>"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_3')?>" alt="imagine" /></a>   
    <?php endif;?>
</div>