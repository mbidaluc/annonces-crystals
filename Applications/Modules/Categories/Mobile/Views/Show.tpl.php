<?php 

if($cache->isCache($page_index)):
    echo $cache->load($page_index);
else:    
ob_start();
?>
<?php if(isset($dataList)&&  is_array($dataList)): ?>
<ul id ="listing_annonce" class="clearfix">
    <?php $i=1; foreach ($dataList as $data): ?>
    <li class="item-elt clearfix<?php echo ($i==count($dataList)?' last_elt':'')?>">
        <a class="titre_annonce clearfix" href="<?php echo $tools->getLinkAnnonce($category,$data);?>" title="<?php echo $data->getDesignation();?>"><?php echo $data->getDesignation();?> <span class="country">[<?php echo $data->getPays();?>]</span></a>
        <div class="block_desc clearfix">
            <div class="img_annonce"><a class="wrap_img_annonce" href="<?php echo $tools->getLinkAnnonce($category,$data);?>" title="<?php echo $data->getDesignation();?>"><img src="<?php 
			if(isset($images[$data->getId()]))
				$img = $images[$data->getId()];
			else
				$img = "";
			echo $tools->getLinkImage('Annonce','meduim',$img,$category->getDefaultAnnonceImage());?>" alt="<?php echo $data->getDesignation();?>" /></a></div>
            <div class="desc_annonce">
                <div class="texte_desc"><?php echo $data->getTexte();?></div>
                <span class="wrap_price"><?php echo _PRICE_ANNONCE_;?><span class="price"><?php echo $tools->displayPrice($data->getPrixTotal());?></span></span>
                <div class="bottom_desc clearfix">
                    <span class="wrap_date"><?php echo _DATEDEBUT_;?><span><?php echo date_format(date_create($data->getDateDebut()), 'd/m/Y');?></span></span>
                    <span class="wrap_date"><?php echo _DATEEXPIRATION_;?><span><?php echo date_format(date_create($data->getDateexp()), 'd/m/Y');?></span></span>
                    <a href="<?php echo $tools->getLinkAnnonce($category,$data);?>" title="<?php echo $data->getDesignation();?>" class="see_more"><?php echo _SEE_MORE_;?></a>
                </div>
            </div>
        </div>
    </li>
    <?php $i++; endforeach;?>
</ul>
<?php endif; ?>
<?php 
    $contentpage = ob_get_clean();
    $cache->setCache($page_index,$contentpage);
    
    echo $contentpage;
    
endif;
?>