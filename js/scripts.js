/* keeps the dropdown menu visible for a while after hovering over it */
$(document).ready(function(){

    subMenuManagement();

    var clearLi;

    $('.click-search').click(function(){

        $('.search-box').animate({width: 'toggle'});
    });

});

// submenu hover
function subMenuManagement(){

    // disables links that have sub menus
    $('.sub-menu').parent('li').children('a').click(function(e){
        e.preventDefault();
    });

    if(window.innerWidth > 650){

        $('html').attr('style', '');

        $('.nav-links').dropit({
            action: 'mouseenter'
        });

        // show the submenus on hover
        (function(){
            
            // clear styles if resizing from smaller screen 
            $('.nav-links').attr('style', '');
            $('.sub-menu').parent().children('a').removeClass('dropdown-arrow');

        })();

    } else {

        // append the 'X' to close the mobile menu
        $('.nav-links-holder').append("<div id='mobile-menu-close'><i class='fa fa-times'></i></div>");

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

