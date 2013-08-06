<?php
    /**
    * Description of TranchesHorairesManager_PDO
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\TranchesHoraires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class TranchesHorairesManager_PDO extends TranchesHorairesManager{
        // Inserer votre code ici
        
        public function getTranchesNonOccupes($date, $page, $position){
            $sql = 'SELECT t.* FROM '._DB_PREFIX_.$this->nameTable.' as t WHERE t.idTanche NOT IN (SELECT idTanche FROM '._DB_PREFIX_.'tranche_adversiting WHERE dateJour = "'.$date.'" AND idPage ='.$page.' AND idPosition ='.$position.' )';
            
            $requete = $this->dao->query($sql);
            //var_dump($sql);
            return $this->fecthAssoc_data($requete, $this->name);           
        }
		
		public function getSumPriceTranchesNonOccupes($date, $page, $position){
            $sql = 'SELECT idTanche FROM '._DB_PREFIX_.'tranche_adversiting WHERE dateJour = "'.$date.'" AND idPage ='.$page.' AND idPosition ='.$position;
            $requete = $this->dao->query($sql);
            $info = $requete->fetchAll(\PDO::FETCH_OBJ);
            //var_dump($info);
            if(!sizeof($info)){
                $sql = 'SELECT SUM(t.prix) as prix FROM '._DB_PREFIX_.$this->nameTable.' as t WHERE t.idTanche NOT IN (SELECT idTanche FROM '._DB_PREFIX_.'tranche_adversiting WHERE dateJour = "'.$date.'" AND idPage ='.$page.' AND idPosition ='.$position.' )';

                $requete = $this->dao->query($sql);
                $info = $requete->fetchAll(\PDO::FETCH_OBJ);
                return $info[0]->prix;
            }
            return "";
        }
        
        public function addTranchesAnnonce($date, $idAnnPub, $duree, $UniteTempsAnnonce, $IdsHoraires, $page, $position){
            $temps = 0;
            $cpt = 1;
            $isdatetoday =1;
            $out = array();
            //$out['idpub'] = $idAnnPub;
            /*if($UniteTempsAnnonce === "Minute"){
                $temps = $dureeAnnonce*60;
            }*/
            $lejour = 3600*24;    
 
            if($UniteTempsAnnonce === "Jour"){
                $cpt = $duree;
            }
            
            if($UniteTempsAnnonce === "Semaine"){
                $cpt = $duree*7;
            }
            
            if($UniteTempsAnnonce === "Mois")
                $cpt = $duree*30;
            
            if($UniteTempsAnnonce === "Annee")
                 $cpt = $duree*3600*365;
            
            $sql = 'INSERT INTO '._DB_PREFIX_.'tranche_adversiting (idTanche, idAdversitind, idPage, idPosition, dateJour) VALUES ';
            $timestpdate = strtotime($date);
            for($i = 0; $i< $cpt; $i++){
                if($isdatetoday){
                    $ladate = $date;
                    $isdatetoday = 0;
                }else{
                    $temps = $timestpdate + $lejour*$i;
                    $ladate = date("Y-m-d", $temps);
                }
                
                foreach ($IdsHoraires as $value) {
                    $sql.= '('.$value.', '.$idAnnPub.', '.$page.', '.$position.', "'.$ladate.'"),';
                }
            }
            $sql = substr($sql, 0, -1);
            
            $req=$this->dao->prepare($sql);
            //echo $sql;
            return $req->execute();
        }
        
        public function addTranchesAnnoncePleinTemps($date, $idAnnPub, $duree, $UniteTempsAnnonce, $page, $position){
            $temps = 0;
            $cpt = 1;
            $isdatetoday =1;
            /*if($UniteTempsAnnonce === "Minute"){
                $temps = $dureeAnnonce*60;
            }*/
            $IdsHoraires = $this->getTranchesNonOccupes($date, $page, $position);
            $lejour = 3600*24;    
 
            if($UniteTempsAnnonce === "Jour"){
                $cpt = $duree;
            }
            
            if($UniteTempsAnnonce === "Semaine"){
                $cpt = $duree*7;
            }
            
            if($UniteTempsAnnonce === "Mois")
                $cpt = $duree*30;
            
            if($UniteTempsAnnonce === "Annee")
                 $cpt = $duree*3600*365;
            
            $sql = 'INSERT INTO '._DB_PREFIX_.'tranche_adversiting (idTanche, idAdversitind, idPage, idPosition, dateJour) VALUES ';
            $timestpdate = strtotime($date);
            for($i = 0; $i< $cpt; $i++){
                if($isdatetoday){
                    $ladate = $date;
                    $isdatetoday = 0;
                }else{
                    $temps = $timestpdate + $lejour*$i;
                    $ladate = date("Y-m-d", $temps);
                }
                
                foreach ($IdsHoraires as $value) {
                    $sql.= '('.$value->getIdTanche().', '.$idAnnPub.', '.$page.', '.$position.', "'.$ladate.'"),';
                }
            }
            $sql = substr($sql, 0, -1);
                        
            $req = $this->dao->prepare($sql);
            //echo $sql;
            return $req->execute();
        }
        
        public function getLastTranche($idPub){
            $sql = 'SELECT DISTINCT ta.*, t.heureFin
                    FROM '._DB_PREFIX_.'tranche_adversiting as ta, '._DB_PREFIX_.'tranche as t
                    WHERE ta.idTanche = t.idTanche 
                    AND ta.idTanche IN (SELECT Max(idTanche) FROM '._DB_PREFIX_.'tranche_adversiting WHERE idAdversitind ='.$idPub.')    
                    AND ta.dateJour IN (SELECT Max(dateJour) FROM '._DB_PREFIX_.'tranche_adversiting WHERE idAdversitind ='.$idPub.')
                    AND ta.idAdversitind ='.$idPub;
            //echo $sql;
            
            $data=$this->dao->query($sql);
            return $data->fetchAll(\PDO::FETCH_OBJ);
        }
    }
?>