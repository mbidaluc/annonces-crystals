<?php
    /**
     * Description of CategoriesController
     *
     * @author MBIDA LUC
     *
     */

namespace Applications\Modules\Typeannonces\Backend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Library\BackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\Tools;

class TypeannoncesController extends BackController{

    private function leftcolumn(){

    }

    private function rightcolumn(){

    }

        /**
            * listing des priorités
            */
    public function executeTypeannonces(){
        $this->leftcolumn();
        $this->rightcolumn();

        $this->page->addVar('title', 'Listing des Types d\'annonces');

        $manager = $this->managers->getManagerOf('Typeannonces');

        $datalist = $manager->getListeTypeAnnonces();

        $this->page->addVar('datalist', $datalist);
    }

    public function executeTypeannoncescreate(HttpRequest $request){
        // On ajoute une définition pour le titre
        //var_dump($_FILES);
        $this->page->addVar('title', 'Gérer les Types d\'annonces');

        //$this->leftcolumn();
        //$this->rightcolumn();

        $dataForm = new Form('DefBg');

        $manager = $this->managers->getManagerOf('TypeAnnonces');


        $dataForm->add('Text', 'libelle')
                    ->label('libellé')
                    ->required(true);

            $dataForm->add('Text', 'prix')
                    ->label('Prix')
                    ->required(false);

        if($request->getExists('id')){
            $dataArray = array();

            $dataObjt = $manager->getListeTypeAnnoncesById(intval($request->getData('id')));
            $dataArray['libelle']             = $dataObjt[0]->getLibelle();
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
                    if($manager->addTypeAnnonces($_POST)){
                        $this->app()->httpResponse()->redirect('typeannonces.html');
                    }else{
                        $this->errors = 'Echec lors de l\'enregistrement';
                    }
                }else{
                    if($manager->updateTypeAnnonces($_POST)){
                        $this->app()->httpResponse()->redirect('typeannonces.html');
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

        $manager = $this->managers->getManagerOf('TypeAnnonces');
        if($request->getExists('id')){
            $out['id'] = $request->getData('id');
            if($manager->deleteTypeAnnonces($out)){
                $this->errors = 'suppression réussie';
            }else{
                $this->errors = 'Echec lors de la suppression';
            }
            $this->app()->httpResponse()->redirect('typeannonces.html');

        }
    }
}
?>