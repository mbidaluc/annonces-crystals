<?php
    /**
     * Description of CompteurVisitesController
     *
     * @author Luc Alfred MBIDA
     *
     */

    namespace Applications\Modules\CompteurVisites\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\CompteurVisites\Form\CompteurVisitesForm;
    use Library\Tools;

    class CompteurVisitesController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "CompteurVisites"; 
        
        private function leftcolumn(){
           $out = array();
           $out['priorite.html']            = 'Gérer les priorités';
           $out['bgmanager.html']           = 'Gérer les pages';
           $out['position.html']            = 'Gérer les positions';
           $out['coutimage.html']           = 'Gérer les coûts d\'images';
           $out['admintrancheshoraires.html']    = 'Tranches Horaires';
           $out['listpartenaire.html']      = 'Partenaires';
           $out['abus.html']                = 'Abus';
           $out['emailconfig.html']         = 'e-mail config';
           $out['compteurvisite.html']      = 'Compteur de Visite';

           return $this->page->addVar('left_content', $out);

       }
            
        public function executeCompteurVisites(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Compteur de visite');

            $manager = $this->managers->getManagerOf('Configurations');

            $dataArray = array();

            $dataObjt = $manager->getConfigurations();
            $dataArray['cptNbDigit']             = $dataObjt[0]->getCptNbDigit();
            $dataArray['cptBeginDigit']          = $dataObjt[0]->getCptBeginDigit();
            
            if($request->getMethod('post')){            
                $_POST['idParam'] = 1;
                //var_dump($_POST);
                if($manager->update($_POST,'idParam')){
                    $this->infos = 'les mises à jours ont été effectuées!';
                }else{
                    $this->errors = 'Echec lors de la mise à jour';
                }
                $dataArray = $_POST;

            }
            $this->page->addVar('infos', $this->infos);
            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', CompteurVisitesForm::getForm($dataArray));
        }
    }
?>