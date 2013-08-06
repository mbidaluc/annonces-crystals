<?php

/**
* Description of PaiementAPIController
*
* @author Mbida Luc Alfred
*
*/

namespace Applications\Modules\PaiementMod\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\PaiementMod\Form\PaiementModForm;
use Library\Tools;

class PaiementModController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "PaiementMod";

    function executeListmodepaiement(HttpRequest $request){
        parent::getInfosPage('mode_paiement');
        $manager                = $this->managers->getManagerOf('Annonce');
        $manageOrder            = $this->managers->getManagerOf('PaiementAPI');
        $managerPhoto           = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerMail = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $managerMail->findById2("id", 1);
        
        $parametresmail = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;

        //cas où c'est une annonce gratuite!
        if($_SESSION['Annonce']['prixT']){
            if(!$this->app->user()->isAuthenticated()){
                $this->app()->httpResponse()->redirect('connexion.html');
            }
            $_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];
            
            if($_SESSION['Annonce']['typeFacturation'] === 'click'){
                 if($manager->add($_SESSION['Annonce'])){
                     $obj = $manager->getLastAnnonceId();
                     
                     $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                     $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                     $parametresmail["address"]       = $configMail[0]->getEmailSite();
                     $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                     
                     $parametresmail["subjet"]        = "Nouvel annonce"; 
                     
                     $variable["annonce_id"]          = $obj[0]->id;
                     $variable["annonce_title"]       = $_SESSION['Annonce']['designation'];
                     $variable["annonce_price"]       = $_SESSION['Annonce']['prixTotal'];
                     $variable["annonce_type"]        = 'Annonce Classique';
                     $variable["annonce_facturation"] = 'Par Click';
                     $variable["annonce_resume"]      = $_SESSION['Annonce']['texte'];
                     $variable["fw_message"]          = "Une annonce Classique vient d'être envoyer sur le site";
                        
                     if(isset($_SESSION['Annonce']['image'] )){
                        foreach ($_SESSION['Annonce']['image'] as $value) {
                           if(copy(_SITE_UPLOAD_TMP_DIR_ . $value , _SITE_UPLOAD_DIR_.'Annonce/'.$value)){

                               if($managerPhoto->savePhoto($value, "principale", $obj[0]->id)){
                                   $this->addFile($value);
                               }else{
                                   $this->errors = _RECCORD_SAVE_FILED_;
                                   exit;
                               }
                           }else{
                               $this->errors = _RECCORD_SAVE_FILED_;
                               exit;
                           }
                       }
                     }
                     
                     $_SESSION['Order']['idAnnoncepub']   = NULL;
                     $_SESSION['Order']['idAnnonce']      = $obj[0]->id;
                     $_SESSION['Order']['idModpaiement']  = NULL;
                     $_SESSION['Order']['dateCmd']        = date("Y-m-d");
                     $_SESSION['Order']['heureCmd']       = date("H:i:s");
                     $_SESSION['Order']['montant']        = 0;
                     $_SESSION['Order']['nom_expediteur'] = $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];;

                     $results = $manageOrder->add($_SESSION['Order']);
                     //mail administrateur
                      $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                     
                     $parametresmail["address"]       = $_SESSION['Annonce']['email'];
                     $parametresmail["Nomaddress"]    = $_SESSION['Annonce']['auteur'];
                     $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation. Cependant, assurer vous que vous avez du crédit dans votre compte sinon elle ne sera pas visible";
                     
                     //mail Client
                     $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                     unset($_SESSION['Order']);
                     unset($_SESSION['Annonce']);
                     $this->app()->httpResponse()->redirect('/');
                 }
            }
        }else{
            if(!$this->app->user()->isAuthenticated()){
                $this->app()->httpResponse()->redirect('connexion.html');
            }
            $_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];
            
            $obj = $manager->getLastAnnonceId();
                     
            $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
            $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametresmail["address"]       = $configMail[0]->getEmailSite();
            $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();

            $parametresmail["subjet"]        = "Nouvel annonce gratuite"; 

           
            $variable["annonce_title"]       = $_SESSION['Annonce']['designation'];
            $variable["annonce_price"]       = $_SESSION['Annonce']['prixTotal'];
            $variable["annonce_type"]        = 'Annonce Classique';
            $variable["annonce_facturation"] = 'Par Click';
            $variable["annonce_resume"]      = $_SESSION['Annonce']['texte'];
            $variable["fw_message"]          = "Une annonce gratuite vient d'être envoyée sur le site";

            if($manager->add($_SESSION['Annonce'])){
                $obj = $manager->getLastAnnonceId();
                $variable["annonce_id"]      = $obj[0]->id;
                
                //$_SESSION['Annonce']['idAnnonce'] = $obj[0]->id;
                //$_SESSION['Annonce']['montant']   = 0;
                
                $_SESSION['Order']['idAnnoncepub']   = NULL;
                $_SESSION['Order']['idAnnonce']      = $obj[0]->id;
                $_SESSION['Order']['idModpaiement']  = NULL;
                $_SESSION['Order']['dateCmd']        = date("Y-m-d");
                $_SESSION['Order']['heureCmd']       = date("H:i:s");
                $_SESSION['Order']['montant']        = 0;
                $_SESSION['Order']['nom_expediteur'] = "";
                
                
                if($manageOrder->add($_SESSION['Order'])){
                    unset($_SESSION['Order']);
                    unset($_SESSION['Annonce']);
                    $this->app()->httpResponse()->redirect('/');
                }
            }
            // mail administrateur
            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
            
            $parametresmail["address"]       = $_SESSION['Annonce']['email'];
            $parametresmail["Nomaddress"]    = $_SESSION['Annonce']['auteur'];
            $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation.";
            
            //mail client
            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
        }

        $managerPaiement = $this->managers->getManagerOf('PaiementMod');
        $dataList = $managerPaiement->findAll2();

        $this->page->addVar('dataList', $dataList);     
    }
    
    function executeListmodepaiementpub(HttpRequest $request){
		parent::getInfosPage('mode_paiement');
        if(!$this->app->user()->isAuthenticated()){
            $this->app()->httpResponse()->redirect('connexion.html');
        }
        $_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];

        $manager = $this->managers->getManagerOf('PaiementMod');
        $dataList = $manager->findAll2();

        $this->page->addVar('dataList', $dataList);     
    }
    
    function executeListmodepaiementcredits(HttpRequest $request){
        parent::getInfosPage('mode_paiement');
        $managerPack = $this->managers->getManagerOf('PackCredits');
        if($request->getExists('id')){
            $_SESSION['Order']['idPack'] = $request->getData('id');
            $obj = $managerPack->findByID(intval($request->getData('id')));
            $_SESSION['Annonce']['prixT'] = $obj->getPrix();
        }
         
        if(!$this->app->user()->isAuthenticated()){
            $this->app()->httpResponse()->redirect('connexion.html');
        }
        $_SESSION['Order']['idUser']      = $_SESSION['user']['id'];
        $_SESSION['Order']['paiementEff'] = 0;
        $_SESSION['Order']['dateCmd'] = date("Y-m-d");
        $_SESSION['Order']['heureCmd'] = date("H:i:s");
       
        //var_dump($_SESSION['Order']);
        $manager = $this->managers->getManagerOf('PaiementMod');
        $dataList = $manager->findAll2();

        $this->page->addVar('dataList', $dataList);     
    }
    
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js'] = 'screen';
        $this->tabCSS[_WEB_CSS_DIR_.'jquery-ui-1.8.16.custom.css']            = 'screen';
        
        $this->tabCSS[_WEB_CSS_DIR_.'themes/base/jquery.ui.all.css']         = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'external/jquery.bgiframe-2.1.2.js']       = 'screen';
        
        //############# -- FancyBox dialog -- ###############
        /*$this->tabJS[_BASE_URI_.'js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js']       = 'screen';
        $this->tabCSS[_BASE_URI_.'js/fancybox/source/jquery.fancybox.css?v=2.1.4']       = 'screen';
        $this->tabJS[_BASE_URI_.'js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4']       = 'screen'; */ 
        
        parent::init();
    }
    
    public static function addFile($source, $multiple=true){
     
        $tabArrayVal = Tools::getArrayWidthHeight('annonces');
        foreach ($tabArrayVal as $key => $value)
            Tools::imageResize(_SITE_UPLOAD_DIR_.'Annonce/' . $source, _SITE_UPLOAD_DIR_.'Annonce/' . $key.$source, $value['width'], $value['height']);      
    }
}
?>
