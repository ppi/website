jQuery(document).ready(function ($) {
	
	var actionContent = $('#action-content'),
	h1 = $('h1');
	
	var prev = {
		link:  ppi.baseUrl + 'docs/' + actionContent.data('prevlink'),
		title: actionContent.data('prevpage')
	};
	
	var next = {
		link:  ppi.baseUrl + 'docs/' + actionContent.data('nextlink'),
		title: actionContent.data('nextpage')
	};
	
	h1.find('a').remove();
	
	var newhtml = '<div class="section-subbar clearfix">';
	if(actionContent.data('prevlink') !== undefined) {
		prev.link = prev.link.replace('.php', '');
		newhtml += 
		'<a class="prev-page btn" title="' + prev.link + '" href="' + prev.link + '">' +
				'<img src="../../images/docs/previous-page.png" alt="Previous">&nbsp;&nbsp;' + prev.title + 
		'</a>';
	}
	
	newhtml += '<h1>' + h1.html() + '</h1>';
	console.log(actionContent.data('nextlink'));
	if(actionContent.data('nextlink') !== undefined) {
		next.link = next.link.replace('.php', '');
		newhtml += 
		'<a class="next-page btn" title="' + next.link + '" href="' + next.link + '">' +
			  '' + next.title + '&nbsp;&nbsp;<img src="../../images/docs/next-page.png" alt="Next">' +
		'</a>';
	}
	
	newhtml += '</div>';
	
	$(newhtml).insertAfter(h1);
	
	h1.hide();
	
});

