<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<div class="table">
      <?php if(isset($datalist)&&  is_array($datalist)): ?>
<ul id ="listing_annonce" class="clearfix">
    <?php $i=1; foreach ($datalist as $data): ?>
    <li class="item-elt clearfix<?php echo ($i==count($datalist)?' last_elt':'')?>">
        <a class="titre_annonce clearfix" href="mesannonces-edit-<?php echo $data->getId() ?>.html" title="<?php echo $data->getDesignation();?>"><?php echo $data->getDesignation();?> <span class="country">[<?php echo $data->getPays();?>]</span></a>
        <div class="block_desc clearfix">
            <div class="img_annonce"><a class="wrap_img_annonce" href="mesannonces-edit-<?php echo $data->getId() ?>.html" title="<?php echo $data->getDesignation();?>"><img src="<?php
			if(isset($images[$data->getId()]))
				$img = $images[$data->getId()];
			else
				$img = "";
			 echo $tools->getLinkImage('Annonce','meduim', $img, $categories[$data->getId()][0]->getDefaultAnnonceImage());?>" alt="<?php echo $data->getDesignation();?>" /></a></div>
            <div class="desc_annonce">
                <div class="texte_desc"><?php echo $data->getTexte();?></div>
                <span class="wrap_price"><?php echo _PRICE_ANNONCE_;?><span class="price"><?php echo $tools->displayPrice($data->getPrixTotal());?></span></span>
                <div class="bottom_desc clearfix">
                    <span class="wrap_date"><?php echo _DATEDEBUT_;?><span><?php echo date_format(date_create($data->getDateDebut()), 'd/m/Y');?></span></span>
                    <span class="wrap_date"><?php echo _DATEEXPIRATION_;?><span><?php echo $data->getDateexp() ?></span></span>
                    <div class="details">
                        <span class="wrap_date1"> Activé :<span class="red"><?php echo ($data->getIs_actived())?"Oui":"Non"; ?></span></span> <span class="wrap_date1">Nombre de clicks :<span class="red"><?php echo $data->getNbClick(); ?></span></span>
                    <a class="see_more1" href="mesannonce-desactivate-<?php echo $data->getId() ?>.html">Desact</a> <a class="delet" href="mesannonces-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../../../../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a> <a class="modif" href="mesannonces-edit-<?php echo $data->getId() ?>.html" ><img src="../../../../Themes/backend/backend_images/edit-icon.gif" style="width:16px; height:16px;" alt="Modifier" /></a>
                    </div>
              </div>
            </div>
        </div>
    </li>
    <?php $i++; endforeach;?>
</ul>
<?php endif; ?>
 
  

    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>