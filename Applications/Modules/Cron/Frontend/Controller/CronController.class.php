<?php
   /**
    * Description of CronController
    *
    * @author Alfred MBIDA
    *
    */

    namespace Applications\Modules\Cron\Frontend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;

    use Library\Tools;

    class CronController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Cron";
        
        public function executeCron(){
            $managerAnn     = $this->managers->getManagerOf('Annonce');
            $managerPub     = $this->managers->getManagerOf('Adversiting');
            $managerCats    = $this->managers->getManagerOf('Categories');
            $managerUser    = $this->managers->getManagerOf('Utilisateurs');
            $managerTranches = $this->managers->getManagerOf('TranchesHoraires');
            $managerMail       = $this->managers->getManagerOf('ConfigSMTP');
            $variable = array();
            $parametresmail = array();
            $configMail = $managerMail->findById2("id", 1);
            $parametresmail["expediteur"]    = $configMail[0]->getEmailSite();
            $parametresmail["Nomexpediteur"] = $configMail[0]->getNomExpediteur();
            $parametresmail["address"]       = $configMail[0]->getEmailSite();
            $parametresmail["Nomaddress"]    = $configMail[0]->getNomExpediteur();
            $parametresmail["subjet"]        = "Vos Annonces Expirées";  
                    
            $variable = array();
            $parametresmail = array();
            
            $list_user = $managerUser->getUtilisateurs();
            $listAnnToArchive = array();
            $listAnnPubToArchive = array();
            if(is_array($list_user) && count($list_user)){
                foreach ($list_user as $value) {
                    $can_send = 0;
                    $message = '
                    <table style="font-family:Verdana,sans-serif; font-size:11px; color:#374953; width: 550px;">
                        <tr>
                            <th>Identifiant</th>
                            <th>Libelé</th>
                            <th>date du publication</th>
                            <th>date d\'expiration</th>
                            <th>type d\'annonce</th>
                        </tr>';
                     // Liste des annonces classiques expirées!
                    $my_annonces = $managerAnn->getExpiredAnnoncesById($value->getIdUser());
                    if(is_array($my_annonces) && count($my_annonces)){
                        $can_send = 1;
                        foreach ($my_annonces as $annonce) {
                            $message .= '
                                <tr>
                                    <td>'.$annonce->getId().'</td>
                                    <td>'.$annonce->getDesignation().'</td>
                                    <td>'.$annonce->getDateDebut().'</td>
                                    <td>'.$annonce->getDateexp().'</td>
                                    <td>Annonce classique</td>
                                </tr>';
                            $listAnnToArchive[] = $annonce->getId();
                        }
                    }
                    
                    $my_annoncespub = $managerPub->getAnnoncePubExpired($value->getIdUser());
                    if(is_array($my_annoncespub) && count($my_annoncespub)){
                        $can_send = 1;
                        foreach ($my_annoncespub as $pub) {
                            $obj = $managerTranches->getLastTranche($pub->getId());
                            $message .= '
                                <tr>
                                    <td>'.$pub->getId().'</td>
                                    <td>'.$pub->getAltText().'</td>
                                    <td>Undifined</td>
                                    <td>'.date_format(date_create($obj[0]->dateJour), 'd/m/Y').' à '.$obj[0]->heureFin.'</td>
                                    <td>Annonce Publicitaire</td>
                                </tr>';
                            $listAnnPubToArchive[] = $pub->getId();
                        }
                    }
                    $message .= '
                    </table>';
                    // Envoie du message
                    if($can_send){
                        $variable["fw_annoncesexpirees"] = $message;
                        $mailinf = $this->app()->mail()->send($parametresmail, $configMail[0],$variable,'annonces_expirees.html');
                    }  
                }
                // desactivation des annonces publicitaires:
                if(count($listAnnPubToArchive))
                    $result = $managerPub->UnActiveChecked($listAnnPubToArchive,'id','active');
                // desactivation des annonces classiques:
                if(count($listAnnToArchive))
                    $result = $managerAnn->UnActiveChecked($listAnnToArchive,'id','is_actived');
            }
        }
    }
?>