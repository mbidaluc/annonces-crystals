<?php
/**
* Description of NewsLetterController
*
* @author Mbida Luc Alfred
*
*/

namespace Applications\Modules\NewsLetter\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\NewsLetter\Form\NewsLetterForm;
use Library\Tools;

class NewsLetterController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "NewsLetter";

    function executeNewsletter(HttpRequest $request){
        parent::getInfosPage('newsletter');
        
        $this->addCSS(_THEME_CSS_MOD_DIR_.$this->name.'/Newsletter2.css');
        $this->addJS(_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js');
        
        $managerMembers     = $this->managers->getManagerOf('Members');
        $managerNewsLetters = $this->managers->getManagerOf('NewsLetter');
        $this->page->addVar('title', 'S\'inscrire aux news letters');
        
        $datalist2 = $this->getArbreCategories();  
        //var_dump($_POST);
        if($request->getMethod('post')){
            $members = $managerMembers->verifEmail($request->getValue('email_member'));
            // Cas où le membre n'est pas encore inscrit!
            if(empty($members)){
                if($managerMembers->add($request->getSendData($_POST))){
                    $lastmember = $managerMembers->getLastMemberId();      
                    $idmember = $lastmember[0]->id_member;  
                }else{
                    $this->errors = 'Echec lors de l\'enregistrement';
                }
            }else{//cas où le membre est déjà inscrit!
               $idmember = $members[0]->getId_member();
            }
            $_SESSION['newsletters']['IdMembers'] = $idmember;
            foreach ($request->getValue('idCategorie') as $value) {
                $_SESSION['newsletters']['idCategorie'] = $value;
                if($managerNewsLetters->add($_SESSION['newsletters'])){
                    //$this->app()->httpResponse()->redirect('/');
                }else{
                    $this->errors = 'certaines informations n\'ont pas pu être enregistrées! Il est possible que vous soyez déjà inscris pour cette catégorie';
                }
            }
            $this->app()->httpResponse()->redirect('/');
        }
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('datalist', $datalist2);
    }

    public function executeSubCategorie(HttpRequest $request){
        $datalist = $this->getArbreSubCategories($request->getValue('idCad'));
        $this->page->addVar('datalist', $datalist);
    }
    
     public function executeDeleteMember(HttpRequest $request){
        $manager = $this->managers->getManagerOf('Members');
        if($request->getExists('id')){
            $out['id_member'] = $request->getData('id');
            if($manager->delete($out)){
                $this->errors = 'suppression réussie Vous ne recevrez plus de newsletter';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            
        } 
        $this->page->addVar('errors', $this->errors);
    }
}
?>