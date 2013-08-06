<?php
/**
* Description of AdversitingManager_PDO
*
* @author ffozeu
*/
namespace Applications\Modules\Adversiting\Models;

if( !defined('IN') ) die('Hacking Attempt');

class AdversitingManager_PDO extends AdversitingManager{
    // Inserer votre code ici
    public function getLastAnnonceId(){
        $sql = 'SELECT MAX(id) as id
                FROM '._DB_PREFIX_.$this->nameTable;

        $data=$this->dao->query($sql);
        //var_dump($data);

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function getAnnonceByPositions(array $tabPosition, $idpage){
        $sql = 'SELECT DISTINCT a.*, h.technicalName
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                INNER JOIN '._DB_PREFIX_.'hook AS h ON (h.id=a.idPosition)
                INNER JOIN '._DB_PREFIX_.'tranche_adversiting AS ta ON (ta.idAdversitind = a.id)
                INNER JOIN '._DB_PREFIX_.'tranche AS t ON (t.idTanche = ta.idTanche)
                LEFT JOIN  '._DB_PREFIX_.'utilisateurs AS u ON (u.id=a.idUder)
                WHERE h.technicalName IN('.implode(',',$tabPosition).') AND a.active = 1 
                    AND ta.dateJour ="'.date("Y-m-d").'" AND t.heureFin > "'.date("H:i:s").'"
                    AND ta.idPage='.$idpage;
		//print_r($sql);
        $req = $this->dao->query($sql);
        $output = array();
		if($req){
			while ($data = $req->fetch(\PDO::FETCH_ASSOC)){            
				$output[] = $data;            
			}
			$req->closeCursor(); 
		}               
        return $output;
    }
    
    public function getAnnoncePubExpired($user=NULL, $filterOrder = NULL, $order = 'DESC', $page=1, $limit = null){
        $sql = 'SELECT DISTINCT an.* FROM '._DB_PREFIX_.$this->nameTable.' AS an
                WHERE an.id NOT IN (SELECT DISTINCT a.id
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                INNER JOIN '._DB_PREFIX_.'tranche_adversiting AS ta ON (ta.idAdversitind = a.id)
                INNER JOIN '._DB_PREFIX_.'tranche AS t ON (t.idTanche = ta.idTanche)
                WHERE ta.dateJour >="'.date("Y-m-d").'" AND t.heureFin >= "'.date("H:i:s").'"'.
                (isset($user)?' AND a.idUder='.$user:' ').')'.
                (isset($user)?' AND an.idUder='.$user:' ').
                (isset($filterOrder)?' ORDER BY '.$filterOrder.' '.$order:' ').
                ($limit?' LIMIT '.($page-1)*$limit.', '.$limit:' ');
                    
		//print_r($sql);
         $req = $this->dao->prepare($sql);
         $req->execute();
         return $this->fecthAssoc_data($req, $this->name);
    }
    
    public function deleteTrancheAnn($ids){
        $sql ='DELETE 
               FROM '._DB_PREFIX_.'tranche_adversiting 
               WHERE idAdversitind IN ('.  implode(',', $ids).')';
        return $this->dao->query($sql);
    }
    
    public function getMostPopularAnnonce($number = 3){
        $sql = 'SELECT DISTINCT a.*
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                INNER JOIN '._DB_PREFIX_.'tranche_adversiting AS ta ON (ta.idAdversitind = a.id)
                INNER JOIN '._DB_PREFIX_.'tranche AS t ON (t.idTanche = ta.idTanche)
                LEFT JOIN  '._DB_PREFIX_.'utilisateurs AS u ON (u.id=a.idUder)
                WHERE  a.active = 1 AND ta.dateJour >="'.date("Y-m-d").'" AND t.heureFin > "'.date("H:i:s").'"
                ORDER BY nbClick DESC  LIMIT '.intval($number);
		//print_r($sql);
        $req = $this->dao->prepare($sql);
        $req->execute();
        return $this->fecthAssoc_data($req, $this->name);
    }
        
    public function getInfoOrderAnnonce($id){
         $sql = 'SELECT o.montant, o.num_bordero, mp.lien
                FROM '._DB_PREFIX_.'order o
                LEFT JOIN '._DB_PREFIX_.'mode_paiement mp ON(mp.id = o.idModpaiement)
                WHERE o.idAnnoncepub='.$id;
        //var_dump($sql);
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
    
}
?>