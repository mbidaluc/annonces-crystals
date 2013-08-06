<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php if (!isset($title)) { echo _WELCOME_ADMIN_ ;} else { echo $title; }?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="nofollow" />
    <link href="<?php echo _WEB_CSS_DIR_;?>jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo _THEME_BO_CSS_DIR_;?>backend.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_JS_DIR_;?>jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css" />
     <?php if(isset($tabCSS)) :?>
            <?php $tabCSS = array_reverse($tabCSS); foreach ($tabCSS as $key => $value):?>
                <link rel="stylesheet" href="<?php echo $key;?>" type="text/css" media="<?php echo $value?>" />
            <?php endforeach;?>
        <?php endif;?> 
    <link rel="stylesheet" href="<?php echo _BASE_URI_.'js/fancybox/source/jquery.fancybox.css?v=2.1.4'; ?>" type="text/css" media="screen" />
    
    <script src="<?php echo _WEB_JS_DIR_;?>jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo _BASE_URI_.'js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js'; ?>" type="text/javascript"></script>   
    <script src="<?php echo _BASE_URI_.'js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4'; ?>" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>datapicker/jquery.ui.core.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>datapicker/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>datapicker/jquery.ui.datepicker.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>datapicker/ui.datepicker-fr.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jQuery-Timepicker-Addon/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jQuery-Timepicker-Addon/localization/jquery-ui-timepicker-fr.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo _WEB_JS_DIR_;?>editor/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?php echo _WEB_JS_DIR_;?>tinymce.inc.js"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jquery.scrollTo-1.4.2-min.js" type="text/javascript"></script>
    
    <script src="<?php echo _WEB_JS_DIR_;?>jquery.tablesorter.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jquery.tablesorter.pager.js" type="text/javascript"></script>
    <script src="<?php echo _THEME_BO_JS_DIR_;?>backendScript.js" type="text/javascript"></script>
     
    <!--script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script-->
</head>
<body>
<!--script type="text/javascript">
var refreshId = setInterval(function(){
     $('#heure_syst').load('../get_time.php');
}, 1000);
</script-->
    <div id="wrapper-content">
        <div id="main">
            <div id="header">
                <a href="<?php echo _BASE_URI_;?>amdin/index.html" class="logo">Administration</a>
                <ul id="top-navigation">
                    <li><span><span><a href="<?php echo _BASE_URI_;?>index.html" target="_blank">Accueil</a></span></span></li>
                    <li <?php if( preg_match('#utilisateurs.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="utilisateurs.html">Utilisateurs</a></span></span></li>
                    
                    <li <?php if( preg_match('#adversiting.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="adversiting.html">Bannières Publicitaires</a></span></span></li>
                     <li <?php if( preg_match('#bgmanager.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="bgmanager.html">Pages</a></span></span></li>

                     <li <?php if( preg_match('#categories.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="categories.html">Catégories</a></span></span></li>
                     
                     <?php if(isset($_SESSION['user']['addgroup'])){ ?>
                        <li <?php if( preg_match('#modulecreator.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="modulecreator.html">Créer un module</a></span></span></li>
                     <?php } ?>
                     
                     <li <?php if( preg_match('#configurations.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="configurations.html">Configurations</a></span></span></li>
                     
                     <li <?php if( preg_match('#newsletter-params.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="newsletter-params.html">Newsletter</a></span></span></li>
                     <li <?php if( preg_match('#position.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="position.html">Position</a></span></span></li>
                     
                     <li <?php if( preg_match('#listmodepaiement.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="listmodepaiement.html">Mode de Paiement</a></span></span></li>
                     <li <?php if( preg_match('#annonce.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="annonce.html">Annonces</a></span></span></li>
                     <li <?php if( preg_match('#packs.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="packs.html">Cdts</a></span></span></li>
                     <li <?php if( preg_match('#statistiques.html#', $link->requestURI())) echo ' class="active"';?>><span><span><a href="statistiques.html">Stats</a></span></span></li>
                </ul>
            </div>
            <div id="middle">
                <div id="left-column">
                    <h3>Gestion</h3>
                    <ul class="nav">
                        <?php if(isset($left_content)):?>
                        <?php foreach ($left_content as $key => $value):?>
                             <li class="elts"><a href="<?php echo _BASE_URI_;?>admin/<?php echo $key; ?>"><?php echo $value; ?></a></li>
                         <?php endforeach; ?>
                        <?php else:?>
                           <li class="last"><a href="index.html">Liste</a></li>
                        <?php endif;?>
                    </ul>
                    <h3 class="heure_syst">Heure du Serveur</h3>
                    <span id="heure_syst" class="heure_syst">
                            <?php echo '<span class="date">'.date('d-m-Y').'</span><span class="heure">'.date(' H:i:s').'</span>' ?>
                    </span>
                    <h3>Se deconnecter</h3>
                        <ul class="nav">
                            <li class="elts"><a href="<?php echo _BASE_URI_;?>admin/deconnexion.html"> deconnexion</a></li>
                        </ul>
                </div>
                <div id="center-column">
                
                    <?php echo $content; ?>
                    
                </div>
                <div id="right-column">
                    <strong class="h">INFORMATIONS</strong>
                    <div class="box">
                       <?php if(isset($right_content)):?>
                       <?php  echo $right_content; ?>
                       <?php else:?>
                            Bienvenue dans votre space d'administration.
                       <?php endif;?>
                    </div>
                </div>
            </div>
            <div id="footer"></div>
         </div>
    </div>
    <?php if(isset($tabJS)) :?>
        <?php foreach ($tabJS as $key => $value):?>
                <script src="<?php echo $key;?>" type="text/javascript"></script>
        <?php endforeach;?> 
    <?php endif; ?>
</body>
</html>
