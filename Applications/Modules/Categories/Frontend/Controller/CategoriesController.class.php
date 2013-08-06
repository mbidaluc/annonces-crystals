<?php

/**
 * Description of CategoriesController
 *
 * @author Le Maître Rikudou
 * 
 */

namespace Applications\Modules\Categories\Frontend\Controller;

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
        $managerAnn = $this->managers->getManagerOf('Annonce');
		
        $dataList = array();
		$images = array();
        if($request->getExists('link_rewrite')){
            $paged =$request->getValue('paged')?intval($request->getValue('paged')):1;
            if(!$this->cache->isCache($paged.$request->getValue('link_rewrite').'_categorie')){
                $dataObjt = $manager->findByName('link_rewrite',$request->getValue('link_rewrite'));
                if(is_array($dataObjt) && sizeof($dataObjt)){
                    $dataObjt = $dataObjt[0];
                    $subCat = $manager->getListeFilsByIdParent($dataObjt->getIdFils());
                    
                    if($dataObjt->getIdParent()){
                        $objParent = $manager->findById2('idFils',$dataObjt->getIdParent());
                        $countAnnonceByCategory[$dataObjt->getIdParent()] = $dataObjt->getIdParent();
                        $subCat = $manager->getListeFilsByIdParent($dataObjt->getIdParent());
                    }else{
                        $countAnnonceByCategory[$dataObjt->getIdFils()] = $dataObjt->getIdFils();
                    }
                     
                    if(is_array($subCat) && count($subCat))
                        foreach ($subCat as $value)
                            $countAnnonceByCategory[$value->idFils] = intval($value->idFils);
                   
                    $count_annonce = parent::countAnnonceByCategories($managerAnn->getAnnonceByCategories($countAnnonceByCategory));
                   
                    // gestion de la navigation ajax
                    if($request->isXmlHttpRequest())
                        $dataList = $managerAnn->getAnnonceByCategory($dataObjt->getIdFils(),intval($paged));
                    else
                        $dataList = $managerAnn->getAnnonceByCategory($dataObjt->getIdFils());  
                    
                    //var_dump($dataList);
                    $countelt = $managerAnn->getNumberRows();
                    foreach ($dataList as $infor) {
                        $photo = $managerPhoto->getPrincipaleImage($infor->getId()); 
                        if(!empty($photo))
                            $images[$infor->getId()] = $photo[0]->getUrl();
                    }
                    $total_annonces = 0;
                    foreach ($count_annonce as $value) 
                        $total_annonces += $value;
                    
                    $this->page->addVar('title_p',$dataObjt->getLibelle());
                   
                    if($dataObjt->getIdParent())
                        $this->page->addVar('category_parent',$objParent[0]);
                    else
                        $this->page->addVar('category_parent',$dataObjt);
                    $this->page->addVar('category',$dataObjt);
                    
                    $this->page->addVar('subCat',$subCat);
                    $this->page->addVar('countAnnonceSubCat',$count_annonce);
                    $this->page->addVar('countAnnone',$countelt->number);
                    //$this->page->addVar('countAnnone',$total_annonces);
                    $this->page->addVar('total',$total_annonces);
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
