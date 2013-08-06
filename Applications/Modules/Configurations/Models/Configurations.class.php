<?php
    /**
     * Description of Configurations
     *
     * @author MBIDA Luc
     */
    namespace Applications\Modules\Configurations\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Record;

    class Configurations extends Record{
        protected $idParam;
        protected $nomSite;
        protected $emailSite;
        protected $bgImage;
        protected $repeatX;
        protected $repeatY;
        protected $is_active;
        protected $metaDescription;
        protected $metaKeyword;
        protected $coutDuree;
        protected $cout1image;
        protected $cout2image;
        protected $cout3image;
        protected $cout4image;
        protected $cout5image;
        protected $cout6image;
        protected $cout7image;
        protected $cout8image;
        protected $cout9image;
        protected $frequenceEnvNL;
        protected $prixUniteAnnonce;
        protected $NLEntete;
        protected $NLPied;
        protected $NLCompteur;
        protected $defaultSpecialeImage;
        protected $defaultUneImage;
        protected $defaultEvtImage;
        protected $defaultAnnonceImage;
        protected $cptNbDigit;
        protected $cptBeginDigit;
        protected $defaultCategoryImage;


         //SETTERS
         public function setDefaultCategoryImage($defaultCategoryImage){
                $this->defaultCategoryImage = $defaultCategoryImage;
        }
         public function setDefaultSpecialeImage($defaultSpecialeImage){
                $this->defaultSpecialeImage = $defaultSpecialeImage;
        }
         public function setDefaultUneImage($defaultUneImage){
                $this->defaultUneImage = $defaultUneImage;
        }
         public function setDefaultEvtImage($defaultEvtImage){
                $this->defaultEvtImage = $defaultEvtImage;
        }
         public function setDefaultAnnonceImage($defaultAnnonceImage){
                $this->defaultAnnonceImage = $defaultAnnonceImage;
        }
        public function setPrixUniteAnnonce($prixUniteAnnonce){
            $this->prixUniteAnnonce = $prixUniteAnnonce;
        }
        public function setFrequenceEnvNL($frequenceEnvNL){
            $this->frequenceEnvNL = $frequenceEnvNL;
        }
        
        public function setCout1image($coutimage) {

            $this->cout1image = $coutimage;

        }
        
        public function setCout2image($coutimage) {

            $this->cout2image = $coutimage;

        }
        
        public function setCout3image($coutimage) {

            $this->cout3image = $coutimage;

        }
        
        public function setCout4image($coutimage) {

            $this->cout4image = $coutimage;

        }
        
        public function setCout5image($coutimage) {

            $this->cout5image = $coutimage;

        }
        
        public function setCout6image($coutimage) {

            $this->cout6image = $coutimage;

        }
        
        public function setCout7image($coutimage) {

            $this->cout7image = $coutimage;

        }
        
        public function setCout8image($coutimage) {

            $this->cout8image = $coutimage;

        }
        
        public function setCout9image($coutimage) {

            $this->cout9image = $coutimage;

        }
        
        public function setCoutDuree($coutDuree) {

            $this->coutDuree = $coutDuree;

        }

        public function setMetaDescription($metaDescription) {

            $this->metaDescription = $metaDescription;

        }

        public function setMetaKeyword($metaKeyWord) {

            $this->metaKeyword = $metaKeyWord;

        }

        public function setIdParam($idParam) {

            $this->idParam = $idParam;

        }

         public function setNomSite($nomSite) {

            $this->nomSite = $nomSite;

        }


        public function setEmailSite($emailSite) {

            $this->emailSite = $emailSite;

        }

        public function setBgImage($bgImage) {

            $this->bgImage = $bgImage;

        }

        public function setRepeatX($repeatX) {

            $this->repeatX = $repeatX;

        }

        public function setRepeatY($repeatY) {

            $this->repeatY = $repeatY;

        }

        public function setIs_Active($is_active) {

            $this->is_active = $is_active;

        }
        
        public function setNLEntete($NLEntete){
            $this->NLEntete = $NLEntete;
        }
        
        public function setNLPied($NLPied){
            $this->NLPied = $NLPied;
        }
        
        public function setNLCompteur($NLCompteur){
            $this->NLCompteur = $NLCompteur;
        }
        public function setCptNbDigit($cptNbDigit){
            $this->cptNbDigit = $cptNbDigit;
        }
         public function setCptBeginDigit($cptBeginDigit){
            $this->cptBeginDigit = $cptBeginDigit;
        }


        //GETTERS
        public function getIdParam() {

            return $this->idParam;

        }

        public function getBgImage() {

            return $this->bgImage;

        }

        public function getRepeatX() {

            return $this->repeatX;

        }

        public function getRepeatY() {

            return $this->repeatY;

        }

        public function getIs_Active() {

            return $this->is_active;

        }

        public function getEmailSite() {

            return $this->emailSite;

        }

         public function getNomSite() {

            return $this->nomSite;

        }


        public function getMetaDescription() {

            return $this->metaDescription;

        }

        public function getMetaKeyword() {

            return $this->metaKeyword;

        }
        
        public function getCoutDuree() {

            return $this->coutDuree;

        }
        
        public function getCout1image() {

            return $this->cout1image;

        }
        
        public function getCout2image() {

            return $this->cout2image;

        }
        
        public function getCout3image() {

            return $this->cout3image;

        }
        
        public function getCout4image() {

            return $this->cout4image;

        }
        
        public function getCout5image() {

            return $this->cout5image;

        }
        
        public function getCout6image() {

            return $this->cout6image;

        }
        
        public function getCout7image() {

            return $this->cout7image;

        }
        
        public function getCout8image() {

            return $this->cout8image;

        }
        
        public function getCout9image() {

            return $this->cout9image;

        }
        public function getFrequenceEnvNL(){
            return $this->frequenceEnvNL;
        }
        
        public function getPrixUniteAnnonce(){
            return $this->prixUniteAnnonce;
        }
        
        public function getNLEntete(){
            return $this->NLEntete;
        }
        public function getNLPied(){
            return $this->NLPied;
        }
        public function getNLCompteur(){
            return $this->NLCompteur;
        } 
        
         public function getDefaultSpecialeImage(){
                return $this->defaultSpecialeImage;
        }
         public function getDefaultUneImage(){
                return $this->defaultUneImage;
        }
         public function getDefaultEvtImage(){
                return $this->defaultEvtImage;
        }
         public function getDefaultAnnonceImage(){
                return $this->defaultAnnonceImage;
        } 
        public function getCptNbDigit(){
            return $this->cptNbDigit;
        }
         public function getCptBeginDigit(){
            return $this->cptBeginDigit;
        } 
        
         public function getDefaultCategoryImage(){
            return $this->defaultCategoryImage;
        }


    }
?>