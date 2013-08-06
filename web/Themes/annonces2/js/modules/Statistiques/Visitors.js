/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
( function($) { 
    $(document).ready(function(){
        //alert(tabDayVisitor.length);
    var taille = tabDayVisitor.length;
   
    var tabofday = new Array();
    var tabofprevday = new Array();
   
    tabofday[0]= [0,0];
    tabofprevday[0]= [0,0];
    for(j = 0; j<=taille; j++){
        kr = j+1;
        tabofday[kr] = [kr, tabDayVisitor[j]];
        tabofprevday[kr] = [kr, tabPreviousDayVisitor[j]];
    }
   
    $.jqplot._noToImageButton = true;
    
    var plot1 = $.jqplot("chart1", [tabofprevday, tabofday], {
        seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)"],
        title: 'Visiteurs',
        axes:{
            yaxis:{min:0},
            xaxis:{
                min:0,
                max:24,
                tickOptions: {
                    formatString: "%dH",
                    showMark: true
                },
                tickInterval: 1
            }
        },
        highlighter: {
                    show: true,
                    sizeAdjust: 1,
                    tooltipOffset: 9
                },
        /*grid: {
            background: 'rgba(57,57,57,0.0)',
            drawBorder: false,
            shadow: false,
            gridLineColor: '#666666',
            gridLineWidth: 2
        },*/
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
                        label: 'Hier'
                    },
                    {
                        label: 'Aujourd\'hui'
                    }
                ],
        
    });
 
      $('.jqplot-highlighter-tooltip').addClass('ui-corner-all');    
    });    
})( jQuery )
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


