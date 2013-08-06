<?php
    /**
    * Description of PhotosAnnoncesGalleries
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PhotosAnnoncesGalleries\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class PhotosAnnoncesGalleries extends Record{
        protected $id;
        protected $url;
        protected $description;
        protected $type = "principale";
        protected  $idAnnonce;

        // SETTERS
        public function setId($id){
            $this->id = $id;
        }
        public function setIdAnnonce($idAnnonce){
            $this->idAnnonce = $idAnnonce;
        }
        public function setUrl($url){
            $this->url = $url;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setType($type){
            $this->type = $type;
        }

        // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getUrl(){
            return $this->url;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getType(){
            return $this->type;
        } 
        
        public function getIdAnnonce(){
            return $this->idAnnonce;
        }

    }
?>