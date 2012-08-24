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

	// ToC Links functionality
	$('.toc-mobile ul li a').click(function(e) {
		e.preventDefault();
		// Offset is to fix the bug caused by the topbar, and prevent
		// hiding the section's title.
		$.scrollTo($(this).attr('href'),800,{offset: {top:-55, left:0} });
		
	});

	<!-- Initialise jQuery Syntax Highlighter -->
//	$.SyntaxHighlighter.init({
//		prettifyBaseUrl: baseUrl + 'scripts/libs/jquery-syntaxhighlighter/prettify',
//		baseUrl: baseUrl + 'scripts/libs/jquery-syntaxhighlighter',
//		lineNumbers: false,
//		theme: "solarized"
//	});

});

hljs.tabReplace = '    ';
hljs.initHighlightingOnLoad();
