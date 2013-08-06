<?php
/**
 * Description of PaysManager_PDO
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Pays\Models;

if( !defined('IN') ) die('Hacking Attempt');

class PaysManager_PDO extends PaysManager{
    
    public function getListePays(){
        
        $sql="SELECT p.* FROM ".$this->nameTable." p WHERE p.etat=1";
        $requete = $this->dao->query($sql);
        
        return $this->fecthAssoc_data($requete, $this->name);
    }
    
    public function findPaysById($id){
        
        return $this->fecthRow_data($this->findById($this->nameTable, $id), $this->name);
    }
}

?>
