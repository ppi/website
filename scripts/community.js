jQuery(document).ready(function() {

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
});