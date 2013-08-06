<?php
/**
* Description of AnnonceController
*
* @author mbida luc
*
*/

namespace Applications\Modules\Annonce\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Tools;
use Applications\Modules\Annonce\Form\AnnonceForm;

class AnnonceController extends HelperBackController
{
    protected $name = "Annonce";
    
    function executePositions(HttpRequest $request){
        $ManagerTypeAnnonces    = $this->managers->getManagerOf('Hook');
        $typeannonces = $ManagerTypeAnnonces->findByName('type',$_POST['type']);
        $txt = '<option value="0*0"> Par defaut (0 FCFA) </option>';
        foreach($typeannonces as $data){
            if($data->getTechnicalName() !="urgence")
            	$txt .= '<option value="'.$data->getId().'*'.$data->getPrice().'">'.$data->getName()." (".$data->getPrice()." FCFA)".'</option>**';
        }
        echo $txt;
        exit();
            
    }
    
    function executeMesannonces(HttpRequest $request){
        parent::getInfosPage('mes_annonces');
        $Manager      = $this->managers->getManagerOf('Annonce');
        $managerPhoto = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerCats  = $this->managers->getManagerOf('Categories');
		
        $paged        =$request->getValue('paged')?intval($request->getValue('paged')):1;
        
        $listAnnonces = $Manager->findById2('idUder',$_SESSION['user']['id'],$paged,3);
        $images       = array(); 
        $category     = array();
		$countelt     = count($Manager->findById2('idUder',$_SESSION['user']['id']));
       
        
        if(!empty($listAnnonces)){
            foreach ($listAnnonces as $infor) {
                    $photo   = $managerPhoto->getPrincipaleImage($infor->getId());
                    $category[$infor->getId()] = $managerCats->findById2("idFils",$infor->getIdCategorie());
                    if(!empty($photo))
                        $images[$infor->getId()] = $photo[0]->getUrl();	
            }
        }
	
        $this->page->addVar('datalist', $listAnnonces);  
        $this->page->addVar('images',$images);
        $this->page->addVar('categories',$category);
        $this->page->addVar('countAnnone',$countelt);
        parent::pagination('Annonce',$countelt,$paged,3);
    }
    
    function executeFileupload(HttpRequest $request){    
        $filedata = Tools::addFile('files', _SITE_UPLOAD_TMP_DIR_);
        //echo _SITE_UPLOAD_TMP_DIR_;
        echo _UPLOAD_DIR_.'tmp/'.$filedata.'**'.$filedata;
        exit();
        
    }
        
    function executeCreateannonce(HttpRequest $request){
      
        parent::getInfosPage('annonce');
        $this->page->addVar('title','Publier une annonce');
        $this->addJS(_WEB_JS_DIR_.'jquery.slimscroll.js');
        
        $prio = array();
        $cat  = array('NULL' => 'Sélectionner une Catégorie');
        $type = array();
        $dureeAnnonce = array();
        $popupcga   = $this->getInfosPagepopup('cga');
        
        $type['NULL'] = "Type d'annonce"; 
        $prio['0*0']  = 'Par defaut ( 0 FCFA)';  
        $edit = false;        
        $infos = array();
        $manage                 = $this->managers->getManagerOf('Categories');
        $manager                = $this->managers->getManagerOf('Annonce');
        $categories             = $manage->getListeParent(1);
        $ManagerPriorites       = $this->managers->getManagerOf('Priorite');
        $ManagerTypeAnnonces    = $this->managers->getManagerOf('Hook');    
        
        $managerConf = $this->managers->getManagerOf('Configurations');
        $managerPage           = $this->managers->getManagerOf('BgManager');
            
        $pagecga = $managerPage->findByName('identifiant','cga');
        $dataObjts   = $managerConf->getConfigurations();

        
        $priorites = $ManagerPriorites->getListePriorite();
        foreach($priorites as $data)
            $prio[$data->getId().'*'.$data->getPrix()] = $data->getLibelle()." (".$data->getPrix()." FCFA)";
        
        $type['pub'] = 'Bannières publicitaires';
        $type['annonce'] = 'Annonces';

        foreach($categories as $data){
            $decalage ='';
            $decalage = str_pad($decalage, $data->getLength(), '>');  
            $cat[$data->getIdFils()] = $decalage.$data->getLibelle();
        }

        if($request->getExists('id')){
            $edit =true;
            $dataObjt = $manager->findByName('id',intval($request->getData('id')));
            $dataArray = $dataObjt->tabAttrib;
            $this->page->addVar('title', 'Modifier l\'annonce');
        }else{
            $dataArray = $_POST;
        }
        $dataForm = AnnonceForm::getForm($dataArray, $cat, $type, $prio, $dataObjts[0]->getCoutDuree(), $edit);
        if($request->getMethod('post')){
            unset($_SESSION['Annonce']);         
            $this->initializeSession($request->getSendData($_POST));
			//var_dump($_SESSION['Annonce']);
            $_SESSION['referer'] = 'modepaiementfront.html';
            
            if(($_SESSION['Annonce']['typeFacturation'] == "NULL"))
                $_SESSION['Annonce']['typeFacturation'] = "affichage";
           
            $this->app()->httpResponse()->redirect('listpartenaires.html');
                                
        }
        
        if($popupcga != 'null')
                $this->page->addVar('popupcga',$popupcga);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm);
        $this->page->addVar('cgapage', $pagecga[0]);
        
        
        $this->page->addVar('dataConfig', $dataObjts);
       
    }
    
    function executeAuthorListAnnonces(HttpRequest $request){
        parent::getInfosPage('author_annonce');
        $data           = array();
        $images         = array(); 
		$category        = array();
        $i = 0;
	
        $managerAn = $this->managers->getManagerOf('Annonce');
        $managerCat = $this->managers->getManagerOf('Categories');
        $managerPhoto = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        
        
        $categories = $managerCat->findAll2();
        $ListAnnonces = $managerAn->getAnnonceByIdUser(intval($request->getData('id')));
        $data      = $ListAnnonces;
        
            
        foreach ($ListAnnonces as $infor) {
            $photo             = $managerPhoto->getPrincipaleImage($infor->getId()); 
            if(!empty($photo))
            	$images[$infor->getId()] = $photo[0]->getUrl();
            $i++;
        }
		
        foreach ($categories as $cat)
            $category[$cat->getIdFils()] = $cat;
		
        
        $this->page->addVar('dataList',$data);
        $this->page->addVar('images',$images);
        $this->page->addVar('categories',$category);
        
        
    }
    function executeShow(HttpRequest $request){
        
        $this->addJS(_WEB_JS_DIR_.'jquery.fancybox-1.3.4.js');
        $this->addJS(_WEB_JS_DIR_.'jquery.serialScroll-1.2.2-min.js');
        $this->addJS(_THEME_JS_MOD_DIR_.$this->name.'/libModAnnonce.js');
        $this->addJS(_THEME_JS_MOD_DIR_.'Tchat/Tchat.js');
        $this->addJS(_WEB_JS_DIR_.'scrollto.js');
        //$this->addJS(_WEB_JS_DIR_.'jquery.slimscroll.js');
        
        parent::getInfosPage('detail_annonce');
        
        $popuprepann     = $this->getInfosPagepopup('rep_ann');
        $popupenvamie    = $this->getInfosPagepopup('env_ann_amie');
        $popupabus       = $this->getInfosPagepopup('abus');
        
        $data            = array();
        $i = 0;
        $managerCat = $this->managers->getManagerOf('Categories');
        $managerAn = $this->managers->getManagerOf('Annonce');
        $managerPhoto = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        if($request->getExists('link_rewrite')){
            $category = $managerCat->findByName('link_rewrite',$request->getValue('link_rewrite_cat'));
            $annonce = $managerAn->findByName('link_rewrite',$request->getValue('link_rewrite'));
            $dataList = $managerAn->getAnnonceByCategory($category[0]->getIdFils());
            if((is_array($annonce) && sizeof($annonce)) &&(is_array($category) && sizeof($category))){
                $annonce = $annonce[0];
                $category = $category[0];
                $listPhotos  = $managerPhoto->findById2('idAnnonce', $annonce->getId());
				
				$this->executeUpdateClick($annonce->getId());
				
                foreach ($listPhotos as $photo) {
                    if($photo->getType()=='principale')
                        $annonce->defaultImage = $photo->getUrl();
                }
                //selection des sous catégories de la catégory en cours
                
                $subCat = $managerCat->getListeFilsByIdParent($category->getIdFils());
                if($category->getIdParent()){
                    $objParent = $managerCat->findById2('idFils',$category->getIdParent());
                    $countAnnonceByCategory[$category->getIdParent()] = $category->getIdParent();
                    $subCat = $managerCat->getListeFilsByIdParent($category->getIdParent());
                }else{
                    $countAnnonceByCategory[$category->getIdFils()] = $category->getIdFils();
                }
                
                 if(is_array($subCat) && count($subCat))
                    foreach ($subCat as $value)
                        $countAnnonceByCategory[$value->idFils] = intval($value->idFils);
                $count_annonce = parent::countAnnonceByCategories($managerAn->getAnnonceByCategories($countAnnonceByCategory));
               
                 foreach ($count_annonce as $value) 
                    $total_annonces += $value;
                 
                $this->page->addVar('category', $category);
                if($category->getIdParent())
                    $this->page->addVar('category_parent',$objParent[0]);
                else
                    $this->page->addVar('category_parent',$category);
                $this->page->addVar('subCat', $subCat);
                $this->page->addVar('countAnnonceSubCat',$count_annonce);
                $this->page->addVar('listedesannonces',$dataList);
                $this->page->addVar('total',$total_annonces);
                //fin gestion catégorie et sous catégories
                //
                // gestion de l'annonce
                $this->page->addVar('annonce', $annonce);
                $this->page->addVar('listPhotos', $listPhotos);
                $this->page->addVar('title_p',$annonce->getDesignation());
                $this->page->addVar('id',$annonce->getId());
                $this->page->addVar('idUserAnnonceur',$annonce->getIdUder());
                //fin gestion de l'annonce
                //
                //gestion des annonces du même auteur
                $nbAnn = $managerAn->getNumberAnnonceByIdUser($annonce->getIdUder());
                if($nbAnn >= 5){
                    $ListAnnonces      = $managerAn->getAnnonceByIdUser($annonce->getIdUder(),5);
                    $data['data']      = $ListAnnonces;
                    $data['title']     = true;
                }else{
                    $data['title']     = false;
                    $ListAnnonces      = $managerAn->getAnnonceByCategory($annonce->getIdCategorie(),1,5);
                    $data['data']      = $ListAnnonces;
                }
                foreach ($ListAnnonces as $infor) {
                    $photo             = $managerPhoto->getPrincipaleImage($infor->getId()); 
					if(!empty($photo))
                    	$data['image'][$infor->getId()] = $photo[0]->getUrl();
                }
                
                $this->page->addVar('otherAnnonces',$data);
                
                if($popuprepann != 'null')
                    $this->page->addVar('popuprepann',$popuprepann);
                if($popupenvamie != 'null')
                    $this->page->addVar('popupenvamie',$popupenvamie);
                if($popupabus != 'null')
                    $this->page->addVar('popupabus',$popupabus);
                
                
                    
                //fin gestion des annonces du même auteur
            }
            
        }
    }
    protected function init(){
        $this->tabJS[_BASE_URI_.'js/easySlider1.7.js']       = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'jqzoom/jquery.jqzoom-core.js']            = 'screen';
        $this->tabCSS[_WEB_JS_DIR_."jqzoom/css/jquery.jqzoom.css"] = 'screen';
         
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        $this->tabCSS[_THEME_CSS_MOD_DIR_.'Tchat/Tchat.css'] = 'screen';
        
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js'] = 'screen';
        //$this->tabJS[_THEME_JS_MOD_DIR_.'Tchat/Tchat.js'] = 'screen';
        //inclusion des bibliothèques Jquery file upload
        $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js'] = 'screen';
        $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/jquery.iframe-transport.js'] = 'screen';
        $this->tabJS[_BASE_URI_.'js/jQuery-File-Upload-master/js/jquery.fileupload.js']       = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'editor/nicEdit/nicEdit.js']               = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'datapicker/jquery.ui.core.js']            = 'screen';      
        $this->tabCSS[_WEB_CSS_DIR_.'jquery-ui-1.8.16.custom.css']           = 'screen';
        
        $this->tabCSS[_WEB_CSS_DIR_.'themes/base/jquery.ui.all.css']         = 'screen';
        $this->tabJS[_WEB_JS_DIR_.'external/jquery.bgiframe-2.1.2.js']       = 'screen';
        
       
        
         
       
        //############# -- FancyBox dialog -- ###############
        /*$this->tabJS[_BASE_URI_.'js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js']       = 'screen';
        $this->tabCSS[_BASE_URI_.'js/fancybox/source/jquery.fancybox.css?v=2.1.4']       = 'screen';
        $this->tabJS[_BASE_URI_.'js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4']       = 'screen'; */ 
        
        $this->tabCSS[_THEME_CSS_MOD_DIR_.'Utilisateurs/Utilisateurs.css'] = 'screen';
        
        
       $this->tabJS[_BASE_URI_.'js/jquery-simple-tooltip-0.9.1/jquery.simpletooltip.js']       = 'screen';
      
        
        parent::init();
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
		
		if(isset($data["dureeAnnonce"]) &&  ($data["dureeAnnonce"] == "autres"))
			$_SESSION['Annonce']['dureeAnnonce'] = $_SESSION['Annonce']['orther'];
			
		unset($_SESSION['Annonce']['orther']);
		
        $this->app->user()->setAttribute('cart',$cart);        
    }
    
    public function executeDesactivateannonce(HttpRequest $request){
        $managerAnnonce    = $this->managers->getManagerOf('Annonce');

        $out['id']         = $request->getData('id');
        $out['is_actived'] = 0;

        if($managerAnnonce->update($out,'id')){
            $this->app()->httpResponse()->redirect('mesannonces.html');
        }else{
            $this->errors = 'Echec lors de la suppression';
        }
    }
        
    public function executeDelete(HttpRequest $request){

        $manager = $this->managers->getManagerOf('Annonce');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->delete($out)){
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('mesannonces.html');

        }
    }
    
    function executeUpdateClick($idAnnonce){
         $manager = $this->managers->getManagerOf('Annonce');
         $data = array();
         $obj = $manager->findById($idAnnonce);
         $clicks = (int) $obj->getNbCLick();
         $clicks++;
         $data['id'] = $idAnnonce;
         $data['nbClick'] = $clicks;
         
         if($manager->update($data, 'id')){
             if($this->executeUpdateCredits($idAnnonce)){
                 
             }else{
                
            }  
         }   
         
    }
    
    function executeUpdateCredits($idAnnonce){
         $manager = $this->managers->getManagerOf('Annonce');
         $data = array();
         $obj = $manager->findById($idAnnonce);
         
         if($obj->getTypeFacturation() === "click"){
             $managerHook = $this->managers->getManagerOf('Hook');
             $managerUser = $this->managers->getManagerOf('Utilisateurs');
             
             $objUser =  $managerUser->findById($obj->getIdUder());
             $objHook =  $managerHook->findById($obj->getIdPosition());
             
             if($objUser->getNbCredits() && ($objUser->getNbCredits() >= $objHook->getCoutCredit())){
                 $infos = array();
                 $infos['nbCredits'] = (int) $objUser->getNbCredits() - (int) $objHook->getCoutCredit();
                 $_SESSION['user']['credits'] = $infos['nbCredits'];
                 $infos['id']        = $objUser->getId();
				 
                 if($managerUser->update($infos, 'id')){
                     return true;
                 }else{
                      return false;
                 }   
             }else{
                 $data['id'] = $idAnnonce;
                 $data['is_actived'] = 0;
                 
                 if($manager->update($data, 'id'))
                    return true;
                else
                    return false;
             }
             
         }
         
         return true;
    }
   
    function executeEditAnnonce(HttpRequest $request){
		
		 parent::getInfosPage('annonce');
        $this->page->addVar('title','Modifier une Annonce');
        $cat  = array();
        $infos = array();
        
        
        
        $manageCategorie        = $this->managers->getManagerOf('Categories');
        $manageAnnonce          = $this->managers->getManagerOf('Annonce');
        $managerPhoto           = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        
        $categories             = $manageCategorie->getListeParent();
        $lesPhotos              = $managerPhoto->findById2('idAnnonce', intval($request->getData('id')));

        foreach($categories as $data){
            $decalage ='';
            $decalage = str_pad($decalage, $data->getLength(), '>');  
            $cat[$data->getIdFils()] = $decalage.$data->getLibelle();
        }

        if($request->getExists('id')){
            $edit = true;
            
            $dataObjt = $manageAnnonce->findById(intval($request->getData('id')));
			$infos = $manageCategorie->findById2("idFils", $dataObjt->getIdCategorie());
			$dataArray = $dataObjt->tabAttrib;
            $this->page->addVar('title', 'Modifier l\'annonce');
			
			if($infos[0]->getIdParent()){
				$dataArray['idCategorie']    = $infos[0]->getIdParent();
				$dataArray['idSubCategorie'] = $infos[0]->getIdFils();	
			}else{
                $dataArray['idCategorie'] = $dataObjt->getIdCategorie();
            }
			
        }else{
            $dataArray = $_POST;
        }
        $dataForm = AnnonceForm::getFormEdit($dataArray, $cat);
        if($request->getMethod('post')){
           if($manageAnnonce->update($_POST, 'id')){
               $this->app()->httpResponse()->redirect('mesannonces.html');
           }else{
                $this->errors = _RECCORD_SAVE_FILED_;
           }                              
        }
        $this->page->addVar('lesPhotos', $lesPhotos);
        $this->page->addVar('id', intval($request->getData('id')));
        $this->page->addVar('data', $dataObjt);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm); 
         
    }
    
    public function executeDeleteImage(HttpRequest $request){

        $manager = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        //exit;
        if($manager->updatePhoto($_POST['id'], " ", $_POST['idAnnonce'])){
            if(unlink( _SITE_UPLOAD_DIR_.'Annonce/'.$_POST['imageAnn'] )){
                echo '1';
                exit;
            }else{
                echo '0';
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
        //exit;
        if($manager->updatePhoto($_POST['id'], $_POST['imageAnn'], $_POST['idAnnonce'])){
            echo '1';
            exit;
            
        }else{
            echo '0';
            exit;
        }
               
    }    
    function executeRepAnnonce(HttpRequest $request){
        
        $manager = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $manager->findById2("id", 1);
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
        
        $variable["fw_url"]      = $request->getValue('annonceUrl');
        $variable["annonce_msg"] = nl2br($request->getValue('message'));
        
        echo $this->app()->mail()->send($request->getSendData($_POST), $configMail[0],$variable, 'repondreannonce.html');
        exit();
        
    }    
    function executeEnvAnnonceAmi(HttpRequest $request){
        $manager = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $manager->findById2("id", 1);
        $variable = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
        
        $variable["fw_url"]      = $request->getValue('annonceUrl');
        $variable["annonce_msg"] = nl2br($request->getValue('message'));
        
        echo $this->app()->mail()->send($request->getSendData($_POST), $configMail[0],$variable, 'envoyerannonceami.html');
        exit();
    }
    /**
     * List les annonces en fonction d'un user ou toute les annonces si pas de user
     * @param \Library\HttpRequest $request
     */
    public function executeListAnnonces(HttpRequest $request){
		parent::getInfosPage('annonce');
        if(!$this->app->user()->isAuthenticated()){
            $_SESSION['referer'] = 'les-annonces.html';
			$this->app()->httpResponse()->redirect('connexion.html');
        }else{
           $userId =  $this->app->user()->getAttribute('id');
        }
    }
	
	public function executeSubCategorie(HttpRequest $request){
        $datalist = $this->getArbreSubCategories($_POST['idCad']);
        //var_dump($datalist);
        $txt = '';
        foreach($datalist as $data){
            /*$decalage = '';
            $decalage = str_pad($decalage, $data->getLength(), '>');
            $decalage = str_replace('>', '&nbsp;&nbsp;&nbsp;', $decalage);*/
            $txt .= ' <option value="'.$data->getIdFils().'" >'.$data->getLibelle().'</option>**';  
        }
        echo $txt;
        exit;          
    }
    
    public function executeMesAnnoncesExpirees(HttpRequest $request){
        parent::getInfosPage('mes_annonces');
        $Manager      = $this->managers->getManagerOf('Annonce');
        $managerPhoto = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerCats  = $this->managers->getManagerOf('Categories');
		
        $paged        =$request->getValue('paged')?intval($request->getValue('paged')):1;
        
        $listAnnonces = $Manager->findInfosStrictInf('dateexp',  date("Y-m-d H:i:s"),'id','DESC','idUder='.$_SESSION['user']['id'],$paged,3);
        $images       = array(); 
        $category     = array();
		$countelt     = count($Manager->findInfosStrictInf('dateexp',  date("Y-m-d H:i:s"),'id','DESC','idUder='.$_SESSION['user']['id']));
    
        if(!empty($listAnnonces)){
            foreach ($listAnnonces as $infor) {
                    $photo   = $managerPhoto->getPrincipaleImage($infor->getId());
                    $category[$infor->getId()] = $managerCats->findById2("idFils",$infor->getIdCategorie());
                    if(!empty($photo))
                        $images[$infor->getId()] = $photo[0]->getUrl();	
            }
        }
	
        $this->page->addVar('datalist', $listAnnonces);  
        $this->page->addVar('images',$images);
        $this->page->addVar('categories',$category);
        $this->page->addVar('countAnnone',$countelt);
        parent::pagination('Annonce',$countelt,$paged,3);
    }
}
?>