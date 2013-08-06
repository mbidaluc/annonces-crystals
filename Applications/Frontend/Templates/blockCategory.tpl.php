<?php ob_start(); ?>
<div class="block_motif_right">
	<div class="inner_annonce_block">
		<h3 class="title-block" title="<?php echo $category_parent->getLibelle(); ?>"><?php echo $tools->truncate($category_parent->getLibelle(),14,'...'); ?> [<?php echo sprintf('%02d', $total);?>]</h3>
		<div class="block_text item_category">
            <?php 
            //var_dump($listedesannonces);
            if(sizeof($subCat)){?>
			<ul>
				<?php $jj=1; foreach ($subCat as $cat):?>
				<li class="item_cat<?php echo ($category->getIdFils()==$cat->getIdFils()?' current':'').($jj==count($subCat)?' last_elt_cat':'')?>"><a href="<?php echo _BASE_URI_?><?php echo $cat->getLink_rewrite();?>" title="<?php echo $cat->getLibelle(); ?>"><?php echo $tools->truncate($cat->getLibelle(),25,'...'); ?>&nbsp;
					[<?php echo sprintf('%02d', (isset($countAnnonceSubCat[$cat->getIdFils()])?$countAnnonceSubCat[$cat->getIdFils()]:0));?>]
					</a></li>
				 <?php $jj++; endforeach; ?>
			</ul>
            <?php }else{
                if(sizeof($listedesannonces)){
                    echo '<ul class="categorie_scroller">';
                    foreach ($listedesannonces as $data):
            ?>
                        <li>
                            <h4><a href="<?php echo $tools->getLinkAnnonce($category,$data);?>" title="<?php echo $data->getDesignation();?>" ><?php echo $data->getDesignation();?> <!--<span class="country">[<?php echo $data->getPays();?>]</span>--></a></h4>
                            <div><?php echo $tools->getWordWrap(strip_tags($data->getTexte()),50); ?></div>
                        </li>
                                                   
            <?php
                    endforeach;
                    echo "</ul>";
                }
            } ?>
		</div>
	</div>
</div>
<?php 
    $contentpage = ob_get_clean();
    echo $category->getLink_rewrite();
    $cache->setCache($category->getLink_rewrite().'_blockCategory',$contentpage);
    
    echo $contentpage;
?>