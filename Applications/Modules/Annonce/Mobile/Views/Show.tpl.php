<?php if(isset($annonce)):?>

<div id="detail_annonce" class="clearfix">
    <div id="images_annpnce">
        <div id="big_image" class="clearfix">
            <a href="<?php echo $tools->getLinkImage('Annonce','big',$annonce->defaultImage, $category->getDefaultAnnonceImage());?>" class="jqzoom" rel='gal1'  title="triumph" >
                <img class="bigimg" src="<?php echo $tools->getLinkImage('Annonce','big',$annonce->defaultImage, $category->getDefaultAnnonceImage());?>" alt=""/>
            </a>
        </div>
        <div id="wrap_picto_image">
            <?php if(isset($listPhotos) && is_array($listPhotos) && sizeof($listPhotos)):?>
            <?php if (count($listPhotos) > 4): ?><a href="#" id="prev" class="nav_btn"><img id="view_scroll_left" src="<?php echo _THEME_IMG_DIR_?>previours_picto.jpg" alt="<?php echo _PREVIOURS_ ?>" /></a><?php endif; ?>
            <div id="wrap_picto">
                <ul id="picto_image">
                    <?php foreach ($listPhotos as $photo):?>
                    <li class="small_img">
                        <!--<a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo $tools->getLinkImage('Annonce','big',$photo->getUrl(), $category->getDefaultAnnonceImage());?>',largeimage: '<?php echo $tools->getLinkImage('Annonce','',$photo->getUrl(), $category->getDefaultAnnonceImage());?>'}">-->
                        <a href="<?php echo $tools->getLinkImage('Annonce','big',$photo->getUrl(), $category->getDefaultAnnonceImage());?>" title="">
                            <img src="<?php echo $tools->getLinkImage('Annonce','small',$photo->getUrl(), $category->getDefaultAnnonceImage());?>" alt=""/>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php if (count($listPhotos) > 4): ?><a class="nav_btn" href="#" id="next"><img id="view_scroll_right" src="<?php echo _THEME_IMG_DIR_?>next_picto.jpg" alt="<?php echo _PREVIOURS_ ?>" /></a><?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="descriptif">
            <?php echo $tools->truncate($annonce->getTexte(),150,'...');?>
        </div>
        <div><a href="#" class="plus_detail" title="<?php echo $annonce->getDesignation();?>"><?php echo _ANNONCE_MORE_DETAIL_?></a></div>
    </div>
    <div id="infos_annonces">
        <span class="an_bref"><?php echo _ANNONCE_BREF_;?></span>
        <ul>
            <li><span class="an_libelle"><?php echo _ANNONCE_PRICE_ ?></span><span class="an_desc"><?php echo $tools->displayPrice($annonce->getPrixTotal());?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_COUNTRY_ ?></span><span class="an_desc"><?php echo $annonce->getPays();?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_CITY_ ?></span><span class="an_desc"><?php echo $annonce->getVille();?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_AUTHOR_ ?></span><span class="an_desc"><?php echo $annonce->getAuteur();?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_VISIT_ ?></span><span class="an_desc"><?php echo $annonce->getNbClick().' '._NOMBER_FOIS_;?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_TEL_ ?></span><span class="an_desc"><?php echo $annonce->getPhone1();?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_EMAIL_ ?></span><span class="an_desc"><?php echo $annonce->getEmail();?></span></li>
            <li><span class="an_libelle"><?php echo _ANNONCE_DATE_BEGIN_ ?></span><span class="an_desc"><?php echo date_format(date_create($annonce->getDateDebut()), 'd/m/Y');?></span></li>
            <li class="last_item"><span class="an_libelle"><?php echo _ANNONCE_DATE_END_ ?></span><span class="an_desc"><?php echo date_format(date_create($annonce->getDateexp()), 'd/m/Y');?></span></li>            
        </ul>
    </div>
    <ul id="avis_annonces" class="clearfix">
        <li class="repondre_annonce"><a id="repondre_annonce" href="#modalRepAnn" title=""><?php echo _ANNONCE_REPONDRE_;?></a></li>
        <li class="send_to_friend"><a id="send_to_friend" href="#modalEnvAnn" title=""><?php echo _ANNONCE_SEND_TO_FRIEND_;?></a></li>
        <li class="signaler_abus"><a id="signaler_abus" href="#modalAbus" title=""><?php echo _ANNONCE_ABUS_;?></a></li>
        <li class="abonnement_news"><a id="abonnement_news" href="<?php echo _BASE_URI_.'newsletters.html';?>" title=""><?php echo _ANNONCE_ABONNEMENT_NEWS_;?></a></li>
    </ul>
    <div class="social_network" class="clearfix">
        <!-- ShareThis Button BEGIN -->
        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
        <span class='st_googleplus_hcount' displayText='Google +'></span>
        <span class='st_twitter_hcount' displayText='Tweet'></span>
        <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
        <!--<span class='st_tumblr_hcount' displayText='Tumblr'></span>-->
        <span class='st_sharethis_hcount' displayText='ShareThis'></span>
        
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "57c70857-8d5f-4da2-b4ee-c5104bf38378", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        
        <!--  ShareThis Button END -->
    </div>
    <div id="tab_description" class="clearfix">
        <span class="title_description"><?php echo _ANNONCE_DETAIL_;?></span>
        <div class="content_description">
            <div id="det">
                <?php echo $annonce->getTexte();?>
            </div>
        </div>
    </div>
    <div id="other_annonce" class="clearfix">
        <h4><?php echo $otherAnnonces['title']?_ANNONCE_SAME_AUTHOR_:_ANNONCE_SAME_CATEGORY_; ?></h4>
        <?php $tabotherAn = $otherAnnonces['data'];
            $tabimages = isset($otherAnnonces['image'])?$otherAnnonces['image']:array();
        ?>
        <ul>
        <?php foreach ($tabotherAn as $value):?>
            <li class="detais_same_user"><div class="detais_same_user">
                <a class="same_img" href="<?php echo $tools->getLinkAnnonce($category,$value);?>" title="<?php echo $value->getDesignation()?>">
                    <img src="<?php echo $tools->getLinkImage('Annonce','other',  (isset($tabimages[$value->getId()])?$tabimages[$value->getId()]:''), $category->getDefaultAnnonceImage());?>" alt="<?php echo $value->getDesignation()?>" />
                </a>
                <a class="same_title" href="<?php echo $tools->getLinkAnnonce($category,$value);?>" title="<?php echo $value->getDesignation()?>"><?php echo $tools->truncate($value->getDesignation(),30)?></a></div>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php if($otherAnnonces['title']): ?><a class="see_other_annonce" href="../authorannonces-<?php echo $idUserAnnonceur; ?>.html" title="<?php echo _ANNONCE_SAME_AUTHOR_SEE_;?>"><?php echo _ANNONCE_SAME_AUTHOR_SEE_;?></a><?php endif; ?>
    </div>
</div>

<div id="modalRepAnn" style="display: none;">
    <div style="<?php if (isset($popuprepann)) echo $popuprepann ;?>">
        <form method="post" action="../repannonce.html" id="repannonce">
            <p><label>Votre Nom :</label>
                <input type="text" name="noms"/>
            </p>
            <p><label>Votre Email :</label>
                <input type="email" name="emails" />    
            </p>
            <p><label>Message :</label>
                <textarea class ="pop_up_text" name="msgs"> </textarea>    
            </p>
            <p><input class="envoie1" type="button" value="envoyer" id="repondrealannonce"/> </p>
            <input  type="Hidden" name="ids" value="<?php echo $id; ?>"/>
            <input  type="Hidden" name="address" value="<?php echo $annonce->getEmail(); ?>"/>
            <input  type="Hidden" name="AnnonceTitrerep" value="<?php echo $annonce->getDesignation(); ?>"/>
        </form>
    </div>
</div>

<div id="modalEnvAnn" style="display: none;">
    <div style="<?php if (isset($popupenvamie)) echo $popupenvamie ;?>">
        <form method="post" action="envannoceamie.html" id="envannoceamie">
            <p><label>Votre Nom :</label>
                <input type="text" name="nomd" required="required" />
            </p>
            <p><label>Votre Email :</label>
                <input type="email" name="emaild" required="required" />    
            </p>
            <p><label>Le nom de votre ami(e) :</label>
                <input type="text" name="nomAmi"required="required" />
            </p>
            <p><label>l'email de votre ami(e) :</label>
                <input type="email" name="emailAmi" required="required" />    
            </p>
            <p><label>Message :</label>
                <textarea class ="pop_up_text" name="msga"> </textarea>    
            </p>
            <p><input class="envoie1" type="button" value="envoyer" id="envoieannonceamie"/> </p>
            <input  type="Hidden" name="ida" value="<?php echo $id; ?>"/>
            <input  type="Hidden" name="AnnonceTitreenvami" value="<?php echo $annonce->getDesignation(); ?>"/>
        </form>
    </div>
</div>

<div id="modalAbus" style="display: none;">
    <div style="<?php if (isset($popupabus)) echo $popupabus ;?>">
        <form method="post" action="abus.html" id="abus">
            <p><label>Votre Nom :</label>
                <input type="text" name="NomSignaleur"  id="NomSignaleur" required="required"/>
            </p>
            <p><label>Votre Email :</label>
                <input type="email" name="email" id="emailSignaleur" required="required" />    
            </p>
            <p><label>Message :</label>
                <textarea class ="pop_up_text" name="message" id="msgSignaleur"> </textarea>    
            </p>
            <p><button class="envoie1" id="signalAbus" >Signaler un abus</button> </p>
            <input  type="Hidden" name="id" value="<?php echo $id; ?>" id="idAnnabus"/>
        </form>
    </div>
</div>
<?php else: ?>
<?php echo _ANNONCE_NOT_FUND_ ?>
<?php endif;?>