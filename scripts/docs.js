jQuery(document).ready(function($) {
  $('pre code.php').each(function(i, e) {hljs.highlightBlock(e, '    ')});

    $('.toc-mobile .toc-heading').click(function() {
        $(this).parent().toggleClass('expanded');
        $(this).parent().find('.items').slideToggle();
        var arrows = $(this).find('i');
        if(arrows.hasClass('icon-arrow-up')) {
            arrows.removeClass('icon-arrow-up').addClass('icon-arrow-down');
        } else {
            arrows.addClass('icon-arrow-up').removeClass('icon-arrow-down');
        }

    });

    $(window).bind( 'orientationchange', function(e){
        if(e.orientation === 'portrait') {
//            $('.toc-mobile').effects('shake', {times: 5}, 3000);
//            $('.toc-mobile').show();
//            $('.toc-container .toc').hide();
        }
    });


});