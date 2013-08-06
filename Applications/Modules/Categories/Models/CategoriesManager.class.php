<?php

/**
 * Description of BgMangerManager
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Categories\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class CategoriesManager extends Manager{

     protected $name = 'Applications\Modules\Categories\Models\Categories';
     protected $nameTable ='categorie';

     /**
     * Liste toutes les Catégories Parentes
     */
     abstract public function getListeParent();

     abstract public function getListeCategories();

     /**
     * Liste toutes les Catégories Fils d'une Catégorie Parente
     */
     abstract public function getListeFilsByIdParent($idParent);

    /**
     *Nombre d\'annonces de la Catégorie
     */
    abstract public function nbAnnonces($id);


    public function getNameTable(){
        return $this->nameTable;
    }
}

?>
