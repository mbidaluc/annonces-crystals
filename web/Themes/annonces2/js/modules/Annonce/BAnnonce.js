/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) { 
    $(document).ready(function(){
        $('#getvalidate').click(function(){
             $.ajax({
                url: "./validateannonce.html",
                type: "POST",
                data: $("#formcontrole").serialize(),
                success: function(data) {
                    if(data == "ok"){
                        $("#postform").append('<input name="active" type="hidden" />');
                        $("#postform").submit();
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
       ///################## EDIT ZONE ##################################"""
       $("#id_typeFacturation").change( function(){    
            var valeur =  $("#id_typeFacturation option:selected").val();
            if(valeur === "click")
                $("#spacePrice").attr("hidden", "hidden");
            else
                 $("#spacePrice").removeAttr("hidden");
         }).trigger('change');
         
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
        
        //###########################ZONE ENREGISTREMENT##################//
        
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
         
         
        $("#id_idPosition").change( function(){         
            calculateprice();       
         }).trigger('change');
         
         $("#id_dureeAnnonce").change( function(){         
            calculateprice();       
         }).trigger('change');
         
         $("#id_idPriorite").change( function(){
             calculateprice();       
         }).trigger('change');
         
         
         
         $("#Btnimage").click( function(){
             $("#fileimg").click();      
         });
         
         $("#tabsimages > li").click( function(){
                $("#fileimg").click();      
         });
         
         $("#id_designation").keyup(function(){
            str = $(this).val();
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
         });
                  
            
      $('#fileimg').fileupload({
            /* ... */
            url: './uploadfile.html',
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
                            $('#img'+posnextimage).html('<img src="'+informations[0]+'" width="62" />');
                            $('#imagescache').append('<input type="text" name="image[]" id=image"'+posnextimage+'" style="visibility:collapse;" value="'+informations[1]+'"/>');
                            curentpos++;
                            calculateprice();
                            posnextimage++;
                            
                        }
                        
                    });
            }
           
        });
        
        
        

    });
    
    function calculateprice(){
        
        ValeurPosition =   $("#id_idPosition option:selected").val();
        
        infos = ValeurPosition.split('*');
        prixPositon = parseInt(infos[1]);

        ValeurPriorite =   $("#id_idPriorite option:selected").val();
        infos = ValeurPriorite.split('*');
        prixPriorite = parseInt(infos[1]);
        
        ValeurDureeAnnonce = parseInt($("#id_dureeAnnonce option:selected").val());
        //prixUnitAnn = parseInt(prixUniteAnnonce)*parseInt(ValeurDureeAnnonce);
        
        prixPhoto = parseInt(tabPrice[curentpos]);

        prixTotal = ValeurDureeAnnonce*(prixPositon + prixPriorite + prixPhoto);// + prixUnitAnn;
        
        $("#spacePrice").html(prixTotal + " FCFA");
        $("#prixT").val(prixTotal);
    };
    
})( jQuery )
function validateOrder(montant){
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
            $("#postform").append('<input name="active" type="hidden" />');
            $("#postform").submit();
            //return true;
        }
    }

