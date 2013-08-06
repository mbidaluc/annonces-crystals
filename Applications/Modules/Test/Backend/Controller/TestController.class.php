<?php
                                /**
                                 * Description of TestController
                                 *
                                 * @author QLFRED M?IDQ
                                 *
                                 */

                                    namespace Applications\Modules\Test\Backend\Controller;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Helper\HelperBackController;
                                    use Library\HttpRequest;
                                    use Applications\Modules\Test\Form\TestForm;
                                    use Library\Tools;
                                    
                                    class TestController extends HelperBackController{
                                        // Inserer votre code ici!
                                        protected $name = "Test";
                                    }
                            ?>