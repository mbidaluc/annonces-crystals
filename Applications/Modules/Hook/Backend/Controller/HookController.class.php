<?php
/**
* Description of HookController
*
* @author ffozeu
*
*/

namespace Applications\Modules\Hook\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\Hook\Form\HookForm;
use Library\Tools;

class HookController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = 'Hook';
    /**
     * affiche les action du module à droite
     * @return type 
     */
    private function leftcolumn(){
        $out = array();
        $out['position.html']           = 'Listing des positions';
        $out['position-add.html']      = 'Ajouter Position';

        return $this->page->addVar('left_content', $out);

    }
    /**
     * affichage le contenur de droite
     * @return type 
     */
    private function rightcolumn(){
        $out ='Gestion des différentes positions du site ainsi que leurs coût';
        return $this->page->addVar('right_content', $out);
    }
    /**
     * Listing des hooks
     * @param HttpRequest $request 
     */
    public function executeHook(HttpRequest $request){
        $this->leftcolumn();
        $this->rightcolumn();
        
        $this->page->addVar('title', 'Liste des Postions');
        
        $manager = $this->managers->getManagerOf('Hook');
        
        $dataList = $manager->findAll2('name', 'ASC');
        
        $this->page->addVar('dataList', $dataList);
        $this->page->addVar('pagination', $this->pagination);
    }
    
    /**
     * create a new hook
     * @param HttpRequest $request 
     */
    public function executeCreate(HttpRequest $request){
        
        $this->leftcolumn();
        $this->rightcolumn();
        
        $this->page->addVar('title','Ajouter une position');
        
        $dataArray = array();
        $edit = false;
        
        $manager = $this->managers->getManagerOf('Hook');
        
        //cas de l'édition
        if($request->getExists('id')){
            
            $edit =true;

            $dataObjt  = $manager->findById(intval($request->getValue('id')));
            $dataArray = $dataObjt->tabAttrib;
            $this->page->addVar('title', 'Modifier une position');
            $this->page->addVar('idelt', $request->getData('id'));        
        }else{
            $dataArray = $_POST;
        }
        $dataForm = HookForm::getForm($dataArray,$edit); 
        if($request->getMethod('post')){                       
            //test de la validation du post
            if ($dataForm->is_valid($_POST)) {
                if(!$request->getExists('id')){
                    if($manager->add($request->getSendData($_POST))){ 
                        $this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);                        
                        $this->app()->httpResponse()->redirect('position.html');
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED_;
                    }
                }else{                    
                    if($manager->update($request->getSendData($_POST),'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('position.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
        }
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
    }
    
}
?>