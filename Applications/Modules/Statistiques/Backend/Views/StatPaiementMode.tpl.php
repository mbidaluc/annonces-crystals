<script>
    var tabnamemode    = new Array();
    var tabmodenb      = new Array();
    var tabmodepercent = new Array();

</script>
<div class="visitor">
    
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Quota Modes de paiement</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart1"></div>
        </div>
    </div>
</div>
<?php 
foreach ($tabmode as $key => $value) {
   
?>
    <script>
       tabnamemode.push("<?php echo $value['name']; ?>");
       tabmodenb.push(<?php echo $value['nb']; ?>);
       tabmodepercent.push(<?php echo $value['percent']; ?>);
       
    </script>

<?php 
   
}?>
    