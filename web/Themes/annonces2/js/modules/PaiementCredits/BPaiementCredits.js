/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var id_order_pack
( function($) { 
    $(document).ready(function(){
        $('#getvalidate').click(function(){
            $('#id_op').val(id_order_pack);
             $.ajax({
                url: "./validatepack.html",
                type: "POST",
                data: $("#formcontrole").serialize(),
                success: function(data) {
                    if(data == "ok"){
                        window.location.replace("./activate-credit-"+id_order_pack+".html");
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
    });
    
})( jQuery )
function validateOrderPack(idop){
    id_order_pack = idop;
   
    $("#fancy_auto").fancybox({
       fitToView	: true,
       autoSize	: true,
       closeClick	: false,
       openEffect	: 'none',
       closeEffect	: 'none',
       title:'Validation'
   }).trigger("click");
    
}
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


