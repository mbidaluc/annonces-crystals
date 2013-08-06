<?php

/**
 * Description of IndexController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Index\Mobile\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Tools;

class IndexController extends HelperBackController{
    
    protected $name = 'Index';
    
    public function executeIndex(HttpRequest $request){
        //gestion du background 
        $info_page =  parent::getInfosPage('home');
        // On ajoute une définition pour le titre 
        $manager = $this->managers->getManagerOf('Categories');
        $manager2 = $this->managers->getManagerOf('Annonce');
        $paged =$request->getValue('paged')?intval($request->getValue('paged')):1;
        if(!$this->cache->isCache($paged.'_index_mobile')){
            if($request->isXmlHttpRequest())
                $dataList = $manager->getListCategory(1,$paged);
            else
                $dataList = $manager->getListCategory(1);

            $pagination = $manager->getNumberRows();

            $count_annonce = array();
            foreach ($dataList as $value)
                $count_annonce[$value->idFils] = intval($value->idFils);
            $count_annonce = parent::countAnnonceByCategories($manager2->getAnnonceByCategories($count_annonce));
            parent::pagination('Categories',$pagination->number);        
            $this->page->addVar('dataList',$dataList);
            $this->page->addVar('count_annonce',$count_annonce);            
        }
        $this->page->addVar('page_index',$paged.'_index_mobile');
        $this->page->addVar('title_p', $manager2->getTotalAnnonce().'&nbsp;'._TOTAL_ANNONCE_);
    }
    
    protected function init(){
        $this->tabCSS[_THEME_CSS_MO_MOD_DIR_.$this->name.'/Index.css'] = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/Index.js'] = 'screen';        
        parent::init();
    }
     
}

?>
