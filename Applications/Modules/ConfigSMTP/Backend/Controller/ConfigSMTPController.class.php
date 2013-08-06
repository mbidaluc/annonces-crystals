<?php
    /**
     * Description of ConfigSMTPController
     *
     * @author Luc Alfred MBIDA
     *
     */

    namespace Applications\Modules\ConfigSMTP\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\ConfigSMTP\Form\ConfigSMTPForm;
    use Library\Tools;

    class ConfigSMTPController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "ConfigSMTP";
        
        private function leftcolumn(){
        $out = array();
        $out['priorite.html']         = 'Gérer les priorités';
        $out['bgmanager.html']        = 'Gérer les pages';
        $out['position.html']         = 'Gérer les positions';
        $out['coutimage.html']        = 'Gérer les coûts d\'images';
        $out['admintrancheshoraires.html'] = 'Tranches Horaires';
        $out['listpartenaire.html']   = 'Partenaires';
        $out['abus.html']             = 'Abus';
        $out['emailconfig.html']      = 'e-mail config';
        $out['compteurvisite.html']      = 'Compteur de Visite';
     
        return $this->page->addVar('left_content', $out);

    }
    
    public function executeConfigSMTP(HttpRequest $request) {
        
        $this->leftcolumn();
        $this->page->addVar('title', 'Gestion des cout');

        $manager = $this->managers->getManagerOf('ConfigSMTP');

        $dataArray = array();

        $dataObjt = $manager->findById2("id", 1);
        //var_dump($dataObjt[0]->tabAttrib);
        $dataArray  = $dataObjt[0]->tabAttrib;
        

        if($request->getMethod('post')){            
            
            if($manager->update($_POST, 'id')){
                $this->app()->httpResponse()->redirect('emailconfig.html');
            }else{
                $this->errors = 'Echec lors de la mise à jour';
            }
            $dataArray = $_POST;
   
        }
        
        $this->page->addVar('errors', $this->errors);
        $this->page->addVar('dataForm', ConfigSMTPForm::getForm($dataArray));
    
        }
    }
?>