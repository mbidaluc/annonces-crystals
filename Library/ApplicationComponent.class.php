<?php
namespace Library;

/**
 * Description of ApplicationComponent
 *
 * @author FFOZEU
 */
abstract class ApplicationComponent {
    /*charge l'application en cours
     */
    protected $app;
    
    public function __construct(Application $app){
        $this->app = $app;
    }
    public function app(){
        return $this->app;
    }
}

?>
