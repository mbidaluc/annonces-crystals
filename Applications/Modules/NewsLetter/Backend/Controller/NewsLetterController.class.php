<?php
    /**
    * Description of NewsLetterController
    *
    * @author Mbida Luc Alfred
    *
    */

    namespace Applications\Modules\NewsLetter\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\NewsLetter\Form\NewsLetterForm;
    use Library\Tools;

    class NewsLetterController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "NewsLetter";
        
    
        private function leftcolumn(){
            $out = array();
        
            $out['newsletter-membre.html']= 'Membres Inscrits';
            $out['newsletter-envoie.html']= 'test envoie';
            $out['newsletter-params.html']= 'paramètres des newsletters';

            return $this->page->addVar('left_content', $out);        
        }
    
        private function rightcolumn(){
            $out ='Paramétrer l\' envoie de vos newsletters';
            return $this->page->addVar('right_content', $out);
        }
    
        public function executeDelete(HttpRequest $request){

            $manager = $this->managers->getManagerOf('NewsLetter');
            if($request->getExists('id_news')){
                $out['id_news'] = $request->getData('id_news');
                if($manager->delete($out)){
                    $this->errors = 'suppression réussie';
                }else{
                    $this->errors = 'Echec lors de la suppression';
                }
                $this->app()->httpResponse()->redirect('newsletter.html');
            }
        }
        
        public function executeNewsletterparams(HttpRequest $request){
            
            $manager = $this->managers->getManagerOf('Configurations');
            
            $this->leftcolumn();
            
            $dataObjt  = $manager->getConfigurations();
            $dataArray = $dataObjt[0]->tabAttrib;
            
            $this->page->addVar('title', 'Modifier une position');        
            $dataForm = NewsLetterForm::getForm($dataArray);
            
            
            if($request->getMethod('post')){
                if($manager->updateNewsLettersParams($_POST)){
                    //$this->app()->httpResponse()->redirect('configurations.html');
                    $this->infos = 'Mise à jour effectuée!';
                }else{
                    $this->errors = 'Echec lors de la mise à jour';
                }
                $dataArray = $_POST;
            }
            $this->page->addVar('infos', $this->infos);
            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);
        }
        
        public function executeNewletterstemplate(HttpRequest $request){
            $manager        = $this->managers->getManagerOf('Members');
            $managerAnnonce = $this->managers->getManagerOf('Annonce');
            $managerPhoto   = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
            $managerConf    = $this->managers->getManagerOf('Configurations');
            $managerMails   = $this->managers->getManagerOf('ConfigSMTP');
            $managerpartenaires = $this->managers->getManagerOf('Partenaires');
            
            $datalistpartenaires = $managerpartenaires->findAll2();
            
            $listedespartenaires = '';
            $listedespartenaires .= '<table width="640" border="0" style="background-color:#FFF">
                <tr>
                    <td width="634" colspan="'.count($datalistpartenaires).'">Ils nous font confaince</td>
                </tr>
                 <tr>
                ';
             $variable = array();
            foreach($datalistpartenaires as $partenaires):
                $listedespartenaires .= ' <td><img alt="'.$partenaires->getNom().'" src="'.UPLOAD_DIR_.'Partenaires/'.array_shift(explode(';',$partenaires->getLogo())).'" width="100"/></td></td>';
            endforeach;
            
            $variable["newsletter_list_partenaire"] = $listedespartenaires.'</tr></table>';
            
            $configMail     = $managerMails->findById2("id", 1);
           
            
            $variable["fw_name"]     = 'Annonce Cameroun';
            $variable["site_url"]    = _BASE_URI_;
            $variable["newsletter_site_logo"]     = _WEB_IMG_DIR_.'annonces.png';
            $variable["newsletter_number"]        = "N 107";
            $variable["newsletter_date"]          = date("d F Y");
            $variable["newsletter_logo_mail"]     = _SITE_NEWSLETTER_TPL_DIR_.'img/enveloppe.png';
            $variable["newsletter_logo_facebook"] = _SITE_NEWSLETTER_TPL_DIR_.'img/facebook.png';
            $variable["newsletter_logo_tweeter"]  = _SITE_NEWSLETTER_TPL_DIR_.'img/twitter.png';
            $parametres = array();
            
            $parametres["expediteur"]     = $configMail[0]->getEmailSite();
            $parametres["Nomexpediteur"]  = $configMail[0]->getNomExpediteur();
            $parametres["subjet"]         = 'NewsLetters';
            
            
            $dataObjts   = $managerConf->getConfigurations();        
            $UniteTempsAnnonce = $dataObjts[0]->getCoutDuree();
            $data           = array();
            $i = 0;
            $temps = 0;
            
            if($UniteTempsAnnonce === "Minute")
                $temps = time() - 60;
            
            if($UniteTempsAnnonce === "Heure")
                $temps = time() - 3600;
            
            if($UniteTempsAnnonce === "Jour")
                $temps = time() - 3600*24;
            
            if($UniteTempsAnnonce === "Semaine")
                $temps = time() - 3600*24*7;
            
            if($UniteTempsAnnonce === "Mois")
                $temps = time() - 3600*24*31;
            
            if($UniteTempsAnnonce === "Annee")
                $temps = time() - 3600*24*365;
            
            $dataList = $manager->findAll2();
           
            foreach ($dataList as $value){
                $listcat = $manager->getCategorie($value->getId_member());
                if(!empty($listcat)){
                    $tabcat = array();
                    foreach($listcat as $cats){ 
                        $tabcat[] = $cats->idFils;
                    }

                    $ListAnnonces                       = $managerAnnonce->getAnnoncePeriode(date("Y-m-d H:i:s", $temps),$tabcat );
                    $listedesannoonces = '';
                    foreach ($ListAnnonces as $annonce):
                       $listedesannoonces   .= '<table width="640" border="0" cellpadding="0" cellspacing="0" style="font-size:13px;">
                              <tr>
                                <td width="7" rowspan="5" valign="top" style="background-color:#FFF">&nbsp;</td>
                                <td height="33" colspan="4" style="background-color:#FFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=" color: #009edb; ">'.  $annonce->designation .'</span>  <span style="color: #85b801;">['.  $annonce->pays .']</span></a></h3></td>
                                <td width="7" rowspan="5" valign="top" style="background-color:#FFF"></td>
                              </tr>
                              <tr>
                                <td width="126" rowspan="3" style="background-color:#FFF;"><a href="'.  _BASE_URI_.$annonce->libelle.'/'.$annonce->link_rewrite.'.html'.'"><img alt="Image" src="'.  _UPLOAD_DIR_.'Annonce/meduim'.$annonce->url  .'" width="100"/></a></td>
                                <td height="55" colspan="3" style="text-align: justify; background-color:#FFF; color:#535353;"> '.  $annonce->texte .'
                                </td>
                              </tr>
                              <tr>
                                <td width="110" height="16" style="background-color:#FFF">&nbsp;</td>
                                <td colspan="2" style="background-color:#FFF; font-size:14px" align="right">
                                  <span style="color:#03aadd;">Prix :</span> <span style="color:#e2001a;">'.  $annonce->prixTotal.' FCFA</span>                            </td>
                              </tr>
                              <tr>
                                <td height="15" colspan="3" style="background-color:#FFF"><span style="color:#009edb">Publié le: </span>'.  $annonce->dateDebut .' &nbsp;&nbsp;&nbsp; <span style="color:#009edb">Expire: </span>'.  $annonce->dateexp .'</td>
                              </tr>
                              <tr>
                                <td height="15" colspan="4" style="background-color:#FFF">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="7" height="33">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td width="84">&nbsp;</td>
                                <td width="306" align="right" valign="top">

                                                <span style="background-color:#85b801; padding:6px;">
                                                    >><a href="'.  _BASE_URI_.$annonce->libelle.'/'.$annonce->link_rewrite.'.html " target="_blank" style="text-decoration:none; font-size:12px; color:#FFF;">Voir détail de l\'annonce</a>
                                                </span>
                                </td>
                                <td width="7">&nbsp;</td>
                              </tr>
                            </table>';
                    endforeach;
                    $variable["newsletter_link_partenaire"] = 'membres-delete-'.$value->getId_member().'.html';
                    $variable["tableau_newsletters"] = $listedesannoonces;

                    $variable["newsletter_nom_membre"]     = $value->getNom_membre();
                    $parametres["address"]                 = $value->getEmail_member();
                    $parametres["Nomaddress"]              = $value->getNom_membre();

                    $mailinf = $this->app()->mail()->send($parametres, $configMail[0],$variable,"newsletter.html");
                }
            }
            $this->page->addVar('datalist', $ListAnnonces);
            $this->page->addVar('paramsnewsletters', $dataObjts[0]);
        }
    }
?>