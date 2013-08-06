/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function(){
    //instanciation de la librairie pour l'animation des bannières pub
    $('#slider').nivoSlider();
	
	$('.btn_achatcredit').click(function(){
		var idelt = this.id;
		idelt = idelt.split('-');
		iduser =idelt.pop();
            if(iduser==0){
				alert('créer un compte ou connecter vous avant d\'acheter du crédit');
                return false;
            }else{
				//$('form.'+idelt.pop()).submit();
				document.getElementById(idelt.pop()).submit();
			}
	});
        
});

function reload_page()
{
	window.location.reload();
	return;
}

