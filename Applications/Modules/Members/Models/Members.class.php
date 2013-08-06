<?php
    /**
    * Description of Members
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\Members\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Members extends Record{
        protected $id_member;
        protected $email_member;
        protected $date_souscription;
        protected $is_actived;
        protected $nom_membre;
        protected $phone;

        // SETTERS
        public function setPhone($phone){
            $this->phone = $phone;
        }
        public function setId_member($id_member){
            $this->id_member = $id_member;
        }
        public function setEmail_member($email_member){
            $this->email_member = $email_member;
        }
        public function setDate_souscription($date_souscription){
            $this->date_souscription = $date_souscription;
        }
        public function setIs_actived($is_actived){
            $this->is_actived = $is_actived;
        }
        public function setNom_membre($nom_membre){
            $this->nom_membre = $nom_membre;
        }

        // GETTERS
        public function getId_member(){
            return $this->id_member;
        }
        public function getEmail_member(){
            return $this->email_member;
        }
        public function getDate_souscription(){
            return $this->date_souscription;
        }
        public function getIs_actived(){
            return $this->is_actived;
        }
        public function getNom_membre(){
            return $this->nom_membre;
        }
        
        public function getPhone(){
            return $this->phone;
        }

    }
?>