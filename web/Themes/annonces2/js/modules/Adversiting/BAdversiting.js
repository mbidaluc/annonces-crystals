/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
        $('#getvalidate').click(function(){
             $.ajax({
                url: "./validateannoncepub.html",
                type: "POST",
                data: $("#formcontrole").serialize(),
                success: function(data) {
                    if(data == "ok"){
                        $("#formadv").submit();
                    }else{
                        alert(data);
                        return false;
                    }
                },
                error: function(data){
                    alert(data);
                }
            });
         });
        $( "#modalHour" ).dialog({
                autoOpen: false,
                height: 500,
                width: 700,
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
             
         $("#id_dureeAnnonce").change( function(){ 
		 	var val = $("#id_dureeAnnonce option:selected").val();
			if(val == "autres")
				$("#id_orther").parent().show();
			else
				$("#id_orther").parent().hide();
            //calculateprice();  
			
         }).trigger('change');
         
         $("#id_diffusion").change( function(){
                valeur =   $("#id_diffusion option:selected").val();
                if(valeur === "periodique"){
                    $( "#modalHour" ).dialog("open");
                }else{
                    calculateprice();
                }
            
         }).trigger('change');
         
         $("#id_dateBegin").datepicker({
                dateFormat: "yy-mm-dd",
                showAnim: "fold"
         });
         
         $("#id_idPosition").change( function(){  
                                        initializeModal()
                                         
         }).trigger('change');
         
          $("#id_idPage").change( function(){   
                                    initializeModal()
                                          
         }).trigger('change');
         
          $("#id_dateBegin").change( function(){
                initializeModal();
                if($(this).val() != ""){
                    $("#id_idPosition").removeAttr("disabled");
                    $("#id_idPage").removeAttr("disabled");
                    $("#id_diffusion").removeAttr("disabled");
                }else{
                    $("#id_idPosition").attr("disabled", "disabled");
                    $("#id_diffusion").attr("disabled", "disabled");
                }
                                        
          }).trigger('change');
         
    });
    
    function calculateprice(){
       var chpscache = "";
        $("input[class=tranchesCheck]:[checked]").each(function(){
            
            txt = $(this).attr("id");
            tab = txt.split('-');
            chpscache += '<input type="hidden" name="idTranche[]"  value="'+tab[0]+'" />"';
                          
        });
        $("#infoszon").html(chpscache);
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
function validateOrder(montant){
    if($("#id_active_2").attr('checked')){
        if(parseInt(montant)){
             $("#fancy_auto").fancybox({
                fitToView	: true,
                autoSize	: true,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none',
                title:'Validation'
        }).trigger("click");
        }else{
            $("#formadv").submit();
            //return true;
        }
    }else{
        $("#formadv").submit();
    }
}
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


