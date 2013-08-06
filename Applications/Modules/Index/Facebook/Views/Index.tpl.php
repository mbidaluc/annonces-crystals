<?php 

if($cache->isCache($page_index)):
    echo $cache->load($page_index);
else:    
ob_start();
?>
<div id="midle">
    <div id="block-title3" class="title_pagination">
         <div class="inner_title_pagination">
             <div class="inner2_title_pagination">
                 <h1 id="h1_title"><?php echo isset($title_p)?$title_p:''; ?></h1>
             </div>
         </div>
    </div>
    <div id="top_mmidle">
        <?php if(isset($dataListfacebook) && is_array($dataListfacebook)): ?>
        <ul id="duplexx">
            <?php $i=1; foreach ($dataListfacebook as $data): ?>
            <?php if($i==1) $class='first'; elseif($i%3==0) $class ='last_elt_line clearfix'; elseif($i==count($dataListfacebook)) $class ='last clearfix'; else $class ='alt_item'; ?>
            <li class="large <?php echo $class; ?>">
                <div class="title_pagination_d">
                    <div class="inner_title_pagination_d">
                        <div class="inner2_title_pagination_d">
                            <div class="tex">
                             <p class="blue"><a href="<?php echo $tools->getLinkAnnonce($data['link_rewrite_cat'],$data['link_rewrite'])?>" title="<?php echo htmlspecialchars($data['designation'])?>"><?php echo htmlspecialchars($tools->truncate($data['designation'],15,'...'))?></a><span class="green">[<?php echo $data['pays'];?>]</span></p>
                             <a class="wrap_img" href="<?php echo $tools->getLinkAnnonce($data['link_rewrite_cat'],$data['link_rewrite'])?>" title="<?php echo htmlspecialchars($data['designation'])?>">
                                    <img src="<?php echo $tools->getLinkImage('Annonce','une',$data['imageP'], $data['defaultImage'])?>" alt="<?php echo htmlspecialchars($data['designation'])?>" />
                                </a>
                             <p class="texte5"><?php echo $tools->truncate($data['texte'],130,' ...');?></p>
                             <p class="blue1"> Prix:<span class="red"><?php echo $data['prixTotal'];?>Fcfa</span></p>
                             <p class="blue2"> Publié le: <span class="black"><?php echo date_format(date_create($data['dateDebut']), 'd/m/y');?></span>
                                 Expire le:<span  class="black"><?php echo date_format(date_create($data['dateexp']), 'd/m/y');?></span></p>
                             <span class="fleche"><img src="<?php echo _GENERAL_THEME_DIR.'facebook/'; ?>images/green_arrow.png"/><a href="" title="">&nbsp; Voir details de l'annonce</a></span>                                                           
                             </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php $i++; endforeach;?>
        </ul>
        <?php endif; ?>
    </div>
    <div id="block-title1" class="title_pagination1">
         <div class="inner_title_pagination">
             <div class="inner2_title_pagination">
                 <h1 id="h1_title2"><?php echo isset($title_p)?$title_p:''; ?></h1>
             </div>
         </div>
    </div>
</div>
<?php if(isset($dataList)&&  is_array($dataList)): ?>
<ul id ="category_home" class="clearfix">
    <?php $i=1; foreach ($dataList as $data): ?>
    <?php if($i==1) $class='first'; elseif($i%4==0) $class ='last_elt_line clearfix'; elseif($i==count($dataList)) $class ='last clearfix'; else $class ='alt_item'; ?>
    <li class="item <?php echo $class; ?>">
        <a class="titre_cat" href="<?php  echo $tools->getLinkCategory($data);?>" title="<?php echo $data->getLibelle();?>">
            <?php echo $tools->truncate($data->getLibelle(),18,'...');?>
            <span class="quantity_a">[<?php echo sprintf('%02d', (isset($count_annonce[$data->getIdFils()])?$count_annonce[$data->getIdFils()]:0));?>]</span>
        </a>
        <div class="c_img_cat"><a class="wrap_img_cat" href="<?php echo $tools->getLinkCategory($data);?>" title="<?php echo $data->getLibelle();?>"><img src="<?php echo $tools->getLinkImage('Categories','cat',$data->getImage());?>" alt="<?php echo $data->getLibelle();?>" /></a></div>
        <div class="desc_cat" title="<?php echo $data->getDescription();?>"><?php echo $tools->truncate($data->getDescription(),42,'...');?></div>
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