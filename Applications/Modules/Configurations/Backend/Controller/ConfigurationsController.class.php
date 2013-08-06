<?php
    /**
     * Description of CategoriesController
     *
     * @author MBIDA Luc
     *
     */

namespace Applications\Modules\Configurations\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;
use Applications\Modules\Configurations\Form\ConfigurationsForm;

class ConfigurationsController extends HelperBackController{
        // Inserer votre code ici!
    
     private function leftcolumn(){
        $out = array();
        $out['priorite.html']            = 'Gérer les priorités';
        $out['bgmanager.html']           = 'Gérer les pages';
        $out['position.html']            = 'Gérer les positions';
        $out['coutimage.html']           = 'Gérer les coûts d\'images';
        $out['admintrancheshoraires.html']    = 'Tranches Horaires';
        $out['listpartenaire.html']      = 'Partenaires';
        $out['abus.html']                = 'Abus';
        $out['emailconfig.html']         = 'e-mail config';
        $out['compteurvisite.html']      = 'Compteur de Visite';
     
        return $this->page->addVar('left_content', $out);

    }

    public function executeConfigurationscreate(HttpRequest $request){
        // On ajoute une définition pour le titre
        //var_dump($_FILES);
        $this->leftcolumn();
        $this->page->addVar('title', 'Contigurations du site');

        $manager = $this->managers->getManagerOf('Configurations');

        $dataArray = array();

        $dataObjt = $manager->getConfigurations();
        $dataArray['nomSite']             = $dataObjt[0]->getNomSite();
        $dataArray['emailSite']           = $dataObjt[0]->getEmailSite();
        $dataArray['repeatX']             = $dataObjt[0]->getRepeatX();
        $dataArray['repeatY']             = $dataObjt[0]->getRepeatY();
        $dataArray['is_active']           = $dataObjt[0]->getIs_Active();
       
        $dataArray['metaDescription']     = $dataObjt[0]->getMetaDescription();
        $dataArray['metaKeyword']         = $dataObjt[0]->getMetaKeyword();
        $dataArray['bgImage']             = $dataObjt[0]->getBgImage();
        $dataArray['coutDuree']           = $dataObjt[0]->getCoutDuree();
        $dataArray['prixUniteAnnonce']           = $dataObjt[0]->getPrixUniteAnnonce();
        $image = $dataObjt[0]->getBgImage();

        if($request->getMethod('post')){            
            $filedata = Tools::addFile('bgImageFile', _SITE_UPLOAD_DIR_.'Configurations/', false, 'bgImage');
            $fileda = Tools::addFile('defaultCategoryImageFile', _SITE_UPLOAD_DIR_.'Categories/', true, 'defaultCategoryImage', 'category');
            // vérification de la nature de la donnée renvoyé. tableau = erreurs
            if(is_array($filedata))
                $_POST['bgImage'] = '';
            else
                $_POST['bgImage'] = $filedata;
            
            if(is_array($fileda))
                $_POST['defaultCategoryImage'] = '';
            else
                $_POST['defaultCategoryImage'] = $fileda;
            
            if($manager->updateConfigurations($_POST)){
                //$this->app()->httpResponse()->redirect('configurations.html');
            }else{
                $this->errors = 'Echec lors de la mise à jour';
            }
            $dataArray = $_POST;
            
        }
        $this->page->addVar('img', $image);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', ConfigurationsForm::getForm($dataArray));
    }
    
    public function executeConfigurationsimages(HttpRequest $request){
        // On ajoute une définition pour le titre
        //var_dump($_FILES);
        $this->leftcolumn();
        $this->page->addVar('title', 'Gestion des cout');

        $manager = $this->managers->getManagerOf('Configurations');

        $dataArray = array();

        $dataObjt = $manager->getConfigurations();
        $dataArray['cout1image']             = $dataObjt[0]->getCout1image();
        $dataArray['cout2image']             = $dataObjt[0]->getCout2image();
        $dataArray['cout3image']             = $dataObjt[0]->getCout3image();
        $dataArray['cout4image']             = $dataObjt[0]->getCout4image();
        $dataArray['cout5image']             = $dataObjt[0]->getCout5image();
       
        $dataArray['cout6image']             = $dataObjt[0]->getCout6image();
        $dataArray['cout7image']             = $dataObjt[0]->getCout7image();
        $dataArray['cout8image']             = $dataObjt[0]->getCout8image();
        $dataArray['cout9image']             = $dataObjt[0]->getCout9image();
        

        if($request->getMethod('post')){            
            
            if($manager->updateCoutImages($_POST)){
                $this->app()->httpResponse()->redirect('configurations.html');
            }else{
                $this->errors = 'Echec lors de la mise à jour';
            }
            $dataArray = $_POST;
            
        }
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', ConfigurationsForm::getFormImage($dataArray));
    }
    
    public function executeDefaultImages(HttpRequest $request){
        $this->page->addVar('title', 'Images Annonces par défaut');
        $dataArray = array();
       
        $this->leftcolumn();

         $manager = $this->managers->getManagerOf('Configurations');

       

        $dataObjt = $manager->getConfigurations();
        
        $dataArray['defaultSpecialeImage']        = $dataObjt[0]->getDefaultSpecialeImage();
        $dataArray['defaultUneImage']             = $dataObjt[0]->getDefaultUneImage();
        $dataArray['defaultAnnonceImage']         = $dataObjt[0]->getDefaultAnnonceImage();
        
        $data['idParam '] = 1;
        
         if($request->getMethod('post')){            
            $filedata1 = Tools::addFile('DefaultSpecialeImageFile', _SITE_UPLOAD_DIR_.'Annonce/', false, 'defaultSpecialeImage');
            $filedata2 = Tools::addFile('DefaultUneImageFile', _SITE_UPLOAD_DIR_.'Annonce/', false, 'defaultUneImage');
            $filedata3 = Tools::addFile('DefaultAnnonceImageFile', _SITE_UPLOAD_DIR_.'Annonce/', false, 'defaultAnnonceImage');
            // vérification de la nature de la donnée renvoyé. tableau = erreurs
            //var_dump($filedata3);
            //die();
            if(is_array($filedata1)){
                $data['defaultSpecialeImage'] = '';
                $img1 = 0;
            }else{
                $data['defaultSpecialeImage'] = $filedata1;
                $this->addFileDefault($filedata1, 'speciale');
            }
            
            if(is_array($filedata2)){
                $data['defaultUneImage'] = '';
                  $img1 = 0;
            }else{
                $data['defaultUneImage'] = $filedata2;
                $this->addFileDefault($filedata2, 'une');
            }
            
            if(is_array($filedata3)){
                $data['defaultAnnonceImage'] = '';
                  $img1 = 0;
            }else{
                $data['defaultAnnonceImage'] = $filedata3;
                $this->addFileDefault($filedata3, 'other');
            }
            
            if(!isset($img1)){
                if($manager->updateDefaultImages($data)){
                    $this->app()->httpResponse()->redirect('configurations.html');
                }else{
                    $this->errors = 'Echec lors de la mise à jour';
                }
            }else{
                 $this->errors = 'Images trop lourdes';
            }
         }
         
        
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', ConfigurationsForm::getFormDefaultImage($dataArray));
    }
    
    public function addFileDefault($source, $type){
        
        switch ($type) {
            
            case 'speciale':
                $out = array(
                    'speciale'=>array('width'=>107,'height'=>70)
                    );
                break;
            
            case 'une':
                $out = array(
                    
                    'une'=>array('width'=>209,'height'=>127)
                    );
                break;
            
             case 'other':
                $out = array(
                    'meduim'=>array('width'=>132,'height'=>105),
                    'small'=>array('width'=>60,'height'=>57),
                    'big'=>array('width'=>316,'height'=>239),
                    'other'=>array('width'=>96,'height'=>67)
                    );
                break;
        }
        if($source !=""){
            foreach ($out as $key => $value)
                Tools::imageResize(_SITE_UPLOAD_DIR_.'Annonce/' . $source, _SITE_UPLOAD_DIR_.'Annonce/' . $key.$source, $value['width'], $value['height']);
        }        
    }

}
?>