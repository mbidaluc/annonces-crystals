<?php
    /**
     * Description of CompteurVisitesController
     *
     * @author Luc Alfred MBIDA
     *
     */

        namespace Applications\Modules\CompteurVisites\Frontend\Controller;

        if( !defined('IN') ) die('Hacking Attempt');

        use Helper\HelperBackController;
        use Library\HttpRequest;
        use Applications\Modules\CompteurVisites\Form\CompteurVisitesForm;
        use Library\Tools;

        class CompteurVisitesController extends HelperBackController{
            // Inserer votre code ici!
            protected $name = "CompteurVisites";
        }
?>