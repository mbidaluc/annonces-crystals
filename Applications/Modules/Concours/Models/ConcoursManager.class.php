<?php
                                    /**
                                    * Description of ConcoursManager
                                    *
                                    * @author licence
                                    */
                                    namespace Applications\Modules\Concours\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Manager;

                                    abstract class ConcoursManager extends Manager{
                                        protected $name = 'Applications\Modules\Concours\Models\Concours';
                                        protected $nameTable ="concours";
                                        // Inserer votre code ici
                                    }
                                ?>