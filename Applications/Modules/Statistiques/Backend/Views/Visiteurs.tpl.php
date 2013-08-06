<script>
    var tabDayVisitor = new Array();
    var tabPreviousDayVisitor= new Array();

</script>
<div class="visitor">
    <p>Totals des visiteurs: <?php echo $allVisitors; ?></p>
    <p>Visiteurs de la semaine: <?php echo $weekVisitor; ?></p>
    <p>Visiteurs du jour: <?php echo $dayVisitors; ?></p>
    
    <div class="ui-widget ui-corner-all">
        <div class="ui-widget-header ui-corner-top">Visiteurs</div>
        <div class="ui-widget-content ui-corner-bottom" >
            <div id="chart1"></div>
        </div>
    </div>
</div>
<?php 
foreach ($statofday as $key => $value) {
?>
    <script>
       tabDayVisitor.push(<?php echo $statofday[$key]; ?>);
       tabPreviousDayVisitor.push(<?php echo $statofpreviousday[$key]; ?>);
    </script>

<?php 
   
}?>
    