<div id="connexion">
    <h2>Connexion</h2>
    <form action="forgetpwd.html" method="post">
        <div class="infos"><?php echo $user->getFlash(); ?></div>
        <div>
            <fieldset>
                <label>Saisissez votre adresse email:</label>
                <input type="text" name="email" />                 
            </fieldset>
            <input type="submit" value="OK" /> 
        </div>
      <?php /*if(isset($dataForm)){
                    foreach ($dataForm as $item) {
                        echo '<div> Voici vos informations </div>';
                        echo '<div>Login: '.$item->getPseudo().'</div>';
                        echo '<div>Mot de passe: '.$item->getPassword().'</div>';
                    }
              }*/
        ?>
    </form>
</div>