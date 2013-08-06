<?php

namespace Applications\Modules\Contact\Form;
/**
 * Description of ConfigurationsForm
 *
 * @author ffozeu
 */
use Library\Classe\Form\Form;

class ContactForm extends Form{
    //put your code here
    public static function getForm($arrayData = array()){
        
        $contacForm = new Form('contact','post');
       
        $contacForm->action('contact.html');
        
        $contacForm->add('Text', 'pseudo')
                   ->label('Pseudo')
                   ->value('votre pseudo')
                   ->required(true);
        
        $contacForm->add('Email', 'email')
                   ->label('Email')
                   ->value('votre adresse e-mail')
                   ->required(true);
        
        $contacForm->add('Text', 'sujet')
                   ->label('Objet')
                   ->value('sujet')
                   ->required(true);
        
        $contacForm->add('Textarea', 'message')
                   ->label('Votre message')
                   ->cols('30')
                   ->rows('7')
                   ->required(true);
        
        $contacForm->add('Captcha', 'captcha')
                   ->label('Captcha')
                   ->required(true);
        
        /*$contacForm->add('Submit', 'submit')
                    ->add_class('send')
                    ->value('Envoyer');*/
        $contacForm->closeForm(false);
        
        $contacForm->bound($arrayData);
        
        return $contacForm;
    }
}

?>
