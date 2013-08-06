<?php
/**
* Description of AnnonceForm
*
* @author mbida luc
*
*/

namespace Applications\Modules\Annonce\Form;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Classe\Form\Form;                                    

class AnnonceForm extends Form{

    public static function getForm($dataArray = array(), $cat = array(), $type = array(), $priorite = array(), $UniteAnnonce, $edit=false){
        $registerForm = new Form('createAnnonce','post');

        //$registerForm->action('add-user.html');
        $duree = array();
        for($i=1;$i<=31;$i++)
            $duree[$i]=$i.' '.$UniteAnnonce;
		 $duree["autres"] = "autres";
		 
        $registerForm->add('Select', 'type')
                    ->label('Type')
                    ->choices($type)
                    ->required(true)
                    ->defaultSelect('NULL');
        
         $registerForm->add('Select', 'typeFacturation')
                    ->label('Type de Facturation')
                    ->choices(array(
                                'NULL'=>'Mode de facturation',
                                'affichage'=>'par affichage',
                                'click'=>'par click'            
                    ))
                    ->required(true)
                    ->defaultSelect('NULL');

        $registerForm->add('Select', 'idCategorie')
                    ->label('Catégorie')
                    ->choices($cat)
                    ->required(true);
        
        $registerForm->add('Select', 'idSubCategorie')
                    ->label('Sous catégorie')
                    ->choices(array('NULL'=>'Aucune sous catégorie',));

        $registerForm->add('Text', 'designation')
                    ->label('Désignation')
                    ->required(true);
        
        $registerForm->add('Select', 'idPosition')
                    ->label('Posisition')
                    ->choices(Array('0*0'=>'Sélectionner une position'))
                    ->required(true);
        
        $registerForm->add('Text', 'urlSortant')
                    ->label('Lien web')
                    ->required(false);

        $registerForm->add('Text', 'ville')
                    ->label('Ville')
                    ->required(false);

        $registerForm->add('Text', 'pays')
                    ->label('Pays')
                    ->required(false);

        $registerForm->add('Text', 'phone1')
                    ->label('Phone 1')
                    ->required(false);

        $registerForm->add('Text', 'phone2')
                    ->label('Phone 2')
                    ->required(false);

        $registerForm->add('Email', 'email')
                    ->label('Adresse email')
                    ->required(true);


        $registerForm->add('Text', 'auteur')
                    ->label('Auteur')
                    ->required(false);
        
         $registerForm->add('Hidden', 'link_rewrite')
                    ->label('Lien reécrit')
                    ->required(true);

        /*$registerForm->add('Text', 'dateexp')
                    ->label('Expire le')
                    ->required(false)->add_class('datepicker');*/
        
         $registerForm->add('Select', 'dureeAnnonce')
                    ->label('Durée annonce')
                    ->choices($duree)
                    ->required(true);
					
		$registerForm->add('Text', 'orther')
					   ->label(' ')
					    ->required(false)
						->value(32);

        $registerForm->add('Select', 'idPriorite')
                    ->label('Priorite')
                    ->choices($priorite)
                    ->required(true);
        
        $registerForm->add('Text', 'prixTotal')
                ->label('Prix')
                ->required(true);


        $registerForm->add('Textarea', 'texte')
                    ->label('Texte d\'annonce')
                    ->required(false);
        if($edit){
            //var_dump($dataArray);
            //$registerForm->add('Hidden', 'id')->value($dataArray['id']);
            $registerForm->add('Submit', 'submit')->value('Modifier');
        }else{

            //$registerForm->add('Submit', 'submit')->value('Publier');
        }

        $registerForm->fieldsets(array(''=>array('type','idCategorie','idSubCategorie','designation','urlSortant', 'link_rewrite', 'ville','typeFacturation',
            'pays','phone1','phone2','email','auteur','dureeAnnonce', 'orther', 'idPriorite','idPosition', 'prixTotal')));
        $registerForm->closeForm(false);
        $registerForm->set_label_suffix('');
        $registerForm->bound($dataArray);

        return $registerForm;
    }
    
     public static function getFormAdmin($dataArray = array(), $cat = array(), $position = array(), $priorite = array(), $UniteAnnonce){
        $registerForm = new Form('createAnnonce','post');
        
         $registerForm->add('Select', 'typeFacturation')
                    ->label('Type de Facturation')
                    ->choices(array(
                                'affichage'=>'par affichage',
                                'click'=>'par click'            
                    ))
                    ->required(true);

        $registerForm->add('Select', 'idCategorie')
                    ->label('Catégorie')
                    ->choices($cat)
                    ->required(true);
        
        $registerForm->add('Select', 'idSubCategorie')
                    ->label('Sous catégorie')
                    ->choices(array('NULL'=>'Aucune sous catégorie',));

        $registerForm->add('Text', 'designation')
                    ->label('Désignation')
                    ->add_class('copy2friendlyUrl name_elt')
                    ->required(true);
        
        $registerForm->add('Text', 'urlSortant')
                    ->label('Lien Sortant')
                    ->required(false);
        
        $registerForm->add('Text', 'link_rewrite')
                    ->label('Lien reécrit')
                    ->add_class('cat_link_rewrite')
                    ->required(true);

        $registerForm->add('Text', 'ville')
                    ->label('Ville')
                    ->required(false);

        $registerForm->add('Text', 'pays')
                    ->label('Pays')
                    ->required(false);

        $registerForm->add('Text', 'phone1')
                    ->label('Phone 1')
                    ->required(false);

        $registerForm->add('Text', 'phone2')
                    ->label('Phone 2')
                    ->required(false);

        $registerForm->add('Email', 'email')
                    ->label('Adresse email')
                    ->required(true);


        $registerForm->add('Text', 'auteur')
                    ->label('Auteur')
                    ->required(false);

        /*$registerForm->add('Text', 'dateexp')
                    ->label('Expire le')
                    ->required(false)->add_class('datepicker');*/
        
         $registerForm->add('Select', 'dureeAnnonce')
                    ->label('Durée annonce')
                    ->choices(Array(
                                    1=>'1 '.$UniteAnnonce, 
                                    2=>'2 '.$UniteAnnonce, 
                                    3=>'3 '.$UniteAnnonce, 
                                    4=>'4 '.$UniteAnnonce, 
                                    5=>'5 '.$UniteAnnonce))
                    ->required(true);

        $registerForm->add('Select', 'idPriorite')
                    ->label('Priorite')
                    ->choices($priorite)
                    ->required(true);

            $registerForm->add('Select', 'idPosition')
                    ->label('Posisition')
                    ->choices($position)
                    ->required(true);
            
            $registerForm->add('Text', 'prixTotal')
                    ->label('Prix')
                    ->required(true);


        $registerForm->add('Textarea', 'texte')
                    ->label('Texte d\'annonce')
                    ->required(false);
       

        $registerForm->fieldsets(array(''=>array('type','idCategorie','idSubCategorie', 'designation', 'urlSortant','link_rewrite', 'ville','typeFacturation',
            'pays','phone1','phone2','email','auteur','dureeAnnonce','idPriorite','idPosition', 'prixTotal')));
        $registerForm->closeForm(false);
        $registerForm->set_label_suffix('');
        $registerForm->bound($dataArray);

        return $registerForm;
    }
    
    public static function getFormEdit($dataArray = array(), $cat = array()){
        $registerForm = new Form('editAnnonce','post');

        //$registerForm->action('add-user.html')

        $registerForm->add('Select', 'idCategorie')
                    ->label('Catégorie')
                    ->choices($cat)
                    ->required(true);
			
		 $registerForm->add('Select', 'idSubCategorie')
                    ->label('Sous catégorie')
                    ->choices(array('NULL'=>'Aucune sous catégorie',));

        $registerForm->add('Text', 'designation')
                    ->label('Désignation')
                    ->required(true);
        
        $registerForm->add('Text', 'urlSortant')
                    ->label('Lien Sortant')
                    ->required(false);

        $registerForm->add('Text', 'ville')
                    ->label('Ville')
                    ->required(false);

        $registerForm->add('Text', 'pays')
                    ->label('Pays')
                    ->required(false);

        $registerForm->add('Text', 'phone1')
                    ->label('Phone 1')
                    ->required(false);

        $registerForm->add('Text', 'phone2')
                    ->label('Phone 2')
                    ->required(false);

        $registerForm->add('Email', 'email')
                    ->label('Adresse email')
                    ->required(true);


        $registerForm->add('Text', 'auteur')
                    ->label('Auteur')
                    ->required(false);
		
		$registerForm->add('Text', 'prixTotal')
                    ->label('Prix')
                    ->required(true);
        
         $registerForm->add('Hidden', 'link_rewrite')
                    ->label('Lien reécrit')
                    ->required(true);
        

        $registerForm->fieldsets(array(''=>array('id','idCategorie','idSubCategorie','designation','urlSortant','link_rewrite', 'ville',
            'pays','phone1','phone2','email','auteur','texte')));
        $registerForm->closeForm(false);
        $registerForm->set_label_suffix('');
        $registerForm->bound($dataArray);

        return $registerForm;
    }
    
    public static function getFormAdminEdit($dataArray = array(), $cat = array(), $subcat = array()){
        $registerForm = new Form('createAnnonce','post');
        
         $registerForm->add('Select', 'typeFacturation')
                    ->label('Type de Facturation')
                    ->choices(array(
                                'affichage'=>'par affichage',
                                'click'=>'par click'            
                    ))
                    ->required(true);

        $registerForm->add('Select', 'idCategorie')
                    ->label('Catégorie')
                    ->choices($cat)
                    ->required(true);
        
        if(isset($subcat) && sizeof($subcat))
            $souscat = $subcat;
        else
            $souscat = array('NULL'=>'Aucune sous catégorie',);
        
         $registerForm->add('Select', 'idSubCategorie')
                    ->label('Sous catégorie')
                    ->choices($souscat);

        $registerForm->add('Text', 'designation')
                    ->label('Désignation')
                    ->add_class('copy2friendlyUrl name_elt')
                    ->required(true);
        
        $registerForm->add('Text', 'urlSortant')
                    ->label('Lien Sortant')
                    ->required(false);
        
        $registerForm->add('Text', 'link_rewrite')
                    ->label('Lien reécrit')
                    ->add_class('cat_link_rewrite')
                    ->required(true);

        $registerForm->add('Text', 'ville')
                    ->label('Ville')
                    ->required(false);

        $registerForm->add('Text', 'pays')
                    ->label('Pays')
                    ->required(false);

        $registerForm->add('Text', 'phone1')
                    ->label('Phone 1')
                    ->required(false);

        $registerForm->add('Text', 'phone2')
                    ->label('Phone 2')
                    ->required(false);

        $registerForm->add('Email', 'email')
                    ->label('Adresse email')
                    ->required(true);


        $registerForm->add('Text', 'auteur')
                    ->label('Auteur')
                    ->required(false);

        
            
         $registerForm->add('Text', 'prixTotal')
                    ->label('Prix')
                    ->required(true);
       

        $registerForm->fieldsets(array(''=>array('type','idCategorie','idSubCategorie','designation','urlSortant','link_rewrite', 'ville','typeFacturation',
            'pays','phone1','phone2','email','auteur', 'prixTotal')));
        $registerForm->closeForm(false);
        $registerForm->set_label_suffix('');
        $registerForm->bound($dataArray);

        return $registerForm;
    }
}
?>