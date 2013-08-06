<?php
/**
 * Description of setting background for page
 *
 * @author MBIDA LUC
 */
namespace Applications\Modules\BgManager\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class BgManager extends Record{
    protected $id;
    protected $identifiant;
    protected $titre;
    protected $bgImage;
    protected $repeatX;
    protected $repeatY;
    protected $actived;
    protected $contenu;
    protected $metatitle;
    protected $metadescription;
    protected $metakeyword;
    protected $prix;
    protected $tabType = array('contenu'=>'html',);
	protected $showfooteradv;
    protected $bgImageBody;
    
    //SETTERS
    public function setBgImageBody($bgImageBody){
		$this->bgImageBody = $bgImageBody;	
	}
    public function setMetatitle($metatitle) {

        $this->metatitle = $metatitle;

    }
	
	public function setShowfooteradv($showfooteradv){
		$this->showfooteradv = $showfooteradv;	
	}

    public function setMetadescription($metadescription) {

        $this->metadescription = $metadescription;

    }

    public function setMetakeyword($metakeyword) {

        $this->metakeyword = $metakeyword;

    }

    public function setIdentifiant($identifiant) {

        $this->identifiant = $identifiant;
		
    }
    
    public function setId($id) {

        $this->id = $id;
		
    }

     public function setContenu($contenu) {

        $this->contenu = $contenu;

    }


    public function setTitre($titre) {

        $this->titre = $titre;

    }
	
    public function setBgColor($bgColor) {
	
        $this->bgColor = $bgColor;
		
    }
	
    public function setBgImage($bgImage) {
	
        $this->bgImage = $bgImage;
		
    }
	
    public function setRepeatX($repeatX) {
	
        $this->repeatX = $repeatX;
		
    }
	
    public function setRepeatY($repeatY) {
	
        $this->repeatY = $repeatY;
		
    }
	
    public function setActived($actived) {
	
        $this->actived = $actived;
		
    }
    
    public function setPrix($prix) {

        $this->prix = $prix;

    }
	

    //GETTERS
    public function getId() {

        return (int)$this->id;

    }
    
    public function getIdentifiant() {

        return (string)$this->identifiant;

    }

    public function getBgColor() {

        return (string)$this->bgColor;

    }

    public function getBgImage() {

        return (string)$this->bgImage;

    }

    public function getRepeatX() {

        return (int)$this->repeatX;

    }

    public function getRepeatY() {

        return (int)$this->repeatY;

    }

    public function getActived() {

        return (int)$this->actived;

    }

    public function getTitre() {

        return (string)$this->titre;

    }

     public function getContenu() {

        return $this->contenu;

    }

     public function getMetatitle() {

        return (string)$this->metatitle;

    }

    public function getMetadescription() {

        return $this->metadescription;

    }

    public function getMetakeyword() {

        return (string)$this->metakeyword;

    }
    
    public function getPrix() {

        return $this->prix;

    }
	
	public function getShowfooteradv(){
		return $this->showfooteradv;	
	}
    
    public function getBgImageBody(){
		return $this->bgImageBody ;	
	}

}

?>