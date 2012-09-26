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
		
		menuElement: document.querySelector( '.meny' ),
		contentsElement: document.querySelector( '.contents' ),
		position: 'right',
		width: 300,
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
	
	$('.docs-header ul.nav li a').not($('.docs-header .docs-dropdown li')).live('click', function() {
		console.log('not docs link');
		return false;
	});

});

jQuery('.contents iframe').load(function() {
	
	var iframe = $('.contents iframe').contents();
	
	var tocData = $.parseJSON(iframe.find("#toc-data").html());
	var tocItems = $('.toc-mobile .items');
	for(var i in tocData) {
		tocItems.append('<li><a href="#' + i + '" title="">' + tocData[i] + '</a></li>');
	}
	
	iframe.find('.docs-header ul.nav li a:not(.dropdown-toggle)').click(function() {
		window.location.href = $(this).attr('href');
	});
	
	iframe.find('a.next-article, a.prev-article').click(function() {
		window.location.href = $(this).attr('href');
	});
	
});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();