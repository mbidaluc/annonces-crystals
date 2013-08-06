<?php
    /**
    * Description of PartenairesManager_PDO
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\Partenaires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class PartenairesManager_PDO extends PartenairesManager{
        // Inserer votre code ici
        
        public function addAss($idMember, $idPartenaire){
            $sql = 'INSERT INTO '._DB_PREFIX_.'partenaire_membre (idMembre, idPartenaire) VALUES ('.$idMember.', '.$idPartenaire.');';
            $insert = $this->dao->prepare($sql);
            
            return $insert->execute();
        }
    }
?>