jQuery(document).ready(function ($) {

	$('.toc-mobile .toc-heading').click(function () {
		
		var arrows = $(this).find('i');
		if (arrows.hasClass('icon-arrow-up')) {
			arrows.removeClass('icon-arrow-up').addClass('icon-arrow-down');
		} else {
			arrows.addClass('icon-arrow-up').removeClass('icon-arrow-down');
		}
		
	});
	
	var meny = Meny.create({
		
		// The element that will be animated in from off screen
		menuElement: document.querySelector( '.toc-mobile' ),

		// The contents that gets pushed aside while Meny is active
		contentsElement: document.querySelector( '.docs-page' ),

		// [optional] The alignment of the menu (top/right/bottom/left)
		position: Meny.getQuery().p || 'right',

		// [optional] The width of the menu (when using left/right position)
		width: 300,

		// [optional] Distance from mouse (in pixels) when menu should open
		threshold: 20
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