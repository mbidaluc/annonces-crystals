<?php
                                    /**
                                    * Description of Test
                                    *
                                    * @author QLFRED M?IDQ
                                    */
                                    namespace Applications\Modules\Test\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Record;
                                    
                                    class Test extends Record{
 					 protected $id;
 					 protected $designation;
 					 protected $pays;
 					 protected $ville;
 					 protected $phone1;
 					 protected $phone2;
 					 protected $email;
 					 protected $auteur;
 					 protected $dateexp;
 					 protected $idCategorie;
 					 protected $idPriorite;
 					 protected $idPosition;
 					 protected $idUder;
 					 protected $prixTotal;
 					 protected $texte;
 					 protected $is_actived;
 					 protected $dateDebut;
 					 protected $dureeAnnonce;
 					 protected $nbClick;
 					 protected $typeFacturation;
 					 protected $link_rewrite;
 					 protected $link;
 					 protected $urlSortant;

 						  // SETTERS
 					 public function setId($id){
 						$this->id = $id;
 					}
 					 public function setDesignation($designation){
 						$this->designation = $designation;
 					}
 					 public function setPays($pays){
 						$this->pays = $pays;
 					}
 					 public function setVille($ville){
 						$this->ville = $ville;
 					}
 					 public function setPhone1($phone1){
 						$this->phone1 = $phone1;
 					}
 					 public function setPhone2($phone2){
 						$this->phone2 = $phone2;
 					}
 					 public function setEmail($email){
 						$this->email = $email;
 					}
 					 public function setAuteur($auteur){
 						$this->auteur = $auteur;
 					}
 					 public function setDateexp($dateexp){
 						$this->dateexp = $dateexp;
 					}
 					 public function setIdCategorie($idCategorie){
 						$this->idCategorie = $idCategorie;
 					}
 					 public function setIdPriorite($idPriorite){
 						$this->idPriorite = $idPriorite;
 					}
 					 public function setIdPosition($idPosition){
 						$this->idPosition = $idPosition;
 					}
 					 public function setIdUder($idUder){
 						$this->idUder = $idUder;
 					}
 					 public function setPrixTotal($prixTotal){
 						$this->prixTotal = $prixTotal;
 					}
 					 public function setTexte($texte){
 						$this->texte = $texte;
 					}
 					 public function setIs_actived($is_actived){
 						$this->is_actived = $is_actived;
 					}
 					 public function setDateDebut($dateDebut){
 						$this->dateDebut = $dateDebut;
 					}
 					 public function setDureeAnnonce($dureeAnnonce){
 						$this->dureeAnnonce = $dureeAnnonce;
 					}
 					 public function setNbClick($nbClick){
 						$this->nbClick = $nbClick;
 					}
 					 public function setTypeFacturation($typeFacturation){
 						$this->typeFacturation = $typeFacturation;
 					}
 					 public function setLink_rewrite($link_rewrite){
 						$this->link_rewrite = $link_rewrite;
 					}
 					 public function setLink($link){
 						$this->link = $link;
 					}
 					 public function setUrlSortant($urlSortant){
 						$this->urlSortant = $urlSortant;
 					}

						   // GETTERS
 					 public function getId(){
 						return $this->id;
 					}
 					 public function getDesignation(){
 						return $this->designation;
 					}
 					 public function getPays(){
 						return $this->pays;
 					}
 					 public function getVille(){
 						return $this->ville;
 					}
 					 public function getPhone1(){
 						return $this->phone1;
 					}
 					 public function getPhone2(){
 						return $this->phone2;
 					}
 					 public function getEmail(){
 						return $this->email;
 					}
 					 public function getAuteur(){
 						return $this->auteur;
 					}
 					 public function getDateexp(){
 						return $this->dateexp;
 					}
 					 public function getIdCategorie(){
 						return $this->idCategorie;
 					}
 					 public function getIdPriorite(){
 						return $this->idPriorite;
 					}
 					 public function getIdPosition(){
 						return $this->idPosition;
 					}
 					 public function getIdUder(){
 						return $this->idUder;
 					}
 					 public function getPrixTotal(){
 						return $this->prixTotal;
 					}
 					 public function getTexte(){
 						return $this->texte;
 					}
 					 public function getIs_actived(){
 						return $this->is_actived;
 					}
 					 public function getDateDebut(){
 						return $this->dateDebut;
 					}
 					 public function getDureeAnnonce(){
 						return $this->dureeAnnonce;
 					}
 					 public function getNbClick(){
 						return $this->nbClick;
 					}
 					 public function getTypeFacturation(){
 						return $this->typeFacturation;
 					}
 					 public function getLink_rewrite(){
 						return $this->link_rewrite;
 					}
 					 public function getLink(){
 						return $this->link;
 					}
 					 public function getUrlSortant(){
 						return $this->urlSortant;
 					} 

                        }
                    ?>