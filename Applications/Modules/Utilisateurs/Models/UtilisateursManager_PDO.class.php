<?php
/**
 * Description of ConnexionManager_PDO
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Utilisateurs\Models;


class UtilisateursManager_PDO extends UtilisateursManager{

    //put your code here
    public function getInformations(){

    }

    public function getUtilisateurs(){
        $sql = 'SELECT c.*
                FROM '._DB_PREFIX_.$this->nameTable.' as c
                ORDER BY c.pseudo';

        $data=$this->dao->query($sql);

        return $this->fecthAssoc_data($data, $this->name);
    }

    public function getLastUtilisateurs(){
        $sql = 'SELECT MAX(id) as id
                FROM '._DB_PREFIX_.$this->nameTable;

        $data=$this->dao->query($sql);
        //var_dump($data);

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getLastGroupUtilisateurs(){
        $sql = 'SELECT MAX(id) as id
                FROM '._DB_PREFIX_.$this->nameTableGroupe;

        $data=$this->dao->query($sql);
        //var_dump($data);

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    public function verifLogin($param1, $param2){
        $sql = 'SELECT u.* FROM '._DB_PREFIX_.$this->nameTable.' as u
                WHERE u.pseudo = :pseudo
                AND u.password = :password
                AND u.is_active = 1';

        $login = $this->dao->prepare($sql);

        $login->BindValue(':pseudo', $param1);
        $login->BindValue(':password',$param2);
        //$login->BindValue(':password',(string)md5($param2));
        
        $login->execute();

        return $this->fecthAssoc_data($login, $this->name);
    }
    
    public function verifLoginnonactive($param1, $param2){
        $sql = 'SELECT u.* FROM '._DB_PREFIX_.$this->nameTable.' as u
                WHERE u.pseudo = :pseudo
                AND u.password = :password';

        $login = $this->dao->prepare($sql);

        $login->BindValue(':pseudo', (string)$param1);
        $login->BindValue(':password',(string)$param2);
        
        $login->execute();

        return $this->fecthAssoc_data($login, $this->name);
    }
    
    public function verifEmail($email){
        $sql = 'SELECT u.* FROM '._DB_PREFIX_.$this->nameTable.' as u
                WHERE u.email = "'.$email.'"';

        $email = $this->dao->prepare($sql);
        $email->execute();

        return $this->fecthAssoc_data($email, $this->name);
    }

    public function VerifieGroupPrivilege($idGroup, $idPriv){
        $sql='SELECT idGroup idDroit
            FROM c2w_posseder
            WHERE idGroup = :idGroup AND  idDroit = :idDroit';

        $sel = $this->dao->prepare($sql);

        $sel->bindValue(':idGroup', $idGroup);
        $sel->bindValue(':idDroit', $idPriv);
        $sel->execute();
        
        return $sel->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function deleteAllPrivGroup($idGroup){
        $sql='DELETE
              FROM '._DB_PREFIX_.'posseder
              WHERE idGroup = :idGroup';

        $sel = $this->dao->prepare($sql);
        $sel->bindValue(':idGroup', $idGroup);
        return $sel->execute();
    }

    public function getUtilisateursByID($id){
        $sql = 'SELECT c.*
                FROM '._DB_PREFIX_.$this->nameTable.' as c
                WHERE c.id = :id';

        $data = $this->dao->prepare($sql);
        $data->BindValue(':id',$id);

        $data->execute();

        return $this->fecthAssoc_data($data, $this->name);
    }

     public function getGroupeUtilisateursById($id){
         $sql = 'SELECT g.*
                FROM '._DB_PREFIX_.$this->nameTableGroupe.' as g
                WHERE g.id = :id';

        $data = $this->dao->prepare($sql);
        $data->BindValue(':id',$id);

        $data->execute();
        return $data->fetchAll(\PDO::FETCH_OBJ);
     }

    public function getGroupeUtilisateurs(){
        $sql = 'SELECT g.*
                FROM '._DB_PREFIX_.$this->nameTableGroupe.' as g
                ORDER BY g.nom_groupe';

        //echo $sql;
        $data = $this->dao->query($sql);
        //var_dump();

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getGroupesUtilisateur($idUser){
        $sql = 'SELECT g.*
                FROM '._DB_PREFIX_.$this->nameTableGroupe.' as g, c2w_appartenir as p
                WHERE g.id = p.idGroup AND p.idUser = :idUser
                ORDER BY g.nom_groupe';
        
        $data=$this->dao->prepare($sql);
        $data->BindValue(':idUser',$idUser);
        $data->execute();
        
        return $data->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function DeleteGroupesUtilisateur($idUser){
        $sql = 'DELETE FROM '._DB_PREFIX_.'appartenir WHERE idUser ='.$idUser;
        
        $data=$this->dao->prepare($sql);
        
        return $data->execute();
    }

    public function defineUserGroup($idUser, $idGroup){
        
        $sql='INSERT INTO c2w_appartenir (idGroup, idUser) VALUES (:idGroup, :idUser)';

        $insert = $this->dao->prepare($sql);

        $insert->bindValue(':idGroup', $idGroup);
        $insert->bindValue(':idUser', $idUser);
       
        //echo 'idg=='.$idGroup.' iduser = '.$idUser;
        return $insert->execute();
    }

    public function addGroupPrivilege($idGroup, $idPriv){
        $sql='INSERT INTO c2w_posseder (idGroup, idDroit) VALUES (:idGroup, :idDroit)';

        $insert = $this->dao->prepare($sql);

        $insert->bindValue(':idGroup', $idGroup);
        $insert->bindValue(':idDroit', $idPriv);

        //echo 'idg=='.$idGroup.' iduser = '.$idUser;
        return $insert->execute();
    }

    public function getDroit(){
        $sql = 'SELECT d.*
                FROM '._DB_PREFIX_.$this->nameTableDroit.' as d
                ORDER BY d.libelle';
        $data=$this->dao->query($sql);
        $data->execute();

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getDroitGroup($idG){
        $sql = 'SELECT d.*
                FROM '._DB_PREFIX_.$this->nameTableDroit.' as d, c2w_posseder as p
                WHERE d.id = p.idDroit AND p.idGroup = :idGroup
                ORDER BY d.libelle';
        
        $data=$this->dao->prepare($sql);
        
        $data->BindValue(':idGroup',$idG);
        $data->execute();

        return $data->fetchAll(\PDO::FETCH_ASSOC);
    }

    

    public function verifInscription($param1, $param2){
        $sql = 'SELECT u.id, u.pseudo, u.email FROM '._DB_PREFIX_.$this->nameTable.' as u
                WHERE u.pseudo = :pseudo
                OR u.email = :email';

        $login = $this->dao->prepare($sql);

        $login->BindValue(':pseudo',(string)$param1);
        $login->BindValue(':email',(string)$param2);

        $login->execute();

        return $this->fecthAssoc_data($login, $this->name);
    }

    public function addUser($params)
    {
        //var_dump($params);
        $objData = new Utilisateurs($params);
        $sql='INSERT INTO '._DB_PREFIX_.$this->nameTable.' (pseudo, email, password, is_active, nom, prenom, adresse, avatar, newsletter, pays, ville, code_postal, tel1, tel2, infos_complementaires) VALUES (:pseudo, :email, :password, :is_active, :nom, :prenom, :adresse, :avatar, :newsletter, :pays, :ville, :code_postal, :tel1, :tel2, :infos_complementaires)';
        
        $insert = $this->dao->prepare($sql);

        $insert->bindValue(':pseudo', $objData->getPseudo());
        $insert->bindValue(':email', $objData->getEmail());
        $insert->bindValue(':password', $objData->getPassword());
        $insert->bindValue(':is_active', $objData->getIs_active());
        $insert->bindValue(':nom', $objData->getNom());
        $insert->bindValue(':prenom', $objData->getPrenom());
        $insert->bindValue(':adresse', $objData->getAdresse());
        $insert->bindValue(':avatar', $objData->getAvatar());
        $insert->bindValue(':newsletter', $objData->getNewsletter());
        //:pays, :ville, :code_postal, :tel1, :tel2, :infos_complementaires
        $insert->bindValue(':pays', $objData->getPays());
        $insert->bindValue(':ville', $objData->getVille());
        $insert->bindValue(':code_postal', $objData->getCode_postal());
        $insert->bindValue(':tel1', $objData->getTel1());
        $insert->bindValue(':tel2', $objData->getTel2());
        $insert->bindValue(':infos_complementaires', $objData->getInfos_complementaires());
        return $insert->execute();       

    }

    function addGroupUser($nameG){

        $sql='INSERT INTO '._DB_PREFIX_.$this->nameTableGroupe.' (nom_groupe) VALUES (:Libelle)';
        $req=$this->dao->prepare($sql);

        $req->bindParam(':Libelle', $nameG);

        return $req->execute();
    }

    public function updateUser($params) {
        $objData = new Utilisateurs($params);
        $edit = $this->dao->prepare('
        UPDATE '._DB_PREFIX_.$this->nameTable.'
        SET pseudo = :pseudo, email = :email, password = :password, nom = :nom, prenom = :prenom, adresse = :adresse, avatar = :avatar, newsletter = :newsletter, is_active = :is_active, pays = :pays, ville = :ville, code_postal = :code_postal, tel1 = :tel1, tel2 = :tel2, infos_complementaires = :infos_complementaires
        WHERE id = :id');

        $edit->bindValue(':pseudo', $objData->getPseudo());
        $edit->bindValue(':email', $objData->getEmail());
        $edit->bindValue(':password', $objData->getPassword());
        $edit->bindValue(':is_active', $objData->getIs_active());
        $edit->bindValue(':nom', $objData->getNom());
        $edit->bindValue(':prenom', $objData->getPrenom());
        $edit->bindValue(':adresse', $objData->getAdresse());
        $edit->bindValue(':avatar', $objData->getAvatar());
        $edit->bindValue(':newsletter', $objData->getNewsletter());
        $edit->bindParam(':id', intval($objData->getId()));
        
        $edit->bindValue(':pays', $objData->getPays());
        $edit->bindValue(':ville', $objData->getVille());
        $edit->bindValue(':code_postal', $objData->getCode_postal());
        $edit->bindValue(':tel1', $objData->getTel1());
        $edit->bindValue(':tel2', $objData->getTel2());
        $edit->bindValue(':infos_complementaires', $objData->getInfos_complementaires());
        
        //var_dump($objData);
        
        return $edit->execute();
    }

    public function updateGroupUser($id, $nameG){

        $edit = $this->dao->prepare('
        UPDATE '._DB_PREFIX_.$this->nameTableGroupe.'
        SET nom_groupe = :nom_groupe
        WHERE id = :id');

        $edit->bindParam(':nom_groupe', $nameG);
        $edit->bindParam(':id', $id);
        
        return $edit->execute();
    }
    
    public function findUserById($id){

        return $this->fecthRow_data($this->findById($this->nameTable, $id), $this->name);
    }

    public function deleteUser(array $id){

        return $this->delete($this->nameTable, $id);
    }
    
    public function deleteGroupesUser(array $id){

        return $this->delete($this->nameTableGroupe, $id);
    }

    public function deleteAllUserGroup($id){
        $delete = $this->dao->prepare('
        DELETE FROM c2w_appartenir
        WHERE idUser = :id');

        $delete->bindParam(':id', $id);

        return $delete->execute();
    }

    public function deleteAllGroupPrivileges($id){
        $delete = $this->dao->prepare('
        DELETE FROM c2w_posseder
        WHERE idGroup = :id');

        $delete->bindParam(':id', $id);

        return $delete->execute();
    }

    public function deletePvilegeForGroup($idGroup, $idPriv){
        $delete = $this->dao->prepare('
        DELETE FROM c2w_posseder
        WHERE idGroup = :id AND idDroit = :idDroit');

        $delete->bindParam(':id', $idGroup);
        $delete->bindParam(':idDroit', $idPriv);

        return $delete->execute();
    }


}

?>
