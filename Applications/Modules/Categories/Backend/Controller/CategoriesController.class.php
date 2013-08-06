<?php

/**
 * Description of CategoriesController
 *
 * @author Le Maître Rikudou
 * 
 */

namespace Applications\Modules\Categories\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

//use Library\BackController;
use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;
use Applications\Modules\Categories\Form\CategoriesForm;

class CategoriesController extends HelperBackController{

    /**
     * affiche les action du module à droite
     * @return type 
     */
    private function leftcolumn(){
        $out = array();
        $out['categories.html']           = 'Liste des Catégories';
        $out['categories-edit.html']      = 'Nouvelle Catégorie';

        return $this->page->addVar('left_content', $out);

    }
    /**
     * affichage le contenur de droite
     * @return type 
     */
    private function rightcolumn(){
        $out ='Gérer Les Catégories';
        return $this->page->addVar('right_content', $out);
    }

    /**
     * listing des différentes catégories
     */    
    public function executeCategories(){
        $this->leftcolumn();
        $this->rightcolumn();
        
        $manage = $this->managers->getManagerOf('Categories');

        $this->page->addVar('title', 'Listing des Catégories');        
        $datalist2 = $this->getArbreCategories(0);     
        
        $this->page->addVar('datalist', $datalist2);
        $this->page->addVar('pagination', $this->pagination);
    }

    /**
     * Création ou modification d'une catégorie
     * @param HttpRequest $request 
     */
    public function executeCreate(HttpRequest $request){
        // On ajoute une définition pour le titre        
        $this->page->addVar('title', 'Ajout/Edition d\'une catégorie');

        $this->leftcolumn();
        $this->rightcolumn();
        //tableau des données
        $dataArray = array();
        $edit = false;
        $manager = $this->managers->getManagerOf('Categories');        

        $tab['NULL'] = 'Catégorie parente';
        $datalist = $manager->getListeParent();;        
        foreach($datalist as $data){
            $decalage ='';
            $decalage = str_pad($decalage, $data->getLength(), '>');  
            $tab[$data->getIdFils()] = $decalage.$data->getLibelle();
        }
        //cas de l'édition
        if($request->getExists('idFils')){
            $edit =true;
            $dataObjt = $manager->findByName('idFils',intval($request->getData('idFils')));
            $dataArray['idFils']      = $dataObjt[0]->getIdFils();
            $dataArray['libelle']     = $dataObjt[0]->getLibelle();
            $dataArray['link_rewrite']= $dataObjt[0]->getLink_rewrite();
            $dataArray['idParent']    = $dataObjt[0]->getIdParent();
            $dataArray['image']       = $dataObjt[0]->getImage();
            $dataArray['description'] = $dataObjt[0]->getDescription();
            $dataArray['description'] = $dataObjt[0]->getDescription();
            $dataArray['frontVisitility'] = $dataObjt[0]->getFrontVisitility();
            $this->page->addVar('title', 'Modifier la Catégorie');
        }else{
            $dataArray = $_POST;
        }
        // cas d'un post
        $dataForm = CategoriesForm::getForm($dataArray, $tab,$edit);
        if($request->getMethod('post')){
            
            //if ($dataForm->is_valid($_POST)) {
                $filedata = Tools::addFile('imageFile', _SITE_UPLOAD_DIR_.'Categories/', true, 'image','category');
                $filedataAnnonce = Tools::addFile('DefaultAnnonceImageFile', _SITE_UPLOAD_DIR_.'Annonce/', true, 'defaultAnnonceImage','annonces');
                // vérification de la nature de la donnée renvoyé. tableau = erreurs
                if(is_array($filedata))
                    $_POST['image'] = '';
                else
                    $_POST['image'] = $filedata;
                
                if(is_array($filedataAnnonce))
                    $_POST['defaultAnnonceImage'] = '';
                else
                    $_POST['defaultAnnonceImage'] = $filedataAnnonce;
                
                //on recupère la profondeur de l'élement s'il a un parent non null
                if($request->getValue('idParent') != 'NULL'){
                    $length = intval($manager->getValue('length','idFils='.$request->getValue('idParent')))+1;
                }else
                    $length = 0;
                $request->addPostVar('length',$length);
                
                if(!$request->getExists('idFils')){                    
                    if($manager->add($request->getSendData($_POST))){
                        $this->app()->cache()->clearCache();
                        $this->app()->httpResponse()->redirect('categories.html');
                    }else{
                        $this->errors = 'Echec lors de l\'enregistrement';
                    }
                }else{
                   // var_dump($_POST);
                    if($manager->update($_POST, 'idFils')){
                        $this->app()->cache()->clearCache();
                        $this->app()->httpResponse()->redirect('categories.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
           /* }else{
                $dataArray = $_POST;
            }*/
        }

        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm);
    }

    public function executeDelete(HttpRequest $request){
        $manager = $this->managers->getManagerOf('Categories');
        if($request->getExists('idFils')){
            $out['idFils'] = $request->getData('idFils');
            if($manager->delete($out)){
                $this->app()->cache()->clearCache();
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('categories.html');
        }
    }
    
    public function executeResults(HttpRequest $request) {
            $out = array();
            $manager = $this->managers->getManagerOf('Categories');             
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->deleteChecked($_POST['eltcheck'],'idFils');
                        }
                        $this->app()->cache()->clearCache();
                        $data = $this->getArbreCategories(0);
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->ActiveChecked($_POST['eltcheck'],'idFils','frontVisitility');
                            
                        }
                        $this->app()->cache()->clearCache();
                        $data = $this->getArbreCategories(0);
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->UnActiveChecked($_POST['eltcheck'],'idFils','frontVisitility');
                           
                        }
                        $this->app()->cache()->clearCache();
                        $data = $this->getArbreCategories(0);
                        break;
                   
                    default:
                        break;
                }
            }
            
          
            if($request->getValue('searchzone') != "" && $request->getValue('searchzone') != "recherche" ){
                $out[] = 'titre';
                $out[] = 'identifiant';
                $data = $this->getArbreCategories(0,$request->getValue('searchzone'));
            }else{
                $data = $this->getArbreCategories(0);
            }
            

            $this->page->addVar('datalist', $data); 
            $this->page->addVar('pagination', $this->pagination);
    }
    
    
}

?>
