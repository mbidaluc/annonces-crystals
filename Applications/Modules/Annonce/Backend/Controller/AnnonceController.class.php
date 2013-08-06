<?php
    /**
    * Description of AnnonceController
    *
    * @author mbida luc
    *
    */

    namespace Applications\Modules\Annonce\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Annonce\Form\AnnonceForm;
    use Library\Tools;

    class AnnonceController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Annonce";
        
        private function leftcolumn(){
            $out = array();
            $out['annonce-add.html']          = 'Ajouter une Annonce';
            $out['annonce.html']              = 'Listing des Annonces';
            $out['annoncesactives.html']      = 'Annonces Activées';
            $out['annoncesnonactives.html']   = 'Annonces En attente d\'activation';
            $out['annoncesexpires.html']      = 'Annonces Expirées';

            return $this->page->addVar('left_content', $out);

        }

        function executeAnnonce(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Listing des Annonces');
			$nbAbus = array();
            
            $Manager      = $this->managers->getManagerOf('Annonce');
			$ManagerAbus      = $this->managers->getManagerOf('GestionAbus');
            
            if($request->getMethod('post')){
                //var_dump($request->getValue('eltcheck'));
                $out = array();
                if($request->getValue('actionselect')!=""){
                    switch ($request->getValue('actionselect')) {

                        case 'delete':
                            if(isset($_POST['eltcheck'])){
                                $result = $Manager->deleteChecked($_POST['eltcheck']);
                            }
                            $listAnnonces = $Manager->findAll2('id');
                            $this->app()->cache()->clearCache();
                            break;
                            
                         case 'active':
                            if(isset($_POST['eltcheck'])){
                                $result = $this->ActivateChecked($_POST['eltcheck']);
                            }
                            $listAnnonces = $Manager->findAll2('id');
                            $this->app()->cache()->clearCache();
                            break;
                         case 'unactive':
                            if(isset($_POST['eltcheck'])){
                                $result = $this->DesactivateChecked($_POST['eltcheck']);
                            }
                            $listAnnonces = $Manager->findAll2('id');
                            $this->app()->cache()->clearCache();
                            break;
                            
                        default:
                            break;
                    }
                }
                if($request->getValue('searchzone') != "" && $request->getValue('searchzone') != "recherche" ){
                    $out[] = 'id';
                    $out[] = 'designation';
                    $listAnnonces = $Manager->searchCriteria($out, $request->getValue('searchzone'));
                }else{
                    $listAnnonces = $Manager->findAll2('id');
                }
            }else{
                 $listAnnonces = $Manager->findAll2('id');
            }
            
			
			foreach($listAnnonces as $value)
				$nbAbus[$value->getId()] = $ManagerAbus->getNumberAbusByAnnonce($value->getId());
			

            $this->page->addVar('datalist', $listAnnonces); 
			$this->page->addVar('abus', $nbAbus); 
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeAnnonceactives(){
            $this->leftcolumn();
            $this->page->addVar('title', 'Listing des Annonces activés');
            
            $Manager      = $this->managers->getManagerOf('Annonce');
			$ManagerAbus      = $this->managers->getManagerOf('GestionAbus');
				
            $listAnnonces = $Manager->getActivedAnnonce('id');
			
			foreach($listAnnonces as $value)
				$nbAbus[$value->getId()] = $ManagerAbus->getNumberAbusByAnnonce($value->getId());
			
			$this->page->addVar('abus', $nbAbus); 

            $this->page->addVar('datalist', $listAnnonces);
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeAnnoncenonactives(){
            $this->leftcolumn();
            $this->page->addVar('title', 'Listing des Annonces activés');
            
            $Manager      = $this->managers->getManagerOf('Annonce');
			$ManagerAbus      = $this->managers->getManagerOf('GestionAbus');
				
            $listAnnonces = $Manager->findByName('is_actived ', 0,'id');
			
			foreach($listAnnonces as $value)
				$nbAbus[$value->getId()] = $ManagerAbus->getNumberAbusByAnnonce($value->getId());
			
			$this->page->addVar('abus', $nbAbus); 

            $this->page->addVar('datalist', $listAnnonces);
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeAnnonceexpires(){
            $this->leftcolumn();
            $this->page->addVar('title', 'Listing des Annonces activés');
            
            $Manager      = $this->managers->getManagerOf('Annonce');
			$ManagerAbus      = $this->managers->getManagerOf('GestionAbus');
			
            $listAnnonces = $Manager->findInfosStrictInf('dateexp',  date("Y-m-d H:i:s"),'id');
			
			foreach($listAnnonces as $value)
				$nbAbus[$value->getId()] = $ManagerAbus->getNumberAbusByAnnonce($value->getId());
			
			$this->page->addVar('abus', $nbAbus); 

            $this->page->addVar('datalist', $listAnnonces);
            $this->page->addVar('pagination', $this->pagination);
        }
        
         public function executeDelete(HttpRequest $request){

            $manager = $this->managers->getManagerOf('Annonce');
            if($request->getExists('id')){
                $out['id'] = $value;
                if($manager->delete($out)){
                    $this->app()->cache()->clearCache();
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                $this->app()->httpResponse()->redirect('annonce.html');

            }
        }
        
        public function executeActivateannonce(HttpRequest $request){
            $managerAnnonce    = $this->managers->getManagerOf('Annonce');
            $managerConf = $this->managers->getManagerOf('Configurations');
            $managerSpy          = $this->managers->getManagerOf('Mouchard');
            $dataObjts   = $managerConf->getConfigurations();
            $managerMail = $this->managers->getManagerOf('ConfigSMTP');
            $configMail = $managerMail->findById2("id", 1);

            $parametresmail = array();
            $variable = array();
        
            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
        
            $infosAnno          = $managerAnnonce->findById(intval($request->getValue('id')));
            $out['id']          = $request->getValue('id');
            $out['is_actived']  = 1;
            
            $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
            $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametresmail["address"]       = $infosAnno->getEmail();
            $parametresmail["Nomaddress"]    = "Annonceur";
            
            $variable["annonce_id"]          = $value;
            $variable["annonce_title"]       = $infosAnno->getDesignation();
            $variable["annonce_price"]       = $infosAnno->getPrixTotal();
            $variable["annonce_type"]        = 'Annonce Classique';
            $variable["annonce_facturation"] = 'Par '.ucfirst($infosAnno->getTypeFacturation());
            $variable["annonce_resume"]      = $infosAnno->getTexte();
            $variable["fw_message"]          = "Votre annonce à été activé";

            $parametresmail["subjet"]        = "Activation de l'annonce";                
            
            $infosAnnonces = $managerAnnonce->findById($request->getValue('id'));
            //var_dump($infosAnnonces);
            $dureeAnnonce = $infosAnnonces->getDureeAnnonce();
            $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();
            
            $temps = 0;
            if($UniteTempsAnnonce === "Minute")
                $temps = time() + $dureeAnnonce*60;
            
            if($UniteTempsAnnonce === "Heure")
                $temps = time() + $dureeAnnonce*3600;
            
            if($UniteTempsAnnonce === "Jour")
                $temps = time() + $dureeAnnonce*3600*24;
            
            if($UniteTempsAnnonce === "Semaine")
                $temps = time() + $dureeAnnonce*3600*24*7;
            
            if($UniteTempsAnnonce === "Mois")
                $temps = time() + $dureeAnnonce*3600*24*31;
            
            if($UniteTempsAnnonce === "Annee")
                $temps = time() + $dureeAnnonce*3600*24*365;
            
            if($infosAnnonces->getDateDebut() === "0000-00-00 00:00:00"){
                $out['dateDebut']  = date("Y-m-d H:i:s");
                $out['dateexp']  = date("Y-m-d H:i:s", $temps);
            }
            
            if($managerAnnonce->update($out,'id')){
                $spy = array();
                $spy['date'] = date('Y-m-d');
                $spy['heure'] = date('H:i:s');
                $spy['action'] = 'activation de \'annonce d\'id: '.$out['id'];
                $spy['id_user'] = $_SESSION['user']['id'];
                $spy['pseudo'] = $_SESSION['user']['pseudo'];
                $rep = $managerSpy->add($spy);
                
                $this->app()->cache()->clearCache();
                $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                $this->app()->httpResponse()->redirect('annonce.html');
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
        }
        
        public function executeDesactivateannonce(HttpRequest $request){
            $managerAnnonce    = $this->managers->getManagerOf('Annonce');
            $managerMail       = $this->managers->getManagerOf('ConfigSMTP');
            $configMail        = $managerMail->findById2("id", 1);
            $managerSpy        = $this->managers->getManagerOf('Mouchard');

            $parametresmail = array();
            $variable = array();
        
            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
        
            $infosAnno          = $managerAnnonce->findById(intval($request->getValue('id')));
            
            $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
            $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametresmail["address"]       = $infosAnno->getEmail();
            $parametresmail["Nomaddress"]    = "Annonceur";

            $parametresmail["subjet"]        = "Desactivation de l'annonce";
            
            $variable["annonce_id"]          = $request->getValue('id');
            $variable["annonce_title"]       = $infosAnno->getDesignation();
            $variable["annonce_price"]       = $infosAnno->getPrixTotal();
            $variable["annonce_type"]        = 'Annonce Classique';
            $variable["annonce_facturation"] = 'Par '.ucfirst($infosAnno->getTypeFacturation());
            $variable["annonce_resume"]      = $infosAnno->getTexte();
            $variable["fw_message"]          = "Votre annonce à été désactivé";
                   
            $out['id']         = $request->getValue('id');
            $out['is_actived'] = 0;
                   
            if($managerAnnonce->update($out,'id')){
                $spy = array();
                $spy['date'] = date('Y-m-d');
                $spy['heure'] = date('H:i:s');
                $spy['action'] = 'desactivation de \'annonce d\'id: '.$out['id'];
                $spy['id_user'] = $_SESSION['user']['id'];
                $spy['pseudo'] = $_SESSION['user']['pseudo'];
                $rep = $managerSpy->add($spy);
                
                $this->app()->cache()->clearCache();
                $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                $this->app()->httpResponse()->redirect('annonce.html');
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
        }
        
        function executeAnnoncecreate(HttpRequest $request){
        
            $this->leftcolumn();
            $this->page->addVar('title','Publier une annonce');

            $prio = array();
            $cat  = array();
            $type = array();
            $dureeAnnonce = array();

            $position['0*0']        = 'Par defaut'; 
            $prio['0*0']            = 'Selectionnez une priorité';  
                   
            $infos                  = array();
            $manage                 = $this->managers->getManagerOf('Categories');
            $manager                = $this->managers->getManagerOf('Annonce');
            $categories             = $manage->getListeParent();
            $ManagerPriorites       = $this->managers->getManagerOf('Priorite');
            $ManagerTypeAnnonces    = $this->managers->getManagerOf('Hook');    
            $managerPhoto           = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
            
            $typeannonces = $ManagerTypeAnnonces->findByName('type',"annonce");

            $managerConf = $this->managers->getManagerOf('Configurations');
            $dataObjts   = $managerConf->getConfigurations();


            $priorites = $ManagerPriorites->getListePriorite();
            foreach($priorites as $data)
                $prio[$data->getId().'*'.$data->getPrix()] = $data->getLibelle()." (".$data->getPrix()." FCFA)";

            $type['pub'] = _ANNONCE_PUB_;
            $type['annonce'] = _ANNONCE_TEXTE_;

            foreach($categories as $data){
                $decalage ='';
                $decalage = str_pad($decalage, $data->getLength(), '>');  
                $cat[$data->getIdFils()] = $decalage.$data->getLibelle();
            }
            
            foreach($typeannonces as $data){
                //$type[$data->getId()] = $data->getName()." (".$data->getPrice()." $)";
               $position[$data->getId().'*'.$data->getPrice()]= $data->getName()." (".$data->getPrice()." FCFA)";
            }

            if($request->getExists('id')){
                
                $dataObjt = $manager->findByName('id',intval($value));
                $dataArray = $dataObjt->tabAttrib;
                $this->page->addVar('title', 'Modifier l\'annonce');
            }else{
                $dataArray = $_POST;
            }
            $dataForm = AnnonceForm::getFormAdmin($dataArray, $cat, $position, $prio, $dataObjts[0]->getCoutDuree());
            
            if($request->getMethod('post')){
                unset($_SESSION['Annonce']);         
                $this->initializeSession($request->getSendData($_POST));
                $_SESSION['Annonce']['idUder'] = $_SESSION['user']['id'];
                
                $_SESSION['Annonce']['dateDebut']  = date("Y-m-d H:i:s");
                $_SESSION['Annonce']['is_actived'] = 1;

                
                $dureeAnnonce = $_SESSION['Annonce']['dureeAnnonce'];
                $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();

                $temps = 0;
                if($UniteTempsAnnonce === "Minute")
                    $temps = time() + $dureeAnnonce*60;

                if($UniteTempsAnnonce === "Heure")
                    $temps = time() + $dureeAnnonce*3600;

                if($UniteTempsAnnonce === "Jour")
                    $temps = time() + $dureeAnnonce*3600*24;

                if($UniteTempsAnnonce === "Semaine")
                    $temps = time() + $dureeAnnonce*3600*24*7;

                if($UniteTempsAnnonce === "Mois")
                    $temps = time() + $dureeAnnonce*3600*24*31;

                if($UniteTempsAnnonce === "Annee")
                    $temps = time() + $dureeAnnonce*3600*24*365;

                $_SESSION['Annonce']['dateexp']  = date("Y-m-d H:i:s", $temps);
                $typeImage = "principale";
                
                //var_dump($_SESSION['Annonce']);
                if($manager->add($_SESSION['Annonce'])){
                    $this->app()->cache()->clearCache();
                    $obj = $manager->getLastAnnonceId();
					if(isset($_SESSION['Annonce']['image'])){
						foreach ($_SESSION['Annonce']['image'] as $value) {
							if(copy(_SITE_UPLOAD_TMP_DIR_ . $value , _SITE_UPLOAD_DIR_.'Annonce/'.$value)){
								//enregistrement des photos
								if($managerPhoto->savePhoto($value, $typeImage, $obj[0]->id)){
									$this->addFile($value);
								}else{
									$this->errors = _RECCORD_SAVE_FILED_;
									exit;
								}
							}else{
								$this->errors = _RECCORD_SAVE_FILED_;
								exit;
							}
							$typeImage = "autres";
						}
					}
                    
                    $this->app()->httpResponse()->redirect('annonce.html');
                 }

            }
            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);


            $this->page->addVar('dataConfig', $dataObjts);
        }
        
         function initializeSession($data){
            $cart = array();
            foreach ($data as $key => $value) {
                $_SESSION['Annonce'][$key] = $value;
                $cart[$key] = $value;
                if($key === 'idPriorite'){
                    $infos1 = explode("*", $_SESSION['Annonce'][$key]);
                    $_SESSION['Annonce']['idPriorite'] = $infos1[0];
                    $cart['idPriorite'] = $infos1[0];
                }             
                if($key === 'idPosition'){
                    $infos2 = explode("*", $_SESSION['Annonce'][$key]);
                    $_SESSION['Annonce']['idPosition'] = $infos2[0];
                    $cart['idPosition'] = $infos2[0];
                }
            }
            if(isset($data["idSubCategorie"]) &&  ($data["idSubCategorie"]!= "NULL"))
                $_SESSION['Annonce']['idCategorie'] = $_SESSION['Annonce']['idSubCategorie'];
            
            $this->app()->user()->setAttribute('cart',$cart);        
        }
        
        protected function init(){       
            //inclusion des bibliothèques Jquery file upload
            $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js']            = 'screen';
            $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/jquery.iframe-transport.js']            = 'screen';
            $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/jquery.fileupload.js']                  = 'screen';
			
            $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/B'.$this->name.'.css'] = 'screen';
            $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/B'.$this->name.'.js'] = 'screen'; 
            
            parent::init();
        }
        
        function executeFileupload(HttpRequest $request){    
            $filedata = Tools::addFile('files', _SITE_UPLOAD_TMP_DIR_);
            echo _UPLOAD_DIR_.'tmp/'.$filedata.'**'.$filedata;
            exit();

        }
        
        public static function addFile($source, $multiple=true){
     
            $tabArrayVal = Tools::getArrayWidthHeight('annonces');
            foreach ($tabArrayVal as $key => $value)
                Tools::imageResize(_SITE_UPLOAD_DIR_.'Annonce/' . $source, _SITE_UPLOAD_DIR_.'Annonce/' . $key.$source, $value['width'], $value['height']);


        }
        
        public function executeDetails(HttpRequest $request){
            $this->leftcolumn();
            
            $managerCategorie        = $this->managers->getManagerOf('Categories');
            $managerAnnonce          = $this->managers->getManagerOf('Annonce');
            $managerPhoto            = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
            $value = $request->getValue('id');
            $annonce    = $managerAnnonce->findById(intval($value));
            $categorie  = $managerCategorie->findById2('idFils', intval($annonce->getIdCategorie()));
            $lesPhotos  = $managerPhoto->findById2('idAnnonce', intval($value));
           
            if($request->getMethod('post')){
                if(isset($_POST['active'])){
                    $this->executeActivateannonce($request);
                }else{
                    $this->executeDesactivateannonce($request);
                }
                $this->app()->httpResponse()->redirect('annonce.html');
            }
            $infocmd = $managerAnnonce->getInfoOrderAnnonce($value);
            $this->page->addVar('annonce', $annonce);
            $this->page->addVar('categorie', $categorie);
            $this->page->addVar('lesPhotos', $lesPhotos);
            $this->page->addVar('id', $value);
            $this->page->addVar('infocmd', $infocmd);
        }
        
        
        function executeEditAnnonce(HttpRequest $request){

            $this->leftcolumn();
            $this->page->addVar('title','Modifier une Annonce');

            $prio = array();
            $cat  = array();
            $type = array();
            $dureeAnnonce = array();

            $position['0*0'] = 'Par defaut'; 
            $prio['0*0'] = 'Selectionnez une priorité';  
                   
            $infos = array();
            $manage                 = $this->managers->getManagerOf('Categories');
            $manageAnnonce          = $this->managers->getManagerOf('Annonce');
            $categories             = $manage->getListeParent();
            $ManagerPriorites       = $this->managers->getManagerOf('Priorite');
            $ManagerTypeAnnonces    = $this->managers->getManagerOf('Hook');    
            $managerPhoto           = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
           
            $value                  = $request->getValue('id');
            $lesPhotos              = $managerPhoto->findById2('idAnnonce', intval($value));
            
            $typeannonces = $ManagerTypeAnnonces->findByName('type',"annonce");

            $managerConf = $this->managers->getManagerOf('Configurations');
            $dataObjts   = $managerConf->getConfigurations();


            $priorites = $ManagerPriorites->getListePriorite();
            foreach($priorites as $data)
                $prio[$data->getId().'*'.$data->getPrix()] = $data->getLibelle()." (".$data->getPrix()." $)";

            $type['pub'] = _ANNONCE_PUB_;
            $type['annonce'] = _ANNONCE_TEXTE_;

            foreach($categories as $data){
                $decalage ='';
                $decalage = str_pad($decalage, $data->getLength(), '>');  
                $cat[$data->getIdFils()] = $decalage.$data->getLibelle();
            }
            
            foreach($typeannonces as $data){
                //$type[$data->getId()] = $data->getName()." (".$data->getPrice()." $)";
               $position[$data->getId().'*'.$data->getPrice()]= $data->getName()." (".$data->getPrice()." $)";
            }

            $subcat = array();
            if($request->getExists('id')){
                $dataObjt = $manageAnnonce->findById(intval($value));
                $dataArray = $dataObjt->tabAttrib;
                $catg = $manage->findById2('idFils', $dataObjt->getIdCategorie());
                
                 //si la de l'annonce possède un parent
                if($catg[0]->getIdParent()){
                    $dataArray['idSubCategorie'] = $dataObjt->getIdCategorie();
                    $dataArray['idCategorie'] = $catg[0]->getIdParent();
                    /*$listsubcat = $this->getArbreSubCategories($catg[0]->getIdParent());
                    
                    foreach($listsubcat as $data){
                        $decalage ='';
                        $decalage = str_pad($decalage, $data->getLength(), '>');  
                        $subcat[$data->getIdFils()] = $decalage.$data->getLibelle();
                    }*/
                    
                }else{
                    $dataArray['idCategorie'] = $dataObjt->getIdCategorie();
                }
                    $this->page->addVar('title', 'Modifier l\'annonce');
            }else{
                $dataArray = $_POST;
            }
            $dataForm = AnnonceForm::getFormAdminEdit($dataArray, $cat,$subcat);
            if($request->getMethod('post')){
                if($_POST['idSubCategorie']!= "NULL")
                    $_POST['idCategorie'] = $_POST['idSubCategorie'];
                if($manageAnnonce->update($_POST, 'id')){

                    $this->app()->httpResponse()->redirect('annonce.html');
                }else{
                        $this->errors = _RECCORD_SAVE_FILED_;
                }                              
            }
            $this->page->addVar('lesPhotos', $lesPhotos);
            $this->page->addVar('id', intval($value));
            $this->page->addVar('data', $dataObjt);
            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);  
        }

        public function executeDeleteImage(HttpRequest $request){

            $manager = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
            //var_dump($_POST);
            //exit;
            if($manager->updatePhoto($_POST['id'], " ", $_POST['idAnnonce'])){
                if( file_exists(_SITE_UPLOAD_DIR_.'Annonce/'.$_POST['imageAnn'])){
                    if(unlink( _SITE_UPLOAD_DIR_.'Annonce/'.$_POST['imageAnn'] )){
                        echo '1';
                        exit;
                    }else{
                        echo '0';
                        exit;
                    }
                }else{
                     echo '1';
                        exit;
                }
            }else{
                echo '0';
                exit;
            }

        }

        function executeFileuploadUpdate(HttpRequest $request){    
            $filedata = Tools::addFile('Imagefiles', _SITE_UPLOAD_DIR_.'Annonce/', true, null, 'annonces');
            //echo _SITE_UPLOAD_TMP_DIR_;
            echo _UPLOAD_DIR_.'Annonce/'.$filedata.'**'.$filedata;
            exit();

        }

        public function executeUpdateImage(HttpRequest $request){

            $manager = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
            //var_dump($_POST);
            //exit;
            if($manager->updatePhoto($_POST['id'], $_POST['imageAnn'], $_POST['idAnnonce'])){
                echo '1';
                exit;

            }else{
                echo '0';
                exit;
            }

        }
        
        public function ActivateChecked($ids){
            $managerAnnonce    = $this->managers->getManagerOf('Annonce');
            $managerConf = $this->managers->getManagerOf('Configurations');
            $dataObjts   = $managerConf->getConfigurations();
            $managerMail = $this->managers->getManagerOf('ConfigSMTP');
            $configMail = $managerMail->findById2("id", 1);

            $parametresmail = array();
            $variable = array();
        
            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
            
            foreach ($ids as $value):
                $infosAnno          = $managerAnnonce->findById(intval($value));
                $out['id']          = $value;
                $out['is_actived']  = 1;

                $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                $parametresmail["address"]       = $infosAnno->getEmail();
                $parametresmail["Nomaddress"]    = "Annonceur";

                $variable["annonce_id"]          = $value;
                $variable["annonce_title"]       = $infosAnno->getDesignation();
                $variable["annonce_price"]       = $infosAnno->getPrixTotal();
                $variable["annonce_type"]        = 'Annonce Classique';
                $variable["annonce_facturation"] = 'Par '.ucfirst($infosAnno->getTypeFacturation());
                $variable["annonce_resume"]      = $infosAnno->getTexte();

                $parametresmail["subjet"]        = "Activation de l'annonce";                

                $infosAnnonces = $managerAnnonce->findById($value);
                //var_dump($infosAnnonces);
                $dureeAnnonce = $infosAnnonces->getDureeAnnonce();
                $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();

                $temps = 0;
                if($UniteTempsAnnonce === "Minute")
                    $temps = time() + $dureeAnnonce*60;

                if($UniteTempsAnnonce === "Heure")
                    $temps = time() + $dureeAnnonce*3600;

                if($UniteTempsAnnonce === "Jour")
                    $temps = time() + $dureeAnnonce*3600*24;

                if($UniteTempsAnnonce === "Semaine")
                    $temps = time() + $dureeAnnonce*3600*24*7;

                if($UniteTempsAnnonce === "Mois")
                    $temps = time() + $dureeAnnonce*3600*24*31;

                if($UniteTempsAnnonce === "Annee")
                    $temps = time() + $dureeAnnonce*3600*24*365;

                if($infosAnnonces->getDateDebut() === "0000-00-00 00:00:00"){
                    $out['dateDebut']  = date("Y-m-d H:i:s");
                    $out['dateexp']  = date("Y-m-d H:i:s", $temps);
                }

                if($managerAnnonce->update($out,'id'))
                    $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
                
            endforeach;
        }
        
        public function DesactivateChecked($ids){
            $managerAnnonce    = $this->managers->getManagerOf('Annonce');
            $managerMail = $this->managers->getManagerOf('ConfigSMTP');
            $configMail = $managerMail->findById2("id", 1);

            $parametresmail = array();
            $variable = array();
        
            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["site_url"]    = _BASE_URI_;
            foreach ($ids as $value):
                $infosAnno          = $managerAnnonce->findById(intval($value));

                $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
                $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
                $parametresmail["address"]       = $infosAnno->getEmail();
                $parametresmail["Nomaddress"]    = "Annonceur";

                $parametresmail["subjet"]        = "Desactivation de l'annonce";

                $variable["annonce_id"]          = $value;
                $variable["annonce_title"]       = $infosAnno->getDesignation();
                $variable["annonce_price"]       = $infosAnno->getPrixTotal();
                $variable["annonce_type"]        = 'Annonce Classique';
                $variable["annonce_facturation"] = 'Par '.ucfirst($infosAnno->getTypeFacturation());
                $variable["annonce_resume"]      = $infosAnno->getTexte();

                $out['id']         = $value;
                $out['is_actived'] = 0;

                if($managerAnnonce->update($out,'id'))
                    $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonce.html');
               
            endforeach;
        }
        
        public function executeResults(HttpRequest $request) {
           
			$nbAbus = array();
            $out = array();
            $Manager      = $this->managers->getManagerOf('Annonce');
			$ManagerAbus  = $this->managers->getManagerOf('GestionAbus');
            $managerOrder = $this->managers->getManagerOf('PaiementAPI');
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $result = $Manager->deleteChecked($_POST['eltcheck']);
                        }
                        $listAnnonces = $Manager->findAll2('id');
                        $this->app()->cache()->clearCache();
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $result = $this->ActivateChecked($_POST['eltcheck']);
                            $result = $managerOrder->ActiveChecked($_POST['eltcheck'],'idAnnonce','paiementEff');
                        }
                        $listAnnonces = $Manager->findAll2('id');
                        $this->app()->cache()->clearCache();
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $result = $this->DesactivateChecked($_POST['eltcheck']);
                        }
                        $listAnnonces = $Manager->findAll2('id');
                        $this->app()->cache()->clearCache();
                        break;

                    default:
                        break;
                }
            }
            if($request->getValue('searchzone') != "" && $request->getValue('searchzone') != "recherche" ){
                $out[] = 'id';
                $out[] = 'designation';
                $listAnnonces = $Manager->searchCriteria($out, $request->getValue('searchzone'));
            }else{
                $listAnnonces = $Manager->findAll2('id');
            }
            
			foreach($listAnnonces as $value)
				$nbAbus[$value->getId()] = $ManagerAbus->getNumberAbusByAnnonce($value->getId());
			

            $this->page->addVar('datalist', $listAnnonces); 
			$this->page->addVar('abus', $nbAbus); 
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeSubCategorie(HttpRequest $request){
            $datalist = $this->getArbreSubCategories($_POST['idCad']);

            $txt = '';
            foreach($datalist as $data){
                $txt .= ' <option value="'.$data->getIdFils().'" >'.$data->getLibelle().'</option>**';  
            }
            echo $txt;
            exit;          
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