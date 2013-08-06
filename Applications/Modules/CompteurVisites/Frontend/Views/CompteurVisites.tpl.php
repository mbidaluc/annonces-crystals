<?php
    // Inserer votre code ici!
    /*$host         = _DB_SERVER_;
    $user         = _DB_USER_;
    $password     = _DB_PASSWD_;
    $database     = _DB_NAME_;

    $link         = mysql_connect($host, $user, $password) or die('Impossible de se connecter : ' . mysql_error());
    mysql_select_db($database,$link);

    $sql          = 'INSERT INTO '._DB_PREFIX_.'compteurvisite (idSession,ipAdress,dateConn) VALUES ("'. session_id().'","'.$_SERVER['REMOTE_ADDR'].'","'.date("Y-m-d H:i:s").'")';
    $result       = mysql_query($sql,$link);
    
    $sql          = 'SELECT count(distinct idSession) FROM '._DB_PREFIX_.'compteurvisite';
    $result       = mysql_query($sql,$link);
    $cpte         = mysql_fetch_array($result);
    
    $sql          =  'SELECT cptNbDigit, cptBeginDigit FROM '._DB_PREFIX_.'parametre WHERE idParam=1';
    $resultat     = mysql_query($sql,$link);
    $info         = mysql_fetch_array($resultat);
    
    $nbchifre     = $info[0];
    
    $totalvisieur = $info[1] + $cpte[0];
    $totalvisieur = (string)$totalvisieur;
    
    $nbchiffrevisiteur = strlen($totalvisieur);
    
    if($nbchifre > $nbchiffrevisiteur){
        $reste = $nbchifre - $nbchiffrevisiteur;
        for($i = 1; $i<=$reste; $i++)
            $totalvisieur = '0'.$totalvisieur;
    }
    $longeurnb = strlen($totalvisieur);
    for($i=0; $i<$longeurnb; $i++)
        echo '<img alt="'.$totalvisieur[$i].'" src="'._UPLOAD_DIR_.'CompteurVisites/'.$totalvisieur[$i].'.gif" />';
    */
?>