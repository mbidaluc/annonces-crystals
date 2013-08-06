<?php
    /**
    * Description of PaiementCredits
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\PaiementCredits\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class PaiementCredits extends Record{
        protected $id;
        protected $nom_expediteur;
        protected $montant;
        protected $num_bordero;
        protected $beneficiaire;
        protected $num_tel;
        protected $password;
        protected $ville;
        protected $idPack;
        protected $idModpaiement;
        protected $dateEnreg;
        protected $idUser;
        protected $paiementEff;
        protected $dateCmd;
        protected $heureCmd;

                // SETTERS
        public function setDateEnreg($dateEnreg){
            $this->dateEnreg = $dateEnreg;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function setNom_expediteur($nom_expediteur){
            $this->nom_expediteur = $nom_expediteur;
        }
        public function setMontant($montant){
            $this->montant = $montant;
        }
        public function setNum_bordero($num_bordero){
            $this->num_bordero = $num_bordero;
        }
        public function setBeneficiaire($beneficiaire){
            $this->beneficiaire = $beneficiaire;
        }
        public function setNum_tel($num_tel){
            $this->num_tel = $num_tel;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setVille($ville){
            $this->ville = $ville;
        }
        public function setIdPack($idPack){
            $this->idPack = $idPack;
        }
        public function setIdModpaiement($idModpaiement){
            $this->idModpaiement = $idModpaiement;
        }
         public function setIdUser($idUser){
            $this->idUser = $idUser;
        }
         public function setPaiementEff($paiementEff){
            $this->paiementEff = $paiementEff;
        }
        
         public function setDateCmd($dateCmd){
            $this->dateCmd = $dateCmd;
        }
                
        public function setHeureCmd($heureCmd){
            $this->heureCmd = $heureCmd;
        }

                    // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getNom_expediteur(){
            return $this->nom_expediteur;
        }
        public function getMontant(){
            return $this->montant;
        }
        public function getNum_bordero(){
            return $this->num_bordero;
        }
        public function getBeneficiaire(){
            return $this->beneficiaire;
        }
        public function getNum_tel(){
            return $this->num_tel;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getVille(){
            return $this->ville;
        }
        public function getIdPack(){
            return $this->idPack;
        }
        public function getIdModpaiement(){
            return $this->idModpaiement;
        } 
        
        public function getDateEnreg(){
            return $this->dateEnreg;
        }
        
        public function getIdUser(){
            return $this->idUser;
        }
         public function getPaiementEff(){
            return $this->paiementEff;
        }
        
        public function getDateCmd(){
            return $this->dateCmd ;
        }
        
        public function getHeureCmd(){
            return $this->heureCmd;
        }

    }
?>