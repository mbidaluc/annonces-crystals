<?php
    /**
    * Description of PartenairesController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\Partenaires\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Partenaires\Form\PartenairesForm;
    use Library\Tools;

    class PartenairesController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Partenaires";
		
		public function executePartenairesList(){
			parent::getInfosPage('partenaires');
            $manager = $this->managers->getManagerOf('Partenaires');
            
            $datalist = $manager->findByName("is_active", 1);
            $this->page->addVar('datalist', $datalist);
        }
        
        function executePartenaires(HttpRequest $request){
			parent::getInfosPage('partenaires');
            $managerPartenaires = $this->managers->getManagerOf('Partenaires');
            $managerMembers     = $this->managers->getManagerOf('Members');
            $outs = array();
            $data = array();
            $id = 0;
            
             if($request->getMethod('post')){
                 //var_dump($_POST);
                 if(!empty($_POST['email_member'])){
                    if(empty($_POST['partenaire']) && !$_SESSION['Annonce']['prixT']){
                        $this->errors = "Votre annonce est gratuite vous devez choisir au moins un partenaire";
                    }else{
                        $members = $managerMembers->verifEmail($_POST['email_member']);
                        if(empty($members)){
                            $outs['phone'] = $_POST['phone'];
                            $outs['email_member'] = $_POST['email_member'];
                            $outs['date_souscription'] = date("Y-m-d H:i:s");
                            if($managerMembers->add($outs)){
                                $obj = $managerMembers->findByName('email_member', $_POST['email_member']);
                                $id = $obj[0]->getId_member();
                            }
                        }else{
                            $id = $members[0]->getId_member();
                        }
                        
                        if(isset($_POST['partenaire']) && count($_POST['partenaire'])){
                            foreach ($_POST['partenaire'] as $value) {   
                                if($managerPartenaires->addAss($id, $value)){

                                }
                            }
                        }
                        $this->app()->httpResponse()->redirect('modepaiementfront.html');
                    }
                 }else{
                     $this->errors = "le champs email est vide";
                 }
                      
             }
            
            $dataList = $managerPartenaires->findAll2();
            $this->page->addVar('dataList', $dataList); 
            $this->page->addVar('email', $_SESSION['Annonce']['email']); 
            $this->page->addVar('phone', $_SESSION['Annonce']['phone1']); 
            $this->page->addVar('errors', $this->errors);
        }
        
        protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
         parent::init();
        }
        
    }
?>