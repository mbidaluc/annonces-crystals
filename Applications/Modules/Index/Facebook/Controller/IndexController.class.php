<?php

/**
 * Description of IndexController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Index\Facebook\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Tools;

class IndexController extends HelperBackController{
    
    protected $name = 'Index';
    
    public function executeIndex(HttpRequest $request){
        // On ajoute une définition pour le titre 
        $manager2 = $this->managers->getManagerOf('Annonce');
        $paged =$request->getValue('paged')?intval($request->getValue('paged')):1;
        if(!$this->cache->isCache($paged.'_index_facebook')){
            
            $dataList = $this->getAnnonceByPosistion();      
            $this->page->addVar('dataListfacebook',$dataList);         
            $this->page->addVar('title_p', $manager2->getTotalAnnonce().'&nbsp;'._TOTAL_ANNONCE_);
            
        }
        $this->page->addVar('page_index',$paged.'_index_facebook');
    }
    
    public function getAnnonceByPosistion(){
        $manager = $this->managers->getManagerOf('Annonce');
        $tabPosition =array('"a_la_une"');
        $dataList = $manager->getAnnonceByPositions($tabPosition);
        return $dataList;
    }
}

?>
