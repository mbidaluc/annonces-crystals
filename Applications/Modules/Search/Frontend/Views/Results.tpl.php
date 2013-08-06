<?php if(isset($dataList)&&  is_array($dataList)): ?>
<ul id ="listing_annonce" class="clearfix">
    <?php $i=1; foreach ($dataList as $data): ?>
    <li class="item-elt clearfix<?php echo ($i==count($dataList)?' last_elt':'')?>">
        <a class="titre_annonce clearfix" href="<?php echo $tools->getLinkAnnonce($categoriesL[$data->getId()],$data);?>" title="<?php echo $data->getDesignation();?>"><?php echo $data->getDesignation();?> <span class="country">[<?php echo $data->getPays();?>]</span></a>
        <div class="block_desc clearfix">
            <div class="img_annonce"><a class="wrap_img_annonce" href="<?php echo $tools->getLinkAnnonce($categoriesL[$data->getId()],$data);?>" title="<?php echo $data->getDesignation();?>"><img src="<?php 
			if(isset($images[$data->getId()]))
				$img = $images[$data->getId()];
			else
				$img = "";
			echo $tools->getLinkImage('Annonce','meduim',$img,$categoriesL[$data->getId()]->getDefaultAnnonceImage());?>" alt="<?php echo $data->getDesignation();?>" /></a></div>
            <div class="desc_annonce">
                <div class="texte_desc"><?php echo $data->getTexte();?></div>
                <span class="wrap_price"><?php echo _PRICE_ANNONCE_;?><span class="price"><?php echo $tools->displayPrice($data->getPrixTotal());?></span></span>
                <div class="bottom_desc clearfix">
                    <span class="wrap_date"><?php echo _DATEDEBUT_;?><span><?php echo date_format(date_create($data->getDateDebut()), 'd/m/Y');?></span></span>
                    <span class="wrap_date"><?php echo _DATEEXPIRATION_;?><span><?php echo date_format(date_create($data->getDateexp()), 'd/m/Y');?></span></span>
                    <a href="<?php echo $tools->getLinkAnnonce($categoriesL[$data->getId()],$data);?>" title="<?php echo $data->getDesignation();?>" class="see_more"><?php echo _SEE_MORE_;?></a>
                </div>
            </div>
        </div>
    </li>
    <?php $i++; endforeach;?>
</ul>
<form id="paramSearch" name="paramSearch" method="post">
    <input type="hidden" name="search_text_ajax" value="<?php echo $paramsearch['chps']?>"/>
    <input type="hidden" name="category_ajax" value="<?php echo htmlentities($paramsearch['categorie'])?>"/>
    <input type="hidden" name="search_ville_ajax" value="<?php echo $paramsearch['ville']?>"/>
    <input type="hidden" name="search_price_min_ajax" value="<?php echo $paramsearch['prixmin']?>"/>
    <input type="hidden" name="search_price_max_ajax" value="<?php echo $paramsearch['prixmax']?>"/>
</form>
<?php else:?>

<?php endif; ?>