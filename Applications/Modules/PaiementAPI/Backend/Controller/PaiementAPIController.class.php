<?php
    /**
        * Description of PaiementAPIController
        *
        * @author Mbida Luc Alfred
        *
        */

        namespace Applications\Modules\PaiementAPI\Backend\Controller;

        if( !defined('IN') ) die('Hacking Attempt');

        use Helper\HelperBackController;
        use Library\HttpRequest;
        use Applications\Modules\PaiementAPI\Form\PaiementAPIForm;
        use Library\Tools;

        class PaiementAPIController extends HelperBackController{
            // Inserer votre code ici!
            protected $name = "PaiementAPI";
        }
?>