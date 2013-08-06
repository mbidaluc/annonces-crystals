<?php

/**
 * Description of ContactController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Newsletters\Frontend\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\PHPMailer\PHPMailer;
use Library\Tools;
use Applications\Modules\Newsletters\Form\NewslettersForm;


class NewslettersController extends HelperBackController{

    protected $name = 'Newsletters';
    
    public function executeRegister(HttpRequest $request){
        
        parent::getInfosPage('newsletter');        
        
        $messageError ='';
        if($request->getMethod('post')){
              
        }       
        $this->page->addVar('messageError', $messageError);
    }
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        parent::init();
    }
}

?>
