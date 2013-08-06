<?php
    /**
    * Description of PartenairesForm
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\Partenaires\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class PartenairesForm extends Form{
        // Inserer votre code ici!
        // Inserer votre code ici!
        public static function getForm($dataArray = array(), $edit=false){
            $dataForm = new Form('partenaireform');

            $dataForm->add('text', 'nom')
                        ->label('Nom ')
                        ->required(true);
            
            $dataForm->add('File', 'LogoImageFile')
                ->label('Logo')
                ->required(false);

            $dataForm->add('text', 'lien')
                        ->label('Lien ')
                        ->required(true);
            
            $dataForm->add('Radio', 'is_active')
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
        
        public static function getFormList($dataArray = array(), $list = array()){
            $dataForm = new Form('partenaireform');

            $dataForm->add('Select', 'id')
                        ->label('Partenaires ')
                        ->choices($list)
                        ->required(true);
            
            //$dataForm->add('Submit', 'submit')->value('Exporter ces données en fichier CSV');
            $dataForm->closeForm(false);
            $dataForm->bound($dataArray);
            

            return $dataForm;
        }
    }
?>