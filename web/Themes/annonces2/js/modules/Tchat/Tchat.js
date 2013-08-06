/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
        $("#chattxtarea").keypress(function(e){
             if(e.keyCode == 13){
                sendMessageChat();
             }
         });
         
         $( "#ModalTchat" ).dialog({
                                autoOpen: false,
                                height: 600,
                                width: 600,
                                show: "slide",
                                hide: "blind",
                                resizable: true,
                                modal: true,
                                position: "top",
                                title:"Tchat",
                                close: function() {
                                            disconnectUser();
                                            clearTimeout(decompte);
                                            if(!parseInt(isClientConnected))
                                                clearTimeout(decompteOnline);
                                            else
                                                Pseudonyme = "";  
                                              
                                }
         });
         
         $("#status_user").css({background:"green"});
         
         $("#start_tchat").click(function(){
             //Cas d'une Nouvelle connexion'
             if(Pseudonyme === ""){
                 while(Pseudonyme === "")
                     Pseudonyme = prompt("Votre Pseudonyme svp:", "");  
                 if(Pseudonyme != null && $.trim(Pseudonyme) !=""){
                    registerOnlineUser();
                 }else{
                     Pseudonyme = "";
                 }
             }else{
                $( "#ModalTchat" ).dialog("open"); 
                getListExchangedMessagetoday();
                decompte = setInterval(getListExchangedMessagetoday,3000);
               
                // Concerne l'affichage de L'annonceur'
                if(!parseInt(isClientConnected)){
                    getListOnlineUser();
                    decompteOnline = setInterval(getListOnlineUser,5000);
                }
             }
         });
         
         
         
         $("#Btnsendchat").click(function(){
             if(!parseInt(isClientConnected)){
                 if((curentClientPseudo === "") || (curentClientPseudo === "anonymous")){
                     alert("Veuillez d'abord choir un client");
                     return false;
                }
             }
             sendMessageChat();
         });
         
         $("#disconnectChatUser").click(function(){
             $( "#ModalTchat" ).dialog("close");
         });
         
          $("#onlineStatus").change( function(){
              if(Pseudonyme === "")
                  return false;
              else
                  onlineSatutChanged();
              var id =  $("#onlineStatus option:selected").val();
              var idnum = parseInt(id);
              if(idnum == 1)
                  $("#status_user").css({background:"green"});
              if(idnum == 2)
                  $("#status_user").css({background:"orange"});
              if(idnum == 3)
                  $("#status_user").css({background:"red"});
          }).trigger('change');
          
          $("#emoticones > img").click(function(){
             //var clone = $(this).clone();
             var code = $(this).attr("alt");
             var txt = $("#chattxtarea").val();
             $("#chattxtarea").val(txt+""+code);
             
          });
          
          $("#a_emoticones").simpletooltip();
          
          if(!parseInt(isClientConnected)){
            $("#onlineUser").click( function(){
                curentClientPseudo = $("#onlineUser option:selected").val();
                
            });
          }
    });
    
    function sendMessageChat(){
        idAnnonceur = $("#idAnnonceur").val();
        idUserAnnonceur = $("#idUserAnnonceur").val();
        txt = $("#chattxtarea").val();
        var leClient = ""
        if(parseInt(isClientConnected))
            leClient = Pseudonyme;
        else
            leClient = curentClientPseudo;
       
        $.post("../sendmessagechat.html",
            {messageWriteto:idUserAnnonceur, pseudo:Pseudonyme, message_text:txt, concerningIdAnnonce:idAnnonceur, pseudoClient:leClient, pseudoAnnonceur:"Annonceur"},
            function(data){
                txt = $("#chattxtarea").val("");
            }					
        );
    };
    
    function getListExchangedMessagetoday(){
        idUserAnnonceur = $("#idUserAnnonceur").val();
        if(parseInt(isClientConnected))
            leClient = Pseudonyme;
        else
            leClient = curentClientPseudo;
        $.post("../exchangedmessagesoftoday.html",
            {pseudo:leClient, id:idUserAnnonceur},
            function(data){
                 //alert(data); 
                $("#messageschat").html(data);
            }					
        );
    };
    
    function getListOnlineUser(){
        idUserAnnonceur = $("#idUserAnnonceur").val();
         
        $.post("../onlineuser.html",
            {id:idUserAnnonceur},
            function(data){
                $("#onlineUser").html("<option id=\"anonymous\" value=\"anonymous\">Select a user</option>");
                $("#onlineUser").append(data);
                
                $("#onlineUser option[value="+curentClientPseudo+"]").attr("selected","selected");
            }					
        );
    };
    
    function registerOnlineUser(){
        idUserAnnonceur = $("#idUserAnnonceur").val();
         
        $.post("../registeruser.html",
            {id:idUserAnnonceur, pseudo:Pseudonyme},
            function(data){
                if(!parseInt(data)){ 
                    alert("Le Pseudo "+Pseudonyme+" est déjà utilisé Veuillez recommencer svp:");    
                    Pseudonyme = "";
                }else{
                    $( "#ModalTchat" ).dialog("open"); 
                    getListExchangedMessagetoday();
                    decompte = setInterval(getListExchangedMessagetoday,3000);
                    
                    // Concerne l'affichage de L'annonceur'
                    if(!parseInt(isClientConnected)){
                        getListOnlineUser();
                        decompteOnline = setInterval(getListOnlineUser,5000);
                    }
                } 
            }					
        );         
    };
    
    function onlineSatutChanged(){
        idUserAnnonceur = $("#idUserAnnonceur").val();
        statut = $("#onlineStatus option:selected").val();
        $.post("../updateonlinestatus.html",
            {id:idUserAnnonceur, pseudo:Pseudonyme, status:statut},
            function(data){  
            }					
        );
    }
    
    function disconnectUser(){
        idUserAnnonceur = $("#idUserAnnonceur").val();
        $.post("../disconnectuser.html",
            {id:idUserAnnonceur, pseudo:Pseudonyme},
            function(data){
                alert('deconnexion effetuée!')
            }					
        );
    }
})( jQuery )
