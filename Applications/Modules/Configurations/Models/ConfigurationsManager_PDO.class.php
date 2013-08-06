<?php
    /**
     * Description of ConfigurationsManager_PDO
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Configurations\Models;

    if( !defined('IN') ) die('Hacking Attempt');


    class ConfigurationsManager_PDO extends ConfigurationsManager{

        public function getConfigurations(){
            $sql = 'SELECT p.*
                    FROM '._DB_PREFIX_.$this->nameTable.' as p
                    WHERE idParam = 1';

            $requete = $this->dao->query($sql);

            return $this->fecthAssoc_data($requete, $this->name);
        }

        public function updateConfigurations(array $params){
            $objData = new Configurations($params);
            $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.'
                    SET nomSite = :nomsite, emailSite = :emailsite, bgImage = :bg, repeatX = :repeatX, repeatY = :repeatY, is_active = :Actived, metaDescription = :Metadescription, metaKeyword = :Metakeyword, coutDuree = :CoutDuree, prixUniteAnnonce = :PrixUniteAnnonce, defaultCategoryImage = :DefaultCategoryImage  WHERE idParam = 1';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':nomsite',$objData->getNomSite());
            $req->bindParam(':emailsite',$objData->getEmailSite());
            $req->bindParam(':bg',$objData->getBgImage());
            $req->bindParam(':repeatX',$objData->getRepeatX());
            $req->bindParam(':repeatY',$objData->getRepeatY());
            $req->bindParam(':Actived',$objData->getIs_Active());
           
            $req->bindParam(':Metadescription',$objData->getMetaDescription());
            $req->bindParam(':Metakeyword',$objData->getMetaKeyWord());
            $req->bindParam(':CoutDuree',$objData->getCoutDuree());
            $req->bindParam(':PrixUniteAnnonce',$objData->getPrixUniteAnnonce());
            $req->bindParam(':DefaultCategoryImage',$objData->getDefaultCategoryImage());


            return $req->execute();
        }
        
        public function updateCoutImages(array $params){
            $objData = new Configurations($params);
            $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.'
                    SET cout1image = :cout1image, cout2image = :cout2image, cout3image = :cout3image, cout4image = :cout4image, cout5image = :cout5image, cout6image = :cout6image, cout7image = :cout7image, cout8image = :cout8image, cout9image = :cout9image  WHERE idParam = 1';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':cout1image',$objData->getCout1image());
            $req->bindParam(':cout2image',$objData->getCout2image());
            $req->bindParam(':cout3image',$objData->getCout3image());
            $req->bindParam(':cout4image',$objData->getCout4image());
            $req->bindParam(':cout5image',$objData->getCout5image());
            $req->bindParam(':cout6image',$objData->getCout6image());
           
            $req->bindParam(':cout7image',$objData->getCout7image());
            $req->bindParam(':cout8image',$objData->getCout8image());
            $req->bindParam(':cout9image',$objData->getCout9image());


            return $req->execute();
        }
        
        public function updateNewsLettersParams(array $params){
            $objData = new Configurations($params);
            //var_dump($objData);
            $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.'
                    SET frequenceEnvNL = :frequenceEnvNL, NLEntete = :NLEntete, NLPied = :NLPied WHERE idParam = 1';
            
            $req=$this->dao->prepare($sql);
            $req->bindParam(':frequenceEnvNL',$objData->getFrequenceEnvNL());
            $req->bindParam(':NLEntete',$objData->getNLEntete());
            $req->bindParam(':NLPied',$objData->getNLPied());
            //var_dump($req);
            return $req->execute();
        }
        
        public function updateNewsLettersCompteur($cpt){
            $objData = new Configurations($params);
            var_dump($objData);
            $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.'
                    SET NLCompteur = :NLCompteur WHERE idParam = 1';
            
            $req=$this->dao->prepare($sql);
            $req->bindParam(':NLCompteur',interval($cpt));
            //var_dump($req);
            return $req->execute();
        }
        
         public function updateDefaultImages(array $params){
             //var_dump($params);
            $objData = new Configurations($params);
            $sql = 'UPDATE '._DB_PREFIX_.$this->nameTable.'
                    SET defaultSpecialeImage = :defaultSpecialeImage, defaultUneImage = :defaultUneImage, defaultAnnonceImage = :defaultAnnonceImage WHERE idParam = 1';

            $req=$this->dao->prepare($sql);
            $req->bindParam(':defaultSpecialeImage',$objData->getDefaultSpecialeImage());
            $req->bindParam(':defaultUneImage',$objData->getDefaultUneImage());
            $req->bindParam(':defaultAnnonceImage',$objData->getDefaultAnnonceImage());
      
            return $req->execute();
        }
    }
?>