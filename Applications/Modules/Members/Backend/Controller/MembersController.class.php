<?php
    /**
    * Description of MembersController
    *
    * @author Mbida Luc Alfred
    *
    */

    namespace Applications\Modules\Members\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Members\Form\MembersForm;
    use Library\Tools;

    class MembersController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Members";
        
         private function leftcolumn(){
            $out = array();
            $out['newsletter-membre.html']= 'Membres Inscrits';
            $out['newsletter-params.html']= 'paramètres des newsletters';

            return $this->page->addVar('left_content', $out);        
        }
        
        function executeMembers(){
            $this->leftcolumn();
            $this->page->addVar('title', 'Liste des membres');        
            $manager   = $this->managers->getManagerOf('Members');  
            $dataList = $manager->findAll2('id_member');
            $this->page->addVar('datalist', $dataList);
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeDelete(HttpRequest $request){
            $manager = $this->managers->getManagerOf('Members');
            if($request->getExists('id')){
                $out['id_member'] = $request->getData('id');
                if($manager->delete($out)){
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                $this->app()->httpResponse()->redirect('newsletter-membre.html');
            }
        }
        
        public function executeMescategories(HttpRequest $request){
            $manager = $this->managers->getManagerOf('Members');
            $this->leftcolumn();
            if($request->getExists('id')){
                $listcat = $manager->getCategorie($request->getData('id'));
                $this->page->addVar('datalist', $listcat);
            }
            
        }
    }
?>