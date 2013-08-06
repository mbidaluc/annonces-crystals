<?php

/**
 * Description of ContactController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Contact\Frontend\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\PHPMailer\PHPMailer;
use Applications\Modules\Contact\Form\ContactForm;

class ContactController extends HelperBackController{

    protected $name = 'Contact';
    
    public function executeContact(HttpRequest $request){
        
        parent::getInfosPage('contact');
        $manager    = $this->managers->getManagerOf('ConfigSMTP');
        $configMail = $manager->findById2("id", 1);
        $variable   = array();
        $options     = array();
        
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
        
        $variable["fw_url"]      = $request->getValue('annonceUrl');
        $variable["annonce_msg"] = nl2br($request->getValue('message'));
        
        
        $dataArray = array();
        $messageError ='';
        if($request->getMethod('post')){
             //test de la validation du post
             $options['expediteur']    = $request->getValue('email');
             $options['Nomexpediteur'] = $request->getValue('pseudo');
             $options['subjet']        = $request->getValue('sujet');
             $options['address']       = $configMail[0]->getEmailSite();
             $options['Nomaddress']    = $configMail[0]->getNomExpediteur();
            
             $messageError = $this->app()->mail()->send($options, $configMail[0],$variable, 'contact.html');
             //$messageError = $variable["annonce_msg"];
             $dataArray = $_POST;
            
        }
        $cotactform = ContactForm::getForm($dataArray);

        $this->page->addVar('contactForm', $cotactform);
        $this->page->addVar('messageError', $messageError);
        $this->page->addVar('title', 'contactez-nous');
    }
    protected function init(){
        $this->tabCSS[_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css'] = 'screen';
        $this->tabJS[_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js'] = 'screen';
        parent::init();
    }
}

?>
