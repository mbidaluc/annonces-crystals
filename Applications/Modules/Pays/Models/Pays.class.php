<?php

/**
 * Description of Pays
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Pays\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Record;

class Pays extends Record{
    //put your code here
    protected $id;
    protected $pays;
    protected $iso;
    protected $lang;
    protected $iso3;
    protected $etat;
    
    //GETTERS
    
    public function getId(){
        return $this->id;
    }
    
    public function getPays(){
        return $this->pays;
    }
    
    public function getIso(){
        return $this->iso;
    }
    
    public function getIso3(){
        return $this->iso3;
    }
    
    public function getLang(){
        return $this->lang;
    }
    
    public function getEtat(){
        return $this->etat;
    }
    
    //SETTERS
    public function setId($id){
        $this->id =(int)$id;
    }
    
    public function setPays($pays){
        $this->pays = $pays;
    }
    
    public function setIso($iso){
        $this->iso = $iso;
    }
    
    public function setIso3($iso3){
        $this->iso3 = $iso3;
    }
    
    public function setLang($lang){
        $this->lang = $lang;
    }
    
    public function setEtat($etat){
        $this->etat =(Bool)$etat;
    }
}

?>
