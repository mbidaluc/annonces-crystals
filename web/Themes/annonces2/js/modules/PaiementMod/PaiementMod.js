/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
( function($) { 
    $(document).ready(function(){ 
         $(".paiement > a").click(function(){
             url = $(this).attr("title");
             $.post(url,
                    function(data){
                        if(data != "lien")
                            $( "#ModalFormPaiement" ).html(data);
                    }					
              );
         });
         //alert("bonjour");
           $(".paiement > a").fancybox({
                maxWidth	: 800,
                maxHeight	: 800,
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
