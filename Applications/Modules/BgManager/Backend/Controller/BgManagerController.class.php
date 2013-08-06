<?php

/**
 * Description of BgManagerController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\BgManager\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Library\BackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;
use Applications\Modules\BgManager\Form\BgManagerForm;

class BgManagerController extends BackController{

    private function leftcolumn(){
        $out = array();
        $out['bgmanager.html']           = 'Liste des Pages';
        $out['bgmanager-editpage.html']  = 'Ajouter une Page';
        $out['bgmanager-editbg.html']    = 'Définir un background';

        return $this->page->addVar('left_content', $out);

    }

    private function rightcolumn(){
        $out ='Gérez Les arrières plan de vos pages.';
        return $this->page->addVar('right_content', $out);
    }

    /**
     * listing des Pages
     */
    public function executeBgmanager(){
        $this->leftcolumn();
        $this->rightcolumn();

        $this->page->addVar('title', 'Listing des Pages');

        $manager = $this->managers->getManagerOf('BgManager');

        $datalist = $manager->findAll2('id');

        $this->page->addVar('datalist', $datalist);
        $this->page->addVar('pagination', $this->pagination);
    }

    public function executeCreate(HttpRequest $request){
        // On ajoute une définition pour le titre
        $this->page->addVar('title', 'Définir un  Background');
        $dataArray = array();
        $edit = false;
        $this->leftcolumn();
        $this->rightcolumn();

        $manager = $this->managers->getManagerOf('BgManager');
        
        if($request->getExists('id')){            
            $edit = true;
            $dataObjt = $manager->findById(intval($request->getData('id')));
            $dataArray['id']                = $dataObjt->getId();
            $dataArray['titre']             = $dataObjt->getTitre();
            $dataArray['prix']              = $dataObjt->getPrix();
            $dataArray['identifiant']       = $dataObjt->getIdentifiant();
            $dataArray['bgImage']           = $dataObjt->getBgImage();
            $dataArray['bgImageBody']       = $dataObjt->getBgImageBody();
            $dataArray['repeatX']           = $dataObjt->getRepeatX();
            $dataArray['repeatY']           = $dataObjt->getRepeatY();
            $dataArray['actived']           = $dataObjt->getActived();
            $dataArray['contenu']           = $dataObjt->getContenu();
            $dataArray['metatitle']         = $dataObjt->getMetatitle();
            $dataArray['metadescription']   = $dataObjt->getMetadescription();
            $dataArray['metakeyword']       = $dataObjt->getMetakeyword();
			$dataArray['showfooteradv']     = $dataObjt->getShowfooteradv();            
            
            $this->page->addVar('title', 'Modifier la page');
            $this->page->addVar('idelt', $request->getData('id'));
        }else{
            $dataArray = $_POST;
        }
        $dataForm = BgManagerForm::getForm($dataArray,$edit);  
        if($request->getMethod('post')){
          
			$filedata = Tools::addFile('bgImageFile', _SITE_UPLOAD_DIR_.'BgManager/', false, 'bgImage');
            $fileda = Tools::addFile('bgBodyFile', _SITE_UPLOAD_DIR_.'BgManager/', false, 'bgImageBody');
			// vérification de la nature de la donnée renvoyé. tableau = erreurs
			if(is_array($filedata))
				$_POST['bgImage'] = '';
			else
				$_POST['bgImage'] = $filedata; 
            
            if(is_array($fileda))
				$_POST['bgImageBody'] = '';
			else
				$_POST['bgImageBody'] = $fileda; 
            
			if(!$request->getExists('id')){
				if($manager->add($request->getSendData($_POST))){
					$this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);
					$this->app()->httpResponse()->redirect('bgmanager.html');
				}else{
					$this->errors = _RECCORD_SAVE_FILED_;
				}
			}else{
				if($manager->update($_POST,'id')){
					$this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
					$this->app()->httpResponse()->redirect('bgmanager.html');
				}else{
					$this->errors = _RECCORD_UPDATE_FILED_;
				}
			}
        }

        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', $dataForm);
    }

    public function executeDefinebg(HttpRequest $request){
        // On ajoute une définition pour le titre
        $this->page->addVar('title', 'Définir un  Background');

        $this->leftcolumn();
        $this->rightcolumn();
        $dataArray = array();
        $manager = $this->managers->getManagerOf('BgManager');        

        $tab['nill'] = 'Selectionner une page';
        
        $infolist = $manager->findAll2('id');
        
        foreach($infolist as $data):
            $tab[$data->getId()] = $data->getTitre();
        endforeach;        
        
        if($request->getMethod('post')){
            $dataForm = BgManagerForm::getDefinedBgForm($_POST,$tab);
            if ($dataForm->is_valid($_POST)) {
                $filedata = Tools::addFile('bgImageFile', _SITE_UPLOAD_DIR_.'BgManager/', false, 'bgImage');
                // vérification de la nature de la donnée renvoyé. tableau = erreurs
                if(is_array($filedata))
                    $_POST['bgImage'] = '';
                else
                    $_POST['bgImage'] = $filedata;
                if(!$request->getExists('id')){
                    if($manager->updateBgPage($_POST)){
                        $this->infos = 'données mise à jour';
                        $this->app()->httpResponse()->redirect('bgmanager.html');
                    }else{
                        $this->errors = 'Echec lors de la mise à jour';
                    }
                }
            }else{
               // die('ici');
                $dataArray = $_POST;
            }
        }
        $this->page->addVar('infos', $this->infos);
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', BgManagerForm::getDefinedBgForm($dataArray,$tab));
    }

    public function executeDelete(HttpRequest $request){

        $manager = $this->managers->getManagerOf('BgManager');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->delete($out)){
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('bgmanager.html');

        }
    }
    
    public function executeDeleteBg(HttpRequest $request){

        $manager = $this->managers->getManagerOf('BgManager');
        $dataObjt = $manager->findById(intval($request->getData('id')));
        /*echo _UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage()));
        exit;*/
        if($request->getExists('id')){
			if( file_exists( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())))){
				if(unlink( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())) )){
					$out['id']      = $request->getData('id');
					$out['bgImage'] = "";
	
					if($manager->update($out, 'id')){
						$this->infos = 'données mise à jour';
						$this->app()->httpResponse()->redirect('bgmanager.html');
					}else{
						$this->errors = 'Echec lors de la mise à jour';
						$this->app()->httpResponse()->redirect('bgmanager.html');
					}
				}else{
					$this->errors = 'Echec lors de la mise à jour';
					$this->app()->httpResponse()->redirect('bgmanager.html');
				}
			}else{
				$this->errors = 'Le fichier image correspondant n\'existe pas';
				$this->app()->httpResponse()->redirect('bgmanager.html');
			}
            
        }
    }
    
    public function executeDeleteBgBody(HttpRequest $request){

        $manager = $this->managers->getManagerOf('BgManager');
        $dataObjt = $manager->findById(intval($request->getData('id')));
        /*echo _UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage()));
        exit;*/
        if($request->getExists('id')){
			if( file_exists( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())))){
				if(unlink( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())) )){
					$out['id']      = $request->getData('id');
					$out['bgImageBody'] = "";
	
					if($manager->update($out, 'id')){
						$this->infos = 'données mise à jour';
						$this->app()->httpResponse()->redirect('bgmanager.html');
					}else{
						$this->errors = 'Echec lors de la mise à jour';
						$this->app()->httpResponse()->redirect('bgmanager.html');
					}
				}else{
					$this->errors = 'Echec lors de la mise à jour';
					$this->app()->httpResponse()->redirect('bgmanager.html');
				}
			}else{
				$this->errors = 'Le fichier image correspondant n\'existe pas';
				$this->app()->httpResponse()->redirect('bgmanager.html');
			}
            
        }
    }
    
    public function executeResults(HttpRequest $request) {
            $out = array();
            $manager = $this->managers->getManagerOf('BgManager');             
            if($request->getValue('actionselect')!=""){
                switch ($request->getValue('actionselect')) {

                    case 'delete':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->deleteChecked($_POST['eltcheck']);
                        }
                        $data = $manager->findAll2('id');
                        break;

                     case 'active':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->ActiveChecked($_POST['eltcheck'],'id','actived');
                        }
                        $data = $manager->findAll2('id');
                        break;
                     case 'unactive':
                        if(isset($_POST['eltcheck'])){
                            $result = $manager->UnActiveChecked($_POST['eltcheck'],'id','actived');
                        }
                        $data = $manager->findAll2('id');
                        break;

                    case 'deletebg':
                        if(isset($_POST['eltcheck'])){
                            $result = $this->DeleteBgChecked($_POST['eltcheck']);
                        }
                        $data = $manager->findAll2('id');
                        break;
                        
                    case 'deletebgbody':
                        if(isset($_POST['eltcheck'])){
                            $result = $this->DeleteBgChecked($_POST['eltcheck'],'bgImageBody');
                        }
                        $data = $manager->findAll2('id');
                        break;

                        
                    default:
                        break;
                }
            }
            
          
            if($request->getValue('searchzone') != "" && $request->getValue('searchzone') != "recherche" ){
                $out[] = 'titre';
                $out[] = 'identifiant';
                $data = $manager->searchCriteria($out, $request->getValue('searchzone'));
            }else{
                $data = $manager->findAll2('id');
            }
            

            $this->page->addVar('datalist', $data); 
            $this->page->addVar('pagination', $this->pagination);
    }
    
    public function DeleteBgChecked($ids,$bdtype='bgImage'){

        $manager = $this->managers->getManagerOf('BgManager');
        
        
        foreach ($ids as $value) {
            $dataObjt = $manager->findById(intval($value));
       
            if($bdtype == 'bgImage'){
                if( file_exists( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())))){
                    if(unlink( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImage())) )){
                        $out['id']      = $request->getData('id');
                        $out[$bdtype] = "";

                        $upd = $manager->update($out, 'id');
                    }
                }
            }elseif($bdtype == 'bgImageBody'){
                if( file_exists( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImageBody())))){
                    if(unlink( _SITE_UPLOAD_DIR_.'BgManager/'.array_shift(explode(';',$dataObjt->getBgImageBody())) )){
                        $out['id']      = $request->getData('id');
                        $out[$bdtype] = "";

                        $upd = $manager->update($out, 'id');
                    }
                }
            }
		
         }   
        
    }
	
}

?>
