jQuery(document).ready(function($) {
    $('#back-to-top').click(function() {
        $.scrollTo($('body'), 600);
        return false;
    });
    $(window).scroll(function() {
        if($(window).scrollTop() >= 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

	$('.all-news-container').fadeIn('fast', function() {
		$(this).effect('shake', {times: 2, distance: 10}, 100);
	});


    var current = 0;
    var last = $('.news-item').length - 1;
    $('.news-item').each(function(i){
    	if(i !== 0) $(this).hide();
    	$(this).attr('id', 'news' + i);

    });

    setTimeout(cycleNews, 5000);

    function cycleNews()
    {
    	var next = current + 1;
    	if(next == last) next = 0;
    	$('#news' + current).fadeOut(function(){
    		$('#news' + next).fadeIn(function(){
    			current = next;
    			setTimeout(cycleNews, 5000);
    		});
    	});
    }
});