<?php
                                /**
                                 * Description of TchatController
                                 *
                                 * @author MBIDA Luc Alfred
                                 *
                                 */

                                    namespace Applications\Modules\Tchat\Backend\Controller;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Helper\HelperBackController;
                                    use Library\HttpRequest;
                                    use Applications\Modules\Tchat\Form\TchatForm;
                                    use Library\Tools;
                                    
                                    class TchatController extends HelperBackController{
                                        // Inserer votre code ici!
                                        protected $name = "Tchat";
                                    }
                            ?>