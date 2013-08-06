<?php
    /**
    * Description of PaiementModController
    *
    * @author Mbida Luc Alfred
    *
    */

    namespace Applications\Modules\PaiementMod\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\PaiementMod\Form\PaiementModForm;
    use Library\Tools;

    class PaiementModController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "PaiementMod";
        
        private function leftcolumn(){
        $out = array();
        $out['listmodepaiement.html']      = 'Liste des modes de paiement';
        $out['modepaiement-edit.html']          = 'Ajouter un mode de paiement';

        return $this->page->addVar('left_content', $out);

        }

        private function rightcolumn(){
            $out ='Gérez Les Modes depaiement.';
            return $this->page->addVar('right_content', $out);
        }

        /**
        * listing des Modes
        */
        public function executePaiementMod(){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Listing des modes de paiement');

            $manager = $this->managers->getManagerOf('PaiementMod');
            //var_dump($manager);
            $datalist = $manager->findAll2('id');

            $this->page->addVar('datalist', $datalist);
            $this->page->addVar('pagination', $this->pagination);
        }

        public function executePaiementModcreate(HttpRequest $request){
            // On ajoute une définition pour le titre
            //var_dump($_FILES);
            $this->page->addVar('title', 'Définir un  mode de paiement');
            $dataArray = array();
            $edit = false;
            $this->leftcolumn();
            $this->rightcolumn();

            $manager = $this->managers->getManagerOf('PaiementMod');

            if($request->getExists('id')){            
            $edit =true;

                $dataObjt  = $manager->findById(intval($request->getValue('id')));
                $dataArray = $dataObjt->tabAttrib;
                $this->page->addVar('title', 'Modifier une position');
                $this->page->addVar('id', $request->getData('id'));        
            }else{
                $dataArray = $_POST;
            }
            $dataForm = PaiementModForm::getForm($dataArray,$edit);
                
            if($request->getMethod('post')){
               // var_dump($_POST);
               
                $filedata = Tools::addFile('LogoImageFile', _SITE_UPLOAD_DIR_.'PaiementMod/', false,'logo');
                // vérification de la nature de la donnée renvoyé. tableau = erreurs
                if(is_array($filedata))
                    $_POST['logo'] = '';
                else
                    $_POST['logo'] = $filedata;            
                if(!$request->getExists('id')){
                    //$manager->add($_POST);
                    if($manager->add($_POST)){
                        $this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);
                         $this->app()->httpResponse()->redirect('listmodepaiement.html');
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED;
                    }
                }else{
                    if($manager->update($_POST,'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('listmodepaiement.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
            

            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);
        }
        
        public function executeDelete(HttpRequest $request){

            $manager = $this->managers->getManagerOf('PaiementMod');
            if($request->getExists('id')){
                $out['id'] = $request->getData('id');
                if($manager->delete($out)){
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                $this->app()->httpResponse()->redirect('listmodepaiement.html');

            }
        }

    }
?>