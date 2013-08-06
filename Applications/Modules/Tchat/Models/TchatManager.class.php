<?php
    /**
    * Description of TchatManager
    *
    * @author MBIDA Luc Alfred
    */
    namespace Applications\Modules\Tchat\Models;

    if( !defined('IN') ) die('Hacking Attempt');

    use Library\Manager;

    abstract class TchatManager extends Manager{
        protected $name = 'Applications\Modules\Tchat\Models\Tchat';
        protected $nameTable ="chat_messages";
        // Inserer votre code ici
        
        abstract public  function getOnlineUserAttrribute($pseudo, $idAnnonceur, $date);
        abstract public  function DisconnectOnlineUser($pseudo, $idAnnonceur, $date);
        abstract public  function AddChatOnline($pseudo, $idAnnonceur, $date);
        abstract public  function UpdateUserOnlineStatus($pseudo, $idAnnonceur, $statut, $date);
        abstract public  function getMyOnlineUser($idAnnonceur, $date);
        
        abstract public  function getListMessage($pseudo, $idAnnonceur);
        
        abstract public  function getExchangedMessage($pseudoClient, $pseudeAnnonceur, $date, $idAnnonceur);
    }
?>