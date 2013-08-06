<?php
    /**
    * Description of PaiementMod
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PaiementMod\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class PaiementMod extends Record{
        protected $id;
        protected $nom;
        protected $description;
        protected $logo;
        protected $lien;
        protected $is_actived;

                    // SETTERS
        public function setId($id){
            $this->id = $id;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setLogo($logo){
            $this->logo = $logo;
        }
        public function setLien($lien){
            $this->lien = $lien;
        }
        public function setIs_actived($is_actived){
            $this->is_actived = $is_actived;
        }

                    // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getLogo(){
            return $this->logo;
        }
        public function getLien(){
            return $this->lien;
        }
        public function getIs_actived(){
            return $this->is_actived;
        } 

    }
?>