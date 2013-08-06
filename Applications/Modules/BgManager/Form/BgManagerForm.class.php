<?php

namespace Applications\Modules\BgManager\Form;
/**
 * Description of BgManagerForm
 *
 * @author ffozeu
 */
use Library\Classe\Form\Form;

class BgManagerForm extends Form{
    //put your code here
    
    public static function getForm($dataArray=array(),$edit=false){
        $dataForm = new Form('DefBg');        

        $dataForm->add('Text', 'titre')
                 ->label('Titre')
                 ->required(true);

        $dataForm->add('Text', 'identifiant')
                 ->label('Unique ID')
                 ->required(true);
        
        $dataForm->add('Text', 'prix')
                 ->label('prix')
                 ->required(true);
        
         $dataForm->add('Textarea', 'contenu')
                  ->label('Contenu')
                  ->add_class('rte')
                  ->required(false);

         $dataForm->add('Text', 'metatitle')
                 ->label('Meta title')
                 ->required(false);

         $dataForm->add('Textarea', 'metadescription')
                  ->label('Meta Descrition')
                  ->required(false);

         $dataForm->add('Text', 'metakeyword')
                  ->label('Meta Keyword')
                  ->required(false);

        $dataForm->add('File', 'bgBodyFile')
                            ->label('Arrière plan body')
                            ->required(false);
        
        $dataForm->add('File', 'bgImageFile')
                            ->label('Arrière plan')
                            ->required(false);
        
       $dataForm->add('Radio', 'repeatX')
                ->label('RepeatX')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;

       $dataForm->add('Radio', 'repeatY')
                ->label('RepeatY')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;

        $dataForm->add('Radio', 'actived')
                ->label('Activé')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;
		 $dataForm->add('Radio', 'showfooteradv')
                ->label('Afficher la banière pub du bas')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;
				
        if($edit){
            
            $dataForm->add('Hidden', 'id')->value($dataArray['id']);
            $dataForm->add('Hidden', 'bgImageBody')->value($dataArray['bgImageBody']);
            $dataForm->add('Hidden', 'bgImage')->value($dataArray['bgImage']);            
            $dataForm->add('Submit', 'submit')->value('Modifier');
            
        }else{
            $dataForm->add('Submit', 'submit')->value('Ajouter');
        }
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
    
    public static function getDefinedBgForm($dataArray=array(),$tab=array()){
        $dataForm = new Form('DefBg');
        $dataForm->add('Select', 'id')
                ->label('Page')
                ->choices($tab)
                ->required(true);

        $dataForm->add('File', 'bgImageFile')
                            ->label('Arrière plan')
                            ->required(false)
                            ;
       $dataForm->add('Radio', 'repeatX')
                ->label('RepeatX')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;

       $dataForm->add('Radio', 'repeatY')
                ->label('RepeatY')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false);

        $dataForm->add('Radio', 'actived')
                ->label('Activé')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;

         $dataForm->add('Hidden', 'bgImage')
                ->label('Arrière plan')
                ->required(false);

        $dataForm->add('Submit', 'submit')->value('Modifier la page');
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
}

?>
