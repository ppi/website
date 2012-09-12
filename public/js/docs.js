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
	
	$('.section-title span a').live('click', function(e) {
		e.preventDefault();
		var hash = $(this).parents('p.section-title').attr('id');
		$.scrollTo('#' + $(this).attr('href'), 100, {offset: {top:-55, left:0} });
	});
	
	$('.toc-mobile ul li a').click(function(e) {
		
		e.preventDefault();
		
		// Offset is to fix the bug caused by the topbar, and prevent hiding the section's title.
		$.scrollTo($(this).attr('href'), 800,{offset: {top:-55, left:0} });
	});
	
	$('.toc-mobile a').click(function(e) {
		e.preventDefault();
		var scroll = document.body.scrollTop;
		window.location.hash = $(this).attr('href').substr(1);
		document.body.scrollTop = scroll;
	});
	
	if(window.location.hash != '') {

		var hash = window.location.hash;
		window.scrollTo(0, 0);
		$('.toc-mobile .items a[href=' + hash + ']').trigger('click');
	}
	
	$('.section-title').mouseenter(function() {
		$(this).append('<span><a href="#' + $(this).attr('id') +  '">&para;</a></span>');
	}).mouseleave(function() {
		$(this).find('span').remove();
	});
	

});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();
