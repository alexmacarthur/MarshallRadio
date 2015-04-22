/* keeps the dropdown menu visible for a while after hovering over it */
$(document).ready(function(){
    var clearLi;

    /* makes menu visible */
    $("#dropdown a").hover(function() {
        clearTimeout(clearLi);
        $("#dropdown-list").removeClass('visible-menu');
        $("#dropdown-list").addClass('visible-menu');

    /* removes class after a given amount of time */
    }, function() {
        clearLi = setTimeout(function() {
           $('#dropdown-list').removeClass('visible-menu'); 
        }, 400);
    });

    $('.click-search').click(function(){

        $('.search-box').animate({width: 'toggle'});
    });

 $('button').click(function () {
        $("#nav-links").slideToggle();
    });

});

