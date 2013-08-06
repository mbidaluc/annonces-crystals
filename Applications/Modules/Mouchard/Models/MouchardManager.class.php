<?php
    /**
    * Description of MouchardManager
    *
    * @author Alfred MBIDA
    */
    namespace Applications\Modules\Mouchard\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class MouchardManager extends Manager{
        protected $name = 'Applications\Modules\Mouchard\Models\Mouchard';
        protected $nameTable ="mouchard";
        // Inserer votre code ici
    }
?>