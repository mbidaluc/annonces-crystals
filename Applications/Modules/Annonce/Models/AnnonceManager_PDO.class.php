<?php
/**
* Description of AnnonceManager_PDO
*
* @author mbida luc
*/
namespace Applications\Modules\Annonce\Models;

if( !defined('IN') ) die('Hacking Attempt');

class AnnonceManager_PDO extends AnnonceManager{
    // Inserer votre code ici

    public function getLastAnnonceId(){
        $sql = 'SELECT MAX(id) as id
                FROM '._DB_PREFIX_.$this->nameTable;

        $data=$this->dao->query($sql);
        //var_dump($data);

        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAnnoncePeriode($date, $cat){
        $sql = 'SELECT DISTINCT a.*, p.*,c.libelle FROM '._DB_PREFIX_.$this->nameTable.' as a, '._DB_PREFIX_.'photos_annonces as p, '._DB_PREFIX_.'categorie as c WHERE a.id=p.idAnnonce AND c.idFils=a.idCategorie AND p.type="principale" AND a.dateexp >= "'.$date.'" AND a.is_actived = 1 AND a.idCategorie IN ('.implode(',',$cat).')';

        echo $sql;
        $requete = $this->dao->query($sql);
        return $requete->fetchAll(\PDO::FETCH_OBJ);         
    }
    
    public function getActivedAnnonce($filterOrder = NULL, $order = 'DESC'){
        $sql = 'SELECT * 
                FROM '._DB_PREFIX_.$this->nameTable.' as t
                WHERE is_actived=1 AND dateexp>=NOW() '.(isset($filterOrder)?'ORDER BY '.$filterOrder.' '.$order:'');        
        $req = $this->dao->prepare($sql);
        $req->execute();
        return $this->fecthAssoc_data($req, $this->name);
    }

    public function getResultsSearch(array $param,$page=1,$limit=5){ //, $chps, $ville, $categorie, $prixmin, $prixmax
        $cond ='';
        $where =array();
        $where[] = 'a.is_actived = 1';

        if(!empty($param['categorie']))
            $where[] = 'a.idCategorie IN'.$param['categorie'];

        if(!empty($param['prixmin']))
            $where[] = 'a.prixTotal >= '.intval($param['prixmin']);

        if(!empty($param['prixmax']))
            $where[] = 'a.prixTotal <= '.intval($param['prixmax']);

        if(!empty($param['ville']))
            $where[] = 'a.ville LIKE "%'.$param['ville'].'%"';

        if(is_array($param['chps']) && sizeof($param['chps'])){
            $paramtext = array();
            foreach ($param['chps'] as $value) {
                if(!empty($value)){
                    $paramtext []= 'a.designation LIKE "%'.$value.'%"';
                    $paramtext []= 'a.texte LIKE "%'.$value.'%"';
                }
            }
            $where[] = implode(' OR ', $paramtext);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.* FROM '._DB_PREFIX_.$this->nameTable.' as a
            WHERE '.  implode(' AND ', $where).'
            LIMIT '.($page-1)*$limit.', '.$limit;
        $requete = $this->dao->query($sql);
        return $this->fecthAssoc_data($requete, $this->name); 
    }
    /**
     * retourne le nombre d'annonce d'une catégorie
     * @param type $idCat
     * @return type 
     */
    public function getNumberAnnonceByCategory($idCat){
        $sql = 'SELECT COUNT(id) AS number
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE idCategorie = :IdCat AND is_actived = 1 AND dateexp > NOW()';
        $detail = $this->dao->prepare($sql);
        $detail->bindParam(':IdCat', intval($idCat));
        $detail->execute();
        $data = $detail->fetch(\PDO::FETCH_OBJ);

        return $data->number;
    }
    /**
     * retoune ne nombre total des annonces d'une catégorie
     * @param type $idCat
     * @return type 
     */
    public function getAnnonceByCategory($idCat,$page=1,$limit=5){
        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.*
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                INNER JOIN '._DB_PREFIX_.'categorie c ON (c.idFils = a.idCategorie)
                WHERE (c.idParent = :IdCat OR a.idCategorie = :IdCat) AND a.is_actived = 1 AND a.dateexp > NOW()
                ORDER BY idPriorite ASC, a.dateDebut DESC LIMIT '.($page-1)*$limit.', '.$limit;
        //var_dump($sql);
        $req = $this->dao->prepare($sql);
        $req->bindParam(':IdCat', intval($idCat));
        $req->execute();
        return $this->fecthAssoc_data($req, $this->name);
    }
    public function getAnnonceByCategories($idCats=array()){
        $sql = 'SELECT SQL_CALC_FOUND_ROWS a.*
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                WHERE idCategorie IN('.implode(',',$idCats).') AND is_actived = 1 AND dateexp > NOW()
                ORDER BY idPriorite ASC, dateDebut DESC';
        $req = $this->dao->query($sql);
        return $this->fecthAssoc_data($req, $this->name);
    }
    public function getTotalAnnonce(){
        $sql = 'SELECT COUNT(*) AS number
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE is_actived = 1 AND dateexp > NOW()';
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);

        return $data->number;
    }

    public function getAnnonceByPositions(array $tabPosition){
        $sql = 'SELECT a.*, h.technicalName, i.url AS imageP, c.defaultAnnonceImage AS defaultImage,  c.link_rewrite AS link_rewrite_cat
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                INNER JOIN '._DB_PREFIX_.'hook AS h ON (h.id=a.idPosition)
                INNER JOIN '._DB_PREFIX_.'categorie AS c ON (c.idFils=a.idCategorie)
                LEFT JOIN  '._DB_PREFIX_.'utilisateurs AS u ON (u.id=a.idUder)
                LEFT JOIN '._DB_PREFIX_.'photos_annonces AS i ON (i.idAnnonce=a.id AND i.type ="principale")
                WHERE h.technicalName IN('.implode(',',$tabPosition).') AND a.is_actived = 1 AND a.dateexp > NOW()
                    AND IF (a.typeFacturation="click", u.nbCredits >= h.coutCredit,1)
                ORDER BY a.idPriorite ASC, a.dateDebut DESC';
        $req = $this->dao->query($sql);
        $output = array();
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)){            
            $output[] = $data;            
        }
        $req->closeCursor();        
        return $output;
    }

    public function getAnnonceByIdUser($idUser, $nber=null){
        $sql = 'SELECT a.*
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                WHERE idUder='.$idUser.' AND is_actived = 1 AND dateexp > NOW()
                ORDER BY idPriorite ASC, dateDebut DESC'.($nber?' LIMIT '.intval($nber):'');
        $req = $this->dao->query($sql);
        return $this->fecthAssoc_data($req, $this->name);
    }

    public function getNumberAnnonceByIdUser($idUser){
        $sql = 'SELECT COUNT(*) as number
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE idUder='.$idUser.' AND is_actived = 1 AND dateexp > NOW()';
        //var_dump($sql);
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data->number;
    }
    
    public function getNumberRows(){
        $sql='SELECT FOUND_ROWS() AS number';
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
    
    public function getMostPopularAnnonce($number = 3){
        $sql = 'SELECT a.*
                FROM '._DB_PREFIX_.$this->nameTable.' AS a
                WHERE  is_actived = 1 AND dateexp > NOW()
                ORDER BY nbClick DESC  LIMIT '.intval($number);
        //echo $sql;
        $req = $this->dao->query($sql);
        return $this->fecthAssoc_data($req, $this->name);
    }
    
    public function getExpiredAnnoncesByIdUser($id_user){
        $sql = 'SELECT *
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE idUder='.$idUser.' AND is_actived = 1 AND dateexp < NOW()';
        
        $req = $this->dao->query($sql);
        return $this->fecthAssoc_data($req, $this->name);
    }
    
    public function getInfoOrderAnnonce($id){
         $sql = 'SELECT o.montant, o.num_bordero, mp.lien
                FROM '._DB_PREFIX_.'order o
                LEFT JOIN '._DB_PREFIX_.'mode_paiement mp ON(mp.id = o.idModpaiement)
                WHERE o.idAnnonce='.$id;
        //var_dump($sql);
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
}
?>