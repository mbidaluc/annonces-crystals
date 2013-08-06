<?php

/**
 * Description of ContactController
 *
 * @author FFOZEU
 */
namespace Applications\Modules\Contact\Mobile\Controller;

use Helper\HelperBackController;
use Library\HttpRequest;
use Library\Classe\Form\Form;
use Library\PHPMailer\PHPMailer;
use Applications\Modules\Contact\Form\ContactForm;

class ContactController extends HelperBackController{

    protected $name = 'Contact';
    
    public function executeContact(HttpRequest $request){
        
        parent::getInfosPage('contact');
        
        $dataArray = array();
        $messageError ='';
        if($request->getMethod('post')){
           //test de la validation du post
            $contacForm = ContactForm::getForm($_POST);
            if ($contacForm->is_valid($_POST)) {
                list( $email_exp, $pseudo, $sujet, $message) = $contacForm->get_cleaned_data('email', 'pseudo', 'subjet','message');
                $mail = new PHPMailer();
                $mail->IsSendmail();
                try {
                    //$mail->Body = $message;
                    //$mail->AddReplyTo($pseudo);
                    $mail->SetFrom($email_exp);
                    $mail->AddAddress($email_exp, "Visitor");
                    $mail->Subject = $sujet;
                    $mail->MsgHTML($message);
                    
                    if($mail->Send()){
                        $messageError = "Votre Message a été envoyé avec succès";
                    }else{
                        $messageError = "echec lors de l'envoi";
                    }
                    
                } catch (phpmailerException $e) {
                  $messageError =  $e->errorMessage(); //Pretty error messages from PHPMailer
                } catch (Exception $e) {
                  $messageError = $e->getMessage(); //Boring error messages from anything else!
                }
            }else{
                // 
                $dataArray = $_POST;
            }
        }

        $this->page->addVar('contactForm', ContactForm::getForm($dataArray));
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
