<div id="connexion">
    <form action="connexion.html" method="post" id="form">
        <div class="infos"><?php echo $user->getFlash(); ?></div>
            <div class="create">
                <fieldset>
                    <legend><span>Créer un compte</span></legend>
                    <p>Saisisser votre adresse email pour créer votre compte.</p>
                    <div class="content-input">
                        <input type="text" name="email" id="email" value="Adresse e-mail"/>
                    </div>
                    <div class="wrap_btn">
                        <span class="left-bouton"><span class="right-bouton"><input class="center-bouton" type="button" id="bouton" value="Créer un compte" /></span></span>
                    </div>
                </fieldset>
            </div>
        <div class="con-login">               
            <fieldset>
                <legend><span>Déjà inscrit?</span></legend>
                <p>Saisisser vos informations de connexion pour vous loguer.</p>
                 <?php if(!isset($_SESSION['user']['id'])){ ?> 
                    <div class="content-input">
                        <input type="text" name="login" id="pseudo" value="pseudo"/>
                        <input type="password" name="password" id="password" value="Mot de passe" />
                        <div class="forgot"><a href="forgetpwd.html">Mot de passe oublié?</a></div>
                    </div>
                    <div class="wrap_btn">
                        <span class="left-bouton"><span class="right-bouton"><input class="center-bouton" type="submit" value="Se connecter" /></span></span>
                    </div>
                    <?php }else{ ?>
                    <div><a href="utilisateurfront-edit-<?php echo $_SESSION['user']['id']; ?>.html" title="Modifier mon compte"><input type="button" value="Modifier mon compte" /></a>
                        <a href="deconnexionfront.html"><input type="button" value="Deconnexion" /></a> </div>
                <?php }?>
            </fieldset>

        </div>
        <div class="clearfix"></div>
    </form>
</div>