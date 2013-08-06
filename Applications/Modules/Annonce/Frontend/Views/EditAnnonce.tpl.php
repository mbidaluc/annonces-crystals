<script >
    var id_photoCurent = 0;
    var id_imageCurent = 0;
</script>
<?php if(!empty($infos)) : ?>
    <div class="infos"><img alt="ok" src="/images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div class="create_annonce clearfix">
    <?php echo $dataForm; ?>
    <input type="Hidden" name="id" id="id_id" value="<?php echo $id; ?>" />
    <input id="fileimgupdate" type="file" style="visibility: collapse;" name="Imagefiles"/>
    <!--<div id="modalForm">
    <form method="post">-->
        <div class="block_image">
            <div class="top_photos">
                <div class="bottom_photos">
                    <div class="rpt_photos">
                        <ul id="tabsimageupdate" class="clearfix gallery">
                            <?php foreach ($lesPhotos as $key => $value) { ?>
                                <!--<li id="img<?php echo $key; ?>"><img  alt="image" src="<?php echo _UPLOAD_DIR_.'Annonces/'.$value->getUrl();  ?>" width="100"/></li>-->
                            <li class="ui-widget-content ui-corner-tr" style="display: list-item; width: 48px;">
                                    <img alt="image" id="image<?php echo $key.'_'.$value->getId(); ?>" src="<?php echo _UPLOAD_DIR_.'Annonce/'.$value->getUrl();  ?>" width="100" title="<?php echo $value->getUrl(); ?>" width="96" height="72" style="display: inline-block; height: 36px;"/>
                                    <a id="<?php echo $key.'_'.$value->getId(); ?>" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>                
                </div>            
            </div>
        </div>
        <!--<input type="Hidden" name="idAnnonce" value="<?php echo $id; ?>" />
    </form>
</div>-->
    <fieldset class="text_area">
        <p><label for="id_texte">Texte d'annonce :</label></p>
        <p>
			<textarea name="texte" id="id_texte" cols="68" rows="10" ><?php echo $data->getTexte(); ?></textarea>
		</p>
    </fieldset>
     <p class="center">
        <input type="submit" value="Modifier" name="submit" id="btnModify">
	</p>
</form>
</div>