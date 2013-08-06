<?php
                                    /**
                                    * Description of CompteurVisites
                                    *
                                    * @author Luc Alfred MBIDA
                                    */
                                    namespace Applications\Modules\CompteurVisites\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Record;
                                    
                                    class CompteurVisites extends Record{
 					 protected $idSession;
 					 protected $ipAdress;
 					 protected $dateConn;

 						  // SETTERS
 					 public function setIdSession($idSession){
 						$this->idSession = $idSession;
 					}
 					 public function setIpAdress($ipAdress){
 						$this->ipAdress = $ipAdress;
 					}
 					 public function setDateConn($dateConn){
 						$this->dateConn = $dateConn;
 					}

						   // GETTERS
 					 public function getIdSession(){
 						return $this->idSession;
 					}
 					 public function getIpAdress(){
 						return $this->ipAdress;
 					}
 					 public function getDateConn(){
 						return $this->dateConn;
 					} 

                        }
                    ?>