<?php

/**
 * Description of FrontendApplication
 *
 * @author FFOZEU
 */
namespace Applications\Frontend;

use Library\Application;
use Library\Router;

class FrontendApplication extends Application{
    
    public function __construct(){
        
        parent::__construct($this);
        $this->name = 'Frontend';
    }
    
    public function run(){
        
        $router = new Router($this);
        $controller = $router->getController();
        $controller->execute();
        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}

?>
