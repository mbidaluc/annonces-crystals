<?php
    /**
     * Description of BreadcrumbController
     *
     * @author Luc Alfred MBIDA
     *
     */

    namespace Applications\Modules\Breadcrumb\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Breadcrumb\Form\BreadcrumbForm;
    use Library\Tools;

    class BreadcrumbController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Breadcrumb";

        public function executeBreadcrumb(HttpRequest $request){
                $tab = array();
                $infos_url =  var_dump($_SERVER['REQUEST_URI']);

                $tab[0] = "Accueil";
                $val = explode("/", $infos_url);
                $i = 1;
                for($i = 1; $i<count($val); $i++)
                        $tab[$i] = ucfirst($val[$i]);

                $this->page->addVar('fileariane', $tab);	
        }
    }
?>