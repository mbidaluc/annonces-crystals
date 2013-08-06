<?php
    /**
    * Description of Mouchard
    *
    * @author Alfred MBIDA
    */
    namespace Applications\Modules\Mouchard\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Mouchard extends Record{
        protected $id;
        protected $date;
        protected $heure;
        protected $action;
        protected $id_user;
        protected $pseudo;

             // SETTERS
        public function setId($id){
           $this->id = $id;
       }
        public function setDate($date){
           $this->date = $date;
       }
        public function setHeure($heure){
           $this->heure = $heure;
       }
        public function setAction($action){
           $this->action = $action;
       }
        public function setId_user($id_user){
           $this->id_user = $id_user;
       }
        public function setPseudo($pseudo){
           $this->pseudo = $pseudo;
       }

              // GETTERS
        public function getId(){
           return $this->id;
       }
        public function getDate(){
           return $this->date;
       }
        public function getHeure(){
           return $this->heure;
       }
        public function getAction(){
           return $this->action;
       }
        public function getId_user(){
           return $this->id_user;
       }
        public function getPseudo(){
           return $this->pseudo;
       } 

    }
?>