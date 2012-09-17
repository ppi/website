jQuery(document).ready(function($) {
	
	$('.flashes .alert').alert();
	
	$('#download-skeleton-without-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(ppi.baseUrl + 'download/without-vendors', function(data) {
			window.location.href = ppi.baseUrl + 'downloads/ppi-skeletonapp-without-vendors.tar.gz';
		});
		return false;
	});
	
	$('#download-skeleton-with-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(ppi.baseUrl + 'download/with-vendors', function(data) {
			window.location.href = ppi.baseUrl + 'downloads/ppi-skeletonapp-with-vendors.tar.gz';
		});
		return false;
	});

    $('.newsletter-box').find('form').submit(function(e) {

        e.preventDefault();

        var $el = $(this);

        var msg,
            title,
            field = $el.find('.email'),
            email = $.trim(field.val()),
            name  = $.trim($el.find('.name').val());

        field.popover({
            position: 'right',
            trigger: 'manual',
            content: msg,
            title: title
        });

        console.log(ppi.baseUrl + 'newsletter_submit');

        $.post(ppi.baseUrl + 'newsletter_submit', {email: email, name: name}, function(response) {

            switch(response) {

                case 'E_DUPLICATE':
                    msg = 'You\'ve already signed up for the newsletter';
                    title = 'By the way!';
                    break;

                case 'OK':
                    msg = 'You are now signed up for the newsletter. :-)';
                    title = 'Sweet!';
                    break;

                case 'E_INVALID':
                    msg = 'Invalid email address supplied';
                    title = 'Uhoh!';
                    break;

                default:
                    msg = 'There was a problem signing you up.';
                    title = 'Uhoh!';
                    break;

            }

            field.data('popover').options.title = title;
            field.data('popover').options.content = msg;

            field.popover('show');

            setTimeout(function() {
                field.popover('hide');
            }, 3500);

            $el.find('.name').val('');
            $el.find('.email').val('');

        }, 'json');


    });
});