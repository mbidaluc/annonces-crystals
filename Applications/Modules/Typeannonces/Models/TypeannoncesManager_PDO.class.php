<?php
    /**
     * Description of TypeannoncesManager_PDO
     *
     * @author MBIDA LUC
     */
    namespace Applications\Modules\Typeannonces\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class TypeannoncesManager_PDO extends TypeannoncesManager{
        // Inserer votre code ici

        public function getListeTypeAnnonces(){
            $sql = 'SELECT t.*
                    FROM '.$this->nameTable.' as t
                    ORDER BY id DESC';

            $requete = $this->dao->query($sql);

            return $this->fecthAssoc_data($requete, $this->name);
        }

        public function getListeTypeAnnoncesById($id){
            $sql = 'SELECT t.*
                    FROM '.$this->nameTable.' as t
                    WHERE t.id= :id
                    ORDER BY id DESC';

           $detail = $this->dao->prepare($sql);
           $detail->bindParam(':id', intval($id));
           $detail->execute();

            return $this->fecthAssoc_data($detail, $this->name);
        }

        public function updateTypeAnnonces(array $params){
            $objData = new Typeannonces($params);
            $sql = 'UPDATE '.$this->nameTable.' SET libelle = :Libelle, prix = :Prix WHERE id = :Id';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':Libelle',$objData->getLibelle());
            $req->bindParam(':Prix',$objData->getPrix());
            $req->bindParam(':Id',$objData->getId());
        }

        public function deleteTypeAnnoncesById($id){
            $sql = 'DELETE
                    FROM '.$this->nameTable.' as t
                    WHERE t.id= :id';

           $detail = $this->dao->prepare($sql);
           $detail->bindParam(':id', intval($id));

            return $detail->execute();
        }

        public function addTypeAnnonces(array $params){
            $objData = new Typeannonces($params);
            $sql = 'INSERT  INTO '.$this->nameTable.' (libelle, prix) VALUES (:Libelle, :Prix)';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':Libelle',$objData->getLibelle());
            $req->bindParam(':Prix',$objData->getPrix());

            return $req->execute();
        }
    }
?>