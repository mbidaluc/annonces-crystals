<?php
    /**
    * Description of PaiementModForm
    *
    * @author Mbida Luc Alfred
    *
    */

    namespace Applications\Modules\PaiementMod\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class PaiementModForm extends Form{
        // Inserer votre code ici!
        public static function getForm($dataArray = array(), $edit=false){
            $dataForm = new Form('modpaiementform');

            $dataForm->add('text', 'nom')
                        ->label('Nom ')
                        ->required(true);
            
            $dataForm->add('File', 'LogoImageFile')
                ->label('Logo')
                ->required(false);

            $dataForm->add('text', 'lien')
                        ->label('Lien ')
                        ->required(false);
            
            $dataForm->add('Radio', 'is_actived')
                    ->label('Activer ')
                    ->choices(array('0'=>'Non','1'=>'Oui'))
                    ->required(true);

            $dataForm->add('Textarea', 'description')
                    ->label('Description')
                    ->required(false)
                    ->add_class('small_text');            
            
            if($edit){

                $dataForm->add('Hidden', 'id')->value($dataArray['id']); 
                $dataForm->add('Hidden', 'logo')->value($dataArray['logo']);
                $dataForm->add('Submit', 'submit')->value('Modifier');
            }else{
                $dataForm->add('Hidden', 'logo');
                $dataForm->add('Submit', 'submit')->value('Ajouter');
            }

            $dataForm->bound($dataArray);

            return $dataForm;
        }
    }
?>