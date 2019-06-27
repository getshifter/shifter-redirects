(function( $ ) {
	'use strict';

	const data = shifterRedirects.data;
	const source = data.shifter_redirects_source;
	const destination = data.shifter_redirects_destination;

	if (window.location.host != destination) {
		window.location = source + window.location.pathname + window.location.search;
	}

	console.log(document.location);

})( jQuery );
