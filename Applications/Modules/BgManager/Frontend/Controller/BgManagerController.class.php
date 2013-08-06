<?php

/**
 * Description of CategoriesController
 *
 * @author Le Maître Rikudou
 * 
 */

namespace Applications\Modules\BgManager\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

//use Library\BackController;
use Helper\HelperBackController;
use Library\HttpRequest;

class BgManagerController extends HelperBackController{
    
    protected $name = 'BgManager';

    public function executeContentCms(HttpRequest $request){

        parent::getInfosPage($request->getValue('uniqId'));
        $imageDefaultCat = array();
        $datalist = $this->getArbreCategories();

        foreach($datalist as $data)
            $imageDefaultCat[$data->getIdFils()] = $data->getDefaultAnnonceImage();

        $this->page->addVar('AnnoneType',$request->getValue('uniqId'));
        $this->page->addVar('dfltimgcat',$imageDefaultCat);
        
        $this->addCSS(_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css');
    }
}
?>