<div id="banner-top">  
<?php 
    
    if(isset($tabAnnonceByPositionPub) && isset($tabAnnonceByPositionPub['pub_6'])){
        $tabZonePub = $tabAnnonceByPositionPub['pub_6'];
        
?>

    <?php 
        if(isset($tabZonePub) && sizeof($tabZonePub)){
    ?>
            <a href="<?php echo $tabZonePub[0]['link']; ?>" target="_blank"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_6',$tabZonePub[0]['image'])?>" alt="img" /></a>
    <?php }
        else{
    ?>
         <a href="#" title="<?php echo _CLICK_TO_ADD_BANNER_;?>"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_6')?>" alt="img" /></a>   
    <?php
        }
	}else{
    ?>
         <a href="#" title="<?php echo _CLICK_TO_ADD_BANNER_;?>"><img src="<?php echo $tools->getLinkImage('Adversiting','pub_6')?>" alt="img" /></a>   
    <?php
	}
    ?>
</div>