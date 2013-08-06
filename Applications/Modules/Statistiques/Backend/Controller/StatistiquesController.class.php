<?php
    /**
     * Description of StatistiquesController
     *
     * @author Luc Alfred MBIDA
     *
     */

    namespace Applications\Modules\Statistiques\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Applications\Modules\Statistiques\Form\StatistiquesForm;
    use Library\Tools;

    class StatistiquesController extends HelperBackController{
        // Inserer votre code ici!
        protected $name = "Statistiques";

        private function leftcolumn(){
            $out = array();
            $out['visiteurs.html']            = 'Visiteurs';
            $out['statcommandes.html']        = 'Commandes';
            $out['statpaiementmod.html']      = 'Modes de paiement';
            $out['statglobalview.html']       = 'Vue d\'ensemble';
            

            return $this->page->addVar('left_content', $out);

        }
        public function executeVisiteurs(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Visiteurs');
            $managerVisites = $this->managers->getManagerOf('CompteurVisites');
            
            $this->addJS(_THEME_JS_MOD_DIR_.'Statistiques/Visitors.js');
            
            $totalvisieurs     = $managerVisites->getNbreVisiteur();
            $visiteursofday    = $managerVisites->getNbreVisiteurOfday();
            $visitorofweek     = $managerVisites->getNbreVisiteurOfWeek();
            
            $tabIntervalHour = array(
                                    "00:00:00-00:59:59"=>0,
                                    "01:00:00-01:59:59"=>0,
                                    "02:00:00-02:59:59"=>0,
                                    "03:00:00-03:59:59"=>0,
                                    "04:00:00-04:59:59"=>0,
                                    "05:00:00-05:59:59"=>0,
                                    "06:00:00-06:59:59"=>0,
                                    "07:00:00-07:59:59"=>0,
                                    "08:00:00-08:59:59"=>0,
                                    "09:00:00-09:59:59"=>0,
                                    "10:00:00-10:59:59"=>0,
                                    "11:00:00-11:59:59"=>0,
                                    "12:00:00-12:59:59"=>0,
                                    "13:00:00-13:59:59"=>0,
                                    "14:00:00-14:59:59"=>0,
                                    "15:00:00-15:59:59"=>0,
                                    "16:00:00-16:59:59"=>0,
                                    "17:00:00-17:59:59"=>0,
                                    "18:00:00-18:59:59"=>0,
                                    "19:00:00-19:59:59"=>0,
                                    "20:00:00-21:59:59"=>0,
                                    "22:00:00-22:59:59"=>0,
                                    "23:00:00-23:59:59"=>0
                );
            $tabIntervalPreviousdays = $tabIntervalHour;
            
            $previousdays = time()-3600*24;
            foreach ($tabIntervalHour as $key => $value) {
                  $data = explode("-", $key);
                  $tabIntervalHour[$key] = $managerVisites-> getNreVisitorHour(date("Y-m-d"), $data[0], $data[1]);
                  $tabIntervalPreviousdays[$key] = $managerVisites-> getNreVisitorHour(date("Y-m-d",$previousdays), $data[0], $data[1]);
            }
            
            $this->page->addVar('allVisitors', $totalvisieurs);
            $this->page->addVar('dayVisitors', $visiteursofday);
            $this->page->addVar('weekVisitor', $visitorofweek);
            
            $this->page->addVar('statofday', $tabIntervalHour);
            $this->page->addVar('statofpreviousday', $tabIntervalPreviousdays);
        }
        
        protected function init(){
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/jquery.jqplot.min.js']                         = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.dateAxisRenderer.min.js']       = 'screen';      
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.logAxisRenderer.min.js']        = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.canvasTextRenderer.min.js']     = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.cursor.min.js']                 = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.canvasAxisTickRenderer.min.js'] = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.pieRenderer.min.js']            = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.donutRenderer.min.js']          = 'screen';
            $this->tabJS[_WEB_JS_DIR_.'jqPlot/plugins/jqplot.highlighter.min.js']            = 'screen';

            $this->tabCSS[_WEB_JS_DIR_.'jqPlot/jquery.jqplot.min.css']                       = 'screen';
            $this->tabCSS[_THEME_CSS_MOD_DIR_.'Statistiques/Statistiques.css']               = 'screen';
            

            parent::init();
        }
        
        public function getDateOfThisWeek(){
            $tabdays = array();
            $lundi = date('Y-m-d', strtotime('last monday', strtotime(date("Y-m-d"))));
            $tabdays[$lundi]["ttcmd"] = 0;
            $tabdays[$lundi]["ttca"] = 0;
            $tabdays[$lundi]["ttnbcmd"] = 0;
            for($i=1; $i<7; $i++){
                $tabdays[date("Y-m-d", strtotime($lundi)+$i*24*3600)]["ttcmd"] = 0;
                $tabdays[date("Y-m-d", strtotime($lundi)+$i*24*3600)]["ttca"] = 0;
                $tabdays[date("Y-m-d", strtotime($lundi)+$i*24*3600)]["ttnbcmd"] = 0;
            }
            
            return $tabdays;
        }
        
        
        public function executeCommandes(HttpRequest $request) {
            $this->leftcolumn();
            $this->page->addVar('title', 'Commandes');
            $managerCmdAnn  = $this->managers->getManagerOf('PaiementAPI');
            $managerCmdCdts = $this->managers->getManagerOf('PaiementCredits');
            
            $this->addJS(_THEME_JS_MOD_DIR_.'Statistiques/Commandes.js');
            
            $TTCreditsWeek = $TTAnnPubWeek  = $TTAnnClsweek   = $this->getDateOfThisWeek();
           
           
            foreach ($TTCreditsWeek as $key => $value) {
                // total des commandes, totals du chiffres d'affaire, total nombre de commandes 
                $TTAnnClsweek[$key]["ttcmd"]    = $managerCmdAnn->getCAAnnClsOfDay($key);
                $TTAnnClsweek[$key]['ttca']     = $managerCmdAnn->getCAAnnClsOfDay($key,1);
                $TTAnnClsweek[$key]['ttnbcmd']  = $managerCmdAnn->getNBAnnClsOfDay($key);
                
                $TTAnnPubWeek[$key]["ttcmd"]    = $managerCmdAnn->getCAAnnPubOfDay($key);
                $TTAnnPubWeek[$key]['ttca']     = $managerCmdAnn->getCAAnnPubOfDay($key,1);
                $TTAnnPubWeek[$key]['ttnbcmd']  = $managerCmdAnn->getNBAnnPubOfDay($key);
                
                $TTCreditsWeek[$key]["ttcmd"]   = $managerCmdCdts->getCACdtsOfDay($key);
                $TTCreditsWeek[$key]['ttca']    = $managerCmdCdts->getCACdtsOfDay($key,1);
                $TTCreditsWeek[$key]['ttnbcmd'] = $managerCmdCdts->getNBCdtsOfDay($key);
            }
             //var_dump($TTCreditsWeek);
            $this->page->addVar('ttpub', $TTAnnPubWeek);
            $this->page->addVar('ttannonces', $TTAnnClsweek);
            $this->page->addVar('ttcdts', $TTCreditsWeek);
        }
        
        public function executeStatPaiementMode(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Modes de paiements');
            $managerCmdAnn  = $this->managers->getManagerOf('PaiementAPI');
            $managerCmdCdts = $this->managers->getManagerOf('PaiementCredits');
            $manager = $this->managers->getManagerOf('PaiementMod');
            $tabmodepaiement = array();
            $datalist = $manager->findAll2();
            $total = 0;
            $credit = 0;
            $annonce = 0;
            
            foreach ($datalist as $value) {
                $credit = $managerCmdCdts->getNBCmdByPaiementMode($value->getId());
                $annonce = $managerCmdAnn->getNBCmdByPaiementMode($value->getId());
                
                $tabmodepaiement[$value->getId()]['nb'] = $credit + $annonce;
                $tabmodepaiement[$value->getId()]['name'] = $value->getNom();
                $tabmodepaiement[$value->getId()]['percent'] = 0;
                $total += $credit + $annonce;
                
            }
            
            foreach ($datalist as $value)
                $tabmodepaiement[$value->getId()]['percent'] = ($tabmodepaiement[$value->getId()]['nb']*100)/$total;
            
            $this->addJS(_THEME_JS_MOD_DIR_.'Statistiques/StatPaiementMode.js');
           
            //var_dump($tabmodepaiement);
            $this->page->addVar('tabmode', $tabmodepaiement);
        }
        
        public function executeGlobalView(HttpRequest $request){
            $this->leftcolumn();
            $this->page->addVar('title', 'Vue Globale');
            $managerCmdAnn  = $this->managers->getManagerOf('PaiementAPI');
            $managerCmdCdts = $this->managers->getManagerOf('PaiementCredits');
            $managerVisites = $this->managers->getManagerOf('CompteurVisites');
            $managerAnnonce = $this->managers->getManagerOf('Annonce');
            $managerPub     = $this->managers->getManagerOf('Adversiting');
            $managerCat     = $this->managers->getManagerOf('Categories');
         
            $this->addJS(_THEME_JS_MOD_DIR_.'Statistiques/GlobalView.js');
            
            $totalvisieurs         = $managerVisites->getNbreVisiteur();
            $visiteursofday        = $managerVisites->getNbreVisiteurOfday();
            $visitorofweek         = $managerVisites->getNbreVisiteurOfWeek();
            $mostpopularannoncecls = $managerAnnonce->getMostPopularAnnonce();
            $mostpopularannoncepub = $managerPub->getMostPopularAnnonce();
            $mostpopularcategories = $managerCat->getMostPopularCategory();
            
            $totalWeekAnnoncesCls  = 0;
            $totalWeekAnnoncespub  = 0;
            
            $tabWeek = $TTCreditsWeek = $TTAnnPubWeek  = $TTAnnClsweek = $this->getDateOfThisWeek();
           
            foreach ($tabWeek as $key => $value) {
                 $totalWeekAnnoncesCls += $managerCmdAnn->getNBAnnClsOfDay($key);    
                 $totalWeekAnnoncespub += $managerCmdAnn->getNBAnnPubOfDay($key);
                 
                 $TTAnnClsweek[$key]["ttcmd"]    = $managerCmdAnn->getCAAnnClsOfDay($key);
                 $TTAnnPubWeek[$key]["ttcmd"]    = $managerCmdAnn->getCAAnnPubOfDay($key);
                 $TTCreditsWeek[$key]["ttcmd"]   = $managerCmdCdts->getCACdtsOfDay($key);
            }
            
            $this->page->addVar('ttpub', $TTAnnPubWeek);
            $this->page->addVar('ttannonces', $TTAnnClsweek);
            $this->page->addVar('ttcdts', $TTCreditsWeek);
            $this->page->addVar('allVisitors', $totalvisieurs);
            $this->page->addVar('dayVisitors', $visiteursofday);
            $this->page->addVar('weekVisitor', $visitorofweek);
            $this->page->addVar('ttannoncesclsofweek', $totalWeekAnnoncesCls);
            $this->page->addVar('ttannoncespubofweek', $totalWeekAnnoncespub);
            $this->page->addVar('mostpopularannocescls', $mostpopularannoncecls);
            $this->page->addVar('mostpopularannocespub', $mostpopularannoncepub);
            $this->page->addVar('mostpopularcat', $mostpopularcategories);
            
            
        }
        
    }
?>