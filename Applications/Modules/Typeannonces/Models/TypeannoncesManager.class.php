<?php
    /**
     * Description of TypeannoncesManager
     *
     * @author MBIDA LUC
     */
    namespace Applications\Modules\Typeannonces\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class TypeannoncesManager extends Manager{
        protected $name = 'Applications\Modules\Typeannonces\Models\Typeannonces';
        protected $nameTable ='c2w_type_annonce';

         /**
         * Liste toutes les TypeAnnoncess
         */
         abstract public function getListeTypeAnnonces();

         abstract public function getListeTypeAnnoncesById($id);

        /**
         *met à jour Une TypeAnnonces éventuellement le prix
         */
          abstract public function updateTypeAnnonces(array $params);

         abstract public function addTypeAnnonces(array $params);
         abstract public function deleteTypeAnnoncesById($id);
    }
?>