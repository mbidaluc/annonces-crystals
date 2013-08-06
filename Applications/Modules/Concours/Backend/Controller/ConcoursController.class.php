<?php
                                /**
                                 * Description of ConcoursController
                                 *
                                 * @author licence
                                 *
                                 */

                                    namespace Applications\Modules\Concours\Backend\Controller;

                                    if( !defined('IN') ) die('Hacking Attempt');

                                    use Helper\HelperBackController;
                                    use Library\HttpRequest;
                                    use Applications\Modules\Concours\Form\ConcoursForm;
                                    use Library\Tools;
                                    
                                    class ConcoursController extends HelperBackController{
                                        // Inserer votre code ici!
                                        protected $name = "Concours";
                                    }
                            ?>