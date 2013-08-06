<?php
                /**
                * Description of NewsLetter
                *
                * @author Mbida Luc Alfred
                */
                namespace Applications\Modules\NewsLetter\Models;

                if( !defined('IN') ) die('Hacking Attempt');

                use Library\Record;

                class NewsLetter extends Record{
                        protected $idCategorie;
                        protected $IdMembers;

                                // SETTERS
                        public function setIdCategorie($idCategorie){
                            $this->idCategorie = $idCategorie;
                    }
                        public function setIdMembers($IdMembers){
                            $this->IdMembers = $IdMembers;
                    }

                                // GETTERS
                        public function getIdCategorie(){
                            return $this->idCategorie;
                    }
                        public function getIdMembers(){
                            return $this->IdMembers;
                    } 

    }
?>