<?php
namespace Library;
/**
 * Description of BackController
 *
 * @author FFOZEU
 */

abstract class BackController extends ApplicationComponent{
    
    protected $action = '';
    protected $module = '';
    protected $page = null;
    protected $cache = null;
    protected $view = '';
    protected $errors = '';
    protected $infos = '';
    protected $managers = null;
    protected $tabCSS = array();
    protected $tabJS = array();
    protected $tabLang = array();
    protected $name ='';
    protected $pagination = '<div id="pager" class="pager">
	<form>
		<img src="../Themes/backend/backend_images/first.png" class="first"/>
		<img src="../Themes/backend/backend_images/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="../Themes/backend/backend_images/next.png" class="next"/>
		<img src="../Themes/backend/backend_images/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
    </div>';


    public function __construct(Application $app, $module,$action){
        parent::__construct($app);
        $this->managers = new Managers('PDO', DbFactory::getPdoInstance());
        $this->page = new Page($app); 
        $this->cache = new Cache($app);
        $this->name = $module;                    
        $this->setModule($module);        
        $this->setAction($action);
        $this->init();
        $this->setView($action);
        
    }
    protected function init(){
        //chargement du CSS et JS
        $this->tabLang[] = _SITE_ROOT_DIR_.'/Applications/'.$this->app->name().'/Lang/fr.php';
        $this->loadModLanguageFile();
        $this->loadModCSS();
        $this->loadModJS();
        $this->page->addVar('tabCSS', $this->tabCSS);
        $this->page->addVar('tabJS', $this->tabJS);
        $this->page->addVar('tabLangFile', $this->tabLang);
    }
    public function execute(){
        $method = 'execute'.ucfirst($this->action);
        if (!is_callable(array($this, $method))){
            throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
        }
        $this->$method($this->app->httpRequest());
    }
    
    public function page(){
        return $this->page;
    }
    /**
     * this function initialize module
     * @param type $module
     * @throws \InvalidArgumentException
     */
    public function setModule($module){
        if (!is_string($module) || empty($module)){
            throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
        }
        $this->module = $module;
    }
    /**
     * this function initialize view action of the module
     * @param type $action
     * @throws \InvalidArgumentException
     */
    public function setAction($action){
        if (!is_string($action) || empty($action)){
            throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
        }
        $this->action = $action;
    }
    /**
     * this function initialize view module
     * @param type $view
     * @throws \InvalidArgumentException
     */
    public function setView($view){
        if (!is_string($view) || empty($view)){
            throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
        }
        $this->view = $view;
        $this->page->setContentFile(dirname(__FILE__).'/../Applications/Modules/'.$this->module.'/'.$this->app->name().'/Views/'.ucfirst($this->view).'.tpl.php');
    }
    
    /**
     * this function load language file of your module
     */
    protected function loadModLanguageFile(){
        $dir = _SITE_MOD_DIR.$this->module.'/Lang/';
        $lang = $dir.'fr.php';
        if(is_dir($dir) && file_exists($lang)){
            $this->tabLang[] = $lang;
        }
    }
    
    /**
     *  this function load base js file on your module
     */
    protected function loadModJS(){
        $dir = _THEME_JS_MOD_DIR_.$this->module.'/';
        $file = $dir.$this->module.'.js';
        if(is_dir($dir) && file_exists($file) && !array_key_exists($file, $this->tabJS)){
            $this->tabJS[$file] = 'all';
        }
    }
    
    /**
     *  this fonction load base style on your module
     */
    protected function loadModCSS(){
        $dir = _THEME_CSS_MOD_DIR_.$this->module.'/';
        $file = $dir.$this->module.'.css';
        if(is_dir($dir) && file_exists($file) && !array_key_exists($file, $this->tabCSS)){
            $this->tabCSS[$file] = 'screen';
        }
    }
    /**
     *  add Js file on your project
     * @param type $pathfile
     */
    protected function addJS($pathfile){
        if(!array_key_exists($pathfile, $this->tabJS)){
            $this->tabJS[$pathfile] = 'all';
            $this->init();
        }
    }
    
    /**
     * add css file on your project
     * @param type $pathfile
     * @param type $media
     */
    protected function addCSS($pathfile,$media='screen'){
        if(!array_key_exists($pathfile, $this->tabCSS)){
            $this->tabCSS[$pathfile] = (string)$media;
            $this->init();
        }
    }
}

?>
