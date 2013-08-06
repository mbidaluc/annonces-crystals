<?php
    /**
    * Description of Partenaires
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\Partenaires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Partenaires extends Record{
        protected $id;
        protected $nom;
        protected $logo;
        protected $description;
        protected $lien;
        protected $is_active;

            // SETTERS
        public function setId($id){
        $this->id = $id;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setLogo($logo){
            $this->logo = $logo;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setLien($lien){
            $this->lien = $lien;
        }
        public function setIs_active($is_active){
            $this->is_active = $is_active;
        }

                // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getLogo(){
            return $this->logo;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getLien(){
            return $this->lien;
        }
        public function getIs_active(){
            return $this->is_active;
        } 

    }
?>