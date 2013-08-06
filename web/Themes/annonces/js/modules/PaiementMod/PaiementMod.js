/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
( function($) { 
    $(document).ready(function(){
       
        /*$( "#ModalFormPaiement" ).dialog({
                    autoOpen: false,
                    height: 350,
                    width: 500,
                    show: "slide",
                    hide: "blind",
                    resizable: true,
                    modal: true,
                    position: "top"
         });*/
         
         $(".paiement > a").click(function(){
             url = $(this).attr("title");
             $.post(url,
                    function(data){
                        $( "#ModalFormPaiement" ).dialog("open");
                        $( "#ModalFormPaiement" ).html(data);
                    }					
              );
         });
         //alert("bonjour");
           $(".paiement > a").fancybox({
                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '40%',
		height		: '50%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
                title:'Paiement'});
    });

})( jQuery )
