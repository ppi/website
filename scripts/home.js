jQuery(document).ready(function($) {
	
	$('#download-skeleton-without-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(baseUrl + 'home/increment_count', function(data) {
			window.location.href = baseUrl + 'files/ppi-skeletonapp-without-vendors.tar.gz';
		});
		return false;
	});
	
	$('#download-skeleton-with-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(baseUrl + 'home/increment_count', function(data) {
			window.location.href = baseUrl + 'files/ppi-skeletonapp-with-vendors.tar.gz';
		});
		return false;
	});
	
});