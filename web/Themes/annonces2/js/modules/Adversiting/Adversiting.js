/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
         $( "#a_cga" ).fancybox({
                maxWidth	: 800,
                maxHeight	: 600,
                fitToView	: false,
                width		: '70%',
                height		: '70%',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none',
                title:'Conditions Générales d\'Annonce'
            });
         $("#id_idPosition").attr("disabled", "disabled");
         $("#id_idPage").attr("disabled", "disabled");
         $("#id_diffusion").attr("disabled", "disabled");
        
         $("#id_dureeAnnonce").change( function(){ 
		 	var val = $("#id_dureeAnnonce option:selected").val();
			if(val == "autres"){
                calculateprice();
				$("#id_orther").parent().show();
            }
			else{
                calculateprice();
				$("#id_orther").parent().hide();
                  
            }
			
         }).trigger('change');
         
         $("#id_orther").blur(function(e){
             calculateprice();
         });
        
         $( "#modalHour" ).dialog({
                                autoOpen: false,
                                height: 400,
                                width: 500,
                                show: "slide",
                                hide: "blind",
                                resizable: true,
                                modal: true,
                                buttons: {
                                    "OK": function(){
                                        calculateprice();
                                        $( this ).dialog( "close" );
                                    }
                                },
                                close: function() {
                                	calculateprice();
                                }
         });
                
         $("#id_diffusion").change( function(){
                                        valeur =   $("#id_diffusion option:selected").val();
                                        if(valeur === "periodique"){
                                            $( "#modalHour" ).dialog("open");
                                        }else{
											calculateprice();
										}
            
         }).trigger('change');
     
         $("#id_typeFacturation").change( function(){         
            var value =  $("#id_typeFacturation option:selected").val();
            if(value === "click")
                $("#zonePrix").attr("hidden", "hidden");
            else
                 $("#zonePrix").removeAttr("hidden");
         }).trigger('change');
         
         $("#id_type").change( function(){
            valeur =   $("#id_type option:selected").val();
            if(valeur === 'annonce'){
                document.location.replace('./createannoncefront.html');
            }
        }).trigger('change');
       
         $("#id_dateBegin").datepicker({
                                dateFormat: "yy-mm-dd",
                                showAnim: "fold"
         });
         
         $("#id_idPosition").change( function(){  
                                        initializeModal()
                                        calculateprice();       
         }).trigger('change');
         
          $("#id_idPage").change( function(){   
                                    initializeModal()
                                    calculateprice();       
         }).trigger('change');
         
          $("#id_dateBegin").change( function(){
                                        initializeModal();
                                        calculateprice();
                                        if($(this).val() != ""){
                                            $("#id_idPosition").removeAttr("disabled");
                                            $("#id_idPage").removeAttr("disabled");
                                            $("#id_diffusion").removeAttr("disabled");
                                        }else{
                                            $("#id_idPosition").attr("disabled", "disabled");
                                        }
                                        
          }).trigger('change');
         
    });
    
    function calculateprice(){
        var ValeurPosition =   $("#id_idPosition option:selected").val();
        var infosPos = ValeurPosition.split('*');
        var prixPositon = parseInt(infosPos[1]);

        var ValeurPage =   $("#id_idPage option:selected").val();
        var infosPage = ValeurPage.split('*');
        var prixPage = parseInt(infosPage[1]);
       
       var prix = 0;
       var chpscache = "";
        $("input[class=tranchesCheck]:[checked]").each(function(){
            
            txt = $(this).attr("id");
            tab = txt.split('-');
            prix += parseInt(tab[1]);
            chpscache += '<input type="hidden" name="idTranche[]"  value="'+tab[0]+'" />"';
                          
        });
        $("#infos").html(chpscache);
        var $valo = $("#id_dureeAnnonce option:selected").val();
        
        if($valo == "autres")
             prix = parseInt($("#id_orther").val())*(prix + prixPositon + prixPage);
        else
            prix = parseInt($valo)*(prix + prixPositon + prixPage);
        $("#prixT").val(prix);
        $("#zonePrix").html("Prix Total: "+prix+" FCFA");
		prixpleintemps = prix;
		diffusion =   $("#id_diffusion option:selected").val();
		if(diffusion === "plein temps"){
			$.post("./pleintemps.html",
                    {idPage:infosPage[0], idPosition:infosPos[0]},
                    function(data){
                       //$("#zonePrix").html(data);
                        if($.trim(data)!=""){
                            var total = prixpleintemps + parseInt(data); 
                            $("#zonePrix").html("Prix Total: "+total+" FCFA");
                        }else{
                            $("#zonePrix").html("Plages non disponibles pour cette position et cette page");
                        }
                    }					
            );
		}
        
    };
    
    function initializeModal(){
            ladate = $("#id_dateBegin").val();
            ValeurPosition =   $("#id_idPosition option:selected").val();
        
            infos = ValeurPosition.split('*');
            positon = parseInt(infos[0]);

            ValeurPage =   $("#id_idPage option:selected").val();
            infoss = ValeurPage.split('*');
            page = parseInt(infoss[0]);
            
            $.post("./trancheshoraires.html",
                    {dateBegin:ladate, idPage:page, idPosition:positon},
                    function(data){
                        $( "#modalHour" ).html(data);
                    }					
            );
    }
    
    
})( jQuery )
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


