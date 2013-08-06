<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php if (!isset($title)) { echo _WELCOME_ADMIN_ ;} else { echo $title; }?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="nofollow" />    
    <link href="<?php echo _THEME_BO_CSS_DIR_;?>backend.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo _THEME_BO_CSS_DIR_;?>index.css" rel="stylesheet" type="text/css" />    
</head>
<body>
    <div id="page-top">
        <span class="title">Administration ANNONCES</span>
    </div>
    <div id="page-connexion">
        <div id="element-box" class="login">
           <?php echo $content;?> 
        </div>
    </div>
    <div id="page-footer">
        <p class="copyright">Annonces CM est un Site développé par <a href="http://www.crystals-services.com" title="Crystals services" target="_blank">Crystals Services</a> distribué sous son framework Crystals.</p>
    </div>
    <script src="<?php echo _WEB_JS_DIR_;?>jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="<?php echo _WEB_JS_DIR_;?>jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo _THEME_BO_JS_DIR_;?>index.js" type="text/javascript"></script>
</body>
</html>