<?php
        /**
        * Description of GestionAbus
        *
        * @author Luc Alfred MBIDA
        */
        namespace Applications\Modules\GestionAbus\Models;

        if( !defined('IN') ) die('Hacking Attempt');

        use Library\Record;

        class GestionAbus extends Record{
        protected $idAbus;
        protected $NomSignaleur;
        protected $email;
        protected $message;
        protected $id;
        

        // SETTERS
        public function setIdAbus($idAbus){
            $this->idAbus = $idAbus;
        }
        public function setNomSignaleur($NomSignaleur){
            $this->NomSignaleur = $NomSignaleur;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setMessage($message){
            $this->message = $message;
        }
        public function setId($id){
            $this->id = $id;
        }
        // GETTERS 
        public function getIdAbus(){
            return $this->idAbus;
        }
        public function getNomSignaleur(){
            return $this->NomSignaleur;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getMessage(){
            return $this->message;
        }
        public function getId(){
            return $this->id;
        }

    }
?>