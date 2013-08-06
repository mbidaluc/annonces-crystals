<?php
/**
* Description of HookForm
*
* @author ffozeu
*
*/

namespace Applications\Modules\Hook\Form;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Classe\Form\Form;                                    

class HookForm extends Form{
    // Inserer votre code ici!
    public static function getForm($dataArray = array(), $edit=false){
        $dataForm = new Form('hookform');
        
        $dataForm->add('text', 'name')
                       ->label('Nom ')
                       ->required(true);
        
        $dataForm->add('text', 'technicalName')
                       ->label('Nom technique ')
                       ->required(true);
        
        $dataForm->add('text', 'price')
                       ->label('Prix ');
        
        $dataForm->add('Select', 'type')
                   ->label('Type de position ')
                   ->choices(array('pub'=>'Bannière publicitaire','annonce'=>'Annonces'))
                   ->required(true);
        
        $dataForm->add('text', 'coutCredit')
                       ->label('Coût du credit ');
        
        $dataForm->add('Textarea', 'description')
                   ->label('Description')
                   ->required(false)
                   ->add_class('small_text');
        
        if($edit){
            
            $dataForm->add('Hidden', 'id')->value($dataArray['id']);                                 
            $dataForm->add('Submit', 'submit')->value('Modifier');
        }else{
            
            $dataForm->add('Submit', 'submit')->value('Ajouter');
        }
        
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
}
?>