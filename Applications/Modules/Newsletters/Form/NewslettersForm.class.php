<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Applications\Modules\Newsletters\Form;
/**
 * Description of ConfigurationsForm
 *
 * @author ffozeu
 */
use Library\Classe\Form\Form;

class NewslettersForm extends Form{
    //put your code here
    public static function getForm($data_array=array(),$tab=array(), $edit=false){
        
        
        $dataForm = new Form('addNewsletters');
        
        //ajout des champs
        $dataForm->add('Text', 'titre')
                ->label('Titre')
                ->required(true);
                
       $dataForm->add('Select', 'type_envoie')
                        ->label('Type de Newsletter')
                        ->choices(array(
                            'jour' => 'Journalière',
                            'hebdo' => 'Hebdomadaire',
                            'mois' => 'Mensuelle',
                        ))
                ->required(true);
       
       $dataForm->add('Select', 'categorie')
                ->label('Catégorie Parente')
                ->choices($tab)
                ->required(true);
       
         
       $dataForm->add('Textarea', 'message')
                ->label('Message')
                ->value('veuillez saisir les informations à  enregistrer et/ou envoyer')
                ->add_class('field_text')
                ;
       
        if($edit){
            
            $dataForm->add('Hidden', 'id_news')->value($data_array['id_news']);                
            $dataForm->add('Submit', 'submit')->value('Modifier');
            
        }else{
            $dataForm->add('Submit', 'submit')->value('Ajouter');
        }
        $dataForm->bound($data_array);
        
        return $dataForm;
    }
       
       
       
       
       
       
       
       
       
       
       
       
       
       
                
       }

?>
