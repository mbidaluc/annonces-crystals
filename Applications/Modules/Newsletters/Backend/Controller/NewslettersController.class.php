<?php

/**
 * Description of NewslettersController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Newsletters\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;
use Applications\Modules\Newsletters\Form\NewslettersForm;

class NewslettersController extends HelperBackController{
    //put your code here
    
    public function executeList(HttpRequest $request){
     
        $this->page->addVar('title', 'Gestion Newsletter');
        
        $manager = $this->managers->getManagerOf('Newsletters');
        
        $newsletters = $manager->findAll2();
        
        $this->page->addVar('newsletterslist', $newsletters);
        
        $this->leftcolumn();
        $this->rightcolumn();
    }
    
    private function leftcolumn(){
        $out = array();
        $out['add-newsletter.html']= 'Céer une Newsletter';
        $out['newsletter.html']= 'Listing des Newsletters';
        $out['newsletter-membre.html']= 'Membres Inscrits';
        
        return $this->page->addVar('left_content', $out);        
    }
    
    private function rightcolumn(){
        $out ='Gérez vos newsletters. Vous pouvez ajouter ou lire une newsletter.';
        return $this->page->addVar('right_content', $out);
    }
    
    public function executeDelete(HttpRequest $request){
        
        $manager = $this->managers->getManagerOf('Newsletters');
        if($request->getExists('id_news')){
            $out['id_news'] = $request->getData('id_news');
            if($manager->delete($out)){
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('newsletter.html');
            
        }
    }
    
        
    public function executeCreate(HttpRequest $request){
        $this->page->addVar('title', 'Envoyer une newsletter');
        $this->leftcolumn();
        $this->rightcolumn();
        $data_array = array();
        $edit = false;
           
        $manager = $this->managers->getManagerOf('Newsletters');     
        
                  
        //$manager1 = $this->managers->getManagerOf('Categories');       
        $tab['NULL'] = 'Catégorie parente';
        $infolist = $this->getArbreCategories();
        //var_dump($infolist);die();
        foreach($infolist as $data):
            $decalage ='';
            $decalage = str_pad($decalage, $data->getLength(), '>');  
            $tab[$data->getIdFils()] = $decalage.$data->getLibelle();
            
        endforeach;
        
        if($request->getExists('id_news')){
               $dataObjt = $manager->findByName('id_news',intval($request->getValue('id_news')));
               $data_array['titre'] = $dataObjt[0]->getTitre();
               $data_array['message'] = html_entity_decode($dataObjt[0]->getMessage());
               
               $this->page->addVar('title', 'Modifier la page');
               $this->page->addVar('idelt', $request->getData('id_news'));
        }else{
               $dataForm = $_POST ;
          }
                
        if($request->getMethod('post')){
            $dataForm = NewslettersForm::getForm($_POST,$tab,$edit);
            if ($dataForm->is_valid($_POST)) {
                //var_dump($_POST);die();
                 $_POST['date_news'] = date('Y-m-d h:i:s');         
                if(!$request->getExists('id_news')){
                    //$manager->add($_POST);
                    if($manager->add($_POST)){
                        $this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('newsletter.html');
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED;
                    }
                }else{
                    if($manager->update($_POST,'id_news')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('newsletter.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
        }
                
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', NewslettersForm::getForm($data_array,$tab,$edit));      
                 
        
    }
    
    public function executeMember(HttpRequest $request){
        $this->page->addVar('title', 'Inscrit à la newsletter');
        $this->leftcolumn();
        $this->rightcolumn();
        $manager = $this->managers->getManagerOf('Newsletters');
        $members = $manager->getMembres();
        $this->page->addVar('members', $members);
    }
    public function sendNewletter(array $param){
        
        $manager = $this->managers->getManagerOf('Newsletters');
        $result = $manager->getMembres();
        foreach ($result as $data) {
            mail($data['email'], $param['titre'], $param['message']);
        }
    }
    
    
     
   
}

?>
