$(document).ready(function() {
    $('.nav-button').click(function() {
        var wrapper = $(this).siblings('.nav-wrapper');

        if (wrapper.attr('data-disabled') == 'true')
            return false;

        if (wrapper.hasClass('opened-nav')) {
            $(this).html('Menu');
            wrapper.removeClass('opened-nav');
        } else {
            $(this).html('Close');
            wrapper.addClass('opened-nav');
        }
    });
});