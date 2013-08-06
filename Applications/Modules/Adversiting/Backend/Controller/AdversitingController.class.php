<?php
/**
* Description of AdversitingController
*
* @author ffozeu
*
*/

namespace Applications\Modules\Adversiting\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\Adversiting\Form\AdversitingForm;
use Library\Tools;

class AdversitingController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "Adversiting";
    
    private function leftcolumn(){
        $out = array();
        
        $out['add-adversiting.html']= 'Ajouter une Bannière';
        $out['adversiting.html']= 'Listing des Bannières';
        $out['expiredadvertising.html']= 'Bannières Expirées';
        
        return $this->page->addVar('left_content', $out);
        
    }
    
    private function rightcolumn(){
        $out ='Gérez vos bannières publicitaires. Vous pouvez éditer ou supprimer une bannière. Voir les détails d\'une bannière';
        return $this->page->addVar('right_content', $out);
    }
    
    /*
    *fonction qui affiche la pages avec la liste des publicités
    */
    public function executeAdversiting(){
        $this->leftcolumn();
        $this->rightcolumn();
     
        $this->page->addVar('title', 'Liste des bannières publicitaires');
        
        $manager = $this->managers->getManagerOf('Adversiting');
        $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
        $dateEnd = array();
        
        $dataList = $manager->findAll2('id');
        foreach ($dataList as $value) {
            $obj = $managerTranches->getLastTranche($value->getId());
            if(count($obj))
                $dateEnd[$value->getId()] = date_format(date_create($obj[0]->dateJour), 'd/m/Y').' à '.$obj[0]->heureFin;
            else 
                $dateEnd[$value->getId()] ="Non défini";  
        }
        $this->page->addVar('dataList', $dataList);
        $this->page->addVar('dateend', $dateEnd);
        $this->page->addVar('pagination', $this->pagination);
        
    }
    
        /*
    *fonction qui affiche le formulaire de cr�ation d'une banni�re et permet son enregistrement dans la BDD
    */
    public function executeCreate(HttpRequest $request){
        
        $this->page->addVar('title', 'Ajouter une bannière publicitaire');
        $this->leftcolumn();
        $this->rightcolumn();
        $dataArray = array();
        $edit = false;
        $type = array();
        
        $managerTranches   = $this->managers->getManagerOf('TranchesHoraires');
        $manager           = $this->managers->getManagerOf('Hook');
        $managerConf       = $this->managers->getManagerOf('Configurations');
        $dataObjts         = $managerConf->getConfigurations();
        $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();
        $managerAnnonce    = $this->managers->getManagerOf('Adversiting');
        $managerSpy        = $this->managers->getManagerOf('Mouchard');

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
        $infolist = $manager1->findAll2('id');
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
        $dataForm = AdversitingForm::getFrontForm($dataArray, $tab,$tab1,$edit, $dataObjts[0]->getCoutDuree(),$type, 1);
        if($request->getMethod('post')){
                         
                unset($_SESSION['Annonce']);     
                $_SESSION['Annonce']['image'] = Tools::addFile('imageFile', _SITE_UPLOAD_DIR_.'Adversiting/', true, null, 'adversiting');
                if(is_array($_SESSION['Annonce']['image']))
                    $_SESSION['Annonce']['image'] = "";
                $this->initializeSession($request->getSendData($_POST)); 
				         
                if(!$request->getExists('id')){ 
                    //var_dump($_SESSION['Annonce']);           
                    $_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];
					 $_SESSION['Annonce']['active'] = 1;
					if($managerAnnonce->add($_SESSION['Annonce'])){
						$obj = $managerAnnonce->getLastAnnonceId();
						if($_SESSION['Annonce']['diffusion'] === 'periodique'){
							if($managerTranches->addTranchesAnnonce($_SESSION['Annonce']['dateBegin'], $obj[0]->id , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idTranche'], $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
								unset($_SESSION['Annonce']);
								$this->app()->httpResponse()->redirect('adversiting.html');
							}else{
								$this->errors = _RECCORD_SAVE_FILED_;
							}
						}else{
							if($managerTranches->addTranchesAnnoncePleinTemps($_SESSION['Annonce']['dateBegin'], $obj[0]->id , $_SESSION['Annonce']['dureeAnnonce'], $UniteTempsAnnonce, $_SESSION['Annonce']['idPage'], $_SESSION['Annonce']['idPosition'])){
								unset($_SESSION['Annonce']);
								$this->app()->httpResponse()->redirect('adversiting.html');
							}else{
								$this->errors = _RECCORD_SAVE_FILED_;
							}
						}
						$this->app()->httpResponse()->redirect('adversiting.html');
					}else{
						$this->errors = _RECCORD_SAVE_FILED_;
					}
                }else{
					//var_dump($_POST);
                    if($managerAnnonce->update($_SESSION['Annonce'],'id')){
                        $spy = array();
                        $spy['date'] = date('Y-m-d');
                        $spy['heure'] = date('H:i:s');
                        $spy['action'] = 'mise à jour de \'annonce publicitaire d\'id: '.$request->getValue('id');
                        $spy['id_user'] = $_SESSION['user']['id'];
                        $spy['pseudo'] = $_SESSION['user']['pseudo'];
                        $rep = $managerSpy->add($spy);
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('adversiting.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
                         
        }
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
        if($request->getExists('id')){
            $infocmd = $managerAnnonce->getInfoOrderAnnonce($request->getValue('id'));
            $this->page->addVar('id', $request->getValue('id'));
            $this->page->addVar('infocmd', $infocmd);
        }
       
    }
    
    public function executeDelete(HttpRequest $request){
        $manager = $this->managers->getManagerOf('Adversiting');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->delete($out)){
                $this->page->addVar('infos', _RECCORD_DELETE_SUCCEFULL_); 
            }else{
                $this->page->addVar('errors', _RECCORD_DELETE_FILED_);
            }
            $this->app()->httpResponse()->redirect('adversiting.html');

        }
    }
	
	protected function init(){
        $this->tabCSS[_BASE_URI_.'css/themes/base/jquery.ui.all.css']         = 'screen';
        
        $this->tabJS[_BASE_URI_.'js/external/jquery.bgiframe-2.1.2.js']       = 'screen';
        
        $this->tabJS[_BASE_URI_.'js/ui/jquery.ui.dialog.js']                 = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/B'.$this->name.'.js']   = 'screen';
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        parent::init();
    }
    
    public function executeShow(HttpRequest $request){
        
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
    
    public function executeResults(HttpRequest $request) {
            $out = array();
            $manager = $this->managers->getManagerOf('Adversiting');
            $managerOrder = $this->managers->getManagerOf('PaiementAPI');
                  
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->deleteChecked($_POST['eltcheck']);
                            $result = $manager->deleteTrancheAnn($_POST['eltcheck']);
                            
                        }
                        $data = $manager->findAll2('id');
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->ActiveChecked($_POST['eltcheck'],'id','active');
                            $result = $managerOrder->ActiveChecked($_POST['eltcheck'],'idAnnoncepub','paiementEff ');
                        }
                        $data = $manager->findAll2('id');
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->UnActiveChecked($_POST['eltcheck'],'id','active ');
                        }
                        $data = $manager->findAll2('id');
                        break;

                    default:
                        break;
                }
            }
            
            if($_POST['statusAdv'] == "all")
                $data = $manager->findAll2('id');
            elseif ($_POST['statusAdv'] == "expired")
                $data = $manager->getAnnoncePubExpired();
            
            $this->page->addVar('dataList', $data); 
            $this->page->addVar('pagination', $this->pagination);
        }
        public function executeExpiredAdvertising(HttpRequest $request){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Liste des bannières publicitaires');

            $manager = $this->managers->getManagerOf('Adversiting');
            $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
            $dateEnd = array();

            $dataList = $manager->getAnnoncePubExpired();
            foreach ($dataList as $value) {
                $obj = $managerTranches->getLastTranche($value->getId());
                $dateEnd[$value->getId()] = date_format(date_create($obj[0]->dateJour), 'd/m/Y').' à '.$obj[0]->heureFin;
            }
            $this->page->addVar('dataList', $dataList);
            $this->page->addVar('dateend', $dateEnd);
            $this->page->addVar('pagination', $this->pagination);
        }
        
         public function executeValidationAnnonce(HttpRequest $request){
            $managerAnn      = $this->managers->getManagerOf('Annonce');
            $pwd = $this->cryptePassword($request->getValue('pwd'));
            $bordero = $this->crypteBordero($request->getValue('bordero'));
            // vérification du mot de passe
            if($pwd != $_SESSION['user']['password']){
                echo ''._WRONG_PWD_;
                exit();
            }else{
                $infocmd = $managerAnn->getInfoOrderAnnonce($request->getValue('id'));
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

}
?>