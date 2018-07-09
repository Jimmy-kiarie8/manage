var map;
var myLatLng;
$(document).ready(function(){
 geoLocationInit();
 function geoLocationInit() {
 	if (navigator.geolocation) {
 		navigator.geolocation.getCurrentPosition(success, fail);
 	}else{
 		alert('Browser not serported');
 	}
 }

 function success(position) {
 	console.log(position);
 	var latval = position.coords.latitude;
 	var lngval = position.coords.longitude;
 	myLatLng = new google.maps.LatLng(latval, lngval);
 	createMap(myLatLng);
 }

 function fail() {
 	alert('failed');
 }

 function createMap(myLatLng) {
 	 map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 8
     });

     var marker = new google.maps.marker({
     	position: myLatLng,
	    map: map
	    // icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
     });
 }
function createMarker(latlang, name) {
 	var marker = new google.maps.Marker({
	    position: myLatLng,
	    map: map,
	    // icon: icn,
	    icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
	    title: name
	  });
}
 function nearbySearch(myLatLng) {
 	var request = {
	    location: myLatLng,
	    radius: '2500',
	    type: ['restaurant']
	  };

    service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request, callback);

	function callback(results, status) {
		console.log(results);
	  if (status == google.maps.places.PlacesServiceStatus.OK) {
	    for (var i = 0; i < results.length; i++) {
	      var place = results[i];
	      latlang = place.geometry.location;
	      // icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
	      name = place.name;
	      createMarker(latlang, name);
	    }
	  }
	}
 }
});