<?php

/**
 * Description of PaysManager
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Pays\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class PaysManager extends Manager{
    //put your code here
    protected $name ="Applications\Modules\Pays\Models\Pays";
    protected $nameTable="c2w_pays";
    
    abstract public function getListePays();
    
    abstract public function findPaysById($id);
}

?>
