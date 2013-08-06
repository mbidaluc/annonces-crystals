;(function($){
    $.fn.encheres = function(){
        
    };
})(jQuery);

( function($) { 
    $(document).ready(function(){
        $('.encherir-elt').unbind('load').click(function(){
            var idelt = this.id;
            idelt = idelt.split('-');
            iduser =idelt.pop();
            nbre_credits = $('#nber_cdt').html();
            nbre_credits = Number(nbre_credits);
            if(iduser==0 || nbre_credits==0){
                alert("Vous n'êtes pas identifié ou vous n'avez plus  de crédit pour encherir");
                return false;
            }else{
                idpro =idelt.pop();
                $.ajax({
                    type: "POST", 
                    url: "traitemntajax.html",
                    data: "iduser="+iduser+"&idprod="+idpro+"&cred="+nbre_credits,
                    cache: false,
                    onComplete:  function(response){ 
                        if( response != ' ' ) alert(response);
                    },

                    onFailure: function(xhr){
                        alert("Erreur lors du placement de l'ench&egrave;re");
                    }
                })
            }
            return false;
        });
    });
} ) ( jQuery )

