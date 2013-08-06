( function($) { 
    $(document).ready(function(){
		$(".ui-icon-trash").click( function(){
                id_page = $(this).attr('id');
				$("#img"+id_page).attr('src', '#');
                
                $.post("./deletebgphoto.html",
                    {id:idPhotoDB, idAnnonce:id_annonce, imageAnn:image},
                    function(data){
                        alert(data);
                        if(!parseInt(data)){
                            alert('l\'image à déjà été supprimée!');
                        }
                    }					
            );
                //alert($("#"+id_image).attr('title'));
         });
	});
})( jQuery )