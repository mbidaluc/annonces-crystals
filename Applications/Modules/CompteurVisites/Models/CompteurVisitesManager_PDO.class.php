<?php
    /**
    * Description of CompteurVisitesManager_PDO
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\CompteurVisites\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class CompteurVisitesManager_PDO extends CompteurVisitesManager{
        // Inserer votre code ici
        public function InsertNewVisiteur(){
            $sql = 'INSERT INTO '._DB_PREFIX_.$this->nameTable.' (idSession,ipAdress,dateConn) VALUES ("'. session_id().'","'.$_SERVER['REMOTE_ADDR'].'","'.date("Y-m-d H:i:s").'")';
            $data=$this->dao->prepare($sql);
        
            return $data->execute();    
        }
        
        public function getNbreVisiteur(){
             $sql = 'SELECT count(distinct idSession) AS number FROM '._DB_PREFIX_.$this->nameTable;
             
             $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->number;
        }
        
        public function getNbreVisiteurOfday(){
            $sql = 'SELECT count(distinct idSession) AS number FROM '._DB_PREFIX_.$this->nameTable.'
                    WHERE dateConn >="'.date("Y-m-d").' 00:00:00" AND dateConn<="'.date("Y-m-d").' 23:59:59"';
             
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->number;
        }
        
        public function getNbreVisiteurOfWeek(){
            $sql = 'SELECT count(distinct idSession) AS number FROM '._DB_PREFIX_.$this->nameTable.'
                    WHERE dateConn >="'.date('Y-m-d', strtotime('last monday', strtotime(date("Y-m-d")))).' 00:00:00" AND dateConn<="'.date("Y-m-d").' 23:59:59"';
            
            //print_r($sql);
            
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->number;
        }
        
        public function getNreVisitorHour($date, $Hbegining, $Hend){
             $sql = 'SELECT count(distinct idSession) AS number FROM '._DB_PREFIX_.$this->nameTable.'
                    WHERE dateConn >="'.$date.' '.$Hbegining.'" AND dateConn<="'.$date.' '.$Hend.'"';
             
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->number;
        }
    }
?>