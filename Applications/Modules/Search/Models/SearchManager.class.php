<?php
/**
* Description of SearchManager
*
* @author ffozeu
*/
namespace Applications\Modules\Search\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class SearchManager extends Manager{
    protected $name = 'Applications\Modules\Search\Models\Search';
    protected $nameTable ="search";
    // Inserer votre code ici
}
?>