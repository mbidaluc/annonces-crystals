<?php
namespace Library;

/**
 * Description of Page
 *
 * @author FFOZEU
 */

class Page extends ApplicationComponent{
    
    protected $contentFile;
    protected $vars = array();
    protected $numberColumn = 3;


    /*ajoute une variable la page*/
    public function addVar($var, $value){
        
        if (!is_string($var) || is_numeric($var) || empty($var)){
            throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractère non nulle');
        }
        $this->vars[$var] = $value;
    }
    /**
     * générateur de page
     * @return type
     * @throws \RuntimeException 
     */
    public function getGeneratedPage(){
        
        if (!file_exists($this->contentFile)){
            //die($this->contentFile);
            throw new \RuntimeException(_UNKNOW_VIEWS_);
        }
        $link = $this->app->httpRequest();//new HttpRequest;
        $user = $this->app->user();
        $site = $this->app->site();
        $cache = $this->app->cache();
        $this->addVar('numberColumn', $this->numberColumn);
        
        extract($this->vars);
        
        //on ne recharge pas les fichiers de langue en cas de requette ajax
        if(!$this->app->httpRequest()->isXmlHttpRequest() && isset($tabLangFile))
            $this->getLanguageFile($tabLangFile);
        
        ob_start();
        
        require $this->contentFile;
        
        $content = ob_get_clean();
        
        ob_start();
        /**
         *afin de gerer l'ajax et dans le soucis de ne pas recharger entièrement une page web,
         * nous allons charger un tamplate partiel ne contenant pas toute la structure de la page web 
         */
        $templates = _SITE_APP_DIR.$this->app->name().'/Templates/layout.php';
        //gestion de la page index.php lorsqu'on n'est pas logguer et on souhaite accèder au BO
        if($this->app->name()=='Backend' &&(!$user->isAdmin()))
            $templates = _SITE_APP_DIR.$this->app->name().'/Templates/index.php';
        $customTemplates = _SITE_APP_DIR.$this->app->name().'/Templates/partial.php';
        require !$this->app->httpRequest()->isXmlHttpRequest()?$templates :$customTemplates;
        
        return ob_get_clean();
    }
    /**
     * chargement d'une vue ou d'un fichier
     * @param type $contentFile
     * @throws \InvalidArgumentException 
     */
    public function setContentFile($contentFile){
        
        if (!is_string($contentFile) || empty($contentFile)){
            throw new \InvalidArgumentException(_INVALID_VIEWS_);
        }
        $this->contentFile = $contentFile;
    }
    public function getLanguageFile(array $tabLangFile){
        foreach ($tabLangFile as $langFile) {
            if(file_exists($langFile))
                require_once $langFile;
        }
    }
}

?>
