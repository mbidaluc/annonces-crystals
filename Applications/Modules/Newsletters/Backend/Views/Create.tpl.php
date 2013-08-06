<div class="top-bar">
    <!--<a href="#" class="button">ADD NEW</a>-->
    <h1>Gestion de la newsletter</h1>
    <div class="breadcrumbs"><a href="newsletter.html">Newsletter</a> / Enregistrer</div>
</div><br />
<div class="select-bar"></div>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div class="table">
   <h2>Envoyer une newsletter</h2>
    <?php echo $dataForm  ?>
    <div class="select">
        <strong><?php if( isset($var) ) echo $var; ?></strong>
    </div>
</div>
