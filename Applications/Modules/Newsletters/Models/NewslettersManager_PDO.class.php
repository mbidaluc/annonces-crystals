<?php

/**
 * Description of NewslettersManager_PDO
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Newsletters\Models;

if( !defined('IN') ) die('Hacking Attempt');

class NewslettersManager_PDO extends NewslettersManager{
    //put your code here
	
    public function getNewsletters(){
        $sql = 'SELECT c.*
                FROM '.$this->nameTable.' as c
                ORDER BY c.date_news DESC';
        $data=$this->dao->query($sql);
        
        return $this->fecthAssoc_data($data, $this->name);
                
    }
    
    public function addNewsletters(array $param){
        
        var_dump($param);
        $data = new Newsletters($param);
        $sql='INSERT INTO '.$this->nameTable.'
              SET titre = :titre, message = :message, categorie = :categorie, date_news = :date_news, type_envoie = :type_envoie';
        $req=$this->dao->prepare($sql);
        $req->bindParam(':titre',$data->getTitre());
        $req->bindParam(':message',$data->getMessage());
        $req->bindParam(':categorie',$data->getCategorie());
        //$req->bindParam(':nbr',intval($data->getNbr()));
        $req->bindParam(':date_news',$data->getDate_news());
        $req->bindParam(':type_envoie',$data->getType_envoie());
        //$req->bindParam(':actif',$data->getActif());
        //var_dump($data->getActif());die('');
        return $req->execute();
    }
    
    public function updateNewsletters(array $param){
        $objData = new Newsletters($param);
        
        $sql='UPDATE '.$this->nameTable.'
              SET titre = :titre, message = :message, categorie = :categorie, type_envoie = :type_envoie
              WHERE id_news = :id_news';
        $req=$this->dao->prepare($sql);
        
        $req->bindParam(':titre',$objData->getTitre());
        $req->bindParam(':message',$objData->getMessage());
        $req->bindParam(':categorie',$objData->getCategorie());
        $req->bindParam(':type_envoie',$objData->getType_envoie());
        $req->bindParam(':id_news',intval($objData->getId_news()));
        //var_dump($req->execute());                die();
        return $req->execute();
    }
    
    /*public function getNewslettersById($id_news){
        
     //   return $this->fecthRow_data($this->findById($this->nameTable, $id_news), $this->name);
    }*/
    public function getNewslettersById($id_news){
        //var_dump($id_news);die();
        $sql='SELECT id_news, titre, message, categorie,type_envoie
              FROM '.$this->nameTable.' 
              WHERE id_news = :id_news';
        $detail = $this->dao->prepare($sql);
	$detail->bindParam(':id_news', intval($id_news));
	$detail->execute();
  //var_dump ($detail->execute());die();
        return $this->fecthAssoc_data($detail, $this->name);
         
     
    }
    
    
    
    
    public function deleteNewsletters(array $id_news){
        
        return $this->delete($this->nameTable, $id_news);
    }
	
	public function getMembres() {
		$out = array();
		$data = $this->dao->prepare('SELECT u.* FROM `c2w_newsmember` as u WHERE u.news ="1"');
		
		$data->execute();
		
		foreach( $data->fetchAll(\PDO::FETCH_ASSOC) as $result ) {
		
			$out[] = $result;
	
		}
		return $out;
	
	}
}

?>
