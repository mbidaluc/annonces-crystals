<?php
    /**
    * Description of ConfigSMTP
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\ConfigSMTP\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class ConfigSMTP extends Record{
         protected $id;
         protected $serveurMail;
         protected $emailSite;
         protected $nomExpediteur;
         protected $identificationSMTP;
         protected $securiteSMTP;
         protected $portSMTP;
         protected $utilisateurSMTP;
         protected $passwordSMTP;
         protected $serveurSMTP;

                  // SETTERS
         public function setId($id){
                $this->id = $id;
        }
         public function setServeurMail($serveurMail){
                $this->serveurMail = $serveurMail;
        }
         public function setEmailSite($emailSite){
                $this->emailSite = $emailSite;
        }
         public function setNomExpediteur($nomExpediteur){
                $this->nomExpediteur = $nomExpediteur;
        }
         public function setIdentificationSMTP($identificationSMTP){
                $this->identificationSMTP = $identificationSMTP;
        }
         public function setSecuriteSMTP($securiteSMTP){
                $this->securiteSMTP = $securiteSMTP;
        }
         public function setPortSMTP($portSMTP){
                $this->portSMTP = $portSMTP;
        }
         public function setUtilisateurSMTP($utilisateurSMTP){
                $this->utilisateurSMTP = $utilisateurSMTP;
        }
         public function setPasswordSMTP($passwordSMTP){
                $this->passwordSMTP = $passwordSMTP;
        }
         public function setServeurSMTP($serveurSMTP){
                $this->serveurSMTP = $serveurSMTP;
        }

                   // GETTERS
         public function getId(){
                return $this->id;
        }
         public function getServeurMail(){
                return $this->serveurMail;
        }
         public function getEmailSite(){
                return $this->emailSite;
        }
         public function getNomExpediteur(){
                return $this->nomExpediteur;
        }
         public function getIdentificationSMTP(){
                return $this->identificationSMTP;
        }
         public function getSecuriteSMTP(){
                return $this->securiteSMTP;
        }
         public function getPortSMTP(){
                return $this->portSMTP;
        }
         public function getUtilisateurSMTP(){
                return $this->utilisateurSMTP;
        }
         public function getPasswordSMTP(){
                return $this->passwordSMTP;
        }
         public function getServeurSMTP(){
                return $this->serveurSMTP;
        } 

    }
?>