<?php
                                    /**
                                    * Description of BreadcrumbManager
                                    *
                                    * @author Luc Alfred MBIDA
                                    */
                                    namespace Applications\Modules\Breadcrumb\Models;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Library\Manager;

                                    abstract class BreadcrumbManager extends Manager{
                                        protected $name = 'Applications\Modules\Breadcrumb\Models\Breadcrumb';
                                        protected $nameTable ="breadcrumb";
                                        // Inserer votre code ici
                                    }
                                ?>