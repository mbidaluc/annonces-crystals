<?php
    /**
    * Description of PhotosAnnoncesGalleriesManager
    *
    * @author Mbida Luc Alfred
    */
    namespace Applications\Modules\PhotosAnnoncesGalleries\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class PhotosAnnoncesGalleriesManager extends Manager{
        protected $name = 'Applications\Modules\PhotosAnnoncesGalleries\Models\PhotosAnnoncesGalleries';
        protected $nameTable ="photos_annonces";
        // Inserer votre code ici
        
        abstract public function savePhoto($url, $type, $idAnnonce);
        abstract public function updatePhoto($id, $url, $idAnnonce);
        
    }
?>