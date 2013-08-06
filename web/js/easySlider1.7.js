//On s'assure d'abord que le document est chargé :
;( function($) { 
	
     $.fn.alfSlideshow = function(options){   
        var defaults = {
                        declage: 69,	//width element
			nbdisplay: 4, // elment to display
			nbobjet: 4,
			direction: "left",
			nextbuttonid: "#next",
			previousbuttonid: "#prev",
			animationtype: "slow"
        };
        $.extend(defaults,options);
		var elt                = $(this);
		var declage            = defaults.declage;
        var nbdisplay          = defaults.nbdisplay;
		var nbobjet            = defaults.nbobjet;
		var direction          = defaults.direction;
		var nextbuttonid       = defaults.nextbuttonid;
		var previousbuttonid   = defaults.previousbuttonid;
		var animationtype      = defaults.animationtype;
        
        if(nbobjet < nbdisplay){
            $(nextbuttonid).addClass("lastest");
            $(previousbuttonid).addClass("first");
        }
       
        //Enfin on amorce une variable à 0 qui va nous permettre de nous repérer dans la navigation
        var repere = 0;
        //On crée ensuite deux fonctions assigné sur chacun de nos boutons de navigation :
        //La fonction qui permet d'avancer dans le carrousel est assigné au lien possédant l'id "next" :
        $(nextbuttonid).click(
        function () {
            //alert(nbdisplay);
            if ($(this).is(".lastest")==false) //je n'active la fonction que si je ne suis pas sur le dernier élément
            {
                repere++; //j'incrémente ma variable de repère
                if(direction == "left")
                    elt.animate({"left": "-="+declage+"px"}, animationtype);//je déplace vers la gauche mon conteneur de largeur totale d'un élément (element+marge+bordure).
                else
                    elt.animate({"top": "-="+declage+"px"}, animationtype); 
                $(previousbuttonid).removeClass();//j'enlève la classe du lien "précedent" pour le faire apparaitre puisque désormais je peux naviguer en arrière.
                if((repere + nbdisplay) == nbobjet){//enfin, je calcule si je ne suis pas au bout de ma liste.
                    $(this).addClass("lastest");//le cas écheant, j'ajoute une classe au bouton pour le faire disparaitre.
                }
            }
            return false;
        });
        //La fonction qui permet de reculer dans le carrousel est assigné au lien possédant l'id "prev" :
        $(previousbuttonid).click(
            function () {
                if ($(this).is(".first")==false) {
                    if(direction == "left")
                        elt.animate({"left": "+="+declage+"px"}, animationtype);//je déplace vers la gauche mon conteneur de largeur totale d'un élément (element+marge+bordure).
                    else
                        elt.animate({"top": "+="+declage+"px"}, animationtype); 
                    repere--;
                    $(nextbuttonid).removeClass();
                    if(repere==0){
                        $(this).addClass("first");
                    }
                }
                return false;
            });
      
    };
})( jQuery );