<?php if(!empty($infos)): ?>
       <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
   <?php endif; ?>
       
       
<div class="table">
     <?php if(isset($datalist)&&  is_array($datalist)): ?>
<ul id ="listing_annonce" class="clearfix">
    <?php $i=1; foreach ($datalist as $data): ?>
    <li class="item-elt clearfix<?php echo ($i==count($datalist)?' last_elt':'')?>">
        <a class="titre_annonce clearfix" href="" title="<?php echo $data->getAltText();?>"><?php echo $data->getAltText();?> </a>
        <div class="block_desc clearfix">
            <div class="img_annonce"><a class="wrap_img_annonce" href="" title="<?php echo $data->getAltText();?>"><img src="<?php echo $tools->getLinkImage('Annonce','meduim');?>" alt="<?php echo $data->getImage();?>" /></a></div>
            <div class="desc_annonce">
                <span class="wrap_price"><?php echo _PRICE_ANNONCE_;?><span class="price"><?php echo $tools->displayPrice($data->getFinalPrice());?></span></span>
                <div class="bottom_desc clearfix">
                    <span class="wrap_date"><?php echo _DATEDEBUT_;?><span><?php echo date_format(date_create($data->getDateBegin()), 'd/m/Y');?></span></span>
                    <span class="wrap_date"><?php echo _DATEEXPIRATION_;?><span><?php echo $dateend[$data->getId()]; ?></span></span>
                 </div>   
                    <div class="details">
                        <span class="wrap_date1"> Activé :<span class="red"><?php echo ($data->getActive())?"Oui":"Non"; ?></span></span>

                        <a class="see_more1" href="mesannoncepub-desactivate-<?php echo $data->getId() ?>.html">Desact</a> <a class="delet" href="mesannoncespub-delete-<?php echo $data->getId() ?>.html" onclick="return(confirm('Êtes-vous sûr?'));"><img src="../../../../Themes/backend/backend_images/hr.gif" style="width:16px; height:16px;" alt="Supprimer" /></a><br>
                        <span class="wrap_date1">Nombre de clicks :<span class="red"><?php echo $data->getNbClick(); ?></span></span>
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