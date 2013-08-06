<?php
    /**
     * Description of ConfigurationsManager
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Configurations\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class ConfigurationsManager extends Manager{
        protected $name = 'Applications\Modules\Configurations\Models\Configurations';
        protected $nameTable ='parametre';

        abstract public function getConfigurations();
        abstract public function updateConfigurations(array $params);
        abstract public function updateCoutImages(array $params);
        
        abstract public function updateNewsLettersParams(array $params);
        abstract public function updateNewsLettersCompteur($cpt);
        // Inserer votre code ici
    }
?>