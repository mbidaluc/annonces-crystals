<div class="top-bar">
    <!--<a href="#" class="button">ADD NEW</a>-->
    <h1>Gestion des Groupes Utilisateurs</h1>
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
    
    <div id="privileges">
        <fieldset>
            <legend>privilgèges</legend>
            <?php foreach ($privileges as $priv):?>
            <p><input type="checkbox" <?php echo (isset($privilegegroup[$priv->id]))?'checked="checked"':' '; ?> value="<?php echo $priv->id;?>" name="priv[]" /><?php echo $priv->libelle;?> </p>
            <?php endforeach; ?>
        </fieldset>
    </div>
    <p><input type="submit" value="Enregistrer" /></p>
    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</form>
</div>
