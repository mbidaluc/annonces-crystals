/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
( function($) { 
    $(document).ready(function(){
   
    var taille = tabdaysweek.length;
   
    var tabofpub    = new Array();
    var tabofann = new Array();
    var tabofcredits = new Array();
    var j = 0;
    var day = "";
    var daybegin =tabdaysweek[0]+"";
    var dayend =tabdaysweek[6]+"";
    var val=0;
   
    
    for(j = 0; j<taille; j++){
        day = tabdaysweek[j]+"";
        val = parseInt(tabweekpub[j]);
        tabofpub[j]     = [day,val];
        
        val = parseInt(tabweekannonces[j]);
        tabofann[j]     = [day,val];
        
        val = parseInt(tabweekcredits[j]);
        tabofcredits[j] = [day,val];
        
    }
   
    $.jqplot._noToImageButton = true;
   
   //tableau 1
    var plot1 = $.jqplot("chart1", [tabofcredits, tabofann, tabofpub], {
        seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)", "rgb(231, 39, 7)"],
        title: 'Commandes de la semaine',
        highlighter: {
            show: true,
            sizeAdjust: 1,
            tooltipOffset: 9
        },
        
        legend: {
            show: true,
            placement: 'outside'
        },
        seriesDefaults: {
            rendererOptions: {
                smooth: true,
                animation: {
                    show: true
                }
            },
            showMarker: true
        },
        series: [
            {
                fill: true,
                label: 'crédit'
            },
            {
                label: 'annonces classiques'
            },
            {
                label: 'annonces publicitaires'
            }
        ],
        axesDefaults: {
            rendererOptions: {
                baselineWidth: 1.5,
                baselineColor: '#444444',
                drawBaseline: false
            }
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.DateAxisRenderer,
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                tickOptions: {
                    formatString: "%b %e",
                   
                    textColor: '#dddddd'
                },
               min: daybegin,
               max: dayend,
               tickInterval: "1 days",
               drawMajorGridlines: false
            },
            yaxis: {
                min: 0,
                tickOptions: {
                    formatString: "%d FCFA",
                    showMark: false
                }
            }
        },
        cursor: {
            show: true,
            tooltipLocation:'sw',
            zoom:true,
            showTooltip:false
          }
    });
    

        $('.jqplot-highlighter-tooltip').addClass('ui-corner-all');
        $('.button-reset').click(function() { plot1.resetZoom() });
    });    
})( jQuery )
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


