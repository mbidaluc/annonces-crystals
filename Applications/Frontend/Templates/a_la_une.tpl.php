<?php 
 //var_dump($configurations);
    if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition['a_la_une']))
        $tabUne = $tabAnnonceByPoosition['a_la_une'];   
?>
<?php ob_start(); ?>
<div id="annonce-une" class="block annonce_block block_motif_left">
    <div class="block_motif_right">
        <div class="inner_annonce_block">
            <h3 class="title-block"><a href="<?php echo _BASE_URI_;?>cms/content/alaune.html" class="ZoneAnn"><?php echo _A_LA_UNE_; ?> [<?php echo sprintf('%02d', (isset($tabUne)?count($tabUne):0))?>]</a></h3>
            <div class="block_text">
                <ul id="a_la_une" class="clearfix">
                    <?php if(isset($tabUne) && sizeof($tabUne)):?>
                        <?php foreach ($tabUne as $an_Une) : ?>
                        <li class="clearfix">
                            <h4><a href="<?php echo $tools->getLinkAnnonce($an_Une['link_rewrite_cat'],$an_Une['link_rewrite'])?>" title="<?php echo htmlspecialchars($an_Une['designation'])?>"><?php echo htmlspecialchars($an_Une['designation'])?></a></h4>
                            <div><a class="wrap_img" href="<?php echo $tools->getLinkAnnonce($an_Une['link_rewrite_cat'],$an_Une['link_rewrite'])?>" title="<?php echo htmlspecialchars($an_Une['designation'])?>">
                                    <img src="<?php echo $tools->getLinkImage('Annonce','une',$an_Une['imageP'], $an_Une['defaultImage'])?>" alt="<?php echo htmlspecialchars($an_Une['designation'])?>" />
                                </a></div>
                        </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <li>
                        <h4><a href="#" title="Plus de 12 séminaires de formation">Plus de 12 séminaires de formation</a></h4>
                        <div><a class="wrap_img" href="#" title="Plus de 12 séminaires de formation"><img src="<?php echo _UPLOAD_DIR_?>Annonce/img_une.png" alt="Plus de 12 séminaires de formation" /></a></div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('a_la_une',$contentpage);
echo $contentpage;
?>