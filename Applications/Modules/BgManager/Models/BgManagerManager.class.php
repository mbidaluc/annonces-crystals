<?php

/**
 * Description of BgMangerManager
 *
 * @author FFOZEU
 */
namespace Applications\Modules\BgManager\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class BgManagerManager extends Manager{

     protected $name = 'Applications\Modules\BgManager\Models\BgManager';
     protected $nameTable ='page';

     /**
     * Liste toutes les pages pour lesquelles on a défini un background
     */
     abstract public function getListe();

    /**
     * reccupère une page par son Id
     */
     abstract public function getPageById($id);

    /**
     *met à jour Le Background d'une page
     */
    abstract public function updateBgPage(array $params);

    /**
     *met à jour Le Background d'une page
     */
    abstract public function AddPage(array $params);

    /**
     *ative/desactive le background d'une page
     */
    abstract public function updateActivationPage($Active, $id);

    /**
     *ative/desactive la repetition X du Background d'une page
     */
    abstract public function updateRepeatXPage($repeatx, $id);

    /**
     *ative/desactive la repetition Y du Background d'une page
     */
    abstract public function updateRepeatYPage($repeaty, $id);

    
    public function getNameTable(){
        return $this->nameTable;
    }
}

?>
