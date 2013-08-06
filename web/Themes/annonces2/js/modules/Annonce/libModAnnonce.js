/*
( function($) { 
    $(document).ready(function(){  
        $('#picto_image').serialScroll({
            items:'li:visible',
            prev:'img#view_scroll_left',
            next:'img#view_scroll_right',
            axis:'x',
            offset:0,
            start:0,
            stop:true,
            onBefore:serialScrollFixLock,
            duration:700,
            step: 2,
            lazy: true,
            lock: false,
            force:false,
            cycle:false
        });

        $('#picto_image').trigger('goto', 1);// SerialScroll Bug on goto 0 ?
        $('#picto_image').trigger('goto', 0);        
    });    
    
} ) ( jQuery )

// Serialscroll exclude option bug ?
        function serialScrollFixLock(event, targeted, scrolled, items, position)
        {
            serialScrollNbImages = $('#picto_image li:visible').length;
            serialScrollNbImagesDisplayed = 4;

            var leftArrow = position == 0 ? true : false;
            var rightArrow = position + serialScrollNbImagesDisplayed >= serialScrollNbImages ? true : false;

            $('img#view_scroll_left').css('cursor', leftArrow ? 'default' : 'pointer').css('display', leftArrow ? 'none' : 'block').fadeTo(0, leftArrow ? 0 : 1);
            $('img#view_scroll_right').css('cursor', rightArrow ? 'default' : 'pointer').fadeTo(0, rightArrow ? 0 : 1).css('display', rightArrow ? 'none' : 'block');
            return true;
        }*/

