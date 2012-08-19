jQuery(document).ready(function($) {

	var filtered = $('.activity-stream').hasClass('filtered');

	$(".topcontent .filter-twitter").click(function() {
		if(filtered) {
			return true;
		}
		$(".source-github").fadeOut('fast');
		$(".source-twitter").fadeIn('fast');
		return false;
	});


	$(".topcontent .filter-github").click(function() {
		if(filtered) {
			return true;
		}
		$(".source-github").fadeIn('fast');
		$(".source-twitter").fadeOut('fast');
		return false;
	});

	$(".topcontent .filter-all").click(function() {
		if(filtered) {
			return true;
		}
		$(".source-github").fadeIn('fast');
		$(".source-twitter").fadeIn('fast');
		return false;
	});
	
	$('.newsletter-box').find('form').submit(function(e) {
		
		e.preventDefault();
		
		var msg,
			title,
			field = $(this).find('.email'),
			email = $.trim(field.val()),
			name  = $.trim($(this).find('.name').val());

		field.popover({
			position: 'right',
			trigger: 'manual',
			content: msg,
			title: title
		});
		
		$.post(baseUrl + 'community/newsletter_submit', {email: email, name: name}, function(response) {
		
			console.log(response);
			
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
		
		}, 'json');
		
		
	});
});