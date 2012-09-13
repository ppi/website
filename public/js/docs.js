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

	$.localScroll.defaults.axis = 'y';
	$.localScroll.defaults.lazy = true;
	
	$.localScroll.hash({
		axis: 'y',
		hash:   true,
		offset: {top:-55, left:0}
	});
	
	$('.toc-mobile li').localScroll({
		hash:   true,
		offset: {top:-55, left:0}
	});
	
	$('.section-title').each(function() {
		
		$(this).append('<span><a href="#' + $(this).attr('id') +  '">&para;</a></span>');
		
		$(this).mouseenter(function() {
			$(this).find('span').show();
		}).mouseleave(function() {
			$(this).find('span').hide();
		});
	});
		
	

});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();