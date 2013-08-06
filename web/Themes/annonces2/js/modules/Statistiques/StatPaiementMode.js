( function($) { 
    $(document).ready(function(){
        
        var taille = tabnamemode.length;
        var tableau   = new Array();
        var name = "";
        var val=0;
        var j = 0;
        for(j = 0; j<taille; j++){
            name = tabnamemode[j]+"";
            val  = parseInt(tabmodepercent[j]);
            tableau[j] = [name,val]
        }
        
        
      plot2 = jQuery.jqplot('chart1',[tableau],
        {
          title: ' ',
          seriesDefaults: {
            shadow: false,
            renderer: jQuery.jqplot.PieRenderer,
            rendererOptions: {
              startAngle: 180,
              sliceMargin: 4,
              showDataLabels: true }
          },
          legend: { show:true, location: 'w' }
        }
      );
    });
})( jQuery )

