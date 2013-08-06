<?php
    /**
    * Description of Tchat
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\Tchat\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Tchat extends Record{
        protected $message_id;
        protected $message_text;
        protected $pseudo;
        protected $timestamp;
        protected $messageWriteto;
        protected $concerningIdAnnonce;
        protected $pseudoClient;
        protected $pseudoAnnonceur;
        protected $dateMsg;

                    // SETTERS
        public function setPseudoClient($pseudoClient){
            $this->pseudoClient = $pseudoClient;
        }
        public function setDateMsg($dateMsg){
            $this->dateMsg = $dateMsg;
        }
        public function setPseudoAnnonceur($pseudoAnnonceur){
            $this->pseudoAnnonceur = $pseudoAnnonceur;
        }
        public function setConcerningIdAnnonce($concerningIdAnnonce){
            $this->concerningIdAnnonce = $concerningIdAnnonce;
        }
        public function setMessage_id($message_id){
            $this->message_id = $message_id;
        }
        public function setMessage_text($message_text){
            $this->message_text = $message_text;
        }
        public function setPseudo($pseudo){
            $this->pseudo = $pseudo;
        }
        public function setTimestamp($timestamp){
            $this->timestamp = $timestamp;
        }
        public function setMessageWriteto($messageWriteto){
            $this->messageWriteto = $messageWriteto;
        }

                    // GETTERS
        public function getMessage_id(){
            return $this->message_id;
        }
        public function getMessage_text(){
            return $this->message_text;
        }
        public function getPseudo(){
            return $this->pseudo;
        }
        public function getTimestamp(){
            return $this->timestamp;
        }
        public function getMessageWriteto(){
            return $this->messageWriteto;
        } 
        public function getConcerningIdAnnonce(){
            return $this->concerningIdAnnonce;
        }
        public function getPseudoClient(){
            return $this->pseudoClient;
        }
        public function getDateMsg(){
            return $this->dateMsg;
        }
        public function getPseudoAnnonceur(){
            return $this->pseudoAnnonceur;
        }

    }
?>