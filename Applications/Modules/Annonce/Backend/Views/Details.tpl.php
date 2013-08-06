<form method="post" id="postform">
    <div id="catégorie"><label>Catégorie: <?php echo $categorie[0]->getLibelle(); ?></label> </div>
    <div id="images">
<?php foreach ($lesPhotos as $value) { ?>
        <img alt="Image" src="<?php echo _UPLOAD_DIR_.'Annonce/'.$value->getUrl();  ?>" width="100"/>
<?php } ?>
    </div>
    <div id="details"><label>Détails: </label>
        <p><?php echo $annonce->getTexte(); ?></p>
            <p>Prix: <?php echo $annonce->getPrixTotal();?> FCFA</p>
            <p>Publier le: <?php echo $annonce->getDateDebut(); ?></p>
            <p>Expire le : <?php echo $annonce->getDateexp(); ?> </p>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <?php if(!$annonce->getIs_actived()){?>
    <input type="button" value="activer" onclick="validateOrder(<?php echo $infocmd->montant; ?>)"/> 
    <?php }else{?>
    <input type="submit" value="desactiver" name="desactive" />
    <?php }?>
    <a href="#validatepaiement" id="fancy_auto"></a>
</form>

<?php 
if($infocmd->montant > 0){ ?>
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