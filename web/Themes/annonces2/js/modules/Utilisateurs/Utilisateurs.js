/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
		//efface le champ email
        $("#email").focus(function(){
			if($("#email").val()== "Adresse e-mail"){
				$("#email").val("");
			}
		});
		$("#email").blur(function(){
			if($("#email").val()== ""){
				$("#email").val("Adresse e-mail");
			}
		});
		
		//efface le champ pseudo
        $("#pseudo").focus(function(){
			if($("#pseudo").val()== "pseudo"){
				$("#pseudo").val("");
			}
		});
		$("#pseudo").blur(function(){
			if($("#pseudo").val()== ""){
				$("#pseudo").val("pseudo");
			}
		});
		
		//efface le champ mot de passe
        $("#password").focus(function(){
			if($("#password").val()== "Mot de passe"){
				$("#password").val("");
			}
		});
		$("#password").blur(function(){
			if($("#password").val()== ""){
				$("#password").val("Mot de passe");
			}
		});
		
        $("#bouton").click( function(){
            email =$('#email').val();
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             if(!regex.test(email)){
				 alert("email non valide");
				 return false;
			 }
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
        });
    });
})( jQuery )


