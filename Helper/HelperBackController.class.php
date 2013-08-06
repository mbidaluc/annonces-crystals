<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Helper;
/**
 * Description of HelperBackController
 *
 * @author ffozeu
 */
if( !defined('IN') ) die('Hacking Attempt');

Use Library\BackController;
Use Library\Tools;

class HelperBackController extends BackController{
    //put your code here
    protected $name ='';
    
    protected function init(){
        $this->tabCSS[_WEB_CSS_DIR_.'jquery.simplyscroll.css'] = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'jquery.simplyscroll.min.js'] = 'screen';
        $this->page->addVar('tools', new Tools());
        $bgb = $this->getInfosPagepopup('login');
        
        if($bgb != 'null')
            $this->page->addVar('bgContentconn', $bgb);
        parent::init();
        $this->getAnnonceByPosistion();
        if(!$this->cache->isCache('search'))
            $this->page->addVar('tabCat', $this->getArbreCategories());
        else
            $this->page->addVar('searchcache', true );
        
        $this->page->addVar('nombrevisiteur', $this->getNbVisiteur());
    }

    public function getInfosPage($idPage){
        $manager = $this->managers->getManagerOf('BgManager');
        $dataObjt = $manager->findByName('identifiant',$idPage);
       
        if(is_array($dataObjt) && sizeof($dataObjt)){
            $this->page->addVar('infosPage', $dataObjt[0]);
            
            $this->getAnnoncePubByPosition_Page($dataObjt[0]->getId());
            
            $bgBody    =' style="';
            $bgContent =' style="';
            foreach ($dataObjt as $key => $obj) {
                if(trim($obj->getBgImageBody()) !=""){
                    $bgBody .='background: url('._UPLOAD_DIR_.'BgManager/'.$obj->getBgImageBody().')';
                    if(!$obj->getRepeatX() && !$obj->getRepeatY())
                        $bgBody .=' no-repeat';
                    elseif($obj->getRepeatX() && !$obj->getRepeatY())
                        $bgBody .=' repeat-x';  
                    elseif(!$obj->getRepeatX() && $obj->getRepeatY())
                        $bgBody .=' repeat-y';
                    
                }
                if(trim($obj->getBgImage()) !=""){
                    $bgContent .='background: url('._UPLOAD_DIR_.'BgManager/'.$obj->getBgImage().')';
                    if(!$obj->getRepeatX() && !$obj->getRepeatY())
                        $bgContent .=' no-repeat';
                    elseif($obj->getRepeatX() && !$obj->getRepeatY())
                        $bgContent .=' repeat-x';  
                    elseif(!$obj->getRepeatX() && $obj->getRepeatY())
                        $bgContent .=' repeat-y';
                }
                
            }
            if(!empty($bgBody))
                $bgBody .=' top center scroll';  
            $bgBody .='"';
            
            if(!empty($bgContent))
                $bgContent .=' top center scroll';  
            $bgContent .='"';
            
            if($idPage !='home'){
                $this->page->addVar('bgContent', $bgContent);
                $this->page->addVar('bgBody', $bgBody);
            }   
            else{
                $this->page->addVar('bgBody', $bgBody);
            }
        }else{
			$this->getAnnoncePubByPosition_Page(0);
		}
        $this->page->addVar('idPage', $idPage);
    }
    /**
     * Génération de l'arbre des catégories et sous catégories
     * @param type $idParent
     * @return type 
     */
    public function getArbreCategories($FOvisibility = 1, $search=''){
        $manager = $this->managers->getManagerOf('Categories');        
        $dataList = $manager->getCategories(1, $FOvisibility,$search);        
        foreach ($dataList as $value) {
            $all_parents_with_direct_sons[$value->getIdParent()][] = $value->getIdFils();
			$item_name_array[$value->getIdFils()] = $value;
        }        
         return !empty($dataList)?$this->getRecursiveItem($all_parents_with_direct_sons,$item_name_array,0):array();
    }
    
    public function getArbreSubCategories($idParent){
        $manager = $this->managers->getManagerOf('Categories');        
        $dataList = $manager->getListeFilsByIdParent($idParent);
       $data = array();
        //$dataList = $manager->getCategories(1); 
        foreach ($dataList as $value) {
            
            $all_parents_with_direct_sons[$value->getIdParent()][] = $value->getIdFils();
			$item_name_array[$value->getIdFils()] = $value;
        }
         //var_dump($all_parents_with_direct_sons);
        
         return !empty($dataList)?$this->getRecursiveItem($all_parents_with_direct_sons,$item_name_array, $idParent):array();
    }
    /**
     * traite de façon recursive un tableau
     * @param type $parent_item
     * @param type $item_name_array
     * @param type $this_parent
     * @param type $output
     * @return type 
     */
    public function getRecursiveItem(&$parent_item,&$item_name_array, $this_parent, &$output=array()){        
		if (!empty($parent_item[$this_parent])) {
			foreach($parent_item[$this_parent] as $this_item) {
                $output[$this_item]=$item_name_array[$this_item];				
				if (!empty($parent_item[$this_item])) {
					$this->getRecursiveItem($parent_item, $item_name_array, $this_item, $output);
				}				
			}
		}        
		return $output;
    }
    /**
     * gestion de la pagination en fonction du module
     * @param type $module
     * @param type $number
     * @param type $current_page
     * @param type $nber_per_page 
     */
    public function pagination($module,$number=16,$current_page=1,$nber_per_page=16){
        if($number > $nber_per_page){
            $nberPage = ceil($number/$nber_per_page);
            $pagination['current_page'] = $current_page;
            $pagination['nberPage'] = $nberPage;
            $this->page->addVar('pagination', $pagination);
        }
    }
    /**
     * compte le nombre d'annonce de chaque catégorie
     * @param type $dataList
     * @return type 
     */
    public function countAnnonceByCategories($dataList =array()){
        $output = array();
        foreach ($dataList as $value)
            $output[$value->idCategorie] = isset($output[$value->idCategorie])?$output[$value->idCategorie]+1:1;
        return $output;
    }
    
    public function getAnnonceByPosistion(){
        $manager = $this->managers->getManagerOf('Annonce');
        $tabPosition =array('"urgence"','"evenements"','"a_la_une"','"mobiles"','"speciales"');
        if(!$this->cache->isCache($tabPosition)){
            $dataList = $manager->getAnnonceByPositions($tabPosition);
            $out = array();
            foreach ($dataList as $value)
                $out[$value['technicalName']][] = $value;
        }else {
            $out = '';
        }
        
        /*$managerConf = $this->managers->getManagerOf('Configurations');
        $dataObjts   = $managerConf->getConfigurations();
        
        $this->page->addVar('configurations', $dataObjts);
        $out['alaune']['defaultImage'] = $dataObjts[0]->getDefaultUneImage();
        $out['special']['defaultImage'] = $dataObjts[0]->getDefaultSpecialeImage();*/
        
        $this->page->addVar('tabAnnonceByPoosition', $out);
    }
    
    public function getAnnoncePubByPosition_Page($page){
        $manager = $this->managers->getManagerOf('Adversiting');
        $tabPosition =array('"pub_1"','"pub_2"','"pub_3"','"pub_4"','"pub_5"','"pub_6"');
        $dataList = $manager->getAnnonceByPositions($tabPosition, $page);
        $out = array();
        foreach ($dataList as $value) {
            $out[$value['technicalName']][] = $value;
        }
        $this->page->addVar('tabAnnonceByPositionPub', $out);
        //var_dump($out);
    }
    
    public function getNbVisiteur(){
        $managerVisites = $this->managers->getManagerOf('CompteurVisites');
        $managerconf = $this->managers->getManagerOf('Configurations');

        $dataObjt = $managerconf->getConfigurations();
        
        $nbchifre = $dataObjt[0]->getCptNbDigit();
        $debutpt  = $dataObjt[0]->getCptBeginDigit();
        
        $insetion = $managerVisites->InsertNewVisiteur();
        $cpte     = $managerVisites->getNbreVisiteur();
        
        $totalvisieur = $debutpt + $cpte;
        $totalvisieur = (string)$totalvisieur;
    
        $nbchiffrevisiteur = strlen($totalvisieur);
    
        if($nbchifre > $nbchiffrevisiteur){
            $reste = $nbchifre - $nbchiffrevisiteur;
            for($i = 1; $i<=$reste; $i++)
                $totalvisieur = '0'.$totalvisieur;
        }
        $longeurnb = strlen($totalvisieur);
        $visiteur = '';
         for($i=0; $i<$longeurnb; $i++)
            $visiteur .= '<img alt="'.$totalvisieur[$i].'" src="'._UPLOAD_DIR_.'CompteurVisites/'.$totalvisieur[$i].'.gif" />';
         return $visiteur;
        
    }
    
    public function getInfosPagepopup($idPage){
        $manager = $this->managers->getManagerOf('BgManager');
        $dataObjts = $manager->findByName('identifiant',$idPage);
        //var_dump($dataObjt);
        $bgBody = "";
        if(is_array($dataObjts) && sizeof($dataObjts)){  
            foreach ($dataObjts as $key => $obj) {
                if($obj->getBgImage()!=''){
                    $bgBody .='background: url('._UPLOAD_DIR_.'BgManager/'.$obj->getBgImage().')';
                }
                if(!$obj->getRepeatX() && !$obj->getRepeatY())
                    $bgBody .=' no-repeat';
                elseif($obj->getRepeatX() && !$obj->getRepeatY())
                    $bgBody .=' repeat-x';
                elseif(!$obj->getRepeatX() && $obj->getRepeatY())
                    $bgBody .=' repeat-y';                
            }
            if(!empty($bgBody))
                $bgBody .=' center center scroll';  
             return $bgBody;
       }else{
           return "null";
       }
      
    }
}

?>
