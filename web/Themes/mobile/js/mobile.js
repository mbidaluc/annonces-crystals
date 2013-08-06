/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 ( function($) { 
    $(document).ready(function(){
		//GESTION CLICK SUR UNE ANNONCE PUB
        $("#lepseudonyme").focus(function(){
			if($("#lepseudonyme").val()== "pseudo" || $("#lepseudonyme").val()== "Entrer votre pseudo"){
				$("#lepseudonyme").val("");
			}
		});
		$("#lepseudonyme").blur(function(){
			if($("#lepseudonyme").val()== ""){
				$("#lepseudonyme").val("pseudo");
			}
		});
		
		//efface le champ mot de passe
        $("#lemotdepasse").focus(function(){
			if($("#lemotdepasse").val()== "Mot de passe"){
				$("#lemotdepasse").val("");
			}
		});
		$("#lemotdepasse").blur(function(){
			if($("#lemotdepasse").val()== ""){
				$("#lemotdepasse").val("Mot de passe");
			}
		});
                
                
            
		$(".annPub").click(function(){
			valeur = $(this).attr("id");
			lid = valeur.split("_");
			//alert(lid[0]);
			$.post("mesannoncespub-updateclick.html",
                    {id:lid[1]},
                    function(data){
                       // alert(data);
                    }					
            );
		});
        $('#menu ul li').last().addClass('last');
        widthelt = 0;
        $('#menu ul li').each(function(){
            widthelt +=$(this).width()+26;
        });
        $('#menu ul').width(widthelt);
        //animation annonce mobiles
        $('#annonces-mobiles ul').simplyScroll({
            orientation: 'horizontal'
        });
         //animation événement
        $('#annonce-evenement ul').simplyScroll({
            orientation: 'vertical'
        });
            //animation annonce spéciales
        $('#annonces-speciales > #annonces_speciales_scroller').simplyScroll({
            orientation: 'horizontal',
            speed: 1,
            frameRate: 24
        });


        //gestion de la pagination
        $('.pagination').on('click', '.previours_page', function(){
             _self = $(this);
            param = _self.attr('name');
            currentp = $('.pagination .current').html();
            if(param < currentp){
                page_next = parseInt(currentp)-1;
                paramPagination(_self,page_next,param);
            }
            return false;
        });
        $('.pagination').on('click', '.next_page', function(){
            _self = $(this);
            param = _self.attr('name');
            currentp = $('.pagination .current').html();
            if(param > currentp){
                page_next = parseInt(currentp)+1;
                paramPagination(_self,page_next,param);
            }
            return false;
        });
        $('.pagination').on('click', '.item_p', function(){
            _self = $(this);
            cat = _self.attr('name');
            page_next = _self.html();            
            paramPagination(_self,page_next,cat);
            return false;
        });
        //fonction de gestion de la pagination
        function paramPagination(parentEssai,page,cat){
            parentEssai = _self.closest('div');
            if( !parentEssai.hasClass('ajaxing')) {
                $.ajax({
                    //url: aLink.ajaxurl,
                    type: "POST",
                    data: { searchparam: $('#paramSearch').serialize(), paged: page,cat:cat},
                    beforeSend: function() {
                        parentEssai.addClass('ajaxing');
                    },
                    success: function(data) {
                        parentEssai.removeClass( 'ajaxing' );
                        $('.pagination .item_p').removeClass('current');
                        $('.pagination .page_'+page).addClass('current');
                        $('#content-page').fadeOut('200',function(){
                            $(this).html(data).fadeIn('200');
                        });
                    }
                });
            }
        };
    });
    
    //gestion du champ de recherche
    if($("#search_text").val()==""){
			$("#search_text").val("Recherche");
		}
        $("#search_text").focus(function(){
			if($("#search_text").val()== "Recherche"){
				$("#search_text").val("");
			}
		});
		$("#search_text").blur(function(){
			if($("#search_text").val()== ""){
				$("#search_text").val("Recherche");
			}
		});
        //gestion du champ de ville
        $("#search_ville").focus(function(){
			if($("#search_ville").val()== "Ville"){
				$("#search_ville").val("");
			}
		});
		$("#search_ville").blur(function(){
			if($("#search_ville").val()== ""){
				$("#search_ville").val("Ville");
			}
		});
        //gestion du champ de prix min
        $("#search_price_min").focus(function(){
			if($("#search_price_min").val()== "Prix min"){
				$("#search_price_min").val("");
			}
		});
		$("#search_price_min").blur(function(){
			if($("#search_price_min").val()== ""){
				$("#search_price_min").val("Prix min");
			}
		});
        //gestion du champ de prix max
        $("#search_price_max").focus(function(){
			if($("#search_price_max").val()== "Prix max"){
				$("#search_price_max").val("");
			}
		});
		$("#search_price_max").blur(function(){
			if($("#search_price_max").val()== ""){
				$("#search_price_max").val("Prix max");
			}
		});
    
} ) ( jQuery );
