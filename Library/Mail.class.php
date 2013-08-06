<?php
namespace Library;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author ffozeu
 */
use Library\PHPMailer\PHPMailer;

class Mail extends ApplicationComponent{
    //put your code here
    /**
     * 
     * @param array $param
     * @param type $mailConfig
     * @param type $variable
     * @param type $template
     * @param type $directory
     * @return string
     */
    public function send(array $param, $mailConfig, $variable = array(), $template = "",$directory = _SITE_MAIL_TPL_DIR_){
        $mail = new PHPMailer();
       
        $mail->SMTPDebug  = 1;
        
        $mail->CharSet = "UTF-8";
        
        switch ($mailConfig->getServeurMail()) {        
            case 'phpmail':
                 $mail->IsMail();
                break;
            
            case 'sendmail':
                 $mail->IsSMTP();
                break;
            
             case 'smtp':
                $mail->IsSMTP();
                break;
        }
        
        
        $body = file_get_contents($directory.$template);
        
        // Titre et logo
        $variable["fw_name"]     = 'Annonce Cameroun';
        $variable["fw_logo"]     = _WEB_IMG_DIR_.'annonces.png';
        $variable["site_url"]    = _BASE_URI_;
        
        foreach ($variable as $key => $value) {
            $body = str_replace($key, $value, $body);
        }
       
        if($mailConfig->getIdentificationSMTP()){
            $mail->SMTPAuth   = true;
            $mail->Username   = (string) $mailConfig->getUtilisateurSMTP();
            $mail->Password   = (string) $mailConfig->getPasswordSMTP();
        }
        
        if( $mailConfig->getSecuriteSMTP() != "aucun")
            $mail->SMTPSecure = (string) $mailConfig->getSecuriteSMTP(); 
        
        $mail->Host       = (string) $mailConfig->getServeurSMTP();
        $mail->Port       = (int) $mailConfig->getPortSMTP();
        
       
        
        $mail->From       = $param['expediteur'];
        $mail->FromName   = $param['Nomexpediteur'];
        $mail->Subject    = $param['subjet'];
       
        $mail->WordWrap   = 50; // set word wrap

        $mail->MsgHTML($body);
        
        if($mailConfig->getEmailSite() != "")
            $mail->AddReplyTo($mailConfig->getEmailSite(), $mailConfig->getNomExpediteur());
        
        if(isset($param['address']))
            $mail->AddAddress($param['address'],(isset($param['Nomaddress']))?$param['Nomaddress']:'Annonce Cameroun');
        
       
        $mail->IsHTML(true); // send as HTML

        if(!$mail->Send()) {
          return  "Mailer Error: " . $mail->ErrorInfo;
        } else {
          return "Votre message a été envoyé avec succès!!!";
        }

    }
}

?>
