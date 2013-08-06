<?php
    /**
    * Description of PaiementAPIManager_PDO
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PaiementAPI\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class PaiementAPIManager_PDO extends PaiementAPIManager{
        // Inserer votre code ici
        
        public function getLastOrderId(){
            $sql = 'SELECT MAX(id) as id
                    FROM '._DB_PREFIX_.$this->nameTable;

            $data=$this->dao->query($sql);
            //var_dump($data);

            return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public function getCAAnnClsOfDay($date, $paiemementaccep = NULL){
            $sql = '
                SELECT sum(montant) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE ((idAnnoncepub is NULL) OR (idAnnoncepub=0)) AND dateCmd="'.$date.'"'.
                 (isset($paiemementaccep)?' AND paiementEff='.$paiemementaccep:' ');
            
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
        
        public function getCAAnnPubOfDay($date,$paiemementaccep = NULL){
            $sql = '
                SELECT sum(montant) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE ((idAnnonce is NULL) OR (idAnnonce=0)) AND dateCmd="'.$date.'"'.
                (isset($paiemementaccep)?' AND paiementEff='.$paiemementaccep:' ');
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
        
        public function getNBAnnClsOfDay($date){
            $sql = '
                SELECT COUNT(*) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE ((idAnnoncepub is NULL) OR (idAnnoncepub=0)) AND dateCmd="'.$date.'"';
            
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
        
        public function getNBAnnPubOfDay($date){
            $sql = '
                SELECT COUNT(*) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE ((idAnnonce is NULL) OR (idAnnonce=0)) AND dateCmd="'.$date.'"';
                
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
        
        public function getNBCmdByPaiementMode($payementMode){
            $sql = '
                SELECT COUNT(*) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE idModpaiement='.$payementMode;
                
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
    }
?>