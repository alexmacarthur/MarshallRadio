/* keeps the dropdown menu visible for a while after hovering over it */
$(document).ready(function(){

    subMenuManagement();
    initMobileMenu();

    $('.click-search').click(function(){

        $('.search-box').animate({width: 'toggle'});
    });

});

window.onresize = function(){
    // because at least item is created in the DOM by jQuery, these MUST be in this order.
    subMenuManagement();
};

// submenu hover
function subMenuManagement(){

    // disables links that have sub menus
    $('.sub-menu').parent('li').children('a').click(function(e){
        e.preventDefault();
    });

    if(window.innerWidth > 650){

        $('.nav-links').dropit({
            action: 'mouseenter'
        });

        $('html').attr('style', '');

        // show the submenus on hover
        (function(){
            
            // clear styles if resizing from smaller screen 
            $('.nav-links').attr('style', '');
            $('.sub-menu').parent().children('a').removeClass('dropdown-arrow');

        })();

    } else {

        $('.nav-links').dropit({
            action: 'click'
        });

        // append the 'X' to close the mobile menu
        $('#mobile-menu').append("<div id='mobile-menu-close'><i class='fa fa-times'></i></div>");

        (function(){
            var linksHeight = $('.nav-links').height(),
            windowHeight = $(window).height();
            $('.nav-links').css('margin-top', (windowHeight-linksHeight)/2);
        })();
    
        // add arrow to link items with submenus
        $('.sub-menu').parent().children('a').addClass('dropdown-arrow');

        // show the submenus when clicked
        (function(){
            $('.nav-links li').click(function(){
                $(this).children('.sub-menu').toggle();

            });
        })();

    }
}

function initMobileMenu(){

    $('#mobile-menu-toggle').click(function(){

        // if it has this class, it's already open, so close it
        if($('#mobile-menu').hasClass('open-mobile-menu')){

            // remove overflow-hidden so full page can be used
            $('html').removeClass('overflow-hidden');

            // remove the class that keeps it open
            $('#mobile-menu').removeClass('open-mobile-menu');

        // if it doesn't, it's already closed, so open it
        }else{

            // set overflow-hidden so user can't scroll all over
            $('html').addClass('overflow-hidden');

            // add the class that keeps it open
            $('#mobile-menu').addClass('open-mobile-menu');
        }

    });
    
    // closing the mobile menu
    $('#mobile-menu-close').click(function(){

        // remove the class that keeps it open
        $('#mobile-menu').removeClass('open-mobile-menu');

        // remove overflow-hidden so full page can be used
        $('html').removeClass('overflow-hidden');
    });
} 
