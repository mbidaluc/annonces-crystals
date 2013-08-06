<?php
    /**
     * Description of Typeannonces
     *
     * @author MBIDA LUC
     */
    namespace Applications\Modules\Typeannonces\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Typeannonces extends Record{
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