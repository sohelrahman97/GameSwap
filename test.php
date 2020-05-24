
<!DOCTYPE html> 
<html> 
<head> 
	<style> 
	#map { 
		height: 400px; 
		width: 100%; 
	} 
	</style> 
</head> 
<body> 
	<h3>GFG Google Maps Demo</h3> 
	<div id="map"></div> 
	<script> 
	function initMap() { 
		var uluru = {lat: 23.780806, lng: 90.425162}; 
		var map = new google.maps.Map(document.getElementById('map'), { 
		zoom: 18, 
		center: uluru 
		}); 
		var marker = new google.maps.Marker({ 
		position: uluru, 
		map: map 
		}); 
	} 
	</script> 
	<script async defer 
	src= 
"https://maps.googleapis.com/maps/api/js?key= 
AIzaSyDPIQSAsNVDJo6HhME7VLrnB8fKSerdsWM&callback=initMap"> 
	</script> 
</body> 
</html> 
