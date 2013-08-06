<?php
    /**
     * Description of CompteurVisitesForm
     *
     * @author Luc Alfred MBIDA
     *
     */

    namespace Applications\Modules\CompteurVisites\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class CompteurVisitesForm extends Form{
        // Inserer votre code ici!
         public static function getForm($dataArray = array()){
             $dataForm = new Form('cptvisit');

             $dataForm->add('Select', 'cptNbDigit')
                   ->label('nombre de chiffres du compteur')
                   ->choices(Array(
                            5=>'00005',
                            6=>'000006',
                            7=>'0000007',
                            8=>'00000008',
                            9=>'000000009')
                         )
                  ->required(true);

             $dataForm->add('Text', 'cptBeginDigit')
                  ->label('Votre compteur commence à')
                  ->required(FALSE);


            $dataForm->add('Submit', 'submit')->value('Mettre à jour');

            $dataForm->bound($dataArray);

            return $dataForm;
        }
    }
?>