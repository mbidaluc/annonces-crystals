
<?php if(!empty($infos)): ?>

    <div class="infos"><img alt="ok" src="/backend_images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div class="table">
    <p class="directive">Veuillez remplir les champs ci-dessous...</p>
    <?php echo $dataForm  ?>
    <p class="rapel">Les champs marqués d’une asteris (<span>*</span>) sont obligatoires</p>
    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</form>
</div>
