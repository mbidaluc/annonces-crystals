<?php
    /**
    * Description of CompteurVisitesManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\CompteurVisites\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class CompteurVisitesManager extends Manager{
        protected $name = 'Applications\Modules\CompteurVisites\Models\CompteurVisites';
        protected $nameTable ="compteurvisite";
        // Inserer votre code ici
    }
?>