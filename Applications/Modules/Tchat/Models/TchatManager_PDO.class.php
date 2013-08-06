<?php
    /**
    * Description of TchatManager_PDO
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\Tchat\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class TchatManager_PDO extends TchatManager{
        // Inserer votre code ici
        public  function AddChatOnline($pseudo, $idAnnonceur, $date){
            $sql = 'INSERT INTO '._DB_PREFIX_.'chat_online (online_user, online_chat_with, online_status, online_date) VALUES ("'.$pseudo.'", '.$idAnnonceur.', 1, "'.$date.'")';
            $req = $this->dao->prepare($sql);
            return $req->execute();
        }
        
        public  function UpdateUserOnlineStatus($pseudo, $idAnnonceur, $statut, $date){
            $sql = 'UPDATE '._DB_PREFIX_.'chat_online SET  online_status = '.$statut.' WHERE online_user= "'.$pseudo.'" AND online_chat_with = '.$idAnnonceur.' AND online_date="'.$date.'"';
            $req = $this->dao->prepare($sql);
            return $req->execute();
        }
        
        public  function getMyOnlineUser($idAnnonceur,$date){
            $sql = 'SELECT * FROM '._DB_PREFIX_.'chat_online WHERE online_chat_with = '.$idAnnonceur.' AND online_date="'.$date.'"';
            
            $data = $this->dao->query($sql);
             return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public  function getOnlineUserAttrribute($pseudo, $idAnnonceur,$date){
            $sql = 'SELECT * FROM '._DB_PREFIX_.'chat_online WHERE online_user= "'.$pseudo.'" AND online_chat_with = '.$idAnnonceur.' AND online_date="'.$date.'"';
            $data = $this->dao->query($sql);
             return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public  function DisconnectOnlineUser($pseudo, $idAnnonceur, $date){
            $sql = 'DELETE FROM '._DB_PREFIX_.'chat_online WHERE online_user= "'.$pseudo.'" AND online_chat_with = '.$idAnnonceur.' AND online_date="'.$date.'"';
            $req = $this->dao->prepare($sql);
            return $req->execute();
        }
        
        public  function getListMessage($pseudo, $idAnnonceur){
            $sql = 'SELECT * FROM '._DB_PREFIX_.$this->nameTable.' WHERE pseudo= "'.$pseudo.'" AND messageWriteto = '.$idAnnonceur;
            $data = $this->dao->query($sql);
            return fecthAssoc_data($data, $this->name);
        }
        
        public  function getExchangedMessage($pseudoClient, $pseudeAnnonceur, $date, $idAnnonceur){
            $sql = 'SELECT * FROM '._DB_PREFIX_.$this->nameTable.' WHERE pseudoClient= "'.$pseudoClient.'" AND pseudoAnnonceur = "'.$pseudeAnnonceur.'" AND dateMsg = "'.$date.'" AND messageWriteto = '.$idAnnonceur;;
           
            $data = $this->dao->query($sql);
            return $this->fecthAssoc_data($data, $this->name);
        }
        
    }
?>