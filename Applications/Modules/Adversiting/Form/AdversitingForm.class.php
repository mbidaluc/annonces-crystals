<?php
/**
* Description of AdversitingForm
*
* @author ffozeu
*
*/

namespace Applications\Modules\Adversiting\Form;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Classe\Form\Form;                                    

class AdversitingForm extends Form{
    // Inserer votre code ici!
    public static function getForm($dataArray = array(), $tab=array(),$tab1=array(), $edit=false){
        $adversForm = new Form('addAdvers');        
        
        $adversForm->add('Text', 'altText')    
                 ->label('Bannière')
                 ->required(true);
        
        $adversForm->add('Text', 'link')    
                 ->label('Lien')
                 ->required(false);
        
        $adversForm->add('File', 'imageFile')
                    ->label('Titre')
                    ->required(false);
                
        $adversForm->add('Text', 'dateBegin')
                       ->label('Date de début')
                       ->required(true)
                       ->add_class('datepicker');
        
        $adversForm->add('Text', 'dateEnd')
                       ->label('Date de fin')
                       ->required(true)
                       ->add_class('datepicker');
        $adversForm->add('Text', 'finalPrice')
                       ->label('Prix Final')
                       ->required(true);
        
        $adversForm->add('Radio', 'active')
                    ->label('Active')
                    ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                    ));
            
        $adversForm->add('Select', 'idPosition')
                   ->label('Position')
                   ->choices($tab1)
                   ->required(true);
        
        $adversForm->add('Select', 'idPage')
                ->label('Page')
                ->choices($tab)
                ->required(true);
        
        if($edit){
            
            $adversForm->add('Hidden', 'id')->value($dataArray['id']);
            $adversForm->add('Hidden', 'image')->value($dataArray['image']);                                  
            $adversForm->add('Submit', 'submit')->value('Modifier');
        }else{
            
            $adversForm->add('Submit', 'submit')->value('Ajouter');
        }
        
        $adversForm->bound($dataArray);
        
        return $adversForm;
          
    }
    
    public static function getFrontForm($dataArray = array(), $tab=array(),$tab1=array(), $edit=false, $UniteAnnonce, $type = array(), $admin = 0){
		 $duree = array();
        for($i=1;$i<=31;$i++)
            $duree[$i]=$i.' '.$UniteAnnonce;
		 $duree["autres"] = "autres";
		 
        $dataForm = new Form('addAdversFormFront');
        $dataForm->set_id('formadv');
		if(!$admin){
			$dataForm->add('Select', 'type')
						->label('Type')
						->choices($type)
						->required(true)
						->defaultSelect('pub');
		}
        if(!$edit){ 
			 $dataForm->add('Select', 'typeFacturation')
						->label('Type de Facturation')
						->choices(array(
									'affichage'=>'par affichage',
									'click'=>'par click'            
						))
						->required(true);
		}
		if(!$admin){
        	$dataForm->action('poster-une-annonce-publicitaire.html');
		}
        $dataForm->add('Text', 'altText')    
                 ->label('Texte de la bannière')
                 ->required(false);
        
        $dataForm->add('Text', 'link')    
                 ->label('Lien ')
                 ->required(false);
        
        $dataForm->add('File', 'imageFile')
                    ->label('Banière')
                    ->required(false);
        if(!$edit){      
			$dataForm->add('Text', 'dateBegin')
						   ->label('Date de début')
						   ->required(true);
			
			$dataForm->add('Select', 'idPosition')
					   ->label('Position')
					   ->choices($tab1)
					   ->required(true);
			
			$dataForm->add('Select', 'idPage')
					->label('Page')
					->choices($tab)
					->required(true);
			
			$dataForm->add('Select', 'dureeAnnonce')
						->label('Durée annonce')
						->choices($duree)
						->required(true);
						
			$dataForm->add('Text', 'orther')
					   ->label(' ')
					    ->required(false)
						->value(32);			
		}
        
		if(!$edit){
			$dataForm->add('Select', 'diffusion')
						   ->label('Temps de diffusion')
							->choices(Array(
                                        'null'=>'selectionnez un temps de difusion ',
										'plein temps'=>'plein temps ', 
										'periodique'=>'suivant une periode d\'heure'))
						   ->required(true);
		}
        
        if($edit){
            
            $dataForm->add('Hidden', 'id')->value($dataArray['id']);
            $dataForm->add('Hidden', 'image')->value($dataArray['image']);  
			$dataForm->add('Radio', 'active')
                    ->label('Active')
                    ->choices(Array(
                            '0'=>'Non',
                            '1'=>'Oui'
                    ));                                
            //$dataForm->add('Submit', 'submit')->value('Modifier');
        }else{
            /*$dataForm->add('Submit', 'submit')->value('Suivant')->add_Class('envoyer');*/
        }
        $dataForm->closeForm(false);
        $dataForm->bound($dataArray);
        
        return $dataForm;
    }
}
?>