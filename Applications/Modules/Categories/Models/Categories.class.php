<?php
/**
 * Description of setting background for page
 *
 * @author MBIDA LUC
 */
namespace Applications\Modules\Categories\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class Categories extends Record{
    protected $idFils;
    protected $idParent;
    protected $libelle;
    protected $image;
    protected $description;
    protected $position;
    protected $active;
    protected $length;
    protected $link_rewrite;
    protected $defaultAnnonceImage;
    protected $frontVisitility;
     //SETTERS
    
     public function setDefaultAnnonceImage($defaultAnnonceImage){
                $this->defaultAnnonceImage = $defaultAnnonceImage;
        }
    public function setIdFils($idFils) {

        $this->idFils = $idFils;

    }

    public function setIdParent($idParent) {

        $this->idParent = $idParent;

    }

    public function setLibelle($libelle) {

        $this->libelle = $libelle;

    }

    public function setImage($image) {

        $this->image = $image;

    }

    public function setDescription($description) {

        $this->description = $description;
        
    }
    
    public function setPosition($position) {

        $this->position = $position;
        
    }
    
    public function setActive($active) {

        $this->active = $active;
        
    }
    public function setLength($length) {

        $this->length = $length;
        
    }
	public function setLink_rewrite($link_rewrite) {

        $this->link_rewrite = $link_rewrite;
        
    }
    
    
    public function setFrontVisitility($frontVisitility){
        $this->frontVisitility = $frontVisitility;
    }
    //GETTERS
    public function getIdFils() {

        return $this->idFils;

    }

    public function getIdParent() {

        return $this->idParent;

    }

     public function getLibelle() {

        return $this->libelle;

    }

    public function getImage() {

        return $this->image;

    }

    public function getDescription() {

        return $this->description;

    }
    
    public function getPosition() {

        return $this->position;

    }
    
    public function getActive() {

        return $this->active;

    }
    
    public function getLength() {

        return $this->length;
        
    }
	public function getLink_rewrite() {

        return $this->link_rewrite ;
        
    }
    
    public function getDefaultAnnonceImage(){
                return $this->defaultAnnonceImage;
        } 
    public function getFrontVisitility(){
        return $this->frontVisitility;
    }

}

?>
