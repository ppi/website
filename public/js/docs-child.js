jQuery(document).ready(function ($) {

	$('.docs-header ul.nav li a').not($('.docs-header .docs-dropdown a')).click(function() {
		console.log('not docs link');
		return false;
	});
	
});