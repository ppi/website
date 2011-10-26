jQuery(document).ready(function() {

	$('.contributors-item .links a').click( function(event) {
		event.preventDefault();
		$(this).parents('.contributors-item').find('.committers').slideToggle();
		
		var $text = $(this).text();
		
		if($text === 'Show Contributors'){
			$(this).text('Hide Contributors');
		} else if($text === 'Hide Contributors'){
			$(this).text('Show Contributors');
		}
		
		if($text === 'Show Members'){
			$(this).text('Hide Members');
		} else if($text === 'Hide Members'){
			$(this).text('Show Members');
		}
		
	});

	$('.contributors-item .links a:first').trigger('click');

});