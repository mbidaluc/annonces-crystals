<script>
var prixpleintemps = 0;
</script>
<div class="table">
    <?php echo $dataForm  ?>
    <p id="conditionss">
        	
			<input type="checkbox" id="cga" required="required"/>
            J'accepte les <a href="#modalCGA" id="a_cga"> conditions générales d'annonce </a>
     </p>
     <p>
        <span class="left-bouton">
            <span class="right-bouton">
                <input type="submit" class="envoyer" value="Suivant"/>
            </span>
        </span>                
     </p>
            
        <div id="modalHour"></div>
        <div id="infos" style="display: none;"></div>
        
    </form>
    <div id="modalCGA" style="display: none;">
        <div style="<?php if (isset($popupcga)) echo $popupcga ;?>">
            <?php echo $cgapage->getContenu(); ?>
        </div>
    </div>
    <div id="zonePrix">Prix Total
        <input type="hidden" name="prixT" id="prixT"  value=""/>
    </div>
</div>