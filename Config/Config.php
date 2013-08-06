<?php
$currentDir = dirname(__FILE__);

if( !defined('IN') )
	define('IN', TRUE);
define('_DB_SERVER_', 'localhost');
define('_DB_TYPE_', 'mysql');
define('_DB_NAME_', 'annonces_crystals');
define('_DB_USER_', 'root');
define('_DB_PASSWD_', '');
define('_DB_PORT_', '3306');
define('_DB_PREFIX_', 'c2w_');
define('_MYSQL_ENGINE_', 'InnoDB');

define('_BASE_URI_', 'http://annonces-crystals.com/');
define('_TEMPLATES_NAME_', 'annonces2');
define('_GENERAL_THEME_DIR',_BASE_URI_.'Themes/');
define('_THEMES_DIR_',_GENERAL_THEME_DIR._TEMPLATES_NAME_.'/');
define('_THEMES_BO_DIR_',_GENERAL_THEME_DIR.'backend/');
define('_THEMES_MO_DIR_',_GENERAL_THEME_DIR.'mobile/');
define('_COOKIE_KEY_', '238a8fccdf8113576f2d7b8a97d53c8e');
define('_COOKIE_IV_', '');
define('_SITE_VERSION_', '2.0');
define('_UPLOAD_DIR_', _BASE_URI_.'upload/');
define('_THEME_IMG_DIR_', _THEMES_DIR_.'images/');
define('_THEME_BO_IMG_DIR_', _THEMES_BO_DIR_.'backend_images/');
define('_THEME_MO_IMG_DIR_', _THEMES_MO_DIR_.'images/');
define('_THEME_JS_DIR_', _THEMES_DIR_.'js/');
define('_THEME_BO_JS_DIR_', _THEMES_BO_DIR_.'js/');
define('_THEME_MO_JS_DIR_', _THEMES_MO_DIR_.'js/');
define('_THEME_CSS_DIR_', _THEMES_DIR_.'css/');
define('_THEME_BO_CSS_DIR_', _THEMES_BO_DIR_.'css/');
define('_THEME_MO_CSS_DIR_', _THEMES_MO_DIR_.'css/');
define('_LIBRARY_DIR_', _BASE_URI_.'library/');
define('_WEB_IMG_DIR_', _BASE_URI_.'images/');
define('_WEB_JS_DIR_', _BASE_URI_.'js/');
define('_WEB_CSS_DIR_', _BASE_URI_.'css/');
define('_THEME_CSS_MOD_DIR_', _THEME_CSS_DIR_.'modules/');
define('_THEME_CSS_MO_MOD_DIR_', _THEME_MO_CSS_DIR_.'modules/');
define('_THEME_JS_MOD_DIR_', _THEME_JS_DIR_.'modules/');
define('_THEME_JS_MO_MOD_DIR_', _THEME_MO_JS_DIR_.'modules/');
define('__SITE__', 'Annonces cm');
define('__EMAIL__', 'contact@annonces.cm');
define('_DEFAULT_DEVISE_', 'FCFA;');
define('_DEFAULT_ISODEVISE_', 'CFA');
define('_LIMIT_PER_PAGE_', 8);
define('_CACHE_LIFETIME', 3600);

/* Directories */
define('_SITE_ROOT_DIR_',    realpath($currentDir.'/..'));
define('_MODULES_DIR_', _SITE_ROOT_DIR_.'\\Applications\\Modules\\');
define('_SITE_APP_DIR',_SITE_ROOT_DIR_.'/Applications/');
define('_SITE_MOD_DIR',_SITE_APP_DIR.'Modules/');
define('_SITE_FO_TEMPLATE_DIR',_SITE_APP_DIR.'Frontend/Templates/');
define('_SITE_CACHE_DIR_', _SITE_ROOT_DIR_.'/Cache/');
define('_SITE_MAIL_TPL_DIR_', _SITE_ROOT_DIR_.'/mails/');
define('_SITE_NEWSLETTER_TPL_DIR_', _SITE_ROOT_DIR_.'/newsletter annonces/');
/* Directories */
define('_SITE_UPLOAD_DIR_',  _SITE_ROOT_DIR_.'/web/upload/');
define('_SITE_UPLOAD_TMP_DIR_',  _SITE_ROOT_DIR_.'/web/upload/tmp/');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*Variable de configuration*/
if (!defined('_MAGIC_QUOTES_GPC_'))
	define('_MAGIC_QUOTES_GPC_',         get_magic_quotes_gpc());
?>
