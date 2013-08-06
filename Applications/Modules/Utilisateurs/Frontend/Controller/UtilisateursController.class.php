<?php

/**
 * Description of ConnexionController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Utilisateurs\Frontend\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;

use Applications\Modules\Utilisateurs\Form\UtilisateursForm;

class UtilisateursController extends HelperBackController{

    public function executeConnect(HttpRequest $request){
        //var_dump($_SESSION['referer']);
        
        parent::getInfosPage('login');

        $this->page->addVar('title','login');
        $this->app->user()->setFlash('');
        if($this->app->user()->isAuthenticated()){
            $this->app()->httpResponse()->redirect('/');
        }
        $manager = $this->managers->getManagerOf('Utilisateurs'); 

        if($request->isXmlHttpRequest()){
            $email = $request->getValue('email');
            $user = $manager->verifEmail($email);
            if(empty($email)){
                 //
                 echo 'Entrez un mail valide';
                 exit;
            }else{
                if(!empty($user)){       
                    echo 'cet email existe déjà';
                    exit;
                }else{
                   // le mail est valide:
                   //$this->app()->httpResponse()->redirect('createuser.html');
                    echo "add-user-front.html";
                    exit;
                }
            }
            
            
        }
        
        if ($request->postExists('login')){
            $login = $request->getValue('login');
            $password = $this->cryptePassword($request->getValue('password'));

            $manager = $this->managers->getManagerOf('Utilisateurs');

            $user = $manager->verifLogin($login, $password);
            
            if(empty($user)){
                $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect/ vous n\'avez pas activé votre compte!');
            }else{
                $this->logIn($user);
               
                //$this->app->httpResponse()->redirect($request->refferer());
                if(isset($_SESSION['referer']))
                    $this->app->httpResponse()->redirect($_SESSION['referer']);
                $this->app->httpResponse()->redirect($request->refferer());
            }
        }

    }

    public function logIn(array $user)
    {
        $manageruser = $this->managers->getManagerOf('Utilisateurs'); 
         
        foreach ($user as $key => $value)
        {
            $_SESSION['user']['id']        = $value->getId();
            $_SESSION['user']['pseudo']    = $value->getPseudo();
            $_SESSION['user']['email']     = $value->getEmail();
            $_SESSION['user']['password']  = $value->getPassword();
            $_SESSION['user']['nom']       = $value->getNom();
            $_SESSION['user']['prenom']    = $value->getPrenom();
            $_SESSION['user']['Avatar']    = $value->getAvatar();
            $_SESSION['user']['is_active'] = $value->getIs_active();
            $_SESSION['user']['credits']   = $value->getNbCredits();
            $_SESSION['admin']             = false;
            $_SESSION['auth']              = true;
        }
         $GrpUsers = $manageruser->getGroupesUtilisateur($user[0]->getId());
                
        foreach ($GrpUsers as $value) {
            $privileges = $manageruser->getDroitGroup($value->id);

            foreach ($privileges as $privilege) {
               if(in_array("acces admin", $privilege))
                   $_SESSION['admin']            = true;
                
               if(in_array("Ajouter un module", $privilege))
                   $_SESSION['user']['addgroup'] = true; 
           }
        }
    }
     public function executelogout(){
        session_destroy();
        unset($_SESSION);
        $this->app->httpResponse()->redirect('/');
     }

    public function executeCreateuser(HttpRequest $request)
    {
        parent::getInfosPage('create_user');
        $this->page->addVar('title', 'créer/Modifier un compte');
        $managerMail = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $managerMail->findById2("id", 1);
        $parametres = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
                                        
        $data_array = array();
        $edit = false;
        $manager = $this->managers->getManagerOf('Utilisateurs');
        //cas de l'édition
        if($request->getExists('id')){
            $edit =true;
            $data = $manager->findById(intval($request->getData('id')));
            $data_array = $data->tabAttrib;
            $this->page->addVar('title', 'Modifier Mon compte');
        }else{
            if($this->app->user()->isAuthenticated()){
                $this->app()->httpResponse()->redirect('/');
            }
            $data_array = $request->getSendData($_POST);
            $data_array['pseudo'] = $request->getValue('email');
        }
        //generation du formulaire
        $dataForm = UtilisateursForm::getForm($data_array, $edit);
        //soumission
        if($request->getMethod('post')){
           if(isset($_POST['nom'])){
                if ($dataForm->is_valid($_POST) && $request->getValue('password') == $request->getValue('verif_mdp')) {
                    
                    $parametres["expediteur"]    = $configMail[0]->getEmailSite();
                    $parametres["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                    $parametres["address"]       = $request->getValue('email');
                    $parametres["Nomaddress"]    = $request->getValue('prenom').' '.$request->getValue('nom');
                    
                    $variable["first_name"]      = $request->getValue('prenom');
                    $variable["last_name"]       = $request->getValue('nom');
                    $variable["pseudo"]          = $request->getValue('pseudo');
                    $variable["passwd"]          = $request->getValue('password');
                    

                    if(!$request->getExists('id')){
                        $pseudo   = $request->getValue('pseudo');
                        $email    = $request->getValue('email');
                        $password = $this->cryptePassword($request->getValue('password'));
                        
                        $user = $manager->verifInscription($pseudo, $email);
                        if(!empty ($user)){
                            $this->errors ='Ce pseudo ou E-mail est déjà utilisé';
                            $dataForm->bound($request->getSendData($_POST));
                        }else{
                            $_POST['password'] = $password;
                            if(isset($_SESSION['referer']) &&($_SESSION['referer'] !='')){
                                $_POST['is_active'] = 1;
                                $tpl = 'compte.html';
                            }else{
                                 $_POST['is_active'] = 0;
                                 $tpl = 'compteactivate.html';
                                 $variable["url_activation"] = _BASE_URI_.'accountactivate-'.$pseudo.'-'.$password.'.html';
                            }
                            if($manager->addUser($request->getSendData($_POST))){
                                if(isset($_SESSION['referer']) &&($_SESSION['referer'] !='')){
                                     $user = $manager->verifEmail($request->getValue('email'));
                                     $this->logIn($user);
                                }
                                   
                                $lastuser = $manager->getLastUtilisateurs();
                                foreach ($lastuser as $value) {
                                    $idu = $value->id;
                                }
                                if($manager->defineUserGroup($idu, 1)){
                                        $user = $manager->verifLogin($pseudo , $password);                                  
    
                                        $parametres["subjet"]        = "Nouveau Compte";                
                                                                             
                                        $mailinf = $this->app()->mail()->send($parametres, $configMail[0],$variable,$tpl);
                                        
                                       if(isset($_SESSION['referer']))
                                                    $this->app->httpResponse()->redirect($_SESSION['referer']);
                                            $this->app->httpResponse()->redirect("/");
                                }else{
                                        $this->errors ="Un Problème est survenu lors de l\'enregistrement";
                                        $dataForm->bound($request->getSendData($_POST));
                                    }
                            }else{
                                $this->errors ="Echec lors de l'inscriptions";
                                $dataForm->bound($request->getSendData($_POST));
                            }
                        }
                    }else{
                        $pseudo   = $request->getValue('pseudo');
                        $email    = $request->getValue('email');
                        $password = $request->getValue('password');
                        $_POST['id'] = $request->getData('id');
                        $manager = $this->managers->getManagerOf('Utilisateurs');
                        $user = $manager->verifInscription($pseudo, $email);
                        
                        $parametres["subjet"]        = "Modification du Compte";                
                       
                        if(!empty ($user) && $request->getData('id') !=$user[0]->getId()){
                            $this->errors ='Ce pseudo ou E-mail est déjà utilisé';
                            $dataForm->bound($request->getSendData($_POST));
                        }else{
                            if($request->getValue('password') == "")
                                $_POST['password'] = $request->getValue('passwordH');
                            else{
                                $_POST['password'] = $this->cryptePassword($password);
                                $mailinf = $this->app()->mail()->send($parametres, $configMail[0],$variable, 'compte.html');
                            }
                            if(!$manager->updateUser($request->getSendData($_POST))){
                                $this->errors ='problème lors de l\'insertion';
                                $dataForm->bound($request->getSendData($_POST));
                            }else{
                                $this->app()->httpResponse()->redirect('connexion.html');
                            }
                        }
                    }
                }else{
                    $this->errors ="Vérifier les données saisies";
                    $dataForm->bound($request->getSendData($_POST));
                }
           }
        } 
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm);
    }
    
    function  executeForgetpwd(HttpRequest $request){
        if(!$this->app->user()->isAuthenticated()){
            $manager = $this->managers->getManagerOf('Utilisateurs');
            $managerMail = $this->managers->getManagerOf('ConfigSMTP');
            $configMail = $managerMail->findById2("id", 1);
            $parametres = array();
            $variable = array();
            $out = array();

            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;


            $parametres["expediteur"]    = $configMail[0]->getEmailSite();
            $parametres["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametres["address"]       = $request->getValue('email');


            $this->page->addVar('title','Mot de passe oublié');
            $this->app->user()->setFlash('');
            if($request->postExists('email')){
                $email = $request->getValue('email');
                $manager = $this->managers->getManagerOf('Utilisateurs');
                $user = $manager->verifEmail($email);
                if(empty($user)){
                    $this->app->user()->setFlash('Cet email n\'existe pas.');
                }else{ 
                    $pwd = $this->random_str();
                    $out['password'] = $this->cryptePassword($pwd);
                    $out['id']       = $user[0]->getId();

                    $variable["first_name"]      = $user[0]->getPrenom();
                    $variable["last_name"]       = $user[0]->getNom();
                    $variable["pseudo"]          = $user[0]->getPseudo();
                    $variable["passwd"]          = $pwd;

                    if($manager->update($out, 'id')){
                        $this->app->user()->setFlash('Le login et le mot de passe on été envoyer à votre boite email!');
                        $parametres["Nomaddress"]    = $user[0]->getPrenom().' '.$user[0]->getNom();
                        $parametres["subjet"]        = "Mot de passe oublié";                
                        $parametres["message"]       = '<body style="margin: 10px;">
                                                            <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
                                                            <div align="center"><img src="images/phpmailer.gif" style="height: 90px; width: 340px"></div><br>
                                                            <p>Voici vous informations:
                                                                    login: '.$user[0]->getPseudo().'
                                                                     <br>
                                                                     Mot de passe: '.$pwd.'
                                                            </p>';

                        echo $this->app()->mail()->send($parametres, $configMail[0],$variable,'compte.html');
                        $this->page->addVar('dataForm', $user);
                    }
                }
            }   
        }else{
            $this->app()->httpResponse()->redirect('/');
        }
    }
    
    function executeCompte(){
        parent::getInfosPage('mon_compte');
        $this->page->addVar('title','Mon compte');
    }
    
    function executeMesCmdCredits(HttpRequest $request) {
        $this->page->addVar('title','Mes commandes de crédits');
        
        $manager = $this->managers->getManagerOf('PaiementCredits');
        $this->addCSS(_THEME_CSS_MOD_DIR_.'PackCredits/PackCredits.css');
       
        $paged        =$request->getValue('paged')?intval($request->getValue('paged')):1;
        $dataList = $manager->getListCmdCtsUser($_SESSION['user']['id'],$paged,5);
        $countelt     = count($manager->getListCmdCtsUser($_SESSION['user']['id']));
  
        $this->page->addVar('dataList', $dataList);
        //$this->page->addVar('countAnnone',$countelt);
        parent::pagination('Utilisateurs',$countelt,$paged,5);
    }
    
    function executeActivateCompte(HttpRequest $request){
        $managerUser = $this->managers->getManagerOf('Utilisateurs');
        $user = $managerUser->verifLoginnonactive($request->getValue('loginuser'), $request->getValue('passwd'));
        //var_dump($request->getValue('passwd'));
        if(!empty($user)){
            $out = array();
            $out['is_active'] = 1;
            $out['id']         = $user[0]->getId();
            if($managerUser->update($out, 'id')){
                $this->logIn($user);
                 $this->errors ='Votre Compte à été activé avec succès!';
            }else{
                 $this->errors = 'Problème lors de l\'activation du compte; Veuillez contacter l\'administrateur!';
            }
        }else{
            $this->errors = 'Problème lors de l\'activation du compte; Veuillez contacter l\'administrateur!';
        }
         $this->page->addVar('errors', $this->errors);
    }
    
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/Utilisateurs.css'] = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/Utilisateurs.js'] = 'screen';
        parent::init();
    }
    
    private function cryptePassword($string){
        return md5(_COOKIE_KEY_.$string);
    }
    
    function random_str() {
        $str = "";
        $chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#*";
        $nb_chars = strlen($chaine);

        for($i=0; $i<7; $i++)
        {
            $str .= $chaine[ rand(0, ($nb_chars-1)) ];
        }
        return $str;
    }
    

}

?>
