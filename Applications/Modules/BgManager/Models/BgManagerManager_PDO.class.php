<?php

/**
 * Description of BgManagerManager_PDO
 *
 * @author FFOZEU
 */
namespace Applications\Modules\BgManager\Models;

if( !defined('IN') ) die('Hacking Attempt');

class BgManagerManager_PDO extends BgManagerManager{

    /**
     * Liste toutes les pages pour lesquelles on a défini un background
     */
    public function getListe(){

        $sql = 'SELECT id, titre, repeatX, repeatY, actived, bgImage, contenu, metatitle, metadescription, metakeyword, prix
                FROM '._DB_PREFIX_.$this->nameTable.'
                ORDER BY id DESC';
		$requete = $this->dao->query($sql);

        return $this->fecthAssoc_data($requete, $this->name);
    }

    /**
     *reccupère une page par son Id
     * @param type $id
     * @return type
     */
    public function getPageById($id){
        $sql='SELECT id, titre, bgImage, repeatX, repeatY, actived, contenu, metatitle, metadescription, metakeyword, prix
              FROM '._DB_PREFIX_.$this->nameTable.' 
              WHERE id = :id';
                $detail = $this->dao->prepare($sql);
		$detail->bindParam(':id', intval($id));
		$detail->execute();

        return $this->fecthAssoc_data($detail, $this->name);
    }

    /**
     *met à jour Le Background d'une page
     * @param type: $array $params
     * @return type: boolean
     */
    public function updateBgPage(array $params){
        $objData = new BgManager($params);
        $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.' SET titre = :Titre, bgImage = :bg, repeatX = :repeatX, repeatY = :repeatY, actived = :Actived, contenu = :Contenu, metatitle = :Metatitle, metadescription = :Metadescription, metakeyword = :Metakeyword, prix = :Prix WHERE id = :id';

        $req=$this->dao->prepare($sql);
        $req->bindParam(':Titre',$objData->getTitre());
        $req->bindParam(':bg',$objData->getBgImage());
        $req->bindParam(':repeatX',$objData->getRepeatX());
        $req->bindParam(':repeatY',$objData->getRepeatY());
        $req->bindParam(':Actived',$objData->getActived());
        $req->bindParam(':Contenu',$objData->getContenu());
        $req->bindParam(':Metatitle',$objData->getMetatitle());
        $req->bindParam(':Metadescription',$objData->getMetadescription());
        $req->bindParam(':Metakeyword',$objData->getMetakeyword());
        $req->bindParam(':Prix',$objData->getPrix());
        $req->bindParam(':id',$objData->getId());

        return $req->execute();
    }

    /**
     *Ajoute une page
     * @param type: $array $params
     * @return type: boolean
     */
    public function addPage(array $params){
        $objData = new BgManager($params);

        $sql='INSERT INTO '._DB_PREFIX_.$this->nameTable.' (titre, bgImage, repeatX, repeatY, actived, contenu, metatitle, metadescription, metakeyword, prix) VALUES (:Titre, :BgImage, :RepeatX, :RepeatY, :Actived, :Contenu, :Metatitle, :Metadescription, :Metakeyword, :Prix)';
        $req=$this->dao->prepare($sql);

        $req->bindParam(':Titre',$objData->getTitre());
        $req->bindParam(':BgImage',$objData->getBgImage());
        $req->bindParam(':RepeatX',$objData->getRepeatX());
        $req->bindParam(':RepeatY',$objData->getRepeatY());
        $req->bindParam(':Actived',$objData->getActived());
        $req->bindParam(':Contenu',$objData->getContenu());
        $req->bindParam(':Metatitle',$objData->getMetatitle());
        $req->bindParam(':Metadescription',$objData->getMetadescription());
        $req->bindParam(':Metakeyword',$objData->getMetakeyword());
        $req->bindParam(':Prix',$objData->getPrix());

        return $req->execute();
    }

    /**
     *ative/desactive le background d'une page
     * @param type $Active, $bg
     * @return type
     */
    function updateActivationPage($Active, $id){
        $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.' SET actived = :Active WHERE id = :id';

        $req=$this->dao->prepare($sql);
        $req->bindParam(':Active',$Active);
        $req->bindParam(':id',$id);

        return $req->execute();
    }

    /**
     *ative/desactive la repetition X du Background d'une page
     * @param type $repeatx, $id
     * @return type
     */
    function updateRepeatXPage($repeatx, $id){
        $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.' SET repeatX = :repeatx WHERE id = :id';

        $req=$this->dao->prepare($sql);
        $req->bindParam(':repeatx',$repeatx);
        $req->bindParam(':id',$id);

        return $req->execute();
    }

    /**
     *ative/desactive la repetition Y du Background d'une page
     * @param type $repeaty, $id
     * @return type
     */
    function updateRepeatYPage($repeaty, $id){
        $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.' SET repeatY = :repeaty WHERE id = :id';

        $req=$this->dao->prepare($sql);
        $req->bindParam(':repeaty',$repeaty);
        $req->bindParam(':id',$id);

        return $req->execute();
    }
}

?>
