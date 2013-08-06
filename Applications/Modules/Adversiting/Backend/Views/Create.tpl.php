<script>
var prixpleintemps = 0;
</script>
<div class="top-bar">
    <!--<a href="#" class="button">ADD NEW</a>-->
    <h1>Gestion des Bannières Publicitaires</h1>
    <div class="breadcrumbs"><a href="pub.html">Bannières Publicitaires</a> / Ajout</div>
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
     <p>
        <span class="left-bouton">
            <span class="right-bouton">
                <?php 
                    if(!isset($infocmd)){ ?>
                    <input type="submit" class="envoyer" value="Enregistrer"/>
                    <?php }else{ ?>
                <input type="button" class="validate" value="Enregistrer" onclick="validateOrder(<?php echo $infocmd->montant; ?>)"/> 
                    <?php } ?>
                </span>
        </span>                
     </p>
            
     <div id="modalHour"></div>
     <div id="infoszon" style="display: none;"></div>
     <a href="#validatepaiement" id="fancy_auto"></a>
    </form>
    <div id="zonePrix">
        <input type="hidden" name="prixT" id="prixT"  value="0"/>
    </div>
</div>
<?php 
if(isset($infocmd) && $infocmd->montant > 0){ ?>
    <div id="validatepaiement" style="display: none;">
        <form method="post" id="formcontrole">
            <p>
                <label>Mot de passe</label>
                <input type="password" name="pwd" />
            </p>
           <?php if(empty($infocmd->lien)){ ?> 
                <p>
                    <label>Montant</label>
                    <input type="text" name="montant" />
                </p>
                <p>
                    <label>Bordero</label>
                    <input type="text" name="bordero" />
                </p>
           <?php } ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="button" value="vérifier" id="getvalidate" />
        </form>
    </div>
<?php } ?>