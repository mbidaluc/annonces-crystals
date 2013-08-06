<?php if(!empty($errors)): ?>
    <div class="error"><img alt="error" src="/backend_images/error2.png" /> <?php echo $errors; ?></div>
<?php endif; ?>
<div id="texte-newsletter"><?php echo (isset($infosPage)?$infosPage->getContenu():'') ;?></div>
<form method="post">
    <div id="CategorieList">
        <select name="idCategorie[]" id="idCategorie">
            <option value="0">Selectionner une catégorie </option>
            <?php  foreach($datalist as $data):  
                    $decalage = '';
                    $decalage = str_pad($decalage, $data->getLength(), '>');
                    //$decalage = str_replace('>', '&nbsp;&nbsp;&nbsp;', $decalage)
            ?>
            <option value="<?php echo $data->getIdFils() ?>" ><?php echo $decalage.$data->getLibelle() ?></option>
        <?php endforeach;?>
        </select>
    </div>
    <div id="subcategoriezone" class="clearfix">
        
    </div>
    <div id="registerInfos">
        <ul>
            <li class="phone">
                <p><!--label>Téléphone</label-->
                    <input  class="phone1" type="text" name="phone" value="Votre numéro de téléphone"/>
                </p>
            </li>
            <li class="email">
                <p>
                    <input class="email1" type="text" name="email_member" value="Entrez votre adresse email"/>
                </p>
            </li>
            <li class="send">
                <div class="wrap_button">
                    <span class="bg_left_bouton">
                        <span class="bg_right_button">
                            <input class="send" type="submit" value="Inscription" />
                        </span>
                   </span>
                </div>
           </li>
        </ul>
    </div>
</form>