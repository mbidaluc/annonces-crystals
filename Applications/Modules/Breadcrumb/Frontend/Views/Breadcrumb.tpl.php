
<?php
        $tabNav = array("les-annonces" => 'Mes annonces',
                        "mesannonces" => '<a href="http://annonces-crystals.localhost/les-annonces.html" >Mes annonces</a> >> Mes Annonces classiques',
                        "mesannoncespub" => '<a href="http://annonces-crystals.localhost/les-annonces.html" >Mes annonces</a>  >> Mes Annonces publicitaires',
                        "packs" => '<a href="http://annonces-crystals.localhost/compte.html" >Mon compte</a> >> Acheter du credit',
                        "contact" => "Nous contacter",
            
                        "createannoncefront" => "Envoyer une annonce",
                        "listpartenaires" => "Envoyer une annonce >> Etape 2",
                        "modepaiementfront" => "Envoyer une annonce >> Etape 3",
                        "poster-une-annonce-publicitaire" => "Envoyer une annonce (pub)",
                        "modepaiementfrontpub" => "Envoyer une annonce (pub) >> Etape 2",
            
            
                        "cga" => "Conditions d'annonce",
                        "aide" => "Aide",
                        "listingpartenaires" => "Partenaires",
                        "alaune" => "A la une",
                        "urgence" => "Urgence",
                        "evenements" => "Evènement",
                        "speciales" => "Spéciales",
                        "mobiles" => "Mobiles",
                        "mescmtcdt" => "Mes commandes de crédits"
                        
            );
	$tab = array();
	$infos_url =  $_SERVER['REQUEST_URI'];
	$tab[0] = '<a href="http://annonces-crystals.localhost/index.html">Accueil</a>';
	$val = explode("/", $infos_url);
        $taille =  count($val);
	$i = 1;
	$number = count($val) - 1;
        if(($val[$number] != "index.html")){    
            $info = explode(".", $val[$number]);
            
            $innfo = explode("-", $info[0]);
            if(isset($tabNav[$innfo[0]])){
                $tab[$i] = $tabNav[$innfo[0]];
            }else{
                for($i = 1; $i<$taille; $i++){
                        if(($i == $number)){

                                $tab[$i] = str_replace('-',' ',ucfirst($val[$i]));
                                $info = explode(".", $tab[$i]);
                                $tab[$i] = $info[0];
                                if($taille > 2){
                                    $tab[$i-1] = '<a href="'._BASE_URI_.lcfirst($tab[$i-1]).'">'.$tab[$i-1].'</a>';
                                }
                        }else{
                                $tab[$i] = ucfirst($val[$i]);
                        }
                    }
            }
	}else{
            $tab[0] = " ";
        }
		
	echo implode(" >> ", $tab);	
?>
