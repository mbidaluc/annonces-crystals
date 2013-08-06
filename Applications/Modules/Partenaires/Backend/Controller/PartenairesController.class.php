<?php
    /**
    * Description of PartenairesController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\Partenaires\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Partenaires\Form\PartenairesForm;
    use Library\Tools;

    class PartenairesController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Partenaires";
        
        private function leftcolumn(){
        $out = array();
        $out['listpartenaire.html']           = 'Liste des Partenaires';
        $out['partenaire-edit.html']          = 'Ajouter un Partenaire';

        return $this->page->addVar('left_content', $out);

        }

        private function rightcolumn(){
            $out ='Gérez Les Modes depaiement.';
            return $this->page->addVar('right_content', $out);
        }

        /**
        * listing des Modes
        */
        public function executePartenaires(){
            $this->leftcolumn();
            $this->rightcolumn();

            $this->page->addVar('title', 'Listing des Partenaires');

            $manager = $this->managers->getManagerOf('Partenaires');
            //var_dump($manager);
            $datalist = $manager->findAll2('nom ','ASC');

            $this->page->addVar('datalist', $datalist);
            $this->page->addVar('pagination', $this->pagination);
        }

        public function executePartenairescreate(HttpRequest $request){
            // On ajoute une définition pour le titre
            //var_dump($_FILES);
            $this->page->addVar('title', 'Enregistrer un partenaire');
            $dataArray = array();
            $edit = false;
            $this->leftcolumn();
            $this->rightcolumn();

            $manager = $this->managers->getManagerOf('Partenaires');

            if($request->getExists('id')){            
            $edit =true;

                $dataObjt  = $manager->findById(intval($request->getValue('id')));
                $dataArray = $dataObjt->tabAttrib;
                $this->page->addVar('title', 'Modifier un Partenaire');
                $this->page->addVar('id', $request->getData('id'));        
            }else{
                $dataArray = $_POST;
            }
            $dataForm = PartenairesForm::getForm($dataArray,$edit);
                
            if($request->getMethod('post')){
               // var_dump($_POST);
               
                $filedata = Tools::addFile('LogoImageFile', _SITE_UPLOAD_DIR_.'Partenaires/', false,'logo');
                // vérification de la nature de la donnée renvoyé. tableau = erreurs
                if(is_array($filedata))
                    $_POST['logo'] = '';
                else
                    $_POST['logo'] = $filedata;            
                if(!$request->getExists('id')){
                    //$manager->add($_POST);
                    if($manager->add($_POST)){
                        $this->page->addVar('infos', _RECCORD_SAVE_SUCCEFULL_);
                         $this->app()->httpResponse()->redirect('listpartenaire.html');
                    }else{
                        $this->errors = _RECCORD_SAVE_FILED;
                    }
                }else{
                    if($manager->update($_POST,'id')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        $this->app()->httpResponse()->redirect('listpartenaire.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                }
            }
            

            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);
        }
        
        public function executeDelete(HttpRequest $request){

            $manager = $this->managers->getManagerOf('Partenaires');
            if($request->getExists('id')){
                $out['id'] = $request->getData('id');
                if($manager->delete($out)){
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                $this->app()->httpResponse()->redirect('listpartenaire.html');

            }
        }
        
        public function executeListAbonnes(HttpRequest $request){
            $list = array();
            if($request->getExists('id')){
                $manageAbonner = $this->managers->getManagerOf('Members');
                $listAnbonne = $manageAbonner->getAbonnesPartenaires(intval($request->getValue('id')));
                if($request->getMethod('post')){
                    $donnee = array('id'=>'ID','tel'=>'Telephone','mail'=>'Email');
                    $file = realpath(dirname(__FILE__)).'/patenaire.csv';
                    $fp=fopen($file,'w');
                    fputcsv($fp, $donnee,';','"');
                    foreach($listAnbonne as $dataa){
                        $donnee['id'] = $dataa->getId_member();
                        $donnee['tel'] = $dataa->getPhone();
                        $donnee['mail'] = $dataa->getEmail_member();
                        fputcsv($fp,$donnee,';','"');
                    }
                    fclose($fp);
                    header("Content-Type: application/force-download" );
                    header("Content-Length: ".filesize($file));
                    header("Content-Disposition: attachment; filename=".$file);
                    readfile($file);
                    //unlink($file);
                    exit;
                }
                $this->leftcolumn();
                $this->rightcolumn();
                
                $manager = $this->managers->getManagerOf('Partenaires');                
                
                $datalist = $manager->findAll2();
                foreach ($datalist as $value)
                    $list[$value->getId()] = $value->getNom();
                
                $dataObjt  = $manager->findById(intval($request->getValue('id')));
                $dataArray = $dataObjt->tabAttrib;
                //$this->page->addVar('title', 'Modifier un Partenaire');
                //$this->page->addVar('id', $request->getData('id')); 
                $dataForm = PartenairesForm::getFormList($dataArray,$list); 
                
            }                
            $this->page->addVar('datalist', $listAnbonne);
            $this->page->addVar('dataForm', $dataForm);
        }
        
        
        public function executeTabAbonnes(HttpRequest $request){
            $manageAbonner = $this->managers->getManagerOf('Members');
            $listAnbonne = $manageAbonner->getAbonnesPartenaires(intval($request->getValue('id')));
            
            $txt = '<table class="listing" cellpadding="0" cellspacing="0">
            <tr>
                <th class="first" width="17">ID</th>
                <th width="177">téléphone</th>
                <th width="177">Email</th>
            </tr>';
            foreach($listAnbonne as $data):
                   $txt .= '<tr>
                        <td class="first style1">'.$data->getId_member() .'</td>
                        <td>'.$data->getPhone()  .'</td>
                        <td class="first style1">'.$data->getEmail_member().'</td>   
                    </tr>';             

            endforeach;
            $txt .= '</table>';
            echo $txt;
            exit;  
        }
        
        protected function init(){
            $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/B'.$this->name.'.js'] = 'screen';        
                       
            parent::init();
        }

    }
?>