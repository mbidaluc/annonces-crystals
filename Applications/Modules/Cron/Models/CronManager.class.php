<?php
    /**
    * Description of CronManager
    *
    * @author Alfred MBIDA
    */
    namespace Applications\Modules\Cron\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class CronManager extends Manager{
        protected $name = 'Applications\Modules\Cron\Models\Cron';
        protected $nameTable ="cron";
        // Inserer votre code ici
    }
?>