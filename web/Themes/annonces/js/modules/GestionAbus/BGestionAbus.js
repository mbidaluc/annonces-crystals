( function($) { 
    $(document).ready(function(){
        $("#id_id").change( function(){ 
            idsel = $(this).val();
            if(parseInt(idsel)){
                $.post("./listabus.html",
                        {id:idsel},
                        function(data){
                            //alert(data);
                            $( "#tabListing" ).html(data);
                        }					
                );
            }
            
        }).trigger('change');
        
        $("#id_idFils").change( function(){ 
            idsel = $(this).val();
            if(parseInt(idsel)){
                $.post("./listannonce.html",
                            {idCategorie:idsel},
                            function(data){
                                var donnees = data.split('**');
                                $("#id_id").get(0).length = 0;
                                for(var i=0; i< donnees.length; i++){
                                    $("#id_id").append(donnees[i]);
                                }
                            }					
                    );
            }
        }).trigger('change');
    });
})( jQuery )