<?php
    /**
    * Description of PackCredits
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\PackCredits\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class PackCredits extends Record{
        protected $id;
        protected $libelle;
        protected $credit;
        protected $prix;
        protected $image;

                // SETTERS
        public function setId($id){
            $this->id = $id;
        }
        public function setLibelle($libelle){
            $this->libelle = $libelle;
        }
        public function setCredit($credit){
            $this->credit = $credit;
        }
        public function setPrix($prix){
            $this->prix = $prix;
        }
        
        public function setImage($image){
            $this->image = $image;
        }

                    // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getLibelle(){
            return $this->libelle;
        }
        public function getCredit(){
            return $this->credit;
        }
        public function getPrix(){
            return $this->prix;
        }
        
        public function getImage(){
            return $this->image;
        }

    }
?>