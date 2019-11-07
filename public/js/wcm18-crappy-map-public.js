let crappyMap,
	geocoder,
	infoWindow;

function initMap() {
	let $ = jQuery,
		$wrapper = $('#wcm18-crappy-map'),
		address = $wrapper.data('address'),
		$map = $wrapper.find('#crappy-map'),
		map = $map.get(0);

	// Create new instance of Google Maps Geocoder
	geocoder = new google.maps.Geocoder();

	// Geocode the address `city, country`
	geocoder.geocode({
		address: address
	}, function(results, status){
		if (results.length > 0) {
			let latLng = results[0].geometry.location;
			crappyMap = createMap(map, latLng);

			let contentString = '<div id="content">\n' +
			'    <div id="siteNotice"></div>\n' +
			'    <h1 id="firstHeading" class="firstHeading">Google Maps API är skoj :)</h1>\n' +
			'    <div id="bodyContent">\n' +
			'        <p>\n' +
			'            <b>Hej allihopa!</b>\n' +
			'            Här har vi nu en text som visas i en ruta när man klickar på markören :)<br>\n' +
			'            Super bra om man vill visa information om något!\n' +
			'        </p>\n' +
			'    </div>\n' +
			'</div>';

			infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			let centerMarker = new google.maps.Marker({
				position: latLng,
				map: crappyMap,
				animation: google.maps.Animation.DROP,
			});

			centerMarker.addListener('click', function() {
				infowindow.open(crappyMap, centerMarker);
			});
		}
	});
}

function createMap(mapElement, latLng, mapOptions) {
	return new google.maps.Map(mapElement, {
		zoom: 11,
		center: latLng,
		disableDefaultUI: true,
		gestureHandling: 'none'
	});
}