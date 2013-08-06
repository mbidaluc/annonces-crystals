<?php
    /**
    * Description of PaiementAPIManager
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PaiementAPI\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PaiementAPIManager extends Manager{
        protected $name = 'Applications\Modules\PaiementAPI\Models\PaiementAPI';
        protected $nameTable ="order";
        // Inserer votre code ici
        
        abstract public function getLastOrderId();
    }
?>