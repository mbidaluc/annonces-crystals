<?php
    /**
    * Description of NewsLetterForm
    *
    * @author Mbida Luc Alfred
    *
    */

    namespace Applications\Modules\NewsLetter\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class NewsLetterForm extends Form{
        // Inserer votre code ici!
        public static function getForm($dataArray = array()){
            $dataForm = new Form('newsparams');

            $dataForm->add('Select', 'frequenceEnvNL')
                    ->label('Fréquence d\'envoie des newsletters par')
                    ->choices(Array(
                                'Jour'=>'Jour',
                                'Semaine'=>'Semaine',
                                'Mois'=>'Mois',
                                'Chaque nouvel annonce'=>'Chaque nouvel annonce')
                            )
                    ->required(true);
            
            $dataForm->add('Textarea', 'NLEntete')
                ->label('Entête Newsletter')
                 ->add_class('rte');
            
            $dataForm->add('Textarea', 'NLPied')
                ->label('Pied Newsletter')
                 ->add_class('rte');


            $dataForm->add('Submit', 'submit')->value('Mettre à jour');

            $dataForm->bound($dataArray);

            return $dataForm;
        }
    }
?>