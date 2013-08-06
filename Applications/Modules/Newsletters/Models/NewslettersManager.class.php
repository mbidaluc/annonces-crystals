<?php

/**
 * Description of NewslettersManager
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Newsletters\Models;

if( !defined('IN') ) die('Hacking Attempt');

use Library\Manager;

abstract class NewslettersManager extends Manager{
    //put your code here
        //put your code here
    protected $name = 'Applications\Modules\Newsletters\Models\Newsletters';
    protected $nameTable ='newsletters';
    protected $nametable1 = 'newsmember';

    /*
     *liste toutes les news presentent  
     */
    abstract public function getNewsletters();
    
    /*
     * ajoute une newsletter
     */
    abstract public function addNewsletters(array $param);
    
    /*
     * mise e jour d'une news letter
     */
    abstract public function updateNewsletters(array $param);
    
    /*
     *recupere une newsletter par son id 
     */
    abstract public function getNewslettersById($id_news);
    
    /*
     * supprime une newsletter par son id
     */
    abstract public function deleteNewsletters(array $id_news);
    
    /*
     * selectione les membres pour une newsletter
     */
    abstract public function getMembres();
    
    /*
     * recupere la table
     */
    public function getTableNewsletter(){
        return $this->nameTable;
    }
    
     public function getTableMember(){
        return $this->nameTable1;
    }
}

?>
