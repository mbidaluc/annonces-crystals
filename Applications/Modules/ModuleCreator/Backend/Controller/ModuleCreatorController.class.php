<?php

/**
 * Description of ModuleCreatorController
 *
 * @author Le Maître Rikudou
 *
 */

    namespace Applications\Modules\ModuleCreator\Backend\Controller;

    if( !defined('IN') ) die('Hacking Attempt');

    use Helper\HelperBackController;
    use Library\HttpRequest;
    use Library\Classe\Form\Form;
    use Library\Tools;
    use Applications\Modules\ModuleCreator\Form\ModuleCreatorForm;

class ModuleCreatorController extends HelperBackController{

    private function rightcolumn(){
        $out ='Créer des modules';
        return $this->page->addVar('right_content', $out);
    }

    public function executeCreatemodule(HttpRequest $request){
        // On ajoute une définition pour le titre
        $this->page->addVar('title', 'Nouveau Module');        
        $this->rightcolumn();
        
        $dataArray = array();
        $tab['NULL'] = 'Sélectioner une table';
        $manager =  $this->managers->getManagerOf('ModuleCreator');
        $datalist = $manager->getDBTables();
        //var_dump($datalist);
        foreach($datalist as $data){
            $tab[$data->TABLE_NAME] = $data->TABLE_NAME;
        }
        if($request->getMethod('post')){
            $dataArray = $_POST;
        }
        $dataForm = ModuleCreatorForm::getForm($dataArray, $tab);
        if($request->getMethod('post')){
            if ($dataForm->is_valid($_POST)) {
                $modules = ucfirst($_POST['module']);
                $auteur = $_POST['auteur'];
                $modulepath = _SITE_ROOT_DIR_.'\\Applications\Modules\\'.$modules.'\\';
                $txt = '';
                //echo "module dir : ".$modulepath;
                if(!mkdir($modulepath)){
                    die('Echec lors de la création du répertoire '.$modules);
                }else{
                    if($request->getValue('models')){
                        if(!mkdir($modulepath.'Models\\')){
                            die('Echec lors de la création du répertoire Models');
                        }
                        $fic1 = fopen($modulepath.'Models\\'.$modules.'.class.php', 'a');
                        $fic2 = fopen($modulepath.'Models\\'.$modules.'Manager.class.php', 'a');
                        $fic3 = fopen($modulepath.'Models\\'.$modules.'Manager_PDO.class.php', 'a');
                        $txt = '<?php
                                    /**
                                    * Description of '.$modules.'
                                    *
                                    * @author '.$auteur.'
                                    */
                                    namespace Applications\Modules\\'.$modules.'\Models;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    use Library\Record;
                                    
                                    class '.$modules.' extends Record{';
                        //if($_POST['table']){
                            $variables = $manager->getTableAttributes($_POST['table']);
                            foreach($variables as $data)
                                $txt .= "\n \t\t\t\t\t protected $".$data->COLUMN_NAME.";";
                            
                        $txt .= "\n\n \t\t\t\t\t\t  // SETTERS";
                            
                            $setters = $manager->getTableAttributes($_POST['table']);
                            foreach($setters as $data){
                                $txt .="\n \t\t\t\t\t public function set".ucfirst($data->COLUMN_NAME)."($".$data->COLUMN_NAME."){\n \t\t\t\t\t\t";
                                $txt .= '$this->'.$data->COLUMN_NAME.' = $'.$data->COLUMN_NAME.';';
                                $txt .="\n \t\t\t\t\t}";
                            }
                         $txt .= "\n\n\t\t\t\t\t\t   // GETTERS";  
                         
                            $getters = $manager->getTableAttributes($_POST['table']);
                            foreach($getters as $data){
                                $txt .="\n \t\t\t\t\t public function get".ucfirst($data->COLUMN_NAME)."(){\n \t\t\t\t\t\t";
                                $txt .= 'return $this->'.$data->COLUMN_NAME.';';
                                $txt .="\n \t\t\t\t\t}";
                            }
                         
                        $txt .= ' 

                        }
                    ?>';
                        fwrite($fic1, $txt);
                        $txt = '<?php
                                    /**
                                    * Description of '.$modules.'Manager
                                    *
                                    * @author '.$auteur.'
                                    */
                                    namespace Applications\Modules\\'.$modules.'\Models;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    use Library\Manager;

                                    abstract class '.$modules.'Manager extends Manager{
                                        protected $name = \'Applications\Modules\\'.$modules.'\Models\\'.$modules.'\';
                                        protected $nameTable ="'.strtolower($modules).'";
                                        // Inserer votre code ici
                                    }
                                ?>';
                        fwrite($fic2, $txt);
                        $txt = '<?php
                                    /**
                                    * Description of '.$modules.'Manager_PDO
                                    *
                                    * @author '.$auteur.'
                                    */
                                    namespace Applications\Modules\\'.$modules.'\Models;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    class '.$modules.'Manager_PDO extends '.$modules.'Manager{
                                        // Inserer votre code ici
                                    }
                                ?>';
                        fwrite($fic3, $txt);
                        
                        fclose($fic1);
                        fclose($fic2);
                        fclose($fic3);
                        
                    }
                    //création du backend
                    if($request->getValue('backend')){
                        if(!mkdir($modulepath.'Backend\\',0 ,true)){
                            echo $modulepath.'Backend\\';
                            die('Echec lors de la création du répertoire Backend');
                        }
                        mkdir($modulepath.'Backend\\Controller\\');
                        mkdir($modulepath.'Backend\\Views\\');
                        $fic1 = fopen($modulepath.'Backend\\Controller\\'.$modules.'Controller.class.php', 'a');
                        $fic2 = fopen($modulepath.'Backend\\Views\\'.$modules.'.tpl.php', 'a');
                        $fic3 = fopen($modulepath.'Backend\\Views\\'.$modules.'create.tpl.php', 'a');
                        $txt = '<?php
                                /**
                                 * Description of '.$modules.'Controller
                                 *
                                 * @author '.$auteur.'
                                 *
                                 */

                                    namespace Applications\Modules\\'.$modules.'\Backend\Controller;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    use Helper\HelperBackController;
                                    use Library\HttpRequest;
                                    '.($request->getValue('form')?'use Applications\Modules\\'.$modules.'\Form\\'.$modules.'Form;':'').'
                                    use Library\Tools;
                                    
                                    class '.$modules.'Controller extends HelperBackController{
                                        // Inserer votre code ici!
                                        protected $name = "'.$modules.'";
                                    }
                            ?>';

                        fwrite($fic1, $txt);
                        $txt = '<?php
                                    // Inserer votre code ici!
                                ?>';
                        fwrite($fic2, $txt);
                        fwrite($fic3, $txt);
                        fclose($fic1);
                        fclose($fic2);
                        fclose($fic3);
                    }

                    //création du frontend
                    if($request->getValue('frontend')){
                        if(!mkdir($modulepath.'Frontend\\')){
                            die('Echec lors de la création du répertoire Frontend');
                        }
                        mkdir($modulepath.'Frontend\\Controller\\');
                        mkdir($modulepath.'Frontend\\Views\\');
                        $fic1 = fopen($modulepath.'Frontend\\Views\\'.$modules.'.tpl.php', 'a');
                        $fic2 = fopen($modulepath.'Frontend\\Controller\\'.$modules.'Controller.class.php', 'a');                        
                        $txt = '<?php
                                    // Inserer votre code ici!
                                ?>';
                        fwrite($fic1, $txt);
                        $txt = '<?php
                                /**
                                 * Description of '.$modules.'Controller
                                 *
                                 * @author '.$auteur.'
                                 *
                                 */

                                    namespace Applications\Modules\\'.$modules.'\Frontend\Controller;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    use Helper\HelperBackController;
                                    use Library\HttpRequest;
                                    '.($request->getValue('form')?'use Applications\Modules\\'.$modules.'\Form\\'.$modules.'Form;':'').'
                                    use Library\Tools;

                                    class '.$modules.'Controller extends HelperBackController{
                                        // Inserer votre code ici!
                                        protected $name = "'.$modules.'";
                                    }
                            ?>';
                        fwrite($fic2, $txt);
                        fclose($fic1);
                        fclose($fic2);                        
                        
                    }
                    if($request->getValue('form')){
                        if(!mkdir($modulepath.'Form\\')){
                            die('Echec lors de la création du répertoire Form');
                        }
                        $fic1 = fopen($modulepath.'Form\\'.$modules.'Form.class.php', 'a');
                        $txt = '<?php
                                /**
                                 * Description of '.$modules.'Form
                                 *
                                 * @author '.$auteur.'
                                 *
                                 */

                                    namespace Applications\Modules\\'.$modules.'\Form;

                                    if( !defined(\'IN\') ) die(\'Hacking Attempt\');

                                    use Library\Classe\Form\Form;                                    

                                    class '.$modules.'Form extends Form{
                                        // Inserer votre code ici!
                                    }
                            ?>';
                        fwrite($fic1, $txt);
                        fclose($fic1);
                    }
                    
                    if($request->getValue('config')){
                        if(!mkdir($modulepath.'Config\\')){
                            die('Echec lors de la création du répertoire Config');
                        }
                        $fic1 = fopen($modulepath.'Config\B'.$modules.'Route.xml', 'a');
                        $fic2 = fopen($modulepath.'Config\F'.$modules.'Route.xml', 'a');
                        $txt ='
                            <routes>
                                
                            </routes>
                        ';
                        fwrite($fic1, $txt);
                        fwrite($fic2, $txt);
                        fclose($fic1);
                        fclose($fic2);
                    }
                    if($request->getValue('web')){
                        if(!mkdir($modulepath.'web\\')){
                            die('Echec lors de la création du répertoire web');
                        }
                        mkdir($modulepath.'web\\js\\');
                        mkdir($modulepath.'web\\css\\');
                        $fic1 = fopen($modulepath.'web\js\\'.$modules.'.js', 'a');
                        $fic2 = fopen($modulepath.'web\css\\'.$modules.'.css', 'a');                        
                        fclose($fic1);
                        fclose($fic2);
                    }
                    $this->infos ='Le Module '.$_POST['module'].' à été créé avec succès!';
                    $dataArray = $_POST;
                }
                }else{
                    $dataArray = $_POST;
                }
            }
            $this->page->addVar('infos', $this->infos);
            $this->page->addVar('errors', $this->errors);
            $this->page->addVar('dataForm', $dataForm);
        }

    }

?>
