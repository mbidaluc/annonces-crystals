<?php
                                    /**
                                    * Description of TestManager
                                    *
                                    * @author QLFRED M?IDQ
                                    */
                                    namespace Applications\Modules\Test\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Manager;

                                    abstract class TestManager extends Manager{
                                        protected $name = 'Applications\Modules\Test\Models\Test';
                                        protected $nameTable ="test";
                                        // Inserer votre code ici
                                    }
                                ?>