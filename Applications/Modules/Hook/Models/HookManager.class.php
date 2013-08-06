<?php
/**
* Description of HookManager
*
* @author ffozeu
*/
namespace Applications\Modules\Hook\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class HookManager extends Manager{
    
    protected $name = 'Applications\Modules\Hook\Models\Hook';
    protected $nameTable ='hook';
    // Inserer votre code ici
}
?>