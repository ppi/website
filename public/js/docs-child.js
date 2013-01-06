jQuery(document).ready(function ($) {
	
//	$('.section-subbar').mouseenter(function() {
//		$('.section-subbar .prev-page, .section-subbar .next-page').tooltip('show');
//	}).mouseleave(function() {
//			$('.section-subbar .prev-page, .section-subbar .next-page').tooltip('hide');
//	});
	
	$('.section-subbar .prev-page').tooltip({
		delay: {show: 100},
		placement: 'right',
		trigger: 'manual'
	}).tooltip('show');
	$('.section-subbar .next-page').tooltip({
		delay: {show: 100},
		placement: 'left',
		trigger: 'manual'
	}).tooltip('show');
	
});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();