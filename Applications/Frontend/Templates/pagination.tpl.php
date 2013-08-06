<?php ob_start(); ?>
<div class="title_pagination <?php echo $id_title; ?>">
    <div class="inner_title_pagination">
        <div class="inner2_title_pagination">
            <h1 id="<?php echo $id_title; ?>"><?php echo stripslashes(((is_object($infosPage)&& $infosPage->getTitre())?(!empty($title_p)?$title_p:$infosPage->getTitre()):_WELCOME_).(!empty($countAnnone)?'<span class="nbAnnonce">'.intval($countAnnone).'&nbsp;'._TOTAL_ANNONCE_.'</span>':'')); ?></h1>
            <?php if(sizeof($pagination)):?>
            <div class="pagination">
                <ul>
                    <li><a href="#" title="<?php echo _PREVIOURS_ ?>" class="previours_page" name="1"><img src="<?php echo _THEME_IMG_DIR_?>previours.png" alt="" /></a></li>
                    <?php for($i=0;$i<$pagination['nberPage'];$i++): ?>
                    <li><a href="#" title="Page <?php echo ($i+1); ?>" class="item_p page_<?php echo $i+1; ?><?php echo $pagination['current_page']==($i+1)?' current':''?>" name=""><?php echo $i+1; ?></a></li>
                    <?php endfor; ?>
                    <li><a href="#" title="<?php echo _NEXT_ ?>" class="next_page" name="<?php echo $i;?>"><img src="<?php echo _THEME_IMG_DIR_?>next.png" alt="" /></a></li>
                </ul>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache($pageID,$contentpage);
echo $contentpage;
?>
