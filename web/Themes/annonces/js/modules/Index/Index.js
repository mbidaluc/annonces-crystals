/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
( function($) { 
    $(document).ready(function(){
        $('.pagination').on('click', '.inactive', function(event){
            event.preventDefault();
            _self = $( this );
            page = _self.html();
            parentEssai = $( this ).closest( 'div' );
            if( !parentEssai.hasClass( 'ajaxing' ) ) {
                $.ajax({
                    type: "POST",
                    data: { paged: page},
                    beforeSend: function() {
                        parentEssai.addClass( 'ajaxing' );
                    },
                    success: function( data ) {
                        parentEssai.removeClass( 'ajaxing' );
                        $('#category_home').fadeOut('200',function(){
                            $(this).html(data).fadeIn('200');
                        });
                    }
                });
            }
            return false;
        });
    });
} ) ( jQuery )


