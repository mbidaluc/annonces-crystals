<script >
    
    var posnextimage = 1;
    var curentpos = 0;
    var prixUniteAnnonce = 0;
    var tabPrice = new Array();
    tabPrice[0]  = 0;
    var lesdata  = "";
        
    function initializePrice(img1, img2, img3, img4, img5, img6, img7, img8, img9, priceUniteAnnonce){
        //lesdata = data;
        tabPrice[1] = img1;
        tabPrice[2] = img2;
        tabPrice[3] = img3;
        tabPrice[4] = img4;
        tabPrice[5] = img5;
        tabPrice[6] = img6;
        tabPrice[7] = img7;
        tabPrice[8] = img8;
        tabPrice[9] = img9;
        prixUniteAnnonce = priceUniteAnnonce;
        
    }
</script>

<?php if(!empty($infos)) : ?>
    <div class="infos"><img alt="ok" src="/images/ok2.png" /> <?php echo $infos; ?></div>
<?php endif; ?>
<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div class="create_annonce clearfix">
    <?php echo $dataForm;
           
    ?>
    <div class="block_image">
        <div id="spacePrice">000 FCFA</div>
        <div class="top_photos">
            <div class="bottom_photos">
                <div class="rpt_photos">
                    <div id="tabsimages_text">
                        <span class="photos">Mes photos</span>
                        <img class="photos" src="<?php echo _THEME_IMG_DIR_?>capture_img.png" alt="Mes photos"/>
                        <span>1 photo = 5 fois plus de contacts en moyenne</span>
                        <span class="left_add add_img"><span class="right_add add_img"><input type="button" value="Ajouter une photo" id="Btnimage"/></span></span>
                        <div class="displayNone"><input id="fileimg" type="file" style="visibility: collapse;" name="files"/></div>
                    </div>
                    <ul id="tabsimages" class="clearfix">
                        <li id="img1"><span>1</span></li>
                        <li id="img2"><span>2</span></li>
                        <li id="img3" class="last_line"><span>3</span></li>
                        <li id="img4"><span>4</span></li>
                        <li id="img5"><span>5</span></li>
                        <li id="img6" class="last_line"><span>6</span></li>
                        <li id="img7"><span>7</span></li>
                        <li id="img8"><span>8</span></li>
                        <li id="img9" class="last_line"><span>9</span></li>
                    </ul>
                </div>                
            </div>            
        </div>
    </div>
    <fieldset class="text_area">
        <p><label for="id_texte">Texte d'annonce :</label></p>
        <p>
			<textarea name="texte" id="id_texte" cols="68" rows="10" ></textarea>
		</p>
    </fieldset>
    <p class="center">
        <input type="submit" value="Publier" name="submit" id="btnsubmit">
	</p>
        <input type="text" name="prixT" id="prixT" style="visibility:collapse;" value=""/>
        
        <div id="imagescache">
            
            
        </div>
</form>
</div>
        <?php $infor = $dataConfig[0]->tabAttrib;

        ?>
    <script>
        initializePrice('<?php echo $infor['cout1image']; ?>','<?php echo $infor['cout2image']; ?>', '<?php echo $infor['cout3image']; ?>', '<?php echo $infor['cout4image']; ?>', '<?php echo $infor['cout5image']; ?>', '<?php echo $infor['cout6image']; ?>', '<?php echo $infor['cout7image']; ?>', '<?php echo $infor['cout8image']; ?>', '<?php echo $infor['cout9image']; ?>', '<?php echo $dataConfig[0]->getPrixUniteAnnonce(); ?>');
    </script>