
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 ( function($) { 
    $(document).ready(function(){
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
                    data: { searchparam: $('#paramSearch').serialyse(), paged: page,cat:cat},
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
    
} ) ( jQuery )


