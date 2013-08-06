<?php

/**
 * Description of Newsletters
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Newsletters\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class Newsletters extends Record{
    
    protected $id_member;
    protected $id_news;
    protected $email_member;
    protected $titre;
    protected $message;
    protected $categorie;
    protected $date_news;
    protected $type_envoie;
    protected $libelle;
    protected $actif;
        
	
    //SETTERS
    public function setId_news($id_news) {
        $this->id_news = $id_news;
    }
            
    public function setId_member($id_member){
        $this->id_member = $id_member; 
    }
    
    public function setEmail_member($email_member) {
        $this->email_member = $email_member;        
    }
    
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    
    public function setMessage($message) {	
        $this->message = $message;		
    }
	
    public function setCategorie($categorie) {	
        $this->categorie = $categorie;		
    }
	
    public function setDate_news($date_news) {	
        $this->date_news = $date_news;		
    }
    
    public function setType_envoie($type_envoie) {	
        $this->type_envoie = $type_envoie;		
    }
    
    public function setLibelle($libelle) {	
        $this->libelle = $libelle;		
    }
    
    public function setActif($actif) {	
        $this->actif = $actif;		
    }
    
    
    // GETTERS
    public function getLibelle() {	
        return $this->libelle;		
    }
    
    public function getId_news() {	
        return $this->id_news;		
    }
	
    public function getTitre() {
	
        return $this->titre;
		
    }
	
    public function getMessage() {
	
        return $this->message;
		
    }
	
    public function getCategorie() {
	
        return $this->categorie;
		
    }
    
    public function getDate_news() {
	
        return $this->date_news;
		
    }
    
    public function getType_envoie() {
	
        return $this->type_envoie;
		
    }
    
    public function getId_member() {
	
        return $this->id_member;
		
    }
    
    public function getEmail_member() {
	
        return $this->email_member;
		
    }
    
    public function getActif() {
	
        return $this->actif;
		
    }
}

?>
