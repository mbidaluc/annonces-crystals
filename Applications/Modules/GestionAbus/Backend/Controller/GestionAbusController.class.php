<?php
    /**
    * Description of GestionAbusController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\GestionAbus\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\GestionAbus\Form\GestionAbusForm;
    use Library\Tools;

    class GestionAbusController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "GestionAbus";
        
        private function leftcolumn(){
            $out = array();
            $out['priorite.html']            = 'Gérer les priorités';
            $out['bgmanager.html']           = 'Gérer les pages';
            $out['position.html']            = 'Gérer les positions';
            $out['coutimage.html']           = 'Gérer les coûts d\'images';
            $out['trancheshoraires.html']    = 'Tranches Horaires';
            $out['listpartenaire.html']      = 'Partenaires';
            $out['abus.html']                = 'Abus';
            $out['emailconfig.html']         = 'e-mail config';
            $out['compteurvisite.html']      = 'Compteur de Visite';

            return $this->page->addVar('left_content', $out);

        }
        public function executeListAbus(HttpRequest $request){
            $this->leftcolumn();
            $manageAbus = $this->managers->getManagerOf('GestionAbus');
            $listAbus = $manageAbus->findByName('id', intval($request->getValue('id')));
            $this->page->addVar('dataList', $listAbus); 
            $this->page->addVar('pagination', $this->pagination);
        }
        
        public function executeGestionAbus(HttpRequest $request){
            //$this->leftcolumn();
            $list = array();
            $cat = array();
            $dataArray = array();
            $manageAbus = $this->managers->getManagerOf('GestionAbus');
            $cat['0']  = 'Selectionnez une catégorie';
            $list['0'] = 'Selectionnez une Annonce';
            
            $categories             = $this->getArbreCategories();
            
            foreach($categories as $data){
                $decalage ='';
                $decalage = str_pad($decalage, $data->getLength(), '>');  
                $cat[$data->getIdFils()] = $decalage.$data->getLibelle();
            }
            
            $listAbus = $manageAbus->findAll2('id');
            
            $dataForm = GestionAbusForm::getFormList($dataArray, $cat, $list );
            
            $this->page->addVar('dataForm', $dataForm);
            $this->page->addVar('dataList', $listAbus);
        }
        
        function executeListAnnonce(HttpRequest $request){
            //$this->leftcolumn();
            $ManagerTypeAnnonces    = $this->managers->getManagerOf('Annonce');
            $typeannonces = $ManagerTypeAnnonces->findByName('idCategorie',$_POST['idCategorie']);
            $txt = '<option value="0"> Selectionner une annonce </option>';
            foreach($typeannonces as $data){
                $txt .= '<option value="'.$data->getId().'">'.$data->getDesignation().'</option>**';
            }
            echo $txt;
            exit();

        }
        
        protected function init(){
            $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/B'.$this->name.'.js'] = 'screen';        
                       
            parent::init();
        }
    }
?>