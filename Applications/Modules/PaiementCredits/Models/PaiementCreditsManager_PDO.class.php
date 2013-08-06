<?php
    /**
    * Description of PaiementCreditsManager_PDO
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\PaiementCredits\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class PaiementCreditsManager_PDO extends PaiementCreditsManager{
        // Inserer votre code ici
        
        public function getListPaiemmentCredits($statuspaiement = null){
            $sql = 'SELECT o.*, u.pseudo, u.nom , u.prenom, mp.logo, mp.nom as nommp, p.libelle as nompack, p.prix  as prixpack  FROM '._DB_PREFIX_.'order_credit as o, '._DB_PREFIX_.'utilisateurs as u, '._DB_PREFIX_.'mode_paiement as mp, '._DB_PREFIX_.'pack_credits as p
                    WHERE o.idUser = u.id AND o.idModpaiement = mp.id AND o.idPack = p.id';
            if(isset($statuspaiement))
                $sql .= ' AND o.paiementEff='.$statuspaiement;
            $sql .= ' ORDER BY o.id DESC';
            
            //echo $sql;
            $data=$this->dao->query($sql);
            //var_dump($data);
            return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public function getListCmdCtsUser($iduser, $page=1, $limit = null){
            $sql = 'SELECT o.*, u.pseudo, u.nom , u.prenom, p.image, mp.nom as nommp, p.libelle as nompack, p.credit , p.prix  as prixpack  FROM '._DB_PREFIX_.'order_credit as o, '._DB_PREFIX_.'utilisateurs as u, '._DB_PREFIX_.'mode_paiement as mp, '._DB_PREFIX_.'pack_credits as p
                    WHERE o.idUser = u.id AND o.idModpaiement = mp.id AND o.idPack = p.id
                    AND u.id='.$iduser.' ORDER BY o.paiementEff ASC '.
                    ($limit?' LIMIT '.($page-1)*$limit.', '.$limit:' ');
            
            //echo $sql;
            $data=$this->dao->query($sql);
            //var_dump($data);
            return $data->fetchAll(\PDO::FETCH_OBJ);
        }
        
        public function getCACdtsOfDay($date, $paiemementaccep = NULL){
            $sql = '
                SELECT sum(montant) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE dateCmd="'.$date.'"'.
                (isset($paiemementaccep)?' AND paiementEff='.$paiemementaccep:' ');
            //print_r($sql);
            $detail = $this->dao->prepare($sql);
           
            $detail->execute();
            $data = $detail->fetch(\PDO::FETCH_OBJ);

            return $data->total==NULL?0:$data->total;
        }
        
         public function getNBCdtsOfDay($date){
            $sql = '
                SELECT COUNT(*) as total 
                FROM '._DB_PREFIX_.$this->nameTable.'
                WHERE dateCmd="'.$date.'"';
                
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
        
        public function getInfoOrderPack($id){
         $sql = 'SELECT o.montant, o.num_bordero, mp.lien
                FROM '._DB_PREFIX_.'order_credit o
                LEFT JOIN '._DB_PREFIX_.'mode_paiement mp ON(mp.id = o.idModpaiement)
                WHERE o.id='.$id;
        //var_dump($sql);
        $req = $this->dao->query($sql);
        $data = $req->fetch(\PDO::FETCH_OBJ);
        return $data;
    }
    }
?>