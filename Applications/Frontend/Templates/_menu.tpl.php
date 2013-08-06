<div id="menu" class="clearfix">
    <?php
        echo '
        <ul>
            <li'; if( preg_match('#index.html#', $link->requestURI())) echo ' class="active"'; echo '><a href="'._BASE_URI_.'index.html">'._HOME_.'</a></li>
            <li'; if( preg_match('#les-annonces.html#', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'les-annonces.html">'._MES_ANNONCES_.'</a></li>
            <li'; if( preg_match('#createannoncefront.html#', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'createannoncefront.html">'._TEXT_ANNONCE_.'</a></li>
            <li'; if( preg_match('#newsletters.html#', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'newsletters.html">'._NEWSLETTERS_.'</a></li>
            <li'; if( preg_match('/contact.html/i', $link->requestURI())) echo ' class="active"'; echo'><a href="'._BASE_URI_.'contact.html">'._CONTACT_.'</a></li>';
            if($user->isAuthenticated()){
                echo '<li'; if( preg_match('#compte.html#', $link->requestURI())) echo ' class="active"'; echo '><a href="#">'._TEXT_COMPTE_.'</a>
                        <ul class="sous-menu">
                            <li><a href="utilisateurfront-edit-'.$_SESSION['user']['id'].'.html" title="Modifier mon compte">Modifier mon compte</a></li>
                            <li><a href="#" title="Mes Annonces">Mes Annonces</a>
                                <ul class="sous-menu-2">
                                    <li><a href="mesannonces.html" title="Annonces Classiques">Classiques</a></li>
                                    <li><a href="mesannoncespub.html" title="Annonces Publicitaires">Publicitaires</a></li>
                                </ul>
                            </li>
                            <li><a href="packs.html" title="Achat credits">Acheter du credit</a></li>
                            <li><a href="mescmtcdt.html" title="Mes commandes de crédits">Mes commandes de crédits</a></li>
                            <li><a href="#" title="Mes Annonces Expirées">Mes Annonces Expirées</a>
                                <ul class="sous-menu-2">
                                    <li><a href="mesannoncesexpirees.html" title="Annonces Classiques">Annonces Classiques</a></li>
                                    <li><a href="mesannocespubexpirees.html" title="Annonces Publicitaires">Annonces Publicitaires</a></li>
                                </ul>
                            </li>
                        </ul>
                     </li>
                     <li><a href="#" ></a></li>';
            }
        echo'</ul>';
    ?>
    <?php if($user->isAuthenticated()){ echo'<div class="infos_credits">CREDITS: '.(isset($_SESSION['user']['credits'])?$_SESSION['user']['credits']:'0').'</div>'; } ?>
</div>