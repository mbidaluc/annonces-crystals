<?php
    /**
    * Description of PackCreditsForm
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\PackCredits\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class PackCreditsForm extends Form{
        // Inserer votre code ici!
        public static function getForm($dataArray = array(), $edit=false){
            $dataForm = new Form('packsform');

            $dataForm->add('text', 'libelle')
                        ->label('Libelle ')
                        ->required(true);

            $dataForm->add('text', 'credit')
                        ->label('Crédits ')
                        ->required(true);

            $dataForm->add('text', 'prix')
                        ->label('Prix ')
                        ->required(true);
            
            $dataForm->add('file', 'imageFile')
                        ->label('Image ')
                        ->required(false);

            if($edit){

                $dataForm->add('Hidden', 'id')->value($dataArray['id']);  
                $dataForm->add('Hidden', 'image')->value($dataArray['image']);
                $dataForm->add('Submit', 'submit')->value('Modifier');
            }else{

                $dataForm->add('Submit', 'submit')->value('Ajouter');
            }

            $dataForm->bound($dataArray);

            return $dataForm;
        }
    }
?>