<?php
/**
* Description of AdversitingController
*
* @author ffozeu
*
*/

namespace Applications\Modules\Adversiting\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\Adversiting\Form\AdversitingForm;
use Library\Tools;

class AdversitingController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "Adversiting";
    
    function executeMesannoncespub(HttpRequest $request){
		parent::getInfosPage('mes_annonces_pub');
        $Manager      = $this->managers->getManagerOf('Adversiting');
        $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
        
        $dateEnd = array();
        $paged        =$request->getValue('paged')?intval($request->getValue('paged')):1;
        $listAnnonces = $Manager->findById2('idUder',$_SESSION['user']['id'],$paged,4,'id');
        $countelt     = count($Manager->findById2('idUder',$_SESSION['user']['id']));
        
        foreach ($listAnnonces as $value) {
            $obj = $managerTranches->getLastTranche($value->getId());
            $dateEnd[$value->getId()] = date_format(date_create($obj[0]->dateJour), 'd/m/Y').' à '.$obj[0]->heureFin;
        }
        
        $this->page->addVar('dateend', $dateEnd);
        $this->page->addVar('datalist', $listAnnonces);  
        $this->page->addVar('countAnnone',$countelt);
        parent::pagination('Annonce',$countelt,$paged,4);
    }
    
    public function executeCreate(HttpRequest $request){
        parent::getInfosPage('Adversiting');
        $dataArray = array();
        $edit = false;
        $type = array();
        $popupcga   = $this->getInfosPagepopup('cga');
        
        $managerTranches   = $this->managers->getManagerOf('TranchesHoraires');
        $manager           = $this->managers->getManagerOf('Hook');
        $managerConf       = $this->managers->getManagerOf('Configurations');
        
        $dataObjts         = $managerConf->getConfigurations();
        $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();
        
        $managerAnnonce    = $this->managers->getManagerOf('Adversiting');
        $managerMail       = $this->managers->getManagerOf('ConfigSMTP');
        $managerUser       = $this->managers->getManagerOf('Utilisateurs');
        $managerPage       = $this->managers->getManagerOf('BgManager');
        $managerOrder      = $this->managers->getManagerOf('PaiementAPI');
            
        $pagecga = $managerPage->findByName('identifiant','cga');
        $configMail = $managerMail->findById2("id", 1);
        
        $parametresmail = array();
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;

        $infolist = $manager->FindByName('type','pub');
        $tab1['0*0'] = 'Selectionner une position';
        foreach($infolist as $data):
            $tab1[$data->getId().'*'.$data->getPrice()] = $data->getName();
        endforeach;        
        
        $type['NULL'] = 'Selectionnez un type d\'annoncce'; 
        $type['pub'] = 'Bannières publicitaires';
        $type['annonce'] = 'Annonces';
        
        $manager1 = $this->managers->getManagerOf('BgManager');
        $tab['0*0'] = 'Selectionner une page';
        $infolist = $manager1->findAll2();
        foreach($infolist as $advers):
            $tab[$advers->getId().'*'.$advers->getPrix()] = $advers->getTitre();
        endforeach;        
        //cas de l'édition
        if($request->getExists('id')){            
            $edit =true;
            //$manager = $this->managers->getManagerOf('Adversiting');
            
            $dataObjt = $managerAnnonce->findById(intval($request->getValue('id')));
            $dataArray = $dataObjt->tabAttrib;
            $this->page->addVar('title', 'Modifier une banière publicitaire');
            $this->page->addVar('idelt', $request->getData('id'));
            
        
        }else{
               $dataArray = $_POST;
        }
        $dataForm = AdversitingForm::getFrontForm($dataArray, $tab,$tab1,$edit, $dataObjts[0]->getCoutDuree(),$type);
        if($request->getMethod('post')){
            unset($_SESSION['Annonce']);     
            $_SESSION['Annonce']['image'] = Tools::addFile('imageFile', _SITE_UPLOAD_DIR_.'Adversiting/', true, null, 'adversiting');
            if(is_array($_SESSION['Annonce']['image']))
                    $_SESSION['Annonce']['image'] = "";
            $this->initializeSession($request->getSendData($_POST));
            
            if($_SESSION['Annonce']['typeFacturation'] === 'click'){
				$_SESSION['referer'] = 'poster-une-annonce-publicitaire.html';
				if(!$this->app->user()->isAuthenticated()){
					$this->app()->httpResponse()->redirect('connexion.html');
				}
				$_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];
                if($managerAnnonce->add($_SESSION['Annonce'])){
                    $obj = $managerAnnonce->getLastAnnonceId();
                    
                    // Enregistrement dans la table de commande
                    $_SESSION['Order']['idAnnoncepub']   = $obj[0]->id;
                    $_SESSION['Order']['idAnnonce']      = NULL;
                    $_SESSION['Order']['idModpaiement']  = NULL;
                    $_SESSION['Order']['dateCmd']        = date("Y-m-d");
                    $_SESSION['Order']['heureCmd']       = date("H:i:s");
                    $_SESSION['Order']['montant']        = 0;
                    $_SESSION['Order']['nom_expediteur'] = $_SESSION['user']['nom'].' '. $_SESSION['user']['prenom'];
                    $result = $managerOrder->add($_SESSION['Order']);
                        
                    $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                    $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                    $parametresmail["address"]       = $configMail[0]->getEmailSite();
                    $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
                    $parametresmail["subjet"]        = "Nouvel annonce publicitaire";  
                    
                    $variable["annonce_id"]          = $obj[0]->id;
                    $variable["annonce_title"]       = $_SESSION['Annonce']['altText'];
                    $variable["annonce_price"]       = $_SESSION['Annonce']['finalPrice'];
                    $variable["annonce_type"]        = 'Annonce Publicitaire';
                    $variable["annonce_facturation"] = 'Par Click';
                    $variable["annonce_resume"]      = "";
                    $variable["fw_message"]          = "Votre annonce à été enregistré avec succès mais ne sera visible sur le site qu'après activation. Cependant, assurer vous que vous avez du crédit dans votre compte sinon elle ne sera pas visible";

                    $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                    
                    $user = $managerUser->findById($_SESSION['Annonce']['idUder']);
                    $parametresmail["address"]       = $user->getEmail();
                    $parametresmail["Nomaddress"]    = $user->getPrenom().' '.$user->getNom();

                    $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                    if($_SESSION['Annonce']['diffusion'] === 'periodique'){
                        if($managerTranches->addTranchesAnnonce($_SESSION['Annonce']['dateBegin'], $obj[0]->id , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idTranche'], $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                            unset($_SESSION['Annonce']);
                            unset($_SESSION['Order']);
                            $this->app()->httpResponse()->redirect('mesannoncespub.html');
                        }else{
                            $this->errors = _RECCORD_SAVE_FILED_;
                        }
                    }else{
                        if($managerTranches->addTranchesAnnoncePleinTemps($_SESSION['Annonce']['dateBegin'], $obj[0]->id , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
                            unset($_SESSION['Annonce']);
                            unset($_SESSION['Order']);
                            $this->app()->httpResponse()->redirect('mesannoncespub.html');
                        }else{
                            $this->errors = _RECCORD_SAVE_FILED_;
                        }
                    }
                }else{
                    $this->errors = _RECCORD_SAVE_FILED_;
                } 
            }else{
                $_SESSION['referer'] = 'modepaiementfrontpub.html';
				//var_dump($_SESSION['Annonce']);
                $this->app()->httpResponse()->redirect('modepaiementfrontpub.html');  
            }
                       
        }
         if($popupcga != 'null')
                $this->page->addVar('popupcga',$popupcga);
        $this->page->addVar('cgapage', $pagecga[0]);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
       
    }
    
    protected function init(){
        
        //$this->tabJS[_BASE_URI_.'js/ui/jquery.ui.core.js']         = 'screen';
        $this->tabCSS[_BASE_URI_.'css/themes/base/jquery.ui.all.css']         = 'screen';
        
        $this->tabJS[_BASE_URI_.'js/external/jquery.bgiframe-2.1.2.js']       = 'screen';
        
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.core.js']                    = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.widget.js']                  = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.mouse.js']                   = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.draggable.js']               = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.position.js']                = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.resizable.js']               = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.dialog.js']                  = 'screen';
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.datepicker.js']              = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js']    = 'screen';
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        parent::init();
    }
    
    function initializeSession($data){
        $cart = array();
        foreach ($data as $key => $value) {
             $_SESSION['Annonce'][$key] = $value;
             $cart[$key] = $value;
             if($key === 'idPage'){
                $infos1 = explode("*", $_SESSION['Annonce'][$key]);
                $_SESSION['Annonce']['idPage'] = $infos1[0];
                $cart['idPage'] = $infos1[0];
             }             
             if($key === 'idPosition'){
                $infos2 = explode("*", $_SESSION['Annonce'][$key]);
                $_SESSION['Annonce']['idPosition'] = $infos2[0];
                $cart['idPosition'] = $infos2[0];
             }
        }
		
		if(isset($data["dureeAnnonce"]) &&  ($data["dureeAnnonce"] == "autres"))
			$_SESSION['Annonce']['dureeAnnonce'] = $_SESSION['Annonce']['orther'];
			
		unset($_SESSION['Annonce']['orther']);
		
        $this->app->user()->setAttribute('cart',$cart);
    }
	
	public function executePricePleinTemps(HttpRequest $request){
		 $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
         if(empty($_POST['dateBegin']))
             $date = date("Y-m-d");
         else
             $date = $_POST['dateBegin'];
			 
		$prix = $managerTranches->getSumPriceTranchesNonOccupes($date, $_POST['idPage'], $_POST['idPosition']);
		echo $prix;
		exit;
	}
    
    function executeGetTranches(HttpRequest $request){
         $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
         if(empty($_POST['dateBegin']))
             $date = date("Y-m-d");
         else
             $date = $_POST['dateBegin'];
         
         $tanchesdispo = $managerTranches->getTranchesNonOccupes($date, $_POST['idPage'], $_POST['idPosition']);
         $texte ="";
         if(empty($tanchesdispo)){
             $texte = "Aucune plage horaire n\'est disponible pour cette position, cette page et pour cette date";
         }else{
                $texte = '<table class="listing" cellpadding="1" cellspacing="1">
                        <thead>
                            <tr>
                                <th>Heures</th>
                                <th>Prix</th>
                                <th>Check</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach ($tanchesdispo as $value){
                    $texte .= '<tr>
                                    <td>'.$value->getHeureDeb().' - '.$value->getHeureFin().'</td>
                                    <td>'.$value->getPrix().'</td>
                                    <td><input class="tranchesCheck" type="checkbox" name="Tranche[]"  id="'.$value->getIdTanche().'-'.$value->getPrix().' " value="$value->getIdTanche()" /></td>
                                </tr>';
                }
                $texte .='</tbody> 
                    </table>';
         }
        echo $texte;
        exit;
    }
    
    function executeUpdateClick(HttpRequest $request){
         $manager = $this->managers->getManagerOf('Adversiting');
         $data = array();
         $obj = $manager->findById($_POST['id']);
         $clicks = $obj->getNbCLick();
         $clicks++;
         $data['id'] = $_POST['id'];
         $data['nbClick'] = $clicks;
         
         if($manager->update($data, 'id')){
            if($this->executeUpdateCredits( $_POST['id'])){
                 echo 'ok'; 
             }else{
                echo 'bad';
            }
         }else{
             echo 'bad';
         }
         
         exit;
    }
    
    public function executeDesactivateannoncepub(HttpRequest $request){
        $managerAnnonce    = $this->managers->getManagerOf('Adversiting');

        $out['id']         = $request->getData('id');
        $out['active'] = 0;

        if($managerAnnonce->update($out,'id')){
            $this->app()->httpResponse()->redirect('mesannonces.html');
        }else{
            $this->errors = 'Echec lors de la suppression';
        }
    }
        
    public function executeDelete(HttpRequest $request){

        $manager = $this->managers->getManagerOf('Adversiting');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->delete($out)){
                $result = $manager->deleteTrancheAnn($out['id']);
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('mesannoncespub.html');
        }
    }
    
    function executeUpdateCredits($idAnnonce){
         $manager = $this->managers->getManagerOf('Adversiting');
         $data = array();
         $obj = $manager->findById($idAnnonce);
         
         if($obj->getTypeFacturation() === "click"){
             $managerHook = $this->managers->getManagerOf('Hook');
             $managerUser = $this->managers->getManagerOf('Utilisateurs');
             
             $objUser =  $managerUser->findById($obj->getIdUder());
             $objHook =  $managerHook->findById($obj->getIdPosition());
             
             if($objUser->getNbCredits() && ($objUser->getNbCredits() >= $objHook->getCoutCredit())){
                 $infos = array();
                 $infos['nbCredits'] = (int)$objUser->getNbCredits() - (int) $objHook->getCoutCredit();
                 $infos['id']        = $objUser->getId();
                 if($managerUser->update($infos, 'id')){
                     return true;
                 }else{
                      return false;
                 }   
             }else{
                 $data['id'] = $idAnnonce;
                 $data['active'] = 0;
                 
                 if($manager->update($data, 'id'))
                    return true;
                else
                    return false;
             }
             
         }
         
         return true;
    }
    
    public function executeMesAnnoncesPubExpirees(HttpRequest $request){
        parent::getInfosPage('mes_annonces_pub');
        $Manager      = $this->managers->getManagerOf('Adversiting');
        $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
        
        $dateEnd = array();
        $paged        =$request->getValue('paged')?intval($request->getValue('paged')):1;
        $listAnnonces = $Manager->getAnnoncePubExpired($_SESSION['user']['id'],'id','DESC',$paged,4);
        $countelt     = count($Manager->getAnnoncePubExpired($_SESSION['user']['id']));
        //var_dump($listAnnonces);
        if(count($listAnnonces)){
            foreach ($listAnnonces as $value) {
                $obj = $managerTranches->getLastTranche($value->getId());
                $dateEnd[$value->getId()] = date_format(date_create($obj[0]->dateJour), 'd/m/Y').' à '.$obj[0]->heureFin;
            }
        }
        
        $this->page->addVar('dateend', $dateEnd);
        $this->page->addVar('datalist', $listAnnonces);  
        $this->page->addVar('countAnnone',$countelt);
        parent::pagination('Annonce',$countelt,$paged,4);
    }
}
?>