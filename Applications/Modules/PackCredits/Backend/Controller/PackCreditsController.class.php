<?php
    /**
    * Description of PackCreditsController
    *
    * @author Luc Alfred MBIDA
    *
    */

namespace Applications\Modules\PackCredits\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\PackCredits\Form\PackCreditsForm;
use Library\Tools;

class PackCreditsController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "PackCredits";

    /**
     * affiche les action du module à droite
     * @return type 
     */
    private function leftcolumn(){
        $out = array();
        $out['packs.html']               = 'Listing des packs de cdts';
        $out['packs-add.html']           = 'Ajouter un pack de cdt';

        $out['paiement-credits.html']    = 'Paiement Credits';
        $out['validating-credits.html']  = 'Paiement Credits attente de validation';
        $out['validated-credits.html']   = 'Paiement Credits effectués';

        return $this->page->addVar('left_content', $out);

    }

    /**
    * affichage le contenur de droite
    * @return type 
    */
    private function rightcolumn(){
        $out ='Gestion des différentes Packs de crédits du site';
        return $this->page->addVar('right_content', $out);
    }
    /**
    * Listing des packs de credits
    * @param HttpRequest $request 
    */
    public function executePackCredits(HttpRequest $request){
        $this->leftcolumn();
        $this->rightcolumn();

        $this->page->addVar('title', 'Liste des packs de credit');

        $manager = $this->managers->getManagerOf('PackCredits');

        $dataList = $manager->findAll2('id');


        $this->page->addVar('dataList', $dataList);
        $this->page->addVar('pagination', $this->pagination);
    }

    /**
    * create a new credit pack
    * @param HttpRequest $request 
    */
    public function executePackCreditscreate(HttpRequest $request){

        $this->leftcolumn();
        $this->rightcolumn();

        $this->page->addVar('title','Ajouter un pack');

        $dataArray = array();
        $edit = false;

        $manager = $this->managers->getManagerOf('PackCredits');

        //cas de l'édition
        if($request->getExists('id')){

            $edit =true;

            $dataObjt  = $manager->findById(intval($request->getValue('id')));
            $dataArray = $dataObjt->tabAttrib;
            $this->page->addVar('title', 'Modifier un Pack de cdt');
            $this->page->addVar('idelt', $request->getData('id'));        
        }else{
            $dataArray = $_POST;
        }
        $dataForm = PackCreditsForm::getForm($dataArray,$edit); 
        if($request->getMethod('post')){                       
            //test de la validation du post            
            //if ($dataForm->is_valid($_POST)) {
                $filedata = Tools::addFile('imageFile', _SITE_UPLOAD_DIR_.$this->name.'/', false, 'image');
                // vérification de la nature de la donnée renvoyé. tableau = erreurs
                if(is_array($filedata))
                    $_POST['image'] = '';
                else
                    $_POST['image'] = $filedata;
                if(!$request->getExists('id')){
                    if($manager->add($request->getSendData($_POST))){ 
                        $this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);                        
                        $this->app()->httpResponse()->redirect('packs.html');
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED_;
                    }
                }else{                    
                    if($manager->update($request->getSendData($_POST),'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('packs.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
           // }
        }
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
    }

    public function executeDelete(HttpRequest $request){
        $manager = $this->managers->getManagerOf('PackCredits');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->delete($out)){
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('packs.html');
        }
    }
}
?>