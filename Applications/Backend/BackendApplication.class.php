<?php

/**
 * Description of BackendApplication
 *
 * @author FFOZEU
 */
namespace Applications\Backend;

use Library\Application;
use Library\Router;

class BackendApplication extends Application{
    
    public function __construct(){

        parent::__construct($this);
        $this->name = 'Backend';
    }
    
     public function run(){
        if($this->user->isAuthenticated()){
			//$_SESSION['admin']=true;
            $router = new Router($this);
            $controller = $router->getController();
            if(!$this->user->isAdmin()){
                $controller = new \Applications\Modules\Utilisateurs\Backend\Controller\UtilisateursController($this, 'Utilisateurs', 'Connect');
                //$this->httpResponse()->redirect('/');
            }else{
                //$controller = new \Applications\Modules\Statistiques\Backend\Controller\StatistiquesController($this, 'Statistiques', 'GlobalView');
            }            
        }else{
            $controller = new \Applications\Modules\Utilisateurs\Backend\Controller\UtilisateursController($this, 'Utilisateurs', 'Connect');
            //Applications\Modules\Utilisateurs\Backend\Controller
        }
        $controller->execute();
        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
    
}

?>
