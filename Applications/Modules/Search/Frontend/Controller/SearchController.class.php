<?php
/**
 * Description of SearchController
 *
 * @author ffozeu
 *
 */

namespace Applications\Modules\Search\Frontend\Controller;

if( !defined('IN') ) die('Hacking Attempt');

use Helper\HelperBackController;
use Library\HttpRequest;
use Applications\Modules\Search\Form\SearchForm;
use Library\Tools;

class SearchController extends HelperBackController{
    // Inserer votre code ici!
    protected $name = "Search";
    
    public function executeResults(HttpRequest $request){
        parent::getInfosPage('search');
        
        $managerAnnonce = $this->managers->getManagerOf('Annonce');
        $managerPhoto   = $this->managers->getManagerOf('PhotosAnnoncesGalleries');
        $managerCategorie = $this->managers->getManagerOf('Categories');
        
        $paged =$request->getValue('paged')?intval($request->getValue('paged')):1;
        
        $dataList = array();
		$images = array();
        $categoriesL = array();
        if($request->getMethod('post')){
            if(!$request->isXmlHttpRequest()){
                $this->addCSS(_THEME_CSS_MOD_DIR_.$this->name.'/'.$this->name.'.css');
                $this->addJS(_THEME_JS_MOD_DIR_.$this->name.'/'.$this->name.'.js');
                $param = array();
                $valtext = $request->getValue('search_text')!='Recherche'?$request->getValue('search_text'):'';
                $param['chps']        = $request->getValue('search_text')!='Recherche'?explode(' ', $valtext):array();
                $param['ville']       = $request->getValue('search_ville')!='Ville'?$request->getValue('search_ville'):'';
                $param['categorie']   = $request->getValue('category');
                $param['prixmin']     = $request->getValue('search_price_min')!='Prix min'?$request->getValue('search_price_min'):'';
                $param['prixmax']     = $request->getValue('search_price_max')!='Prix max'?$request->getValue('search_price_max'):'';
                $tabCrypt = $param;
                array_shift($tabCrypt);
                $tabCrypt['chps'] = $request->getValue('search_text')!='Recherche'?$request->getValue('search_text'):'';
            }else{
                $array1 =array('%C3%A9');
                $array2 =array('é');
                $searchparam = explode('&', $request->getValue('searchparam'));
                foreach ($searchparam as $value) {
                    list($key,$val) = explode('=', $value);
                    $_POST[$key] = $val;
                }
                $valtext = $request->getValue('search_text_ajax');
                $param['chps'] = !empty($valtext)?explode(' ', $valtext):array();
                $param['ville'] = str_replace($array1, $array2, $request->getValue('search_ville_ajax'));
                $param['categorie']   = $request->getValue('category_ajax');
                $param['prixmin']     = $request->getValue('search_price_min_ajax');
                $param['prixmax']     = $request->getValue('search_price_max_ajax');
                $tabCrypt = $param;
                array_shift($tabCrypt);
                $tabCrypt['chps'] = $valtext;
            }
            $mds5 = md5(implode(',',$tabCrypt));
            //on recupère les enfants de la catégorie sélectionnée
            if(!empty($param['categorie'])){
                $out = '('.intval($param['categorie']);
                $listChild = $managerCategorie->getListeFilsByIdParent($param['categorie']);
                foreach ($listChild as $cat) {
                    $out .= ','.$cat->getIdFils();
                }
                $out .= ')';
                $param['categorie'] = $out;
            }
            $dataList = $managerAnnonce->getResultsSearch($param,$paged);
            $countelt = $managerAnnonce->getNumberRows();
            foreach ($dataList as $infor) {
                $photo = $managerPhoto->getPrincipaleImage($infor->getId()); 
                if(!empty($photo))
                    $images[$infor->getId()] = $photo[0]->getUrl();
                $cat = $managerCategorie->findByName('idFils',$infor->getIdCategorie());
                $categoriesL[$infor->getId()] = $cat[0];
            }
            parent::pagination('Annonce',$countelt,$paged,5);
            $this->page->addVar('page_index',$paged.'_'.$mds5.'_search');
            $this->page->addVar('categoriesL',$categoriesL);
            $this->page->addVar('dataList',$dataList); 
            $this->page->addVar('images',$images);
            $this->page->addVar('paramsearch',$tabCrypt);
            
        }
    }
}
?>