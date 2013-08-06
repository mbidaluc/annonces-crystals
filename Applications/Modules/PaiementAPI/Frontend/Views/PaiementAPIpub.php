<?php if(!empty($infos)) : ?>
    <div class="infos"><img alt="ok" src="/images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div>
    <img alt="Logo" src="<?php echo _UPLOAD_DIR_.'PaiementMod/'.$logo;?>" width="100"/>
</div>
<div >
    <?php echo $dataForm; ?>
</div>