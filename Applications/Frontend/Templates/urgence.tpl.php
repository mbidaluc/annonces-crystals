<?php 
    if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition['urgence']))
        $tabUrgence = $tabAnnonceByPoosition['urgence'];
?>
<?php ob_start(); ?>
<div id="annonce-urgente" class="block annonce_block block_motif_left">
    <div class="block_motif_right">
        <div class="inner_annonce_block">
            <h3 class="title-block"><a href="<?php echo _BASE_URI_;?>cms/content/urgence.html" class="ZoneAnn"><?php echo _URGENCES_; ?> [<?php echo sprintf('%02d', (isset($tabUrgence)?count($tabUrgence):0))?>]</a></h3>
            <div class="block_text">
                <ul id="urgence" class="clearfix">
                    <?php if(isset($tabUrgence) && sizeof($tabUrgence)):?>
                        <?php foreach ($tabUrgence as $an_Urgence) : ?>
                        <li class="clearfix">
                            <h4><a href="<?php echo $tools->getLinkAnnonce($an_Urgence['link_rewrite_cat'],$an_Urgence['link_rewrite'])?>" title="<?php echo htmlspecialchars($an_Urgence['designation'])?>"><?php echo htmlspecialchars($an_Urgence['designation'])?></a></h4>
                            <div><a class="wrap_img" href="<?php echo $tools->getLinkAnnonce($an_Urgence['link_rewrite_cat'],$an_Urgence['link_rewrite'])?>" title="<?php echo htmlspecialchars($an_Urgence['designation'])?>">
                                    <img src="<?php echo $tools->getLinkImage('Annonce','une',$an_Urgence['imageP'], $an_Urgence['defaultImage'])?>" alt="<?php echo htmlspecialchars($an_Urgence['designation'])?>" />
                                </a></div>
                        </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li> <?php echo _TEXTE_URGENCE_; ?></li>
                     <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>                               
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('urgence',$contentpage);
echo $contentpage;
?>