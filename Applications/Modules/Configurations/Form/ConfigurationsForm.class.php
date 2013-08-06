<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Applications\Modules\Configurations\Form;
/**
 * Description of ConfigurationsForm
 *
 * @author ffozeu
 */
use Library\Classe\Form\Form;

class ConfigurationsForm extends Form{
    //put your code here
    public static function getForm($dataArray = array()){
        $dataForm = new Form('DefBgtest');
        
        $dataForm->add('Text', 'nomSite')
                 ->label('Nom du Site')
                 ->required(true);

         $dataForm->add('Text', 'emailSite')
                  ->label('Email du Site')
                  ->required(true);

         $dataForm->add('Select', 'coutDuree')
                  ->label('cout annonce évaluée par')
                 ->choices(Array(
                            'Minute'=>'Minute',
                            'Heure'=>'Heure',
                            'Jour'=>'Jour',
                            'Semaine'=>'Semaine',
                            'Mois'=>'Mois',
                            'Annee'=>'Annee')
                         )
                  ->required(true);
         
          $dataForm->add('Text', 'prixUniteAnnonce')
                  ->label('Prix Annonce/unité de temps')
                  ->required(true);

         
         $dataForm->add('Textarea', 'metaDescription')
                  ->label('Descrition du site')
                  ->required(false);
         

         $dataForm->add('Text', 'metaKeyword')
                  ->label('Mots clés du site')
                  ->required(false);

        $dataForm->add('File', 'bgImageFile')
                            ->label('Arrière plan')
                            ->required(false)
                            ;
        $dataForm->add('File', 'defaultCategoryImageFile')
                            ->label('Image catégory par défaut')
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
                ->required(false)
                ;

        $dataForm->add('Radio', 'is_active')
                ->label('Activé')
                ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                ))
                ->required(false)
                ;
        $dataForm->add('Hidden', 'bgImage')->value($dataArray['bgImage']);
        $dataForm->add('Hidden', 'image')->value($dataArray['defaultCategoryImage']);
        $dataForm->add('Submit', 'submit')->value('Mettre à jour');
        
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
    
     public static function getFormImage($dataArray = array()){
        $dataForm = new Form('DefBgImage');
        
        $dataForm->add('Text', 'cout1image')
                 ->label('Coût d\'une image')
                 ->required(true);

         $dataForm->add('Text', 'cout2image')
                  ->label('Coût de deux images')
                  ->required(true);

         $dataForm->add('Text', 'cout3image')
                  ->label('Coût de trois images')
                  ->required(true);

         
         $dataForm->add('Text', 'cout4image')
                  ->label('Coût de quatre images')
                  ->required(true);
         

         $dataForm->add('Text', 'cout5image')
                  ->label('Coût de cinq images')
                  ->required(true);

        $dataForm->add('Text', 'cout6image')
                            ->label('Coût de six images')
                            ->required(true);
        
       $dataForm->add('Text', 'cout7image')
                ->label('Coût de sept images')
                ->required(true);

       $dataForm->add('Text', 'cout8image')
                ->label('Coût de huit images')
                ->required(true);

        $dataForm->add('Text', 'cout9image')
                ->label('Coût de neuf images')
                ->required(true);
        
        $dataForm->add('Submit', 'submit')->value('Mettre à jour');
        
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
    
     public static function getFormDefaultImage($dataArray = array()){
        $dataForm = new Form('DefDefaultImage');
        
        $dataForm->add('File', 'DefaultSpecialeImageFile')
                            ->label('Annonces Spéciales')
                            ->required(false)
                            ;
        
        $dataForm->add('File', 'DefaultUneImageFile')
                            ->label('Annonces A la une')
                            ->required(false)
                            ;
        
        $dataForm->add('File', 'DefaultAnnonceImageFile')
                            ->label('Annonces ')
                            ->required(false)
                            ;
        
        $dataForm->add('Hidden', 'defaultSpecialeImage')->value($dataArray['defaultSpecialeImage']);
        $dataForm->add('Hidden', 'defaultUneImage')->value($dataArray['defaultUneImage']);
        $dataForm->add('Hidden', 'defaultAnnonceImage')->value($dataArray['defaultAnnonceImage']);
        
        $dataForm->add('Submit', 'submit')->value('Mettre à jour');
        
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
}

?>
