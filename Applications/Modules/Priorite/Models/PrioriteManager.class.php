<?php
    /**
     * Description of PrioriteManager
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Priorite\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PrioriteManager extends Manager{
        protected $name = 'Applications\Modules\Priorite\Models\Priorite';
        // Inserer votre code ici
         protected $nameTable ='c2w_priorite';

         /**
         * Liste toutes les Priorites
         */
         abstract public function getListePriorite();

         abstract public function getListePrioriteById($id);

        /**
         *met à jour Une Priorite éventuellement le prix
         */
         abstract public function updatePriorite(array $params);

         abstract public function addPriorite(array $params);
         abstract public function deletePriorite($id);
    }
?>