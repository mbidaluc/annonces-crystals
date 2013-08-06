<?php
    /**
    * Description of PackCreditsManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\PackCredits\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PackCreditsManager extends Manager{
        protected $name = 'Applications\Modules\PackCredits\Models\PackCredits';
        protected $nameTable ="pack_credits";
        // Inserer votre code ici
    }
?>