(function( $ ) {
	'use strict';

	const data = shifterRedirects.data;
	const source = data.shifter_redirects_source;
	const destination = data.shifter_redirects_destination;
	const host = window.location.host;

	
	if (destination && source) {
		// if (host !== source) {
		// 	return;
		// }
		// if (host === destination) {
		// 	return;
		// }
		if (host === source) {
			window.location = destination + window.location.pathname + window.location.search;
		}
	}

	console.log(source);
	console.log(destination);

})( jQuery );
