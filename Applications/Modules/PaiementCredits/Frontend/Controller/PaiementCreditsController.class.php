<?php
    /**
    * Description of PaiementCreditsController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\PaiementCredits\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\PaiementCredits\Form\PaiementCreditsForm;
    use Library\Tools;

    class PaiementCreditsController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "PaiementCredits";
        
        public function executePaiementCredits(HttpRequest $request){
         	parent::getInfosPage('paiement');
            $this->page->addVar('title','Effectuer le paiement');
            
            $managerMail        = $this->managers->getManagerOf('ConfigSMTP');
            $configMail         = $managerMail->findById2("id", 1);
            
            $parametresmail     = array();
            $variable = array();

            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;

            $dataArray = array();
            $edit = false;
            $_SESSION['Order']['dateEnreg'] = date("Y-m-d H:m:s");
            $_SESSION['Order']['dateCmd'] = date("Y-m-d");
            $_SESSION['Order']['heureCmd'] = date("H:i:s");

            $manager            = $this->managers->getManagerOf('PaiementCredits');
            $managerModpaiement = $this->managers->getManagerOf('PaiementMod');
        

            // cas de l'édition
            if(!$request->getMethod('post')){

                $dataArray['nom_expediteur']     =  $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];
                $dataArray['montant']            =  $_SESSION['Annonce']['prixT'];
                $dataArray['beneficiaire']       =  'Annonces-cm';
            }else{
                $dataArray = $_POST;
                $this->app->user()->getAttribute('cart');
            }
            $dataForm = PaiementCreditsForm::getForm($dataArray,$edit);
        
            if($request->getMethod('post')){                       
                // test de la validation du post
                $this->initializeSession($request->getSendData($_POST));
                
                $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                $parametresmail["address"]       = $configMail[0]->getEmailSite();
                $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                $parametresmail["subjet"]        = "Achat de crédits"; 

                $variable["pack_id"]             = $_SESSION['Order']['idPack'];
                $variable["pack_clt_name"]       = $_SESSION['Order']['nom_expediteur'];
                $variable["pack_price"]          = $_SESSION['Order']['montant'];
                $variable["pack_bor"]            = $_SESSION['Order']['num_bordero'];
                $variable["pack_date"]           = $_SESSION['Order']['dateEnreg'];
                $variable["fw_message"]          = "Un pack credit vient d'être commandé sur le site";
                
                if ($dataForm->is_valid($_POST)) {
                    if(!$request->getExists('id')){
                        if($manager->add($_SESSION['Order'])){
                            
                            // mail administrateur
                            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');
                            
                            $parametresmail["address"]       = $_SESSION['user']['email'];
                            $parametresmail["Nomaddress"]    = $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'];
                            $variable["fw_message"]          = "Votre commande de crédit a été enregistré. il est actuellement en attente de validattion.";

                            // mail client
                            $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');
                            
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
        
            if($request->getExists('idModpaiement')){
                $obj = $managerModpaiement->findById(intval($request->getValue('idModpaiement')));
               
                $_SESSION['Order']['idModpaiement'] = $request->getValue('idModpaiement');
                if(trim($obj->getLien()=="")){
                    $this->page->addVar('logo', $obj->getLogo());
                }else{
                    $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                    $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                    $parametresmail["address"]       = $configMail[0]->getEmailSite();
                    $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                    $parametresmail["subjet"]        = "Achat de crédits (paiement externe)"; 

                    $variable["pack_id"]             = "";
                    $variable["pack_clt_name"]       = $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];
                    $variable["pack_price"]          = "non renseigné";
                    $variable["pack_bor"]            = "non renseigné";
                    $variable["pack_date"]           = date("d/M/Y");
                    $variable["fw_message"]          = "Un pack credit vient d'être commandé sur le site";
                    
                     if($manager->add($_SESSION['Order'])){
                        // mail administrateur
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');

                        $parametresmail["address"]       = $_SESSION['user']['email'];
                        $parametresmail["Nomaddress"]    = $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'];
                        $variable["fw_message"]          = "Votre commande de crédit a été enregistré. il est actuellement en attente de validattion.";

                        // mail client
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'pack.html');
                        
                        echo "lien";
                        exit();
                     }  
                }
            }

            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm); 
        }
   
        function initializeSession($data){ 
            
            foreach ($data as $key => $value) {
                $_SESSION['Order'][$key] = $value;
            }
            
            $_SESSION['Order']['num_bordero'] = $this->crypteBordero($data['num_bordero']);
        }
        
        private function crypteBordero($string){
            return md5($string._COOKIE_KEY_);
        }
    
    }
?>