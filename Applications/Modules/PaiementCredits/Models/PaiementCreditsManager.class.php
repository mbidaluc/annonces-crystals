<?php
    /**
    * Description of PaiementCreditsManager
    *
    * @author Luc Alfred MBIDA
    */
    namespace Applications\Modules\PaiementCredits\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PaiementCreditsManager extends Manager{
        protected $name = 'Applications\Modules\PaiementCredits\Models\PaiementCredits';
        protected $nameTable ="order_credit";
        // Inserer votre code ici
    }
?>