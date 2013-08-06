<?php
    /**
    * Description of MembersManager_PDO
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\Members\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class MembersManager_PDO extends MembersManager{
        // Inserer votre code ici
        
        public function getLastMemberId(){
            $sql = 'SELECT MAX(id_member) as id_member
                    FROM '._DB_PREFIX_.$this->nameTable;

            $data=$this->dao->query($sql);
            //var_dump($data);

            return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public function verifEmail($email){
            $sql = 'SELECT m.* FROM '._DB_PREFIX_.$this->nameTable.' as m
                    WHERE m.email_member = "'.$email.'"';

            $email = $this->dao->prepare($sql);
            $email->execute();

            return $this->fecthAssoc_data($email, $this->name);
        }
        
        public function getCategorie($idMember){
            $sql = 'SELECT c.*, n.* FROM '._DB_PREFIX_.'categorie as c, '._DB_PREFIX_.'newsletters as n WHERE c.idFils = n.idCategorie AND n.IdMembers ='.$idMember;
        
            $data = $this->dao->query($sql);
            return $data->fetchAll(\PDO::FETCH_OBJ);    
        }
        
        public function getAbonnesPartenaires($idPartenaire){
            $sql = $sql = 'SELECT a.* FROM '._DB_PREFIX_.$this->nameTable.' as a, '._DB_PREFIX_.'partenaire_membre as b, '._DB_PREFIX_.'partenaire as c WHERE a.id_member = b.idMembre AND b.idPartenaire = c.id AND c.id = '.$idPartenaire;
            
            $data=$this->dao->query($sql);

             return $this->fecthAssoc_data($data, $this->name);
        }
    }
?>