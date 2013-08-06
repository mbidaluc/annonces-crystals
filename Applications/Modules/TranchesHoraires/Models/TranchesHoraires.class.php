<?php
    /**
    * Description of TranchesHoraires
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\TranchesHoraires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class TranchesHoraires extends Record{
        protected $idTanche;
        protected $heureDeb;
        protected $heureFin;
        protected $prix;
        protected $libelle;

                    // SETTERS = 
        public function setLibelle($libelle){
            $this->libelle = $libelle;
        }
        public function setIdTanche($idTanche){
            $this->idTanche = $idTanche;
        }
        public function setHeureDeb($heureDeb){
            $this->heureDeb = $heureDeb;
        }
        public function setHeureFin($heureFin){
            $this->heureFin = $heureFin;
        }
        public function setPrix($prix){
            $this->prix = $prix;
        }

        // GETTERS
        public function getIdTanche(){
            return $this->idTanche;
        }
        public function getHeureDeb(){
            return $this->heureDeb;
        }
        public function getHeureFin(){
            return $this->heureFin;
        }
        public function getPrix(){
            return $this->prix;
        }
        public function getLibelle(){
            return $this->libelle;
        }

    }
?>