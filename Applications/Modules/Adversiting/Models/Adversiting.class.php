<?php
/**
* Description of Adversiting
*
* @author ffozeu
*/
namespace Applications\Modules\Adversiting\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class Adversiting extends Record{
    // Inserer votre code ici
    protected $id;
    protected $altText;
    protected $image;
    protected $dateBegin;
    protected $dateEnd;
    protected $idPosition;
    protected $idPage;
    protected $active;
    protected $finalPrice;
    protected $link;
    protected $dureeAnnonce;
    protected $diffusion;
    protected $idUder;
    protected $nbClick;
    protected $typeFacturation;

    //SETTERS
    public function setTypeFacturation($typeFacturation){
        $this->typeFacturation = $typeFacturation;
    }
    public function setNbClick($nbClick){
        $this->nbClick = $nbClick;
    }
    public function setDureeAnnonce($dureeAnnonce){
        $this->dureeAnnonce = $dureeAnnonce;
    }
    public function setDiffusion($diffusion){
        $this->diffusion = $diffusion;
    }
    public function setId($id){
        $this->id = (int)$id;
    }
    public function setAltText($altText){
        $this->altText = (string)$altText;
    }
    public function setImage($image){
        $this->image = (string)$image;
    }
    public function setDateBegin($dateBegin){
        $this->dateBegin = (string)$dateBegin;
    }
    public function setDateEnd($dateEnd){
        $this->dateEnd = (string)$dateEnd;
    }
    public function setIdPosition($idPosition){
        $this->idPosition = (int)$idPosition;
    }
    public function setIdPage($idPage){
        $this->idPage = (int)$idPage;
    }
    
    public function setActive($active){
        $this->active = (int)$active;
    }
    
    public function setFinalPrice($finalPrice){
        $this->finalPrice = (float)$finalPrice;
    }
    
    public function setLink($link){
        $this->link = $link;
    }
    
    public function setIdUder($idUder){
        $this->idUder = $idUder;
    }

    //GETTERS
    public function getId(){
        return $this->id ;
    }
    public function getAltText(){
        return $this->altText ;
    }
    public function getImage(){
        return $this->image ;
    }
    public function getDateBegin(){
        return $this->dateBegin ;
    }
    public function getDateEnd(){
        return $this->dateEnd ;
    }
    public function getIdPosition(){
        return $this->idPosition ;
    }
    public function getIdPage(){
        return $this->idPage ;
    }
    public function getActive(){
        return $this->active;
    }
    public function getFinalPrice(){
        return $this->finalPrice ;
    }
    
    public function getLink(){
        return $this->link;
    }
    public function getDureeAnnonce(){
        return $this->dureeAnnonce;
    }
    public function getDiffusion(){
        return $this->diffusion;
    }
    public function getIdUder(){
        return $this->idUder;
    }
    
    public function getNbClick(){
        return $this->nbClick;
    }
    
    public function getTypeFacturation(){
        return $this->typeFacturation;
    }
}
?>