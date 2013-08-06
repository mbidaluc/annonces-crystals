<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="<?php if (!isset($meta_description)) { echo _META_DESCRIPTION_ ;} else { echo $meta_description; }?>" />
        <meta name="Keywords" content="<?php if (!isset($meta_keywords)) { echo _META_KEYWORDS_ ;} else { echo $meta_keywords; }?>" />
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="robots" content="index,follow" />
        <link rel="stylesheet" href="<?php echo _BASE_URI_.'js/fancybox/source/jquery.fancybox.css?v=2.1.4'; ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo _THEME_MO_CSS_DIR_.'mobile.css'; ?>" type="text/css" media="screen" />
    <?php if(isset($tabCSS)) :?>
        <?php $tabCSS = array_reverse($tabCSS); foreach ($tabCSS as $key => $value):?>
        <link rel="stylesheet" href="<?php echo $key;?>" type="text/css" media="<?php echo $value?>" />
        <?php endforeach;?>
    <?php endif;?>  
    <title><?php if (!isset($title)) { echo _WELCOME_ ;} else { echo $title; }?></title>
    </head>
    
    <body id="<?php if(isset($idPage)) echo $idPage;else echo'home_page' ?>">
        <div id="global">
            <div id="header" class="clearfix">
                <div id="inner-header" class="clearfix">
                    <div id="block-left" class="clearfix">
                        <a href="<?php echo _BASE_URI_;?>" class="logo" id="logo" title="logo"><img src="<?php echo _WEB_IMG_DIR_.'annonces.png'?>" alt="logo" /></a>
                    </div>
                    <div id="block-right" class="clearfix">
                        <div id="center-zone">
                            <div id="flash-zone">Un marché virtuel pour votre réel buissness</div>
                        </div>
                        <div id="right-zone" class="clearfix">
                            <div id="right-zone-top" class="clearfix">
                                <ul id="social_network">
                                    <li id="facebook"><a href="#" target="_blank"><img src="<?php echo _THEME_IMG_DIR_?>fcb.png" alt="facebook" /></a></li>
                                    <li id="twitter"><a href="#" target="_blank"><img src="<?php echo _THEME_IMG_DIR_?>twitter.png" alt="twitter" /></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wrapper-menu">
            <div id="menu" class="clearfix">
                        <?php
                            echo '
                            <ul>
                                <li'; if( preg_match('#index.html#', $link->requestURI())) echo ' class="active"'; echo '><a href="'._BASE_URI_.'index.html">'._HOME_.'</a></li>
                                <li'; if( preg_match('#createannoncefront.html#', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'createannoncefront.html">'._TEXT_ANNONCE_.'</a></li>
                                <li'; if( preg_match('/contact.html/i', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'contact.html">'._CONTACT_.'</a></li>
                            </ul>';
                        ?>
                    </div>
            </div>   
            <div id="container" class="clearfix">
                <div id="breadcrumb" class="clearfix"><?php $tools->includeView("Breadcrumb","Breadcrumb", array()); ?></div>
                <div id="contenu" class="clearfix">                    		
                    <div id="page" class="clearfix columns number-column<?php echo $numberColumn ?>">
                        <div id="center-page">
                            <div id="pub-position-1" class="block-center">
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
                            <div id="content-page"<?php if (isset($bgContent)) echo $bgContent ;?>>
                                <?php echo $content; ?>                                
                            </div>
                            <?php if(isset($idPage) && ($idPage=='home' || $idPage=='category')):?>
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
                        </div>
                        
						<div class="clear"></div>
                    </div>
					<div class="clear"></div>
                </div>
                <div id="footer" class="clearfix">
                    <div id="footer_bottom" class="clearfix">
                        <div class="copy"></div>
                        <div class="footer_menu">
                            <ul>
                                <li class="firstin">Copyright 2008 - <?php echo date('Y'); ?> &copy; <?php echo _ALL_RIGHT_RESERVE_ ?></li>
                            </ul> 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- chargement des différentes libraireis javascript -->
            <script src="<?php echo _WEB_JS_DIR_;?>jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
            <script src="<?php echo _THEME_MO_JS_DIR_.'mobile.js'; ?>" type="text/javascript"></script>
            <?php if(isset($tabJS)) :?>
                <?php foreach ($tabJS as $key => $value):?>
                        <script src="<?php echo $key;?>" type="text/javascript"></script>
                <?php endforeach;?> 
            <?php endif; ?>
                        
    </body>
</html>
