jQuery(document).ready(function() {
	
	$('#header-search-input').autocomplete({
		serviceUrl: baseUrl + 'search/ajax_search',
		onSelect: function(value, data) {
			console.log('value: ' + value, 'data: ' + data)
		}
	});
	
});