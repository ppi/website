jQuery(document).ready(function($) {
	
	$('#download-button').on('click', function(e) {
		
		e.preventDefault();
		$.get(baseUrl + 'home/increment_count', function(data) {
			window.location.href = baseUrl + 'files/ppi-skeletonapp-with-vendors.tar.gz';
		});
		return false;
	});
	
});