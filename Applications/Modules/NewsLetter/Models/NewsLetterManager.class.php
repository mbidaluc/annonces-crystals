<?php
    /**
    * Description of NewsLetterManager
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\NewsLetter\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class NewsLetterManager extends Manager{
        protected $name = 'Applications\Modules\NewsLetter\Models\NewsLetter';
        protected $nameTable ="newsletters";
        // Inserer votre code ici
        
        
    }
?>