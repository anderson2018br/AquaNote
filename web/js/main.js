$(document).ready(function () {
    $('#menu-button').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('menu-size');
    });
    $('menu').mouseenter(function () {
        $('body').addClass('menu-size');
    });

    $('menu').mouseleave(function () {
        $('body').removeClass('menu-size');
    });

});
