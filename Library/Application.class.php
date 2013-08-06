<?php

/**
 * Description of Application
 *
 * @author FFOZEU
 */
namespace Library;

abstract class Application {
    /******definition des attributs*/
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;
    protected $site;
    protected $config;
    protected $cache;
    protected $mail;

    public function __construct($app){
        $this->httpRequest = new HttpRequest($app);
        $this->httpResponse = new HttpResponse($app);
        $this->user = new User($app);
        $this->site = new Site($app);
        $this->config = new Config($app);
        $this->cache = new Cache($app);
        $this->mail = new Mail($app);
        $this->name = '';
    }
    
    abstract public function run();
    
    public function httpRequest(){
        return $this->httpRequest;
    }
    
    public function httpResponse(){
        return $this->httpResponse;
    }
    
    public function name(){
        return $this->name;
    }
    
    public function user(){
        return $this->user;
    }
    
    public function site(){
        return $this->site;
    }
    
    public function config(){
        return $this->config;
    }
    
    public function cache(){
        return $this->cache;
    }
    public function mail(){
        return $this->mail;
    }

}

?>
