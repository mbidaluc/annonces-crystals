<?php 
    if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition['speciales']))
        $tabSpeciales = $tabAnnonceByPoosition['speciales'];  
?>
<?php ob_start(); ?>
<div id="annonces-speciales" class="clearfix">
	<h3><a href="<?php echo _BASE_URI_;?>cms/content/speciales.html"><?php echo _ANNONCES_SPECIALE_ ?> (<?php echo sprintf('%02d', (isset($tabSpeciales)?count($tabSpeciales):0))?>)</a></h3>
    <?php if(isset($tabSpeciales) && sizeof($tabSpeciales)):?>
    <ul id="annonces_speciales_scroller" class="clearfix">
        <?php foreach ($tabSpeciales as $speciales) : ?>
        <li>
			<h4><a href="<?php echo htmlspecialchars($speciales['urlSortant']);?>" title="<?php echo htmlspecialchars($speciales['designation']);?>" target="_blank"><?php echo htmlspecialchars($speciales['designation']);?></a></h4>
			<a href="<?php echo htmlspecialchars($speciales['urlSortant']);?>" title="<?php echo htmlspecialchars($speciales['designation']);?>" target="_blank"><img src="<?php echo $tools->getLinkImage('Annonce','speciale',$speciales['imageP'], $speciales['defaultImage'])?>" alt="<?php echo htmlspecialchars($speciales['designation']);?>" /></a>
			<div class="descr">
                <div class="shot_text"><?php echo $tools->getWordWrap(strip_tags($speciales['texte']),25); ?></div>
				<span class="wrap_span"><span class="contact"><?php echo _TEL_;?></span><?php echo htmlspecialchars($speciales['phone1']);?></span>
				<span class="wrap_span"><span class="contact"><?php echo _EMAIL_;?></span><?php echo htmlspecialchars($speciales['email']);?></span>
			</div>
		</li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>	
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('speciales',$contentpage);
echo $contentpage;
?>