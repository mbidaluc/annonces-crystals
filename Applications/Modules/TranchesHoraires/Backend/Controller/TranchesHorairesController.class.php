<?php
    /**
    * Description of TranchesHorairesController
    *
    * @author MBIDA Luc Alfred
    *
    */

    namespace Applications\Modules\TranchesHoraires\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\TranchesHoraires\Form\TranchesHorairesForm;
    use Library\Tools;

    class TranchesHorairesController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "TranchesHoraires";
        
        private function leftcolumn(){
            $out = array();
            $out['priorite.html']         = 'Gérer les priorités';
            $out['bgmanager.html']        = 'Gérer les pages';
            $out['position.html']         = 'Gérer les positions';
            $out['coutimage.html']        = 'Gérer les coûts d\'images';
            $out['trancheshoraires.html'] = 'Tranches Horaires';

            return $this->page->addVar('left_content', $out);

        }
        
        public function executeTranchesHoraires(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Tarifs tranches horaires');        
            $manager   = $this->managers->getManagerOf('TranchesHoraires'); 
            $dataList  = $manager->findAll2();
            $informations = array();
            if($request->getMethod('post')){
                
                foreach($_POST['idTranche'] as $value) {
                    
                    $informations['idTanche'] = $value;
                    $informations['prix'] = $_POST['prix'.$value];
                    $informations['libelle'] = $_POST['libelle'.$value];
                    
                    if($manager->update($informations,'idTanche')){
                        $this->page->addVar('infos', _RECCORD_UPDATE_SUCCEFULL_);
                        //$this->app()->httpResponse()->redirect('trancheshoraires.html');
                    }else{
                        $this->errors = _RECCORD_UPDATE_FILED_;
                    }
                    
                }
                $this->app()->httpResponse()->redirect('trancheshoraires.html');
                
            }
            
            
            $this->page->addVar('datalist', $dataList);
            $this->page->addVar('pagination', $this->pagination);
        }
    }
?>