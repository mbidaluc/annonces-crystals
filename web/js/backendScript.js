( function($) { 
    $(document).ready(function(){
        //gestion de date et heure de la bannière publicitaire
        $('.datepicker').datetimepicker({dateFormat :'yy-mm-dd',timeFormat :'hh:mm:ss'})
        //gestion de la réecriture des liens d'une catégorie'
        $(".copy2friendlyUrl").live('keyup change',function(e){
		if(!isArrowKey(e))
			return copy2friendlyURL();
        });
        //traitement de l'envoi d'une enchère
        $('.sent_elt').unbind().click(function(){
            var idelt = this.id;
            idelt = idelt.split('-');
            iduser =idelt.pop();
            if(iduser==0){
                return false;
            }else{
                idpro =idelt.pop();
                $.ajax({
                    type: "POST", 
                    url: "./encheres-terminee.html",
                    data: "email="+iduser+"&idprod="+idpro,
                    cache: false,
                    success:  function(response){
                        //$('#center-column').html(response);
                        $('#send_enchere'+idpro).attr('checked','checked');
                        $('.infos').html('<img alt="ok" src="../backend_images/ok2.png" />Enchère envoyée  au gagnant!')
                        $('.infos').show();
                        $.scrollTo( $('.infos'), 1000 );
                        setTimeout("$('.infos').hide('fast')",3000);
                        
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

function strreplaceString(e){
    var tab = new array();
    var tab2 = new array();
    
}

function isArrowKey(k_ev)
{
	var unicode=k_ev.keyCode? k_ev.keyCode : k_ev.charCode;
	if (unicode >= 37 && unicode <= 40)
		return true;
	return false;
}

function str2url(str, encoding, ucfirst)
{
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

	return str;
}

function copy2friendlyURL()
{
	
	//if (!$('#id_link_rewrite').val().length)//check if user didn't type anything in rewrite field, to prevent overwriting
	{
		$('#id_link_rewrite').val(str2url($('.name_elt').val().replace(/^[0-9]+\./, ''), 'UTF-8').replace('%', ''));
		if ($('#friendly-url'))
			$('#friendly-url').html($('#id_link_rewrite').val());
		// trigger onchange event to use anything binded there
		$('#id_link_rewrite').change();
	}
	return;
}