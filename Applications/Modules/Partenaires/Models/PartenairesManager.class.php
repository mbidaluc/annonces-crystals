<?php
    /**
    * Description of PartenairesManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\Partenaires\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PartenairesManager extends Manager{
        protected $name = 'Applications\Modules\Partenaires\Models\Partenaires';
        protected $nameTable ="partenaire";
        // Inserer votre code ici
        
        abstract public function addAss($idMember, $idPartenaire);
    }
?>