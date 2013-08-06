/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    //efface le champ pseudo
        $("#id_pseudo").focus(function(){
			if($("#id_pseudo").val()== "votre pseudo"){
				$("#id_pseudo").val("");
			}
		});
		$("#id_pseudo").blur(function(){
			if($("#id_pseudo").val()== ""){
				$("#id_pseudo").val("votre pseudo");
			}
		});
 
 //efface le champ email
        $("#id_email").focus(function(){
			if($("#id_email").val()== "votre adresse e-mail"){
				$("#id_email").val("");
			}
		});
		$("#id_email").blur(function(){
			if($("#id_email").val()== ""){
				$("#id_email").val("votre adresse e-mail");
			}
		});
        
  //efface le champ objet
        $("#id_sujet").focus(function(){
			if($("#id_sujet").val()== "sujet"){
				$("#id_sujet").val("");
			}
		});
		$("#id_sujet").blur(function(){
			if($("#id_sujet").val()== ""){
				$("#id_sujet").val("sujet");
			}
		});
    
})( jQuery )
