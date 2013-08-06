/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
          $("#bouton").click( function(event){
		
                email =$('#email').val();
                //alert(email);
                $.ajax({
                    type: "POST", 
                    url: "./connexion.html",
                    data: "email="+email,
                    cache: false,
                    success:  function(response){
                        //alert(response);
                        if(response == "add-user-front.html"){
                            $('#form').attr("action", "add-user-front.html");
                            $('#form').submit();
                        }else{
                            $('.infos').html(response);
                            $('.infos').show();
                            $.scrollTo( $('.infos'), 1000 );
                            setTimeout("$('.infos').hide('fast')",3000);
                        }
                        
                    },

                    onFailure: function(xhr){
                        alert("Erreur de l'envoi des données");
                    }
                })
	})
    }
    )})( jQuery )


