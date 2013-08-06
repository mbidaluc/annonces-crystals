<?php ob_start(); ?>
<div class="bg_search2_left">
    <div class="bg_search2_right">
        <div class="bg_search2_midle">
            <form id="search-form" action="<?php echo _BASE_URI_;?>results.html" name="search-form" method="post">
                <fieldset class="clearfix">
                    <input type="text" name="search_text" value="" id="search_text" class="clearfix"/>
                    <select id="category" name="category">
                        <option value="">Sélectionnez une catégorie</option>
                        <?php if(is_array($tabCat)):?>
                            <?php  foreach ($tabCat as $value) : ?>
                                <option value="<?php echo $value->getIdFils(); ?>"><?php echo $value->getLibelle();?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <input type="text" name="search_ville" value="<?php echo _CITY_;?>" id="search_ville" class="search_param"/>
                    <input type="text" name="search_price_min" value="<?php echo _PRICE_MIN_;?>" id="search_price_min" class="search_param"/>
                    <input type="text" name="search_price_max" value="<?php echo _PRICE_MAX_;?>" id="search_price_max" class="search_param"/>
                    <div class="total">
                        <div class="input1">
                            <div class="input2">
                                <input type="submit" name="submitSearch" id="submitSearch" value="<?php echo _SEARCH_;?>" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php $contentpage = ob_get_clean();
$cache->setCache('search',$contentpage);
echo $contentpage;
?>