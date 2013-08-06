<?php 

if($cache->isCache($page_index)):
    echo $cache->load($page_index);
else:    
ob_start();
?>
<?php if(isset($dataList)&&  is_array($dataList)): ?>
<ul id ="category_home" class="clearfix">
    <?php $i=1; foreach ($dataList as $data): ?>
    <?php if($i==1) $class='first'; elseif($i%2==0) $class ='last_elt_line clearfix'; elseif($i==count($dataList)) $class ='last clearfix'; else $class ='alt_item'; ?>
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