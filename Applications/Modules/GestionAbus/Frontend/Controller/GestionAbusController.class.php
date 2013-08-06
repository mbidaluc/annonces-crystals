<?php
    /**
    * Description of GestionAbusController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\GestionAbus\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\GestionAbus\Form\GestionAbusForm;
    use Library\Tools;

    class GestionAbusController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "GestionAbus";
        
        function executeGestionAbus(HttpRequest $request){
            $manageAbus        = $this->managers->getManagerOf('GestionAbus');
            
            //var_dump($_POST);
            if($manageAbus->add($_POST)){
                echo '1';
            }else{
                echo '0';
            }
            
        }
    }
?>