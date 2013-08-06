<?php
    /**
        * Description of TchatController
        *
        * @author MBIDA Luc Alfred
        *
        */

        namespace Applications\Modules\Tchat\Frontend\Controller;

        if( !defined('IN') ) die('Hacking Attempt');

        use Helper\HelperBackController;
        use Library\HttpRequest;
        use Applications\Modules\Tchat\Form\TchatForm;
        use Library\Tools;

        class TchatController extends HelperBackController{
            // Inserer votre code ici!
            protected $name = "Tchat";
            
            function executePostMessage(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                $_POST['dateMsg'] = date("Y-m-d");
                if($managerChat->add($_POST))
                    echo "ok";
                else
                    echo "nonOk";
                exit;
            }
           
            /**
             *
             * Ici on va testter 
             */
            function executeExchangedMessageOfToday(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                $data = $managerChat->getExchangedMessage($_POST['pseudo'], "Annonceur", date("Y-m-d"), $_POST['id']);
                //var_dump($data);
                $this->page->addVar('datalist', $data);
            }
            
            function executeMyOnlineUser(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                $data = $managerChat->getMyOnlineUser($_POST['id'], date("Y-m-d"));
                $this->page->addVar('datalist', $data);
            }
            
            function executeRegisterOnlineUser(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                $userr = $managerChat->getOnlineUserAttrribute($_POST['pseudo'], $_POST['id'],date("Y-m-d"));
                if(!count($userr)){
                    if($managerChat->AddChatOnline($_POST['pseudo'], $_POST['id'],date("Y-m-d")))
                        echo "1";
                    else
                        echo "0";
                }else{
                     echo "0";
                }
                exit;
            }
            
            function executeUpdateOnlineUserStatut(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                if($managerChat->UpdateUserOnlineStatus($_POST['pseudo'], $_POST['id'], $_POST['status'], date("Y-m-d")))
                    echo "ok";
                else
                    echo "nonOk";
                exit;
            }
            
            function executeDisconnectOnlineUser(HttpRequest $request){
                $managerChat = $this->managers->getManagerOf('Tchat');
                if($managerChat->DisconnectOnlineUser($_POST['pseudo'], $_POST['id'], date("Y-m-d")))
                    echo "ok";
                else
                    echo "nonOk";
                exit;
            }
        }
?>