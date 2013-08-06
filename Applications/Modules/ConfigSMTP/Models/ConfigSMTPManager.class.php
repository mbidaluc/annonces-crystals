<?php
    /**
    * Description of ConfigSMTPManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\ConfigSMTP\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class ConfigSMTPManager extends Manager{
        protected $name = 'Applications\Modules\ConfigSMTP\Models\ConfigSMTP';
        protected $nameTable ="mails_params";
        // Inserer votre code ici
    }
?>