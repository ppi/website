var meny = Meny.create({
	menuElement: document.querySelector( '.meny' ),
	contentsElement: document.querySelector( '.contents' ),
	position: 'right',
	width: 320,
	threshold: 100
});

$('.toc-mobile.meny').css('right', '20px');

jQuery(document).ready(function ($) {

	$('.toc-mobile .toc-heading').click(function () {
		
		var arrows = $(this).find('i');
		if (arrows.hasClass('icon-arrow-up')) {
			arrows.removeClass('icon-arrow-up').addClass('icon-arrow-down');
		} else {
			arrows.addClass('icon-arrow-up').removeClass('icon-arrow-down');
		}
		
	});

});

jQuery('.contents iframe').load(function($) {
	
	var iframe = $('.contents iframe').contents();
	
	// Loading up the ToC Data
	var tocData = $.parseJSON(iframe.find("#toc-data").html());
	var tocContent = '';
	
	for(var i in tocData) {
		tocContent += '<li><a href="#' + i + '" title="">' + tocData[i] + '</a></li>';
	}
	$('.toc-mobile .items').html(tocContent);
	
	// ** Binding to some links within the iframe to make sure they update the parent frame and not the child
	iframe.find('.docs-header ul.nav li a').click(function() {
		if(!$(this).hasClass('dropdown-toggle')) {
			window.location.href = $(this).attr('href');
		}
	});
	
	iframe.find('a.next-article, a.prev-article').click(function() {
		window.location.href = $(this).attr('href');
	});
	
	// ** Lets append a &para; to the end of each section title
/* 	iframe.find('.section-title').each(function() { 
		
		$(this).append('<span><a href="#' + $(this).attr('id') +  '">&para;</a></span>');
		
		$(this).mouseenter(function() {
			$(this).find('span').show();
		}).mouseleave(function() {
			$(this).find('span').hide();
		});
	});
	*/
	
	// Smooth anchor scrolling
	$.localScroll.defaults.axis = 'y';
	$.localScroll.defaults.lazy = true;
	$.localScroll.defaults.target = $('.contents iframe').contents();
	
	$.localScroll.hash({
		axis: 'y',
		hash:   true,
		offset: {top:-55, left:0}
	});
	
	$('.toc-mobile li').localScroll({
		hash:   true,
		offset: {top:-55, left:0},
		onAfter:function( anchor, settings ){
			meny.close();
		}
	});
	

	
});