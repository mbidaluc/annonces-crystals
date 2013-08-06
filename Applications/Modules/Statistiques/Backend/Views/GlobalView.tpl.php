<script>
    //tableaux des commandes
    var tabweekcredits  = new Array();
    var tabweekpub      = new Array();
    var tabweekannonces = new Array();
    
    var tabdaysweek     = new Array();

</script>

<div class="statblock">
    <h3>Visites</h3>
    <table>
        <tr>
            <td>Visites du jour</td>
            <td><?php echo $dayVisitors; ?></td>
        </tr>
        <tr>
            <td>Visites de la semaine</td>
            <td><?php echo $weekVisitor; ?></td>
        </tr>
        <tr>
            <td>Total des Visites</td>
            <td><?php echo $allVisitors; ?></td>
        </tr>
    </table>
</div>
<div class="statblock">
    <h3>Annonces</h3>
    <table>
        <tr>
            <td colspan="2">Pour la semmaine</td> 
        </tr>
        <tr>
            <td>Annonces classiques Ajoutées</td>
            <td><?php echo $ttannoncesclsofweek; ?></td>
        </tr>
        <tr>
            <td>Annonces publicitaires Ajoutées</td>
            <td><?php echo $ttannoncespubofweek; ?></td>
        </tr>
        <tr>
            <td colspan="2"> Les plus vues</td>
        </tr>
        
        <tr>
            <td rowspan="3">Annonces Classiques</td>
            <td><?php echo ((count($mostpopularannocescls)&& isset($mostpopularannocescls[0]))?$mostpopularannocescls[0]->getId().', '.$mostpopularannocescls[0]->getDesignation().' ('.$mostpopularannocescls[0]->getNbClick().' clicks)':' '); ?></td>
        </tr>
        <tr>
            <td><?php echo ((count($mostpopularannocescls)&& isset($mostpopularannocescls[1]))?$mostpopularannocescls[1]->getId().', '.$mostpopularannocescls[1]->getDesignation().' ('.$mostpopularannocescls[1]->getNbClick().' clicks)':' Aucune'); ?></td>
        </tr>
        <tr>
            <td><?php echo ((count($mostpopularannocescls)&& isset($mostpopularannocescls[2]))?$mostpopularannocescls[2]->getId().', '.$mostpopularannocescls[2]->getDesignation().' ('.$mostpopularannocescls[2]->getNbClick().' clicks)':' '); ?></td>
        </tr>
        
        <tr>
            <td rowspan="3">Banières Publicitaires</td>
            <td><?php echo ((count($mostpopularannocespub)&& isset($mostpopularannocespub[0]))?$mostpopularannocespub[0]->getId().', '.$mostpopularannocespub[0]->getAltText().' ('.$mostpopularannocespub[0]->getNbClick().' clicks)':' '); ?></td>
        </tr>
        <tr>
            <td><?php echo ((count($mostpopularannocespub)&& isset($mostpopularannocespub[1]))?$mostpopularannocespub[1]->getId().', '.$mostpopularannocespub[1]->getAltText().' ('.$mostpopularannocespub[1]->getNbClick().' clicks)':'Aucune '); ?></td>
        </tr>
        <tr>
            <td><?php echo ((count($mostpopularannocespub)&& isset($mostpopularannocespub[2]))?$mostpopularannocespub[2]->getId().', '.$mostpopularannocespub[2]->getAltText().' ('.$mostpopularannocespub[2]->getNbClick().' clicks)':' '); ?></td>
        </tr>
        
    </table>
</div>
<div class="statblock">
    <h3>Catégories populaires</h3>
    <table>
        <?php 
            foreach ($mostpopularcat as $value) {       
        ?>
        <tr>
            <td><?php echo $value->libelle; ?></td>
            <td><?php echo $value->nbannonce.' Annonces'; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div class="commandes">
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Commandes de la semaine</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart1"></div>
        </div>
    </div>
</div>
<button class="button-reset">Annuler le zoom</button>
<?php 
foreach ($ttannonces as $key => $value) {
?>
    <script>
       tabweekcredits.push(<?php echo $ttcdts[$key]['ttcmd']; ?>);
       tabweekpub.push(<?php echo $ttpub[$key]['ttcmd']; ?>);
       tabweekannonces.push(<?php echo $ttannonces[$key]['ttcmd']; ?>);
      
       tabdaysweek.push("<?php echo $key; ?>");   
    </script>

<?php 
   
}?>
    