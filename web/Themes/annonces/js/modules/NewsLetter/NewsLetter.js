/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
        //alert("bonjour");
        $("#idCategorie").change( function(){
           
            valeur =   $("#idCategorie option:selected").val();
            $.post("./newsletterssub.html",
                {idCad:valeur},
                function(data){
                    $( "#subcategoriezone" ).html(data);
                }					
            );         
        }).trigger('change');     
    });  
    
 //efface le texte dans le champ input 		
		$(".phone1").click(function(){
			if($(".phone1").val() === "Votre numéro de téléphone"){
				$(".phone1").val("");
			}
		});
		$(".phone1").blur(function(){
			if($(".phone1").val()=== ""){
				$(".phone1").val("Votre numéro de téléphone");
			}
		});
        
 //efface le champ email
        $(".email1").focus(function(){
			if($(".email1").val()== "Entrez votre adresse email"){
				$(".email1").val("");
			}
		});
		$(".email1").blur(function(){
			if($(".email1").val()== ""){
				$(".email1").val("Entrez votre adresse email");
			}
		});
})( jQuery )

function examine(objet){
    document.getElementById(objet.value).checked = objet.checked;
};


