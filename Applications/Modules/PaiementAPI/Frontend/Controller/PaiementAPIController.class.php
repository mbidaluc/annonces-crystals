<?php
/**
* Description of PaiementAPIController
*
* @author Mbida Luc Alfred
*
*/

namespace Applications\Modules\PaiementAPI\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\PaiementAPI\Form\PaiementAPIForm;
use Library\Tools;

class PaiementAPIController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "PaiementAPI";   
    

    function executePaiementAPI(HttpRequest $request){
		parent::getInfosPage('paiement');
        if(!$this->app->user()->isAuthenticated()){
            $this->app()->httpResponse()->redirect('connexion.html');
        }
        $this->page->addVar('title','Effectuer le paiement');

        $dataArray = array();
        $edit = false;

        $manager            = $this->managers->getManagerOf('PaiementAPI');
        $managerModpaiement = $this->managers->getManagerOf('PaiementMod');
        $managerAnnonce     = $this->managers->getManagerOf('Annonce');
        $managerPhoto       = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerMail        = $this->managers->getManagerOf('ConfigSMTP');
        $configMail         = $managerMail->findById2("id", 1);
        
        $parametresmail = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;

        //cas de l'édition
        if(!$request->getMethod('post')){

            
            $dataArray['nom_expediteur'] =  $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];
            $dataArray['montant']        =  $_SESSION['Annonce']['prixT'];
            $dataArray['beneficiaire']   =  'Annonces-cm';
            $dataArray['num_tel']        =   $_SESSION['Annonce']['phone1'];
            $this->page->addVar('title', 'Effectuer le paiement');
            $this->page->addVar('id', $request->getData('id'));        
        }else{
            $dataArray = $_POST;
            $this->app->user()->getAttribute('cart');
        }
        $dataForm = PaiementAPIForm::getForm($dataArray,$edit);
        $typePho = "principale";
        if($request->getMethod('post')){                       
            //test de la validation du post
            $this->initializeSession($_POST);
            
            if ($dataForm->is_valid($_POST)) {
                if(!$request->getExists('id')){
                    
                    if($managerAnnonce->add($_SESSION['Annonce'])){
                        $obj = $managerAnnonce->getLastAnnonceId();
                        $_SESSION['Order']['idAnnonce'] = $obj[0]->id;
                        
                        
                        $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                        $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                        $parametresmail["address"]       = $configMail[0]->getEmailSite();
                        $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                        $parametresmail["subjet"]        = "Nouvelle annonce";
                        
                        $variable["annonce_id"]          = $obj[0]->id;
                        $variable["annonce_title"]       = $_SESSION['Annonce']['designation'];
                        $variable["annonce_price"]       = $_SESSION['Annonce']['prixTotal'];
                        $variable["annonce_type"]        = 'Annonce Classique';
                        $variable["annonce_facturation"] = 'Par Affichage';
                        $variable["annonce_resume"]      = $_SESSION['Annonce']['texte'];
                        $variable["fw_message"]          = "Une annonce classique vient d'être envoyer sur le site";

                        if($manager->add($_SESSION['Order'])){
                            //$this->app()->httpResponse()->redirect('/');
                            if(isset($_SESSION['Annonce']['image'] )){
                                    foreach ($_SESSION['Annonce']['image'] as $value) {
                                            if(copy(_SITE_UPLOAD_TMP_DIR_ . $value , _SITE_UPLOAD_DIR_.'Annonce/'.$value)){
                                                    //enregistrement des photos
                                                            if($managerPhoto->savePhoto($value, $typePho, $obj[0]->id)){
                                                                    $this->addFile($value);
                                                            }else{
                                                               $this->errors = _RECCORD_SAVE_FILED_;
                                                               exit;
                                                            }
                                            }else{
                                                    $this->errors = _RECCORD_SAVE_FILED_;
                                                    exit;
                                            }
                                            $typePho = "autres";
                                    }
                            }
                            // Mail pour l'administrateur
                            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                        
                            $parametresmail["address"]       = $_SESSION['Annonce']['email'];
                            $parametresmail["Nomaddress"]    = $_SESSION['Annonce']['auteur'];
                            $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation";
                            
                            // Mail pou le client
                            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                            
                            unset($_SESSION['Annonce']);
                            unset($_SESSION['Order']);
                            $this->app()->httpResponse()->redirect('/');
                        }else{
                            $this->errors = _RECCORD_SAVE_FILED_;
                        }
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED_;
                    }                    
                }else{                    
                    if($manager->update($_SESSION['Order'],'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('/');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
        }
        
        if($request->getExists('idModpaiement')){
            $obj = $managerModpaiement->findById(intval($request->getValue('idModpaiement')));
            //var_dump($obj);
            $_SESSION['Order']['idModpaiement'] = $request->getValue('idModpaiement');
            if(trim($obj->getLien()=="")){
                    $this->page->addVar('logo', $obj->getLogo());
            }else{
                if($managerAnnonce->add($_SESSION['Annonce'])){
                    $objAnn = $managerAnnonce->getLastAnnonceId();
                    $_SESSION['Order']['idAnnonce'] = $objAnn[0]->id;
                    $_SESSION['Order']['dateCmd'] = date("Y-m-d");
                    $_SESSION['Order']['heureCmd'] = date("H:i:s");

                    $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                    $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                    $parametresmail["address"]       = $configMail[0]->getEmailSite();
                    $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                    $parametresmail["subjet"]        = "Nouvelle annonce"; 

                    $variable["annonce_id"]          = $objAnn[0]->id;

                    $variable["annonce_title"]       = $_SESSION['Annonce']['designation'];
                    $variable["annonce_price"]       = $_SESSION['Annonce']['prixTotal'];
                    $variable["annonce_type"]        = 'Annonce Classique';
                    $variable["annonce_facturation"] = 'Par Affichage';
                    $variable["annonce_resume"]      = $_SESSION['Annonce']['texte'];
                    $variable["fw_message"]          = "Une annonce classique vient d'être envoyer sur le site";

                    if($manager->add($_SESSION['Order'])){
                        //$this->app()->httpResponse()->redirect('/');
                        if(isset($_SESSION['Annonce']['image'] )){
                                foreach ($_SESSION['Annonce']['image'] as $value) {
                                        if(copy(_SITE_UPLOAD_TMP_DIR_ . $value , _SITE_UPLOAD_DIR_.'Annonce/'.$value)){
                                                //enregistrement des photos
                                                        if($managerPhoto->savePhoto($value, $typePho, $objAnn[0]->id)){
                                                                $this->addFile($value);
                                                        }else{
                                                           $this->errors = _RECCORD_SAVE_FILED_;
                                                           exit;
                                                        }
                                        }else{
                                                $this->errors = _RECCORD_SAVE_FILED_;
                                                exit;
                                        }
                                        $typePho = "autres";
                                }
                        }
                        //mail administrateur
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');

                        $parametresmail["address"]       = $_SESSION['Annonce']['email'];
                        $parametresmail["Nomaddress"]    = $_SESSION['Annonce']['auteur'];
                        $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation";

                        // mail client
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');

                        unset($_SESSION['Annonce']);
                        unset($_SESSION['Order']);

                        echo "lien";
                        exit();
                     }
                }
            }
        }
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
    }
   
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        parent::init();
    }
    
    function initializeSession($data){    
        foreach ($data as $key => $value) {
             $_SESSION['Order'][$key] = $value;
        }
        $_SESSION['Order']['num_bordero'] = $this->crypteBordero($data['num_bordero']);
        
        
    }
    
    public function addFile($source, $multiple=true){
     
        $tabArrayVal = Tools::getArrayWidthHeight('annonces');
        foreach ($tabArrayVal as $key => $value)
            Tools::imageResize(_SITE_UPLOAD_DIR_.'Annonce/' . $source, _SITE_UPLOAD_DIR_.'Annonce/' . $key.$source, $value['width'], $value['height']);
                  
    }
    
    function executePaiementAPIpub(HttpRequest $request){
		parent::getInfosPage('paiement');
        if(!$this->app->user()->isAuthenticated()){
            $this->app()->httpResponse()->redirect('connexion.html');
        }
        $this->page->addVar('title','Effectuer le paiement');

        $dataArray = array();
        $edit = false;

        $manager            = $this->managers->getManagerOf('PaiementAPI');
        $managerModpaiement = $this->managers->getManagerOf('PaiementMod');
        $managerTranche     = $this->managers->getManagerOf('TranchesHoraires');
        $managerAnnonce     = $this->managers->getManagerOf('Adversiting');
        $managerPhoto       = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerConf        = $this->managers->getManagerOf('Configurations');
        $managerMail        = $this->managers->getManagerOf('ConfigSMTP');
        $managerUser        = $this->managers->getManagerOf('Utilisateurs');
        $configMail         = $managerMail->findById2("id", 1);
        
        $parametresmail     = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
            
        $dataObjts   = $managerConf->getConfigurations();
        $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();

        //cas de l'édition
        if(!$request->getMethod('post')){

            $dataArray['nom_expediteur'] =  $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];
            $dataArray['montant']        =  $_SESSION['Annonce']['prixT'];
            $dataArray['beneficiaire']   =  'Annonces-cm';
            //$dataArray['num_tel']        =   $_SESSION['Annonce']['phone1'];
            $this->page->addVar('title', 'Effectuer le paiement');
            //$this->page->addVar('id', $request->getData('id'));        
        }else{
            $dataArray = $_POST;
            $this->app->user()->getAttribute('cart');
        }
        $dataForm = PaiementAPIForm::getFormPub($dataArray,$edit); 
        if($request->getMethod('post')){                       
            //test de la validation du post
            $this->initializeSession($_POST);
            
            if ($dataForm->is_valid($_POST)) {
                if(!$request->getExists('id')){  
                    if($managerAnnonce->add($_SESSION['Annonce'])){
                        $obj = $managerAnnonce->getLastAnnonceId();
                        $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                        $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                        $parametresmail["address"]       = $configMail[0]->getEmailSite();
                        $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                        $parametresmail["subjet"]        = "Nouvel annonce publicitaire"; 

                        $variable["annonce_id"]          = $obj[0]->id;
                        $variable["annonce_title"]       = $_SESSION['Annonce']['altText'];
                        $variable["annonce_price"]       = $_SESSION['Annonce']['finalPrice'];
                        $variable["annonce_type"]        = 'Annonce Publicitaire';
                        $variable["annonce_facturation"] = 'Par Affichage';
                        $variable["annonce_resume"]      = "";
                        $variable["fw_message"]          = "Une annonce publicitaire vient d'être envoyer sur le site";
                        
                        //Mail administrateur
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');

                        $user = $managerUser->findById($_SESSION['Annonce']['idUder']);
                        $parametresmail["address"]       = $user->getEmail();
                        $parametresmail["Nomaddress"]    = $user->getPrenom().' '.$user->getNom();
                        $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation";
                        
                        // Mail Client
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');

                        $_SESSION['Order']['idAnnoncepub'] = $obj[0]->id;
                        $_SESSION['Order']['idAnnonce'] = NULL;
                        //var_dump($_SESSION['Order']);
                        if($manager->add($_SESSION['Order'])){ 
                            if($_SESSION['Annonce']['diffusion'] === 'periodique'){
                                if($managerTranche->addTranchesAnnonce($_SESSION['Annonce']['dateBegin'], $_SESSION['Order']['idAnnoncepub'] , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idTranche'], $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                                    unset($_SESSION['Annonce']);
                                    unset($_SESSION['Order']);
                                    $this->app()->httpResponse()->redirect('/');
                                }else{
                                    $this->errors = _RECCORD_SAVE_FILED_;
                                }
                            }else{
                                if($managerTranche->addTranchesAnnoncePleinTemps($_SESSION['Annonce']['dateBegin'], $_SESSION['Order']['idAnnoncepub'] , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                                    unset($_SESSION['Annonce']);
                                    unset($_SESSION['Order']);
                                    $this->app()->httpResponse()->redirect('/');
                                }else{
                                    $this->errors = _RECCORD_SAVE_FILED_;
                                }
                            }    
                        }else{
                            $this->errors = _RECCORD_SAVE_FILED_;
                        }
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED_;
                    }                    
                }else{                    
                    if($manager->update($_SESSION['Order'],'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('/');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
        }
        
        if($request->getExists('idModpaiement')){
            $obj = $managerModpaiement->findById(intval($request->getValue('idModpaiement')));
            //var_dump($obj);
            $_SESSION['Order']['idModpaiement'] = $request->getValue('idModpaiement');
            $_SESSION['Order']['dateCmd'] = date("Y-m-d");
            $_SESSION['Order']['heureCmd'] = date("H:i:s");
           if(trim($obj->getLien()=="")){
                    $this->page->addVar('logo', $obj->getLogo());
            }else{
                if($managerAnnonce->add($_SESSION['Annonce'])){
                        $objpub = $managerAnnonce->getLastAnnonceId();
                        $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                        $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                        $parametresmail["address"]       = $configMail[0]->getEmailSite();
                        $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                        $parametresmail["subjet"]        = "Nouvel annonce publicitaire"; 

                        $variable["annonce_id"]          = $objpub[0]->id;
                        
                        $variable["annonce_title"]       = $_SESSION['Annonce']['altText'];
                        $variable["annonce_price"]       = $_SESSION['Annonce']['finalPrice'];
                        $variable["annonce_type"]        = 'Annonce Publicitaire';
                        $variable["annonce_facturation"] = 'Par Affichage';
                        $variable["annonce_resume"]      = "";
                        $variable["fw_message"]          = "Une annonce publicitaire vient d'être envoyer sur le site";
                        
                        //Mail administrateur
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');

                        $user = $managerUser->findById($_SESSION['Annonce']['idUder']);
                        $parametresmail["address"]       = $user->getEmail();
                        $parametresmail["Nomaddress"]    = $user->getPrenom().' '.$user->getNom();
                        $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation";
                        
                        // Mail Client
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');

                        $_SESSION['Order']['idAnnoncepub'] = $objpub[0]->id;
                        $_SESSION['Order']['idAnnonce'] = NULL;
                        //var_dump($_SESSION['Order']);
                        if($manager->add($_SESSION['Order'])){ 
                            if($_SESSION['Annonce']['diffusion'] === 'periodique'){
                                if($managerTranche->addTranchesAnnonce($_SESSION['Annonce']['dateBegin'], $_SESSION['Order']['idAnnoncepub'] , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idTranche'], $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                                    unset($_SESSION['Annonce']);
                                    unset($_SESSION['Order']);
                                    echo "lien";
                                    exit();
                                }
                            }else{
                                if($managerTranche->addTranchesAnnoncePleinTemps($_SESSION['Annonce']['dateBegin'], $_SESSION['Order']['idAnnoncepub'] , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                                    unset($_SESSION['Annonce']);
                                    unset($_SESSION['Order']);
                                    echo "lien";
                                    exit();
                                }
                            }
                        }

                        echo "lien";
                        exit();
                     }
                }
            }
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
    }
    
     private function crypteBordero($string){
        return md5($string._COOKIE_KEY_);
    }
}
?>