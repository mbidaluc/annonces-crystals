<?php
/**
 * Description of SearchController
 *
 * @author ffozeu
 *
 */

namespace Applications\Modules\Search\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\Search\Form\SearchForm;
use Library\Tools;

class SearchController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "Search";
}
?>