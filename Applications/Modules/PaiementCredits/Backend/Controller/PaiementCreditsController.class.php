<?php
    /**
     * Description of PaiementCreditsController
     *
     * @author Luc Alfred MBIDA
     *
     */

     namespace Applications\Modules\PaiementCredits\Backend\Controller;

     if( !defined('IN') ) die('Hacking Attempt');

     use Helper\HelperBackController;
     use Library\HttpRequest;
     use Applications\Modules\PaiementCredits\Form\PaiementCreditsForm;
     use Library\Tools;

     class PaiementCreditsController extends HelperBackController{
         // Inserer votre code ici!
         protected $name = "PaiementCredits";
         
         private function leftcolumn(){
            $out = array();
            $out['packs.html']               = 'Listing des packs de cdts';
            $out['packs-add.html']           = 'Ajouter un pack de cdt';
            
            $out['paiement-credits.html']    = 'Commandes de Credits';
            $out['validating-credits.html']  = 'Commandes de Credits attente de validation';
            $out['validated-credits.html']   = 'Commandes de Credits payés';

            return $this->page->addVar('left_content', $out);

        }
        
        /**
        * affichage le contenur de droite
        * @return type 
        */
        private function rightcolumn(){
            $out ='Gestion des différentes Packs de crédits du site';
            return $this->page->addVar('right_content', $out);
        }
        /**
        * Listing des packs de credits
        * @param HttpRequest $request 
        */
        public function executePaiementCredits(HttpRequest $request){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Liste des paiements de credit');

            $manager = $this->managers->getManagerOf('PaiementCredits');

            $dataList = $manager->getListPaiemmentCredits();
            
            /*var_dump($dataList);*/

            $this->page->addVar('dataList', $dataList);
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executePaiementCreditsEffectue(HttpRequest $request){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Liste des paiements de credit');

            $manager = $this->managers->getManagerOf('PaiementCredits');

            $dataList = $manager->getListPaiemmentCredits(1);
            
            /*var_dump($dataList);*/

            $this->page->addVar('dataList', $dataList);
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executePaiementCreditsNonEffectue(HttpRequest $request){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Liste des paiements de credit');

            $manager = $this->managers->getManagerOf('PaiementCredits');

            $dataList = $manager->getListPaiemmentCredits(0);
            
            /*var_dump($dataList);*/

            $this->page->addVar('dataList', $dataList);
            $this->page->addVar('pagination', $this->pagination);
        }
        
         public function executeResults(HttpRequest $request) {
            $out = array();
            $manager = $this->managers->getManagerOf('PaiementCredits'); 
            
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $this->removeUserCdts($_POST['eltcheck']);
                            $result = $manager->deleteChecked($_POST['eltcheck']);
                        }
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $this->addUserCdts($_POST['eltcheck']);
                            $result = $manager->ActiveChecked($_POST['eltcheck'],'id','paiementEff');
                           
                        }
                        
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $this->removeUserCdts($_POST['eltcheck']);
                            $result = $manager->UnActiveChecked($_POST['eltcheck'],'id','paiementEff');
                            
                        }
                        
                        break;

                    default:
                        break;
                }
            }
            if($_POST['statuspack'] == "all")
                $data = $manager->getListPaiemmentCredits();
            else
                $data = $manager->getListPaiemmentCredits($_POST['statuspack']);

            $this->page->addVar('dataList', $data); 
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function addUserCdts($listOrderpaiement){
            $managerOrderCredit = $this->managers->getManagerOf('PaiementCredits');
            $managerUser        = $this->managers->getManagerOf('Utilisateurs');
            $managerPack        = $this->managers->getManagerOf('PackCredits');
            $managerMail        = $this->managers->getManagerOf('ConfigSMTP');
            $configMail         = $managerMail->findById2("id", 1);
            
            $parametresmail     = array();
            $variable = array();

            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
            
            $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
            $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametresmail["subjet"]        = "Achat de crédits"; 
            
            $info = array();
            if(is_array($listOrderpaiement)){
                foreach ($listOrderpaiement as $value) {
                    $objorder = $managerOrderCredit->findById($value);
                    $objpack  = $managerPack->findById($objorder->getIdPack());
                    $objuser  = $managerUser->findById($objorder->getIdUser());

                    if(!$objorder->getPaiementEff()){

                        $info['id'] = $objuser->getId();
                        $info['nbCredits'] = (int) $objuser->getNbCredits() + (int) $objpack->getCredit();
                        $_SESSION['user']['credits'] = $info['nbCredits'];
                        $res = $managerUser->update($info, 'id');

                        $parametresmail["address"]       = $objuser->getEmail();
                        $parametresmail["Nomaddress"]    = $objuser->getPrenom().' '.$objuser->getNom();

                        $variable["pack_id"]             = $objorder->getIdPack();
                        $variable["pack_clt_name"]       = $objorder->getNom_expediteur();
                        $variable["pack_price"]          = $objorder->getMontant();
                        $variable["pack_bor"]            = $objorder->getNum_bordero();
                        $variable["pack_date"]           = $objorder->getDateEnreg();
                        $variable["fw_message"]          = "Votre compte crédit vient d'être crédité de: ".$objpack->getCredit()." crédits";

                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0], $variable, 'pack.html');
                    }
                }
            }
        }
        
        public function removeUserCdts($listOrderpaiement){
            $managerOredrCredit = $this->managers->getManagerOf('PaiementCredits');
            $managerUser        = $this->managers->getManagerOf('Utilisateurs');
            $managerPack        = $this->managers->getManagerOf('PackCredits');
            $managerMail        = $this->managers->getManagerOf('ConfigSMTP');
            $configMail         = $managerMail->findById2("id", 1);
            
            $parametresmail     = array();
            $variable = array();

            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
            
            $info = array();
            if(is_array($listOrderpaiement)){
                foreach ($listOrderpaiement as $value) {
                    $objorder = $managerOredrCredit->findById($value);
                    $objpack  = $managerPack->findById($objorder->getIdPack());
                    $objuser  = $managerUser->findById($objorder->getIdUser());

                    if($objorder->getPaiementEff()){
                        $info['id'] = $objuser->getId();

                        if( $objuser->getNbCredits()< $objpack->getCredit())
                            $info['nbCredits'] = 0;
                        else
                            $info['nbCredits'] = (int) $objuser->getNbCredits() - (int) $objpack->getCredit();

                        $_SESSION['user']['credits'] = $info['nbCredits'];
                        $res = $managerUser->update($info, 'id');

                        $parametresmail["address"]       = $objuser->getEmail();
                        $parametresmail["Nomaddress"]    = $objuser->getPrenom().' '.$objuser->getNom();

                        $variable["pack_id"]             = $objorder->getIdPack();
                        $variable["pack_clt_name"]       = $objorder->getNom_expediteur();
                        $variable["pack_price"]          = $objorder->getMontant();
                        $variable["pack_bor"]            = $objorder->getNum_bordero();
                        $variable["pack_date"]           = $objorder->getDateEnreg();
                        $variable["fw_message"]          = "Votre compte crédit vient d'être débité de: ".$objpack->getCredit()." crédits";

                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0], $variable, 'pack.html');
                    }
                }
            }
        }
         public function executeValidationPack(HttpRequest $request){
            $managecmd = $this->managers->getManagerOf('PaiementCredits');
            $pwd = $this->cryptePassword($request->getValue('pwd'));
            $bordero = $this->crypteBordero($request->getValue('bordero'));
            // vérification du mot de passe
            if($pwd != $_SESSION['user']['password']){
                echo ''._WRONG_PWD_;
                exit();
            }else{
                $infocmd = $managecmd->getInfoOrderPack($request->getValue('id'));
                if(is_object($infocmd)){
                    if(empty($infocmd->lien)){
                        if($infocmd->num_bordero != $bordero){
                             echo ''._WRONG_BORDERO_;
                             exit();
                        }elseif ($infocmd->montant < $request->getValue('montant')) {
                             echo ''._WRONG_MONTANT_;
                             exit();
                        }
                    }
                }   
            }
            echo 'ok';
            exit();
        }
        
        private function cryptePassword($string){
            return md5(_COOKIE_KEY_.$string);
        }
        
        private function crypteBordero($string){
            return md5($string._COOKIE_KEY_);
        }
        
        public function executeDesactivatOrderPack(HttpRequest $request){
           $out = array();
           $manager = $this->managers->getManagerOf('PaiementCredits');
           $managerSpy = $this->managers->getManagerOf('Mouchard');
           $out[0] = $request->getValue('id');
           $this->removeUserCdts($out);
           
           $rep = $manager->UnActiveChecked($out,'id','paiementEff');
           $spy = array();
           $spy['date'] = date('Y-m-d');
           $spy['heure'] = date('H:i:s');
           $spy['action'] = 'desactivation de la commande de pack d\'id: '.$out[0];
           $spy['id_user'] = $_SESSION['user']['id'];
           $spy['pseudo'] = $_SESSION['user']['pseudo'];
           $rep = $managerSpy->add($spy);
           $this->app()->httpResponse()->redirect('paiement-credits.html');
        }
        
        public function executeActivatOrderPack(HttpRequest $request){
           $out = array();
           $manager = $this->managers->getManagerOf('PaiementCredits');
           $managerSpy = $this->managers->getManagerOf('Mouchard');
           $out[0] = $request->getValue('id');
           $this->addUserCdts($out);
           
           $rep = $manager->ActiveChecked($out,'id','paiementEff');
           $spy = array();
           $spy['date'] = date('Y-m-d');
           $spy['heure'] = date('H:i:s');
           $spy['action'] = 'activation de la commande de pack d\'id: '.$out[0];
           $spy['id_user'] = $_SESSION['user']['id'];
           $spy['pseudo'] = $_SESSION['user']['pseudo'];
           $rep = $managerSpy->add($spy);
           $this->app()->httpResponse()->redirect('paiement-credits.html');
        }
        
        protected function init(){
            $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/B'.$this->name.'.js']   = 'screen';
            parent::init();
        }
     }
?>