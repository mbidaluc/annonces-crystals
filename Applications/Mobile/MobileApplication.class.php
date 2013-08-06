<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MobileApplication
 *
 * @author ffozeu
 */
namespace Applications\Mobile;

use Library\Application;
use Library\Router;

class MobileApplication  extends Application{
    
    public function __construct(){
        
        parent::__construct($this);
        $this->name = 'Mobile';
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
