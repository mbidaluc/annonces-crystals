<?php
    /**
    * Description of PaiementModManager
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PaiementMod\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PaiementModManager extends Manager{
        protected $name = 'Applications\Modules\PaiementMod\Models\PaiementMod';
        protected $nameTable ="mode_paiement";
        // Inserer votre code ici
    }
?>