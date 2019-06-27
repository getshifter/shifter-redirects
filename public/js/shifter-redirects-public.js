(function( $ ) {
	'use strict';

	const data = shifterRedirects.data;
	const source = data.shifter_redirects_source;
	const destination = data.shifter_redirects_destination;

	
	if (destination && source) {
		if (window.location.host !== destination) {
			window.location = destination + window.location.pathname + window.location.search;
		}
	}

	console.log(source);
	console.log(destination);

})( jQuery );
