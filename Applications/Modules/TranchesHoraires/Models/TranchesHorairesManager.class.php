<?php
    /**
    * Description of TranchesHorairesManager
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\TranchesHoraires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class TranchesHorairesManager extends Manager{
        protected $name = 'Applications\Modules\TranchesHoraires\Models\TranchesHoraires';
        protected $nameTable ="tranche";
        // Inserer votre code ici
        
        abstract public function getTranchesNonOccupes($date, $page, $position);
        abstract public function addTranchesAnnonce($date, $idAnnPub, $duree, $UniteTempsAnnonce, $IdsHoraires, $page, $position);
        abstract public function addTranchesAnnoncePleinTemps($date, $idAnnPub, $duree, $UniteTempsAnnonce, $page, $position);
    }
?>