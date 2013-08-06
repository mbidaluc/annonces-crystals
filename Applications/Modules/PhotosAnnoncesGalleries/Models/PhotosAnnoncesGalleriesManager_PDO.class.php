<?php
    /**
    * Description of PhotosAnnoncesGalleriesManager_PDO
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PhotosAnnoncesGalleries\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class PhotosAnnoncesGalleriesManager_PDO extends PhotosAnnoncesGalleriesManager{
        // Inserer votre code ici
        
        public function savePhoto($url, $type, $idAnnonce){
            $sql = 'INSERT INTO '._DB_PREFIX_.$this->nameTable .' (url, type, idAnnonce) VALUES (:url, :type, :idAnnonce)';
            
            $detail = $this->dao->prepare($sql);
            $detail->bindParam(':url', $url);
            $detail->bindParam(':type', $type);
            $detail->bindParam(':idAnnonce', $idAnnonce);
            
            return $detail->execute();
        }
        
        public function updatePhoto($id, $url, $idAnnonce){
            $sql = 'UPDATE c2w_'.$this->nameTable .' SET url = :url WHERE idAnnonce = :idAnnonce AND id = :id';
            
            $detail = $this->dao->prepare($sql);
            $detail->bindParam(':url', $url);
            $detail->bindParam(':id', $id);
            $detail->bindParam(':idAnnonce', $idAnnonce);
            
            return $detail->execute();
        }
        
        public function getPrincipaleImage($idAnnonce){
            $sql = 'SELECT * FROM '._DB_PREFIX_.$this->nameTable .' WHERE type="principale" AND idAnnonce='.$idAnnonce;
             $req = $this->dao->query($sql);
            return $this->fecthAssoc_data($req, $this->name);
        }
    }
?>