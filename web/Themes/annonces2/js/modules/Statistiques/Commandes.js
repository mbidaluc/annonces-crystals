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
    
    var tabcaofpub    = new Array();
    var tabcaofann = new Array();
    var tabcaofcredits = new Array();
    
    var tabnbofpub    = new Array();
    var tabnbofann = new Array();
    var tabnbofcredits = new Array();
    
    var j = 0;
    var day = "";
    var daybegin =tabdaysweek[0]+"";
    var dayend =tabdaysweek[6]+"";
    var val=0;
    var valca=0;
    var valnb=0;
    
    for(j = 0; j<taille; j++){
        day = tabdaysweek[j]+"";
        val = parseInt(tabweekpub[j]);
        valca = parseInt(tabcaweekpub[j]);
        valnb = parseInt(tabnbweekpub[j]);
        tabofpub[j]     = [day,val];
        tabcaofpub[j]     = [day,valca];
        tabnbofpub[j]     = [day,valnb];
        
        val = parseInt(tabweekannonces[j]);
        valca = parseInt(tabcaweekannonces[j]);
        valnb = parseInt(tabnbweekannonces[j]);
        tabofann[j]     = [day,val];
        tabcaofann[j]     = [day,valca];
        tabnbofann[j]     = [day,valnb];
        
        val = parseInt(tabweekcredits[j]);
        valca = parseInt(tabcaweekcredits[j]);
        valnb = parseInt(tabnbweekcredits[j]);
        tabofcredits[j] = [day,val];
        tabcaofcredits[j] = [day,valca];
        tabnbofcredits[j] = [day,valnb];
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
    
    //tableau 2
    var plot2 = $.jqplot("chart2", [tabcaofcredits, tabcaofann, tabcaofpub], {
        seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)", "rgb(231, 39, 7)"],
        title: 'Chiffres d\'affaire',
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
    
    //tableau 3
    var plot3 = $.jqplot("chart3", [tabnbofcredits, tabnbofann, tabnbofpub], {
        seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)", "rgb(231, 39, 7)"],
        title: 'Compteur de commandes',
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
                    formatString: "%d cmd",
                    showMark: false
                }
            }
        }/*,
        cursor: {
            show: true,
            tooltipLocation:'sw',
            zoom:true,
            showTooltip:false
          }*/
    });

        $('.jqplot-highlighter-tooltip').addClass('ui-corner-all');
        $('.button-reset').click(function() { plot1.resetZoom() });
    });    
})( jQuery )
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


