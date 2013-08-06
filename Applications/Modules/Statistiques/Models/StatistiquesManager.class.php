<?php
                                    /**
                                    * Description of StatistiquesManager
                                    *
                                    * @author Luc Alfred MBIDA
                                    */
                                    namespace Applications\Modules\Statistiques\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Manager;

                                    abstract class StatistiquesManager extends Manager{
                                        protected $name = 'Applications\Modules\Statistiques\Models\Statistiques';
                                        protected $nameTable ="statistiques";
                                        // Inserer votre code ici
                                    }
                                ?>