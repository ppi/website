jQuery(document).ready(function() {
	
	$('#header-search-input').autocomplete({
		serviceUrl: baseUrl + 'search/ajax_search',
		onSelect: function(value, data) {
			window.location.href = data;
		}
	});
	
	$('#header-search-input').focus(function() {
		// tbc, re-display the autocomplete
	});
	
	$('#header .search input').placeholder();
	
});