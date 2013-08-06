<div class="top-bar">
    <!--<a href="#" class="button">ADD NEW</a>-->
    <h1>Gestion des Utilisateurs</h1>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($infos)): ?>

    <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div class="table">
    <?php echo $dataForm  ?>
    <div id="grpeUser">
        <fieldset>
            <legend>Groupe utilisateur</legend>
            <?php foreach ($groupeutilisateur as $ug):?>
            <p><input type="checkbox" <?php echo (isset($usergroup[$ug->id]))?'checked="checked"':' '; ?> value="<?php echo $ug->id;?>" name="groupe[]" /><?php echo $ug->nom_groupe;?> </p>
            <?php endforeach; ?>
        </fieldset>
    </div>
    <p><input type="submit" value="Enregistrer" /></p>
    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
    
    </form>
</div>
