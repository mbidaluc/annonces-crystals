<div id="connexion">
    <h2>Connexion à l'interface d'administration</h2>
    <form action="log-in.html" method="post">
        <div ><?php echo $user->getFlash(); ?></div>
        <div>
            <div id="lock"></div>
            <div id="section-box">
                <fieldset>
                <div>
                    <label>Identifiant:</label>
                    <input type="text" name="login" />
                </div>
                <div>
                    <label>Mot de passe: </label>
                    <input type="password" name="password" />
                </div>
                <div><input type="submit" value="Connexion" /></div>
            </fieldset>
            </div>
            <div id="clear"></div>
        </div>
    </form>
</div>