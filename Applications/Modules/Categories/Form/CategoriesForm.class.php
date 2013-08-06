<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Applications\Modules\Categories\Form;
/**
 * Description of CategoriesForm
 *
 * @author ffozeu
 */
if( !defined('IN') ) die('Hacking Attempt');

use Library\Classe\Form\Form;

class CategoriesForm extends Form{
    //put your code here
    public static function getForm($dataArray = array(), $tab=array(), $edit=false){
        $dataForm = new Form('DefBg');

          $dataForm->add('Text', 'libelle')
                ->label('Titre Catégorie')
                ->required(true)->add_class('copy2friendlyUrl name_elt');
        
        $dataForm->add('Text', 'link_rewrite')
                ->label('Lien Ré-ecrit')
                ->required(true)->add_class('cat_link_rewrite');
        
        $dataForm->add('Select', 'idParent')
                ->label('Catégorie Parente')
                ->choices($tab)
                ->required(true);
        
        $dataForm->add('Radio', 'frontVisitility')
                ->label('Afficher sur le site')
                ->choices(array(
                    '0'=> 'Non',
                    '1'=> 'Oui'
                ))
                ->required(true);

        $dataForm->add('File', 'imageFile')
                ->label('Image de la catégorie')
                ->required(false);
        
         $dataForm->add('File', 'DefaultAnnonceImageFile')
                            ->label('Image Annonce par défaut ')
                            ->required(false)
                            ;

        $dataForm->add('Textarea', 'description')
                ->label('Description')
                 ->add_class('textareaZone');
        if($edit){
            $dataForm->add('Hidden', 'idFils')->value($dataArray['idFils']);
            $dataForm->add('Hidden', 'image')->value($dataArray['image']);
            $dataForm->add('Hidden', 'defaultAnnonceImage')->value($dataArray['defaultAnnonceImage']);
            
            $dataForm->add('Submit', 'submit')->value('Modifier');
        }else{
            
            $dataForm->add('Submit', 'submit')->value('Ajouter');
        }
        
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
}

?>
