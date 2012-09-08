jQuery(document).ready(function($) {
	
	$('.flashes .alert').alert();
	
	$('#download-skeleton-without-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(ppi.baseUrl + 'download/without-vendors', function(data) {
			window.location.href = ppi.baseUrl + 'downloads/ppi-skeletonapp-without-vendors.tar.gz';
		});
		return false;
	});
	
	$('#download-skeleton-with-vendors').on('click', function(e) {
		
		e.preventDefault();
		$.get(ppi.baseUrl + 'download/with-vendors', function(data) {
			window.location.href = ppi.baseUrl + 'downloads/ppi-skeletonapp-with-vendors.tar.gz';
		});
		return false;
	});
	
});