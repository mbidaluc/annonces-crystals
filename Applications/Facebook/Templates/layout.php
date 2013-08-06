<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="<?php if (!isset($meta_description)) { echo _META_DESCRIPTION_ ;} else { echo $meta_description; }?>" />
        <meta name="Keywords" content="<?php if (!isset($meta_keywords)) { echo _META_KEYWORDS_ ;} else { echo $meta_keywords; }?>" />
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="robots" content="index,follow" />
        <link rel="stylesheet" href="<?php echo _GENERAL_THEME_DIR.'facebook/css/facebook.css'; ?>" type="text/css" media="screen" />
      <title><?php if (!isset($title)) { echo _WELCOME_ ;} else { echo $title; }?></title>
   </head>
   <body>
       <div id="page">
          <div id="header">
                <div id="main_header">
                    <a href="<?php echo _BASE_URI_;?>" class="logo" id="logo" title="logo"><img src="<?php echo _WEB_IMG_DIR_.'annonces.png'?>" alt="logo" /></a>
                </div>
                <div id="texte">
                    <p><?php echo _SLOGAN_;?></p>
                </div>
                <div id="menu">
                    <div id="menu_list">      
                         <ul>
                            <li class="menu1"><a href="<?php echo _BASE_URI_.'facebook/';?>" title=""> Accueil</a></li>
                            <li class="menu2"><a href="<?php echo _BASE_URI_;?>les-annonces.html" target="blank" title=""> Mes annonces</a></li>
                            <li class="menu3"><a href="<?php echo _BASE_URI_;?>createannoncefront.html" target="blank"  title=""> Envoyer une annonce</a></li>
                            <li class="menu4"><a href="<?php echo _BASE_URI_;?>newsletters.html" target="blank"  title=""> Newsletter</a></li>
                            <li class="menu5"><a href="<?php echo _BASE_URI_;?>contact.html" target="blank" title=""> Nous contacter</a></li>
                         </ul>
                    </div>
                </div>
             </div>
           <div id="content">
               <div id="content_header">
                   <div id="logo_text">
                       <a href="<?php echo _BASE_URI_;?>" class="logo" id="logo_2" title="logo"><img src="<?php echo _WEB_IMG_DIR_.'annonces.png'?>" alt="logo" /></a>
                       <!--span class="mid_text"> faites toutes vos annonces sur : www.annonces.com </span-->
                   </div>
                   <div id="img_text" class="clearfix">
                       <div id="img3">
                            <ul>                
                                <li><a href="#" target="blank" title=""><img src="<?php echo _GENERAL_THEME_DIR;?>facebook/images/mini_duplex.png" alt=""/><span class="aero1">Immobilier</span></a></li>                     
                                <li><a href="#" target="blank" title=""><img src="<?php echo _GENERAL_THEME_DIR;?>facebook/images/min_oignons.png" alt=""/><span class="aero2">Agriculture</span></a></li>                
                                <li><a href="#" target="blank" title=""><img src="<?php echo _GENERAL_THEME_DIR;?>facebook/images/mini_auto.png" alt=""/><span class="aero3">Automobile</span></a></li>               
                                <li><a href="#" target="blank" title=""><img src="<?php echo _GENERAL_THEME_DIR;?>facebook/images/mini_livres.png" alt=""/><span class="aero4">Education</span></a></li>                             
                            </ul>
                       </div>
                       <span class="blue3">Et plus encore ...</span>                       
                   </div>               
               </div>
               <?php echo $content; ?>
           </div>
           <!--div id="clear"></div-->
            <div id="footer">
                <div id="footer_list">      
                         <ul>
                            <li class="menu1">Copyrigth 2008-2010 tous droits reservés</li>
                            <li class="menu2"><a href="" title=""> Envoyer une annonce</a></li>
                            <li class="menu3"><a href="" title=""> Conditions d'annonces</a></li>
                            <li class="menu4"><a href="" title=""> Aide</a></li>
                            <li class="menu5"><a href="" title=""> Nos contacts</a></li>
                         </ul>
                    </div>
            </div> 
           
       </div>
   </body>
</html>