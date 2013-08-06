<?php
    /**
    * Description of GestionAbusForm
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\GestionAbus\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class GestionAbusForm extends Form{
        // Inserer votre code ici!
        
        public static function getFormList($dataArray = array(), $listcat = array(), $listAnnonce = array()){
            $dataForm = new Form('partenaireform');

            $dataForm->add('Select', 'idFils')
                        ->label('Catégorie ')
                        ->choices($listcat)
                        ->required(true);
            
             $dataForm->add('Select', 'id')
                        ->label('Annonce ')
                        ->choices($listAnnonce)
                        ->required(true);
            
            //$dataForm->add('Submit', 'submit')->value('Exporter ces données en fichier CSV');
            $dataForm->closeForm(false);
            $dataForm->bound($dataArray);
            

            return $dataForm;
        }
    }
?>