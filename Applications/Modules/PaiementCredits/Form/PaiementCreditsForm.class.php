<?php
    /**
    * Description of PaiementCreditsForm
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\PaiementCredits\Form;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Classe\Form\Form;                                    

    class PaiementCreditsForm extends Form{
        // Inserer votre code ici!
        
        public static function getForm($dataArray = array(), $edit=false){
            $dataForm = new Form('paiementform');
            
            $dataForm->action("paiementpacks.html");
            $dataForm->add('text', 'nom_expediteur')
                        ->label('Nom de l\'expéditeur ')
                        ->required(true);

            $dataForm->add('text', 'montant')
                        ->label('Montant ')
                        ->required(true);

            $dataForm->add('text', 'num_bordero')
                        ->label('Numero de bordereau ')
                        ->required(true);

            $dataForm->add('text', 'beneficiaire')
                    ->label('Nom du Bénéficiaire ')
                    ->required(true);

            $dataForm->add('text', 'num_tel')
                    ->label('Numero de téléphone')
                    ->required(true);
            
             $dataForm->add('text', 'password')
                    ->label('Mot de Passe')
                    ->required(false);
             
              $dataForm->add('text', 'ville')
                    ->label('Ville')
                    ->required(false);
                   
            // identifiant de l'annonce
            //$dataForm->add('Hidden', 'idAnnonce')->value($dataArray['idAnnonce']);
            
            if($edit){

                $dataForm->add('Hidden', 'id')->value($dataArray['id']);                                 
                $dataForm->add('Submit', 'submit')->value('Modifier')->add_class('envoie1');
            }else{

                $dataForm->add('Submit', 'submit')->value('Enregistrer')->add_class('envoie1');
            }

            $dataForm->bound($dataArray);

            return $dataForm;
        }
    }
?>