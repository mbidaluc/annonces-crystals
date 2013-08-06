<?php
    /**
    * Description of PackCreditsController
    *
    * @author Luc Alfred MBIDA
    *
    */

    namespace Applications\Modules\PackCredits\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\PackCredits\Form\PackCreditsForm;
    use Library\Tools;

    class PackCreditsController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "PackCredits";
        
         public function executePackCredits(HttpRequest $request){
			parent::getInfosPage('pack_credit');
         
            $this->page->addVar('title', 'Liste des packs de credits');

            $manager = $this->managers->getManagerOf('PackCredits');
            $_SESSION['referer'] = 'modepaiementfrontpacks.html';

            $dataList = $manager->findAll2();
            

            $this->page->addVar('dataList', $dataList);
        }
    }
?>