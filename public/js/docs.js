jQuery(document).ready(function ($) {

//  $('pre code.php').each(function(i, e) {hljs.highlightBlock(e, '    ')});

	$('.toc-mobile .toc-heading').click(function () {
		$(this).parent().toggleClass('expanded');
		$(this).parent().find('.items').slideToggle();
		var arrows = $(this).find('i');
		if (arrows.hasClass('icon-arrow-up')) {
			arrows.removeClass('icon-arrow-up').addClass('icon-arrow-down');
		} else {
			arrows.addClass('icon-arrow-up').removeClass('icon-arrow-down');
		}

	});

	var scrollOffset =  {offset: {top:-55, left:0} };

	$('.toc-mobile .items a, .section-title a').live('click', function(e) {
		
		e.preventDefault();

		// we'll be needing this in a second
		var href = $(this).attr('href');

		// Kansas city shuffle
		var currentScroll = document.body.scrollTop;
		window.location.hash = href.replace('#', '');
		document.body.scrollTop = currentScroll;

		// And scrooolllllllll!
		$.scrollTo(href, 100, scrollOffset);
	});

	if(window.location.hash != '') {
		document.body.scrollTop = 0;
		$.scrollTo(window.location.hash, 100, scrollOffset);
	}
	
	$('.section-title').mouseenter(function() {
		$(this).append('<span><a href="#' + $(this).attr('id') +  '">&para;</a></span>');
	}).mouseleave(function() {
		$(this).find('span').remove();
	});
	

});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();