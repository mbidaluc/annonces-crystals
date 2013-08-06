<?php

/**
 * Description of FrontendApplication
 *
 * @author FFOZEU
 */
namespace Applications\Facebook;

use Library\Application;
use Library\Router;

class FacebookApplication extends Application{
    
    public function __construct(){
        
        parent::__construct($this);
        $this->name = 'Facebook';
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
