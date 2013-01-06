//var meny = Meny.create({
//	menuElement: document.querySelector( '.meny' ),
//	contentsElement: document.querySelector( '.contents' ),
//	position: 'right',
//	width: 360,
//	threshold: 150
//});

//meny.open();

jQuery('.contents iframe').load(function() {
	
	var iframe = jQuery('.contents iframe').contents();
	
	// Loading up the ToC Data
	var tocData = $.parseJSON(iframe.find("#toc-data").html());
	var tocContent = '';
	
	for(var i in tocData) {
		tocContent += '<li><a href="#' + i + '" title="">' + tocData[i] + '</a></li>';
	}
	jQuery('.toc-mobile .items').html(tocContent);
	
	// ** Binding to some links within the iframe to make sure they update the parent frame and not the child
	iframe.find('.docs-header ul.nav li a').click(function() {
		if(!jQuery(this).hasClass('dropdown-toggle')) {
			window.location.href = jQuery(this).attr('href');
		}
	});
	
	iframe.find('.section-subbar a').click(function(e) {
		e.preventDefault();
		window.location.href = jQuery(this).attr('href');
	});
	
	// ** Lets append a &para; to the end of each section title
/* 	iframe.find('.section-title').each(function() { 
		
		jQuery(this).append('<span><a href="#' + jQuery(this).attr('id') +  '">&para;</a></span>');
		
		jQuery(this).mouseenter(function() {
			jQuery(this).find('span').show();
		}).mouseleave(function() {
			jQuery(this).find('span').hide();
		});
	});
	*/
	
	// Smooth anchor scrolling
	$.localScroll.defaults.axis = 'y';
	$.localScroll.defaults.lazy = true;
	$.localScroll.defaults.target = jQuery('.contents iframe').contents();
	
	$.localScroll.hash({
		axis: 'y',
		hash:   true,
		offset: {top:-110, left:0}
	});
	
	jQuery('.toc-mobile li').localScroll({
		hash:   true,
		offset: {top:-55, left:0},
//		onAfter:function( anchor, settings ){
//			meny.close();
//		}
	});
	

	
});