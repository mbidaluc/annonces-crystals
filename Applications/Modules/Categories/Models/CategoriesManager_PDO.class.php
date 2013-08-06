<?php

/**
 * Description of CategoriesManager_PDO
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Categories\Models;

if( !defined('IN') ) die('Hacking Attempt');

class CategoriesManager_PDO extends CategoriesManager{

    /**
     * Liste toutes les Catégories Parentes
     */
    public function getListeParent($visiblesite = 0){

        $sql = 'SELECT idFils, idParent, libelle, image, description
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE idParent = 0 AND active = 1';
        if($visiblesite)
            $sql .= ' AND frontVisitility=1';
        $sql .= ' ORDER BY libelle';
        
	$requete = $this->dao->query($sql);

        return $this->fecthAssoc_data($requete, $this->name);
    }
    
    public function getListeParentFront($active=1,$page=1,$limit=16){
         $sql ='SELECT SQL_CALC_FOUND_ROWS c.* 
                FROM '._DB_PREFIX_.$this->nameTable.' AS c 
                WHERE c.active=:active
                AND idParent = 0
                AND frontVisitility=1
                ORDER BY c.position ASC LIMIT '.($page-1)*$limit.','.$limit;
        $data = $this->dao->prepare($sql);        
        $data->bindParam(':active', intval($active));        
        $data->execute();

        return $this->fecthAssoc_data($data, $this->name);
        
    }

     /**
     * Liste toutes les Catégories Fils d'une Catégorie Parente
     */
    public function getListeFilsByIdParent($idParent){

        $sql = 'SELECT c.*
                FROM '._DB_PREFIX_.$this->nameTable.' as c
                WHERE c.idParent = :IdParent
                AND c.idParent <> 0
                AND c.active = 1
                ORDER BY RAND() LIMIT 6';
        $detail = $this->dao->prepare($sql);
        $detail->bindParam(':IdParent', intval($idParent));
        $detail->execute();
        return $this->fecthAssoc_data($detail, $this->name);
    }

    public function getListeCategories(){
        
    }

    public function nbAnnonces($id){
        $objAnnonce = new Annonce(NULL);
        $sql = 'SELECT COUNT(id)
                FROM '._DB_PREFIX_.$objAnnonce->nameTable.'
                WHERE idCategorie = :IdCat';
        //echo $sql;
        $detail = $this->dao->prepare($sql);
        $detail->bindParam(':IdCat', intval($id));
        $detail->execute();

        return $this->fecthAssoc_data($detail, $this->name);
    }

    public function getCategories($active=1, $fovisual, $search=''){
        
        $sql =' SELECT c.* 
                FROM '._DB_PREFIX_.$this->nameTable.' AS c 
                WHERE c.active=:active';
        
        if($search !='')
            $sql .=' AND c.libelle LIKE"'.$search.'%"';
        if($fovisual)        
            $sql .=' AND c.frontVisitility = :frontVisitility';
        $sql .= ' ORDER BY c.position ASC';
        
        $data = $this->dao->prepare($sql);        
        $data->bindParam(':active', intval($active));
        if($fovisual)
            $data->bindParam(':frontVisitility', intval($fovisual));
        $data->execute();

        return $this->fecthAssoc_data($data, $this->name);
        
    }
    public function getListCategory($active=1,$page=1,$limit=16){
        $sql =' SELECT SQL_CALC_FOUND_ROWS c.* 
                FROM '._DB_PREFIX_.$this->nameTable.' AS c 
                WHERE c.active=:active
                ORDER BY c.position ASC LIMIT '.($page-1)*$limit.','.$limit;
        
        $data = $this->dao->prepare($sql);        
        $data->bindParam(':active', intval($active));        
        $data->execute();

        return $this->fecthAssoc_data($data, $this->name);
    }
    public function getNumberRows(){
        $sql='SELECT FOUND_ROWS() AS number';
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
    
    public function getMostPopularCategory($limit=3){
        $sql =' SELECT c.*, count(a.idCategorie) as nbannonce
                FROM '._DB_PREFIX_.$this->nameTable.' AS c, '._DB_PREFIX_.'annonce as a
                WHERE c.idFils = a.idCategorie AND c.active=1
                GROUP BY a.idCategorie 
                ORDER BY nbannonce DESC 
                LIMIT '.$limit;
        //print_r($sql);
        $req = $this->dao->query($sql);
        $data = $req->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }
}

?>
