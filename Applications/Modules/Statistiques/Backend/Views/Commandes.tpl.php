<script>
    //tableaux des commandes
    var tabweekcredits  = new Array();
    var tabweekpub      = new Array();
    var tabweekannonces = new Array();
    
    //tableaux des chiffres d'affaire 
    var tabcaweekcredits  = new Array();
    var tabcaweekpub      = new Array();
    var tabcaweekannonces = new Array();
    
    //compteurs des commades
    var tabnbweekcredits  = new Array();
    var tabnbweekpub      = new Array();
    var tabnbweekannonces = new Array();
    
    var tabdaysweek     = new Array();

</script>
<button class="button-reset">Annuler le zoom</button>
<div class="commandes">
    
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Commandes de la semaine</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart1"></div>
        </div>
    </div>
    
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Chiffres d'affaire de la semaine</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart2"></div>
        </div>
    </div>
    
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Compteur de commandes</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart3"></div>
        </div>
    </div>
</div>
<?php 
foreach ($ttannonces as $key => $value) {
?>
    <script>
       tabweekcredits.push(<?php echo $ttcdts[$key]['ttcmd']; ?>);
       tabweekpub.push(<?php echo $ttpub[$key]['ttcmd']; ?>);
       tabweekannonces.push(<?php echo $ttannonces[$key]['ttcmd']; ?>);
       
       tabcaweekcredits.push(<?php echo $ttcdts[$key]['ttca']; ?>);
       tabcaweekpub.push(<?php echo $ttpub[$key]['ttca']; ?>);
       tabcaweekannonces.push(<?php echo $ttannonces[$key]['ttca']; ?>);
       
       tabnbweekcredits.push(<?php echo $ttcdts[$key]['ttnbcmd']; ?>);
       tabnbweekpub.push(<?php echo $ttpub[$key]['ttnbcmd']; ?>);
       tabnbweekannonces.push(<?php echo $ttannonces[$key]['ttnbcmd']; ?>);
      
       tabdaysweek.push("<?php echo $key; ?>");   
    </script>

<?php 
   
}?>
    