<?php 
    if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition['evenements']))
        $tabEvenements = $tabAnnonceByPoosition['evenements'];
?>
<?php ob_start(); ?>
<div id="annonce-evenement" class="block annonce_block block_motif_left">
	<div class="block_motif_right">
		<div class="inner_annonce_block">
                    <h3 class="title-block"><a href="<?php echo _BASE_URI_;?>cms/content/evenements.html" class="ZoneAnn"><?php echo _EVENEMENTS_; ?> [<?php echo sprintf('%02d', (isset($tabEvenements)?count($tabEvenements):0))?>]</a></h3>
			<div class="block_text">
			   <?php if(isset($tabEvenements) && sizeof($tabEvenements)):?>
				<ul>
					<?php foreach ($tabEvenements as $evenements) : ?>
					<li>
						<h4><a href="<?php echo htmlspecialchars($evenements['urlSortant']);?>" title="<?php echo htmlspecialchars($evenements['designation']);?>" target="_blank"><?php echo htmlspecialchars($evenements['designation']); ?></a></h4>
						<div><?php echo htmlspecialchars_decode(htmlspecialchars($evenements['texte'])); ?></div>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div> 
	</div>
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('evenements',$contentpage);
echo $contentpage;
?>