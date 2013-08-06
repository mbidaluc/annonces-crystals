<?php

/**
 * Description of ConnexionController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Utilisateurs\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Utilisateurs\Form\UtilisateursForm;
    use Library\Tools;

class UtilisateursController extends HelperBackController{

    public function executeConnect(HttpRequest $request){
        $this->page->addVar('title','login');
        $this->app->user()->setFlash('');
        if ($request->postExists('login')){
            $login = $request->postData('login');
            $password = $this->cryptePassword($request->postData('password'));

            $manager = $this->managers->getManagerOf('Utilisateurs');

            $user = $manager->verifLogin($login, $password);
            //echo 'login: '.$login;
            //var_dump($_POST);
             //echo 'id: '.$user[0]->getId();
            if(empty($user)){
                $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }else{
                $GrpUsers = $manager->getGroupesUtilisateur($user[0]->getId());
                
                foreach ($GrpUsers as $value) {
                    $privileges = $manager->getDroitGroup($value->id);
                     
                    foreach ($privileges as $privilege) {
                         if(in_array("acces admin", $privilege))
                            $this->logIn($user);
                        if(in_array("Ajouter un module", $privilege))
                            $_SESSION['user']['addgroup'] = true; 
                    }
                   
                }
                if($_SESSION['admin']){
                    $this->app->httpResponse()->redirect('/admin/');
                    exit;
                }
                    
                $this->app->user()->setFlash('Vous n\'avez pas les droits d\'accès à  l\'administration');
                $this->app->httpResponse()->redirect('/admin/');
            }
        }

    }

    public function logIn(array $user){
        foreach ($user as $key => $value){
            $_SESSION['user']['id'] = $value->getId();
            $_SESSION['user']['pseudo'] = $value->getPseudo();
            $_SESSION['user']['email'] = $value->getEmail();
            $_SESSION['user']['password'] = $value->getPassword();
            $_SESSION['user']['nom'] = $value->getNom();
            $_SESSION['user']['prenom'] = $value->getPrenom();
            ///$_SESSION['user']['adresse'] = $value->getAdresse();
            $_SESSION['user']['Avatar'] = $value->getAvatar();
            $_SESSION['user']['is_active'] = $value->getIs_active();
            $_SESSION['user']['credits'] = $value->getNbCredits();
            $_SESSION['admin'] = true;
            $_SESSION['auth'] = true;
        }
    }
    public function executelogout(){
        session_destroy();
        unset($_SESSION);
        $this->app->httpResponse()->redirect('index.php');
    }

    public function executeUtilisateurs(HttpRequest $request){
        $this->page->addVar('title', 'Gestion des utilisateurs');
        $this->leftcolumn();
        $this->rightcolumn();
        $manager = $this->managers->getManagerOf('Utilisateurs');
        $data = $manager->getUtilisateurs();
        $this->page->addVar('datalist', $data);
        $this->page->addVar('pagination', $this->pagination);
    }

    private function leftcolumn(){
        $out = array();
        $out['add-user.html']               = 'Ajouter un Utisateur';
        $out['utilisateurs.html']           = 'Liste des utilisateurs';
        $out['add-groupuser.html']          = 'Ajouter un Groupe d\'utisateur';
        $out['groupeutilisateurs.html']     = 'Listing des groupes d\'utilisateurs';
        return $this->page->addVar('left_content', $out);
    }
    private function rightcolumn(){
        $out ='Gérez vos utilisateurs, consultez leurs informations. Vous pouvez éditer ou supprimer un profil.';
        return $this->page->addVar('right_content', $out);
    }
	
    public function executeCreateuser(HttpRequest $request)
    {
        $manager = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $manager->findById2("id", 1);
        $parametres = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
        
        $this->page->addVar('title', 'créer un compte');
        $this->leftcolumn();
        $this->rightcolumn();
        $manager = $this->managers->getManagerOf('Utilisateurs');
        $info = $manager->getGroupeUtilisateurs();
       //var_dump($info);
        $thisusergroup = $manager->getGroupesUtilisateur(intval($request->getValue('id')));
        foreach ($thisusergroup as $value) {
             $tab[$value->id] = $value->id;
        }
		
		//cas de l'édition
        if($request->getExists('id')){
            $edit =true;
            $data = $manager->findById(intval($request->getValue('id')));
            $data_array = $data->tabAttrib;
			$this->page->addVar('title', 'Modifier Mon compte');
        }else{
            $data_array = $request->getSendData($_POST);
        }
        //generation du formulaire
        $dataForm = UtilisateursForm::getForm($data_array, $edit, $tab, true);

        //* ajout de la variable à la page
        if($request->getMethod('post')){
            $parametres["expediteur"]    = $configMail[0]->getEmailSite();
            $parametres["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametres["address"]       = $request->getValue('email');
            $parametres["Nomaddress"]    = $request->getValue('prenom').' '.$request->getValue('nom');
            
            $variable["first_name"]      = $request->getValue('prenom');
            $variable["last_name"]       = $request->getValue('nom');
            $variable["pseudo"]          = $request->getValue('pseudo');
            $variable["passwd"]          = $request->getValue('password');
            
           if(!empty($_FILES['avatarFile']['tmp_name'])){
                $_POST['avatar'] = $this->addImage('avatarFile');
           }

            if ($request->getValue('password') == $request->getValue('verif_mdp')) {

                $pseudo   = $request->getValue('pseudo');
                $email    = $request->getValue('email');
                $password = $this->cryptePassword($request->getValue('password'));
                //var_dump($password);
                $user = $manager->verifInscription($pseudo, $email);
				
                    if(!$request->getExists('id')){
                        if(!empty ($user)){
                                $this->errors ='Ce pseudo ou E-mail est déjà utilisé';
                        }else{  
                            $_POST['password'] = $password;
                           if($manager->addUser($request->getSendData($_POST))){
                                   $lastuser = $manager->getLastUtilisateurs();
                                   foreach ($lastuser as $value) {
                                           $idu = $value->id;
                                   }                          
                                   if(isset($_POST['groupe']))
                                        foreach ($_POST['groupe'] as $gpe) 
                                            $result = $manager->defineUserGroup($idu, $gpe);
                                               
                                   $parametres["subjet"]        = "Activation du compte";                

                                   $ifoo =  $this->app()->mail()->send($parametres, $configMail[0],$variable,'compte.html');

                                   $this->app->httpResponse()->redirect('utilisateurs.html');
                           }else{
                                   $this->errors ="Echec lors de l'inscriptions";
                           }
                        }
                    }else{
                        if(!empty ($user) && $request->getValue('id') !=$user[0]->getId()){
                                $this->errors ='Ce pseudo ou E-mail est déjà utilisé';

                        }else{
                                if($request->getValue('password') == "")
                                        $_POST['password'] = $request->getValue('passwordH');
                                else
                                     $_POST['password'] = $password;
                                
                                if($manager->updateUser($request->getSendData($_POST))){
                                        if(isset($_POST['groupe'])){
                                            if($manager->DeleteGroupesUtilisateur($request->getValue('id'))){
                                                 //var_dump($_POST['groupe']);
                                                foreach ($_POST['groupe'] as $gpe) {
                                                    $result = $manager->defineUserGroup($request->getValue('id'), $gpe);
                                                }
                                            }
                                        }
                                        $this->app()->httpResponse()->redirect('utilisateurs.html');
                                }
                                else{
                                        $this->errors ='Erreur lors de la mise à jour';
                                }
                        }
                    }
                }
		}
		$this->page->addVar('errors', $this->errors);
		$this->page->addVar('dataForm', $dataForm);
                
                $this->page->addVar('groupeutilisateur', $info);
                $this->page->addVar('usergroup', $tab);
	}

    
    public function executeGroupeutilisateurs(HttpRequest $request){
        $this->page->addVar('title', 'Gestion des utilisateurs');
        $this->leftcolumn();
        $this->rightcolumn();
        $manager = $this->managers->getManagerOf('Utilisateurs');
        $data = $manager->getGroupeUtilisateurs();
        $this->page->addVar('datalist', $data);
        $this->page->addVar('pagination', $this->pagination);
    }

    public function executeCreategroupeuser(HttpRequest $request){             
        $this->page->addVar('title', 'Définir un  Background');
        $this->leftcolumn();
        $this->rightcolumn();
        $manager = $this->managers->getManagerOf('Utilisateurs');
        $edit = false;
        $dataArray   = array();
        $listdroits  = $manager->getDroit();
        $privgroup   = array();
       
        if($request->getExists('id')){        
            $dataObjt    = $manager->getGroupeUtilisateursById(intval($request->getValue('id')));
            
            $dataArray['id']   = $dataObjt[0]->id;
            $dataArray['nom_groupe']   = $dataObjt[0]->nom_groupe;
            $edit        = true;
            $listdroitsu = $manager->getDroit();
            
            foreach ($listdroitsu as $value) {
                $havpriv = $manager->VerifieGroupPrivilege($request->getValue('id'), $value->id);
                if(!empty($havpriv))
                    $privgroup[$value->id]     = $value->id;
            }
           
        }else{
             $dataArray = $request->getSendData($_POST);
        }
        //generation du formulaire
        $dataForm = UtilisateursForm::getFormgroup($dataArray, $edit);
        
        if($request->getMethod('post')){
            if(!$request->getExists('id')){
                if($manager->addGroupUser($request->getValue('nom_groupe'))){
                   $lastgroupuser = $manager->getLastGroupUtilisateurs();
                   foreach ($lastgroupuser as $value) {
                       $idG = $value->id;
                   }

                   if(isset($_POST['priv']))
                       foreach ($_POST['priv'] as $value) 
                           if(!$manager->addGroupPrivilege($idG,$value))
                               $this->errors ="Un Problème est survenu lors de l\'enregistrement";
                   $this->app()->httpResponse()->redirect('groupeutilisateurs.html');
                }else{
                     $this->errors ="Impossible d\'ajouter le groupe";
                }

            }else{
                if($manager->updateGroupUser($request->getValue('id'), $request->getValue('nom_groupe'))){
                    $m = $manager->deleteAllGroupPrivileges($request->getValue('id'));
                    if(isset($_POST['priv'])){
                        $r = $manager->deleteAllPrivGroup($request->getValue('id'));
                       foreach ($_POST['priv'] as $value)
                           if(!$manager->addGroupPrivilege($request->getValue('id'), $value))
                                $this->errors ="Un Problème est survenu lors de la mise à jour";
                    }
                    $this->app()->httpResponse()->redirect('groupeutilisateurs.html');
                }else{
                     $this->errors = 'Echec lors de la mise à jour';
                }
            }     
        }
        
        $this->page->addVar('privilegegroup', $privgroup);
        $this->page->addVar('privileges', $listdroits);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm);
     }



        public function executeDeleteuser(HttpRequest $request){

            $manager = $this->managers->getManagerOf('Utilisateurs');
            $out = array();
            if($request->getExists('id')){
                $out['id'] = $request->getValue('id');
                if($manager->delete($out)){
                    if($manager->deleteAllUserGroup($request->getValue('id'))){
                        $this->errors = 'suppression réussie';
                    }else{
                        $this->errors = 'Echec lors de la suppression';
                    }

                }else{
                    $this->errors = 'Erreur lor de la suppression';
                }
                $this->app()->httpResponse()->redirect('utilisateurs.html');

            }
        }

        public function executeGroupedeleteuser(HttpRequest $request){
            $manager = $this->managers->getManagerOf('Utilisateurs');
            if($request->getExists('id')){
                $out['id'] = $request->getValue('id');
                if($manager->deleteGroupesUser($out)){
                    if($manager->deleteAllGroupPrivileges($request->getValue('id'))){
                        $this->errors = 'suppression réussie';
                    }else{
                        $this->errors = 'Echec lors de la suppression';
                    }
                }else{
                    $this->errors = 'Erreur lor de la suppression';
                }
                $this->app()->httpResponse()->redirect('groupeutilisateurs.html');
            }
        }
        
        private function cryptePassword($string){
            return md5(_COOKIE_KEY_.$string);
        }

    public function executeResults(HttpRequest $request) {
            $out = array();
            $manager = $this->managers->getManagerOf('Utilisateurs');             
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->deleteChecked($_POST['eltcheck']);
                        }
                        $data = $manager->findAll2();
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->ActiveChecked($_POST['eltcheck'],'id','is_active');
                        }
                        $data = $manager->findAll2();
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->UnActiveChecked($_POST['eltcheck'],'id','is_active');
                        }
                        $data = $manager->findAll2();
                        break;

                    default:
                        break;
                }
            }
            
           
            if($request->getValue('searchzone') != "" && $request->getValue('searchzone') != "recherche" ){
                $out[] = 'pseudo';
                $out[] = 'nom';
                $data = $manager->searchCriteria($out, $request->getValue('searchzone'));
            }else{
                $data = $manager->findAll2();
            }
            

            $this->page->addVar('datalist', $data); 
            $this->page->addVar('pagination', $this->pagination);
        }
}

?>
