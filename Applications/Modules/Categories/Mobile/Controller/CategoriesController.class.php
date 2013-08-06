<?php

/**
 * Description of CategoriesController
 *
 * @author Le Maître Rikudou
 * 
 */

namespace Applications\Modules\Categories\Mobile\Controller;

if( !defined('IN') ) die('Hacking Attempt');

//use Library\BackController;
use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Tools;

class CategoriesController extends HelperBackController{
    //put your code here
    
    public function executeShow(HttpRequest $request){
        parent::getInfosPage('category');
		
        $manager = $this->managers->getManagerOf('Categories');
        $managerPhoto = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
		
        $dataList = array();
		$images = array();
        if($request->getExists('link_rewrite')){
            $paged =$request->getValue('paged')?intval($request->getValue('paged')):1;
            if(!$this->cache->isCache($paged.$request->getValue('link_rewrite').'_categorie')){
                $dataObjt = $manager->findByName('link_rewrite',$request->getValue('link_rewrite'));
                if(is_array($dataObjt) && sizeof($dataObjt)){
                    $dataObjt = $dataObjt[0];
                    $subCat = $manager->getListeFilsByIdParent($dataObjt->getIdFils());
                    $manager = $this->managers->getManagerOf('Annonce');
                    $countAnnonceByCategory[$dataObjt->getIdFils()] = $dataObjt->getIdFils();
                    foreach ($subCat as $value)
                        $countAnnonceByCategory[$value->idFils] = intval($value->idFils);
                    $count_annonce = parent::countAnnonceByCategories($manager->getAnnonceByCategories($countAnnonceByCategory));
                    // gestion de la navigation ajax
                    if($request->isXmlHttpRequest())
                        $dataList = $manager->getAnnonceByCategory($dataObjt->getIdFils(),intval($paged));
                    else
                        $dataList = $manager->getAnnonceByCategory($dataObjt->getIdFils());  

                    $countelt = $manager->getNumberRows();
                    foreach ($dataList as $infor) {
                        $photo = $managerPhoto->getPrincipaleImage($infor->getId()); 
                        if(!empty($photo))
                            $images[$infor->getId()] = $photo[0]->getUrl();
                    }                    
                    $this->page->addVar('title_p',$dataObjt->getLibelle());
                    $this->page->addVar('category',$dataObjt);
                    $this->page->addVar('countAnnonceSubCat',$count_annonce);
                    $this->page->addVar('countAnnone',$countelt->number);
                    parent::pagination('Annonce',$countelt->number,$paged,5);
                    $this->page->addVar('dataList',$dataList); 
                    $this->page->addVar('listedesannonces',$dataList);
                    $this->page->addVar('images',$images);                    
                }
            }
            $this->page->addVar('page_index',$paged.$request->getValue('link_rewrite').'_categorie');
                       
        }
    }
    
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        parent::init();
    }
}

?>
