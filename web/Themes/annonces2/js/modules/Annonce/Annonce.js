/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
        $('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
           
        });
        
        $('#det').slimScroll({
            color: '#85B801',
            height: '142px',
            width: 'auto'
      });
      
      
        
        $(".small_img > a").click(function(){
           var image = $(this).attr("href");
           
           var srcImageLarge = image.replace("big", "");
           $(".bigimg").attr("src", image);
           $(".zoomWrapperImage >img").attr("src", srcImageLarge);
           return false;
       });
       
        $('#btnsubmit').click(function(){
            if(($('#id_type').val() == "NULL") || ($('#id_idCategorie').val() == "NULL")){
                alert('veuillez renseigner tous les champs obligatoires svp');
                return false;
            }else{
                return true;
            }
        });
       
        $("#picto_image").alfSlideshow();
        $("#id_type").change( function(){
           
            valeur =   $("#id_type option:selected").val();
            link = "./positions.html";
            type = false;
            if(valeur=='pub'){
                type = true;
                link = './poster-une-annonce-publicitaire.html';
                document.location.replace('./poster-une-annonce-publicitaire.html');
            }
            $.ajax({
                type: "POST", 
                url: link,
                data: "type="+valeur,
                cache: false,
                success:  function(response){
                    //alert(response);
                    if(type){
                        $('#content-page').html(response);
                    }else{
                        var donnees = response.split('**');

                        // Ici on vide le combobox des positions
                        $("#id_idPosition").get(0).length = 0;
                        for(var i=0; i< donnees.length; i++){
                            $("#id_idPosition").append(donnees[i]);
                        }

                        calculateprice();
                    }
                },

                onFailure: function(xhr){
                    alert("Erreur de l'envoi des données");
                }
            })
            
        }).trigger('change');
		
		$("#id_idCategorie").change( function(){
                id_cat = $("#id_idCategorie option:selected").val();
				if(id_cat != 'NULL'){
                
					$.post("./subcatan.html",
						{idCad:id_cat},
						function(data){
						
							var donnees = data.split('**');
	
							$("#id_idSubCategorie").get(0).length = 0;
							$("#id_idSubCategorie").append('<option value="NULL">Aucune sous catégorie</option>');
							for(var i=0; i< donnees.length; i++){
								$("#id_idSubCategorie").append(donnees[i]);
							}
						}					
					);
				}
	
         }).trigger('change');
        
        $("#id_typeFacturation").change( function(){         
            var value =  $("#id_typeFacturation option:selected").val();
            if(value === "click")
                $("#spacePrice").attr("hidden", "hidden");
            else
                 $("#spacePrice").removeAttr("hidden");
         }).trigger('change');
        
        $("#id_idPosition").change( function(){ 
			var ValeurPosition =   $("#id_idPosition option:selected").val();
        
        	var infos = ValeurPosition.split('*');
        	var position = parseInt(infos[0]);
			var parent = $("#id_urlSortant").parent();
			if((position == 6)|| (position == 9)){
				 parent.show();
			}else{
				 parent.hide();
			}
            calculateprice();   
         }).trigger('change');
         
         $("#id_dureeAnnonce").change( function(){ 
		 	var val = $("#id_dureeAnnonce option:selected").val();
			if(val == "autres")
				$("#id_orther").parent().show();
			else
				$("#id_orther").parent().hide();
            calculateprice();  
			
         }).trigger('change');
		 
		 $("#id_orther").keyup(function(){
				var val = $("#id_dureeAnnonce option:selected").val();
				if(val == "autres")
					 calculateprice();  
         });
         
         $("#id_idPriorite").change( function(){
             calculateprice();       
         }).trigger('change');
         
         $("#Btnimage").click( function(){
			
             $("#fileimg").click();      
         });
         
          $(".plus_detail").click( function(){
              
              $.scrollTo( $('#tab_description'), 1000 );
          });
         
         $("#tabsimages > li").click( function(){
                $("#fileimg").click();      
         });
         
         $("#id_designation").keyup(function(){
            link_rewrite($(this).val());
         });
         $("#id_designation").change(function(){
            link_rewrite($(this).val());
         });
         
         
         
      $('#fileimg').fileupload({
            /* ... */
            url: './uploadfile.html',
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            
            },
            
            add: function (e, data) {
                var jqXHR = data.submit()
                    .done(function (result, textStatus, jqXHR) { /*...*/ })
                    .fail(function (jqXHR, textStatus, errorThrown) {/*...*/})
                    .always(function (response) { 
                        //alert(response);
                        informations = response.split("**");
                        
                        if(informations[1] === "Array"){
                            alert("L'image n'a pas été chargée: trop volumineuse (100 Ko Maximum)!");
                        }else{
                            $('#img'+posnextimage).html('<img src="'+informations[0]+'" width="62" />');
                            $('#imagescache').append('<input type="text" name="image[]" id=image"'+posnextimage+'" style="visibility:collapse;" value="'+informations[1]+'"/>');
                            curentpos++;
                            calculateprice();
                            posnextimage++;
                            
                        }
                        
                    });
            }
           
        });
        
        ///################## EDIT ZONE ##################################"""
        $("#tabsimageupdate > li > a").click( function(){
                id_anchor  = $(this).attr('id');
                chps = id_anchor.split("_")
                id_image   = "image"+id_anchor;
                id_annonce = $("#id_id").val();
                image      = $("#"+id_image).attr('title');
                idPhotoDB  = chps[1];
                
                $.post("./deletephoto.html",
                    {id:idPhotoDB, idAnnonce:id_annonce, imageAnn:image},
                    function(data){
                        alert(data);
                        if(!parseInt(data)){
                            alert('l\'image à déjà été supprimée!');
                        }else{
                            $("#"+id_image).attr('title', '#');
                            $("#"+id_image).attr('src', '#');
                        }
                    }					
            );
                //alert($("#"+id_image).attr('title'));
         });
         
         $("#tabsimageupdate > li > img").click( function(){
            idimg = $(this).attr("id");
            chps = idimg.split("_");
            idPhoto = chps[1];
            
            id_photoCurent = idPhoto;
            id_imageCurent = idimg;
            
            //alert("image c: "+ id_imageCurent);
            //alert("photo c: "+ id_photoCurent);
            if(($(this).attr('title') === " ") || ($(this).attr('title') === "#")){
                $("#fileimgupdate").click(); 
            }else{
                alert('veuilez d\'abord supprimer l\'image');
            }
                 
         });
         
         $('#fileimgupdate').fileupload({
            /* ... */
            url: './uploadfileupdate.html',
            sequentialUploads: true,
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            
            },
            
            add: function (e, data) {
                var jqXHR = data.submit()
                    .done(function (result, textStatus, jqXHR) { /*...*/ })
                    .fail(function (jqXHR, textStatus, errorThrown) {/*...*/})
                    .always(function (response) { 
                        //alert(response);
                        informations = response.split("**");
                        
                        if(informations[1] === "Array"){
                            alert("L'image n'a pas été chargée: trop grande!");
                        }else{
                            id_annonce = $("#id_id").val();
                            $.post("./updateimage.html",
                                    {id:id_photoCurent, idAnnonce:id_annonce, imageAnn:informations[1]},
                                    function(data){
                                        //alert(data);
                                        if(!parseInt(data)){
                                            alert('l\'image à déjà été supprimée!');
                                        }else{
                                            $("#"+id_imageCurent).attr('title', informations[1]);
                                            $("#"+id_imageCurent).attr('src', informations[0]);
                                        }
                                    }					
                            );
                            
                        }
                        
                    });
            }
        });
        
		 
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
                title:'Conditions Générales d\'Annonce'});
         
         $("#repondre_annonce").fancybox({
                maxWidth	: 800,
                maxHeight	: 600,
                fitToView	: false,
                width		: '40%',
                height		: '50%',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none',
                title:'Répondre à l\'Annonce'});
         $("#repondrealannonce").click(function(){
            
             $.post("../repannonce.html",
                    {idAnnonce:$("input[name=ids]").val(), Nomexpediteur:$("input[name=noms]").val(), expediteur:$("input[name=emails]").val(), message:$("textarea[name=msgs]").val(), subjet:$("input[name=AnnonceTitrerep]").val(),address:$("input[name=address]").val(),Nomaddress:"Annonceur", annonceUrl:document.location.href},
                    function(data){
                        alert(data);
                    }					
            );
         });
         
         $("#send_to_friend").fancybox({
                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '40%',
		height		: '50%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
                title:'Envoyer cet Annonce à un(e) ami(e)'});
            
         $("#envoieannonceamie").click(function(){
            var msge = $("textarea[name=msga]").val();
            //alert(msge);
             $.post("../envannoceamie.html",
                    {idAnnonce:$("input[name=ida]").val(), Nomexpediteur:$("input[name=nomd]").val(), expediteur:$("input[name=emaild]").val(), message:msge, subjet:$("input[name=AnnonceTitreenvami]").val(),address:$("input[name=emailAmi]").val(),Nomaddress:$("input[name=nomAmi]").val(), annonceUrl:document.location.href},
                    function(data){
                        alert(data);
                    }					
            );
         });
         
         $("#signaler_abus").fancybox({
                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '40%',
		height		: '50%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
                title:'Signaler un Abus'});
         
         $("#signalAbus").click(function(){
             nom       = $("#NomSignaleur").val();
             emaill     = $("#emailSignaleur").val();
             idAnnonce = $("#idAnnabus").val();
             msg       = $("#msgSignaleur").val();
             
              $.post("../abus.html",
                    {id:idAnnonce, NomSignaleur:nom, email:emaill, message:msg},
                    function(data){
                       alert("abus signalé");
                        if(parseInt(data)){
                            $( "#modalAbus" ).dialog("close");
                            return false;
                        }else{
                            alert("Erreur lors de l'enregistrement!");
                            return false;
                        }
                    }					
              );
              return false;
         });
         
         //############################ TOOL TYPE####################
         
          
    });
    
    function calculateprice(){
        /*texte = $("#spacePrice").text();
        price =  texte.split(' FCFA');
        prix = parseInt(price[0]);*/
        ValeurPosition =   $("#id_idPosition option:selected").val();
        
        infos = ValeurPosition.split('*');
        prixPositon = parseInt(infos[1]);

        ValeurPriorite =   $("#id_idPriorite option:selected").val();
        infos = ValeurPriorite.split('*');
        prixPriorite = parseInt(infos[1]);
        
        ValeurDureeAnnonce =$("#id_dureeAnnonce option:selected").val();
        //prixUnitAnn = parseInt(prixUniteAnnonce)*parseInt(ValeurDureeAnnonce);
		
		if(ValeurDureeAnnonce == "autres")
			 ValeurDureeAnnonce = parseInt($("#id_orther").val());
		else
			 ValeurDureeAnnonce = parseInt($("#id_dureeAnnonce  option:selected").val());
        
        prixPhoto = parseInt(tabPrice[curentpos]);

        prixTotal = ValeurDureeAnnonce*(prixPositon + prixPriorite + prixPhoto);// + prixUnitAnn;
        
        /*if(parseInt(prixTotal)){
            $("#Btnimage").removeAttr("disabled");
        }else{
                //alert("bonjojr");
             $("#Btnimage").attr("disabled", "disabled");
        }*/
        
        $("#spacePrice").html(prixTotal + " FCFA");
        $("#prixT").val(prixTotal);
        
        if(prixTotal){
            $('#btnsubmit').val('Suivant');
        }else{
            $('#btnsubmit').val('Publier');
        }
    };
    
    function link_rewrite(str){
        ucfirst = 0;
        var PS_ALLOW_ACCENTED_CHARS_URL =0;
        str = str.toUpperCase();
        str = str.toLowerCase();
        if (PS_ALLOW_ACCENTED_CHARS_URL)
            str = str.replace(/[^a-z0-9\s\'\:\/\[\]-]\\u00A1-\\uFFFF/g,'');
        else
        {
            str = str.replace(/[\u0105\u0104\u00E0\u00E1\u00E2\u00E3\u00E4\u00E5]/g,'a');
            str = str.replace(/[\u00E7\u010D\u0107\u0106]/g,'c');
            str = str.replace(/[\u010F]/g,'d');
            str = str.replace(/[\u00E8\u00E9\u00EA\u00EB\u011B\u0119\u0118\u0117]/g,'e');
            str = str.replace(/[\u00EC\u00ED\u00EE\u00EF\u012F]/g,'i');
            str = str.replace(/[\u0142\u0141]/g,'l');
            str = str.replace(/[\u00F1\u0148]/g,'n');
            str = str.replace(/[\u00F2\u00F3\u00F4\u00F5\u00F6\u00F8\u00D3]/g,'o');
            str = str.replace(/[\u0159]/g,'r');
            str = str.replace(/[\u015B\u015A\u0161]/g,'s');
            str = str.replace(/[\u00DF]/g,'ss');
            str = str.replace(/[\u0165]/g,'t');
            str = str.replace(/[\u00F9\u00FA\u00FB\u00FC\u016F\u016B\u0173]/g,'u');
            str = str.replace(/[\u00FD\u00FF]/g,'y');
            str = str.replace(/[\u017C\u017A\u017B\u0179\u017E]/g,'z');
            str = str.replace(/[\u00E6]/g,'ae');
            str = str.replace(/[\u0153]/g,'oe');
            str = str.replace(/[\u013E\u013A]/g,'l');
            str = str.replace(/[\u0155]/g,'r');

            str = str.replace(/[^a-z0-9\s\'\:\/\[\]-]/g,'');
        }
        str = str.replace(/[\u0028\u0029\u0021\u003F\u002E\u0026\u005E\u007E\u002B\u002A\u002F\u003A\u003B\u003C\u003D\u003E]/g, '');
        str = str.replace(/[\s\'\:\/\[\]-]+/g, ' ');

        // Add special char not used for url rewrite
        str = str.replace(/[ ]/g, '-');
        str = str.replace(/[\/\\"'|,;]*/g, '');

        if (ucfirst == 1) {
            var first_char = str.charAt(0);
            str = first_char.toUpperCase()+str.slice(1);
        }
        $("#id_link_rewrite").attr("value", str);
    };
    
})( jQuery )
