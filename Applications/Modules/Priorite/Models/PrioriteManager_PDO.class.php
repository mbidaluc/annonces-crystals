<?php
    /**
     * Description of PrioriteManager_PDO
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Priorite\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class PrioriteManager_PDO extends PrioriteManager{
        // Inserer votre code ici
        public function getListePriorite(){
            $sql = 'SELECT t.*
                    FROM '.$this->nameTable.' as t
                    ORDER BY id DESC';

            $requete = $this->dao->query($sql);

            return $this->fecthAssoc_data($requete, $this->name);
        }

        public function getListePrioriteById($id){
            $sql = 'SELECT t.*
                    FROM '.$this->nameTable.' as t
                    WHERE t.id= :id
                    ORDER BY id DESC';

           $detail = $this->dao->prepare($sql);
           $detail->bindParam(':id', intval($id));
           $detail->execute();

            return $this->fecthAssoc_data($detail, $this->name);
        }

        public function updatePriorite(array $params){
            $objData = new Priorite($params);
            $sql = 'UPDATE '.$this->nameTable.' SET libelle = :Libelle, prix = :Prix WHERE id = :Id';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':Libelle',$objData->getLibelle());
            $req->bindParam(':Prix',$objData->getPrix());
            $req->bindParam(':Id',$objData->getId());
            //var_dump($objData);
            
            return $req->execute();
        }

        public function deletePriorite($id){
            $sql = 'DELETE
                    FROM '.$this->nameTable.'
                    WHERE id = :Id';

           $detail = $this->dao->prepare($sql);
           $detail->bindParam(':Id', $id);
           //var_dump($id);
            return $detail->execute();
        }

        public function addPriorite(array $params){
            $objData = new Priorite($params);
            $sql = 'INSERT  INTO '.$this->nameTable.' (libelle, prix) VALUES (:Libelle, :Prix)';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':Libelle',$objData->getLibelle());
            $req->bindParam(':Prix',$objData->getPrix());

            return $req->execute();
        }
    }
?>