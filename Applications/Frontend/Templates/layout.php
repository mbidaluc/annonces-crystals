<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="<?php if (!isset($meta_description) && !isset($infosPage)) { echo _META_DESCRIPTION_ ;} elseif(isset($infosPage)){ echo $infosPage->getMetadescription(); }else { echo $meta_description; }?>" />
        <meta name="Keywords" content="<?php if (!isset($meta_keywords) && !isset($infosPage)) { echo _META_KEYWORDS_ ;} elseif(isset($infosPage)){ echo $infosPage->getMetakeyword(); }else { echo $meta_keywords; }?>" />
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="robots" content="index,follow" />
        <link rel="stylesheet" href="<?php echo _BASE_URI_.'js/fancybox/source/jquery.fancybox.css?v=2.1.4'; ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo _THEME_CSS_DIR_.'frontend.css'; ?>" type="text/css" media="screen" />
    <?php if(isset($tabCSS)) :?>
        <?php $tabCSS = array_reverse($tabCSS); foreach ($tabCSS as $key => $value):?>
        <link rel="stylesheet" href="<?php echo $key;?>" type="text/css" media="<?php echo $value?>" />
        <?php endforeach;?>
    <?php endif;?>  
    <title><?php if (!isset($title) && !isset($infosPage)) { echo _WELCOME_ ;} elseif(isset($infosPage)&& $infosPage->getMetatitle()!=''){ echo $infosPage->getMetatitle(); }elseif(isset($title)){ echo $title; }else{echo _WELCOME_ ;}?></title>
    </head>
    
    <body id="<?php if(isset($idPage)) echo $idPage;else echo'home_page' ?>"<?php if(isset($bgBody)) echo $bgBody; ?>>
        <div id="global">
            <div id="header" class="clearfix">
                <div id="inner-header" class="clearfix">
                    <a href="<?php echo _BASE_URI_;?>" class="logo" id="logo" title="logo"><img src="<?php echo _WEB_IMG_DIR_.'annonces.png'?>" alt="logo" /></a>
                    <div id="center-zone">
                        <div id="flash-zone">
                            <form action ="" name="animation">
                                <input name="text" type="text" class="input_anim">
                            </form>
                        </div>
                        <div id="search-zone">
                            <?php if($cache->isCache('search')): ?>
                            <?php echo $cache->load('search') ?>
                            <?php else: ?>
                            <?php $tools->includeFileTemplates('search',array('tools'=>$tools,'tabCat'=>isset($tabCat)?$tabCat:array(),'cache'=>$cache)); ?>
                            <?php endif; ?>
                        </div>                        
                    </div>
                    <div id="right-zone" class="clearfix">
                        <div id="right-zone-top" class="clearfix">
                            <ul id="social_network">
                                <li id="facebook"><a href="#" target="_blank"><img src="<?php echo _THEME_IMG_DIR_?>fcb.png" alt="facebook" /></a></li>
                                <li id="twitter"><a href="#" target="_blank"><img src="<?php echo _THEME_IMG_DIR_?>twitter.png" alt="twitter" /></a></li>
                            </ul>
                            <div id="block_login">
                                <?php echo !$user->isAuthenticated()?'<a class="connect" href="'._BASE_URI_.'connexion.html" title="'._TEXT_INSCRIPTION_.'">'._TEXT_INSCRIPTION_.'</a> / <a id="popupConnection" href="#connexionPopUp" title="'._TEXT_CONNEXION_.'">'._TEXT_CONNEXION_.'</a>' : ' <a class="connect" href="'._BASE_URI_.'compte.html" title="'._TEXT_COMPTE_.'">'._TEXT_COMPTE_.'</a> / <a class="connect" href="'._BASE_URI_.'deconnexionfront.html" title="'._TEXT_DECONNEXION_.'">'._TEXT_DECONNEXION_.'</a>'; ?>
                            </div>
                            <div id="connexionPopUp" style="display: none;">
                                <div style="<?php if (isset($bgContentconn)) echo $bgContentconn ;?>">
                                    <form action="<?php echo _BASE_URI_;?>connexion.html" method="post" id="formConnexion">
                                        <div class="con-login">               
                                            <fieldset>
                                                 <?php if(!$user->isAuthenticated()): ?> 
                                                    <div class="content-input">
                                                        <input type="text" name="login" id="lepseudonyme" value="Entrer votre pseudo"/>
                                                        <input type="password" name="password" id="lemotdepasse" value="Mot de passe" />                                                
                                                    </div>
                                                    <div class="wrap_btn">
                                                        <span class="left-bouton"><span class="right-bouton"><input class="center-bouton" type="submit" value="Connexion" /></span></span>
                                                    </div>
                                                    <div class="forgot"><a href="forgetpwd.html">Mot de passe oublié?</a></div>
                                                <?php endif; ?>
                                            </fieldset>

                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                        </div>
                        </div>
                        <div id="right-zone-bottom" class="clearfix">
                            <a href="<?php echo _BASE_URI_;?>createannoncefront.html" title=""><img src="<?php echo _THEME_IMG_DIR_?>cliquer_ici.png" alt="" /></a>
                            <div id="compteur_visit">
                                <?php echo $nombrevisiteur; ?>
                                <span><?php echo _NUMBER_VISITORS_?></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="wrapper-menu">
                <?php $tools->includeFileTemplates('_menu',array('tools'=>$tools,'link'=>$link,'user'=>$user)); ?>
            </div>   
            <div id="container" class="clearfix">
                <div id="breadcrumb" class="clearfix"><?php $tools->includeView("Breadcrumb","Breadcrumb", array()); ?></div>
                <div id="contenu" class="clearfix">                    		
                    <div id="page" class="clearfix columns number-column<?php echo $numberColumn ?>">
                        <div id="left-page">
                            <!-- gestion du bloc urgence -->
                            <?php $tools->includeFileTemplates('urgence',array('tabAnnonceByPoosition'=>$tabAnnonceByPoosition,'tools'=>$tools,'cache'=>$cache)); ?>
                            <?php //var_dump($link->getValue('link_rewrite')) ?>
                            <?php if(isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory')):?>
                            <div id="block_cat1" class="block annonce_block block_cat block_motif_left">
                                <?php if($cache->isCache($link->getValue('link_rewrite').'_blockCategory')): ?>
                                    <?php echo $cache->load($link->getValue('link_rewrite').'_blockCategory') ?>
                                <?php else: ?>
                                    <?php $tools->includeFileTemplates('blockCategory',array('category' => $category,'tools' => $tools,'countAnnonceSubCat' => $countAnnonceSubCat,'subCat' => $subCat,'cache' => $cache,'listedesannonces' => $listedesannonces,'total' => $total,'category_parent'=> $category_parent)); ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <div id="pub-position-2" class="block pub_block">
                                <?php $tools->includeFileTemplates('zone_pub_2',array('tabAnnonceByPositionPub'=>(isset($tabAnnonceByPositionPub)?$tabAnnonceByPositionPub:array()),'tools'=>$tools,'cache'=>$cache)); ?>
                            </div>
                            <div id="pub-position-3" class="block pub_block">
                                <?php $tools->includeFileTemplates('zone_pub_3',array('tabAnnonceByPositionPub'=>(isset($tabAnnonceByPositionPub)?$tabAnnonceByPositionPub:array()),'tools'=>$tools,'cache'=>$cache)); ?>
                            </div>
                        </div>
                        <div id="center-page">
                            <div id="pub-position-1" class="block-center">
                                <?php $tools->includeFileTemplates('zone_pub_1',array('tabAnnonceByPositionPub'=>(isset($tabAnnonceByPositionPub)?$tabAnnonceByPositionPub:array()),'tools'=>$tools,'cache'=>$cache)); ?>
                                <?php
                                    if(isset($page_index) && $cache->isCache($page_index.'_top_paginate'))
                                        echo $cache->load($page_index.'_top_paginate');
                                    else{
                                        if(!isset($pagination))
                                            $pagination = array();
                                        $tools->includeFileTemplates('pagination',array( 'pagination'=>$pagination, 
                                            'cache'=>$cache, 'pageID'=>isset($page_index)?$page_index.'_top_paginate':'no_page',
                                            'infosPage'=>isset($infosPage)?$infosPage:'',
                                            'title_p'=>isset($title_p)?$title_p:'',
                                            'countAnnone'=>isset($countAnnone)?$countAnnone:'',
                                            'id_title' => 'h1_title',
                                            ));
                                    }   
                                ?>     
                            </div>
                            <div id="content-page"<?php if (isset($bgContent)) echo $bgContent ;?> class="content-page <?php echo ((isset($idPage) && ($idPage=='home' || $idPage=='category' || $idPage=='mes_annonces' || $idPage=='mes_annonces_pub'))?((isset($infosPage) && $infosPage->getShowfooteradv())?'pag-banner-footer'.((isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory'))?'-with-cat-bog':'-with-no-cat-blog'):'pag-no-banner-footer'.((isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory'))?'-with-cat-blog':'-with-no-cat-blog')):((isset($infosPage) && $infosPage->getShowfooteradv())?'banner-footer'.((isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory'))?'-with-cat-bog':'-with-no-cat-blog'):'no-banner-footer'.((isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory'))?'-with-cat-blog':'-with-no-cat-blog')))?>">
                                <?php echo $content; ?>                                
                            </div>
                            <?php if(isset($idPage) && ($idPage=='home' || $idPage=='category' || $idPage=='mes_annonces' || $idPage=='mes_annonces_pub') ):?>
                                <?php if(isset($pagination)|| isset($category) || (isset($page_index) && $cache->isCache($page_index.'_footer_paginate'))):?>
                                    <?php
                                        if(isset($page_index) && $cache->isCache($page_index.'_footer_paginate'))
                                            echo $cache->load($page_index.'_footer_paginate');
                                        else{
                                            if(!isset($pagination))
                                                $pagination = array();
                                            $tools->includeFileTemplates('pagination',array( 'pagination'=>$pagination, 
                                                'cache'=>$cache, 'pageID'=>isset($page_index)?$page_index.'_footer_paginate':'no_page',
                                                'infosPage'=>isset($infosPage)?$infosPage:'',
                                                'title_p'=>isset($title_p)?$title_p:'',
                                                'countAnnone'=>isset($countAnnone)?$countAnnone:'',
                                                'id_title' => 'h2_title',
                                                ));
                                        }   
                                    ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if((isset($idPage)) && ($idPage!='home')): 
                                if((isset($infosPage)) && ($infosPage->getShowfooteradv())): 
							?>
                            <div id="pub-position-5" class="block-center">
                                <div id="banner-bottom">
                                     <?php $tools->includeFileTemplates('zone_pub_5',array('tabAnnonceByPositionPub'=>(isset($tabAnnonceByPositionPub)?$tabAnnonceByPositionPub:array()),'tools'=>$tools,'cache'=>$cache)); ?>
                                </div>
                            </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div id="right-page">
                            <!-- gestion du bloc a la une -->
                            <?php if($cache->isCache('a_la_une')): ?>
                            <?php echo $cache->load('a_la_une') ?>
                            <?php else: ?>
                            <?php $tools->includeFileTemplates('a_la_une',array('tabAnnonceByPoosition'=>$tabAnnonceByPoosition,'tools'=>$tools,'cache'=>$cache)); ?>
                            <?php endif; ?>
                            <?php if(isset($category) || $cache->isCache($link->getValue('link_rewrite').'_blockCategory')):?>
                            <div id="block_cat2" class="block annonce_block block_cat block_motif_left">
                                <?php if($cache->isCache($link->getValue('link_rewrite').'_blockCategory')): ?>
                                    <?php echo $cache->load($link->getValue('link_rewrite').'_blockCategory') ?>
                                <?php else: ?>
                                    <?php $tools->includeFileTemplates('blockCategory',array('category' => $category, 'tools' => $tools, 'countAnnonceSubCat' => $countAnnonceSubCat, 'subCat' => $subCat, 'cache' => $cache, 'listedesannonces' => $listedesannonces, 'total' => $total,'category_parent'=> $category_parent)); ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <div id="pub-position-4" class="block pub_block">
                                <?php $tools->includeFileTemplates('zone_pub_4',array('tabAnnonceByPositionPub'=>(isset($tabAnnonceByPositionPub)?$tabAnnonceByPositionPub:array()),'tools'=>$tools,'cache'=>$cache)); ?>
                            </div>
                            <!-- gestion du bloc événements -->
                            <?php if($cache->isCache('evenements')): ?>
                            <?php echo $cache->load('evenements') ?>
                            <?php else: ?>
                            <?php $tools->includeFileTemplates('evenements',array('tabAnnonceByPoosition'=>$tabAnnonceByPoosition,'tools'=>$tools,'cache'=>$cache)); ?>
                            <?php endif; ?>
                        </div>
						<div class="clear"></div>
                    </div>
					<div class="clear"></div>
                </div>
                <div id="footer" class="clearfix">
                    <!-- gestion du bloc annonces mobiles -->
                    <?php if($cache->isCache('mobiles')): ?>
                    <?php echo $cache->load('mobiles') ?>
                    <?php else: ?>
                    <?php $tools->includeFileTemplates('mobiles',array('tabAnnonceByPoosition'=>$tabAnnonceByPoosition,'tools'=>$tools,'cache'=>$cache)); ?>
                    <?php endif; ?>
                    <!-- gestion du bloc annonces speciales -->
                    <?php if($cache->isCache('speciales')): ?>
                    <?php echo $cache->load('speciales') ?>
                    <?php else: ?>
                    <?php $tools->includeFileTemplates('speciales',array('tabAnnonceByPoosition'=>$tabAnnonceByPoosition,'tools'=>$tools,'cache'=>$cache)); ?>                
                    <?php endif; ?>
                    <div id="footer_bottom" class="clearfix">
                        <div class="copy"></div>
                        <div class="footer_menu">
                            <ul>
                                <li class="firstin">Copyright 2008 - <?php echo date('Y'); ?> &copy; <?php echo _ALL_RIGHT_RESERVE_ ?></li>
                                <li><a href="<?php echo _BASE_URI_;?>createannoncefront.html">Envoyer une annonce</a></li> 
                                <li><a href="<?php echo _BASE_URI_;?>cms/content/cga.html">Conditions d'annonces</a></li> 
                                <li><a href="<?php echo _BASE_URI_;?>cms/content/aide.html">Aide</a></li> 
                                <li><a href="<?php echo _BASE_URI_;?>listingpartenaires.html">Partenaires</a></li> 
                                <li><a href="<?php echo _BASE_URI_;?>contact.html">Nos Contacts</a></li>
                            </ul> 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- chargement des différentes libraireis javascript -->
            <script src="<?php echo _WEB_JS_DIR_;?>jquery-1.7.1.min.js" type="text/javascript"></script>
            <script src="<?php echo _WEB_JS_DIR_;?>jquery-ui.min.js" type="text/javascript"></script>
            <script src="<?php echo _WEB_JS_DIR_;?>plugins/scrollbar/plugin.scrollbar-min.js" type="text/javascript"></script>
            <script src="<?php echo _WEB_JS_DIR_;?>plugins/cycle/jquery.cycle.lite.js" type="text/javascript"></script>
            <script src="<?php echo _WEB_JS_DIR_;?>editor/nicEdit/nicEdit.js" type="text/javascript"></script>
            <script src="<?php echo _THEME_JS_DIR_.'frontend.js'; ?>" type="text/javascript"></script>
            <?php if(isset($tabJS)) :?>
                <?php foreach ($tabJS as $key => $value):?>
                        <script src="<?php echo $key;?>" type="text/javascript"></script>
                <?php endforeach;?> 
            <?php endif; ?>
             <script src="<?php echo _WEB_JS_DIR_;?>jquery.slimscroll.js" type="text/javascript"></script>            
           <script src="<?php echo _BASE_URI_.'js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js'; ?>" type="text/javascript"></script>
           
            <script src="<?php echo _BASE_URI_.'js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4'; ?>" type="text/javascript"></script> 
                        
            <?php if(isset($infosPage)&& $infosPage->getIdentifiant()=='annonce'): ?>
            <script type="text/javascript">
                bkLib.onDomLoaded(function() { nicEditors.allTextAreas({maxHeight : 171}) });
            </script>
            <?php endif; ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    //$(".item_category").scrollbar();
                    $('#a_la_une').cycle();
                });
            </script>
    </body>
</html>
