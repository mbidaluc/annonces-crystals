<?php
/**
* Description of Hook
*
* @author ffozeu
*/
namespace Applications\Modules\Hook\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class Hook extends Record{
    // Inserer votre code ici
    protected $id;
    protected $name;
    protected $price;
    protected $type;
    protected $active;
    protected $technicalName;
    protected $description;
    protected $coutCredit;

        //SETTERS
    public function setCoutCredit($coutCredit){
        $this->coutCredit = $coutCredit;
    }
    public function setId($id){
        $this->id = (int)$id;
    }
    
    public function setName($name){
        $this->name = (string)$name;
    }
    
    public function setPrice($price){
        $this->price = (float)$price;
    }
    
    public function setType($type){
        $this->type = (string)$type;
    }
    
    public function setActive($active){
        $this->active = (boolean)$active;
    }
    
    public function setTechnicalName($technicalName){
        $this->technicalName = (string)$technicalName;
    }
    
    public function setDescription($description){
        $this->description = (string)$description;
    }
    
    //GETTERS
    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getActive(){
        return $this->active;
    }
    
    public function getTechnicalName(){
        return $this->technicalName;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getCoutCredit(){
        return $this->coutCredit;
    }
}

?>