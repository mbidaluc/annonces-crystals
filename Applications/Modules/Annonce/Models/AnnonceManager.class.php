<?php
    /**
    * Description of AnnonceManager
    *
    * @author mbida luc
    */
    namespace Applications\Modules\Annonce\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class AnnonceManager extends Manager{
        protected $name = 'Applications\Modules\Annonce\Models\Annonce';
        protected $nameTable ="annonce";
        // Inserer votre code ici
        
        abstract public function getLastAnnonceId();
        abstract public function getAnnoncePeriode($date, $cat);
        abstract public function getResultsSearch(array $param);
    }
?>