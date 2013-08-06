<?php
    /**
     * Description of CategoriesController
     *
     * @author MBIDA Luc
     *
     */

    namespace Applications\Modules\Priorite\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\BackController;
    use Library\HttpRequest;
    use Library\Classe\Form\Form;
    use Library\Tools;

    class PrioriteController extends BackController{

        private function leftcolumn(){
            $out = array();
            $out['priorite-edit.html']           = 'Nouvelle Priorité';
            $out['priorite.html']                = 'Liste des Priorités';

            return $this->page->addVar('left_content', $out);

        }

        /**
         * listing des priorités
         */
        public function executePriorite(){
            $this->leftcolumn();

            $this->page->addVar('title', 'Listing des Priorités');

            $manager = $this->managers->getManagerOf('Priorite');

            $datalist = $manager->getListePriorite();
            
            $this->page->addVar('datalist', $datalist);
        }

        public function executePrioritecreate(HttpRequest $request){
            // On ajoute une définition pour le titre
            //var_dump($_FILES);
            $this->page->addVar('title', 'Gérer les Priorités');

            //$this->leftcolumn();
            //$this->rightcolumn();

            $dataForm = new Form('DefBg');

            $manager = $this->managers->getManagerOf('Priorite');


            $dataForm->add('Text', 'libelle')
                     ->label('libellé')
                     ->required(true);

             $dataForm->add('Text', 'prix')
                     ->label('Prix')
                     ->required(false);

            if($request->getExists('id')){
                $dataArray = array();

                $dataObjt = $manager->getListePrioriteById(intval($request->getData('id')));
                
                $dataArray['libelle']        = $dataObjt[0]->getLibelle();
                $dataArray['prix']           = $dataObjt[0]->getPrix();
                $dataForm->add('Hidden', 'id')->value($request->getData('id'));

                $this->page->addVar('title', 'Modifier les attributs de cette priorité');

                $dataForm->add('Submit', 'submit')->value('Modifier');

                $dataForm->bound($dataArray);
            }else{
                $dataForm->add('Submit', 'submit')->value('Ajouter');
                $dataForm->bound($_POST);
            }

            if($request->getMethod('post')){

                if ($dataForm->is_valid($_POST)) {
                    if(!$request->getExists('id')){
                        if($manager->addPriorite($_POST)){
                            $this->app()->httpResponse()->redirect('priorite.html');
                        }else{
                            $this->errors = 'Echec lors de l\'enregistrement';
                        }
                    }else{
                        if($manager->updatePriorite($_POST)){
                            $this->app()->httpResponse()->redirect('priorite.html');
                        }else{
                            $this->errors = 'Echec lors de la mise à jour';
                        }
                    }
                }else{
                   // die('ici');
                    $dataForm->bound($_POST);
                }
            }else{
            }

            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);
        }

        public function executeDelete(HttpRequest $request){

            $manager = $this->managers->getManagerOf('Priorite');
            if($request->getExists('id')){
                $out['id'] = $request->getData('id');
                if($manager->deletePriorite($request->getData('id'))){
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                echo $this->errors;
                $this->app()->httpResponse()->redirect('priorite.html');

            }
        }

    }
?>