<?php
    /**
    * Description of GestionAbusManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\GestionAbus\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class GestionAbusManager extends Manager{
        protected $name = 'Applications\Modules\GestionAbus\Models\GestionAbus';
        protected $nameTable ="abus";
        // Inserer votre code ici
    }
?>