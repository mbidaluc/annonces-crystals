<?php 
    if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition['mobiles']))
        $tabMobiles = $tabAnnonceByPoosition['mobiles'];
?>
<?php ob_start(); ?>
<div id="annonces-mobiles" class="clearfix">
	<h3><a href="<?php echo _BASE_URI_;?>cms/content/mobiles.html" title="<?php echo _ALL_ANNONCES_MOBILES_ ?>"><?php echo _ANNONCES_MOBILES_ ?> (<?php echo sprintf('%02d', (isset($tabMobiles)?count($tabMobiles):0))?>)</a></h3>
    <?php if(isset($tabMobiles) && sizeof($tabMobiles)):?>
	<ul>
        <?php foreach ($tabMobiles as $mobiles) : ?>
        <li>
            <div class="text_an"><label><?php echo _LABEL_ANNONCES_MOBILE_?></label><a href="#" title="<?php echo htmlspecialchars($mobiles['designation']);?>" target="_blank"><?php echo htmlspecialchars_decode(htmlspecialchars(strip_tags($mobiles['texte'])));?></a>
            </div>
        
        </li>
        <?php endforeach; ?>
	</ul>
    <?php endif; ?>
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('mobile',$contentpage);
echo $contentpage;
?>