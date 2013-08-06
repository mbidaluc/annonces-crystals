<?php
    /**
    * Description of MembersManager
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\Members\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class MembersManager extends Manager{
        protected $name = 'Applications\Modules\Members\Models\Members';
        protected $nameTable ="newsmember";
        // Inserer votre code ici
        
         abstract public function getLastMemberId();
         abstract public function verifEmail($email);
         abstract public function getCategorie($idMember);
         abstract public function getAbonnesPartenaires($idPartenaire);
    }
?>