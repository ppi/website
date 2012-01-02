jQuery(document).ready(function($) {
	
	if(window.location.hash !== '') {
		var el = $(window.location.hash);
		if(el.length > 0) {
			var offset = el.offset().top - 70;
			$('.api-show-page .methods').scrollTo({top: offset + 'px', left: '0px'});
		}
	}
});