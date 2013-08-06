<?php
    /**
    * Description of GestionAbusManager_PDO
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\GestionAbus\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    class GestionAbusManager_PDO extends GestionAbusManager{
        // Inserer votre code ici
		public function getNumberAbusByAnnonce($idAnnonce){
			$sql = 'SELECT COUNT(idAbus) as nb FROM '._DB_PREFIX_.$this->nameTable.' WHERE id='.$idAnnonce;
			
			$data = $this->dao->query($sql);
            $infos = $data->fetchAll(\PDO::FETCH_OBJ);

            return $infos[0]->nb ;
		}
    }
?>