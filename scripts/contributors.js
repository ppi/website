jQuery(document).ready(function() {

	$('.contributors-item .links a').click( function() {
		$(this).parents('.contributors-item').find('.committers').slideToggle();

        if ($(this).text() == "Show Contributors") {
            $(this).html("Hide Contributors");
        } else {
            $(this).html("Show Contributors");
        }

        if ($(this).text() == "Show Members") {
            $(this).html("Hide Members");
        } else {
            $(this).html("Show Members");
        }

		return false;
	});

	$('.contributors-item .links a:first').trigger('click');

});