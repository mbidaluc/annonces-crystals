<?php
/**
* Description of AdversitingManager
*
* @author ffozeu
*/
namespace Applications\Modules\Adversiting\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class AdversitingManager extends Manager{
    protected $name = 'Applications\Modules\Adversiting\Models\Adversiting';
    protected $nameTable ="adversiting";
    // Inserer votre code ici
    abstract public function getLastAnnonceId();
}
?>