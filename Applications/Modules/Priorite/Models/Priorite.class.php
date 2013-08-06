<?php
    /**
     * Description of Priorite
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Priorite\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Priorite extends Record{
        // Inserer votre code ici
        protected $id;
        protected $libelle;
        protected $prix;

        public function setId($id) {

        $this->id = $id;

        }

        public function setLibelle($libelle) {

            $this->libelle = $libelle;

        }

        public function setPrix($prix) {

            $this->prix = $prix;

        }

        //gettter
         public function getId() {

            return $this->id;

        }

        public function getLibelle() {

            return $this->libelle;

        }

        public function getPrix() {

            return $this->prix;

        }

    }
?>